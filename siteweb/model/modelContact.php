<?php

function ajoutContact(string $nom,string  $prenom, string  $date, string $nomC, string  $nationalite){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->exec('INSERT INTO contact(nom,prenom,dateN,nomC,nationalite)  VALUES ("'.$nom.'","'.$prenom.'","'.$date.'","'.$nomC.'","'.$nationalite.'")');


    }catch (PDOException $e){
        echo $e;
    }
}

function getContact(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from contact where id='.$id.';');
        $var->execute();
        $liste=$var->fetch();


        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';
}
function deleteContact(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('DELETE FROM `contact` WHERE id='.$id.';');
        $var->execute();

    }catch (PDOException $e){
        echo $e;
    }

}
function listContact()
{
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from contact');
        $var->execute();
        $liste=$var->fetchAll();

        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';

}