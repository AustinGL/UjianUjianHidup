<?php
require "connect.php";

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    // Loop through the events
    while ($row = $result->fetch_assoc()) {
        $event_id = $row['id_events']; 
        echo '<div class="col mb-4 mb-3" style="max-width: 600px;">';
        echo '  <div class="product-card position-relative" style="margin-bottom: 80px;">';

        // Display event name
        echo '    <div class="card-detail d-flex justify-content-between align-items-center mt-3">';
        echo '      <h2 class="section-title text-uppercase">' . $row['event_name'] . '</h2>';
        echo '    </div>';

        // Display event image
        echo '    <div class="card-img align-items-center">';
        echo '      <img src="' . $row['photo'] . '" alt="' . $row['event_name'] . '" 
                        class="product-image img-fluid rounded-3 w-100" 
                        style="height: 600px; object-fit: cover;">';

        // Card buttons
        echo '      <div class="cart-concern position-absolute d-flex justify-content-center">';
        echo '        <div class="cart-button d-flex gap-2 justify-content-center align-items-center">';

        // View event details button with data attributes
        echo '          <button type="button" class="btn btn-light" 
                            data-bs-toggle="modal" 
                            data-bs-target="#eventModal" 
                            data-description="' . htmlspecialchars($row['description']) . '"
                            data-date="' . htmlspecialchars($row['date_time']) . '"
                            data-location="' . htmlspecialchars($row['location']) . '"
                            data-capacity="' . htmlspecialchars($row['max_capacity']) . '"
                            data-status="' . htmlspecialchars($row['status']) . '">';
        echo '            <svg class="quick-view">';
        echo '              <use xlink:href="#quick-view"></use>';
        echo '            </svg>';
        echo '          </button>';
        
        echo '        </div>';
        echo '      </div>'; // cart-concern
        echo '    </div>'; // card-img
        echo '  </div>'; // product-card
        echo '</div>'; // d-flex justify-content-center flex-wrap
    }

} else {
    echo '<p>No events found.</p>';
}

$conn->close();
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
  const eventModal = document.getElementById('eventModal');
  eventModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget; // Button that triggered the modal

    // Extract info from data attributes
    const description = button.getAttribute('data-description');
    const date = button.getAttribute('data-date');
    const location = button.getAttribute('data-location');
    const capacity = button.getAttribute('data-capacity');
    const status = button.getAttribute('data-status');

    // Update the modal's content
    eventModal.querySelector('.modal-body #description').textContent = description;
    eventModal.querySelector('.modal-body #date').textContent = date;
    eventModal.querySelector('.modal-body #location').textContent = location;
    eventModal.querySelector('.modal-body #capacity').textContent = capacity;
    eventModal.querySelector('.modal-body #status').textContent = status;
  });
});
</script>

<!-- Modal Structure -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row mb-2">
            <div class="col-4"><strong>Description:</strong></div>
            <div class="col-8" id="description"></div>
          </div>
          <div class="row mb-2">
            <div class="col-4"><strong>Date:</strong></div>
            <div class="col-8" id="date"></div>
          </div>
          <div class="row mb-2">
            <div class="col-4"><strong>Location:</strong></div>
            <div class="col-8" id="location"></div>
          </div>
          <div class="row mb-2">
            <div class="col-4"><strong>Max Capacity:</strong></div>
            <div class="col-8" id="capacity"></div>
          </div>
          <div class="row mb-2">
            <div class="col-4"><strong>Status:</strong></div>
            <div class="col-8" id="status"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
