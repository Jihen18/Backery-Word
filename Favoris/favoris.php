

<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Accueil/Css/styleAccueil.css" />
    <link rel="stylesheet" href="Css/styleFavoris.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-6.4.0-web/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>
    <div id="overlay"></div>

    <div id="compte" class="div-compte">
      <span class="first-span">Besoin d'aide ? </span>
      <span class="second-span"> Appeler 72313478</span>
     
    <?php
// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['email'])) {
    echo '<a class="deconnexion" href="../Deconnexion/deconnexion.php"
    ><span>Deconnexion</span></a
  >
  </div>';
} else {
 echo ' <a class="inscription" href="../Inscription/inscription.php"
  ><span>Inscription</span></a
>
<a class="connexion" href="../Connexion/connexion.php"
  ><span>Connexion</span></a
>
</div>';
}
?>
    <nav>
      <div class="logo">
        <p>Bakery World</p>
      </div>
      <ul>
        <li><a href="../Accueil/Accueil.php">Accueil </a></li>
        <li>
          <a href="" class="service">Catégories</a>
          <ul>
            <li><a href="../Categorie/macarons.php">Macarons</a></li>
            <li><a href="../Categorie/cupcakes.php">Cupcakes</a></li>
            <li><a href="../Categorie/croissant.php">Croissants</a></li>
            <li><a href="../Categorie/chocolat.php">Chocolats</a></li>
          </ul>
        </li>
        <li><a href="../A propos/propos.php">A propos</a></li>
        <li>
          <a href="../Favoris/favoris.php"><i class="fas fa-heart"></i></a>
        </li>
        <li class="cart">
          <a href="../Panier/panier.php"
            ><i class="fas fa-shopping-cart"></i>
          </a>
        </li>
      </ul>
    </nav>
    <div class="conten-general">
      <div class="titre-favoris">
        <h4>Ma liste de souhait</h4>


        <?php



error_reporting(E_ERROR | E_PARSE);

$host = 'localhost';
$dbname = 'patisserie';
$username = 'root';
$password = '';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


$adresseClient = $_SESSION['email'];

$query = "SELECT a.nomArt, a.designArt, a.imgArt, a.prixArt, f.code_article
          FROM favoris f
          INNER JOIN article a ON a.idArt = f.code_article
          WHERE f.adresse_client = :adresseClient";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':adresseClient', $adresseClient);
$stmt->execute();

$rowCount = $stmt->rowCount(); // Nombre de lignes renvoyées par la requête

echo '<span class="nb-article"> <span class="entier">' . $rowCount . '</span> articles</span>';
?>
      </div>


<?php


error_reporting(E_ERROR | E_PARSE);

$host = 'localhost';
$dbname = 'patisserie';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $adresseClient = $_SESSION['email'];

    $query = "SELECT a.nomArt, a.designArt, a.imgArt, a.prixArt,f.code_article
              FROM favoris f
              INNER JOIN article a ON a.idArt = f.code_article
              WHERE f.adresse_client = :adresseClient";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':adresseClient', $adresseClient);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total=0;
    // Parcourir les articles et les afficher
    foreach ($articles as $article) {



  echo'   
  
  
  <div class="article-favoris">
        <img class="favoris-img" src="../Categorie/'.$article["imgArt"].'" alt="" />
        <div class="descrip-favoris">
          <h3>'.$article["nomArt"].'</h3>
          <span class="titre-descrip">Poids net :</span>
          <span> 500g</span>
          <br />
          <span class="titre-descrip"> Poids brut: </span>
          <span>670g</span>
        </div>

        <div class="operation-possibles">



        <form action="suppression_article_favoris.php" method="POST">
                
        <button class="suppression" type="submit" name="suppressionFav" value="'.$article['code_article'].'  " > Supprimer</button>

          </form>
        </div>
        <p class="prix">'.$article["prixArt"].'</p>
      </div>';
    }}

    catch (PDOException $e) {
      echo 'Erreur de connexion : ' . $e->getMessage();
  }
?>

     
    </div>

    <div class="vider-continuer">
      <button class="btn-vider-retour btn1">
        <a href="../Categorie/macarons.php" class="">Continuer mes achats</a>
      </button>
<form action="vider_favoris.php" method="POST"> <button name="viderFav" class="btn-vider-retour btn2 viderF" id="vider-liste">
      <p class="viderBtn">  Vider la liste de souhaits </p>
      </button></form>
     
    </div>

    <footer>
      <div class="div-general-info">
        <div class="position">
          <i class="info-icon fas fa-map-marker-alt"></i>
          <div class="descrip-info">
            <h3>Nos Adresses</h3>
            <p>Centre Urbain Nord</p>
          </div>
        </div>
        <div class="contact">
          <i class="info-icon fa-solid fa-phone"></i>
          <div class="descrip-info">
            <h3>Contacter nous</h3>
            <p>+216 72313478</p>
          </div>
        </div>
        <div class="email">
          <i class="info-icon fa-solid fa-envelope"></i>
          <div class="descrip-info">
            <h3>Email</h3>
            <a href="mailto:Bakery-world@gmail.com">Bakery-world@gmail.com</a>
          </div>
        </div>
      </div>
      <hr class="separateur-hr" />
      <div class="div-info">
        <div class="info">
          <h4>Bakery World</h4>
          <hr />
          <p>
            Backery World est une pâtisserie passionnée par l'art de la
            pâtisserie. Nous sommes fiers de créer des produits de qualité
            supérieure, avec les meilleurs ingrédients pour garantir une
            expérience de dégustation inoubliable. Chez Backery World, nous
            proposons une large sélection de pâtisseries allant des classiques
            traditionnels aux créations les plus innovantes. Nous sommes
            déterminés à satisfaire les papilles de nos clients en offrant un
            large choix de produits frais et savoureux
          </p>
        </div>
        <div class="info liens">
          <h4>Liens utiles</h4>
          <hr />
          <ul>
            <li>
              <a href="../Mentions/mentions.php">Mentions légales </a>
            </li>

            <li><a href="../A propos/propos.php">A propos de nous</a></li>
            <li>
              <a href="../Commentaire/commentaire.php"
                >Exprimer votre Feedback</a
              >
            </li>
          </ul>
        </div>

        <div class="reseaux-soc info">
          <h4>Suivez nous</h4>
          <hr />
          <a
            href="https://www.facebook.com/groups/292204118759292/"
            target="_blank"
            ><i class="fa-brands fa-facebook sm faceb"></i
          ></a>
          <a href="https://www.instagram.com/world.of.bakery/" target="_blank"
            ><i class="fab fa-instagram sm insta"></i
          ></a>
          <a href=""><i class="fab fa-twitter sm twi"></i></a>
          <a href=""><i class="fab fa-pinterest sm pin"></i></a>
        </div>
      </div>

      <div class="copyrights">
        <p>Copyright © 2023 Backery World</p>
      </div>
    </footer>

  
  </body>
</html>