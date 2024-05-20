<?php include('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <?php include ('user_header.php'); ?>
    <h1>Schedule</h1>
    <a href="home.php">Back</a>
    <table>
        <thead>
            <tr>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $stmt = $pdo->query("SELECT * FROM station_schedule ORDER BY start_time");
            $station_schedule = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
            $timeSlots = array_unique(array_column($station_schedule, 'start_time')); 
            foreach ($timeSlots as $timeSlot) {
                echo "<tr>";
                foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day) {
                    echo "<td>";
                    foreach ($station_schedule as $schedule) {
                        if ($schedule['program_day'] === $day && $schedule['start_time'] === $timeSlot) {
                            echo "<h2>{$schedule['presenter_name']}</h2>";
                            echo "<p>{$schedule['program_name']}</p>";
                            echo "<p>{$schedule['start_time']} - {$schedule['end_time']}</p>";
                        }
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>