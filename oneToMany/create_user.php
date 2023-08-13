<?php
require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    try {
        $pdo->beginTransaction();

        // Insert into users table
        $stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
        $stmt->execute([$username, $email]);
        $user_id = $pdo->lastInsertId();

        // Insert into profiles table
        $stmt = $pdo->prepare("INSERT INTO profiles (user_id, first_name, last_name, phone, address) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $first_name, $last_name, $phone, $address]);

        $pdo->commit();

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Create User</h2>
        <form method="POST" class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name"required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name"required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone"required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" required>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>

    </div>
</body>
</html>
