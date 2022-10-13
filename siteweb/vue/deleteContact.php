<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/modelContact.php");
require_once ("../model/specialite.php");


if(array_key_exists('supprimer', $_POST)) {
    supprimer();
}
function supprimer()
{
    if(isset($_GET["id"])){

        require_once ("../controlers/controleurContact.php");
        $controler = new controleurContact();
        $controler->supprimerContact($_GET["id"]);

    }
}
if(array_key_exists('annuler', $_POST)) {
    annuler();
}
function annuler() {
    header("Location: ListeContact.php");

}

echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Supprimer Contact</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Supprimer Contact</h1>
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

    if (isset($_GET['error'])){
        if(!empty($_GET['error'])){
            echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
        }
    }




echo '

    
  <input type="submit" name="supprimer"
               class="button" value="supprimer" />
                <input type="submit" name="annuler"
               class="button" value="annuler" />
    
    </form>
    
    </body>
    
    </html>'
?>

