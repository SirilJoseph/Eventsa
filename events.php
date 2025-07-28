<?php
session_start();
require_once 'server/db.php';

$stmt = $pdo->query("SELECT * FROM events ORDER BY date DESC");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Event-Ease</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'partials/nav.php'; ?>
<div class="container fade">
    <h2>Events</h2>
    <?php if(empty($events)): ?>
        <p>No events found.</p>
    <?php else: ?>
        <ul>
            <?php foreach($events as $event): ?>
                <li>
                    <strong><?php echo htmlspecialchars($event['title']); ?></strong>
                    - <?php echo htmlspecialchars($event['date']); ?>
                    <a class="btn-primary" href="event.php?id=<?php echo $event['id']; ?>">View</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>
