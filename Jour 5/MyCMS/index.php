<?php

if (isset($_GET['page'])) {
    include('_display.php');
}
else if (isset($_GET['auteur'])) {
    include('_auteur.php');
}
else {
    include('_home.php');
}