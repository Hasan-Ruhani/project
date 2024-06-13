class Car {
  String brand;
  String model;
  int year;
  double milesDriven;
  static int numberOfCars = 0;

  // Constructor
  Car(this.brand, this.model, this.year, this.milesDriven) {
    numberOfCars++;
  }

  // Method to drive the car
  void drive(double miles) {
    milesDriven += miles;
  }

  // Method to get the miles driven
  double getMilesDriven() {
    return milesDriven;
  }

  // Method to get the brand of the car
  String getBrand() {
    return brand;
  }

  // Method to get the model of the car
  String getModel() {
    return model;
  }

  // Method to get the year of the car
  int getYear() {
    return year;
  }

  // Method to get the age of the car
  int getAge() {
    int currentYear = DateTime.now().year;
    return currentYear - year;
  }
}

void main() {
  // Create five Car objects
  Car car1 = Car('Toyota', 'Camry', 2010, 120000.0);
  Car car2 = Car('Honda', 'Civic', 2015, 80000.0);
  Car car3 = Car('Ford', 'Mustang', 2020, 20000.0);
  Car car4 = Car('Chevrolet', 'Impala', 2018, 50000.0);
  Car car5 = Car('BMW', '3 Series', 2022, 10000.0);

  // Drive each car a different number of miles
  car1.drive(150.5);
  car2.drive(300.0);
  car3.drive(50.0);
  car4.drive(120.0);
  car5.drive(200.0);

  // Print out the details for each car
  print('Car 1: ${car1.getBrand()} ${car1.getModel()} (${car1.getYear()})');
  print('Miles Driven: ${car1.getMilesDriven()}');
  print('Age: ${car1.getAge()} years\n');

  print('Car 2: ${car2.getBrand()} ${car2.getModel()} (${car2.getYear()})');
  print('Miles Driven: ${car2.getMilesDriven()}');
  print('Age: ${car2.getAge()} years\n');

  print('Car 3: ${car3.getBrand()} ${car3.getModel()} (${car3.getYear()})');
  print('Miles Driven: ${car3.getMilesDriven()}');
  print('Age: ${car3.getAge()} years\n');

  print('Car 4: ${car4.getBrand()} ${car4.getModel()} (${car4.getYear()})');
  print('Miles Driven: ${car4.getMilesDriven()}');
  print('Age: ${car4.getAge()} years\n');

  print('Car 5: ${car5.getBrand()} ${car5.getModel()} (${car5.getYear()})');
  print('Miles Driven: ${car5.getMilesDriven()}');
  print('Age: ${car5.getAge()} years\n');

  // Print out the total number of Car objects created
  print('Total number of cars created: ${Car.numberOfCars}');
}
