<?php
require 'dbconnect.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="text-center">
        <h2 class="bg-info text-white p-3">CRUD with One-to-Many Relationship (User & Posts)</h2>
    </div>
    <div class="container">
        <a href="create_user.php" class="btn btn-dark mb-3">Add User</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $index => $user) : ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td><?php echo ucfirst($user['username']); ?></td>
                        <td>
                            <?php
                            $user_id = $user['id'];
                            try {
                                $stmt = $pdo->prepare("SELECT COUNT(*) FROM posts WHERE user_id = ?");
                                $stmt->execute([$user_id]);
                                $postCount = $stmt->fetchColumn();

                                echo $postCount;
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                        </td>
                        <td>
                            <a href="user_posts.php?user_id=<?php echo $user['id']; ?>" class="btn btn-info">Show Posts</a>
                            <a href="edit_user.php?user_id=<?php echo $user['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_user.php?user_id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>