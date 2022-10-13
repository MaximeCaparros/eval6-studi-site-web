<?php

require_once ("../model/mission.php");

function ajoutMission(string $titre, string $descr, string $nomC, string $pays, string $typeMission,
                      string $statut, string $dateDebut, string $dateFin, int $specialite, int $idAgent,
                      int $idCible, int $idContact, int $idPlanque){
    try {





        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->exec('INSERT INTO Mission(idCible,idAgent,idContact,idPlanque,titre,descr,nomC,
                    pays,typeMission,statut,specialite,dateDebut,dateFin)
                VALUES ("'.$idCible.'","'.$idAgent.'","'.$idContact.'","'.$idPlanque.'","'.$titre.'","'.$descr.'","'.$nomC.'"
                ,"'.$pays.'","'.$typeMission.'","'.$statut.'","'.$specialite.'","'.$dateDebut.'","'.$dateFin.'")');


    }catch (PDOException $e){
        echo $e;
    }
}

function getMission(int $id)
{
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from Mission where id='.$id.';');
        $var->execute();
        $liste=$var->fetch();


        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';
}
function deleteMission(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('DELETE FROM `Mission` WHERE id='.$id.';');
        $var->execute();

    }catch (PDOException $e){
        echo $e;
    }

}
function listMission()
{
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from Mission');
        $var->execute();
        $liste=$var->fetchAll();

        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';

}