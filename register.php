<?php
session_start();
require_once 'server/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users(name, email, password) VALUES(?,?,?)");
    $stmt->execute([$name, $email, $password]);

    $_SESSION['user'] = $name;
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Event-Ease</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'partials/nav.php'; ?>
<form method="post" action="">
    <h2>Create Account</h2>
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="btn-primary">Register</button>
</form>
<script src="assets/js/script.js"></script>
</body>
</html>
