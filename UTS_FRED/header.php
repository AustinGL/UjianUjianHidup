<!-- symbol cuman buat sipenan-->
<?php session_start(); 
$imagePath = $_SESSION['image'];
?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" id="shopping-carriage" viewBox="0 0 24 24" fill="none">
      <path
        d="M5 22H19C20.103 22 21 21.103 21 20V9C21 8.73478 20.8946 8.48043 20.7071 8.29289C20.5196 8.10536 20.2652 8 20 8H17V7C17 4.243 14.757 2 12 2C9.243 2 7 4.243 7 7V8H4C3.73478 8 3.48043 8.10536 3.29289 8.29289C3.10536 8.48043 3 8.73478 3 9V20C3 21.103 3.897 22 5 22ZM9 7C9 5.346 10.346 4 12 4C13.654 4 15 5.346 15 7V8H9V7ZM5 10H7V12H9V10H15V12H17V10H19L19.002 20H5V10Z"
        fill="black" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="quick-view" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="shopping-cart" viewBox="0 0 24 24" fill="none">
      <path
        d="M21 4H2V6H4.3L7.582 15.025C7.79362 15.6029 8.1773 16.1021 8.68134 16.4552C9.18539 16.8083 9.78556 16.9985 10.401 17H19V15H10.401C9.982 15 9.604 14.735 9.461 14.342L8.973 13H18.246C19.136 13 19.926 12.402 20.169 11.549L21.962 5.275C22.0039 5.12615 22.0109 4.96962 21.9823 4.81763C21.9537 4.66565 21.8904 4.52234 21.7973 4.39889C21.7041 4.27544 21.5837 4.1752 21.4454 4.106C21.3071 4.0368 21.1546 4.00053 21 4ZM18.246 11H8.246L6.428 6H19.675L18.246 11Z"
        fill="black" /> 
      <path
        d="M10.5 21C11.3284 21 12 20.3284 12 19.5C12 18.6716 11.3284 18 10.5 18C9.67157 18 9 18.6716 9 19.5C9 20.3284 9.67157 21 10.5 21Z"
        fill="black" />
      <path
        d="M16.5 21C17.3284 21 18 20.3284 18 19.5C18 18.6716 17.3284 18 16.5 18C15.6716 18 15 18.6716 15 19.5C15 20.3284 15.6716 21 16.5 21Z"
        fill="black" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="nav-icon" viewBox="0 0 16 16">
      <path
        d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 16 16">
      <path
        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="navbar-icon" viewBox="0 0 16 16">
      <path
        d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
      <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
      <path fill="currentColor" d="M19 12.998H5v-2h14z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="dropdown" viewBox="0 0 24 24">
      <path fill="currentColor" d="m7 10l5 5l5-5H7Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M12 2a5 5 0 1 0 5 5a5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3a3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M13.3 17.275q-.3-.3-.288-.725t.313-.725L16.15 13H5q-.425 0-.713-.288T4 12q0-.425.288-.713T5 11h11.15L13.3 8.15q-.3-.3-.3-.713t.3-.712q.3-.3.713-.3t.712.3L19.3 11.3q.15.15.213.325t.062.375q0 .2-.063.375t-.212.325l-4.6 4.6q-.275.275-.687.275t-.713-.3Z" />
    </symbol>
  </svg>
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

  <div class="modal fade" id="modallogin" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered" role="document">
      <div class="modal-content p-4">
        <div class="modal-header mx-auto border-0">
          <h2 class="modal-title fs-3 fw-normal">Login</h2>
        </div>
        <div class="modal-body">
          <div class="login-detail">
            <div class="login-form p-0">
              <div class="col-lg-12 mx-auto">
              <form id="login-form" action="login.php" method="POST"> 
  <input type="text" name="username" placeholder="Username*" class="mb-3 ps-3 text-input" required>
  <input type="password" name="password" placeholder="Password" class="ps-3 text-input" required>
  <div class="checkbox d-flex justify-content-between mt-4">
    <p class="lost-password">
      <a href="./forgotpassword.php">Forgot your password?</a>
    </p>
  </div>
  <div id="message" style="color:red;"></div> <!-- Message area -->
  <div class="modal-footer mt-5 d-flex justify-content-center">
    <button type="submit" class="btn btn-red hvr-sweep-to-right dark-sweep">Login</button> 
    <a href="./register.php" class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">Register</a>
  </div>
