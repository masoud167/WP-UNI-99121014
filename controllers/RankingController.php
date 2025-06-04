<?php
require_once "../config/database.php";

class RankingController {
    public function rankPosts() {
        global $pdo;

        // 1. Get all post IDs
        $posts = $pdo->query("SELECT id FROM posts ORDER BY id")->fetchAll(PDO::FETCH_COLUMN);
        $n = count($posts);

        // Map post IDs to index
        $postIndex = array_flip($posts);

        // 2. Get view counts
        $views = [];
        $stmt = $pdo->query("SELECT post_id, COUNT(*) as count FROM post_views GROUP BY post_id");
        foreach ($stmt as $row) {
            $views[$row['post_id']] = $row['count'];
        }

        // 3. Get related posts
        $relations = [];
        foreach ($posts as $postId) {
            $stmt = $pdo->prepare("SELECT related_post_id FROM related_posts WHERE post_id = ?");
            $stmt->execute([$postId]);
            $relations[$postId] = $stmt->fetchAll(PDO::FETCH_COLUMN);
        }

        // 4. Build matrix A
        $A = array_fill(0, $n, array_fill(0, $n, 0.0));

        foreach ($posts as $iId) {
            $i = $postIndex[$iId];
            $related = $relations[$iId] ?? [];

            // Skip if no related posts
            if (count($related) === 0) continue;

            $sum = 0;
            foreach ($related as $jId) {
                $sum += $views[$jId] ?? 0;
            }

            foreach ($related as $jId) {
                $j = $postIndex[$jId];
                if ($sum > 0) {
                    $A[$i][$j] = ($views[$jId] ?? 0) / $sum;
                }
            }
        }

        // 5. Power method
        $v = array_fill(0, $n, 1 / $n);
        for ($iter = 0; $iter < 100; $iter++) {
            $v_new = array_fill(0, $n, 0.0);
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    $v_new[$i] += $A[$i][$j] * $v[$j];
                }
            }

            $norm = array_sum($v_new);
            foreach ($v_new as &$x) {
                $x /= $norm;
            }
            $v = $v_new;
        }

        // 6. Sort and show
        $ranked = [];
        foreach ($posts as $i => $postId) {
            $ranked[] = ['post_id' => $postId, 'score' => $v[$i]];
        }

        usort($ranked, fn($a, $b) => $b['score'] <=> $a['score']);

        echo "<h2>Post Rankings (Most Important First)</h2><ol>";
        foreach ($ranked as $row) {
            echo "<li>Post ID {$row['post_id']} — Score: " . round($row['score'], 5) . "</li>";
        }
        echo "</ol>";
    }
}
