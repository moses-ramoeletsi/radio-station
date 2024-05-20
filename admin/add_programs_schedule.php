<?php
include('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $presenter_name = $_POST['presenter_name'];
    $program_name = $_POST['program_name'];
    $program_day = $_POST['program_day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    try {
        $stmt = $pdo->prepare("INSERT INTO station_schedule (presenter_name, program_name, program_day, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$presenter_name, $program_name, $program_day, $start_time, $end_time]);

        header("Location: radio_programs.php");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $error_message = "This program schedule already exists. Please choose a different time or program.";
        } else {
            $error_message = "An error occurred: " . $e->getMessage();
        }
    }
}

function generate_time_options() {
    $times = [];
    for ($hour = 0; $hour < 24; $hour++) {
        for ($minute = 0; $minute < 60; $minute += 15) {
            $time = sprintf('%02d:%02d', $hour, $minute);
            $times[] = $time;
        }
    }
    return $times;
}

$time_options = generate_time_options();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Programs</title>
</head>
<body>
<?php include ('admin_header.php'); ?>    
    <h1>Radio Station Programs</h1>
    <a href="radio_programs.php">Back</a>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="add_programs_schedule.php" method="post">
        Presenter name: <input type="text" name="presenter_name" required><br>
        Program Name: 
        <select name="program_name" required>
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
        <select name="program_day" required>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select><br>
        Start Time: 
        <input type="time" name="start_time" required list="time-options"><br>
        End Time: 
        <input type="time" name="end_time" required list="time-options"><br>
        <datalist id="time-options">
            <?php foreach ($time_options as $time): ?>
                <option value="<?php echo $time; ?>">
            <?php endforeach; ?>
        </datalist>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
