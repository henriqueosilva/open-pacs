<?php

declare(strict_types=1);

namespace App\Medical\Users;

use App\Medical\Users\Roles\Tecnico;

class UserClass
{
    public function __construct(private string $firstName, private string $lastName, private string $birthDate, private string $username ){

    }

    public function setRole(){

    }
}