<?php
require 'dbconnect.php';
$user_id = $_GET['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    var_dump($user_id);
    $title = $_POST['title'];
    $description = $_POST['description'];

    try {
        $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, description) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $title, $description]);

        header("Location: user_posts.php?user_id=$user_id");
        exit();
    } catch (PDOException $e) {
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
    <!-- Your HTML form for creating a post -->
    <div class="container mt-5">
        <h2>Create Post</h2>
        
        <form method="POST">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
            <a href="user_posts.php?user_id=<?php echo $user_id; ?>" class="btn btn-secondary ">Back</a>
        </form>
    </div>
</body>

</html>