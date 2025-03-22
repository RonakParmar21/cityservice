<?php 
    include "navbar.php";
?>

<div class="container">
<form method="POST">
    <h1 class="text-center">Add Service</h1>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Service</label>
    <input type="text" class="form-control" name="service" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="viewService.php">View Service</a>
</form>
</div>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "../db.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $service = trim($_POST['service']);

    $errors = [];

    if(empty($service)) {
        $errors[] = "Service fields are required!";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $service)) {
        $errors[] = "Only letters and spaces are allowed in Service Name!";
    }

    if (!empty($errors)) {
        foreach($errors as $error) {
            echo "<script>alert('" . htmlspecialchars($error) . "');</script>";
        }
    } else {
        $service = mysqli_real_escape_string($conn, $service);

        // Check if service already exists
        $checkSql = "SELECT * FROM `service` WHERE `servicename` = '$service'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Service already added!'); window.location.href='addService.php';</script>";
        } else {
            $sql = "INSERT INTO `service`(`servicename`) VALUES('$service')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Service Added Successfully!'); window.location.href='addService.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        }
    }
}
?>
