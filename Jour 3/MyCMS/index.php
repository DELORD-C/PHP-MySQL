<?php

if (isset($_GET['page'])) {
    include('display.php');
}
else {
    include('home.php');
}