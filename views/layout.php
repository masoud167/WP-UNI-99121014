<!DOCTYPE html>
<html>
<head>
    <title>Final Exam</title>
    <link rel="stylesheet" href="/FinalExam/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container bg-white p-4 rounded shadow-sm">

    <?php if (!isset($_GET['action']) || $_GET['action'] !== 'home'): ?>
        <a href="/FinalExam/public/" class="btn btn-secondary mb-3">🏠 Home</a>
    <?php endif; ?>