/* The one and only code for ESP32 - NOIT 2023-2024 */

#include <WiFi.h>
#include <HTTPClient.h>

#define waterSensor1pin 34  // water sensor1 pin 
#define waterSensor2pin 35  // water sensor2 pin 
#define waterSensor3pin 32  // water sensor3 pin 

#define TRIG_PIN 27  // trig pin for ultrasonic sensor 
#define ECHO_PIN 26  // echo pin for ultrasonic sensor 

#define ledPowerPin 14             //not used during testing
#define wifiConnectedledPin 12     //not used during testing
#define waterSensor1ledPin 22      //not used during testing
#define waterSensor2ledPin 21      //not used during testing
#define waterSensor3ledPin 19      //not used during testing
#define ultrasonicSensorledPin 18  //not used during testing

//defining variables for ultrasonic sensor
float distance_cm_ultrasonicSensor, duration_us_ultrasonicSensor;  

//defining variables for concating string to https
String waterSensor1Value_string = "";
String waterSensor2Value_string = "";
String waterSensor3Value_string = "";
String distance_ultrasonicSensor_string = "";
String macAdress = WiFi.macAddress();

//variables for water sensor value
float waterSensor1Value;
float waterSensor2Value;
float waterSensor3Value;

//current wifi ssid and password for mobile hotspot
const char WIFI_SSID[] = "*******";                 //to be changed to be read by sd card in the future
const char WIFI_PASSWORD[] = "**********";          //to be changed to be read by sd card in the future

//host name for db
String HOST_NAME = "************************";

//query string for https
String PATH_NAME = "insert_sensordata.php";
String queryString = "?level1=";
String queryString1 = "&level2=";
String queryString2 = "&level3=";
String queryString3 = "&level4=";
String queryString5 = "&distance1=";
String queryString6 = "&mac=";


//method for connecting the ESP32 to the wifi
void wifi_connect() {
  Serial.begin(9600);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.println("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  digitalWrite(wifiConnectedledPin, HIGH);
  Serial.println(WiFi.localIP());
}


//method for sending data via HTTP/HTTPS protocol to the receiving php script
void send_data() {
  HTTPClient http;

  //sending values to php with https
  http.begin(HOST_NAME + PATH_NAME + queryString + waterSensor1Value_string + queryString1 + waterSensor2Value_string + queryString2 + waterSensor3Value_string + queryString3 + distance_ultrasonicSensor_string + queryString6 + macAdress);  //HTTP

  int httpCode = http.GET();

  //printing the values of the variables to the serial
  //Serial.println(HOST_NAME + PATH_NAME + queryString + waterSensor1Value_string + queryString1 + waterSensor2Value_string + queryString2 + waterSensor3Value_string + queryString3 + waterSensor4Value_string + queryString5 + distance_ultrasonicSensor_string + queryString6 + macAdress); //HTTP

  // httpCode will be negative on error
  if (httpCode > 0) {
    // file found at server
    if (httpCode == HTTP_CODE_OK) {
      String payload = http.getString();
      Serial.println(payload);
    } else {
      // HTTP header has been send and Server response header has been handled
      Serial.printf("[HTTP] GET... code: %d\n", httpCode);
    }
  } else {
    Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
  }

  http.end();
}


void get_data() {  //method to get the data from the sensors
  Serial.print("    ESP Board MAC Address:  ");
  Serial.println(WiFi.macAddress());  //getting the mac address from the esp32 board

  //reading the values from the water sensors
  waterSensor1Value = analogRead(waterSensor1pin);
  waterSensor2Value = analogRead(waterSensor2pin);
  waterSensor3Value = analogRead(waterSensor3pin);

  //cheking if the sensor's value are above the normal
  int waterSensor1Status = waterSensor1Value > 1000 ? 1 : 0;
  int waterSensor2Status = waterSensor2Value > 1000 ? 1 : 0;
  int waterSensor3Status = waterSensor3Value > 1000 ? 1 : 0;

  //getting the data from the ultrasonic sensor
  digitalWrite(TRIG_PIN, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIG_PIN, LOW);

  duration_us_ultrasonicSensor = pulseIn(ECHO_PIN, HIGH);
  distance_cm_ultrasonicSensor = 0.017 * duration_us_ultrasonicSensor;

  distance_ultrasonicSensor_string.concat(distance_cm_ultrasonicSensor);

  //printing the values from the variables to the serial
  Serial.print(F("WSV1: "));  //WSV1 - WaterSensorValue1
  Serial.print(waterSensor1Value);
  Serial.print(F("  WSV2: "));
  Serial.print(waterSensor2Value);
  Serial.print(F("  WSV3: "));
  Serial.print(waterSensor3Value);
  Serial.print(F("  USDV: "));  // USDV - ultrasonic distance value
  Serial.print(distance_cm_ultrasonicSensor);
}

void setup() {
  pinMode(ledPowerPin, OUTPUT);
  pinMode(wifiConnectedledPin, OUTPUT);
  pinMode(waterSensor1ledPin, OUTPUT);
  pinMode(waterSensor2ledPin, OUTPUT);
  pinMode(waterSensor3ledPin, OUTPUT);
  pinMode(ultrasonicSensorledPin, OUTPUT);

  pinMode(TRIG_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT);

  digitalWrite(ledPowerPin, HIGH);

  wifi_connect();  // connect to the wifi
}

void loop() {
  if (WiFi.status() != WL_CONNECTED) {
    wifi_connect();
  }

  get_data();

  send_data();

  delay(5000);  // delay of 30 seconds
}
