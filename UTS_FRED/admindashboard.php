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

<?php include 'dashboardelite.php' ?>

<?php include 'footer.php' ?>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h1 class="modal-title text-white fs-5" id="deleteModalLabel">Delete Event</h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this event?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark text-white" data-bs-dismiss="modal">Close</button>
            <form id="deleteForm" action="del.php" method="POST">
                <input type="hidden" id="deleteEventId" name="id_events"> 
                <button type="submit" class="btn btn-danger">Delete</button> 
            </form>
          </div>
        </div>
      </div>
    </div>


  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
</body>

</html>