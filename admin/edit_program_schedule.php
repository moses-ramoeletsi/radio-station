<?php
include('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $presenter_name = $_POST['presenter_name'];
    $program_name = $_POST['program_name'];
    $program_day = $_POST['program_day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $schedule_id = $_POST['schedule_id'];

    try {
        $stmt = $pdo->prepare("UPDATE station_schedule SET presenter_name=?, program_name=?, program_day=?, start_time=?, end_time=? WHERE id=?");
        $stmt->execute([$presenter_name, $program_name, $program_day, $start_time, $end_time, $schedule_id]);

        header("Location: radio_programs.php");
        exit();
    } catch (PDOException $e) {
        $error_message = "An error occurred: " . $e->getMessage();
    }
}

// Retrieve schedule details for editing
if (isset($_GET['id'])) {
    $schedule_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM station_schedule WHERE id=?");
    $stmt->execute([$schedule_id]);
    $schedule = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Radio Program Schedule</title>
</head>
<body>
<?php include ('admin_header.php'); ?>    
    <h1>Edit Radio Program Schedule</h1>
    <a href="radio_programs.php">Back</a>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="edit_program_schedule.php" method="post">
        <input type="hidden" name="schedule_id" value="<?php echo $schedule['id']; ?>">
        Presenter name: <input type="text" name="presenter_name" value="<?php echo $schedule['presenter_name']; ?>" required><br>
        Program Name: 
        <select name="program_name"  value="<?php echo $schedule['program_name']; ?>" required>
            <option value="Morning Wake-Up Call">Morning Wake-Up Call</option>
            <option value="Breakfast Banter">Breakfast Banter</option>
            <option value="Mid-Morning Melodies">Mid-Morning Melodies</option>
            <option value="Lunchtime Lounge">Lunchtime Lounge</option>
            <option value="Afternoon Delight">Afternoon Delight</option>
            <option value="Drive Time Mix">Drive Time Mix</option>
            <option value="Evening Call Session">Evening Call Session</option>
            <option value="Night to Morning Groove Session">Night to Morning Groove Session</option>
            <option value="Sunday Seasion">Sunday Seasion</option>
        </select><br>
        Day: 
        <select name="program_day"  value="<?php echo $schedule['program_day']; ?>" required>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select><br>
        Start Time: 
        <input type="time" name="start_time" value="<?php echo $schedule['start_time']; ?>" required><br>
        End Time: 
        <input type="time" name="end_time" value="<?php echo $schedule['end_time']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
