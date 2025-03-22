<?php
session_start();
header('Content-Type: application/json');
include 'db.php'; // Using your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

// Get data from the POST request
$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['serviceProviderId'])) {
    $loggedInUserId = $_SESSION['user_id'];
    $serviceProviderId = (int)$data['serviceProviderId'];

    // Insert inquiry into the database
    $sql = "INSERT INTO inquiry (userid, user) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $loggedInUserId, $serviceProviderId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Inquiry saved successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save inquiry']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
}
?>
