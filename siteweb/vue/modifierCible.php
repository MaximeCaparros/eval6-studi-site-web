<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/modelCible.php");


if(array_key_exists('modifier', $_POST)) {
    modifier();
}
function modifier()
{
    {
        if(isset($_GET["id"]) and isset($_POST["Nom"]) and isset($_POST["prenom"])and isset($_POST["date"])and isset($_POST["code"])and isset($_POST["nationalité"])){

            if (!empty($_GET["id"]) and !empty($_POST["Nom"]) and !empty($_POST["prenom"]) and !empty($_POST["date"]) and !empty($_POST["code"]) and !empty($_POST["nationalité"])) {
                require_once("../controlers/controleurCible.php");
                $controler = new controleurCible();
                $controler->modifierCible($_GET["id"],$_POST["Nom"],$_POST["prenom"],$_POST["date"],$_POST["code"],$_POST["nationalité"]);
            }
            else{
                header('Location: /test/vue/AjoutCible.php?error=nom');
            }

        }else{
            header('Location: /test/vue/AjoutCible.php?error=nom');
        }
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
        <title>Modifier Cible</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Modifier Cible</h1>
    <form method="post" id="contact">';
if (isset($_GET["id"])) {
    $var = getCible($_GET["id"]);

    require_once("../model/cible.php");
    $contact = new cible($var[0],$var[1],$var[2],$var[3],$var[4],$var[5]);
    echo '
            <p> Nom Cible :
                <input type="text" name="Nom"  value="'.$contact->getNom().'"></p>';

    echo '
                    <p> Prenom Cible :
                <input type="text" name="prenom"  value="'.$contact->getPrenom().'"></p>';

    echo '
                    <p> date de naissance :
                <input type="date" name="date"  value="'.$contact->getDateN().'"></p>';

    echo '
                    <p> nom d\'identification :
                <input type="text" name="code"  value="'.$contact->getNomC().'"></p>';

    echo '
                    <p> Nationalité :
                <input type="text" name="nationalité"  value="'.$contact->getNationalite().'"></p>';
}

if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
    }
}




echo '

    
  <input type="submit" name="modifier"
               class="button" value="modifier" />
                <input type="submit" name="annuler"
               class="button" value="annuler" />
    
    </form>
    
    </body>
    
    </html>'
?>

