<?php
require_once __DIR__ . '/../config/database.php';

class Post {
    public function createDummyPosts($userId, $count = 5) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");

        for ($i = 1; $i <= $count; $i++) {
            $title = "Post $i from User $userId";
            $content = "Random content " . bin2hex(random_bytes(10));
            $stmt->execute([$userId, $title, $content]);
        }
    }
}
