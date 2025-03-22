<?php
include "../db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM admin WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Admin deleted successfully!'); window.location.href='viewAdmin.php';</script>";
    } else {
        echo "<script>alert('SQL error occurred: " . mysqli_error($conn) . "'); window.location.href='viewAdmin.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='viewAdmin.php';</script>";
}
?>
