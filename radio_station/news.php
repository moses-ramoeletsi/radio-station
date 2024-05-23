<?php include('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <style>
        .container {
            padding: 2rem;
            max-width: 1300px;
            margin: auto;
        }
        .card {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 1rem 0;
            padding: 1rem;
        }
        .card h2 {
            margin: 0 0 1rem 0;
            font-size: 1.5rem;
        }
        .card h4 {
            margin: 0 0 0.5rem 0;
            color: #555;
        }
        .card p {
            margin: 0.5rem 0;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<?php include ('user_header.php'); ?>
<div class="container">
    <h1>Latest News</h1>
    <?php
    $stmt = $pdo->query("SELECT * FROM news ORDER BY news_id DESC");
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($news as $news_updates) {
        echo "<div class='card'>";
        echo "<h2>{$news_updates['title']}</h2>";
        echo "<h4>Posted on: {$news_updates['created_date']}</h4>";
        echo "<p>Time: {$news_updates['time']}</p>";
        echo "<p>Date: {$news_updates['date']}</p>";
        echo "<p>Description: {$news_updates['description']}</p>";
        echo "<p>Location: {$news_updates['location']}</p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
