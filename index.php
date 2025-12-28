<?php

require __DIR__ . '/vendor/autoload.php';

use App\Repositories\PatientRepository;
use App\Repositories\DoctorRepository;
use App\Repositories\DepartmentRepository;
use App\Core\ConsoleTable;
use App\Stats\Statistics;

$patientRepo = new PatientRepository();
$doctorRepo = new DoctorRepository();
$departmentRepo = new DepartmentRepository();



function patientMenu(PatientRepository $repo): void
{
    while (true) {
        echo PHP_EOL . "=== Gestion des Patients ===" . PHP_EOL;
        echo "1. Lister tous les patients" . PHP_EOL;
        echo "2. Ajouter un patient" . PHP_EOL;
        echo "3. Supprimer un patient" . PHP_EOL;
        echo "4. Retour" . PHP_EOL;

        $choice = readline("Choix: ");

        switch ($choice) {
            case 1:
                $patients = $repo->findAll();
                ConsoleTable::render(
                    ['ID', 'Nom', 'Email'],
                    array_map(fn($p) => [
                        $p['patient_id'],
                        $p['first_name'] . ' ' . $p['last_name'],
                        $p['email']
                    ], $patients)
                );
                break;

            case 2:
                $repo->create([
                    readline("Prénom: "),
                    readline("Nom: "),
                    readline("Genre: "),
                    readline("Date de naissance (YYYY-MM-DD): "),
                    readline("Téléphone: "),
                    readline("Email: "),
                    readline("Adresse: ")
                ]);
                echo "✔ Patient ajouté" . PHP_EOL;
                break;

            case 3:
                $id = (int)readline("ID du patient: ");
                $repo->delete($id);
                echo "✔ Patient supprimé" . PHP_EOL;
                break;

            case 4:
                return;
        }
    }
}

function doctorMenu(DoctorRepository $repo): void
{
    while (true) {
        echo PHP_EOL . "=== Gestion des Médecins ===" . PHP_EOL;
        echo "1. Lister tous les médecins" . PHP_EOL;
        echo "2. Ajouter un médecin" . PHP_EOL;
        echo "3. Supprimer un médecin" . PHP_EOL;
        echo "4. Retour" . PHP_EOL;

        $choice = readline("Choix: ");

        switch ($choice) {
            case 1:
                $doctors = $repo->findAll();
                ConsoleTable::render(
                    ['ID', 'Nom', 'Spécialité', 'Département'],
                    array_map(fn($d) => [
                        $d['doctor_id'],
                        $d['first_name'] . ' ' . $d['last_name'],
                        $d['specialization'],
                        $d['department_name'] ?? '—'
                    ], $doctors)
                );
                break;

            case 2:
                $repo->create([
                    readline("Prénom: "),
                    readline("Nom: "),
                    readline("Spécialité: "),
                    readline("Téléphone: "),
                    readline("Email: "),
                    readline("ID Département: ")
                ]);
                echo "Médecin ajouté" . PHP_EOL;
                break;

            case 3:
                $id = (int)readline("ID du médecin: ");
                $repo->delete($id);
                echo "✔ Médecin supprimé" . PHP_EOL;
                break;

            case 4:
                return;
        }
    }
}

function departmentMenu(DepartmentRepository $repo): void
{
    while (true) {
        echo PHP_EOL . "=== Gestion des Départements ===" . PHP_EOL;
        echo "1. Lister tous les départements" . PHP_EOL;
        echo "2. Ajouter un département" . PHP_EOL;
        echo "3. Supprimer un département" . PHP_EOL;
        echo "4. Retour" . PHP_EOL;

        $choice = readline("Choix: ");

        switch ($choice) {
            case 1:
                $deps = $repo->findAll();
                ConsoleTable::render(
                    ['ID', 'Nom', 'Localisation'],
                    array_map(fn($d) => [
                        $d['department_id'],
                        $d['department_name'],
                        $d['location']
                    ], $deps)
                );
                break;

            case 2:
                $repo->create([
                    readline("Nom: "),
                    readline("Localisation: ")
                ]);
                echo "Département ajouté" . PHP_EOL;
                break;

            case 3:
                $id = (int)readline("ID du département: ");
                $repo->delete($id);
                echo "✔ Département supprimé" . PHP_EOL;
                break;

            case 4:
                return;
        }
    }
}



while (true) {
    echo PHP_EOL . "=== Unity Care CLI ===" . PHP_EOL;
    echo "1. Gérer les patients" . PHP_EOL;
    echo "2. Gérer les médecins" . PHP_EOL;
    echo "3. Gérer les départements" . PHP_EOL;
    echo "4. Statistiques" . PHP_EOL;
    echo "5. Quitter" . PHP_EOL;

    $choice = readline("Choix: ");

    switch ($choice) {
        case 1:
            patientMenu($patientRepo);
            break;

        case 2:
            doctorMenu($doctorRepo);
            break;

        case 3:
            departmentMenu($departmentRepo);
            break;

        case 4:
            echo "Âge moyen des patients : " .
                Statistics::averagePatientAge() . " ans" . PHP_EOL;
            break;

        case 5:
            exit("Au revoir " . PHP_EOL);
    }
}
