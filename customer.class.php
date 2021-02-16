<?php 

class Customer
{
    public $prename;
    public $lastname;
    public $age;
    public $datetime;
    public $film;
    public $room;

    public function __construct($prename, $lastname, $age, $datetime, $film, $room) 
    {
        $this->prename = $prename;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->datetime = $datetime;
        $this->film = $film;
        $this->room = $room;
    }

    public function register_customer() 
    {
        $prename = readline("Geben Sie die Vorname Ihrer Kunde ein: \n");
        $lastname = readline("Geben Sie die Nachname Ihrer Kunde ein: \n");
        $age = readline("Wie alt ist Ihre Kunde: \n");

        $array = 
        [
        $test = new Customer($prename, $lastname, $age, NULL, NULL, NULL)
        ];

        $oldData = file_get_contents('./data/customers.json');
        $tempArray = json_decode($oldData);
        array_push($tempArray, $array);
        $jsonData = json_encode($tempArray);
        file_put_contents('./data/customers.json', $jsonData);
    }

    public function create_booking() 
    {

        $prename = readline("Geben Sie die Vorname Ihrer Kunde ein: \n");
        $lastname = readline("Geben Sie die Nachname Ihrer Kunde ein: \n");
        $age = readline("Wie alt ist Ihre Kunde: \n");
        $datetime = readline("Wann wird Ihre Kunde ein Film schauen kommen (Format: DD.MM.YYYY:HH:MM:SS): \n");
        $film = readline("Was für einen Film wird Ihre Kunde anschauen: \n");
        $room = readline("In welcher Halle wird das Film staat finden: \n");
        
        
        
        
        $oldData = file_get_contents('./data/customers.json');
        $tempArray = json_decode($oldData);
        rsort($tempArray);
        
        foreach($tempArray as $results) 
        {
            foreach($results as $subResult)
            {
                //json object -> php object array -> go into first array -> then go into second array and save ln, pn, ageNum, fm and dt into variables -> then replace this ovbject 
        
                    $ln = $subResult->{'lastname'}; //lastname
                    $pn = $subResult->{'prename'}; //prename
                    $ageNum = $subResult->{'age'}; //age
                    $fm = $subResult->{'film'}; //film name
                    $dt = $subResult->{'datetime'}; // date time
                    $ro = $subResult->{'room'}; //room number
        
                    if($prename == $pn && $lastname == $ln && $ageNum == $age) 
                    {
        
                        if(isset($fm, $dt, $ro)) { // AND isset($dt) != false AND isset($ro) != false) {
                            printf("%s %s ist schon gebucht (Film: %s, Haale: %s und Zeit: %s)", $prename, $lastname, $fm, $ro, $dt);
                            exit();
                        } else {
        
                            $array = 
                            [
                            $test = new Customer($prename, $lastname, $age, $datetime, $film, $room)
                            ];
        
                            unset($subResult);
                            
                            array_push($tempArray, $array);
                            $jsonData = json_encode($tempArray);
                            file_put_contents('./data/customers.json', $jsonData);
                        }
                    }
            }
        }

    }
}



// only register user (will later go to administration.php)

/*$register = new Customer("", "", "", "", "", "");
$register->register_customer();*/


//check if customer doesnt already have a booking and then set the film, datetime and room (aka booking)

/*$book = new Customer("", "", "", "", "", "");
$book->create_booking();*/


//use room class to count total seats of room and then substract them by all the customers that have this room on the same time