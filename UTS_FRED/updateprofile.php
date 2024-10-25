<?php
session_start();
include 'connect.php'; // Ensure this file is included properly
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Create Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/vendor.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .message {
      font-size: 1rem;
      margin-top: 10px;
      padding: 10px;
      border-radius: 5px;
      display: none;
      text-align: center;
    }
    .message.success { background-color: #d4edda; color: #155724; }
    .message.error { background-color: #f8d7da; color: #721c24; }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="bg-white rounded-4 p-5 mx-auto" style="max-width: 900px;">
      <div class="row justify-content-center">
        <div class="container mt-5">
          <div class="justify-content-center d-flex">
            <!-- Display user image from $_SESSION -->
            <img id="profileImage" src="data:image/jpeg;base64,<?= $_SESSION['image']; ?>" class="my-2 rounded-circle" height="100px" width="100px">
          </div>
          
          <!-- Display username from $_SESSION -->
          <h4 class="text-center my-2"><?= htmlspecialchars($_SESSION['user_nama']); ?></h4>
          
          <form id="registration-form" enctype="multipart/form-data" method="POST" action="update_user.php" class="mt-4">
            <div class="form-group mb-3">
              <label for="user_nama">Username</label>
              <input type="text" name="user_nama" class="form-control" value="<?= htmlspecialchars($_SESSION['user_nama']); ?>" readonly>
            </div>
            <div class="form-group mb-3">
              <label for="user_email">Email</label>
              <input type="email" name="user_email" class="form-control" value="<?= htmlspecialchars($_SESSION['user_email']); ?>" readonly>
            </div>
            <div class="form-group mb-3">
              <label for="user_changepassword">Change New Password (optional)</label>
              <div class="input-group">
                <input type="password" name="user_changepassword" class="form-control" placeholder="**************" id="newPassword">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('newPassword')">Show</button>
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="user_newImage">Edit Image</label>
              <input type="file" name="user_newImage" class="form-control" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="form-group mb-3">
              <label for="user_password">Enter Password for Confirmation</label>
              <div class="input-group">
                <input type="password" name="user_password" class="form-control" placeholder="**************" required id="confirmPassword">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword')">Show</button>
                </div>
              </div>
            </div>
            <div class="text-center my-3">
              <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
          </form>

          <!-- Display response message -->
          <?php if (isset($_SESSION['message'])): ?>
            <div id="response-message" class="message <?= strpos($_SESSION['message'], 'failed') === false ? 'success' : 'error'; ?>">
              <?= $_SESSION['message']; unset($_SESSION['message']); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <script>
    // Toggle password visibility
    function togglePassword(inputId) {
      const input = document.getElementById(inputId);
      if (input.type === 'password') {
        input.type = 'text';
      } else {
        input.type = 'password';
      }
    }

    // Preview image
    function previewImage(event) {
      const output = document.getElementById('profileImage');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src); // Free memory
      }
    }

    // Show message for a few seconds
    $(document).ready(function() {
      if ($('#response-message').length) {
        $('#response-message').fadeIn().delay(3000).fadeOut();
      }
    });
  </script>
</body>

</html>

