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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-light text-dark">
                        <h4>Assign Courses to Student</h4>
                    </div>
                    <div class="card-body">
                        <form action="add_student_to_course.php" method="post">
                            <div class="form-group">
                                <label for="student_id">Select Student:</label>
                                <select class="form-control" name="student_id" required>
                                    <option selected>Select Student</option>
                                    <?php
                                    require_once 'connect.php';
                                    try {
                                        $sql = "SELECT * FROM students WHERE id NOT IN (SELECT DISTINCT student_id FROM student_course)";
                                        $stmt = $pdo->query($sql);

                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                        }
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label for="course_id">Select Course:</label><br>
                                <?php
                                require_once 'connect.php';

                                try {
                                    $sql = "SELECT * FROM courses";
                                    $stmt = $pdo->query($sql);

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<div class='form-check'>";
                                        echo "<input class='form-check-input' type='checkbox' name='course_id[]' value='" . $row['id'] . "' id='course" . $row['id'] . "'>";
                                        echo "<label class='form-check-label' for='course" . $row['id'] . "'>" . $row['name'] . "</label>";
                                        echo "</div>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                                ?>

                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Assign</button>
                                <a href="index.php" class="btn btn-warning">Back</a>
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