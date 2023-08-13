<?php

include 'connect.php';

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
<div class="text-center">
        <h2 class="bg-success text-white p-3">CRUD with Many-to-Many Relationship (Students & Courses)</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Students</h4>
                        <a href="student.php" class="btn btn-primary">Add Student</a>
                        <a href="displaycourse.php" class="btn btn-warning">Courses</a>
                        <a href="add_student_to_course_form.php" class="btn btn-info">Assign Courses</a>
                        <a href="display_students_courses.php" class="btn btn-success">View all </a>

                    </div>
                    <div class="card-body">
                        <table class="table datatable-highlight text-center" id="solid_tab0">
                            <thead>
                                <th>Sl</th>
                                <th>Student Name</th>
                                <th>Email Id</th>
                                <th>Courses</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM students";
                                $result = $pdo->query($sql);
                                $id = 1;
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $id++ ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td>
                                            <?php
                                            $sql2 = "SELECT * FROM student_course WHERE student_id = ?";
                                            $stmt2 = $pdo->prepare($sql2);
                                            $stmt2->execute([$row['id']]);
                                            $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                                            if (count($result2) > 0) {
                                                foreach ($result2 as $row2) {
                                                    $sql3 = "SELECT * FROM courses WHERE id = ?";
                                                    $stmt3 = $pdo->prepare($sql3);
                                                    $stmt3->execute([$row2['course_id']]);
                                                    $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                                                    echo $row3['name'] . "<br>";
                                                }
                                            } else {
                                                echo "<span class='text-danger'>Not Assigned</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                                            <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>