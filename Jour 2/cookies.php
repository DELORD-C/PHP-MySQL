<?php

//durée d'expiration maximum : (10 * 365 * 24 * 60 * 60)
if (isset($_COOKIE['lastConnected'])) {
    $last = date('d/m/Y - H:i:s', $_COOKIE['lastConnected']);
    echo $last;
}
setcookie('lastConnected', time(), time() + (10 * 365 * 24 * 60 * 60), '/');