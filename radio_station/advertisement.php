<?php include('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement</title>
</head>
<body>
<?php include ('user_header.php'); ?>
    <h1>advertisements</h1>
    
    <a href="home.php">Back</a>

    <?php
    $stmt = $pdo->query("SELECT * FROM advertisements");
    $advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($advertisements as $adverts) {
        echo "<h2>{$adverts['name']}</h2>";
        echo "<p>{$adverts['product_name']}</p>";
        echo "<p>{$adverts['price']}</p>";
        echo "<p>{$adverts['contacts']}</p>";
        echo "<p>Details: {$adverts['description']}</p>";
        echo "<p>Location: {$adverts['location']}</p>";
    }
    ?>
</body>
</html>