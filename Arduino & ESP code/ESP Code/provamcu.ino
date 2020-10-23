

#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>


/* Set these to your desired credentials. */
const char *ssid = "";  //ENTER YOUR WIFI SETTINGS
const char *password = "";

//Web/Server address to read/write from
const char *host = "192.168.178.41";

WiFiServer server(80);
String alarm;
String header;
// Current time
unsigned long currentTime = millis();
// Previous time
unsigned long previousTime = 0; 
// Define timeout time in milliseconds (example: 2000ms = 2s)
const long timeoutTime = 2000;
int output5State=1;
int Reset=4;
String station="A";

void setup() {
  Serial.begin(9600); // opens serial port, sets data rate to 9600 bps
  delay(1000);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot

  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  server.begin(); //IP address assigned to your ESP

  digitalWrite(Reset, HIGH);
  delay(200); 
  pinMode(Reset, OUTPUT);

  
}

void loop() {

  WiFiClient client = server.available();

if (client) {                             // If a new client connects,
    Serial.println("New Client.");          // print a message out in the serial port
    String currentLine = "";                // make a String to hold incoming data from the client
    currentTime = millis();
    previousTime = currentTime;
    while (client.connected() && currentTime - previousTime <= timeoutTime) { // loop while the client's connected
      currentTime = millis();         
      if (client.available()) {             // if there's bytes to read from the client,
        char c = client.read();             // read a byte, then
        Serial.write(c);                    // print it out the serial monitor
        header += c;
        if (c == '\n') {                    // if the byte is a newline character
          // if the current line is blank, you got two newline characters in a row.
          // that's the end of the client HTTP request, so send a response:
          if (currentLine.length() == 0) {
            // HTTP headers always start with a response code (e.g. HTTP/1.1 200 OK)
            // and a content-type so the client knows what's coming, then a blank line:
            client.println("HTTP/1.1 200 OK");
            client.println("Content-type:text/html");
            client.println("Connection: close");
            client.println();
            
            
         
            if (header.indexOf("GET /resetnow") >= 0) {
               Serial.println("resetting");
               digitalWrite(Reset, LOW);
               ESP.restart();       
            }
             if (header.indexOf("GET /?station=") >= 0) {
               char f = header.charAt(14);
               station=f; 
               client.print("<meta http-equiv=\"refresh\" content=\"0;URL=http://192.168.178.41/cambionomestazione.php\">");
            }
           
            
            // The HTTP response ends with another blank line
            client.println();
            // Break out of the while loop
            break;
          } else { // if you got a newline, then clear currentLine
            currentLine = "";
          }
        } else if (c != '\r') {  // if you got anything else but a carriage return character,
          currentLine += c;      // add it to the end of the currentLine
        }
      }
    }
    // Clear the header variable
    header = "";
    // Close the connection
    client.stop();
    Serial.println("Client disconnected.");
    Serial.println("");
  }





  
  if (Serial.available() > 0) {
    String ADCData,postData;
    ADCData = Serial.readString();
    Serial.println("Activated sensor");
    Serial.println("transmitting data");
    HTTPClient http;    //Declare object of class HTTPClient


    //Post Data
    postData = "status=" + ADCData + "&station=" + station ;

    http.begin("http://192.168.178.41/postdemo.php");              //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload

    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);    //Print request response payload

    http.end();  //Close connection
    HTTPClient http1;
    http1.begin("http://192.168.178.41/shootStill.php");
    http1.POST(postData);
    http1.end();
    
  }
}
