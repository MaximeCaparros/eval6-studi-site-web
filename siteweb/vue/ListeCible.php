<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ('../model/modelCible.php');
require_once ('../model/cible.php');

try{
    require_once('../model/connexion.php');
}catch(PDOException $e){
    echo "aie erreur :". $e->getmessage;
}

if(array_key_exists('AjoutCible', $_POST)) {
    AjoutCibleB();
}
function AjoutCibleB() {
    header("Location: AjoutCible.php");

}


echo '<!DOCTYPE html>
    <html>
    <head>
    
        <title>Liste Cible</title>
        <meta charset="utf-8">
    </head>
    <body>
    <h1>Liste Cible</h1>';
try{


    echo '<table>
    <thead>
        <tr>
             <th>Nom des cibles</th>
             <th>Prenom des cibles</th>
             <th>Date de naissance des cibles</th>
             <th>Nom de code des cibles</th>
             <th>Nationalité des cibles</th>
        </tr>
    </thead>
    <tbody>';
    $cont = listCible();
    if (isset($_SESSION['username'])) {
        foreach ($cont as $e) {
            $conta = new cible($e["id"],$e["nom"],$e["prenom"],$e["dateN"],$e["nomC"],$e["nationalite"]);

            echo ' <tr>
            <td><a href="voirCible.php?id=' . $conta->getId() . '"> ' . $conta->getNom() . '</a></td>';
            echo ' 
             <td> ' . $conta->getPrenom() . '</td>';
            echo ' 
             <td> ' . $conta->getDateN() . '</td>';
            echo ' 
             <td> ' . $conta->getNomC(). '</td>';
            echo ' 
            <td> ' . $conta->getNationalite(). '</td>';
            echo ' 
            <td><a href="supprimerCible.php?id=' . $conta->getId() . '"> Supprimer </a></td>';
            echo ' 
            <td><a href="modifierCible.php?id=' . $conta->getId() . '"> modifier </a></td></tr>';
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
        <input type="submit" name="AjoutCible"
               class="button" value="Ajouter des cibles" />

    </form>';
}
echo '
    </body>
    </html>';


?>



