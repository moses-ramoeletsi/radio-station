<?php include('../includes/db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisement</title>
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
    <h1>Advertisements</h1>
    <?php
    $stmt = $pdo->query("SELECT * FROM advertisements ORDER BY advert_id DESC");
    $advertisements = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($advertisements as $adverts) {
        echo "<div class='card'>";
        echo "<h4>{$adverts['created_date']}</h4>";
        echo "<h2>{$adverts['name']}</h2>";
        echo "<p>Product: {$adverts['product_name']}</p>";
        echo "<p>Price: {$adverts['price']}</p>";
        echo "<p>Contacts: {$adverts['contacts']}</p>";
        echo "<p>Details: {$adverts['description']}</p>";
        echo "<p>Location: {$adverts['location']}</p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
