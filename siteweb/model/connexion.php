<?php


try
{
    $bdd = new PDO('mysql:host=localhost;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if ($bdd->exec('CREATE DATABASE IF NOT EXISTS eval6studiMa')) {
    $db_create  = "CREATE TABLE `eval6studiMa`.`specialite` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `nomSpe` VARCHAR(255) NOT NULL);";
    $bdd->exec($db_create);
    $db_create  = "CREATE TABLE `eval6studiMa`.`agent` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `idSpecialite` INT NOT NULL,`nom` VARCHAR(255) NOT NULL, `prenom` VARCHAR(255) NOT NULL, `dateN` date, `codeId` int NOT NULL, `nationalite` VARCHAR(255), FOREIGN KEY(`idSpecialite`) REFERENCES specialite(`id`));";
    $bdd->exec($db_create);
    $db_create  = "CREATE TABLE `eval6studiMa`.`cible` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `nom` VARCHAR(255) NOT NULL, `prenom` VARCHAR(255) NOT NULL, `dateN` date, `nomC` VARCHAR(255) NOT NULL, `nationalite` VARCHAR(255));";
    $bdd->exec($db_create);
    $db_create  = "CREATE TABLE `eval6studiMa`.`contact` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `nom` VARCHAR(255) NOT NULL, `prenom` VARCHAR(255) NOT NULL, `dateN` date, `nomC` VARCHAR(255) NOT NULL, `nationalite` VARCHAR(255));";
    $bdd->exec($db_create);
    $db_create  = "CREATE TABLE `eval6studiMa`.`Planque` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `adresse` VARCHAR(255) NOT NULL, `pays` VARCHAR(255), `type` VARCHAR(255));";
    $bdd->exec($db_create);
    $db_create  = "CREATE TABLE `eval6studiMa`.`Mission` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `idCible` INT NOT NULL, `idAgent` INT NOT NULL, `idContact` INT NOT NULL, `idPlanque` INT, `titre` VARCHAR(255), `descr` VARCHAR(255),
                    `nomC` VARCHAR(255),`pays` VARCHAR(255), `typeMission` VARCHAR(255), `statut` VARCHAR(255), `specialite` VARCHAR(255), `dateDebut` date, `dateFin` date,
                    FOREIGN KEY(`idCible`) REFERENCES cible(`id`),FOREIGN KEY(`idAgent`) REFERENCES agent(`id`),FOREIGN KEY(`idContact`) REFERENCES contact(`id`),FOREIGN KEY(`idPlanque`) REFERENCES planque(`id`));";
    $bdd->exec($db_create);
    $db_create  = "CREATE TABLE `eval6studiMa`.`administrateur` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `nom` VARCHAR(255) NOT NULL, `prenom` VARCHAR(255) NOT NULL,`adresseMail` VARCHAR(255), `mdp` VARCHAR(255), `dateCrea` date);";
    $bdd->exec($db_create);
}
}
catch(PDOException $e)
{
        die('Erreur : '.$e->getMessage());
}
 


