<?php
//appeller une fonction via une variable


function display ($msg) {
    echo $msg;
}

//on stocke le nom de la fonction dans une variable
$var = 'display';
//on appelle la fonction via la variable
$var('Hello');


//est équivalent à
display('Hello');