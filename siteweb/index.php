<?PHP
require_once ('../model/modelMission.php');
require_once ("../model/modelContact.php");
require_once ("../model/modelCible.php");
require_once ("../model/modelPlanque.php");
require_once ("../model/model.php");
require_once ('../model/mission.php');
require_once ("../model/planque.php");
require_once ("../model/specialite.php");
require_once ("../model/agent.php");
require_once ("../model/cible.php");
require_once ("../model/contact.php");
try{
require_once('../model/connexion.php');
}catch(PDOException $e){
    echo "aie erreur :". $e->getmessage;
}
include('header.inc.php');
if(array_key_exists('button1', $_POST)) {
    button1();
}
function button1() {
    header("Location: AjoutMission.php");

}

echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Liste Mission</title>
        <meta charset="utf-8">
    </head>
    <body>
    <h1>Liste Mission</h1>';
try{
    $agent = listMission();
    $array = array();
    foreach ($agent as $e) {

        $array[] = new mission($e["id"],$e["idCible"],$e["idAgent"],$e["idContact"],$e["idPlanque"], $e["titre"], $e["descr"], $e["nomC"], $e["pays"], $e["typeMission"], $e["statut"], $e["specialite"], $e["dateDebut"], $e["dateFin"]);

    }
    sort($array);


    echo '<table>
    <thead>
        <tr>
             
             <th>Titre des missions</th>
             <th>Description des missions</th>
             <th>Nom de code des missions</th>
             <th>Pays des missions</th>
             <th>Type de mission missions</th>
             <th>Statut des missions</th>
             <th>Specialitée des missions</th>     
             <th>Date de début des missions</th>
             <th>Date de fin des missions</th>
             <th>Cible des missions</th>
             <th>Agent des missions</th>
             <th>Contact des missions</th>
             <th>Planque des missions</th>
        </tr>
    </thead>
    <tbody>';



    foreach ($array as $e) {

        echo ' <tr>
            <td><a href="VoirMission.php?id=' . $e->getId() . '"> ' . $e->getTitre()  . '</a></td>';

        echo ' 
            <td> ' . $e->getDescr() . '</td>';
        echo ' 
            <td> ' . $e->getNomC() . '</td>';
        echo ' 
            <td> ' . $e->getPays() . '</td>';
        echo ' 
            <td> ' . $e->getTypeMission() . '</td>';
        echo ' 
            <td> ' . $e->getStatut() . '</td>';
        $spe=getSpe($e->getSpecialite());
        $ya = new specialite($spe[0], $spe[1]);

        echo ' 
            <td> ' . $ya->getNomSpe() . '</td>';

        echo ' 
            <td> ' . $e->getDateDebut() . '</td>';
        echo ' 
            <td> ' . $e->getDateFin() . '</td>';
        $spe=getCible($e->getIdCible());
        $ya = new cible($spe[0], $spe[1],$spe[2],$spe[3],$spe[4],$spe[5]);
        echo ' 
            <td> ' . $ya->getNomC() . '</td>';
        $spe=getAgent($e->getIdAgent());
        $ya = new agent($spe[0], $spe[1],$spe[2],$spe[3],$spe[4],$spe[5],$spe[6]);
        echo ' 
            <td> ' . $ya->getCodeId() . '</td>';
        $spe=getContact($e->getIdContact());
        $ya = new contact($spe[0], $spe[1],$spe[2],$spe[3],$spe[4],$spe[5]);
        echo ' 
            <td> ' . $ya->getNomC() . '</td>';
        $spe=getPlanque($e->getIdPlanque());
        $ya = new planque($spe[0], $spe[1], $spe[2], $spe[3]);
        echo ' 
            <td> ' . $ya->getAdresse() . '</td>';

  if (isset($_SESSION['username'])) {

      echo ' 
            <td><a href="supprimerMission.php?id=' . $e->getId() . '"> Supprimer </a></td>';
      echo ' 
            <td><a href="modifierMission.php?id=' . $e->getId() . '"> modifier </a></td></tr>';
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
               class="button" value="Ajouter des missions" />

    </form>';
}
echo '
    </body>
    </html>';


?>
