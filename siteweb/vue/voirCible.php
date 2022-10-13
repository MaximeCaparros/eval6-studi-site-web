<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/modelCible.php");



if(array_key_exists('supprimer', $_POST)) {
    supprimer();
}
function supprimer()
{
    if(isset($_GET["id"])){

        require_once ("../controlers/controleurCible.php");
        $controler = new controleurCible();
        $controler->supprimerCible($_GET["id"]);

    }
}
if(array_key_exists('annuler', $_POST)) {
    annuler();
}
function annuler() {
    header("Location: ListeCible.php");

}

echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Voir Cible</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Voir Cible</h1>
    <form method="post" id="contact">';
if (isset($_GET["id"])) {
    $var = getCible($_GET["id"]);

    require_once("../model/cible.php");
    $contact = new cible($var[0],$var[1],$var[2],$var[3],$var[4],$var[5]);
    echo '
            <p> Nom Cible :
                <input type="text" name="Nom" disabled value="'.$contact->getNom().'"></p>';

    echo '
                    <p> Prenom Cible :
                <input type="text" name="prenom" disabled value="'.$contact->getPrenom().'"></p>';

    echo '
                    <p> date de naissance :
                <input type="date" name="date" disabled value="'.$contact->getDateN().'"></p>';

    echo '
                    <p> nom d\'identification :
                <input type="text" name="code" disabled value="'.$contact->getNomC().'"></p>';

    echo '
                    <p> Nationalité :
                <input type="text" name="nationalité" disabled value="'.$contact->getNationalite().'"></p>';
}

if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
    }
}




echo '

    

                <input type="submit" name="annuler"
               class="button" value="annuler" />
    
    </form>
    
    </body>
    
    </html>'
?>

