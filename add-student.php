<?php
$conn = new mysqli("localhost", "root", "", "attendance_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = trim($_POST['fullname']);
    $matricule = trim($_POST['matricule']);
    $group_id = trim($_POST['group_id']);

    if (empty($fullname) || empty($matricule) || empty($group_id)) {
        die("All fields are required.");
    }

    $sql = "INSERT INTO students (fullname, matricule, group_id)
            VALUES ('$fullname', '$matricule', '$group_id')";

    if ($conn->query($sql)) {
        echo "✔ Student added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Add Student</h2>
<form method="POST">
    Fullname: <input type="text" name="fullname"><br><br>
    Matricule: <input type="text" name="matricule"><br><br>
    Group ID: <input type="number" name="group_id"><br><br>
    <button type="submit">Add Student</button>
</form>
