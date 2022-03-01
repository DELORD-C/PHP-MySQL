<?php

if (!isset($_GET['id'])) {
    header('location: list.php');
}

include('connect.php');

