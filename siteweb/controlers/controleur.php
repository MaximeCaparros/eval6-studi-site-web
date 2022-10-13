<?php

require_once ('../model/model.php');
class Controleur
{

    public function __construct()
    {
    }

    public function listeAgent()
    {
       $agents = array();
       try{

           header("Location: /vue/ListeAgent.php");
       }catch (PDOException $e){
           echo $e;
       }



    }

    public function AjouterAgent(string $nom, string $prenom, string $dateN, int $codeId, string $nationalite,int $idSpecialite)
    {

        try{
            ajoutAgent($idSpecialite,$nom,$prenom,$dateN,$codeId,$nationalite);
            header("Location: /vue/ListeAgent.php");
        }catch (PDOException $e){
            echo $e;
        }



    }
    public function AjouterAgentS(string $nom, string $prenom, string $dateN, int $codeId, string $nationalite,array $idSpecialite)
    {

        try{
            foreach ($idSpecialite as $s){
                ajoutAgent($s,$nom,$prenom,$dateN,$codeId,$nationalite);
            }

            header("Location: /vue/ListeAgent.php");
        }catch (PDOException $e){
            echo $e;
        }



    }
    public function supprimerAgent(int $id)
    {

        try{
            deletAgent($id);
            header("Location: /vue/listeAgent.php");

        }catch (PDOException $e){
            echo $e;
        }



    }
    public function AjouterSpecialite(string $nomspe)
    {
        try{
            ajoutSpe($nomspe);
            header("Location: /vue/listeSpe.php");
        }catch (PDOException $e){
            echo $e;
        }



    }
    public function listeSpecialite()
    {

        try{

            header("Location: /vue/listeSpe.php");

        }catch (PDOException $e){
            echo $e;
        }



    }
    public function supprimerSpecialite(int $id)
    {

        try{
            deleteSpe($id);
            header("Location: /vue/listeSpe.php");

        }catch (PDOException $e){
            echo $e;
        }



    }
    public function modifierSpecialite(int $id,string $nomspe)
    {

        try{
            deleteSpe($id);
            ajoutSpeID($id,$nomspe);
            header("Location: /vue/listeSpe.php");

        }catch (PDOException $e){
            echo $e;
        }



    }

    public function modifierAgent(int $id,string $nom, string $prenom, string $dateN, int $codeId, string $nationalite,int $idSpecialite)
    {

        try{
            deletAgent($id);
            ajoutAgent($idSpecialite,$nom,$prenom,$dateN,$codeId,$nationalite);

            header("Location: /vue/ListeAgent.php");

        }catch (PDOException $e){
            echo $e;
        }



    }
    public function modifierAgentS(int $id,string $nom, string $prenom, string $dateN, int $codeId, string $nationalite,array $idSpecialite)
    {

        try{
            deletAgent($id);
            foreach ($idSpecialite as $s){
                ajoutAgent($s,$nom,$prenom,$dateN,$codeId,$nationalite);
            }
            header("Location: /vue/ListeAgent.php");

        }catch (PDOException $e){
            echo $e;
        }



    }



}
