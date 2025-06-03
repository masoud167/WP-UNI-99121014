<?php
// config/database.php

$host = 'localhost';
$dbname = 'exam_project_db';  // We’ll create this database in phpMyAdmin later
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
