<?php include "layout.php"; ?>

<h2>Student Registration</h2>

<?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
<?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

<form action="/FinalExam/public/index.php?action=register" method="POST" class="mb-3">
    <div class="mb-3">
        <label for="username">Username:</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>

</div></body></html>
