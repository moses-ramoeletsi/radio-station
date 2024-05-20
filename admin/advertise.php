<?php
include('../includes/db_connection.php');


$stmt = $pdo->query("SELECT * FROM advertisements ORDER BY advert_id DESC");
$advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertise</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
<?php include ('admin_header.php'); ?>    
    <h1>Advertise</h1>
    <button onclick="location.href='add_advertisement.php'">Add Advertisement</button>
    
    <?php foreach ($advertisements as $advert): ?>
        <div class="card">

            <h4><?= $advert['created_date'] ?></h4>
            <h2><?= $advert['name'] ?></h2>
            <p><?= $advert['product_name'] ?></p>
            <p><?= $advert['price'] ?></p>
            <p><?= $advert['contacts'] ?></p>
            <p>Details: <?= $advert['description'] ?></p>
            <p>Location: <?= $advert['location'] ?></p>
            <div class="card-buttons">
                <a href="edit_advertisement.php?id=<?= $advert['advert_id'] ?>">Edit</a>
                <a href="delete_advertisement.php?id=<?= $advert['advert_id'] ?>" onclick="return confirm('Are you sure you want to delete this advertisement?')">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>
