<?php
require '../includes/db.php';
require '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize_input($_POST['username']);
    $display_name = sanitize_input($_POST['display_name']);

    $stmt = $pdo->prepare("INSERT INTO judges (username, display_name) VALUES (?, ?)");
    try {
        $stmt->execute([$username, $display_name]);
        echo "✅ Judge added successfully.";
    } catch (PDOException $e) {
        echo "❌ Error: " . $e->getMessage();
    }
}
?>
<link rel="stylesheet" href="../assets/style.css">
<h2>Add Judge</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Display Name: <input type="text" name="display_name" required><br>
    <button type="submit">Add Judge</button>
</form>
