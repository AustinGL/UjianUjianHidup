<?php
require "connect.php";

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        echo '<div class="d-flex justify-content-center flex-wrap">';
    
    // Loop through the events
    while ($row = $result->fetch_assoc()) {
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
        
        // Add Event button
        echo '          <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">';
        echo '            <svg class="quick-view">';
        echo '              <use xlink:href="#quick-view"></use>';
        echo '            </svg>';
        echo '          </button>';
        // Quick View button
        echo '          <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">';
        echo '            <svg class="quick-view">';
        echo '              <use xlink:href="#quick-view"></use>';
        echo '            </svg>';
        echo '          </button>';

        echo '        </div>';
        echo '      </div>';
        echo '    </div>'; // card-img
        echo '  </div>'; // product-card
        echo '</div>'; // col
    }

    echo '</div>'; // d-flex justify-content-center flex-wrap
} else {
    echo '<p>No events found.</p>';
}



$conn->close();
?>