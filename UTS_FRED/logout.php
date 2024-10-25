<?php
session_start(); // Start the session
session_destroy(); // Destroy the session

// Redirect to index.php
header("Location: index.php");
exit(); // Ensure no further code is executed
?>