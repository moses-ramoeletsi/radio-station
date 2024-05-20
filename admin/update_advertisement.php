<?php
include('../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        
        $id = $_POST['advert_id'];
        $name = $_POST['name'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $contacts = $_POST['contacts'];
        
        $stmt = $pdo->prepare("UPDATE advertisements SET name=?, product_name=?, price =?, description=?, location=?, contacts=?,  created_date =CURRENT_TIMESTAMP WHERE advert_id=?");
        $success = $stmt->execute([$name, $product_name, $price, $description, $location, $contacts, $id]);

        if ($success) {
            
            session_start();
            $_SESSION['update_success'] = true;
        } else {
            
            session_start();
            $_SESSION['update_error'] = true;
        }
    } catch (PDOException $e) {
        
        error_log('Database Error: ' . $e->getMessage());
        
        session_start();
        $_SESSION['update_error'] = true;
    }

    
    header("Location: advertise.php");
    exit();
} else {
    
    header("Location: advertise.php");
    exit();
}
?>
