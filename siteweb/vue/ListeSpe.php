<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ('../model/model.php');


try{
    require_once('../model/connexion.php');
}catch(PDOException $e){
    echo "aie erreur :". $e->getmessage;
}

if(array_key_exists('button1', $_POST)) {
    button1();
}
function button1() {
    header("Location: AjoutSpecialite.php");

}


echo '<!DOCTYPE html>
    <html>
    <head>
    
        <title>Liste Specialite</title>
        <meta charset="utf-8">
    </head>
    <body>
    <h1>Liste Specialité</h1>';
try{
    $spe = listSpe();

    echo '<table>
    <thead>
        <tr>
             <th>Nom des spécialitées</th>
        </tr>
    </thead>
    <tbody>';

if (isset($_SESSION['username'])) {
    foreach ($spe as $e) {
        require_once ("../model/specialite.php");
        $spec = new specialite($e["id"],$e["nomSpe"]);

        echo ' <tr>
            <td><a href="voirSpe.php?id=' . $spec->getId() . '"> ' . $spec->getNomSpe() . '</a></td>';
        echo ' 
            <td><a href="deleteSpe.php?id=' . $spec->getId() . '"> Supprimer </a></td>';
        echo ' 
            <td><a href="modifSpe.php?id=' . $spec->getId() . '"> modifier </a></td></tr>';
    }
}
    echo '    </tbody>
</table>';
    }catch (PDOException $e){
        echo $e;
}
if (isset($_SESSION['username'])) {
    echo '
    <form method="post">
        <input type="submit" name="button1"
               class="button" value="Ajouter des spécialitées" />

    </form>';
}
echo '
    </body>
    </html>';


?>



