<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}

include "../db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM registration WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User deleted successfully!'); window.location.href='viewRegisteredUser.php';</script>";
    } else {
        echo "<script>alert('SQL error occurred: " . mysqli_error($conn) . "'); window.location.href='viewRegisteredUser.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='viewRegisteredUser.php';</script>";
}
?>
