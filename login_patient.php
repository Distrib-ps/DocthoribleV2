<?php
session_start();
$erreur = "";

if (isset($_POST["connexion"])){
    $birthdate = $_POST["birthdate"];
    $num_carte = htmlspecialchars($_POST["num_carte"]);
    $utilExiste = false;
    $pass = "lou";
    $user = "lou";
    //connexion à la bdd grâce à pdo
    $pdo = new PDO("mysql:host=localhost;dbname=docthorible", $user, $pass);

    $sql = $pdo->prepare("SELECT * FROM patient WHERE num_carte = ?");
    $sql->execute(array($num_carte));
    $utilExiste = $sql->fetchAll(PDO::FETCH_OBJ);

    $nb_result=count($utilExiste);

    if ($utilExiste) {
        $mdp_bdd = $utilExiste[0]->birthdate;
        if ($birthdate == $mdp_bdd)
        {
            $_SESSION['num_carte'] = $num_carte;
            $_SESSION['autoriser'] = 'oui';
            header('location:admin.php');
            $erreur = 'Connexion réussie';
        }
        else $erreur = 'Mot de passe incorrect.';
    }
    else $erreur = "Ce numéro de carte n'est pas inscrit dans la base";
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<form class="form-style-9" method="post" action="">
<ul>
    <center> <p style = "color: #723030;"> Connection Patient </p> </center>
<li>
    <input type="text" name="num_carte" class="field-style field-split align-left" placeholder="Numéro de carte" required/>
    <input type="password" name="birthdate" class="field-style field-split align-right" placeholder="birthdate" required/>


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

