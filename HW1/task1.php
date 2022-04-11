<?php
class Transport
{
    private $name; //НУЖНО ЛИ ЭТО?
    private $fuelAamount;
    private $fuelAamount;

    public function __construct($name = null, $fuelAmount = null)
    {
        $this->name = $name;
        $this->fuelAmount = $fuelAmount;
    }

    public function info(){
        echo "I have $this->fuelAmount liters of fuel.  ";
    }
    public function start(){
        echo "Engin is started!<br>";
    }
    public function start(){
        echo "Engin is off!<br>";
    }
    
}

class Car extends Transport
{
    // public function __construct($name = null, $fuelAmount){
    //     parent::__construct($name, $fuelAmount);
    // } // НУЖНО ЛИ ЭТО?

    public function info(){
        echo "I am a $this->name car and I can drive!" . "<br>";
        parent::info();
        echo "<br><br>";
    }
}


class AirPlane extends Transport{
    // public function __construct($name = null, $fuelAmount){
    //     parent::__construct($name, $fuelAmount);
    // }

    public function info(){
        echo "I am an $this->name airplane and I can fly!" . "<br>";
        parent::info();
        echo "<br><br>";
    }
}

$car = new Car("Mersedes", 20);
$car->start();
$car->info();



$plane = new AirPlane("Embraer", 1000);
$plane->start();
$plane->info();
