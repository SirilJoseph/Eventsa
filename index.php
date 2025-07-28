<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event-Ease</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <nav>
        <div class="logo"><a href="index.php">Event-Ease</a></div>
        <div class="links">
            <?php if(isset($_SESSION['user'])): ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
<section class="hero fade">
    <div>
        <h1>Plan and manage your events effortlessly</h1>
        <p>Create, book and manage events with a minimal, responsive interface.</p>
        <a class="btn-primary" href="events.php">Browse Events</a>
    </div>
</section>
<footer>
    &copy; <?php echo date('Y'); ?> Event-Ease
</footer>
<script src="assets/js/script.js"></script>
</body>
</html>
