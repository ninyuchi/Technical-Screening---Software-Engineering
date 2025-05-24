<?php
require '../includes/db.php';
require '../includes/functions.php';

$users = $pdo->query("SELECT * FROM users")->fetchAll();
$judges = $pdo->query("SELECT * FROM judges")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judge_id = $_POST['judge_id'];
    $user_id = $_POST['user_id'];
    $points = $_POST['points'];

    $check = $pdo->prepare("SELECT COUNT(*) FROM scores WHERE judge_id = ? AND user_id = ?");
    $check->execute([$judge_id, $user_id]);

    if ($check->fetchColumn() == 0) {
        $stmt = $pdo->prepare("INSERT INTO scores (judge_id, user_id, points) VALUES (?, ?, ?)");
        $stmt->execute([$judge_id, $user_id, $points]);
        echo "✅ Score submitted.";
    } else {
        echo "⚠️ Judge already scored this user.";
    }
}
?>
<link rel="stylesheet" href="../assets/style.css">
<h2>Score a User</h2>
<form method="post">
    Judge:
    <select name="judge_id">
        <?php foreach ($judges as $judge): ?>
            <option value="<?= $judge['id'] ?>"><?= $judge['display_name'] ?></option>
        <?php endforeach; ?>
    </select><br>
    User:
    <select name="user_id">
        <?php foreach ($users as $user): ?>
            <option value="<?= $user['id'] ?>"><?= $user['display_name'] ?></option>
        <?php endforeach; ?>
    </select><br>
    Points: <input type="number" name="points" min="1" max="100" required><br>
    <button type="submit">Submit Score</button>
</form>
