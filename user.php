<?php
session_start();
if ($_SESSION['autoriser']!="oui") {
    header("location:index.php");
}
else {
    $bienvenue = "Bienvenue ".$_SESSION['prenom']." <br>";
    $prenom = $_SESSION['prenom'];
    echo $prenom;
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
        <br>

        <a href="reservation.php"><input type="button" value="Réserver un rendez-vous" /></a>
        

        <br><br>
    

       


     
      

    <?php
    }
    ?>

    <br>
    
    <a href="deconnexion.php"><input type="button" value="Se déconnecter" /></a>
    </form>
        </body>
    </html>