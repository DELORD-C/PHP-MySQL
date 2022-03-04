<?php

session_start();

if (!isset($_SESSION['connected']) || 'true' != $_SESSION['connected']) {
    $_SESSION['error'] = 'Merci de vous connecter pour accéder à ce contenu';
    header('location: /PHP-MySQL/Jour 5/MyCMS/admin.php');
}