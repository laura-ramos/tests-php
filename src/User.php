<?php

namespace App;

class User {

    public $firstName;
    public $lastName;
    public $age;


    public function mayorEdad () {
        $age = $this->age;
        if($age<18) {
            $ageOK = false;
        }else{
            $ageOK = true;
        }
        return $ageOK;
    }
       

}