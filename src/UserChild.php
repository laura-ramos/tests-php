<?php

class UserChild extends User
{
    public function getToken()
    {
        return parent::getToken();
    }
}
