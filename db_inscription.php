<html>
    <head>
        <title>Formulaire DB</title>
        <meta charset="utf-8">
        <link rel="stylesheet">
    </head>
    <body>
        <center><h1> Formulaire DB</h1></center>
<?php
$username = 'lou';
$password = 'lou';

$num_carte = $_POST["num_carte"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$birthdate = $_POST["birthdate"];
$vaccin = $_POST["vaccin"];
$matricule_medecin = $_POST["matricule_medecin"];

$pdo = new PDO("mysql:host=localhost;dbname=docthorible", $username, $password);

//Requête creation utilisateur
$sql_creation_patient="INSERT INTO `patient` (`num_carte`, `nom`, `prenom`, `birthdate`, `vaccin`, `matricule_medecin`) VALUES ('$num_carte', '$nom', '$prenom', '$birthdate', '$vaccin', '$matricule_medecin');";

//Attribution de la requête dans un PDO
$creation_patient = $pdo->query($sql_creation_patient);

$resulat = $creation_patient->fetchAll(PDO::FETCH_OBJ); 


header("location:login.php");
  
?>
</body>

