<?php
require "connect.php";
session_start();

if (isset($_POST['event_id'], $_POST['full_name'], $_POST['tickets'])) {
    $event_id = $_POST['event_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $tickets = (int) $_POST['tickets'];
    $user_id = $_SESSION['user_id'];

    $check_slots_sql = "SELECT SUM(tickets) AS total_tickets FROM registrations WHERE event_id = ?";
    $stmt_check_slots = $conn->prepare($check_slots_sql);
    $stmt_check_slots->bind_param("i", $event_id);
    $stmt_check_slots->execute();
    $result_check_slots = $stmt_check_slots->get_result();
    $row_check_slots = $result_check_slots->fetch_assoc();
    $total_registered_tickets = $row_check_slots['total_tickets'] ?? 0;

    $event_capacity_sql = "SELECT max_capacity FROM events WHERE id_events = ?";
    $stmt_event_capacity = $conn->prepare($event_capacity_sql);
    $stmt_event_capacity->bind_param("i", $event_id);
    $stmt_event_capacity->execute();
    $result_event_capacity = $stmt_event_capacity->get_result();
    $row_event_capacity = $result_event_capacity->fetch_assoc();
    $max_capacity = $row_event_capacity['max_capacity'];

    $available_tickets = $max_capacity - $total_registered_tickets;

    if (($total_registered_tickets + $tickets) > $max_capacity) {
        $_SESSION['message'] = [
            'type' => 'danger',
            'text' => 'Registration failed. Only ' . $available_tickets . ' tickets are available for this event.'
        ];
    } else {
        $sql = "INSERT INTO registrations (user_id, event_id, tickets) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $event_id, $tickets);

        if ($stmt->execute()) {
            $_SESSION['message'] = [
                'type' => 'success',
                'text' => 'Registration successful!'
            ];
        } else {
            $_SESSION['message'] = [
                'type' => 'danger',
                'text' => 'Registration failed. Please try again.'
            ];
        }

        $stmt->close();
    }

    $stmt_check_slots->close();
    $stmt_event_capacity->close();
    header('Location: index.php');
    exit();
} else {
    $_SESSION['message'] = [
        'type' => 'danger',
        'text' => 'Invalid request.'
    ];
    header('Location: index.php');
    exit();
}

$conn->close();
?>
