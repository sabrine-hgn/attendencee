<?php
$conn = new mysqli("localhost", "root", "", "attendence");
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

// Vérifier si les données sont envoyées
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = intval($_POST['course_id']);
    $group_id = intval($_POST['group_id']);
    $prof_id = intval($_POST['prof_id']);

    if (!$course_id || !$group_id || !$prof_id) {
        die("All fields are required.");
    }

    $sql = "INSERT INTO attendance_sessions (course_id, group_id, opened_by, status)
            VALUES ($course_id, $group_id, $prof_id, 'opened')";

    if ($conn->query($sql)) {
        $session_id = $conn->insert_id;
        echo "✔ Session created successfully. Session ID: $session_id";
    } else {
        echo "Error: ".$conn->error;
    }
}
?>
