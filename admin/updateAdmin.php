<?php
include "../db.php";
include "navbar.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request!'); window.location.href='addService.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// Fetch existing admin details
$sql = "SELECT * FROM admin WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Admin not found!'); window.location.href='addService.php';</script>";
    exit;
}

$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "<script>alert('Email and Password are required!');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!');</script>";
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Update query
        $updateSql = "UPDATE admin SET email = '$email', password = '$password' WHERE id = $id";
        
        if (mysqli_query($conn, $updateSql)) {
            echo "<script>alert('Admin updated successfully!'); window.location.href='viewAdmin.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

<div class="container">
    <h1 class="text-center">Update Admin</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Admin</button>
    </form>
</div>