<?php
// Start the session
session_start();

// Include the database connection file
require_once 'connect.php';

// Initialize messages
$success_message = '';
$error_message = '';

// Redirect if user is already logged in
if (isset($_SESSION['user_id'])) {
    $success_message = "You are already logged in!";
    // Optionally redirect to another page if needed
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error_message = "All fields are required!";
    } else {
        // Escape input to prevent SQL injection
        $username = $conn->real_escape_string($username);

        // Prepare the SQL query to fetch user data
        $sql = "SELECT * FROM users WHERE user_nama = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['user_password'])) {
                // Store user data in session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_nama'] = $user['user_nama'];
                $_SESSION['user_email'] = $user['user_email'];
                $_SESSION['role'] = $user['role'];

                // Redirect based on user role
                if ($_SESSION['role'] === 'admin') {
                 
                    $success_message = "Logged in as admin.";
                    header('Location: admindashboard.php'); // Uncomment to redirect admins
                } else {
                 
                    $success_message = "Logged in as user.";
                    // header('Location: user_dashboard.php'); // Uncomment to redirect users
                }

                // Successful login, show success message
                $success_message = "Login successful! Welcome " . htmlspecialchars($_SESSION['user_nama']);
                exit(); // Ensure no further code is executed after redirection
            } else {
                $error_message = "Invalid username or password!";
            }
        } else {
            $error_message = "Invalid username or password!";
        }

        // Close the statement and connection
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
