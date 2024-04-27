
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-6.4.0-web/css/all.min.css"
    />
    <link rel="stylesheet" href="Css/stylePaiement.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>


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
?>




<?php

$adresseClient = $_SESSION['email'];


// Vérifier si l'ID de l'article est passé dans l'URL

  
    ?>
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


    <div class="global-premier-div">
      <div class="div-paiement">
        <div class="cordonnees-formulaire">
          <h1>Vos cordonnées</h1>
         <?php
         
         
         
        echo  '<p>'.$adresseClient.'</p>';


         ?>
        </div>
        <div class="info-session">
          <h3>Numéro de la commande N°21009</h3>
          <span>Il reste jusqu'à la fin de session </span>
          <span id="temps-restant"></span>
        </div>

        <div class="partie-formulaire">
          <form action="procedurePaiement.php" id="paiement-form" method="POST">
            <label class="label-select" for="pays">Pays/région</label>

            <select name="pays" id="pays">
              <span class="obligatoire">*</span>

              <option value="">Tunisie</option>
            </select>
            <p class="obligatoire obligatoire-adresse">*</p>

            <input
              id="adress"
              name="adresse"
              type="text"
              placeholder="Adresse"
              required
              autocomplete="off"
            />

            <input
            name="ville"
              id="ville"
              type="text"
              placeholder="Ville"
              autocomplete="off"
            />

            <input
            name="codeP"
              id="codeP"
              type="text"
              placeholder="Code Postal"
              autocomplete="off"
            />
            <p class="obligatoire">*</p>

            <input
            name="telephone"
              type="text"
              name=""
              id="telephone"
              placeholder="telephone"
              required
              autocomplete="off"
            />

            <!-- <i class="fas fa-question-circle"></i>-->

            <div class="carte-acceptees">
              <p>Les cartes acceptées</p>
              <img class="cards" src="images/card.png" alt="" />
            </div>
            <div class="methodes-paiement">
              <label for="methode-paiement"
                >Mode de Paiement : <span class="obligatoire">*</span></label
              >

              <input type="radio" name="cards" value="e-dinar" id="methode-paiement" />
              <p>e-dinar</p>
              <input type="radio" value="mastercard" name="cards" id="" />
              <p>mastercard</p>
              <input type="radio" name="cards" value="visa" id="" />
              <p>visa</p>
            </div>
            <p class="obligatoire">*</p>

            <input
              type="text"
              name=""
              id="num-carte"
              placeholder="Numéro de carte"
              required
              autocomplete="off"
            />
            <p class="obligatoire">*</p>

            <input
              required
              type="text"
              name=""
              id="nom-titulaire"
              placeholder="Nom titulaire de la carte"
              autocomplete="off"
            />

            <label class="label-select" for="mois-expiration"
              >Mois d'expiration</label
            >

            <select name="mois-exp" id="mois-exp" aria-placeholder="MM">
              <option value="">01</option>
              <option value="">02</option>
              <option value="">03</option>
              <option value="">04</option>
              <option value="">05</option>
              <option value="">06</option>
              <option value="">07</option>
              <option value="">08</option>
              <option value="">09</option>
              <option value="">10</option>
              <option value="">11</option>
              <option value="">12</option>
            </select>
            <label class="label-select" for="pays">Année d'expiration</label>

            <select name="date-exp" id="annee-exp" aria-placeholder="AA">
              <option value="">23</option>
              <option value="">24</option>
              <option value="">25</option>
              <option value="">26</option>
            </select>
            <p class="obligatoire">*</p>

            <input
              id="code-securite"
              type="text"
              placeholder="Code de sécurité"
              required
              autocomplete="off"
              autocomplete="off"
            />
            <p id="erreur"></p>

            <div class="pay-btn">
              <button type="submit" class="paiement-btn">Payer</button>
              <button type="reset" class="paiement-btn">Effacer</button>
            </div>
          </form>
        </div>
      </div>
      <div class="div-panier">



<?php


$query = "SELECT a.nomArt, a.designArt, a.imgArt, a.prixArt, p.quantite,p.code_article
FROM panier p
INNER JOIN article a ON a.idArt = p.code_article
WHERE p.adresse_client = :adresseClient";


    // Récupérer les détails de l'article depuis la base de données en utilisant l'ID
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':adresseClient', $adresseClient);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total=6150;
    // Vérifier si l'article existe
    foreach ($articles as $article) {

      $total=$total+$article['prixArt']*$article['quantite'];
 
    echo  '<div class="article-achete">
          <div class="img-achat">
            <img src="../Categorie/' . $article['imgArt'] . '"/>
            <div class="nombre-achat">
              <p>'.$article['quantite'].'</p>
            </div>
          </div>
          <div class="descrip-achat">
            <h3>'.$article['nomArt'].'</h3>
            <p>Poids net : 500g</p>
          </div>
          <p>'. $article['prixArt']*$article['quantite'].' Mil</p>
        </div>';


    }
      ?>  


 

        <div class="total-achat">
          <h3>Total</h3>
          <span>Taxes de 6,150 DT incluse</span>



          <?php
        echo '  <span class="montant">'.$total.' Ml</span>';

          ?>
        </div>
      </div>
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
