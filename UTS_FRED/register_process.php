<?php
session_start();
require_once 'connect.php';

// Initialize messages
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['user_nama']);
    $email = trim($_POST['user_email']);
    $password = $_POST['user_password'];
    $repassword = $_POST['user_repassword'];
    $role = "user";

    // Validate form data
    if (empty($name) || empty($email) || empty($password) || empty($repassword)) {
        echo "All fields are required!";
    } elseif ($password !== $repassword) {
        echo "Passwords do not match!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the username or email already exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_nama = ? OR user_email = ?");
        $stmt->bind_param('ss', $name, $email);
        $stmt->execute();
        $stmt->bind_result($existingUserCount);
        $stmt->fetch();
        $stmt->close();

        if ($existingUserCount > 0) {
            echo "Username or email already exists!";
        } else {
            function idExists($conn, $id) {
                $idCount = null;
                $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_id = ?");
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $stmt->bind_result($idCount);
                $stmt->fetch();
                $stmt->close();
                return $idCount > 0;
            }

            $stmt = $conn->query("SELECT COUNT(*) as total FROM users");
            $result = $stmt->fetch_assoc();
            $newIdNumber = $result['total'] + 1;
            $user_id = sprintf("C%03d", $newIdNumber);
            while (idExists($conn, $user_id)) {
                $newIdNumber++;
                $user_id = sprintf("C%03d", $newIdNumber);
            }

            $sql = "INSERT INTO users (user_id, user_nama, user_email, user_password, role, image) VALUES (?, ?, ?, ?, ?, '')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssss', $user_id, $name, $email, $hashedPassword, $role);

            if ($stmt->execute()) {
                echo "User registered successfully with ID: $user_id";
            } else {
                echo "There was an error registering the user.";
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>
