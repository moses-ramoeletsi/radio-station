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
    </style>
</head>
<body>
<?php include ('admin_header.php'); ?>
<div class="container">
    <h1>Latest News</h1>
    <button onclick="location.href= 'add_news.php'">Add News</button>
    <?php
    $stmt = $pdo->query("SELECT * FROM news ORDER BY news_id DESC");
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($news as $news_updates) {
        echo "<h2>{$news_updates['title']}</h2>";
        echo "<h3>Posted on: {$news_updates['created_date']}</h3>";
        echo "<p>{$news_updates['time']}</p>";
        echo "<p>{$news_updates['date']}</p>";
        echo "<p>Description: {$news_updates['description']}</p>";
        echo "<p>Location: {$news_updates['location']}</p>";
        echo "<a href='edit_news.php?news_id={$news_updates['news_id']}'>Edit</a>";
        echo " | ";
        echo "<form id='deleteForm{$news_updates['news_id']}' action='delete_news.php' method='post' style='display: inline;'>";
        echo "<input type='hidden' name='news_id' value='{$news_updates['news_id']}'>";
        echo "<button type='button' onclick='confirmDelete({$news_updates['news_id']})'>Delete</button>";
        echo "</form>";
        echo "<script>";
        echo "function confirmDelete(newsId) {";
        echo "    if (confirm('Are you sure you want to delete this schedule?')) {";
        echo "        document.getElementById('deleteForm' + newsId).submit();";
        echo "    }";
        echo "}";
        echo "</script>";
    }
    ?>
</div>
</body>
</html>
