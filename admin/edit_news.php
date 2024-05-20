<?php
include('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $news_id = $_POST['news_id'];

    try {
        $stmt = $pdo->prepare("UPDATE news SET title=?, date=?, time=?, description=?, location=?, created_date =CURRENT_TIMESTAMP WHERE news_id=?");
        $stmt->execute([$title, $date, $time, $description, $location, $news_id]);

        header("Location: news.php");
        exit();
    } catch (PDOException $e) {
        $error_message = "An error occurred: " . $e->getMessage();
    }
}

if (isset($_GET['news_id'])) {
    $news_id = $_GET['news_id'];
    $stmt = $pdo->prepare("SELECT * FROM news WHERE news_id=?");
    $stmt->execute([$news_id]);
    $news = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta title="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
</head>
<body>
<?php include ('admin_header.php'); ?>    
    <h1>Edit News</h1>
    <a href="news.php">Back</a>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="edit_news.php" method="post">
        <input type="hidden" name="news_id" value="<?php echo $news['news_id']; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $news['title']; ?>" required><br>
        <label for="date">Product Name:</label>
        <input type="date" id="date" name="date" value="<?= $news['date'] ?>"><br>
        <label for="time">time:</label>
        <input type="time" id="time" name="time" value="<?= $news['time'] ?>"><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= $news['description'] ?></textarea><br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?= $news['location'] ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
