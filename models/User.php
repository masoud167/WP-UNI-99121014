<?php
// models/User.php

require_once __DIR__ . '/../config/database.php';

class User {
    public function create($username, $email, $hashedPassword) {
        global $pdo;

        try {
            // Prepare SQL
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);
            return true;
        } catch (PDOException $e) {
            // Handle duplicate entry error
            if ($e->getCode() == 23000) {
                return "Username or email already exists.";
            }
            return "Error: " . $e->getMessage();
        }
    }
}
