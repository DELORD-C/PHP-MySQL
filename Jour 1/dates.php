<?php

function frDate (bool $withHours = false) {
    setlocale(LC_TIME, "fr_FR", "French");
    $date = utf8_encode(strftime('%A %d %B'));
    $exp = explode(' ', $date);
    if ($withHours) {
        $exp[2] .= ' ' . date('H:i');
    }
    return ucfirst($exp[0]) . ' ' . $exp[1] . ' ' . ucfirst($exp[2]);
}

echo frDate();