<?php
namespace App\repositories;
use App\Config\Database;
use \PDO;
// require_once __DIR__ . '/../config/Database.php';

class DepartmentRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array
    {
        return $this->db
            ->query("SELECT * FROM departments")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM departments WHERE department_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare("
            INSERT INTO departments (department_name, location)
            VALUES (?, ?)
        ");
        $stmt->execute($data);
    }

    public function update(int $id, array $data): void
    {
        $stmt = $this->db->prepare("
            UPDATE departments
            SET department_name = ?, location = ?
            WHERE department_id = ?
        ");
        $stmt->execute([...$data, $id]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM departments WHERE department_id = ?");
        $stmt->execute([$id]);
    }
}
