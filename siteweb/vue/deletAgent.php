<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/model.php");
require_once ("../model/specialite.php");




if(array_key_exists('supprimer', $_POST)) {
    supprimer();
}
function supprimer()
{
    if(isset($_GET["id"])){

        require_once ("../controlers/controleur.php");
        $controler = new Controleur();
        $controler->supprimerAgent($_GET["id"]);

    }
}
if(array_key_exists('annuler', $_POST)) {
    annuler();
}
function annuler() {
    header("Location: ListeAgent.php");

}
echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Liste Agent</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Ajout agent</h1>
    <form method="post" id="spe">';


if (isset($_GET["id"])) {
    $var=getAgent($_GET["id"]);
    require_once ("../model/agent.php");

    echo ' <p> nom : <input type="text" disabled name="nom" value="'.$var->getNom().'"></p>';

    echo '
                <p> Prenom Agent* :
            <input type="text" name="prenom" disabled value="'.$var->getPrenom().'"></p>';

    echo '
                <p> date de naissance :
            <input type="date" name="date" disabled value="'.$var->getDateN().'"></p>';

    echo '
                <p> code d\'identification :
            <input type="number" name="code" disabled value="'.$var->getCodeId().'"></p>';

    echo '
                <p> Nationalité :
            <input type="text" name="nationalité" disabled value="'.$var->getNationalite().'"></p>';




    echo '
                    <p> nomSpe* :';






    $add=0;

    foreach ($var->getIdSpecialite() as $e) {

        $spe = getSpe($e);
        $spec = new specialite($spe[0],$spe[1]);
        echo '
                <select disabled name="nomspecialite".$add. id="spe-select">
                <option value="'.$spec->getId().'">'.$spec->getNomSpe().'</option>
                </select><br><br>
            ';
        $add =+ 1;
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

