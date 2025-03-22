<?php
include "navbar.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("db.php");

if (!isset($_SESSION['user_id'])) {
    echo "<p>Please log in to access this page.</p>";
    exit;
}

$loggedInUserId = $_SESSION['user_id'];

$serviceQuery = "SELECT * FROM service";
$serviceResult = mysqli_query($conn, $serviceQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['service'])) {
    $selectedServiceId = intval($_POST['service']);

    $insertQuery = "INSERT INTO serviceprovider (userid, serviceid, status) VALUES ($loggedInUserId, $selectedServiceId, 'pending')";
    $updateQuery = "UPDATE `registration` SET `role`='member' WHERE `id`='$loggedInUserId'";
    
    if (mysqli_query($conn, $insertQuery) and mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Request Sent Successfully.');window.location.href='becomeAServiceProvider.php';</script>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>
<style>

h2 {
  color: #007bff;
}

form {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  max-width: 400px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.05);
}

label {
  display: block;
  margin-top: 10px;
  font-weight: bold;
}

input, select, button {
  width: 100%;
  padding: 12px;
  margin-top: 8px;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[readonly] {
  background-color: #e9ecef;
}

button {
  background-color: #007bff;
  color: white;
  border: none;
  margin-top: 20px;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #0056b3;
}

p {
  margin-top: 10px;
  font-size: 14px;
}

p[style*='green'] {
  color: #28a745;
}

p[style*='red'] {
  color: #dc3545;
}

    </style>
<h2>Register as Service Provider</h2>
<form method="post">
  <label>User ID:</label>
  <input type="text" value="<?php echo $loggedInUserId; ?>" readonly />

  <label>Select a Service:</label>
  <select name="service" required>
    <option value="">Select a Service</option>
    <?php
      while ($row = mysqli_fetch_assoc($serviceResult)) {
          echo "<option value='{$row['id']}'>{$row['servicename']}</option>";
      }
    ?>
  </select>

  <button type="submit">Add Service</button>
</form>
<?php 
    include "footer.php";
?>