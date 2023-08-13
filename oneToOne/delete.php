<?php
require 'dbconnect.php';

if (isset($_POST['id'])) {
    $user_id = $_POST['id'];

    try {
        $pdo->beginTransaction();

        // Delete from profiles table
        $stmt = $pdo->prepare("DELETE FROM profiles WHERE user_id = ?");
        $stmt->execute([$user_id]);

        // Delete from users table
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$user_id]);

        $pdo->commit();

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
