<?php

include('../includes/db_connection.php');


if (isset($_GET['id'])) {
    
    $advert_id = $_GET['id'];

    
    $stmt = $pdo->prepare("DELETE FROM advertisements WHERE advert_id = ?");
    $success = $stmt->execute([$advert_id]);

    if ($success) {
        
        header("Location: advertise.php?delete_success=true");
        exit();
    } else {
        
        header("Location: advertise.php?delete_error=true");
        exit();
    }
} else {
    
    header("Location: advertise.php");
    exit();
}
?>
