<?php
include('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    $stmt = $pdo->prepare("INSERT INTO news (title, time, date, description, location, created_date) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->execute([$title, $time, $date, $description, $location]);

    header("Location: news.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News</title>
</head>
<body>
<?php include ('admin_header.php'); ?>    
    <h1>Add News</h1>
    <a href="news.php">Back</a>
    <form action="add_news.php" method="post">
   
        Title: <input type="text" name="title"><br>
        Date: <input type="date" name="date"><br>
        Time: <input type="time" name="time"><br>
        Description: <textarea name="description"></textarea><br>
        Location: <input type="text" name="location"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
