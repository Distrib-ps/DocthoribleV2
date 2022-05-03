<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
<form class="form-style-9" method="post" action="db_inscription.php">
<ul>
<li>
    <input type="text" name="nom" class="field-style field-split align-left" placeholder="Nom" required/>
    <input type="text" name="prenom" class="field-style field-split align-right" placeholder="Prenom" required/>
    

</li>
<li>
    <input type="text" name="birthdate" class="field-style field-split align-left" placeholder="Date de naissance" required/>
    <input type="texte" name="num_carte" class="field-style field-split align-right" placeholder="Numéro de carte" required/>
   
</li>
<li>
<input type="text" name="matricule_medecin" class="field-style" placeholder="Matricule medecin" required></input>
<input type="text" name="vaccin" class="field-style field-split align-right" placeholder="Vaccin" required/>
</li>

<li>
<input type="submit" value="Inscriptions !" />
<a href="http://localhost/projet2-php-db/login.php"><input type="button" value="Login !" /></a>
</li>
</ul>
</form>
</body>
</html>