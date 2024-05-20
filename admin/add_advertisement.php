<?php
include('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $contacts = $_POST['contacts'];
    
    $stmt = $pdo->prepare("INSERT INTO advertisements (name, product_name,  price,description, location, contacts) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$name, $product_name,$price , $description, $location, $contacts])) {
        header("Location: advertise.php");
        exit();
    } else {

        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertise</title>
</head>
<body>
<?php include ('admin_header.php'); ?>    
    <h1>Advertise</h1>
    <a href="advertise.php">Back</a>
    <form action="add_advertisement.php" method="post">
        Name: <input type="text" name="name"><br>
        Product Name: <input type="text" name="product_name"><br>
        Description: <textarea name="description"></textarea><br>
        Price:<input type="text" name="price"><br>
        Location: <input type="text" name="location"><br>
        Contacts: <input type="tel" name="contacts"><br>
        <input type="submit" value="Submit">
    </form>
    
</body>
</html>
