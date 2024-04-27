<?php


    session_start();
    
    ?>



<?php


$host = 'localhost';
$dbname = 'patisserie';
$username = 'root';
$password = '';

try {

  error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);
    // Création de l'instance PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configurer le mode d'erreur PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Autres configurations souhaitées
    // ...

    // Utiliser $pdo pour interagir avec la base de données
    // ...

} catch (PDOException $e) {
    // Gérer les erreurs de connexion
    echo 'Erreur de connexion : ' . $e->getMessage();
}

$adresseClient = $_SESSION['email'];
$codeArt = $_POST['suppression'];
echo $codeArt;
echo $adresseClient;

$query = "DELETE FROM panier WHERE adresse_client = :adresseClient AND code_article = :codeArticle";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':adresseClient', $adresseClient);
$stmt->bindParam(':codeArticle', $codeArt);
$stmt->execute();

header("Location: panier.php");

?>




