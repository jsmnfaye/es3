double Temperature, Luminosity, Power;
float refVolt = 5.5;
double volts, celsius, lux;
float millivolts;

void setup(){
  Serial.begin(9600);
  Serial.println("Initializing...");
  Serial.println("Voltage || Lux || Temperature");
  Serial.println("");
  Serial.println("");
  pinMode(A0, INPUT); //voltage, solar panel
  pinMode(A1, INPUT); //lux, LDR
  pinMode(A2, INPUT); //temperature
}

void loop(){
  double val1 = analogRead(0);
  getVoltage(val1);
  Serial.print(volts);
  Serial.print("|");
  
  double val3 = analogRead(1);
  getLux(val3);
  Serial.print(lux);
  Serial.print("|");

  float val2 = analogRead(2);
  getTemp(val2);
  Serial.println(celsius);

  delay(900000); //change to 1 hour
}

void getVoltage(double val1){
  volts = (val1 / 1023.0) * refVolt;
}

void getTemp(float val2){
  float temp = val2*500;
  celsius = temp / 1023.00; //1023.00
}

void getLux(double val3){
  volts = (val3 / 1023.0) * 5.0;
  double rate = val3;
  double rawRate = rate;

  if(rate < 100.0) {
    rate = 100.0;
  }
  if (rate > 1000.0) {
    rate = 1000.0;
  }

  rate = map(rate, 100.0, 1000.0, 100.0, 1000.0);
  lux = rate;
}

