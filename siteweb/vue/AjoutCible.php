<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/model.php");
require_once ("../model/specialite.php");
if(array_key_exists('button1', $_POST)) {
    button1();
}

function button1()
{
    if(isset($_POST["Nom"]) and isset($_POST["prenom"])and isset($_POST["date"])and isset($_POST["code"])and isset($_POST["nationalité"])){

        if (!empty($_POST["Nom"]) and !empty($_POST["prenom"]) and !empty($_POST["date"]) and !empty($_POST["code"]) and !empty($_POST["nationalité"])) {
            require_once("../controlers/controleurCible.php");
            $controler = new controleurCible();
            $controler->AjouterCible($_POST["Nom"],$_POST["prenom"],$_POST["date"],$_POST["code"],$_POST["nationalité"]);
        }
        else{
            header('Location: /test/vue/AjoutCible.php?error=nom');
        }

    }else{
        header('Location: /test/vue/AjoutCible.php?error=nom');
    }
}
if(array_key_exists('retour', $_POST)) {
    annuler();
}
function annuler() {
    header("Location: ListeCible.php");

}



echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Ajouter Cible</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Ajouter Cible</h1>
    <form method="post" id="spe">';
echo '
        <p> Nom Cible :
            <input type="text" name="Nom" ></p>';

echo '
                <p> Prenom Cible :
            <input type="text" name="prenom" ></p>';

echo '
                <p> date de naissance :
            <input type="date" name="date" value=></p>';

echo '
                <p> nom d\'identification :
            <input type="text" name="code" value=></p>';

echo '
                <p> Nationalité :
            <input type="text" name="nationalité" value=></p>';


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

