<?php
include('header.inc.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once ("../model/model.php");
require_once ("../model/specialite.php");




if(array_key_exists('modifier', $_POST)) {
    modifierB();
}
function modifierB()
{
    if(isset($_GET["id"]) and isset($_POST["nom"]) and isset($_POST["prenom"])and isset($_POST["date"])and isset($_POST["code"])and isset($_POST["nationalité"])and isset($_POST["nomspecialite"])){
        if(isset($_GET["add"])) {
            $add = $_GET["add"];
            $cbon = 1;
            $spe = array();
            while ($add > 0) {
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
                if (!empty($_GET["id"]) and !empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["date"]) and !empty($_POST["code"]) and !empty($_POST["nationalité"]) and !empty($_POST["nomspecialite"])) {
                    require_once("../controlers/controleur.php");
                    $controler = new Controleur();
                    $spe[] = $_POST["nomspecialite"];
                    $controler->modifierAgentS($_GET["id"],$_POST["nom"],$_POST["prenom"],$_POST["date"],$_POST["code"],$_POST["nationalité"],$spe);
                }
                else{
                    header('Location: /test/vue/AjoutAgent.php?error=nom');
                }
            }
        }else{
            if (!empty($_GET["id"]) and !empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["date"]) and !empty($_POST["code"]) and !empty($_POST["nationalité"]) and !empty($_POST["nomspecialite"])) {
                require_once("../controlers/controleur.php");
                $controler = new Controleur();
                $controler->modifierAgent($_GET["id"],$_POST["nom"],$_POST["prenom"],$_POST["date"],$_POST["code"],$_POST["nationalité"],$_POST["nomspecialite"]);
            }
            else{
                if (isset($_GET["id"]))
                    header('Location: /test/vue/AjoutAgent.php?error=nom&id='.$_GET["id"]);
                else
                    header('Location: /test/vue/ListeAgent.php');
            }
        }


    }else{
        if (isset($_GET["id"]))
            header('Location: /test/vue/AjoutAgent.php?error=nom&id='.$_GET["id"]);
        else
            header('Location: /test/vue/ListeAgent.php');
    }
}
if(array_key_exists('annuler', $_POST)) {
    annuler();
}

function annuler() {
    header("Location: ListeAgent.php");

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

    header('Location: /test/vue/modifierAgent.php?id='.$_GET["id"].'&add='.$add.$string);
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
        header('Location: /test/vue/modifierAgent.php?id='.$_GET["id"].'&add='.$add.$string);
        if($add == 0)
            header('Location: /test/vue/modifierAgent.php?id='.$_GET["id"].'&'.$string);
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


if (isset($_GET["id"])) {
    $var=getAgent($_GET["id"]);
    require_once ("../model/agent.php");

    echo ' <p> nom : <input type="text"  name="nom" value="'.$var->getNom().'"></p>';

    echo '
                <p> Prenom Agent* :
            <input type="text" name="prenom"  value="'.$var->getPrenom().'"></p>';

    echo '
                <p> date de naissance :
            <input type="date" name="date"  value="'.$var->getDateN().'"></p>';

    echo '
                <p> code d\'identification :
            <input type="number" name="code"  value="'.$var->getCodeId().'"></p>';

    echo '
                <p> Nationalité :
            <input type="text" name="nationalité"  value="'.$var->getNationalite().'"></p>';




    echo '
                    <p> nomSpe* :';






    $add=0;

    foreach ($var->getIdSpecialite() as $e) {

        $spe = getSpe($e);
        $spec = new specialite($spe[0],$spe[1]);
        echo '
                <select name="nomspecialite".$add. id="spe-select">
                <option value="'.$spec->getId().'">'.$spec->getNomSpe().'</option>
                </select><br><br>
            ';
        $add =+ 1;
    }
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


}

echo '

    
        <input type="submit" name="modifier"
               class="button" value="modifier" />
                <input type="submit" name="annuler"
               class="button" value="annuler" />
    
    </form>
    
    </body>
    
    </html>'
?>

