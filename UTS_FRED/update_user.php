<?php
session_start();
include 'connect.php'; // This should include $conn as the mysqli connection

$user_id = $_SESSION['user_id'];
$current_password = $_POST['user_password'];
$new_password = $_POST['user_changepassword'];
$image = $_FILES['user_newImage'];

// Check the current password
$query = "SELECT user_password FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_id); // Bind the user ID as a string
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row && password_verify($current_password, $row['user_password'])) {
    // Update password if provided
    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE users SET user_password = ? WHERE user_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ss", $hashed_password, $user_id);
        $updateStmt->execute();
        $updateStmt->close();
    }

    // Update image if provided
    if ($image['size'] > 0) {
        $imageData = file_get_contents($image['tmp_name']);
        $updateImageQuery = "UPDATE users SET image = ? WHERE user_id = ?";
        $updateImageStmt = $conn->prepare($updateImageQuery);
        $updateImageStmt->bind_param("bs", $imageData, $user_id);
        $updateImageStmt->execute();
        $updateImageStmt->close();
    
        // Update session image
        $_SESSION['image'] = $imageData;
    }

    $_SESSION['message'] = "Profile updated successfully!";
} else {
    $_SESSION['message'] = "Password confirmation failed.";
}

// Redirect back to profile page
header("Location: index.php");
exit();
?>
