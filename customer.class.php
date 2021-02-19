<?php 

//All PHPDoc is automatically generated and is therefore probably incorrect

/**
 * Customer
 */
class Customer
{    
    /**
     * prename
     *
     * @var mixed
     */
    public $prename;
    public $lastname;
    public $age;
    public $datetime;
    public $film;
    public $room;
    
    /**
     * __construct
     *
     * @param  mixed $prename
     * @param  mixed $lastname
     * @param  mixed $age
     * @param  mixed $datetime
     * @param  mixed $film
     * @param  mixed $room
     * @return void
     */
    public function __construct($prename, $lastname, $age, $datetime, $film, $room) 
    {
        $this->prename = $prename;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->datetime = $datetime;
        $this->film = $film;
        $this->room = $room;
    }
    
    /**
     * register_customer
     *
     * @return void
     */
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
    
    /**
     * create_booking
     *
     * @return void
     */
    public function create_booking() 
    {
        $directory = "./data/";
        $texts = glob($directory . "FS_*.json");
        echo "Die folgende Dateien sind die schon existierende Film-Pläne.\n";


        foreach($texts as $text)
        {
            echo $text . "\n";
        }

        echo "\n";
        $FSDay = readline("Damit die mögliche Filme, die der Kunde anschauen darf, aufgelistet werden können, mussen Sie zuerst den Film-Plan auswählen (FS_ '01_01_2000' .json): \n");
        $filePath = "./data/FS_" . $FSDay .".json";
        $FSData = file_get_contents($filePath);
        $FSDecode = json_decode($FSData);

        $prename = readline("Geben Sie die Vorname Ihrer Kunde ein: \n");
        $lastname = readline("Geben Sie die Nachname Ihrer Kunde ein: \n");
        $age = readline("Wie alt ist Ihre Kunde: \n");
        echo "\n";
        //depending on age show available films on this day 
        foreach($FSDecode as $FSResults)
        {
            foreach($FSResults as $FSResult)
            {
                if($age >= $FSResult->{'ageRestriction'})
                {
                    echo "Film-Name: " . $FSResult->{'filmName'} . ",  Datum/ Zeit: " . $FSResult->{'filmDatetime'} . " und Halle: " . $FSResult->{'cinemaRoom'} . "\n";
                }
            }
        }
        echo "\n";
        echo "(Das sind die Filme, wo dieser Kunde an diesem Tag anschauen darf). \n";
        $film = readline("Was für einen Film wird Ihre Kunde anschauen: \n");
        $room = readline("In welcher Halle wird der Film stattfinden: \n");

        // This only works as long as there isnt the same film playing more than once in the same room
        foreach($FSDecode as $FSResults)
        {
            foreach($FSResults as $FSResult)
            {
                if($film == $FSResult->{'filmName'} AND $room == $FSResult->{'cinemaRoom'})
                {
                    $datetime = $FSResult->{'filmDatetime'};
                }
            }
        }
        //made this an automatic selection since its quite hard to write and is highly unlikely that the same film will play on the same room twice in a single day / Film-Schedule
        //$datetime = readline("Wann wird Ihre Kunde ein Film schauen kommen (Format: DD.MM.YYYY:HH:MM:SS): \n");
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
    
    /**
     * show_booked_customers
     *
     * @return void
     */
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
    /**
     * same_bookings
     *
     * @return void
     */
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
    
    /**
     * remove_booking
     *
     * @return void
     */
    public function remove_booking()
    {
        $newArray = [];
        $oldData = file_get_contents('./data/customers.json');
        $tempArray = json_decode($oldData);
        echo "Empfehlenswert ist, dass Sie in eine zweite Eingabeaufforderung die Buchungen offen haben, denn alle Eingaben genau gleich eingegeben müssen werden. \n";
        $datetime = readline("Geben Sie die Datum der Buchung ein (Format: DD.MM.YYYY:HH:MM:SS): \n");
        $room = readline("Geben Sie die Halle ein: \n");
        $film = readline("Geben Sie den Film ein: \n");
        $prename = readline("Geben Sie die Vorname der Kunde ein: \n");
        $lastname = readline("Geben Sie die Nachname der Kunde ein: \n");
        $age = readline("Geben Sie die Alter der Kunde ein: \n");
        $fullDelete = readline("Wollen Sie auch die Registrierung entfernen? (zu entfernen 'ja' eingeben, sonst die Enter-Taste drücken): \n");

        foreach($tempArray as $results) 
        {
            foreach ($results as $subResult)
            {
                if($fullDelete == "ja")
                {
                    if ($subResult->{'prename'} == $prename AND $subResult->{'lastname'} == $lastname AND $subResult->{'age'} == $age)
                    {
                        echo "Wenn Sie die folgenden Nachricht 2 Mal sehen können, bedeutet dies, dass Sie die Listung gelöscht haben";
                        print_r($subResult);
                        unset($subResult);
                    } 
                    else
                    {
                        $handle = fopen('./data/customers.json', "a+");
                        array_push($newArray,  array($subResult));
                        $encoded = json_encode($newArray);
                        file_put_contents('./data/customers.json', $encoded);
                        fclose($handle);
                    }
                }
                else 
                {
                    
                    if ($subResult->{'datetime'} == $datetime AND $subResult->{'film'} == $film AND $subResult->{'room'} == $room AND $subResult->{'prename'} == $prename AND $subResult->{'lastname'} == $lastname AND $subResult->{'age'} == $age)
                    {
                        echo "Wenn Sie die folgenden Nachricht sehen können, bedeutet dies, dass Sie die Listung gelöscht haben";
                        print_r($subResult);
                        unset($subResult);
                    } 
                    else
                    {
                        $handle = fopen('./data/customers.json', "a+");
                        array_push($newArray,  array($subResult));
                        $encoded = json_encode($newArray);
                        file_put_contents('./data/customers.json', $encoded);
                        fclose($handle);
                    }
                }
            }
        }
    }
}
