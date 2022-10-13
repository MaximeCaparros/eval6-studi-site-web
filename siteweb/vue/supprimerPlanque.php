<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/modelPlanque.php");
require_once ("../model/planque.php");

if(array_key_exists('supprimer', $_POST)) {
    supprimer();
}
function supprimer()
{
    if(isset($_GET["id"])){

        require_once ("../controlers/controleurPlanque.php");
        $controler = new controleurPlanque();
        $controler->supprimerPlanque($_GET["id"]);

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
        <title>Supprimer Planque</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Supprimer Planque</h1>
    <form method="post" id="spe">';
if (isset($_GET["id"])) {
    $var = getPlanque($_GET["id"]);

    $contact = new planque($var[0], $var[1], $var[2], $var[3]);
    echo '
        <p> Adresse Planque :
            <input type="text" name="adresse" disabled value="'.$contact->getAdresse().'" ></p>';

    echo '
                <p> Pays de la Planque :
            <input type="text" name="pays" disabled value="'.$contact->getPays().'" ></p>';

    echo '
                <p> Type de Planque:
            <input type="text" name="type" disabled value="'.$contact->getType().'"></p>';

}


if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
    }
}




echo '

                  
    
        <input type="submit" name="supprimer"
               class="button" value="Supprimer" />
         <input type="submit" name="retour"
               class="button" value="retour" />
    
    </form>
    
    </body>
    
    </html>'
?>

