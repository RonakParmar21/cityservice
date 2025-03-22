<?php 
include("navbar.php");
include("db.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// if (!isset($_SESSION['user_id'])) {
//     echo "<p>Please log in to view services.</p>";
//     exit;
// }

$query = "SELECT * FROM service";
$result = mysqli_query($conn, $query);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service'])) {
    $serviceId = mysqli_real_escape_string($conn, $_POST['service']);

    $query = "
      SELECT DISTINCT r.name AS username, r.email, r.mobile AS contact, sp.status
      FROM serviceprovider sp
      JOIN registration r ON sp.userid = r.id
      WHERE sp.status = 'approve' and sp.serviceid = '$serviceId';
    ";

    // $query = "
    //     SELECT r.name AS username, r.email, r.mobile AS contact, sp.status
    //     FROM serviceprovider sp
    //     JOIN registration r ON sp.userid = r.id
    //     WHERE sp.serviceid = '$serviceId'
    // ";
    $resultUsers = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultUsers) > 0) {
        echo "<h3>Service Providers for Selected Service</h3>";
        echo "<table border='1'>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($resultUsers)) {

            $statusColor = match (strtolower($row['status'])) {
                'approve' => 'green',
                'pending' => 'orange',
                'reject' => 'red',
                default => 'black',
            };
            echo "<tr>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['contact']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No providers found for the selected service.</p>";
    }
}
?>

<header class="view_service_classname-header1">
  <h1>View Services</h1>
  <p>Select a service to see available providers.</p>
</header>

<section class="view_service_classname-container">
  <form method="post">
    <label for="serviceDropdown" class="view_service_classname-label">Choose a Service:</label>
    
    <select id="serviceDropdown" class="view_service_classname-dropdown" name="service" required>
      <option value="">Select a Service</option>
      <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='{$row['id']}'>{$row['servicename']}</option>";
        }
      ?>
    </select>

    <button type="submit" class="view_service_classname-button">View Providers</button>
  </form>
</section>

<?php 
include("footer.php");
?>
