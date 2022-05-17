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
        <br>

 
        

    
        <?php
$id = "lou";
$mdp = 'lou';
$pdo = new PDO("mysql:host=localhost;dbname=docthorible", $id, $mdp);




$requette = $pdo->query("SELECT * FROM consultation WHERE disponible='1' ORDER BY date");


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
<a href="admin.php"><input type="button" value="Acceuil" /></a>
    <a href="deconnexion.php"><input type="button" value="Se déconnecter" /></a>
    </form>
        </body>
    </html>