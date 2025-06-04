<?php
// controllers/UserController.php

require_once "../models/User.php";

class UserController {
    public function register() {
        $success = $error = null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($username) || empty($email) || empty($password)) {
                $error = "All fields are required.";
            } else {
                // Hash password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $user = new User();
                $result = $user->create($username, $email, $hashedPassword);

                if ($result === true) {
                    $success = "Registration successful!";
                } else {
                    $error = $result;
                }
            }
        }

        include "../views/register.php";
    }
}
