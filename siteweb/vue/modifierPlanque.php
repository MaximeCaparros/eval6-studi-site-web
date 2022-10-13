<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/modelPlanque.php");
require_once ("../model/planque.php");

if(array_key_exists('modifier', $_POST)) {
    modifier();
}
function modifier()
{
    {
        if(isset($_GET["id"]) and isset($_POST["adresse"]) and isset($_POST["pays"])and isset($_POST["type"])){

            if (!empty($_GET["id"]) and !empty($_POST["adresse"]) and !empty($_POST["pays"]) and !empty($_POST["type"])) {
                require_once("../controlers/controleurPlanque.php");
                $controler = new controleurPlanque();
                $controler->modifierPlanque($_GET["id"],$_POST["adresse"],$_POST["pays"],$_POST["type"]);
            }
            else{
                header('Location: /test/vue/AjoutPlanque.php?error=nom');
            }

        }else{
            header('Location: /test/vue/AjoutPlanque.php?error=nom');
        }
    }
}
if(array_key_exists('retour', $_POST)) {
    annuler();
}
function annuler() {
    header("Location: ListePlanque.php");

}



echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Modifier Planque</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Modifier Planque</h1>
    <form method="post" id="spe">';
if (isset($_GET["id"])) {
    $var = getPlanque($_GET["id"]);

    $contact = new planque($var[0], $var[1], $var[2], $var[3]);
    echo '
        <p> Adresse Planque :
            <input type="text" name="adresse" value="'.$contact->getAdresse().'" ></p>';

    echo '
                <p> Pays de la Planque :
            <input type="text" name="pays" value="'.$contact->getPays().'" ></p>';

    echo '
                <p> Type de Planque:
            <input type="text" name="type" value="'.$contact->getType().'"></p>';

}


if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
    }
}




echo '

                  
    
        <input type="submit" name="modifier"
               class="button" value="modifier" />
         <input type="submit" name="retour"
               class="button" value="retour" />
    
    </form>
    
    </body>
    
    </html>'
?>

