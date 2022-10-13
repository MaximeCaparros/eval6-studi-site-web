<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/modelPlanque.php");
require_once ("../model/modelContact.php");
require_once ("../model/modelCible.php");
require_once ("../model/modelMission.php");
require_once ("../model/mission.php");
require_once ("../model/model.php");
require_once ("../model/planque.php");
require_once ("../model/specialite.php");
require_once ("../model/agent.php");
require_once ("../model/cible.php");
require_once ("../model/contact.php");

require_once("../controlers/controleurMission.php");



if(array_key_exists('supprimer', $_POST)) {
    supprimer();
}

function supprimer()
{
    if(isset($_GET["id"])) {

        $controler = new ControleurMission();
        $controler->supprimerMission($_GET["id"]);
    }
}
if(array_key_exists('retour', $_POST)) {
    annuler();
}
function annuler() {
    header("Location: index.php");

}

if (isset($_GET["id"])) {
    $vari = getMission($_GET["id"]);
    $var = new mission($vari[0],$vari[1],$vari[2],$vari[3],$vari[4],$vari[5],$vari[6],$vari[7],$vari[8],$vari[9],$vari[10],$vari[11],$vari[12],$vari[13]);

    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Supprimer Mission</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Supprimer Mission</h1>
    <form method="post" id="spe">';
    echo '
        <p> Titre de la mission :
            <input type="text" name="titre" disabled value="'.$var->getTitre().'"></p>';

    echo '
                <p> Description de la mission :
            <input type="text" name="descr" disabled value="'.$var->getDescr().'" ></p>';

    echo '
                <p> Nom de code mission :
            <input type="text" name="code" disabled value="'.$var->getNomC().'"></p>';
    echo '
        <p> Pays de la mission :
            <input type="text" name="pays" disabled value="'.$var->getPays().'"></p>';

    echo '
                <p>Statut de la mission :
            <input type="text" name="statut" disabled value="'.$var->getStatut().'"></p>';

    echo '
                <p>Type de la mission :
            <input type="text" name="type" disabled value="'.$var->getTypeMission().'"></p>';

    echo '
                <p>Date de début de la mission:
            <input type="date" name="dateD" disabled value="'.$var->getDateDebut().'"></p>';

    echo '
        <p> Date de fin de la mission :
            <input type="date" name="dateF" disabled value="'.$var->getDateFin().'"></p>';

    echo '
                <p> nomSpe :
            <select name="nomspecialite" id="spe-select">';

    $spe = getSpe($var->getSpecialite());

        echo '
            <option value="' . $spe[0] . '">' . $spe[1] . '</option>
        ';

    echo '</select><br><br>';


    echo '
                <p> Agent :
            <select name="Agent" id="spe-select">';

    $spe = getAgent($var->getIdAgent());



        echo '
            <option value="' . $spe[0] . '">' . $spe[5] . '</option>
        ';

    echo '</select><br><br>';

    echo '
                <p> Cible :
            <select name="Cible" id="spe-select">';
   $spe = getCible($var->getIdCible());

        echo '
            <option value="' . $spe[0] . '">' . $spe[4] . '</option>
        ';

    echo '</select><br><br>';


    echo '
                <p> Contact :
            <select name="Contact" id="spe-select">';
   $spe = getContact($var->getIdContact());

        echo '
            <option value="' .$spe[0] . '">' . $spe[4] . '</option>
            
        ';

    echo '</select><br><br>';

    echo '
                <p> Planque :
            <select name="Planque" id="spe-select">';
    $spe = getPlanque($var->getIdPlanque());

        echo '
            <option value="' . $spe[0] . '">' . $spe[1] . '</option>
        ';

    echo '</select><br><br>';


}


if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
    }
}




echo '

                  
    
        <input type="submit" name="supprimer"
               class="button" value="supprimer" />
         <input type="submit" name="retour"
               class="button" value="retour" />
    
    </form>
    
    </body>
    
    </html>'
?>

