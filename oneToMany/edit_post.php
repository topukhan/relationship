<?php
require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    try {
        $stmt = $pdo->prepare("UPDATE posts SET title = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $description, $post_id]);

        header("Location: user_posts.php?user_id=".$_POST['user_id']);
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['post_id']) && isset($_GET['user_id'])) {
    $post_id = $_GET['post_id'];
    $user_id = $_GET['user_id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$post_id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            header("Location: user_posts.php?user_id=".$user_id);
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
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Post</h2>
        <form method="POST">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3" required><?php echo $post['description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="user_posts.php?user_id=<?php echo $user_id; ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
