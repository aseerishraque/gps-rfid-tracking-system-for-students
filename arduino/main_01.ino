/*
  Rui Santos
  Complete project details at Complete project details at https://RandomNerdTutorials.com/esp8266-nodemcu-http-get-post-arduino/

  Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files.
  The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
  
  Code compatible with ESP8266 Boards Version 3.0.0 or above 
  (see in Tools > Boards > Boards Manager > ESP8266)
*/


#include <Wire.h> 
#include <ArduinoJson.h>

#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x27, 2, 1, 0, 4, 5, 6, 7, 3, POSITIVE);  // Set the LCD I2C address


#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

#define SS_PIN D4  //D2
#define RST_PIN D3 //D1
#include <SPI.h>
#include <MFRC522.h>

MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.
int statuss = 0;
int out = 0;
int speakerPin = D0;

const char* ssid = "Aseer24";
const char* password = "I$hraque";

//Your Domain name with URL path or IP address with path
String serverName = "http://192.168.0.143/gps-rfid-tracking-system-for-students";
//String serverName = "http://studentgps.ishraqulhoque.com";

// the following variables are unsigned longs because the time, measured in
// milliseconds, will quickly become a bigger number than can be stored in an int.
unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;
int l = 0;
void setup() {
  lcd.begin(20,4); 
  Serial.begin(115200);
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Connecting");
  delay(5000);
  l=10;
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    lcd.setCursor(l++,0);
    lcd.print(".");
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Connected to WiFi:");
  lcd.setCursor(6,1);
  lcd.print(ssid);
  lcd.setCursor(4,2);
  lcd.print("Local IP:");
  lcd.setCursor(3,3);
  lcd.print(WiFi.localIP());
  Serial.println(WiFi.localIP());
  delay(5000);
  Serial.println("Timer set to 5 seconds (timerDelay variable), it will take 5 seconds before publishing the first reading.");
}

void restAPI(char card_id[]){
  // Send an HTTP POST request depending on timerDelay
  if ((millis() - lastTime) > timerDelay) {
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
      WiFiClient client;
      HTTPClient http;
//      String card_id = "ajuddi";
      String serverPath = serverName + "/public/api/v1/store-student-rfid/"+card_id;
      
      // Your Domain name with URL path or IP address with path
      http.begin(client, serverPath.c_str());
      Serial.print("API: ");
      Serial.println(serverPath.c_str());

      lcd.clear();
      lcd.setCursor(0,0);
      lcd.print("Scanning Your Card!");
      lcd.setCursor(6,1);
      lcd.print("Please Wait...");
      digitalWrite(speakerPin, HIGH);
      delayMicroseconds(1915);
      // Send HTTP GET request
      delay(3000);
      int httpResponseCode = http.GET();
      delay(3000);
      digitalWrite(speakerPin, LOW);
      delayMicroseconds(1915);
      if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
        String payload = http.getString();
        Serial.println(payload);
        DynamicJsonDocument doc(1024);
        deserializeJson(doc, payload);
        const char* message = doc["message"]; 
        const char* status_msg = doc["status"]; 
        
        const bool error = doc["error"];

       if(strcmp(status_msg, "Unregistered") == 0){
        Serial.print("Message: ");
        Serial.println(message);
        lcd.clear();
        lcd.setCursor(0,0);
        lcd.print(message);
       }
       
        if(strcmp(status_msg, "entered") == 0 || strcmp(status_msg, "exited") == 0){
          const char* student = doc["student"]["name"]; 
          lcd.clear();
          if(strcmp(status_msg, "entered") == 0){
            lcd.setCursor(5,0);
            lcd.print("Welcome!");
          }else{
            lcd.setCursor(5,0);
            lcd.print("Good Bye!");
          }
          lcd.setCursor(1,2);
          lcd.print(student);  
        }
        
        delay(5000);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      // Free resources
      http.end();
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    lastTime = millis();
  }
}


void loop() {
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Good Morning!");
  lcd.setCursor(2,1);
  lcd.print("Please Scan");
//  lcd.setCursor(2,2);
//  lcd.print("Your ID Card");
  lcd.setCursor(1,3);
  lcd.print("Your ID Card");
  delay(5000);


  //RFID
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  //Show UID on serial monitor
  Serial.println();
  Serial.print(" UID tag :");
  String content= "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
     Serial.print(mfrc522.uid.uidByte[i], HEX);
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  content.toUpperCase();
  Serial.println();

//removing spaces START
    int i, len = 0,j;  
    char str[15];


    for (i = 0; content.substring(1)[i] != '\0'; ++i) {
        str[i] = content.substring(1)[i];
    }

    str[i] = '\0';
    
    //Calculating length of the array  
    //len = sizeof(str)/sizeof(str[0]);
    len = strlen(str);
//Checks for space character in array if its there then ignores it and swap str[i] to str[i+1];  
    for(i = 0; i < len; i++){  
        if(str[i] == ' '){  
            for(j=i;j<len;j++)  
        {  
//          Serial.println("Space Found");
            str[j]=str[j+1];  
        }  
        len--;  
        }  
    }
//removing spaces END
    
    Serial.print("Str: ");
    Serial.println(str);
  
  restAPI(str);
}
