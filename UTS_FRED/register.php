<?php
// Start of the PHP file - ensure no output or whitespace before this
require_once 'connect.php'; // This includes the MySQLi connection

// Initialize messages
$success_message = '';
$error_message = '';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = trim($_POST['user_nama']);
    $email = trim($_POST['user_email']);
    $password = $_POST['user_password'];
    $repassword = $_POST['user_repassword'];
    $role = "user";

    // Validate form data
    if (empty($name) || empty($email) || empty($password) || empty($repassword)) {
        $error_message = "All fields are required!";
    } elseif ($password !== $repassword) {
        $error_message = "Passwords do not match!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format!";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the username already exists
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM users WHERE user_nama = ?");
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $stmt->bind_result($existingUserCount);
        $stmt->fetch();
        $stmt->close();

        if ($existingUserCount > 0) {
            $error_message = "Username already exists!";
        } else {
            // Check if the email is already registered
            $stmt = $conn->prepare("SELECT COUNT(*) as total FROM users WHERE user_email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->bind_result($existingEmailCount);
            $stmt->fetch();
            $stmt->close();

            if ($existingEmailCount > 0) {
                $error_message = "Email is already registered!";
            } else {
                // Function to check if user_id exists
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

                // Get the current count of users to generate the next user ID
                $stmt = $conn->query("SELECT COUNT(*) as total FROM users");
                $result = $stmt->fetch_assoc();
                $newIdNumber = $result['total'] + 1;
                $stmt->close();

                // Initialize user_id and check for uniqueness
                $user_id = sprintf("C%03d", $newIdNumber);
                while (idExists($conn, $user_id)) {
                    $newIdNumber++;
                    $user_id = sprintf("C%03d", $newIdNumber);
                }

                // Prepare the SQL query for insertion
                $sql = "INSERT INTO users (user_id, user_nama, user_email, user_password, role, image) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                // Insert a blank image initially
                $image = '';

                // Bind the parameters
                $stmt->bind_param('ssssss', $user_id, $name, $email, $hashedPassword, $role, $image);

                // Execute the query and check if it was successful
                if ($stmt->execute()) {
                    $success_message = "User registered successfully with ID: $user_id";
                   
                    // header('Location: login.php');
                    // exit();  
                } else {
                    $error_message = "There was an error registering the user.";
                }
                $stmt->close();
            }
        }
    }
}

$conn->close(); // Close the database connection
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

  <!-- Loader 4 -->

  <div class="preloader" style="position: fixed;top:0;left:0;width: 100%;height: 100%;background-color: #fff;display: flex;align-items: center;justify-content: center;z-index: 9999;">
    <svg version="1.1" id="L4" width="100" height="100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 50 100" enable-background="new 0 0 0 0" xml:space="preserve">
    <circle fill="#111" stroke="none" cx="6" cy="50" r="6">
      <animate
        attributeName="opacity"
        dur="1s"
        values="0;1;0"
        repeatCount="indefinite"
        begin="0.1"/>    
    </circle>
    <circle fill="#111" stroke="none" cx="26" cy="50" r="6">
      <animate
        attributeName="opacity"
        dur="1s"
        values="0;1;0"
        repeatCount="indefinite" 
        begin="0.2"/>       
    </circle>
    <circle fill="#111" stroke="none" cx="46" cy="50" r="6">
      <animate
        attributeName="opacity"
        dur="1s"
        values="0;1;0"
        repeatCount="indefinite" 
        begin="0.3"/>     
    </circle>
    </svg>
  </div>
  <!-- cart view -->

<?php include 'header.php' ?>

<div class="container-fluid">
        <!-- Add Event Form Section -->
        <div class="bg-white rounded-4 p-5 mx-auto" style="max-width: 900px;">
        <div class="row justify-content-center">
          <div class="container mt-5">

            <h2 class="text-center my-2">Create Account</h2>
          
            <form action="#.php" method="POST" enctype="multipart/form-data" class="mt-4">
              
              <div class="form-group mb-3">
                <label for="user_nama">Username</label>
                <input type="text" name="user_nama" class="form-control" placeholder="Enter Name" required>
              </div>

              <div class="form-group mb-3">
                <label for="user_email">Email</label>
                <input type="email" name="user_email" class="form-control" required>
              </div>

              <div class="form-group mb-3">
                <label for="user_password">Password</label>
                <input type="password" name="user_password" class="form-control" placeholder="**************" required>
              </div>

              <div class="form-group mb-3">
                <label for="user_repassword">Re-password</label>
                <input type="password" name="user_repassword" class="form-control" placeholder="**************" required>
              </div>
               <div class="text-center my-3">
                 <button type="submit" class="btn btn-primary">Create Account</button>
               </div>
            </form>
            <?php if (!empty($success_message)): ?>
                    <p class='text-center text-green'><?php echo $success_message; ?></p>
                <?php elseif (!empty($error_message)): ?>
                    <p class='text-center text-red'><?php echo $error_message; ?></p>
                <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'footer.php' ?>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
</body>

</html>