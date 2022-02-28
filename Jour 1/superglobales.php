<?php

//Les superglobales sont des variables globales définies automatiquement par php
//liste des variables superglobales

// $GLOBALS
// $_SERVER         //informations du client et du serveur
// $_GET            //données get
// $_POST           //données post
// $_FILES          //données files
// $_COOKIE         //cookie
// $_SESSION        //session (fonctionne comme cookie mais éphémère)
// $_REQUEST        //combinaison de get post et files
// $_ENV            //variables d'environnement

echo '<pre>';
var_dump($_ENV);
echo '</pre>';