<?php
require_once __DIR__ . '/../config/database.php';

class RelatedPost {
    public function linkRandomRelatedPosts() {
        global $pdo;

        // Get all post IDs
        $posts = $pdo->query("SELECT id FROM posts")->fetchAll(PDO::FETCH_COLUMN);

        foreach ($posts as $postId) {
            $related = array_rand(array_flip(array_diff($posts, [$postId])), rand(2, 4)); // 2–4 random others
            if (!is_array($related)) $related = [$related];

            $stmt = $pdo->prepare("INSERT INTO related_posts (post_id, related_post_id) VALUES (?, ?)");

            foreach ($related as $r) {
                // Avoid duplicate relations
                $check = $pdo->prepare("SELECT * FROM related_posts WHERE post_id = ? AND related_post_id = ?");
                $check->execute([$postId, $r]);
                if ($check->rowCount() === 0) {
                    $stmt->execute([$postId, $r]);
                }
            }
        }
    }
}
