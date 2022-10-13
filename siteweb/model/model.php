<?php


function listAgent()
{
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from agent');
        $var->execute();
        $liste=$var->fetchAll();

        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';
}
function ajoutSpe(string $nomspe)
{
    try {

        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->exec('INSERT INTO specialite (nomspe) VALUES ("'.$nomspe.'")');


    }catch (PDOException $e){
        echo $e;
    }


}
function ajoutSpeID(int $id,string $nomspe)
{
    try {
        require_once ("../model/specialite.php");
        $spec = new specialite($id,$nomspe);
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->exec('INSERT INTO specialite  VALUES ("'.$spec->getId().'","'.$spec->getNomSpe().'")');


    }catch (PDOException $e){
        echo $e;
    }


}

function listSpe()
{
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from specialite');
        $var->execute();
        $liste=$var->fetchAll();

        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';

}

function getSpe(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from specialite where id='.$id.';');
        $var->execute();
        $liste=$var->fetch();

        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';
}
function deleteSpe(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('DELETE FROM `specialite` WHERE id='.$id.';');
        $var->execute();

    }catch (PDOException $e){
        echo $e;
    }

}

function connexion(string $userA,string $passA):bool
{
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare("SELECT * FROM `administrateur` WHERE adresseMail='".$userA."' and mdp='".$passA."'");
        $var->execute();
        if ($var->fetch()>0) {

            return true;
        }
        else {

            return false;
        }
    }catch (PDOException $e){
        echo $e;
    }

    return false;
}

function ajoutAgent(int $idSpe,string $nom,string $prenom,string $dateN, int $codeId, string $nationalite)
{
    try {

        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $bdd->exec('INSERT INTO agent(idSpecialite,nom,prenom,dateN,codeId,nationalite)  VALUES ("'.$idSpe.'","'.$nom.'","'.$prenom.'","'.$dateN.'","'.$codeId.'","'.$nationalite.'")');


    }catch (PDOException $e){
        echo $e;
    }


}
function deletAgent(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('DELETE FROM `agent` WHERE id='.$id.';');
        $var->execute();

    }catch (PDOException $e){
        echo $e;
    }

}
function getAgent(int $id){
    try {
        $servname = 'localhost';
        $dbname = 'eval6studiMaEE';
        $user = 'root';
        $pass = '';


        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $var =$bdd->prepare('Select * from agent where id='.$id.';');
        $var->execute();
        $liste=$var->fetch();
        require_once ('../model/specialite.php');
        require_once ('../model/agent.php');



        return $liste;
    }catch (PDOException $e){
        echo $e;
    }
    return 'na';
}





