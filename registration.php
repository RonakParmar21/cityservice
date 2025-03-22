<?php 
include("navbar.php");
?>

<section class="contact_classname-container">
    <h1 class="contact_classname-heading">Registration</h1>

    <form method="POST" action="" id="contactForm" class="contact_classname-form">
      <label class="contact_classname-label">Name:</label>
      <input type="text" name="name" id="name" class="contact_classname-input" placeholder="Enter your name" />

      <label class="contact_classname-label">Email:</label>
      <input type="email" name="email" id="email" class="contact_classname-input" placeholder="Enter your email" />

      <label class="contact_classname-label">Mobile:</label>
      <input type="text" name="mobile" id="mobile" class="contact_classname-input" placeholder="Enter your mobile number" />

      <label class="contact_classname-label">Password:</label>
      <input type="password" name="password" id="password" class="contact_classname-input" placeholder="Enter your password" />

      <label class="contact_classname-label">Re-Type Password:</label>
      <input type="password" name="cpassword" id="cpassword" class="contact_classname-input" placeholder="Re-enter your password" />

      <button name="registration" type="submit" class="contact_classname-button">Submit</button>

      Already registered? <a href="login.php">Login</a>
      <p id="errorMessage" class="contact_classname-error"></p>
    </form>
</section>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "db.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = trim($_POST['name']);
    $email = trim($_POST['email']); 
    $mobile = trim($_POST['mobile']); 
    $password = trim($_POST['password']); 
    $cpassword = trim($_POST['cpassword']);

    $errors = [];

    if(empty($name) || empty($email) || empty($mobile) || empty($password) || empty($cpassword)) {
        $errors[] = "All fields are required!";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Only letters and spaces are allowed in Name!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
    }

    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $errors[] = "Invalid mobile number. It must be 10 digits!";
    }

    if ($password !== $cpassword) {
        $errors[] = "Both passwords must be the same!";
    }

    if (!empty($errors)) {
        foreach($errors as $error) {
            echo "<script>alert('".htmlspecialchars($error)."');</script>";
        }
    } else {
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $mobile = mysqli_real_escape_string($conn, $mobile);
        $password = mysqli_real_escape_string($conn, $password);
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `registration`(`name`, `email`, `mobile`, `password`, `role`) VALUES('$name','$email','$mobile','$password', 'user')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

<?php 
include("footer.php");
?>
