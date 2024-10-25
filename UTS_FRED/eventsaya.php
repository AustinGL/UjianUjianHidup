<?php
require "connect.php";

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo '<p>You need to log in to view your registered events.</p>';
    exit;
}

$user_id = $_SESSION['user_id'];  // Get the logged-in user's ID

// Query to fetch registered events for the user
$sql = "SELECT e.*, r.registration_id 
        FROM events e 
        JOIN registrations r ON e.id_events = r.event_id 
        WHERE r.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '<div class="container mt-5">';
    echo '  <h1 class="mb-4">My Registered Events</h1>';
    echo '  <div class="row">';

    // Loop through the registered events
    while ($row = $result->fetch_assoc()) {

        $event_id = $row['id_events']; 
        $registration_id = $row['registration_id']; // Fetch registration ID for deletion

        // Query to get the number of tickets the user bought for each event
        $ticket_query = "SELECT tickets AS user_tickets 
                         FROM registrations 
                         WHERE event_id = ? AND user_id = ?";
        $ticket_stmt = $conn->prepare($ticket_query);
        $ticket_stmt->bind_param("ii", $event_id, $user_id);
        $ticket_stmt->execute();
        $ticket_result = $ticket_stmt->get_result();

        // Default to 0 tickets if no registration exists
        $user_tickets = 0;
        if ($ticket_result && $ticket_result->num_rows > 0) {
            $ticket_row = $ticket_result->fetch_assoc();
            $user_tickets = $ticket_row['user_tickets'] ?? 0;
        }

        // Display event details in a card
        echo '<div class="col-md-4 mb-4">';
        echo '  <div class="card">';
        echo '    <img src="' . htmlspecialchars($row['photo']) . '" 
                        class="card-img-top" 
                        alt="' . htmlspecialchars($row['event_name']) . '" 
                        style="height: 200px; object-fit: cover;">';
        echo '    <div class="card-body">';
        echo '      <h5 class="card-title">' . htmlspecialchars($row['event_name']) . '</h5>';
        echo '      <p class="card-text">';
        echo '        <strong>Date:</strong> ' . htmlspecialchars($row['date_time']) . '<br>';
        echo '        <strong>Location:</strong> ' . htmlspecialchars($row['location']) . '<br>';
        echo '        <strong>Tickets:</strong> ' . $user_tickets;
        echo '      </p>';
        
        // Delete button inside a form
        echo '      <form method="POST" action="delete_registration.php">';
        echo '        <input type="hidden" name="registration_id" value="' . $registration_id . '">';
        echo '        <button type="submit" class="btn btn-danger">Delete Registration</button>';
        echo '      </form>';

        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }

    echo '  </div>';  // Close row
    echo '</div>';  // Close container

} else {
    echo '<p>No registered events found.</p>';
}

$stmt->close();
$conn->close();
?>
