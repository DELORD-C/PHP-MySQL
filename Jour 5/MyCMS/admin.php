<?php
    session_start();

    if (isset($_GET['disconnect'])) {
        session_destroy();
        header('location: admin.php');
    }

    if (isset($_SESSION['connected'])) {
        include('admin/_home.php');
    }
    else {
        include('admin/_connect.php');
    }
?>