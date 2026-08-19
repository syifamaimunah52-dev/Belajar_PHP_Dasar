<?php

class Person {
    
    public $warna = "kuning";

    public function salam(){
        echo "payung itu berwarna" . $this->warna;
    }
}

$payung = new Person();
//var_dump($payung)
echo $payung->warna; 
echo "<br>";
$payung->salam();

?>