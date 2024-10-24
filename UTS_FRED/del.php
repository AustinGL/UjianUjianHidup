<?php
require "connect.php";

if (isset($_POST['id_events']) && is_numeric($_POST['id_events'])) {
    $id = $_POST['id_events'];

    $stmt = $conn->prepare("DELETE FROM events WHERE id_events = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute() === TRUE) {
        header("Location: admindashboard.php");
        exit(); 
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid event ID.";
}

$conn->close();
?>
