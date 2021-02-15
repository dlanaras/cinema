<?php 

class Customer
{
    public $prename;
    public $lastname;
    public $age;
    public $datetime;
    public $film;

    public function __construct($prename, $lastname, $age, $datetime, $film) 
    {
        $this->prename = $prename;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->datetime = $datetime;
        $this->film = $film;
    }

    public function register_customer() 
    {

    }

    public function create_booking() 
    {

    }
}



// only register user

$prename = readline("Geben Sie die Vorname Ihrer Kunde ein: \n");
$lastname = readline("Geben Sie die Nachname Ihrer Kunde ein: \n");
$age = readline("Wie alt ist Ihre Kunde: \n");

$array = 
[
$test = new Customer($prename, $lastname, $age, "", "")
];

$oldData = file_get_contents('./data/customers.json');
$tempArray = json_decode($oldData);
array_push($tempArray, $array);
$jsonData = json_encode($tempArray);
file_put_contents('./data/customers.json', $jsonData);

//check if customer doesnt already have a booking and then set the film and datetime

/*$prename = readline("Geben Sie die Vorname Ihrer Kunde ein: \n");
$lastname = readline("Geben Sie die Nachname Ihrer Kunde ein: \n");
$age = readline("Wie alt ist Ihre Kunde: \n");
$datetime = readline("Wann wird Ihre Kunde ein Film schauen kommen (Format: DD.MM.YYYY:HH:MM:SS): \n");
$film = readline("Was für einen Film wird Ihre Kunde anschauen: \n");

file get contents
foreach to get name and age to much with input
if it matches with the input and film and datetime arent set -> it fills them with the input given

then use the same or a simular method as seen above to append the data without ruining the JSON format


*/