<?php
require_once 'connect.php';

// Initialize messages
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['user_nama']);
    $new_password = $_POST['user_password'];
    $repassword = $_POST['user_repassword'];

    // Validate form input
    if (empty($username) || empty($new_password) || empty($repassword)) {
        $error_message = "All fields are required!";
    } elseif ($new_password !== $repassword) {
        $error_message = "Passwords do not match!";
    } else {
        // Check if the username exists
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_nama = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($user_id);
        $stmt->fetch();
        $stmt->close();

        if (!$user_id) {
            $error_message = "Username not found!";
        } else {
            // Hash the new password
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $stmt = $conn->prepare("UPDATE users SET user_password = ? WHERE user_nama = ?");
            $stmt->bind_param('ss', $hashedPassword, $username);
            if ($stmt->execute()) {
                $success_message = "Password updated successfully.";
            } else {
                $error_message = "Failed to update password.";
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <!-- Add your meta and style includes -->
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>

        <form action="forgotpassword.php" method="POST">
            <div class="form-group">
                <label for="user_nama">Username</label>
                <input type="text" name="user_nama" class="form-control" placeholder="Enter Username" required>
            </div>

            <div class="form-group">
                <label for="user_password">New Password</label>
                <input type="password" name="user_password" class="form-control" placeholder="Enter New Password" required>
            </div>

            <div class="form-group">
                <label for="user_repassword">Re-enter Password</label>
                <input type="password" name="user_repassword" class="form-control" placeholder="Re-enter Password" required>
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>

        <!-- Display success or error messages -->
        <?php if (!empty($success_message)): ?>
            <p class="text-success"><?php echo $success_message; ?></p>
        <?php elseif (!empty($error_message)): ?>
            <p class="text-danger"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
