<?php
session_start();
include("navbar.php");
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "<script>alert('Database error: " . mysqli_error($conn) . "'); window.location.href='login.php';</script>";
        exit;
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['password']) { // Assuming plain text password (not recommended)
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email'];
            echo "<script>alert('Login successful!'); window.location.href='contact.php';</script>";
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href='login.php';</script>";
    }
}
?>

<section class="login_classname-container">
    <h1 class="contact_classname-heading">Login</h1>
    <form method="POST" action="" class="contact_classname-form">
      <label class="contact_classname-label">Email:</label>
      <input type="email" name="email" class="contact_classname-input" placeholder="Enter your email" required />

      <label class="contact_classname-label">Password:</label>
      <input type="password" name="password" class="contact_classname-input" placeholder="Enter your password" required />

      <button type="submit" class="contact_classname-button">Submit</button>

      <p>Not registered? <a href="registration.php">Register</a></p>
    </form>
</section>

<?php include("footer.php"); ?>
