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

    public function show_booked_customers()
    {
        $i = 0;
        $oldData = file_get_contents('./data/customers.json');
        $tempArray = json_decode($oldData);

        foreach($tempArray as $results) 
        {
            foreach($results as $result)
            {

                if (isset($result->{'datetime'}) == true AND isset($result->{'film'}) == true AND isset($result->{'room'}) == true)
                {
                $i++;
                printf("Kunde: %d\n", $i);
                echo "----------------------------------------------------------\n";
                echo "Vorname: " . $result->{'prename'} . "\n";
                echo "Nachname: " . $result->{'lastname'} . "\n";
                echo "Alter: " . $result->{'age'} . "\n";
                echo "Zeit/ Datum: " . $result->{'datetime'} . "\n";
                echo "Film: " . $result->{'film'} . "\n";
                echo "Halle: " . $result->{'room'} . "\n";
                echo "----------------------------------------------------------\n\n";
                }
            }
        }
    }

    //shows how many customers are going to watch the same movie at the same time at the same room
    public function same_bookings()
    {
        $same = 0;
        
        $oldData = file_get_contents('./data/customers.json');
        $tempArray = json_decode($oldData);
        $room = readline("Wählen Sie eine Halle aus (1-9): \n");
        $datetime = readline("Wählen sie eine Zeit aus (Format: DD.MM.YYYY:HH:MM:SS): \n");

        foreach($tempArray as $results) 
        {
            foreach($results as $subResult)
            {
                if (isset($subResult->{'datetime'}) == true AND isset($subResult->{'film'}) == true AND isset($subResult->{'room'}) == true)
                {
                    if($room == $subResult->{'room'} AND $datetime == $subResult->{'datetime'})
                    {
                        $same++;
                        printf("Kunde: %d\n", $same);
                        echo "----------------------------------------------------------\n";
                        echo "Vorname: " . $subResult->{'prename'} . "\n";
                        echo "Nachname: " . $subResult->{'lastname'} . "\n";
                        echo "Alter: " . $subResult->{'age'} . "\n";
                        echo "Zeit/ Datum: " . $subResult->{'datetime'} . "\n";
                        echo "Film: " . $subResult->{'film'} . "\n";
                        echo "Halle: " . $subResult->{'room'} . "\n";
                        echo "----------------------------------------------------------\n\n";
                    }
                }
            }
        }
        $freeSeats = 80 - $same;
        printf("In der Halle: %d am: %s gibt es insgesamt noch: %d freie Plätze", $room, $datetime, $freeSeats);
    }
}