<?php
include('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['schedule_id'])) {
    $schedule_id = $_POST['schedule_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM station_schedule WHERE id=?");
        $stmt->execute([$schedule_id]);

        header("Location: radio_programs.php");
        exit();
    } catch (PDOException $e) {
        $error_message = "An error occurred: " . $e->getMessage();
    }
}

header("Location: radio_programs.php");
exit();
?>
