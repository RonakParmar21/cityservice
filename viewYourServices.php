<?php
include "navbar.php";
include "db.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    echo "<p>Please log in to view your services.</p>";
    exit;
}

$loggedInUserId = $_SESSION['user_id'];

$query = "
    SELECT s.servicename, sp.status 
    FROM serviceprovider sp
    JOIN service s ON sp.serviceid = s.id
    WHERE sp.userid = '$loggedInUserId'
";

$result = mysqli_query($conn, $query);
?>

<h1>My Services</h1>

<?php if (mysqli_num_rows($result) > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Service Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['servicename']; ?></td>
                    <td>
                        <?php 
                        $status = strtolower($row['status']);
                        $color = match ($status) {
                            'approve' => 'green',
                            'pending' => 'orange',
                            'reject' => 'red',
                            default => 'black',
                        };
                        echo "<span style='color: $color;'>". ucfirst($status) ."</span>";
                        ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No services applied for yet.</p>
<?php endif; ?>

<?php 
include "footer.php";
?>
