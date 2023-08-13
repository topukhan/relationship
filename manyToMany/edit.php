<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $courseId = $_POST['course_id'];

        try {
            $pdo->beginTransaction();

            $sql = "UPDATE students SET name = ?, email = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $email, $id]);

            $sql2 = "DELETE FROM student_course WHERE student_id = ?";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([$id]);

            $sql3 = "INSERT INTO student_course (student_id, course_id) VALUES (?, ?)";
            $stmt3 = $pdo->prepare($sql3);
            foreach ($courseId as $course) {
                $stmt3->execute([$id, $course]);
            }

            $pdo->commit();

            header('Location: index.php');
            exit;
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

    try {
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$student) {
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



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Edit Student</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="Post">
                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" name="name" class="form-control" value="<?php
                                                                                            try {
                                                                                                $sql4 = "SELECT * FROM students WHERE id = ?";
                                                                                                $stmt4 = $pdo->prepare($sql4);
                                                                                                $stmt4->execute([$id]);
                                                                                                $row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
                                                                                                echo $row4['name'];
                                                                                            } catch (PDOException $e) {
                                                                                                echo "Error: " . $e->getMessage();
                                                                                            }
                                                                                            ?>
">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Id</label>
                                <input type="text" name="email" class="form-control" value="<?php
                                                                                            try {
                                                                                                $sql4 = "SELECT * FROM students WHERE id = ?";
                                                                                                $stmt4 = $pdo->prepare($sql4);
                                                                                                $stmt4->execute([$id]);
                                                                                                $row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
                                                                                                echo $row4['email'];
                                                                                            } catch (PDOException $e) {
                                                                                                echo "Error: " . $e->getMessage();
                                                                                            }
                                                                                            ?>
">
                            </div>
                            <div class="form-group">
                                <label for="course_id">Select Course:</label>
                                <div>
                                    <?php
                                    try {
                                        $sql5 = "SELECT * FROM courses";
                                        $stmt5 = $pdo->query($sql5);
                                        $courses = $stmt5->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($courses as $row5) {
                                            $sql6 = "SELECT * FROM student_course WHERE student_id = ? AND course_id = ?";
                                            $stmt6 = $pdo->prepare($sql6);
                                            $stmt6->execute([$id, $row5['id']]);
                                            $result6 = $stmt6->fetch(PDO::FETCH_ASSOC);

                                            echo '<div class="form-check">';
                                            echo '<input class="form-check-input" type="checkbox" name="course_id[]" value="' . $row5['id'] . '" id="course' . $row5['id'] . '"';
                                            if ($result6) {
                                                echo ' checked';
                                            }
                                            echo '>';
                                            echo '<label class="form-check-label" for="course' . $row5['id'] . '">' . $row5['name'] . '</label>';
                                            echo '</div>';
                                        }
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>