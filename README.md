# 🏥 Unity Care Clinic – Version CLI (PHP 8)

## 📌 Contexte du projet

Ce projet est une **version console (CLI)** du système *Unity Care Clinic*, développée après une première version web procédurale.

L’objectif est de **refactoriser la logique métier en PHP orienté objet**, en s’appuyant sur une **architecture claire, maintenable et extensible**, tout en utilisant une **base de données MySQL existante**.

Cette application est destinée à un usage **interne**, permettant la gestion rapide des données sans passer par une interface web.

---

## 🎯 Objectifs pédagogiques

- Appliquer les principes de la **Programmation Orientée Objet (POO)** en PHP 8
- Utiliser l’**héritage**, l’**encapsulation** et la **séparation des responsabilités**
- Implémenter une **interface console interactive**
- Manipuler une base de données MySQL via **PDO**
- Mettre en place des opérations **CRUD**
- Calculer des **statistiques** via des méthodes statiques
- Produire un affichage **ASCII formaté**

---

## 🛠️ Technologies utilisées

- **PHP 8**
- **PDO (PHP Data Objects)**  
- **MySQL**
- Application **CLI (Console)**
- Architecture orientée objet

> ⚠️ Bien que le brief mentionne MySQLi, **PDO a été utilisé conformément aux consignes du professeur**.

---

## 🗂️ Structure du projet

unity-care-cli/
│
├── config/
│ └── Database.php
│
├── core/
│ ├── Validator.php
│ └── ConsoleTable.php
│
├── Entities/
│ ├── Personne.php
│ ├── Patient.php
│ ├── Doctor.php
│ └── Department.php
│
├── repositories/
│ ├── PatientRepository.php
│ ├── DoctorRepository.php
│ └── DepartmentRepository.php
│
├── stats/
│ └── Statistics.php
│
├── index.php
└── README.md


---

## 🧩 Base de données

Le projet utilise une **base de données MySQL existante**, conforme à l’ERD fourni (patients, doctors, departments, appointments, etc.).

Tables principales utilisées dans cette version :
- `patients`
- `doctors`
- `departments`

Les relations sont respectées conformément au schéma.

---

## 📋 Fonctionnalités implémentées

### 🔹 Menu principal
=== Unity Care CLI ===

1- Gérer les patients

2- Gérer les médecins

3- Gérer les départements

4-Statistiques

5- Quitter


---

### 🔹 Gestion des Patients
- Lister tous les patients
- Ajouter un patient
- Supprimer un patient

---

### 🔹 Gestion des Médecins
- Lister tous les médecins
- Ajouter un médecin
- Modifier un médecin
- Supprimer un médecin

---

### 🔹 Gestion des Départements
- Lister tous les départements
- Ajouter un département
- Modifier un département
- Supprimer un département

---

### 🔹 Statistiques
- Calcul de l’âge moyen des patients

---

## 🧪 Validation des données

Une classe statique `Validator` est utilisée pour :
- Vérifier les emails
- Vérifier les numéros de téléphone
- Vérifier les dates
- Nettoyer les entrées utilisateur

Ces validations sont prévues pour être utilisées dans les setters et lors des saisies CLI.

---

## 📊 Affichage ASCII

Les données sont affichées sous forme de **tableaux ASCII** dans la console grâce à la classe `ConsoleTable`.

Exemple :
+----+------------+----------------------+
| ID | Nom | Email |
+----+------------+----------------------+
| 1 | Ali Karim | ali@email.com
 |
+----+------------+----------------------+


---

## ▶️ Lancer le projet

1. Configurer la base de données dans `config/Database.php`
2. Se placer à la racine du projet
3. Exécuter la commande :

```bash
php index.php


👨‍💻 Auteur

Projet réalisé dans un cadre pédagogique
Unity Care Clinic – PHP POO CLI