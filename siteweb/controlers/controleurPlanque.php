<?php
require_once ("../model/modelPlanque.php");
class controleurPlanque
{

    public function __construct()
    {

    }

    public function AjouterPlanque(string $nom,string  $prenom, string  $date){
        try{

            ajoutPlanque($nom,$prenom,$date);

            header("Location: /vue/ListePlanque.php");

        }catch (PDOException $e){
            echo $e;
        }

    }

    public function supprimerPlanque(int $id){
        try{

            deletePlanque($id);

            header("Location: /vue/ListePlanque.php");

        }catch (PDOException $e){
            echo $e;
        }
    }
    public function modifierPlanque(int $id, string $nom,string  $prenom, string  $date){
        try{

            deletePlanque($id);
            ajoutPlanque($nom,$prenom,$date);
            header("Location: /vue/ListePlanque.php");

        }catch (PDOException $e){
            echo $e;
        }
    }
}