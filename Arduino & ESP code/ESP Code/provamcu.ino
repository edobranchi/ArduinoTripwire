

#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>



const char *ssid = "";  //Credenziali per la connessione wi-fi
const char *password = "";

//Indirizzo del Webserver
const char *host = "192.168.178.41";

WiFiServer server(80);
String alarm;
String header;

unsigned long currentTime = millis();
unsigned long previousTime = 0; 
// Definizione del timeout (2sec)
const long timeoutTime = 2000;
int output5State=1;
int Reset=4;
String station="A";

void setup() {
  Serial.begin(9600); //Apro il seriale e lo seto a un rate di 9600
  delay(1000);
  WiFi.mode(WIFI_OFF);        
  delay(1000);
  WiFi.mode(WIFI_STA);        

  WiFi.begin(ssid, password);     //Connessione al wifi
  Serial.println("");

  Serial.print("Connecting");
  // Attente la connessione
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //Se la connessione ha successo stampa SSID e indiritto locale assegnato al nodemcu
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  server.begin(); 

  digitalWrite(Reset, HIGH);
  delay(200); 
  pinMode(Reset, OUTPUT);

  
}

void loop() {

    //Sezione di comunicazione SERVER ---> NODEMCU
    
    
  WiFiClient client = server.available();

if (client) {                             // Se un nuovo client si connette stampa "New client",
    Serial.println("New Client.");          // sulla porta seriale
    String currentLine = "";                // crea una stringa per salvare i messaggi che arrivano dal client
    currentTime = millis();
    previousTime = currentTime;
    while (client.connected() && currentTime - previousTime <= timeoutTime) { // finchè il client è connesso loop
      currentTime = millis();         
      if (client.available()) {             // Se c'è qualcosa da leggere dal client,
        char c = client.read();             // lo legge e poi 
        Serial.write(c);                    // lo salva in header
        header += c;
        if (c == '\n') {                    // se legge il carattere "a capo"
                                            // e la riga è vuota vuol dire che hai ottenuto due "a capo" consecutivi
                                            // e quindi la richiesta è finita quindi risponde con il codice 200
          if (currentLine.length() == 0) {
            client.println("HTTP/1.1 200 OK");
            client.println("Content-type:text/html");
            client.println("Connection: close");
            client.println();
            
            
         
            if (header.indexOf("GET /resetnow") >= 0) {         //se riceve una richiesta /resetnow, 
               Serial.println("resetting");                     //scrive che sta eseguendo un softreset 
               digitalWrite(Reset, LOW);                        //setta il PIN reset a basso resettando pure Arduino
               ESP.restart();                                   //si riavvia
            }
             if (header.indexOf("GET /?station=") >= 0) {       //richiesta di cambio nome per la stazione
               char f = header.charAt(14);                      //Alla 14° posizione nella stringa di reset prende il nuovo nome
               station=f; 
               client.print("<meta http-equiv=\"refresh\" content=\"0;URL=http://192.168.178.41/cambionomestazione.php\">"); //reindirizza alla                                                                                                                 pagina di cambio nome
            }
           
            
            client.println();
            break;
          } else { // se trovi un carattere di "nuova riga" pulisci la riga corrente
            currentLine = "";
          }
        } else if (c != '\r') {  
          currentLine += c;      
        }
      }
    }
    // Pulisce la variabile header
    header = "";
    // Chiude la connessione
    client.stop();
    Serial.println("Client disconnected.");
    Serial.println("");
  }




//Sezione di comunicazione NODEMCU-->SERVER
  
  if (Serial.available() > 0) {
    String ADCData,postData;
    ADCData = Serial.readString();
    Serial.println("Activated sensor");
    Serial.println("transmitting data");
    HTTPClient http;    //Dichiara l'oggetto HttpClient


    //dati da inviare tramite POST
    postData = "status=" + ADCData + "&station=" + station ;

    http.begin("http://192.168.178.41/postdemo.php");              //Specifica la destinazione della richiesta
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specifica il contenuto

    int httpCode = http.POST(postData);   //Manda la richiesta
    String payload = http.getString();    //Controlla la risposta

    Serial.println(httpCode);   //Stampa il codice di risposta
    Serial.println(payload);    //Stampa il payload ricevuto

    http.end();  //Chiusura connessione
    
      
    HTTPClient http1;  //Instanzia un'altro oggetto HTTPClient
    http1.begin("http://192.168.178.41/shootStill.php");     //Chiama la pagina shootStill.php
    http1.POST(postData);   //invia i dati precedenti, verranno poi scartati perchè shootStill.php si attiva con qualunque tipo di richiesta in 
    http1.end();            //arrivo, poi chiude la connessione
    
  }
}
