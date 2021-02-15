<?php

class Room 
{
    public $roomName;
    public $totalSeats;

    public function __construct($roomName, $totalSeats) 
    {
        $this->roomName = $roomName;
        $this->totalSeats= $totalSeats;
    }
}