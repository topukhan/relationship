<?php
require 'dbconnect.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT users.*, profiles.first_name, profiles.last_name, profiles.phone, profiles.address FROM users LEFT JOIN profiles ON users.id = profiles.user_id WHERE users.id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>User Profile</h2>
        <table class="table">
            <tr>
                <th>Username:</th>
                <td><?= $user['username'] ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?= $user['email'] ?></td>
            </tr>
            <tr>
                <th>First Name:</th>
                <td><?= $user['first_name'] ?></td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td><?= $user['last_name'] ?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><?= $user['phone'] ?></td>
            </tr>
            <tr>
                <th>Address:</th>
                <td><?= $user['address'] ?></td>
            </tr>
        </table>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
</body>
</html>
