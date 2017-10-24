#include <SPI.h>
#include <Ethernet.h>
#include <Wire.h>
#include <DHT.h>
#define DHTPIN 2
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);
String data;
String tstr;

float humidity = 0;
float temperature = 0;
byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 };   //physical mac address
byte ip[] = { 192, 168, 1, 13};                      // ip in lan (that's what you need to use in your browser. ("192.168.1.178")
byte gateway[] = { 192, 168, 1, 5};                   // internet access via router=la ip cua PC ban
byte subnet[] = { 255, 255, 255, 0 };
EthernetServer server(80);                    // Cong truy cap internet cua XAMP(mac dinh la 80 ban co the doi)
EthernetClient client;//server port
String readString;

void setup() {
  // cau hinh chan cac thiet bi can dieu khien
  pinMode(6, OUTPUT);
  pinMode(7, OUTPUT);
  pinMode(8, OUTPUT);
  Serial.begin(9600);
  dht.begin();
  delay(1000);
  while (!Serial) {
    ;
  }
  Ethernet.begin(mac, ip, gateway, subnet);
  server.begin();
  Serial.print("server is at ");
  Serial.println(Ethernet.localIP());
}
void loop() {
  delay(2000);
  // 2 bien temperature va humidity phai giong ten ban dat o trong phan tao DATABASE cua MSQL va cau hinh PHP
  float humidity = dht.readHumidity();  
  float temperature = dht.readTemperature();
  float f = dht.readTemperature(true);
 // xuat 2 gia tri ra serial de gui qua bluetooth 
  Serial.print("Temperature: ");
  Serial.println(temperature);
  Serial.print("Humidity: ");
  Serial.println(humidity);
  // kien tra loi.
  if (isnan(humidity) || isnan(temperature) || isnan(f)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

  sendTemperature(temperature);
  sendHumidity(humidity);
  pinStatus();
  //parseGet();
  delay(8000);
  //kiểm tra internet
  // khi client da ket noi thanh cong va san sang thi thuc hien doc tin hieu tu server gui ve
  //va in ra kien tra thanh cong- sau do thuc hien ham bat/tat thiet bi
  if (client) {
    while (client.connected()) {
      if (client.available()) {
        char c = client.read();
        tstr += c;
        if (c == '\n') {
          break;
        }
        Serial.println("kiem tra thanh cong");
      }
    }
    parseGet(tstr);
    tstr = "";

    delay(1);
  }
  client.stop();
}
//Ham gui nhiet do vao bang "temp" trong Databse
void sendTemperature(float temperature) {
  if (client.connect("192, 168, 1, 5", 80)) { // REPLACE WITH YOUR SERVER ADDRESS
    String request = "GET /arduino/mo/includes/write_temp.php?temp=";
    request += String(temperature);
    request += " HTTP/1.0";
    client.println(request);
    Serial.println("Gui temp thanh cong");
    client.println("Host: 192, 168, 1, 5"); // SERVER ADDRESS HERE TOO
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.print("Content-Length: ");
    client.println(data.length());
    client.println();
    client.print(data);
  }

  if (client.connected()) {
    client.stop();  // DISCONNECT FROM THE SERVER
  }
}
//Ham gui do am vao bang "humidity" trong Databse

void sendHumidity(float humidity) {
  if (client.connect("192, 168, 1, 5", 80)) { // REPLACE WITH YOUR SERVER ADDRESS
    String request = "GET /arduino/hum/includes/write_hum.php?humidity=";
    request += String(humidity);
    request += " HTTP/1.0";
    client.println(request);
    Serial.println("Gui do am thanh cong");
    // Serial.println(request);
    client.println("Host: 192, 168, 1, 4"); // SERVER ADDRESS HERE TOO
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.print("Content-Length: ");
    client.println(data.length());
    client.println();
    client.print(data);
  }

  if (client.connected()) {
    client.stop();  // DISCONNECT FROM THE SERVER
  }
}
void pinStatus() {
  if (client.connect("192, 168, 1, 5", 80)) { // REPLACE WITH YOUR SERVER ADDRESS
    int pin_6 = 0;
    int pin_7 = 0;
    int pin_8 = 0;
    if (digitalRead(6) == HIGH)
      pin_6 = 1;
    if (digitalRead(7) == HIGH)
      pin_7 = 1;
    if (digitalRead(8) == HIGH)
      pin_8 = 1;


    String request = "GET /arduino/pc/ajax/pin_status.php?pin_6=" + String(pin_6);
    request += "&pin_7=" + String(pin_7);
    request += "&pin_8=" + String(pin_8);
    request += " HTTP/1.0";
    client.println(request);

    client.println("Host: 192, 168, 1, 5"); // SERVER ADDRESS HERE TOO
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.print("Content-Length: ");
    client.println(data.length());
    client.println();
    client.print(data);
  }

  if (client.connected()) {
    client.stop();  // DISCONNECT FROM THE SERVER
  }
}

void parseGet(String str) {
  int from = str.indexOf('?');
  int to = str.indexOf(' ', from);

  String GET = str.substring(from, to);

  if (GET == "?pin_6=on") {
    digitalWrite(6, HIGH);
    Serial.println("*********PIN 6 HIGH************");

  }
  if (GET == "?pin_6=off") {
    digitalWrite(6, LOW);
    Serial.println("*********PIN 6 LOW************");

  }

  if (GET == "?pin_7=on") {
    digitalWrite(7, HIGH);
    Serial.println("*********PIN 7 HIGH************");
  }
  if (GET == "?pin_7=off") {
    digitalWrite(7, LOW);
  }

  if (GET == "?pin_8=on") {
    digitalWrite(8, HIGH);
    Serial.println("*********PIN 8 HIGH************");

  }
  if (GET == "?pin_8=off") {
  }
  if (GET == "?pin=status") {
    pinStatus();
    Serial.println("*********PIN STATUS************");
  }
}

