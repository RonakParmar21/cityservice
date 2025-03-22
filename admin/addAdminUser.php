<?php 
    include "navbar.php";
?>

<div class="container">
<form method="POST">
    <h1 class="text-center">Add Admin</h1>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="viewAdmin.php">View Admin</a>
</form>
</div>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "../db.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $errors = [];

    if(empty($email) || empty($password)) {
        $errors[] = "All fields are required!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
    }

    if (!empty($errors)) {
        foreach($errors as $error) {
            echo "<script>alert('" . htmlspecialchars($error) . "');</script>";
        }
    } else {
        $email = mysqli_real_escape_string($conn, $email);

        // Check if service already exists
        $checkSql = "SELECT * FROM `admin` WHERE `email` = '$email'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Admin already added!'); window.location.href='addAdminUser.php';</script>";
        } else {
            $sql = "INSERT INTO `admin`(`email`, `password`) VALUES ('$email','$password')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Admin Added Successfully!'); window.location.href='addAdminUser.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        }
    }
}
?>
