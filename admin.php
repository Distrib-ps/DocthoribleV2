<?php
session_start();
if ($_SESSION['autoriser']!="oui") {
    header("location:index.php");
}
else {
    $bienvenue = "Bienvenue ".$_SESSION['matricule']." <br>";
    $matricule = $_SESSION['matricule'];
?>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css"></head>
    <body>
    <form class="form-style-9"  method="POST" action="modif.php">
    <ul>
    <li>
        <?= $bienvenue ?>
        <a href="http://localhost/docthorible/index.php"><input type="button" value="Ajout Patient" /></a>
        <a href="http://localhost/docthorible/liste_patients.php"><input type="button" value="Liste des patients" /></a>

        <br><br>


        <input type="text" name="nom" placeholder="Patient" value=""/>
        <input type="submit" value="Search" />
        </form>

    </li>
    </form>

    <?php
    }
    ?>

    <br><a href="deconnexion.php">Se déconnecter</a>
        </body>
    </html>
