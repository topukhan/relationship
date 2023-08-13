<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $studentId = $_POST['student_id'];
    $courseId = $_POST['course_id'];

    try {
        $sql = "INSERT INTO student_course (student_id, course_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);

        foreach ($courseId as $course) {
            $stmt->execute([$studentId, $course]);
        }

        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

