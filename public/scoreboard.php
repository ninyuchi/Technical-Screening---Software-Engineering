<?php
require '../includes/db.php';
$results = $pdo->query("
    SELECT u.display_name, COALESCE(SUM(s.points), 0) AS total_points 
    FROM users u 
    LEFT JOIN scores s ON u.id = s.user_id 
    GROUP BY u.id 
    ORDER BY total_points DESC
")->fetchAll();
?>
<link rel="stylesheet" href="../assets/style.css">
<h2>Live Scoreboard</h2>
<table>
    <thead>
        <tr><th>Participant</th><th>Total Points</th></tr>
    </thead>
    <tbody>
    <?php foreach ($results as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['display_name']) ?></td>
            <td><?= $row['total_points'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    setTimeout(() => location.reload(), 10000); // Refresh every 10 seconds
</script>
