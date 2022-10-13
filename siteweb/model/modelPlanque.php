<?php

function ajoutPlanque(string $nom,string  $prenom, string  $date){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->exec('INSERT INTO Planque(adresse,pays,type)  VALUES ("'.$nom.'","'.$prenom.'","'.$date.'")');


    }catch (PDOException $e){
        echo $e;
    }
}

function getPlanque(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from Planque where id='.$id.';');
        $var->execute();
        $liste=$var->fetch();


        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';
}
function deletePlanque(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('DELETE FROM `Planque` WHERE id='.$id.';');
        $var->execute();

    }catch (PDOException $e){
        echo $e;
    }

}

function listPlanque()
{
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from Planque');
        $var->execute();
        $liste=$var->fetchAll();

        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';

}