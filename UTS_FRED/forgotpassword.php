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

                header('index.php');
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
  <title>Stylish - Shoes Online Store HTML Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="TemplatesJungle">
  <meta name="keywords" content="Online Store">
  <meta name="description" content="Stylish - Shoes Online Store HTML Template">

  <link rel="stylesheet" href="css/vendor.css">
  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,900;1,900&family=Source+Sans+Pro:wght@400;600;700;900&display=swap"
    rel="stylesheet">
</head>
<body>


<div class="container-fluid">
        <!-- Add Event Form Section -->
        <div class="bg-white rounded-4 p-5 mx-auto" style="max-width: 900px;">
        <div class="row justify-content-center">
          <div class="container mt-5">
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
<div class="row justify-content-around py-3">
<button type="submit" class="btn btn-primary col-4 rounded-pill">Reset Password</button>

            <?php if (!empty($success_message)): ?>

            <a href="index.php" class="btn btn-primary col-4 rounded-pill"> go to login?</a>

            <p class="text-success"><?php echo $success_message; ?></p>
        <?php elseif (!empty($error_message)): ?>
            <p class="text-danger"><?php echo $error_message; ?></p>
        <?php endif; ?>
</div>
            

        </form>

    </div>
    </div>
    </div>
    </div>


</body>
</html>
