<?php
session_start();
if(isset($_POST['username']) and isset($_POST['password'])){
    if (!empty($_POST['username'])and !empty($_POST['password'])){
        require_once ("../model/model.php");
            if(connexion($_POST['username'],$_POST['password'])){

                $_SESSION['username'] = $_POST['username'];
                header('Location: /index.php');


            }else{
                header("Location: /vue/connexion.php?erreur=1");
            }

    }else{
        header("Location: /vue/connexion.php?erreur=1");
    }
}else{
    header("Location: /vue/connexion.php?erreur=1");
}
