<?php
$conn = new mysqli("localhost", "root", "", "attendence");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id = $id");
    $student = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $matricule = $_POST['matricule'];
    $group_id = $_POST['group_id'];

    $sql = "UPDATE students SET 
                fullname='$fullname',
                matricule='$matricule',
                group_id='$group_id'
            WHERE id=$id";

    if ($conn->query($sql)) {
        echo "✔ Student updated!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Edit Student</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $student['id'] ?>">
    Fullname: <input type="text" name="fullname" value="<?= $student['fullname'] ?>"><br><br>
    Matricule: <input type="text" name="matricule" value="<?= $student['matricule'] ?>"><br><br>
    Group ID: <input type="number" name="group_id" value="<?= $student['group_id'] ?>"><br><br>
    <button type="submit">Update</button>
</form>
