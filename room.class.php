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

    public function assign_seats($roomName, $seats)
    {
        fopen("./data/rooms.json");
        
    }
}