<?php include "layout.php"; ?>

<div class="container">
    <h2>Registered Students (Alphabetical Order)</h2>

    <?php if (empty($users)): ?>
        <p>No students registered yet.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <strong><?= htmlspecialchars($user['username']) ?></strong> — <?= htmlspecialchars($user['email']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

</body>
</html>
