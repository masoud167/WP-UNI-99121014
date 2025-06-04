<?php
require_once __DIR__ . '/../config/database.php';

class PostView {
    public function generateViews() {
        global $pdo;

        $posts = $pdo->query("SELECT id FROM posts")->fetchAll(PDO::FETCH_COLUMN);
        $users = $pdo->query("SELECT id FROM users")->fetchAll(PDO::FETCH_COLUMN);

        $stmt = $pdo->prepare("INSERT INTO post_views (post_id, user_id) VALUES (?, ?)");

        foreach ($posts as $postId) {
            $viewCount = rand(100, 1000);

            for ($i = 0; $i < $viewCount; $i++) {
                $userId = $users[array_rand($users)];
                $stmt->execute([$postId, $userId]);
            }
        }
    }
}
