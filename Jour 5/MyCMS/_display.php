<?php

include('admin/_bdd.php');
$requete = $bdd->prepare("SELECT * FROM page WHERE id = :id");
$requete->execute(['id' => $_GET['page']]);
$page = $requete->fetch();

preg_match_all('/{bloc:([0-9]+)}/', $page['contenu'], $resultats);

if (!empty($resultats)) {
    foreach ($resultats[0] as $index => $blocCode) {
        $id = $resultats[1][$index];
        $requete = $bdd->prepare("SELECT contenu FROM bloc WHERE id = :id");
        $requete->execute(['id' => $id]);
        $bloc = $requete->fetch();

        if (!empty($bloc)) {
            $page['contenu'] = str_replace($blocCode, $bloc['contenu'], $page['contenu']);
        }
        else {
            $page['contenu'] = str_replace($blocCode, '', $page['contenu']);
        }
    }
}

$requete = $bdd->prepare("SELECT contenu FROM bloc WHERE id = 1");
$requete->execute();
$header = str_replace('{titre}', $page['nom'], $requete->fetch()['contenu']);

$requete = $bdd->prepare("SELECT contenu FROM bloc WHERE id = 2");
$requete->execute();
$footer = $requete->fetch()['contenu'];

$requete = $bdd->prepare("SELECT nom FROM utilisateur WHERE id = :id");
$requete->execute(['id' => $page['auteur']]);
$auteur = $requete->fetch()['nom'];

$timestamp = strtotime($page['creation']);
setlocale(LC_TIME, "fr_FR", "French");
$date = utf8_encode(strftime('%A %d %B', $timestamp));
$exp = explode(' ', $date);
$infos = "<br/><br/><p>Page créée par : $auteur le " . ucfirst($exp[0]) . ' ' . $exp[1] . ' ' . ucfirst($exp[2]) . "</p>";

$fullPage = $header . $page['contenu'] . $infos . $footer;

file_put_contents('archives/' . $page['id'] . '.html', $fullPage);

echo $fullPage;