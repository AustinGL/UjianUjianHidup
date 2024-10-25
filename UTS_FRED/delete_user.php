<?php
include 'manage_process.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = $_POST['user_email'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM users WHERE user_email = ?");
    $stmt->bind_param('s', $user_email);

    if ($stmt->execute()) {
        // Redirect with success message
        header("Location: manage_user.php?msg=User+Deleted+Successfully");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect if accessed without POST request
    header("Location: manage_user.php");
    exit();
}
?>
