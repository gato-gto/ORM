<?php

use BaseModel\BaseModel;

class User extends BaseModel
{

    private string $firstName;
    private ?string $lastName;
    private ?int $age;


    public function __construct($id = null, $firstName = null, $lastName = null, $age = null)
    {
        $this->set('id', $id);
        $this->set('firstName', $firstName);
        $this->set('lastName', $lastName);
        $this->set('age', $age);
        parent::__construct();

    }


}

