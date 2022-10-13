<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ('../model/model.php');



if(array_key_exists('retour', $_POST)) {
    retour();
}
function retour() {
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
    require_once ("../model/specialite.php");
    $spec = new specialite($var[0],$var[1]);
    echo ' <p> NomSpe : <input type="text" disabled name="nomSpe" value="'.$spec->getNomSpe().'"></p>';

}
echo '

    <input type="submit" name="retour"
           class="button" value="retour" />


</form>

</body>

</html>';

?>




