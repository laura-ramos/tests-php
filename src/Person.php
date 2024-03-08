<?php
class Person
{
  public $db = null;
  function __construct($db)
  {
    $this->db = $db;
  }
  
  public function greeting($id)
  {
    $friend = $this->db->getPersonByID($id);
    $friendName = $friend->name;
    return "Hola $friendName";
  }

  public function getAge($id)
  {
    $person = $this->db->getPersonByID($id);
    $edad = $person->age;

    if ($edad >= 18) {
      return "Mayor de edad";
    } else {
      return "Menor de edad";
    }
  }
}
