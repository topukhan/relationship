<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        $sql = "INSERT INTO students (name, email) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email]);

        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } 
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Students</h4>

                    </div>
                    <div class="card-body">
                        <form action=" " method="Post">

                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Id</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
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