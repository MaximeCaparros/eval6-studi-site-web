<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/modelContact.php");
require_once ("../model/specialite.php");



if(array_key_exists('retour', $_POST)) {
    annuler();
}
function annuler() {
    header("Location: ListeContact.php");

}

echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Afficher Contact</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Afficher Contact</h1>
    <form method="post" id="contact">';
if (isset($_GET["id"])) {
    $var = getContact($_GET["id"]);

    require_once("../model/contact.php");
    $contact = new contact($var[0],$var[1],$var[2],$var[3],$var[4],$var[5]);
    echo '
            <p> Nom Contact :
                <input type="text" name="Nom" disabled value="'.$contact->getNom().'"></p>';

    echo '
                    <p> Prenom Contact :
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






echo '

    

                <input type="submit" name="retour"
               class="button" value="retour" />
    
    </form>
    
    </body>
    
    </html>'
?>

