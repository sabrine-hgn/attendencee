<?php
require_once "config.php";

function connectDB() {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME;

    try {
        $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", 
                         $DB_USER, 
                         $DB_PASS);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn; // succès
    } 
    catch (PDOException $e) {
        error_log("DATABASE ERROR: " . $e->getMessage(), 3, "db_errors.log");

        return false; // échec
    }
}
?>
