<?php

class MachineLearning{

    public $prop = 1;

    public function __construct(){

    }

    public static $aula = 'web';

    public function teste(){
        echo $this->toString();
        echo self::toString();
        echo static::$aula;
    }
    public function toString(){
        echo get_class($this) . "\r\n";
    }
}

class Tree extends MachineLearning{
    const PI = 3.14;
    private $algoritmo;

    public function __set($prop, $valor){
        $this->$prop = $valor;
    }

    public function __get($prop){
        return $this->$prop;
    }

    public function setAlgoritmo($a){
        $this->algoritmo = $a;
    }

    public function getAlgoritmo(){
        return $this->algoritmo;
    }

    public function toString(){
        echo get_class($this) . "\r\n";
    }

}


$o1 = new MachineLearning();
$o2 = new Tree();

#$o1->toString();
$o2->teste();

#$o2->setAlgoritmo('Tree');
$o2->algoritmo = 'Tree';
echo $o2->algoritmo;