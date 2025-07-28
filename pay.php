<?php
session_start();
require_once 'server/db.php';

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$event_id = (int)$_POST['event_id'];
$stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
$stmt->execute([$event_id]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$event) die('Event not found');

$amount = $event['price'] * 100; // amount in paisa
$orderData = [
    'key' => 'YOUR_RAZORPAY_KEY',
    'amount' => $amount,
    'name' => 'Event-Ease',
    'description' => $event['title'],
    'prefill' => [
        'name' => $_SESSION['user'],
        'email' => ''
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Event-Ease</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
<?php include 'partials/nav.php'; ?>
<div class="container fade">
    <h2>Pay for <?php echo htmlspecialchars($event['title']); ?></h2>
    <button id="rzp-button" class="btn-primary">Pay <?php echo $event['price']; ?></button>
</div>
<script>
var options = <?php echo json_encode($orderData); ?>;
options.handler = function (response){
    window.location = 'success.php?event_id=<?php echo $event_id; ?>';
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
</body>
</html>
