<?php

function ajoutCible(string $nom,string  $prenom, string  $date, string $nomC, string  $nationalite){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->exec('INSERT INTO Cible(nom,prenom,dateN,nomC,nationalite)  VALUES ("'.$nom.'","'.$prenom.'","'.$date.'","'.$nomC.'","'.$nationalite.'")');


    }catch (PDOException $e){
        echo $e;
    }
}

function getCible(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from Cible where id='.$id.';');
        $var->execute();
        $liste=$var->fetch();


        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';
}
function deleteCible(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('DELETE FROM `Cible` WHERE id='.$id.';');
        $var->execute();

    }catch (PDOException $e){
        echo $e;
    }

}

function listCible()
{
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from Cible');
        $var->execute();
        $liste=$var->fetchAll();

        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';

}