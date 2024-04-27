<?php
session_start();
$utilisateur = $_SESSION['email'];
// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patisserie";

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Suppression du contenu de la table "panier" pour l'utilisateur actuel
 

        $sql = "DELETE FROM panier WHERE adresse_client = '$utilisateur'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

   

    // Fermeture de la connexion à la base de données
    $conn = null;
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
}

// Rediriger vers une autre page après la déconnexion
header("Location: ../Accueil/accueil.php");
exit();
?>
