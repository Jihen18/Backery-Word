<?php


session_start();

$email = $_SESSION['email'];
$articleNom = $_POST['codeArt'];
echo $articleNom;
echo $email;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patisserie";

// Connexion à la base de données avec PDO
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Configuration des options PDO pour afficher les exceptions en cas d'erreur
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$existingArticleQuery = "SELECT COUNT(*) as count FROM favoris WHERE code_article = :articleNom AND adresse_client = :email";
$stmt = $pdo->prepare($existingArticleQuery);

// Attribution des valeurs des paramètres
$stmt->bindParam(':articleNom', $articleNom);
$stmt->bindParam(':email', $email);

// Exécution de la requête
$stmt->execute();

// Récupération des résultats
$existingArticle = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérification des résultats
if ($existingArticle['count'] > 0) {
    // L'article existe déjà dans la table favoris, donc nous le supprimons
    $deleteQuery = "DELETE FROM favoris WHERE code_article = :articleNom AND adresse_client = :email";
    $stmt = $pdo->prepare($deleteQuery);
    $stmt->bindParam(':articleNom', $articleNom);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "L'article a été supprimé des favoris.";
} else {
    // L'article n'existe pas dans la table favoris, nous l'ajoutons
    $insertQuery = "INSERT INTO favoris (code_article, adresse_client) VALUES (:articleNom, :email)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(':articleNom', $articleNom);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "L'article a été ajouté aux favoris.";
}

header("Location: articleDetail.php?nom=" . urlencode($articleNom));

?>






  


