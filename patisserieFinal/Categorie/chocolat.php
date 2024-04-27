<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Bakery Chocolat</title>

    <link rel="stylesheet" href="../Accueil/Css/styleAccueil.css" />
    <link rel="stylesheet" type="text/css" href="Css/styleCategorieArticle.css" />
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
  </head>

  <body>
    <div id="overlay"></div>
    <div id="compte" class="div-compte">
      <span class="first-span">Besoin d'aide ? </span>
      <span class="second-span"> Appeler 72313478</span>
      <a class="inscription" href="../Inscription/inscription.html"
        ><span>Inscription</span></a
      >
      <a class="connexion" href="../Connexion/connexion.html"
        ><span>Connexion</span></a
      >
    </div>
    <nav>
      <div class="logo">
        <p>Bakery World</p>
      </div>
      <ul>
        <li><a href="../Accueil/Accueil.php">Accueil </a></li>
        <li>
          <a href="" class="service">Catégories</a>
          <ul>
            <li><a href="../Categorie/macarons.html">Macarons</a></li>
            <li><a href="../Categorie/cupcakes.html">Cupcakes</a></li>
            <li><a href="../Categorie/croissant.html">Croissants</a></li>
            <li><a href="../Categorie/chocolat.html">Chocolats</a></li>
          </ul>
        </li>
        <li><a href="../A propos/propos.html">A propos</a></li>
        <li>
          <a href="../Favoris/favoris.html"><i class="fas fa-heart"></i></a>
        </li>
        <li class="cart">
          <a href="../Articles/cart.html"
            ><i class="fas fa-shopping-cart"></i>
          </a>
        </li>
      </ul>
    </nav>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <!-- partie a gauche de filtre jusqua prix -->


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



    <div id="container">
      <div class="tout">
        <div>
          <aside class="filtre">
            <!-- la partie droite-->
            <h4>Filtre</h4>
            <br />
            <p>6 produits</p>
            <br />
            <hr />
            <br />
          </aside>
        </div>
        <div>
          <aside class="dispo">
            <h4>Disponibilité</h4>
            <br />

            <form class="check">
              <input
                type="checkbox"
                name="produit"
                value="En stock"
                class="disponibilité"
              />
              <span>stock</span> <br />
              <br />

              <input
                type="checkbox"
                name="produit"
                value="En rupture de stock"
                class="disponibilité"
              />
              <span>En rupture de stock </span>
            </form>
            <br />
            <hr />
          </aside>
        </div>
      </div>

      <!-- Image backround-->
      <div class="first">
        <div class="centre">
          <!-- au centre et avec bordrer-->
          <img src="images/chocolatBackground.jpg" class="img-general" />

          <div class="pub">
            <h1>Nos chocolats</h1>
            <br />

            <p>
              "Venez découvrir la divine tentation chocolatée de notre
              pâtisserie <br />artisanale,pour une expérience de plaisir sucré
              inoubliable !"
            </p>
          </div>
        </div>
        <hr />

        <!--le tri  et avec border aussi-->
        <div class="tr">
          <p>Triez par :</p>
          <br />

          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <select name="Trie" id="trie-prix" onchange="this.form.submit()">
        <option >aucun</option>
        <option>Prix: faible à élevé </option>
        <option>Prix: élevé à faible</option>
    </select>
</form>
          <br />
        </div>

        <br />
        <br />
        <br />

        <!--nav et modification des images-->
        <div class="notif" id="notification"></div>
        <div id="article-conteneur">



        <?php
session_start();
$_SESSION['nom_utilisateur'] = 'John';
?>




        <?php
// ...



try {












  





    // ...

    // Exécution d'une requête pour récupérer les articles
   
    $tri = $_POST['Trie'];
    $currentOption = $tri;
    // Modifiez votre requête SQL en fonction de la valeur de tri
    if ($tri === 'Prix: faible à élevé') {
        $query = "SELECT * FROM article WHERE catArt = 2 ORDER BY prixArt ASC";
    } elseif ($tri === 'Prix: élevé à faible') {
        $query = "SELECT * FROM article WHERE catArt = 2 ORDER BY prixArt DESC";
    } else {
        $query = "SELECT * FROM article WHERE catArt = 2";
    }
    
    $stmt = $pdo->query($query);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Parcourir les articles et les afficher
    foreach ($articles as $article) {









      echo '<div class="article">';
      echo '<img src='."\"".$article['imgArt']."\"".' class="image" />';

    echo ' <div class="product-btn">
        <button id="product-BTN">
          <i class="fas fa-heart button-heart"></i>
        </button>
        <button id="product-BTN">
          <i class="fas fa-shopping-cart"></i>
        </button>
        <button id="product-BTN">
          <i class="fa fa-eye"></i>
        </button>
      </div>

      <div>
      <a href="../Articles/articleDetail.php?nom=' . $article['idArt'] . '"><h4>' . $article['nomArt'] . '</h4></a>
        <p class="description-article">' .$article['designArt'].
        '</p>
        <p class=""price"">'.$article['prixArt'].'</p>
        <br />
      </div>
    </div>';






    }

   



} catch (PDOException $e) {
    // ...
}
?>

        </div>
        <hr />
      </div>
    </div>
    <br />
    <br />
    <br />
    <!-- Partie footer -->

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
              <a href="../Mentions/mentions.html">Mentions légales </a>
            </li>

            <li><a href="../A propos/propos.html">A propos de nous</a></li>
            <li>
              <a href="../Commentaire/commentaire.html"
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

    <script src="js/trierArticle.js"></script>
    <script src="js/heart.js"></script>
    <script src="js/aperçu.js"></script>
  </body>
</html>
