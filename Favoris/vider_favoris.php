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
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   

} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

$adresseClient = $_SESSION['email'];


$query = "DELETE FROM favoris WHERE adresse_client = :adresseClient";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':adresseClient', $adresseClient);
$stmt->execute();

header("Location: favoris.php");
?>




