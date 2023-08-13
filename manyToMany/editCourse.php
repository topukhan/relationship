<?php
require_once 'connect.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    try {
        $sql = "UPDATE courses SET name = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $id]);

        $message = "Updated Successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>




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
    <?php if (isset($message)) {
        echo $message;
    } ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Edit Course</h4>

                    </div>
                    <div class="card-body">
                        <form action="" method="Post">

                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input type="text" name="name" class="form-control" value="<?php
                                                                                            try {
                                                                                                $sql4 = "SELECT * FROM courses WHERE id = ?";
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



                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                <a href="displaycourse.php" class="btn btn-warning">Back</a>
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