<?php
namespace App\repositories;
use App\Config\Database;
use \PDO;
// require_once __DIR__ . '/../config/Database.php';

class DoctorRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array
    {
        $sql = "
            SELECT d.doctor_id, d.first_name, d.last_name, d.specialization,
                   d.phone_number, d.email, dep.department_name
            FROM doctors d
            LEFT JOIN departments dep ON d.department_id = dep.department_id
        ";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM doctors WHERE doctor_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare("
            INSERT INTO doctors
            (first_name, last_name, specialization, phone_number, email, department_id)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute($data);
    }

    public function update(int $id, array $data): void
    {
        $stmt = $this->db->prepare("
            UPDATE doctors SET
            first_name = ?, last_name = ?, specialization = ?,
            phone_number = ?, email = ?, department_id = ?
            WHERE doctor_id = ?
        ");
        $stmt->execute([...$data, $id]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM doctors WHERE doctor_id = ?");
        $stmt->execute([$id]);
    }
}
