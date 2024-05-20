<?php
$role = isset($_GET['role']) ? $_GET['role'] : '';

if ($role === 'admin') {
    header("Location: admin/admin.php");
    exit();
} else {
    header("Location: radio_station/home.php");
    exit();
}
?>
