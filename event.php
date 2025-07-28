<?php
session_start();
require_once 'server/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
$stmt->execute([$id]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$event) {
    die('Event not found');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($event['title']); ?> - Event-Ease</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
<?php include 'partials/nav.php'; ?>
<div class="container fade">
    <h2><?php echo htmlspecialchars($event['title']); ?></h2>
    <p>Date: <?php echo htmlspecialchars($event['date']); ?></p>
    <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
    <form action="pay.php" method="POST">
        <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
        <button type="submit" class="btn-primary">Book Now</button>
    </form>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>
