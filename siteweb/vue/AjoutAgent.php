<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/model.php");
require_once ("../model/specialite.php");
if(array_key_exists('button1', $_POST)) {
    button1();
}

function button1()
{
    if(isset($_POST["Nom"]) and isset($_POST["prenom"])and isset($_POST["date"])and isset($_POST["code"])and isset($_POST["nationalité"])and isset($_POST["nomspecialite"])){
        if(isset($_GET["add"])) {
            $add = $_GET["add"];
            $cbon = 1;
            $spe = array();
            while ($add >0) {
                if (isset($_POST["nomspecialite" . $add])) {
                    if (!empty($_POST["nomspecialite" . $add])) {
                        $spe[] = $_POST["nomspecialite" . $add];

                    }else{
                        $cbon = 0;

                    }
                }
                $add = $add-1;

            }

            if($cbon==1){
                if (!empty($_POST["Nom"]) and !empty($_POST["prenom"]) and !empty($_POST["date"]) and !empty($_POST["code"]) and !empty($_POST["nationalité"]) and !empty($_POST["nomspecialite"])) {
                    require_once("../controlers/controleur.php");
                    $controler = new Controleur();
                    $spe[] = $_POST["nomspecialite"];
                    $controler->AjouterAgentS($_POST["Nom"],$_POST["prenom"],$_POST["date"],$_POST["code"],$_POST["nationalité"],$spe);
                }
                else{
                    header('Location: /test/vue/AjoutAgent.php?error=nom');
                }
            }
        }else{
            if (!empty($_POST["Nom"]) and !empty($_POST["prenom"]) and !empty($_POST["date"]) and !empty($_POST["code"]) and !empty($_POST["nationalité"]) and !empty($_POST["nomspecialite"])) {
                require_once("../controlers/controleur.php");
                $controler = new Controleur();
                $controler->AjouterAgent($_POST["Nom"],$_POST["prenom"],$_POST["date"],$_POST["code"],$_POST["nationalité"],$_POST["nomspecialite"]);
            }
            else{
                header('Location: /test/vue/AjoutAgent.php?error=nom');
            }
        }


    }else{
        header('Location: /test/vue/AjoutAgent.php?error=nom');
    }
}
if(array_key_exists('ajoutSpe', $_POST)) {
    ajoutSpeB();
}
function ajoutSpeB()
{
    $string ="";
    $add = 1;
    if(isset($_GET["add"])) {
       $add =$_GET["add"] + 1;
    }
    if(isset($_POST["Nom"])) {
        if(!empty($_POST["Nom"]))
            $string = $string."&nom=".$_POST["Nom"];
    }
    if(isset($_POST["prenom"])) {
        if(!empty($_POST["prenom"]))
            $string = $string."&prenom=".$_POST["prenom"];
    }
    if(isset($_POST["date"])) {
        if(!empty($_POST["date"]))
            $string = $string."&date=".$_POST["date"];
    }
    if(isset($_POST["code"])) {
        if(!empty($_POST["code"]))
            $string = $string."&code=".$_POST["code"];
    }
    if(isset($_POST["nationalité"])) {
        if(!empty($_POST["nationalité"]))
            $string = $string."&nationalité=".$_POST["nationalité"];
    }

    header('Location: /test/vue/AjoutAgent.php?add='.$add.$string);
}

if(array_key_exists('delSpe', $_POST)) {
    delSpeB();
}
function delSpeB()
{
    $string ="";
    $add = 0;
    if(isset($_GET["add"])) {
        $add =$_GET["add"] -1;
        if(isset($_POST["Nom"])) {
            if(!empty($_POST["Nom"]))
            $string = $string."&nom=".$_POST["Nom"];
        }
        if(isset($_POST["Nom"])) {
            if(!empty($_POST["Nom"]))
                $string = $string."&nom=".$_POST["Nom"];
        }
        if(isset($_POST["prenom"])) {
            if(!empty($_POST["prenom"]))
                $string = $string."&prenom=".$_POST["prenom"];
        }
        if(isset($_POST["date"])) {
            if(!empty($_POST["date"]))
                $string = $string."&date=".$_POST["date"];
        }
        if(isset($_POST["code"])) {
            if(!empty($_POST["code"]))
                $string = $string."&code=".$_POST["code"];
        }
        if(isset($_POST["nationalité"])) {
            if(!empty($_POST["nationalité"]))
                $string = $string."&nationalité=".$_POST["nationalité"];
        }
        header('Location: /test/vue/AjoutAgent.php?add='.$add.$string);
        if($add == 0)
            header('Location: /test/vue/AjoutAgent.php?'.$string);
    }

}
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Liste Agent</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
    <h1>Ajout agent</h1>
    <form method="post" id="spe">';
echo '
        <p> Nom Agent* :
            <input type="text" name="Nom" value="';
if(isset($_GET["nom"])) {
    echo ''.$_GET["nom"].'"></p>';
}else
{
    echo '"></p>';
}
echo '
                <p> Prenom Agent* :
            <input type="text" name="prenom" value="';
if(isset($_GET["prenom"])) {
    echo ''.$_GET["prenom"].'"></p>';
}else
{
    echo '"></p>';
}
echo '
                <p> date de naissance :
            <input type="date" name="date" value="';
if(isset($_GET["date"])) {
    echo ''.$_GET["date"].'"></p>';
}else
{
    echo '"></p>';
}
echo '
                <p> code d\'identification :
            <input type="number" name="code" value="';
if(isset($_GET["code"])) {
    echo ''.$_GET["code"].'"></p>';
}else
{
    echo '"></p>';
}
echo '
                <p> Nationalité :
            <input type="text" name="nationalité" value="';
if(isset($_GET["nationalité"])) {
    echo ''.$_GET["nationalité"].'"></p>';
}else
{
    echo '"></p>';
}
echo '
                <p> nomSpe* :
            <select name="nomspecialite" id="spe-select">
                    <option value="">--Please choose an option--</option>';




    $spe = listSpe();
    foreach ($spe as $e) {
        $spec = new specialite($e["id"], $e["nomSpe"]);

        echo '
            <option value="'.$spec->getId().'">'.$spec->getNomSpe().'</option>
        ';
}
    echo '</select><br><br>';




    if(isset($_GET["add"])) {
        $add = $_GET["add"];
        while($add > 0){
              echo '  <select name="nomspecialite'.$add.'" >
                        <option value="">--Please choose an option--</option>';
              $spe = listSpe();
            foreach ($spe as $e) {
                $spec = new specialite($e["id"], $e["nomSpe"]);

                echo '
                    <option value="'.$spec->getId().'">'.$spec->getNomSpe().'</option>
                ';
            }
            echo '</select>';
            $add = $add-1;
            }
    }




    echo '<br><br><input type="submit" name="ajoutSpe"
               class="button" value="Ajouter spécialité" />';
    if(isset($_GET["add"])) {
        echo '
             <input type="submit" name="delSpe"
            class="button" value="Enlever spécialité" />
            ';
    }
    if (isset($_GET['error'])){
        if(!empty($_GET['error'])){
            echo '<p id="error">Veuillez remplir les champs requis ! :(</p></br></br>';
        }
    }




echo '

    
        <input type="submit" name="button1"
               class="button" value="Ajouter" />
    
    </form>
    
    </body>
    
    </html>'
?>

