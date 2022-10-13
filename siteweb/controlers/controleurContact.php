<?php
require_once ("../model/modelContact.php");
class controleurContact
{

    public function __construct()
    {

    }

    public function AjouterContact(string $nom,string  $prenom, string  $date, string $nomC, string  $nationalite){
        try{

            ajoutContact($nom,$prenom,$date,$nomC,$nationalite);

            header("Location: /vue/ListeContact.php");

        }catch (PDOException $e){
            echo $e;
        }

    }

    public function supprimerContact(int $id){
        try{

            deleteContact($id);

            header("Location: /vue/ListeContact.php");

        }catch (PDOException $e){
            echo $e;
        }
    }
    public function modifierContact(int $id, string $nom,string  $prenom, string  $date, string $nomC, string  $nationalite){
        try{

            deleteContact($id);
            ajoutContact($nom,$prenom,$date,$nomC,$nationalite);
            header("Location: /vue/ListeContact.php");

        }catch (PDOException $e){
            echo $e;
        }
    }

}