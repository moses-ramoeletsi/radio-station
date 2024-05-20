<?php include('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Station Admin</title>

    <style>
        .card-container {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 20px; 
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-right: 10px; 
            min-width: 200px; 
        }
    </style>
</head>
<?php include ('admin_header.php'); ?>    
<h1>Admin Page</h1>
  

    <div>

        <h2>Today's Progrmas</h2>
        <div class="card-container">

        <?php
    
    $currentDay = date('l');
    
    
    $stmt = $pdo->prepare("SELECT * FROM station_schedule WHERE program_day = :currentDay ORDER BY start_time");
    $stmt->execute(['currentDay' => $currentDay]);
    $station_schedule = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    foreach ($station_schedule as $schedule_) {
        ?>
        <div class="card">
            <h2><?php echo $schedule_['presenter_name']; ?></h2>
            <p><?php echo $schedule_['program_name']; ?></p>
            <p><?php echo $schedule_['program_day']; ?></p>
            <p><?php echo $schedule_['start_time']; ?> - <?php echo $schedule_['end_time']; ?></p>
        </div>
        <?php
    }
    ?>
    </div>
</div>
</body>
</html>
