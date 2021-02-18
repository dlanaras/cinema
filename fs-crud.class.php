<?php

class FS_CRUD //Film Schedule - Create Remove Update Delete
{
    public $filmName;
    public $filmDesc;
    public $filmDatetime;
    public $cinemaRoom;
    public $price;
    public $ageRestriction;

    public function __construct($filmName, $filmDesc, $filmDatetime, $cinemaRoom, $price, $ageRestriction) 
    {
        $this->filmName = $filmName;
        $this->filmDesc = $filmDesc;
        $this->filmDatetime = $filmDatetime;
        $this->cinemaRoom = $cinemaRoom;
        $this->price = $price;
        $this->ageRestriction = $ageRestriction;
    }


    public function create_FS() 
    {
        //Choose Day for Film-Schedule (Name of Film-Schedule includes day)
        $answer = "ja";
        echo "Da können Sie weitere Filme in einen schon existiereneden Film-Plan einfügen oder einen neuen Filmplan erstellen\n";
        $FSDay = readline("An welchem Tag wird dieser Film-Plan stattfinden (Format: DD_MM_YYYY): \n");
        $filePath = "./data/FS_" . $FSDay .".json";
        $handle = fopen($filePath, "a+");


        while($answer != "nein")
        {
            $oldData = file_get_contents($filePath);
            $tempArray = json_decode($oldData);

            if ($oldData != NULL) 
            {
                $filmName = readline("Wie heisst der Film: \n");
                $filmDesc = readline("Geben Sie eine kurze Beschreibung des Filmes: \n");
                $filmDatetime = readline("Wann findet der Film statt (Format: DD.MM.YYYY:HH:MM:SS): \n");
                $cinemaRoom = readline("In welcher Halle findet der Film statt: \n");
                $price = readline("Wie viel Kostet ein Billet für diesen Film (Format: 12.35): \n");
                $ageRestriction = readline("Was ist die Altersfreigabe für diesen Film: \n");

                $array = 
                [
                $test = new FS_CRUD($filmName, $filmDesc, $filmDatetime, $cinemaRoom, $price, $ageRestriction)
                ];

                array_push($tempArray, $array);
                $jsonData = json_encode($tempArray);
                file_put_contents($filePath, $jsonData);
                $answer = readline("Wollen Sie einen weiteren Film einfügen (Die Enter-Taste drücken um weitere Filme einfügen, sonst 'nein' eingeben): \n");
            } 
            else 
            {
                $filler =
                array(
                $fill = new FS_CRUD("first", "JSON", "array", "is", "a", "filler")
                );

                $jsonData = json_encode($filler);
                fwrite($handle, "[" . $jsonData . "]"); //added Square brackets to match the other json objects/arrays

                //file_put_contents($filePath, $filler); Didn't want to work had to use fwrite() instead
                fclose($handle);
            }
        }
    }

    // was originally a method for appending, but since the othere method does that i decided to replace it with a method that shows a specific Film-Schedule

    public function show_FS()
    {
        //recomended to open cmd twice one to be able to see the list here and the other to select what to delete and what to replace

        $directory = "./data/";
        $texts = glob($directory . "FS_*.json");
        echo "Die folgende Dateien sind die schon existierende Film-Pläne.\n";


        foreach($texts as $text)
        {
            echo $text . "\n";
        }
    echo "\n";
    $FSDay = readline("Um einen Film-Plan genauer anzuschauen geben Sie die Datum des Film-Plans ein (FS_ '01_01_2000' .json): \n");
    $filePath = "./data/FS_" . $FSDay .".json";
    $FSData = file_get_contents($filePath);
    $FSDecode = json_decode($FSData);

    foreach($FSDecode as $results) 
    {
        //print_r($testing = array_slice($results, 1, sizeof($results, 0)));
        foreach($results as $result)
        {
            echo "----------------------------------------------------------\n";
            echo "Name: " . $result->{'filmName'} . "\n";
            echo "Beschreibung: " . $result->{'filmDesc'} . "\n";
            echo "Zeit: " . $result->{'filmDatetime'} . "\n";
            echo "Halle: " . $result->{'cinemaRoom'} . "\n";
            echo "Preis: " . $result->{'price'} . "\n";
            echo "Altersfreigabe: " . $result->{'ageRestriction'} . "\n";
            echo "----------------------------------------------------------\n\n";
        }
    }
    }


    public function remove_From_FS()
    {
        //TODO: use name, room and datetime for the deletion of a whole array
        //This should also be used to remove the fillers
        $newArray = [];
        $directory = "./data/";
        $texts = glob($directory . "FS_*.json");
        echo "Die folgende Dateien sind die schon existierende Film-Pläne.\n";


        foreach($texts as $text)
        {
            echo $text . "\n";
        }

        $FSDay = readline("\nVordem Sie eine Listung löschen, mussen Sie den Film-Plan auswählen (FS_ '01_01_2000' .json): \n");
        $filePath = "./data/FS_" . $FSDay .".json";
        $FSData = file_get_contents($filePath);
        $FSDecode = json_decode($FSData);
        echo "Empfehlenswert ist, dass Sie in eine zweite Eingabeaufforderung die Listugen offen haben, denn alle Eingaben genau gleich eingegeben müssen werden. \n";
        $filmName = readline("Wie heisst der Film: \n");
        $filmDesc = readline("Geben Sie eine kurze Beschreibung des Filmes: \n");
        $filmDatetime = readline("Wann findet der Film statt (Format: DD.MM.YYYY:HH:MM:SS): \n");
        $cinemaRoom = readline("In welcher Halle findet der Film statt: \n");
        $price = readline("Wie viel Kostet ein Billet für diesen Film (Format: 12.35): \n");
        $ageRestriction = readline("Was ist die Altersfreigabe für diesen Film: \n");
        //$toBeDeleted = readline("Wählen sie die Listung, die Sie löschen wollen (Geben Sie die Index davon ein): \n");
        foreach($FSDecode as $results) 
        {
            foreach ($results as $result)
            {

                //if user input matches foreach loop delete this result
                if ($filmName == $result->{'filmName'} AND $filmDesc == $result->{'filmDesc'} AND $filmDatetime == $result->{'filmDatetime'} AND $cinemaRoom == $result->{'cinemaRoom'} AND $price == $result->{'price'} AND $ageRestriction == $result->{'ageRestriction'})
                {
                    echo "Wenn Sie die folgenden Nachricht sehen können, bedeutet dies, dass Sie die Listung gelöscht haben";
                    print_r($result);
                    unset($result);
                    //echo "here ends first vardump";
                    //unset($results, $toBeDeleted);
                    //print_r(array_keys($results));
                    /*$array = array_diff( $array, array($value) );
                    return $array;
                    */
                } 
                else
                {
                    $handle = fopen($filePath, "a+");
                    array_push($newArray,  array($result));
                    $encoded = json_encode($newArray);
                    //fwrite($handle, $encoded);
                    file_put_contents($filePath, $encoded);
                    fclose($handle);

                    //$jsonData = json_encode($tempArray);

                }

            }

        }
    }

    /*public function replace_From_FS() 
    {
    } */
}