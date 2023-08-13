<?php
require 'dbconnect.php';

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
    <title>Show Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Show Post</h2>
        <div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo ucfirst($post['title']); ?></h5>
        <p class="card-text"><?php echo $post['description']; ?></p>
        
    </div>
</div>

        <a href="user_posts.php?user_id=<?php echo $user_id; ?>" class="btn btn-secondary mt-3">Back</a>
    </div>
</body>
</html
