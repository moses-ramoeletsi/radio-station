<?php include('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
</head>
<body>
<?php include ('admin_header.php'); ?>
    <h1>Latest News</h1>
    <a href="admin.php">Back</a>
    <button onclick="location.href= 'add_news.php'">Add News</button>
    <?php
    $stmt = $pdo->query("SELECT * FROM news");
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($news as $news_updates) {
        echo "<h2>{$news_updates['title']}</h2>";
        echo "<h3>Posted on: {$news_updates['created_date']}</h3>";
        echo "<p>{$news_updates['time']}</p>";
        echo "<p>{$news_updates['date']}</p>";
        echo "<p>Description: {$news_updates['description']}</p>";
        echo "<p>Location: {$news_updates['location']}</p>";
    }
    ?>
</body>
</html>
