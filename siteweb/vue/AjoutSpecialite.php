<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
if(array_key_exists('button1', $_POST)) {
    button1();
}

function button1()
{
    if(isset($_POST["nomSpe"])){
        if (!empty($_POST["nomSpe"])) {
            require_once("../controlers/controleur.php");
            $controler = new Controleur();
            $controler->AjouterSpecialite($_POST["nomSpe"]);
        }
        else{
            header('Location: /test/vue/AjoutSpecialite.php?error=nom');
        }

    }
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
<form method="post" id="spe">
    <p> nomSpe* :
        <input type="text" name="nomSpe"></p>';
if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir le champ nomSpe ! :(</p></br></br>';
    }
}

echo '


    <input type="submit" name="button1"
           class="button" value="Ajouter" />

</form>

</body>

</html>'
?>

