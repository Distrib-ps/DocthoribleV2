<?php
session_start();
if ($_SESSION['autoriser']!="oui") {
    header("location:index.php");
}
else {
    $bienvenue = "Bienvenue ".$_SESSION['matricule']." <br>";
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<form class="form-style-9" method="post" action="db_modif.php">
<ul>
<li>
    <a href="http://localhost/docthorible/admin.php"><input type="button" value="Panel médecin !" /></a>
</li>
<?php
$id = "lou";
$mdp = 'lou';
$pdo = new PDO("mysql:host=localhost;dbname=docthorible", $id, $mdp);
$idC = $_POST['nom'] ?? "";

$query = $pdo->prepare("SELECT * FROM patient WHERE num_carte=:idC OR nom=:idC");
$query->bindValue(':idC', $idC, PDO::PARAM_STR);
$query->execute();

$row = $query->fetchAll(PDO::FETCH_OBJ);

$count = $query->rowCount();

if(empty($count)) {
    echo 'Vide - Erreur';
}
else{
for($n = 0; $n < $count; $n++) {
?>

    <tr>
    <td><?php echo 'Numéro de carte : '?></td>
    <td><b><?php echo $row[$n]->num_carte ?></b></td>
    <td><?php echo '<br>Nom : '?></td>
    <td><b><?php echo $row[$n]->nom ?></b></td>
    <td><?php echo '<br>Prenom : '?></td>
    <td><b><?php echo $row[$n]->prenom ?></b></td>
    <td><?php echo '<br>Date de naissance : '?></td>
    <td><b><?php echo $row[$n]->birthdate ?></b></td>
    <td><?php echo '<br>Vaccin : '?></td>
    <td><b><?php echo $row[$n]->vaccin ?></b></td>
    <td><?php echo '<br>Matricule du Médecin : '?></td>
    <td><b><?php echo $row[$n]->matricule_medecin ?></b></td>


    
</tr>
<?php $num_carte = $row[$n]->num_carte ?>
<?php $vaccin = $row[$n]->vaccin;?>

<?php

$requette = $pdo->query("SELECT * FROM medicament ORDER BY nom");

?>

<ul>
<li>
    <br>
<input type="hidden" name="idd" value="<?= $num_carte ?>" />
<input type="checkbox" name="vaccin[]" class="field-style" placeholder="vaccin" value="<?= $vaccin ?>"> Vaccin </input>
<select name="liste">
<?php while($res = $requette->fetch()){
        ?>
        <option value="<?php echo $res['nom'];?>"><?php echo $res['nom'];?></option>
<?php
        }
    ?>
</select>
<br>
<input type="submit" name="Submit" value="1" />
</li>
</ul>
</form>
<?php
			}
        }
			?>
</body>
</html>
<?php 
 //   }
//    catch (Exception $e) {
//        echo 'erreur' . $e->getMessage();
 //   }
//}
}
?>