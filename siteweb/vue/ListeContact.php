<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ('../model/modelContact.php');


try{
    require_once('../model/connexion.php');
}catch(PDOException $e){
    echo "aie erreur :". $e->getmessage;
}

if(array_key_exists('AjoutContact', $_POST)) {
    AjoutContactB();
}
function AjoutContactB() {
    header("Location: AjoutContact.php");

}


echo '<!DOCTYPE html>
    <html>
    <head>
    
        <title>Liste Contact</title>
        <meta charset="utf-8">
    </head>
    <body>
    <h1>Liste Contact</h1>';
try{


    echo '<table>
    <thead>
        <tr>
             <th>Nom des contacts</th>
             <th>Prenom des contacts</th>
             <th>Date de naissance des contacts</th>
             <th>Nom de code des contacts</th>
             <th>Nationalité des contacts</th>
        </tr>
    </thead>
    <tbody>';
    $cont = listContact();
    if (isset($_SESSION['username'])) {
        foreach ($cont as $e) {
            require_once ("../model/contact.php");
            $conta = new contact($e["id"],$e["nom"],$e["prenom"],$e["dateN"],$e["nomC"],$e["nationalite"]);

            echo ' <tr>
            <td><a href="voirContact.php?id=' . $conta->getId() . '"> ' . $conta->getNom() . '</a></td>';
            echo ' 
             <td> ' . $conta->getPrenom() . '</td>';
            echo ' 
             <td> ' . $conta->getDateN() . '</td>';
            echo ' 
             <td> ' . $conta->getNomC(). '</td>';
            echo ' 
            <td> ' . $conta->getNationalite(). '</td>';
            echo ' 
            <td><a href="deleteContact.php?id=' . $conta->getId() . '"> Supprimer </a></td>';
            echo ' 
            <td><a href="modifierContact.php?id=' . $conta->getId() . '"> modifier </a></td></tr>';
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
        <input type="submit" name="AjoutContact"
               class="button" value="Ajouter des contact" />

    </form>';
}
echo '
    </body>
    </html>';


?>



