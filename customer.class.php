<?php 

class Customer
{
    public $prename;
    public $lastname;
    public $age;
    public $date;
    public $film;

    public function __construct($prename, $lastname, $age, $date, $film) 
    {
        $this->prename = $prename;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->date = $date;
        $this->film = $film;
    }

    public function register_customer() 
    {

    }

    public function create_booking() 
    {

    }
}
