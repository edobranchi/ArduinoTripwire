// 5 pins trip wire

// Variables
int mode = 1;
int ambiant;
int trip = 1000; // The light value I get when using my laser
int minLight = 900;
int atAverage;
long millisCount;
bool count= false;


// Output Pins
int ledPin = 13;
String  modeNames[3] = {"SETTINGS","ARMED","TRIP"};

// Input Pins
 
int tripPin = A0;
int ambiantPin = A1;
int provaled=10;
int provaled2=11;

void setup() {

  pinMode(ledPin, OUTPUT);
  
  pinMode(provaled,OUTPUT);
  pinMode(provaled2,OUTPUT);
  Serial.begin(9600);

}


void loop() {
  //does something when the mode changes
  switch (mode) {
    case 0: //calibration mode
      ambiant = analogRead(ambiantPin);
      trip = analogRead(tripPin);
      atAverage = ambiant + ((trip - ambiant)/2);
      
      if (trip  >= minLight) {
        digitalWrite(ledPin,HIGH);
      } else {
        digitalWrite(ledPin,LOW);
      }

    break;

    case 1: // Armed mode
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
    
    
    case 2: //Trip Mode
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

 
 delay(1);                       // wait for a bit
}



//It Beeps
void Transmit() {
  
  if (count == false ) {
    Serial.println();
   Serial.print("Activated");
   Serial.println();
    }
  }
