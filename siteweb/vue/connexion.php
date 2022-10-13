<?php
include('header.inc.php');

?>

<body>
<div id="container">
    <!-- zone de connexion -->

    <form action="/test/vue/verification.php" method="POST">
        <h1>Connexion</h1>

        <label><b>Nom d'utilisateur</b></label>
        <input type="email" placeholder="Entrer le mail" name="username" value="admin@admin.fr" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" value="admin" required>

        <input type="submit" id='submit' value='LOGIN' >
        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p id='error'>Utilisateur ou mot de passe incorrect</p>";
        }
        ?>
    </form>
</div>
</body>
</html>