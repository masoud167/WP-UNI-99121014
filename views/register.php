<!-- views/register.php -->
<?php include "layout.php"; ?>

<div class="container">
    <h2>Student Registration</h2>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

    <form action="/FinalExam/public/index.php?action=register" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
