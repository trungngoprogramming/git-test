#include <ESP8266HTTPClient.h>

#include <ESP8266WiFi.h>

const char* ssid = "DTU";
const char* password = "";
 
void setup () {
 
  Serial.begin(115200);
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED) {
 
    delay(1000);
    Serial.print("Connecting..");
 
  }
 
}

 
void loop() {
 
  if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection status
 
    HTTPClient http;  //Declare an object of class HTTPClient
 
    http.begin("https://igreenhouse.000webhostapp.com/view/dashboard_manager.php?temp=10&humi=20");  //Specify request destination
    int httpCode = http.GET();                                                                  //Send the request
 
    if (httpCode > 0) { //Check the returning code
 
      String payload = http.getString();   //Get the request response payload
      Serial.println(payload);                     //Print the response payload
 
    }
 
    http.end();   //Close connection
 
  }
 
  delay(30000);    //Send a request every 30 seconds
 
}
//String  ClientRequest;
//WiFiServer server(80);
//
//
//void setup()
//{
//  ClientRequest = "";
//
//  Serial.begin(9600);
//
//  pinMode(16, OUTPUT);
//    WiFi.disconnect();
//  delay(3000);
//  Serial.println("START");
//   WiFi.begin("DTU",""); //Kết nối Wifi
//  while ((!(WiFi.status() == WL_CONNECTED))){
//    delay(300);
//    Serial.print("..");
//
//  }
//  Serial.println("Connected");
//  Serial.println("Your IP is");
//  Serial.println((WiFi.localIP()));
//  server.begin();
//
//}
//
//
////void loop()
////{
////
////    WiFiClient client = server.available();
////    if (!client) { return; }
////    while(!client.available()){  delay(1); }
////    ClientRequest = (client.readStringUntil('\r'));
////    client.flush();
////    if (ClientRequest.indexOf("LedON") > 0) {
////      digitalWrite(16,HIGH);
////
////    }
////    if (ClientRequest.indexOf("LedOFF") > 0) {
////      digitalWrite(16,LOW);
////
////    }
////}
//
////void setup()
////{
////  ClientRequest = "";
////
////  Serial.begin(9600);
////
////  pinMode(16, OUTPUT);
////    WiFi.disconnect();
////  delay(3000);
////  Serial.println("START");
////   WiFi.begin(" "," "); //Kết nối Wifi
////  while ((!(WiFi.status() == WL_CONNECTED))){
////    delay(300);
////    Serial.print("..");
////
////  }
////  Serial.println("Connected");
////  Serial.println("Your IP is");
////  Serial.println((WiFi.localIP()));
////  server.begin();
////
////}
//
//
//void loop()
//{
//
//    WiFiClient client = server.available();
//    if (!client) { return; }
//    while(!client.available()){  delay(1); }
//    ClientRequest = (client.readStringUntil('\r'));
//    client.flush();
//    if (ClientRequest.indexOf("LedON") > 0) {
//      digitalWrite(16,HIGH);
//
//    }
//    if (ClientRequest.indexOf("LedOFF") > 0) {
//      digitalWrite(16,LOW);
//
//    }
//    if (client.connect("www.igreenhouse.000webhostapp.com",80)) { // REPLACE WITH YOUR SERVER ADDRESS
//    client.println("GET /add.php HTTP/1.1"); 
//    client.println("Host: igreenhouse.000webhostapp.com/view/dashboard_manager.php?temp=20&humi=10"); // SERVER ADDRESS HERE TOO
//
//  } 
//    client.stop();
//     delay(1);
//
//}
