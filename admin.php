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
        <a href="http://localhost/projet2-php-db/index.php"><input type="button" value="Ajout Utilisateur" /></a>
        <a href="http://localhost/projet2-php-db/listes.php"><input type="button" value="Liste des utilisateurs" /></a>

        <br><br>
    <?php
    // Ici, on va faire une vérif si li'utilisateur est admin alors il va avoir accès à la suite.
    $username = 'lou';
    $password = 'lou';

    $pdo = new PDO("mysql:host=localhost;dbname=livre_projet_2", $username, $password);

    $sql_verif_admin="SELECT admin FROM adherents WHERE nom_client= ?";

    $req = $pdo->prepare($sql_verif_admin);

    $req->execute (array($matricule));

    $row = $req->fetchAll(PDO::FETCH_OBJ);





    ?>

        <input type="text" name="idClient" placeholder="Adhérent" value=""/>
        <input type="submit" value="Search" />
        </form>
        <li>
    <form  method="POST" action="modif_livre.php">
    <input type="text" name="idLivre" placeholder="Livre" value=""/>
        <input type="submit" value="Search" />
    </form>
        </li>
    </li>
    </form>
    <form  method="POST" action="db_liste_compte.php">
        <center><ul><li>
            <input type="submit" value="Liste des demandes de suppression" />
            <a href="http://localhost/projet2-php-db/ajoutLivre.php"><input type="button" value="Ajouter un Livre" /></a>

    </ul></li></center>
        </form>
        <form  method="POST" action="db_demande_livre.php">
        <center><ul><li>
            <input type="submit" value="Demande de livre" />
    </ul></li></center>
        </form>
        
        <?php




        ?>
        

    <?php
    }
    ?>

    <br><a href="deconnexion.php">Se déconnecter</a>
        </body>
    </html>