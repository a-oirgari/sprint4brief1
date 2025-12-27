<?php
namespace App\repositories;
use App\Config\Database;
use \PDO;
// require_once __DIR__ . '/../config/Database.php';

class PatientRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array
    {
        return $this->db->query("SELECT * FROM patients")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare("
            INSERT INTO patients 
            (first_name, last_name, gender, date_of_birth, phone_number, email, address)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute($data);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM patients WHERE patient_id = ?");
        $stmt->execute([$id]);
    }
}
