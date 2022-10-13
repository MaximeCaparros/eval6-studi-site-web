<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/modelPlanque.php");
require_once ("../model/planque.php");
if(array_key_exists('button1', $_POST)) {
    button1();
}

function button1()
{
    if(isset($_POST["adresse"]) and isset($_POST["pays"])and isset($_POST["type"])){

        if (!empty($_POST["adresse"]) and !empty($_POST["pays"]) and !empty($_POST["type"])) {
            require_once("../controlers/controleurPlanque.php");
            $controler = new controleurPlanque();
            $controler->AjouterPlanque($_POST["adresse"],$_POST["pays"],$_POST["type"]);
        }
        else{
            header('Location: /test/vue/AjoutPlanque.php?error=nom');
        }

    }else{
        header('Location: /test/vue/AjoutPlanque.php?error=nom');
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
        <title>Ajouter Planque</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Ajouter Planque</h1>
    <form method="post" id="spe">';
echo '
        <p> Adresse Planque :
            <input type="text" name="adresse" ></p>';

echo '
                <p> Pays de la Planque :
            <input type="text" name="pays" ></p>';

echo '
                <p> Type de Planque:
            <input type="text" name="type" value=></p>';




if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
    }
}




echo '

                  
    
        <input type="submit" name="button1"
               class="button" value="Ajouter" />
         <input type="submit" name="retour"
               class="button" value="retour" />
    
    </form>
    
    </body>
    
    </html>'
?>

