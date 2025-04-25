<?php

namespace Posts;

class Users
{
    public function ageCheck($age, $gender): bool 
    {
        if ($age < 10 && (strtolower($gender) == "мужской" || strtolower($gender) == "male")) {
			return false;
        } else {
            return true;
        }
    }
}