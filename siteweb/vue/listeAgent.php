<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ('../model/model.php');
require_once ('../model/agent.php');
require_once ('../model/specialite.php');
try{
    require_once('../model/connexion.php');
}catch(PDOException $e){
    echo "aie erreur :". $e->getmessage;
}

if(array_key_exists('button1', $_POST)) {
    button1();
}
function button1() {
    header("Location: AjoutAgent.php");
}


echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Liste Agent</title>
        <meta charset="utf-8">
    </head>
    <body>
    <h1>Liste Agent</h1>';
try{
    $agent = listAgent();
    $array = array();
       foreach ($agent as $e) {

               $array[] = new agent($e["id"], $e["idSpecialite"], $e["nom"], $e["prenom"], $e["dateN"], $e["codeId"], $e["nationalite"]);

       }
    sort($array);


    echo '<table>
    <thead>
        <tr>
             
             <th>Nom des agents</th>
             <th>Prenom des agents</th>
             <th>Date de Naissance des agents</th>
             <th>codeId des agents</th>
             <th>nationalite des agents</th>
             <th>Specialitée(s) des agents</th>
        </tr>
    </thead>
    <tbody>';



        foreach ($array as $e) {

            echo ' <tr>
            <td><a href="voirAgent.php?id=' . $e->getId() . '"> ' . $e->getNom()  . '</a></td>';

            echo ' 
            <td> ' . $e->getPrenom() . '</td>';
            echo ' 
            <td> ' . $e->getDateN() . '</td>';
            echo ' 
            <td> ' . $e->getCodeId() . '</td>';
            echo ' 
            <td> ' . $e->getNationalite() . '</td>';

            $spe=getSpe($e->getIdSpecialite());
            $ya = new specialite($spe[0], $spe[1]);

            echo ' 
            <td> ' . $ya->getNomSpe() . '</td>';

            echo ' 
            <td><a href="deletAgent.php?id=' . $e->getId() . '"> Supprimer </a></td>';
            echo ' 
            <td><a href="modifierAgent.php?id=' . $e->getId() . '"> modifier </a></td></tr>';
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
               class="button" value="Ajouter des agents" />

    </form>';
}
echo '
    </body>
    </html>';


?>



