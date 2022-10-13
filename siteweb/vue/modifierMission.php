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
        if(isset($_POST["titre"]) and isset($_POST["descr"])and isset($_POST["code"]) and isset($_POST["pays"])
            and isset($_POST["statut"]) and isset($_POST["type"]) and isset($_POST["dateD"]) and isset($_POST["dateF"]) and isset($_POST["nomspecialite"])
            and isset($_POST["Agent"]) and isset($_POST["Cible"]) and isset($_POST["Contact"]) and isset($_POST["Planque"])){

            if (!empty($_POST["titre"]) and !empty($_POST["descr"])and !empty($_POST["code"]) and !empty($_POST["pays"])
                and !empty($_POST["statut"]) and !empty($_POST["type"]) and !empty($_POST["dateD"]) and !empty($_POST["dateF"]) and !empty($_POST["nomspecialite"])
                and !empty($_POST["Agent"]) and !empty($_POST["Cible"]) and !empty($_POST["Contact"]) and !empty($_POST["Planque"])) {
                require_once("../controlers/controleurMission.php");
                $controler = new controleurMission();
                $controler->modifierMission($_GET["id"],$_POST["titre"],$_POST["descr"],$_POST["code"],$_POST["pays"],$_POST["type"],$_POST["statut"],$_POST["dateD"]
                    ,$_POST["dateF"],$_POST["nomspecialite"],$_POST["Agent"],$_POST["Cible"],$_POST["Contact"],$_POST["Planque"]);
            }
            else{
                header('Location: /test/vue/index.php?error=nom');
            }

        }else{
            header('Location: /test/vue/index.php?error=nom');
        }
    }else{
        header('Location: /test/vue/index.php?error=nom');
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
        <title>Modifier Mission</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Modifier Mission</h1>
    <form method="post" id="spe">';
    echo '
        <p> Titre de la mission :
            <input type="text" name="titre" value="' . $var->getTitre() . '"></p>';

    echo '
                <p> Description de la mission :
            <input type="text" name="descr" value="' . $var->getDescr() . '" ></p>';

    echo '
                <p> Nom de code mission :
            <input type="text" name="code" value="' . $var->getNomC() . '"></p>';
    echo '
        <p> Pays de la mission :
            <input type="text" name="pays" value="' . $var->getPays() . '"></p>';

    echo '
                <p>Statut de la mission :
            <input type="text" name="statut" value="' . $var->getStatut() . '"></p>';

    echo '
                <p>Type de la mission :
            <input type="text" name="type" value="' . $var->getTypeMission() . '"></p>';

    echo '
                <p>Date de début de la mission:
            <input type="date" name="dateD" value="' . $var->getDateDebut() . '"></p>';

    echo '
        <p> Date de fin de la mission :
            <input type="date" name="dateF" value="' . $var->getDateFin() . '"></p>';

    echo '
                <p> nomSpe :
            <select name="nomspecialite" id="spe-select">';
    $spe = getSpe($var->getSpecialite());

    echo '
            <option value="' . $spe[0] . '">' . $spe[1] . '</option>
        ';


    $spe = listSpe();
    foreach ($spe as $e) {
        $spec = new specialite($e["id"], $e["nomSpe"]);
        if ($e["id"] != $var->getSpecialite())
            echo '
                <option value="' . $spec->getId() . '">' . $spec->getNomSpe() . '</option>
            ';
    }
    echo '</select><br><br>';


    echo '
                <p> Agent :
            <select name="Agent" id="spe-select">';


    $spe = getAgent($var->getIdAgent());


    echo '
            <option value="' . $spe[0] . '">' . $spe[5] . '</option>
        ';

    $spe = listAgent();
    foreach ($spe as $e) {
        $ag = new agent($e["id"], $e["idSpecialite"], $e["nom"], $e["prenom"], $e["dateN"], $e["codeId"], $e["nationalite"]);
        if ($e["id"] != $var->getIdAgent())
            echo '
                <option value="' . $ag->getId() . '">' . $ag->getCodeId() . '</option>
            ';
    }
    echo '</select><br><br>';

    echo '
                <p> Cible :
            <select name="Cible" id="spe-select">';

    $spe = getCible($var->getIdCible());

    echo '
            <option value="' . $spe[0] . '">' . $spe[4] . '</option>
        ';

    $spe = listCible();
    foreach ($spe as $e) {
        $ci = new cible($e["id"], $e["nom"], $e["prenom"], $e["dateN"], $e["nomC"], $e["nationalite"]);
        if ($e["id"] != $var->getIdCible())
            echo '
                <option value="' . $ci->getId() . '">' . $ci->getNomC() . '</option>
            ';
    }
    echo '</select><br><br>';


    echo '
                <p> Contact :
            <select name="Contact" id="spe-select">';


    $spe = getContact($var->getIdContact());

    echo '
            <option value="' . $spe[0] . '">' . $spe[4] . '</option>
            
        ';

    $spe = listContact();
    foreach ($spe as $e) {
        $co = new contact($e["id"], $e["nom"], $e["prenom"], $e["dateN"], $e["nomC"], $e["nationalite"]);
        if ($e["id"] != $var->getIdContact())
            echo '
                <option value="' . $co->getId() . '">' . $co->getNomC() . '</option>
                
            ';
        var_dump($e);
    }
    echo '</select><br><br>';

    echo '
                <p> Planque :
            <select name="Planque" id="spe-select">';

    $spe = getPlanque($var->getIdPlanque());

    echo '
            <option value="' . $spe[0] . '">' . $spe[1] . '</option>
        ';

    $spe = listPlanque();
    foreach ($spe as $e) {
        $pl = new planque($e["id"], $e["adresse"], $e["pays"], $e["type"]);
        if ($e["id"] != $var->getIdPlanque())
            echo '
                <option value="' . $pl->getId() . '">' . $pl->getAdresse() . '</option>
            ';
    }
    echo '</select><br><br>';

}

if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
    }
}




echo '

                  
    
        <input type="submit" name="supprimer"
               class="button" value="modifier" />
         <input type="submit" name="retour"
               class="button" value="retour" />
    
    </form>
    
    </body>
    
    </html>'
?>

