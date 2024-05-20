<?php
include('../includes/db_connection.php');


if (isset($_GET['id'])) {
    
    $advert_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM advertisements WHERE advert_id = ?");
    $stmt->execute([$advert_id]);
    $advertisement = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    
    header("Location: advertise.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Advertisement</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
<?php include ('admin_header.php'); ?>    
    <h1>Edit Advertisement</h1>
    <form action="update_advertisement.php" method="post">
        <input type="hidden" name="advert_id" value="<?= $advertisement['advert_id'] ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $advertisement['name'] ?>"><br>
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" value="<?= $advertisement['product_name'] ?>"><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?= $advertisement['price'] ?>"><br>
        <label for="contacts">Contacts:</label>
        <input type="text" id="contacts" name="contacts" value="<?= $advertisement['contacts'] ?>"><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= $advertisement['description'] ?></textarea><br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?= $advertisement['location'] ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
