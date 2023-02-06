<?php
class Name
{
    public function __construct($xName,$yName)
    {
        echo "Hello, I am ".$xName." ".$yName;
    }
    public $fname = "Ashfaq";
    public $lname = "Muhammad";
    private $lastName = "Islam";
    public function getName()
    {
        echo "<br>Hello, my first name is ".$this->fname." and my last name is ".$this->lname;
        echo "<br> I am ".$this->fname." ".$this->lname;
    }
    public function getLastName()
    {
        echo "<br><br>My actual last name is " . $this->lastName;
    }
    public function setLastName()
    {
        $this->lastName = "Muhammad";
    }
    public function __destruct()
    {
        echo "<br>I am destroyed.";
    }
}
?>