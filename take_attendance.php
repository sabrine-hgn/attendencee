<?php
// Charger les étudiants
$students = json_decode(file_get_contents("students.json"), true);

// Si submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Nom du fichier du jour
    $filename = "attendance_" . date("Y-m-d") . ".json";

    // Vérifier si le fichier existe déjà
    if (file_exists($filename)) {
        echo "<h3>Attendance for today has already been taken.</h3>";
        exit;
    }

    // Préparer l'array résultat
    $attendance = [];

    foreach ($_POST['status'] as $student_id => $state) {
        $attendance[] = [
            "student_id" => $student_id,
            "status" => $state
        ];
    }

    // Enregistrer
    file_put_contents($filename, json_encode($attendance, JSON_PRETTY_PRINT));

    echo "<h3>Attendance saved successfully!</h3>";
    exit;
}

?>

<h2>Take Attendance</h2>

<form method="post">
    <table border="1" cellpadding="8">
        <tr>
            <th>Full Name</th>
            <th>Status</th>
        </tr>

        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['fullname'] ?></td>

                <td>
                    <label>
                        <input type="radio" name="status[<?= $student['id'] ?>]" value="present" required>
                        Present
                    </label>

                    <label>
                        <input type="radio" name="status[<?= $student['id'] ?>]" value="absent" required>
                        Absent
                    </label>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <br>
    <button type="submit">Save Attendance</button>
</form>
