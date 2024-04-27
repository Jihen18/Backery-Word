
<img src="images/bg1.jpg" alt="">
<img src="images/bg1.jpg" alt="">

<img src="images/bg1.jpg" alt="">

<img src="images/bg1.jpg" alt="">



<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <button type="submit" name="bouton1">Afficher commentaire 1</button>
  <button type="submit" name="bouton2">Afficher commentaire 2</button>
  <button type="submit" name="bouton3">Afficher commentaire 3</button>
</form>



<?php



$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "patisserie"; 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$requete = "SELECT * FROM commentaire ORDER BY id";
$resultat = $conn->query($requete);

// Étape 2 : Récupérer chaque ligne de commentaire
$commentaires = $resultat->fetchAll(PDO::FETCH_ASSOC);

// Étape 3 : Initialiser la variable $commentaireAffiche avec la première ligne de commentaire
$commentaireAffiche = $commentaires[0];
echo $commentaireAffiche;
// Étape 4 : Vérifier quel bouton est sélectionné et mettre à jour $commentaireAffiche
if (isset($_POST['bouton1'])) {
    echo 'ffff';
    $commentaireAffiche = $commentaires[0];
} elseif (isset($_POST['bouton2'])) {
    $commentaireAffiche = $commentaires[1];
} elseif (isset($_POST['bouton3'])) {
    $commentaireAffiche = $commentaires[2];
}

// Étape 5 : Afficher le commentaire sélectionné
echo "<p>" . $commentaireAffiche['commentaire'] . "</p>";


?>