<?php
include "../db.php";
include "navbar.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request!'); window.location.href='addService.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// Fetch existing service details
$sql = "SELECT * FROM service WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Service not found!'); window.location.href='addService.php';</script>";
    exit;
}

$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service = trim($_POST['service']);

    if (empty($service)) {
        echo "<script>alert('Service name is required!');</script>";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $service)) {
        echo "<script>alert('Only letters and spaces are allowed in Service Name!');</script>";
    } else {
        $service = mysqli_real_escape_string($conn, $service);

        // Update query
        $updateSql = "UPDATE service SET servicename = '$service' WHERE id = $id";
        
        if (mysqli_query($conn, $updateSql)) {
            echo "<script>alert('Service updated successfully!'); window.location.href='addService.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

<div class="container">
    <h1 class="text-center">Update Service</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Service Name</label>
            <input type="text" class="form-control" name="service" value="<?php echo htmlspecialchars($row['servicename']); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Service</button>
    </form>
</div>
