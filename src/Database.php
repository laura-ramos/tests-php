<?php

class Database
{
    public function getPersonByID($id)
    {
        // do some stuff in the db to get a person by their ID
        return sql("select * from person where id = $id limit 1;")[0];
    }
}
