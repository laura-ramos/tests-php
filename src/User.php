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

    /**
     * Unique identifier
     * @var integer
     */
    protected $user_id;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_id = rand();
    }

    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    protected function getToken()
    {
       return rand();
    }

    private function getID()
    {
       return 50;
    }

    private function getPrivateMethod($number)
    {
       return $number;
    }
}