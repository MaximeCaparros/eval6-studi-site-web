<?php
require_once ("../model/modelCible.php");
class controleurCible
{

    public function __construct()
    {

    }

    public function AjouterCible(string $nom,string  $prenom, string  $date, string $nomC, string  $nationalite){
        try{

            ajoutCible($nom,$prenom,$date,$nomC,$nationalite);

            header("Location: /vue/ListeCible.php");

        }catch (PDOException $e){
            echo $e;
        }

    }

    public function supprimerCible(int $id){
        try{

            deleteCible($id);

            header("Location: /vue/ListeCible.php");

        }catch (PDOException $e){
            echo $e;
        }
    }
    public function modifierCible(int $id, string $nom,string  $prenom, string  $date, string $nomC, string  $nationalite){
        try{

            deleteCible($id);
            ajoutCible($nom,$prenom,$date,$nomC,$nationalite);
            header("Location: /vue/ListeCible.php");

        }catch (PDOException $e){
            echo $e;
        }
    }
}