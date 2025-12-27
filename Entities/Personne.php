<?php 
namespace App\Entities;

abstract class Personne{
    protected string $firstname;
    protected string $lastname;
    protected string $phone;
    protected string $email;
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

?>