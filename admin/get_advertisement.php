<?php

include('../includes/db_connection.php');


if(isset($_GET['advert_id'])) {
    
    $advert_id = $_GET['advert_id'];
    
    
    $stmt = $pdo->prepare("SELECT * FROM advertisements WHERE advert_id = ?");
    $stmt->execute([$advert_id]);
    
    
    $advertisement = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if($advertisement) {
        
        header('Content-Type: application/json');
        echo json_encode($advertisement);
    } else {
        
        echo json_encode((object)[]);
    }
} else {
    
    echo "Error: advert_id parameter is missing.";
}
?>
