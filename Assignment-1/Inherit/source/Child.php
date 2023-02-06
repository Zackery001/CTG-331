<?php
include "Parent.php";
include "Weight.php";
include "Height.php";
class Child extends Parents
{
    use weight;
    use height;

    private $age = " 16";
    public function info(){
        echo "Hello coderstrust, my age is". $this->age."<br>And my last name is ".$this->lastname."<br>" ;

    }
}
?>