<?php
$conn = new mysqli("localhost", "root", "", "attendence");
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $session_id = intval($_POST['session_id']);

    if (!$session_id) die("Session ID is required.");

    $sql = "UPDATE attendance_sessions SET status='closed' WHERE id=$session_id";

    if ($conn->query($sql)) {
        echo "✔ Session $session_id closed successfully.";
    } else {
        echo "Error: ".$conn->error;
    }
}
?>
