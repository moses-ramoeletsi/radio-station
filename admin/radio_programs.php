<?php include('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <style>
         .container {
            padding: 2rem;
            max-width: 1300px;
            margin: auto;
        }
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
<?php include ('admin_header.php'); ?>    
<div class="container">
    <h1>Schedule</h1>
    <button onclick="location.href= 'add_programs_schedule.php'">Add Advertisement</button>

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
                            // Add edit and delete options
                            echo "<a href='edit_program_schedule.php?id={$schedule['id']}'>Edit</a>";
                            echo " | ";
                            echo "<form id='deleteForm{$schedule['id']}' action='delete_program_schedule.php' method='post' style='display: inline;'>";
                            echo "<input type='hidden' name='schedule_id' value='{$schedule['id']}'>";
                            echo "<button type='button' onclick='confirmDelete({$schedule['id']})'>Delete</button>";
                            echo "</form>";
                            echo "<script>";
                            echo "function confirmDelete(scheduleId) {";
                            echo "    if (confirm('Are you sure you want to delete this schedule?')) {";
                            echo "        document.getElementById('deleteForm' + scheduleId).submit();";
                            echo "    }";
                            echo "}";
                            echo "</script>";
                        }
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>
