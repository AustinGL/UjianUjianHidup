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
          <div class="modal-header bg-dark">
            <h1 class="modal-title text-white fs-5" id="deleteModalLabel">Delete Event</h1>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this event?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark rounded-3 text-white" data-bs-dismiss="modal">Close</button>
            <form id="deleteForm" action="del.php" method="POST">
                <input type="hidden" id="deleteEventId" name="id_events"> 
                <button type="submit" class="btn btn-danger rounded-3">Delete</button> 
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light" id="editEventModalLabel">Edit Event</h5>
          <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editEventForm" method="POST" action="ed.php" enctype="multipart/form-data">
            <input type="hidden" name="event_id" id="event_id">
            <div class="form-group mb-3">
              <label for="event-name">Event Name</label>
              <input type="text" name="event-name" id="event-name" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="DnT">Date and Time</label>
              <input type="datetime-local" name="DnT" id="DnT" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="slot">Max Capacity</label>
              <input type="number" name="slot" id="slot" class="form-control" min="1" value="1">
            </div>
            <div class="form-group mb-3">
              <label for="lokasi">Location</label>
              <input type="text" name="lokasi" id="lokasi" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="deskripsi">Description</label>
              <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="Foto">Event Image</label>
              <input type="file" name="Foto" id="Foto" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="status">Event Status</label>
              <select name="status" id="status" class="form-control">
                <option value="open">Open</option>
                <option value="closed">Closed</option>
                <option value="canceled">Canceled</option>
              </select>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-warning rounded-3">Update</button>
            </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteModal');
    var deleteEventIdInput = document.getElementById('deleteEventId');

    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var eventId = button.getAttribute('data-id');
            deleteEventIdInput.value = eventId; 
        });
    }

    var deleteUserModal = document.getElementById('deleteUserModal');
    var deleteUserIdInput = document.getElementById('userId');

    if (deleteUserModal) {
        deleteUserModal.addEventListener('show.bs.modal', function (event) {
          console.log(deleteUserIdInput, "ini id")
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-user-id');
            deleteUserIdInput.value = userId; 
        });
    }

    const editEventModal = document.getElementById('editEventModal');

    if (editEventModal) {
        editEventModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const datetime = button.getAttribute('data-datetime');
            const capacity = button.getAttribute('data-capacity');
            const location = button.getAttribute('data-location');
            const description = button.getAttribute('data-description');
            const status = button.getAttribute('data-status');

            document.getElementById('event_id').value = id;
            document.getElementById('event-name').value = name;
            document.getElementById('DnT').value = datetime;
            document.getElementById('slot').value = capacity;
            document.getElementById('lokasi').value = location;
            document.getElementById('deskripsi').value = description;
            document.getElementById('status').value = status;
        });
    }
});

</script>