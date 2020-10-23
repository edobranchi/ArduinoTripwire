// Variabili
int mode = 1;
int ambiant;
int trip = 1000; // Il valore di luce quando il laser è puntato
int minLight = 900;
int atAverage;
long millisCount;
bool count= false;


// Pin out
int ledPin = 13;
String  modeNames[3] = {"SETTINGS","ARMED","TRIP"};

//Pin di input
 
int tripPin = A0;
int ambiantPin = A1;
int provaled=10;
int provaled2=11;

void setup() {

  pinMode(ledPin, OUTPUT);
  pinMode(provaled,OUTPUT);
  pinMode(provaled2,OUTPUT);  //Inizializzazione dei pin
  Serial.begin(9600);       //Avvio comunicazione seriale

}


void loop() {
  //does something when the mode changes
  switch (mode) {
    case 0: //Modalità di calibrazione
      ambiant = analogRead(ambiantPin);
      trip = analogRead(tripPin);
      atAverage = ambiant + ((trip - ambiant)/2);
      
      if (trip  >= minLight) {
        digitalWrite(ledPin,HIGH);
      } else {
        digitalWrite(ledPin,LOW);
      }

    break;

    case 1: // Modalità armata
      digitalWrite(provaled,HIGH);
      digitalWrite(provaled2,LOW);
      digitalWrite(ledPin,LOW);
      ambiant = analogRead(ambiantPin);
      atAverage = ambiant + ((trip - ambiant)/2);
      if (analogRead(tripPin) < atAverage) {
        count=false;
        mode = 2;
        
        }
      if ((millis() - millisCount) >= 3000) {
        millisCount = millis();
      }

      
      

    break;
    
    
    case 2: //Modalità attivata
    digitalWrite(provaled,LOW);
    digitalWrite(provaled2,HIGH);
    
      if ((millis() - millisCount) >= 1000) {
        millisCount = millis();
        Transmit();
        mode = 1;
      }
      count = true;

    break;
    }

 
 delay(1);                       // Aspetta un minimo
}



//Trasmette i dati sul seriale, che verranno letti dal NODEMCU
void Transmit() {
  
  if (count == false ) {
    Serial.println();
   Serial.print("Activated");
   Serial.println();
    }
  }
