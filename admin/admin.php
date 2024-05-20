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

        .news-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
        }
        .news-item h3 {
            margin: 0;
            color: #333;
        }
        .news-item h4 {
            margin: 5px 0;
            color: #666;
        }
    </style>
</head>
<body>
<?php include ('admin_header.php'); ?>    
<h1>Admin Page</h1>

<div>
    <h2>Today's Programs</h2>
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

<h2>Today's News</h2>
<?php
// Query for today's news
$stmt_today = $pdo->query("SELECT * FROM news WHERE DATE(created_date) = CURDATE()");
$today_news = $stmt_today->fetchAll(PDO::FETCH_ASSOC);

if (count($today_news) > 0) {
    foreach ($today_news as $news_updates) {
        echo "<div class='news-item'>";
        echo "<h3>{$news_updates['title']}</h3>";
        echo "<h4>Posted on: {$news_updates['created_date']}</h4>";
        echo "<p>Time: {$news_updates['time']}</p>";
        echo "<p>Date: {$news_updates['date']}</p>";
        echo "<p>Description: {$news_updates['description']}</p>";
        echo "<p>Location: {$news_updates['location']}</p>";
        echo "</div>";
    }
} else {
    // Query for yesterday's news if no news is found for today
    $stmt_yesterday = $pdo->query("SELECT * FROM news WHERE DATE(created_date) = CURDATE() - INTERVAL 1 DAY");
    $yesterday_news = $stmt_yesterday->fetchAll(PDO::FETCH_ASSOC);

    foreach ($yesterday_news as $news_updates) {
        echo "<div class='news-item'>";
        echo "<h3>{$news_updates['title']}</h3>";
        echo "<h4>Posted on: {$news_updates['created_date']}</h4>";
        echo "<p>Time: {$news_updates['time']}</p>";
        echo "<p>Date: {$news_updates['date']}</p>";
        echo "<p>Description: {$news_updates['description']}</p>";
        echo "<p>Location: {$news_updates['location']}</p>";
        echo "</div>";
    }
}
?>
</body>
</html>
