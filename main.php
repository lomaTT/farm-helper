<?php

class Animal {                                                                      // declaring animals of all types
    private $name;
    private $number;
    private $min_production;
    private $max_production;
    function __construct($name, $number, $min_production, $max_production) {
        $this->name   = $name;
        $this->number = $number;
        $this->min_production = $min_production;
        $this->max_production = $max_production; 
    }
    public function getProduction() {
        return rand($this->min_production, $this->max_production);
    }
    public function getNumberOfAnimal() {
        return $this->number;
    }
    public function getNameOfAnimal() {
        return $this->name;
    }
}

function getAmountOfAnimals($typeOfAnimals) {                                                   
    return count($typeOfAnimals);
}

function simulateOneWeek($typeOfAnimals) {
    $totalamount = 0;
    for ($i = 0; $i < count($typeOfAnimals); $i++) {
        for ($j = 1; $j < 8; $j++) {
            for ($k = 0; $k < count($typeOfAnimals[$i]); $k++) {
            $totalamount += $typeOfAnimals[$i][0]->getProduction();
            }
            
        }
        echo "Животное типа " . $typeOfAnimals[$i][0]->getNameOfAnimal() . " дало добычи: " . $totalamount . PHP_EOL;
        $totalamount = 0;
    }
    echo PHP_EOL;
}

function buyNewAnimals($name, $amount, $min_production, $max_production) {
    $newAnimal = array();
    for ($i = 0; $i < $amount; $i++) {
        $newAnimal[] = new Animal($name, rand(1,9999), $min_production, $max_production);
    }
    return $newAnimal;
}

function updateFarm(&$farm, $animal) {
    array_push($farm, $animal);
}

function seeFarm($farm) {
    for ($i = 0; $i < count($farm); $i++) {
        echo "На данный момент на ферме " . count($farm[$i]) ." " . $farm[$i][0]->getNameOfAnimal() . PHP_EOL;
    }
}

// starting a program, buying new animals
$farm = array();                                          // main array of farm

$cows = buyNewAnimals("cows", 10, 8, 12);                 // buying cows to a new farm
updateFarm($farm, $cows);

$chickens = buyNewAnimals("chickens", 20, 0, 1);          // buying chickens to a new farm
updateFarm($farm, $chickens);

seeFarm($farm);

simulateOneWeek($farm);

$straus = buyNewAnimals("straus", 5, 3, 5);
updateFarm($farm, $straus);

seeFarm($farm);

simulateOneWeek($farm);




?>



