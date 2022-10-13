<?
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ('../model/model.php');


if(array_key_exists('modifier', $_POST)) {
    modifier();
}
function modifier()
{
    if(isset($_GET["id"]) and isset($_POST["nomSpe"])){
        if (!empty($_POST["nomSpe"])) {
            require_once("../controlers/controleur.php");
            $controler = new Controleur();
            $controler->modifierSpecialite($_GET["id"], $_POST["nomSpe"]);
        }
        else{
            header('Location: /test/vue/modifSpe.php?error=nom&id='.$_GET["id"]);
        }
    }
}
if(array_key_exists('annuler', $_POST)) {
    annuler();
}
function annuler() {
    header("Location: ListeSpe.php");

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
    ';

if (isset($_GET["id"])) {
    $var=getSpe($_GET["id"]);
    echo ' <p> NomSpe : <input type="text" name="nomSpe" value="'.$var[1].'"></p>';

}
if (isset($_GET['error'])){
    if(!empty($_GET['error'])){
        echo '<p id="error">Veuillez remplir le champ nomSpe ! :(</p></br></br>';
    }
}
echo '
    <input type="submit" name="modifier"
           class="button" value="modifier" />
    <input type="submit" name="annuler"
           class="button" value="annuler" />


</form>

</body>

</html>';

?>




