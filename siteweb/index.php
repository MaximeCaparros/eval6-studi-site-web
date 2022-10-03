<?PHP

try{
require_once('model/connexion.php');
}catch(PDOException $e){
    echo "aie erreur :". $e->getmessage;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  

    </body>
</html>