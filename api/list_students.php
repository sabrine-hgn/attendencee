<?php
$conn = new mysqli("localhost", "root", "", "attendance_db");

$result = $conn->query("SELECT * FROM students");
?>

<h2>Students List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Matricule</th>
        <th>Group</th>
        <th>Actions</th>
    </tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['fullname'] ?></td>
    <td><?= $row['matricule'] ?></td>
    <td><?= $row['group_id'] ?></td>
    <td>
        <a href="update_student.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete_student.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</table>
