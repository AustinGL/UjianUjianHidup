<?php
require "connect.php";

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the registration ID is provided
if (isset($_POST['registration_id'])) {
    $registration_id = $_POST['registration_id'];

    // Query to delete the registration
    $sql = "DELETE FROM registrations WHERE registration_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $registration_id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        // Close statement and connection before redirection
        $stmt->close();
        $conn->close();

        // Redirect to myevent.php after successful deletion
        header("Location: myevent.php");
        exit;  // Make sure no further code is executed after redirection
    } else {
        echo '<p>Error deleting registration. Please try again.</p>';
    }

    $stmt->close();
} else {
    echo '<p>Invalid request. Registration ID is missing.</p>';
}

$conn->close();
?>
