<?php 
class Car {
    var $wheels;
    var $doors = 2;
    var $engine = 1;
    var $color = "Red";
    function startEngine(){
        echo "Engine started" . "<br>";
    }
    function countWheels(){
      echo "This car has " . $this->wheels = 4 . " Wheels <br>";
    }
}

if(class_exists("Car")){
    echo "Car class exists" . "<br>";
}else{
    echo "it does not exist";
}

if(method_exists("Car","startEngine")){
    echo "startEngine Method Exists" . "<br>";
}else{
    echo "Method does not exist";
}

$bmw = new Car();
$bmw->startEngine();
echo $bmw->doors . "<br>";
$bmw->countWheels();

$honda = new Car();
$honda->startEngine();
echo $honda->doors = 4;

echo "<br>";
// Class Inheritance & and overwriting
class Plane extends Car {
    var $doors = 5;
    function startEngine(){
        echo "Plane's Engine started" . "<br>";
    }
}
$airbus = new Plane();
echo $airbus->color . "<br>";
echo $airbus->doors . "<br>";
$airbus->startEngine();

?>