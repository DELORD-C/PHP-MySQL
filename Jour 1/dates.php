<?php

function frDate () {
    setlocale(LC_TIME, "fr_FR", "French");
    $date = utf8_encode(strftime('%A %d %B'));
    $exp = explode(' ', $date);
    return ucfirst($exp[0]) . ' ' . $exp[1] . ' ' . ucfirst($exp[2]);
}

echo frDate();