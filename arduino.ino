#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <DHT.h>
#include <Servo.h>

// Указываем пины для DHT11, LCD, Buzzer, HC-SR04 и Servo
#define DHT_PIN 2      // Пример: используемый пин для DHT11
#define LCD_ADDR 0x27
#define BUZZER_PIN 4   // Пример: используемый пин для зуммера
#define TRIG_PIN 7     // Пример: используемый пин для TRIG на HC-SR04
#define ECHO_PIN 6     // Пример: используемый пин для ECHO на HC-SR04
#define SERVO_PIN 9    // Пример: используемый пин для сервопривода

// Инициализация LCD
LiquidCrystal_I2C lcd(LCD_ADDR, 16, 2);

// Инициализация DHT
DHT dht(DHT_PIN, DHT11);

// Инициализация сервопривода
Servo myServo;

void lcd_init() {
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Initializing...");
  delay(1000);
  lcd.clear();
}

void lcd_string(String message, int line) {
  lcd.setCursor(0, line);
  lcd.print(message);
}

float getDistance() {
  // Отправляем импульс на датчик
  digitalWrite(TRIG_PIN, LOW);
  delayMicroseconds(2);
  digitalWrite(TRIG_PIN, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIG_PIN, LOW);

  // Считываем длительность импульса от датчика
  return pulseIn(ECHO_PIN, HIGH) * 0.0343 / 2;
}

void moveServo() {
  // Двигаем сервопривод
  myServo.write(90);  // Установите угол вращения, который вам нужен (90 градусов в примере)
}

void setup() {
  Serial.begin(9600);
  lcd.init();
  lcd.backlight();

  lcd_init();

  // Инициализация пина для зуммера
  pinMode(BUZZER_PIN, OUTPUT);

  // Инициализация пинов для HC-SR04
  pinMode(TRIG_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT);

  // Инициализация пинов для сервопривода
  myServo.attach(SERVO_PIN);
}

void loop() {
  // Измерение температуры и влажности с DHT11
  float humidity = dht.readHumidity();
  float temperature = dht.readTemperature();

  // Измерение расстояния с HC-SR04
  float distance = getDistance();

  // Очищаем дисплей перед выводом новой информации
  lcd_init();

  if (!isnan(humidity) && !isnan(temperature)) {
    // Выводим данные на дисплей
    lcd_string("Temperature: " + String(temperature) + "C", 0);
    lcd_string("Humidity: " + String(humidity) + "%", 1);

    // Проверяем, тает ли шоколад
    if (temperature >= 30.0) {
      lcd_string("Chocolate is melting!", 2);

      // Включаем зуммер
      tone(BUZZER_PIN, 1000); // Пример частоты звука

      // Проверяем, превысила ли температура 100 градусов
      if (temperature > 40.0) {
        // Двигаем сервопривод
        moveServo();
      }
    } else {
      lcd_string("Chocolate is solid", 2);

      // Выключаем зуммер
      noTone(BUZZER_PIN);
    }

    // Выводим расстояние на дисплей
    lcd_string("Distance: " + String(distance) + " cm", 3);
  } else {
    lcd_string("Failed to retrieve data", 0);

    // Выключаем зуммер при ошибке
    noTone(BUZZER_PIN);
  }const int noiseSensorPin = A0; // Подключение датчика шума к аналоговому входу A0


  int noiseValue = analogRead(noiseSensorPin); // Считывание значения с датчика шума

  Serial.print("Noise Level: ");
  Serial.println(noiseValue);

 // Ждем 2 секунды перед обновлением данных
  delay(2000);
}