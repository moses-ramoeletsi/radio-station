<?php include('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
</head>
<body>
<?php include ('user_header.php'); ?>
    <h1>Latest News</h1>
    <a href="home.php">Back</a>
    <?php
    $stmt = $pdo->query("SELECT * FROM news");
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($news as $news_updates) {
        echo "<h2>{$news_updates['title']}</h2>";
        echo "<p>{$news_updates['time']}</p>";
        echo "<p>{$news_updates['date']}</p>";
        echo "<p>Price: {$news_updates['description']}</p>";
        echo "<p>Price: {$news_updates['location']}</p>";
    }
    ?>
</body>
</html>
