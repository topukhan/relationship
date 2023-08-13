<!DOCTYPE html>
<html>

<head>
    <title>CRUD with One-to-One Relationship</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="text-center">
        <h2 class="bg-dark text-white p-3">CRUD with One-to-One Relationship (User & Profile)</h2>
    </div>
    <div class="container">
        <a href="create.php" class="btn btn-success mb-3">Add User</a>
        <table class="table">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'dbconnect.php';

                try {
                    $stmt = $pdo->prepare("SELECT users.*, profiles.first_name, profiles.last_name FROM users LEFT JOIN profiles ON users.id = profiles.user_id");
                    $stmt->execute();
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $sl = 1;
                    foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $sl++; ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td>
                                <a href="read.php?id=<?= $user['id'] ?>" class="btn btn-info">Profile</a>
                                <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                                <form action="delete.php" method="post" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>