<?php

require_once 'connect.php';

try {
    $sql = "SELECT * FROM students";
    $studentsResult = $pdo->query($sql);

    $sql = "SELECT * FROM courses";
    $coursesResult = $pdo->query($sql);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Students and Courses</title>
    <!-- Add Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Students</h2>
        <ul class="list-group">
        <?php while ($student = $studentsResult->fetch(PDO::FETCH_ASSOC)) : ?>
    <li class="list-group-item"><?php echo $student['name']; ?></li>
<?php endwhile; ?>

        </ul>

        <h2 class="mt-4">Courses</h2>
        <ul class="list-group">
        <?php while ($course = $coursesResult->fetch(PDO::FETCH_ASSOC)) : ?>
    <li class="list-group-item"><?php echo $course['name']; ?></li>
<?php endwhile; ?>

        </ul>
        <a href="index.php" class="btn btn-primary mt-2">Back</a>
    </div>

    <!-- Add Bootstrap 5 JS scripts here if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>