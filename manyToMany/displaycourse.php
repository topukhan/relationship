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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Courses</h4>
                        <a href="createcourse.php" class="btn btn-primary">Create</a>
                        <a href="index.php" class="btn btn-warning">Back</a>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered text-center" id="solid_tab0">
                            <thead>
                                <th>Sl</th>
                                <th>Course Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM courses";
                                try {
                                    $stmt = $pdo->query($sql);
                                    $id = 1;
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                        <tr>
                                            <td><?php echo $id++ ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td>
                                                <a href="editCourse.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                                                <a href="deletecourse.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
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