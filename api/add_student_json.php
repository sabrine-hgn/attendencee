<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $student_id = trim($_POST['student_id']);
    $name = trim($_POST['name']);
    $group = trim($_POST['group']);

    // Validation simple
    if (empty($student_id) || empty($name) || empty($group)) {
        die("All fields are required.");
    }
    if (!is_numeric($student_id)) {
        die("Student ID must be numeric.");
    }

    // Charger le fichier students.json s'il existe
    $file = 'students.json';
    if (file_exists($file)) {
        $students = json_decode(file_get_contents($file), true);
        if (!$students) $students = [];
    } else {
        $students = [];
    }

    // Ajouter le nouvel étudiant
    $students[] = [
        'student_id' => $student_id,
        'name' => $name,
        'group' => $group
    ];

    // Sauvegarder dans students.json
    file_put_contents($file, json_encode($students, JSON_PRETTY_PRINT));

    // Message de confirmation
    echo "<h3>Student $name has been successfully added!</h3>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
</head>
<body>
    <h2>Add New Student</h2>

    <form action="add_student.php" method="POST">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" required><br><br>

        <label for="name">Full Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="group">Group:</label>
        <input type="text" name="group" required><br><br>

        <input type="submit" value="Add Student">
    </form>
</body>
</html>
