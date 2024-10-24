<?php
require "connect.php";

$event_name = $_POST['event-name'];
$date_time = $_POST['DnT'];
$max_capacity = $_POST['slot'];
$location = $_POST['lokasi'];
$description = $_POST['deskripsi'];
$status = $_POST['status'];  

$target_dir = "images/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); 
}

$target_file = $target_dir . basename($_FILES["Foto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$check = getimagesize($_FILES["Foto"]["tmp_name"]);
if ($check === false) {
    die("File is not an image.");
}

if ($_FILES["Foto"]["size"] > 2000000) {
    die("Sorry, your file is too large.");
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    die("Sorry, only JPG, JPEG, & PNG files are allowed.");
}

if (!move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
    die("Sorry, there was an error uploading your file.");
}

$stmt = $conn->prepare("INSERT INTO events (event_name, date_time, max_capacity, location, description, photo, status) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssissss", $event_name, $date_time, $max_capacity, $location, $description, $target_file, $status);

if ($stmt->execute()) {
    echo "New event added successfully";
    header("Location: index.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
