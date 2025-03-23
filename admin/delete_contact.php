<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}
include "../db.php";


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM contact WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Contact deleted successfully!'); window.location.href='viewContactDetails.php';</script>";
        } else {
            echo "<script>alert('Failed to delete contact.'); window.location.href='viewContactDetails.php';</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('SQL error occurred.'); window.location.href='viewContactDetails.php';</script>";
    }

    mysqli_close($conn);
} else {
    echo "<script>alert('Invalid request.'); window.location.href='viewContactDetails.php';</script>";
}
?>
