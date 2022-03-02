<?php
    session_start();

    if (isset($_GET['disconnect'])) {
        session_destroy();
        header('location: admin.php');
    }

    if (isset($_SESSION['connected'])) {
        include('admin/home.php');
    }
    else {
        include('admin/connect.php');
    }
?>