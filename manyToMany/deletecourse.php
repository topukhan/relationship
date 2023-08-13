<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM courses WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        header('Location: displaycourse.php');
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
