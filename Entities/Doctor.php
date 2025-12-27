<?php
namespace App\Entities;
use App\Entities\Personne;

class Doctor extends Personne
{
    public int $id;
    public string $specialization;
    public int $departmentId;
}
