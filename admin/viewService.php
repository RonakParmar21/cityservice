<?php 
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        echo "<script>window.location.href='login.php';</script>";
        exit;
    }
     include "navbar.php";
    include "../db.php";

    $sql = "SELECT * FROM service";
    $result = mysqli_query($conn, $sql);
    
?>
<h1 class="text-center text-underline text-decoration-underline">Service Details</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        if(mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <td><?php echo htmlspecialchars($row['servicename']); ?></td>
                        <td><a href="updateService.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Update</a></td>
                        <td><a href="deleteService.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>

                <?php
            }
        }
        else {
            echo "<tr><td colspan='6' class='text-center'>No Contact Data Found</td></tr>";
        }
    ?>
  </tbody>
</table>