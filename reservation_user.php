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
    <form class="form-style-9"  method="POST" action="modif.php">
    <ul>
    <li>
        <?= $bienvenue ?>
        <br>

 
        

    
        <?php
$id = "lou";
$mdp = 'lou';
$pdo = new PDO("mysql:host=localhost;dbname=docthorible", $id, $mdp);



// Jointure  avec la table patient à faire pour récupérer l'id de consultation  
$requette = $pdo->query("SELECT * FROM consultation INNER JOIN patient ON consultation.id_client = patient.num_carte WHERE patient.id_client='$num_carte'");


?>

<h2> Liste de vos rendez-vous: </h2>

<ul>
<li>
    
<input type="hidden" name="idd" value="<?= $id ?>" />
<select name="liste">
<?php while($res = $requette->fetch()){
        ?>
        <option value="test">
        <?php echo $res['type'];?> 
        <?php echo $res['date'];?> 
        <?php echo $res['heure'];?>
        </option>
      
<?php
            
        
    }
    ?>


     
      

    <?php
    }
    ?>

    
</select> 

<br> <br>
<a href="user.php"><input type="button" value="Acceuil" /></a>
    <a href="deconnexion.php"><input type="button" value="Se déconnecter" /></a>
    </form>
        </body>
    </html>