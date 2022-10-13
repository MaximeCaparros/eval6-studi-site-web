<?php
require_once ("../model/modelMission.php");
class controleurMission
{

    public function __construct()
    {

    }

    public function AjouterMission(string $titre, string $descr, string $nomC, string $pays, string $typeMission, string $statut
        , string $dateDebut, string $dateFin, int $specialite, int $idAgent,int $idCible, int $idContact, int $idPlanque){
        try{

            ajoutMission($titre,$descr,$nomC,$pays,$typeMission,$statut,$dateDebut,$dateFin,$specialite,$idAgent,
                $idCible,$idContact,$idPlanque);

            header("Location: /vue/index.php");

        }catch (PDOException $e){
            echo $e;
        }

    }

    public function supprimerMission(int $id){
        try{

            deleteMission($id);

            header("Location: /vue/index.php");

        }catch (PDOException $e){
            echo $e;
        }
    }
    public function modifierMission(int $id, string $titre, string $descr, string $nomC, string $pays, string $typeMission, string $statut
        , string $dateDebut, string $dateFin, int $specialite, int $idAgent,int $idCible, int $idContact, int $idPlanque){
        try{

            deleteMission($id);
            ajoutMission($titre,$descr,$nomC,$pays,$typeMission,$statut,$dateDebut,$dateFin,$specialite,$idAgent,
                $idCible,$idContact,$idPlanque);
            header("Location: /vue/index.php");

        }catch (PDOException $e){
            echo $e;
        }
    }
}