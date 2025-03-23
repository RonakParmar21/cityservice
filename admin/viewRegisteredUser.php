<?php 
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        echo "<script>window.location.href='login.php';</script>";
        exit;
    }
     include "navbar.php";
    include "../db.php";

    $sql = "SELECT * FROM registration";
    $result = mysqli_query($conn, $sql);
?>

<h1 class="text-center text-underline text-decoration-underline">Registered User Details</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                        <td><a href="deleteRegisteredUser.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5' class='text-center'>No Data Found</td></tr>";
        }
    ?>
  </tbody>
</table>
