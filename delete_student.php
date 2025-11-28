<?php
$conn = new mysqli("localhost", "root", "", "attendence");

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id = $id";

if ($conn->query($sql)) {
    echo "✔ Student deleted!";
} else {
    echo "Error: " . $conn->error;
}
?>

