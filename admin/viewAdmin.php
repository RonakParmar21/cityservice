<?php 
    include "navbar.php";
    include "../db.php";

    $sql = "SELECT * FROM admin";
    $result = mysqli_query($conn, $sql);
    
?>
<h1 class="text-center text-underline text-decoration-underline">Admin Details</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col" colspan='2'>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        if(mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><a href="updateAdmin.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Update</a></td>
                        <td><a href="deleteAdmin.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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