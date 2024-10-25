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
  <?php include 'header.php' ?>

  <div class="container-fluid">
    <div class="bg-white rounded-4 p-5 mx-auto" style="max-width: 900px;">
      <div class="row justify-content-center">
        <div class="container mt-5">
          <h2 class="text-center my-2">Create Account</h2>
          <form id="registration-form" enctype="multipart/form-data" class="mt-4">
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
          <div id="response-message" class="text-center my-3"></div> <!-- Message area for responses -->
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php' ?>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>

  <script>
    document.getElementById('registration-form').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the form from submitting traditionally

      const formData = new FormData(this);

      fetch('register_process.php', { // URL of PHP script
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        const responseMessage = document.getElementById('response-message');
        if (data.includes("User registered successfully")) {
          responseMessage.style.color = "green";
          responseMessage.textContent = data;
          setTimeout(() => window.location.href = 'index.php', 3000); // Redirect to login page after success
        } else {
          responseMessage.style.color = "red";
          responseMessage.textContent = data; // Display error message
        }
      })
      .catch(error => {
        document.getElementById('response-message').textContent = 'An error occurred. Please try again.';
      });
    });
  </script>
    <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
