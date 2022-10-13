<?php
session_start();
try{
    require_once('../model/connexion.php');
}catch(PDOException $e){
    echo "aie erreur :". $e;
}
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<div id="wrap">
    <ul class="navbar">
        <li>
            <a href="/index.php">Mission</a>
        </li>
        <?php
        if (isset($_SESSION['username'])) {
            echo ' 
        <li>
            <a href="/vue/ListeSpe.php">Spécialité</a>

        </li>

        <li>
            <a href="/vue/ListeAgent.php">Agent</a>

        </li>
        <li>
            <a href="/vue/ListeContact.php">Contact</a>

        </li>
        <li>
            <a href="/vue/ListeCible.php">Cible</a>

        </li>
        <li>
            <a href="/vue/ListePlanque.php">Planque</a>

        </li>
        
        
           <li>
            <a href="/vue/deconnexion.php">Deconnexion</a>

        </li>';
        }else {
            echo '
            <li>
            <a href="/vue/connexion.php">Connexion</a>

        </li>';
        }

        ?>


    </ul>
</div>
</br></br></br></br>