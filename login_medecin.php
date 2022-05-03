<?php
session_start();
$erreur = "";

if (isset($_POST["connexion"])){
    $mdp = $_POST["mdp"];
    $matricule = htmlspecialchars($_POST["matricule"]);
    $utilExiste = false;
    $pass = "lou";
    $user = "lou";
    //connexion à la bdd grâce à pdo
    $pdo = new PDO("mysql:host=localhost;dbname=docthorible", $user, $pass);

    $sql = $pdo->prepare("SELECT * FROM medecin WHERE matricule = ?");
    $sql->execute(array($matricule));
    $utilExiste = $sql->fetchAll(PDO::FETCH_OBJ);

    $nb_result=count($utilExiste);

    if ($utilExiste) {
        $mdp_bdd = $utilExiste[0]->mdp;
        if ($mdp == $mdp_bdd)
        {
            $_SESSION['matricule'] = $matricule;
            $_SESSION['autoriser'] = 'oui';
            header('location:admin.php');
            $erreur = 'Connexion réussie';
        }
        else $erreur = 'Mot de passe incorrect.';
    }
    else $erreur = "Ce matricule n'est pas inscrit dans la base";
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<form class="form-style-9" method="post" action="">
<ul>
    <center> <p style = "color: #723030;"> Connection Medecin </p> </center>
<li>
    <input type="text" name="matricule" class="field-style field-split align-left" placeholder="Matricule" required/>
    <input type="password" name="mdp" class="field-style field-split align-right" placeholder="mdp" required/>


</li>
<li>
<input type="submit" name="connexion" value="Login !" />
</li>
</ul>
</form>
<a href="index.php">S'inscrire</a>
<?php echo $erreur ?>
</body>
</html>

