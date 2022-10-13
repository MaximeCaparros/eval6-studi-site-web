<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ('../model/modelPlanque.php');
require_once ('../model/planque.php');

try{
    require_once('../model/connexion.php');
}catch(PDOException $e){
    echo "aie erreur :". $e->getmessage;
}

if(array_key_exists('AjoutPlanque', $_POST)) {
    AjoutPlanqueB();
}
function AjoutPlanqueB() {
    header("Location: AjoutPlanque.php");

}

echo '<!DOCTYPE html>
    <html>
    <head>
    
        <title>Liste Planque</title>
        <meta charset="utf-8">
    </head>
    <body>
    <h1>Liste Planque</h1>';
try{


    echo '<table>
    <thead>
        <tr>
             <th>Adresses des planques</th>
             <th>Pays des planques</th>
             <th>Type des planques</th>
        </tr>
    </thead>
    <tbody>';
    $cont = listPlanque();
    if (isset($_SESSION['username'])) {
        foreach ($cont as $e) {
            $conta = new Planque($e["id"],$e["adresse"],$e["pays"],$e["type"]);

            echo ' <tr>
            <td><a href="voirPlanque.php?id=' . $conta->getId() . '"> ' . $conta->getAdresse() . '</a></td>';
            echo ' 
             <td> ' . $conta->getPays() . '</td>';
            echo ' 
             <td> ' . $conta->getType() . '</td>';


            echo ' 
            <td><a href="supprimerPlanque.php?id=' . $conta->getId() . '"> Supprimer </a></td>';
            echo ' 
            <td><a href="modifierPlanque.php?id=' . $conta->getId() . '"> modifier </a></td></tr>';
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
        <input type="submit" name="AjoutPlanque"
               class="button" value="Ajouter des planques" />

    </form>';
}
echo '
    </body>
    </html>';


?>



