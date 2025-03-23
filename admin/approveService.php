<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}
 include "navbar.php";
include "../db.php";

// Fetch service requests with user details
$sql = "
    SELECT sp.id AS serviceprovider_id, r.name, r.email, r.mobile, s.servicename, sp.status
    FROM serviceprovider sp
    JOIN registration r ON sp.userid = r.id
    JOIN service s ON sp.serviceid = s.id
";
$result = mysqli_query($conn, $sql);

// Handle Approve or Reject
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['serviceprovider_id'])) {
    $action = $_POST['action'];
    $serviceprovider_id = intval($_POST['serviceprovider_id']);
    $status = $action === 'approve' ? 'approve' : 'reject';

    $updateQuery = "UPDATE serviceprovider SET status = '$status' WHERE id = $serviceprovider_id";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<p class='text-success'>Service status updated to '$status'.</p>";
        echo "<script>window.location.href='approveService.php';</script>";
    } else {
        echo "<p class='text-danger'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<h1 class="text-center text-underline text-decoration-underline">Service Requests Management</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Service</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                <td><?php echo htmlspecialchars($row['servicename']); ?></td>
                <td>
                    <?php 
                    $statusColor = match (strtolower($row['status'])) {
                        'approve' => 'green',
                        'pending' => 'orange',
                        'reject' => 'red',
                        default => 'black',
                    };
                    echo "<span style='color: $statusColor;'>{$row['status']}</span>";
                    ?>
                </td>
                <td>
                    <?php //if ($row['status'] === 'pending'): ?>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="serviceprovider_id" value="<?php echo $row['serviceprovider_id']; ?>">
                            <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="serviceprovider_id" value="<?php echo $row['serviceprovider_id']; ?>">
                            <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    <?php //else: ?>
                        <!-- <span class="text-muted">No Action Available</span> -->
                    <?php //endif; ?>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>No Data Found</td></tr>";
    }
    ?>
  </tbody>
</table>

