<?php
session_start();
require_once 'server/db.php';

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$event_id = (int)$_GET['event_id'];
// Here you would normally verify the payment and store booking details

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - Event-Ease</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'partials/nav.php'; ?>
<div class="container fade">
    <h2>Payment Successful!</h2>
    <p>Your booking for event #<?php echo $event_id; ?> has been confirmed.</p>
    <a href="dashboard.php" class="btn-primary">Go to Dashboard</a>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>
