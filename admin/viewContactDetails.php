<?php 
    include "navbar.php";
    include "../db.php";

    $sql = "SELECT * FROM contact";
    $result = mysqli_query($conn, $sql);
    
?>
<h1 class="text-center text-underline text-decoration-underline">Contact Details</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
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
                        <td><?php echo htmlspecialchars($row['subject']); ?></td>
                        <td><?php echo htmlspecialchars($row['msg']); ?></td>
                        <td><a href="delete_contact.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
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