<?php

class FS_CRUD 
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