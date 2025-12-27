<?php
namespace App\Entities;
use App\Entities\Personne;

class Patient extends Personne
{
    public int $id;
    public string $gender;
    public string $dateOfBirth;
    public string $address;

    public function __toString(): string
    {
        return $this->getFullName() . " ({$this->gender})";
    }
}
