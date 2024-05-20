<?php
include('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news_id'])) {
    $news_id = $_POST['news_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM news WHERE news_id=?");
        $stmt->execute([$news_id]);

        header("Location: news.php");
        exit();
    } catch (PDOException $e) {
        $error_message = "An error occurred: " . $e->getMessage();
    }
}

header("Location: news.php");
exit();
?>
