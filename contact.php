<?php 
session_start();
include("navbar.php");
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}
?>

<section class="contact_classname-container">
    <h1 class="contact_classname-heading">Contact Us</h1>
    <form method="POST" action="" id="contactForm" class="contact_classname-form">
      <label class="contact_classname-label">Name:</label>
      <input type="text" id="name" name="name" class="contact_classname-input" placeholder="Enter your name" required />

      <label class="contact_classname-label">Email:</label>
      <input type="email" id="email" name="email" class="contact_classname-input" placeholder="Enter your email" required />

      <label class="contact_classname-label">Mobile:</label>
      <input type="text" id="mobile" name="mobile" class="contact_classname-input" placeholder="Enter your mobile number" required />

      <label class="contact_classname-label">Subject:</label>
      <input type="text" id="subject" name="subject" class="contact_classname-input" placeholder="Enter subject" required />

      <label class="contact_classname-label">Message:</label>
      <textarea id="message" name="msg" class="contact_classname-textarea" placeholder="Write your message..." required></textarea>

      <button type="submit" name="contact" class="contact_classname-button">Submit</button>
      <p id="errorMessage" class="contact_classname-error"></p>
    </form>
</section>
<?php 
if(isset($_POST['contact'])) {
    include "db.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $subject = trim($_POST['subject']);
    $msg = trim($_POST['msg']);

    $errors = [];

    if (empty($name) || empty($email) || empty($mobile) || empty($subject) || empty($msg)) {
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

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</>";
        }
    } else {
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $mobile = mysqli_real_escape_string($conn, $mobile);
        $subject = mysqli_real_escape_string($conn, $subject);
        $msg = mysqli_real_escape_string($conn, $msg);

        $sql = "INSERT INTO `contact`(`name`, `email`, `mobile`, `subject`, `msg`) VALUES ('$name','$email','$mobile','$subject','$msg')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New record created successfully!');window.location.href = window.location.href;</script>";
            document.getElementById('contactForm').reset();
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
<?php 
include("footer.php");
?>
