<?php
require "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event-name'];
    $datetime = $_POST['DnT'];
    $capacity = $_POST['slot'];
    $location = $_POST['lokasi'];
    $description = $_POST['deskripsi'];
    $status = $_POST['status'];

    
    $photo = '';
    $isPhotoUploaded = false;
    if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "assets/images/blog/";
        $photo = $targetDir . basename($_FILES['Foto']['name']);
        move_uploaded_file($_FILES['Foto']['tmp_name'], $photo);
        $isPhotoUploaded = true;
    }

    if ($isPhotoUploaded) {
        $sql = "UPDATE events SET 
                event_name = ?, 
                date_time = ?, 
                max_capacity = ?, 
                location = ?, 
                description = ?, 
                status = ?, 
                photo = ?
                WHERE id_events = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissssi", $event_name, $datetime, $capacity, $location, $description, $status, $photo, $event_id);
    } else {
        $sql = "UPDATE events SET 
                event_name = ?, 
                date_time = ?, 
                max_capacity = ?, 
                location = ?, 
                description = ?, 
                status = ?
                WHERE id_events = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssi", $event_name, $datetime, $capacity, $location, $description, $status, $event_id);
    }

    if ($stmt->execute()) {
        header("Location: admindashboard.php");
        exit();
    } else {
        echo "Error updating event: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
