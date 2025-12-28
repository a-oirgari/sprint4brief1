<?php

require_once 'config/Database.php';

class Statistics
{
    public static function averagePatientAge(): float
    {
        $db = Database::getConnection();
        return (float)$db->query("
            SELECT AVG(TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()))
            FROM patients
        ")->fetchColumn();
    }
}
