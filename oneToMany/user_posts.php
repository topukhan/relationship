<?php
require 'dbconnect.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            header("Location: index.php");
            exit();
        }

        $stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>User Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2><?php echo ucfirst($user['username']); ?>'s Posts</h2>
        <a href="create_post.php?user_id=<?php echo $user['id']; ?>" class="btn btn-primary my-3">Create Post</a>
        <a href="index.php" class="btn btn-secondary ">Back</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SL.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $index => $post) : ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td><?php echo ucfirst($post['title']); ?></td>
                        <td>
                            <a href="show_post.php?post_id=<?php echo $post['id']; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-sm btn-primary">Show</a>
                            <a href="edit_post.php?post_id=<?php echo $post['id']; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="delete_post.php" method="POST" class="d-inline">
                                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Create new post form -->

    </div>
</body>

</html>