</form>

<?php
// Start the session


// Check for error or success messages
$success_message = '';
$error_message = '';

if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear message after displaying it
}

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']); // Clear message after displaying it
}
?>

<?php if (!empty($success_message)): ?>
    <div class="alert alert-success">
        <?php echo htmlspecialchars($success_message); ?>
    </div>
<?php endif; ?>

<?php if (!empty($error_message)): ?>
    <div class="alert alert-danger">
        <?php echo htmlspecialchars($error_message); ?>
    </div>
<?php endif; ?>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--nav bar buat admin-->
  <nav id="header-nav" class="navbar navbar-expand-lg">
    <div class="container-lg">
      <a class="navbar-brand" href="index.php">
        <img src="images/main-logo.png" class="logo" style="height: 100px;" alt="logo">
      </a>
      <button class="navbar-toggler d-flex d-lg-none order-3 border-0 p-1 ms-2" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <svg class="navbar-icon">
        <use xlink:href="#navbar-icon"></use>
      </svg>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar">
      <div class="offcanvas-header px-4 pb-0">
        <a class="navbar-brand ps-3" href="index.php">
          <img src="images/main-logo.png" class="logo"  style="height: 100px;" alt="logo">
        </a>
        <button type="button" class="btn-close btn-close-black p-5" data-bs-dismiss="offcanvas" aria-label="Close"
        data-bs-target="#bdNavbar"></button>
      </div>
      <div class="offcanvas-body">
        <!--role if here-->
        <ul id="navbar" class="navbar-nav fw-bold justify-content-end align-items-center flex-grow-1">

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <!--admin-->
                <li class="nav-item">
                    <a class="nav-link me-5" href="admindashboard.php">Modify Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-5" href="logout.php
                    ">Manage User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-5" href="#">View Registrants</a>
                </li>
    <?php endif; ?>

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
                <!--user-->
              <li class="nav-item">
                <a class="nav-link me-5" href="#">Available Event</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="#">My Event</a>
              </li>
    <?php endif; ?>
            </ul>
          </div>
        </div>

<!-- edit sini-->

<div class="user-items ps-0 ps-md-5">
  <ul class="d-flex justify-content-end list-unstyled align-item-center m-0">
  <?php if (isset($_SESSION['user_id'])): ?>
    <!-- Show User Image after Login -->
    <li class="pe-3">
        <a href="#" class="border-0" data-bs-toggle="dropdown" aria-expanded="false">
        <?php if (!empty($imagePath)): ?>
        <img src="<?= htmlspecialchars($imagePath); ?>" alt="User Image" width="50" height="50" class="rounded-circle">
    <?php else: ?>
                <svg class="user" width="50" height="50">
                    <use xlink:href="#user"></use>
                </svg>
            <?php endif; ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Hello, <?= $_SESSION['user_nama']; ?></a></li>
            <li><a class="dropdown-item" href="updateprofile.php">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
    </li>
<?php else: ?>
    <!-- Show Login and Cart Icons if Not Logged In -->
    <li class="pe-3">
        <a href="login" data-bs-toggle="modal" data-bs-target="#modallogin" class="border-0">
            <svg class="user" width="40" height="40">
                <use xlink:href="#user"></use>
            </svg>
        </a>
    </li>
<?php endif; ?>

  </ul>
</div>
      </div>
    </nav>

    <script>
document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form from submitting normally
  const formData = new FormData(this);
  
  fetch('login.php', {
    method: 'POST',
    body: formData,
  })
  .then(response => response.text())
  .then(data => {
    const messageDiv = document.getElementById('message');
    
    if (data === 'admin') {
      messageDiv.style.color = 'green';
      messageDiv.textContent = 'Login successful! Redirecting to admin page...';
      setTimeout(() => window.location.href = 'admindashboard.php', 2000);
    } else if (data === 'user') {
      messageDiv.style.color = 'green';
      messageDiv.textContent = 'Login successful! Redirecting to user dashboard...';
      setTimeout(() => window.location.href = 'index.php', 2000);
    } else {
      messageDiv.style.color = 'red';
      messageDiv.textContent = data; // Display error message
    }
  })
  .catch(error => {
    document.getElementById('message').textContent = 'An error occurred. Please try again.';
  });
});
</script>