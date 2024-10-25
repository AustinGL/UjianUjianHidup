<?php
session_start();
include 'connect.php'; // Include database connection

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Use null coalescing operator to prevent undefined index warnings
    $user_id = $_SESSION['user_id'] ?? null;
    $current_password = $_POST['user_password'] ?? ''; // Default to an empty string
    $new_password = $_POST['user_changepassword'] ?? ''; // Default to an empty string
    $image = $_FILES['user_newImage'] ?? []; // Default to an empty array

    // Check if user is logged in
    if (!$user_id) {
        $_SESSION['message'] = "You need to log in first.";
        header("Location: login.php");
        exit();
    }

    // Check the current password
    $query = "SELECT user_password FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_id);
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
        if (!empty($image['size']) && $image['size'] > 0) {
            // Define the path where you want to save the uploaded image
            $targetDir = "images/users/";
            $targetFile = $targetDir . basename($image['name']);

            // Check if the image is a valid upload
            if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                // Update image path in the database
                $updateImageQuery = "UPDATE users SET image = ? WHERE user_id = ?";
                $updateImageStmt = $conn->prepare($updateImageQuery);
                
                if ($updateImageStmt === false) {
                    echo "Error preparing statement: " . $conn->error;
                } else {
                    // Bind the parameters: first parameter as string (s), second as string (s)
                    $updateImageStmt->bind_param("ss", $targetFile, $user_id);
                    
                    // Attempt to execute the statement
                    if (!$updateImageStmt->execute()) {
                        echo "Error executing query: " . $updateImageStmt->error;
                    } else {
                        // Update session image path
                        $_SESSION['image'] = $targetFile; // Store the image path in the session
                        echo "Image updated successfully!";
                    }
                    // Close the statement
                    $updateImageStmt->close();
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "No image uploaded or image size is zero.";
        }        

        $_SESSION['message'] = "Profile updated successfully!";
    } else {
        $_SESSION['message'] = "Password confirmation failed. Please try again.";
    }

    // Redirect back to profile page
    header("Location: index.php"); // Uncomment to enable redirection
    exit();
}
?>
