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

    public function add_To_FS()
    {

    }

    public function remove_From_FS()
    {

    }

    public function replace_From_FS() 
    {
        
    }
}

$fscreate = new FS_CRUD("", "", "", "", "", "");
$fscreate->create_FS();