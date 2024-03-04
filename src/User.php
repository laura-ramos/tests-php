<?php

class User
{

    /**
     * First name
     * @var string
     */
    public $first_name;
    
    /**
     * Last name
     * @var string
     */
    public $surname;

    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }
}