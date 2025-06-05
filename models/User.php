<?php
// models/User.php

require_once __DIR__ . '/../config/database.php';

class User {
    public function create($username, $email, $hashedPassword) {
        global $pdo;

        try {
            // Check if username or email already exists
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$username, $email]);
            $exists = $stmt->fetchColumn();

            if ($exists > 0) {
                return "Username or email is already registered.";
            }

            // Insert new user
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            return true;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    public function getAll() {
    global $pdo;

    try {
        $stmt = $pdo->query("SELECT * FROM users ORDER BY username ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}


}
