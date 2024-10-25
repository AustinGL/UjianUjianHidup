<?php
session_start(); // Start session at the very beginning
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Create Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/vendor.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container-fluid">
    <div class="bg-white rounded-4 p-5 mx-auto" style="max-width: 900px;">
      <div class="row justify-content-center">
        <div class="container mt-5">
          <div class="justify-content-center d-flex">
            <!-- Display user image from $_SESSION -->
            <?php if (isset($_SESSION['image'])): ?>
    <img src="data:image/jpeg;base64,<?= base64_encode($_SESSION['image']); ?>" class="my-2 rounded-circle" height="100px" width="100px">
<?php endif; ?>

          </div>
          
          <!-- Display username from $_SESSION -->
          <h4 class="text-center my-2"><?= htmlspecialchars($_SESSION['user_nama']); ?></h4>
          
          <form id="registration-form" enctype="multipart/form-data" method="POST" action="update_user.php" class="mt-4">
            <div class="form-group mb-3">
              <label for="user_nama">Username</label>
              <!-- Username field is read-only -->
              <input type="text" name="user_nama" class="form-control" value="<?= htmlspecialchars($_SESSION['user_nama']); ?>" readonly>
            </div>
            <div class="form-group mb-3">
              <label for="user_email">Email</label>
              <!-- Email field is read-only -->
              <input type="email" name="user_email" class="form-control" value="<?= htmlspecialchars($_SESSION['user_email']); ?>" readonly>
            </div>
            <div class="form-group mb-3">
              <label for="user_changepassword">Change New Password (optional)</label>
              <input type="password" name="user_changepassword" class="form-control" placeholder="**************">
            </div>
            <div class="form-group mb-3">
              <label for="user_newImage">Edit Image</label>
              <input type="file" name="user_newImage" class="form-control" placeholder="image">
            </div>
            <div class="form-group mb-3">
              <label for="user_password">Enter Password for Confirmation</label>
              <input type="password" name="user_password" class="form-control" placeholder="**************" required>
            </div>
            <div class="text-center my-3">
              <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
          </form>
          <div id="response-message" class="text-center my-3"></div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
