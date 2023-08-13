<?php
require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    try {
        // Delete user's profile first (assuming you have a profiles table)
        $stmt = $pdo->prepare("DELETE FROM profiles WHERE user_id = ?");
        $stmt->execute([$user_id]);

        // Delete user's posts
        $stmt = $pdo->prepare("DELETE FROM posts WHERE user_id = ?");
        $stmt->execute([$user_id]);

        // Delete user
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$user_id]);

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
