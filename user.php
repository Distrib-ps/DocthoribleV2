<?php
session_start();
if ($_SESSION['autoriser']!="oui") {
    header("location:index.php");
}
else {
    $bienvenue = "Bienvenue ".$_SESSION['num_carte']." <br>";
    $num_carte = $_SESSION['num_carte'];
    
?>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css"></head>
    <body>
    <form class="form-style-9"  method="POST" action="db_user.php">
    <ul>
    <li>
        <?= $bienvenue ?>

<h2> Vos informations:</h2>



<tr>
<td> Numéro de carte | </td>
   <td> Nom | </td>
   <td> Prenom | </td>
   <td> Date de naissance | </td>
   <td> Dose de Vaccin | </td>
   <td> Matricule du médecin référent | </td>
    </tr>


<?php
$username = 'lou';
$password = 'lou';




$pdo = new PDO("mysql:host=localhost;dbname=docthorible",$username, $password,);



//Requête recherche utilisateur par code
$sql_recherche_client_by_code="SELECT * from `patient` where num_carte='$num_carte';";

//Attribution de la requête 1 dans PDO
$recherche_client_by_code = $pdo->query($sql_recherche_client_by_code);

$result = $recherche_client_by_code->fetchAll(PDO::FETCH_OBJ);

$count=$recherche_client_by_code->rowCount();

for ($n =0; $n < $count ; $n++) {
    ?> <br>
    <tr>
	<td> <?php echo $result[$n]->num_carte; ?> </td>
   <td> <?php echo $result[$n]->nom; ?> </td>
   <td> <?php echo $result[$n]->prenom; ?> </td>
   <td> <?php echo $result[$n]->birthdate; ?> </td>
   <td> <?php echo $result[$n]->vaccin; ?> </td>
   <td> <?php echo $result[$n]->matricule_medecin; ?> </td>
    </tr>
    <?php
}

?>






        <br>   <br>

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