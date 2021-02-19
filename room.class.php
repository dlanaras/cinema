<?php

class Room
{
    public $roomName;
    public $seats;

    public function __construct($roomName, $seats)
    {
        $this->roomName = $roomName;
        $this->seats = $seats;
    }

    private function first_assign()
    {
        $handle = fopen("./data/rooms.json", "a+");
        
        for($i = 1; $i < 10; $i++)
        {
            $oldData = file_get_contents("./data/rooms.json");
            $tempArray = json_decode($oldData);

            if ($oldData != NULL) 
            {
                $seats = readline("Wie viele Plätze gibt es in der Halle " . $i . "? \n"); 
                $array = 
                [
                $test = new Room($i, $seats)
                ];

                array_push($tempArray, $array);
                $jsonData = json_encode($tempArray);
                file_put_contents("./data/rooms.json", $jsonData);
            } 
            else 
            {
                $seats = readline("Wie viele Plätze gibt es in der Halle 1? \n"); 
                $first =
                array(
                $theFirst = new Room($i, $seats)
                );

                $jsonData = json_encode($first);
                fwrite($handle, "[" . $jsonData . "]"); //added Square brackets to match the other json objects/arrays
                fclose($handle);
            }
        }
    }
    //let user assign seats
}

/* should only be used once
$firstAssign = new Room("", "");
$firstAssign->first_assign();
*/