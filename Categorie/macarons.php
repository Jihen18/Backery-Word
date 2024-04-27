
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
    <link rel="stylesheet" href="Css/styleCategorieArticle.css" />
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
    // Gérer les erreurs de connexion
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>







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
            <li><a href="../Categorie/macarons.php">Macarons</a></li>
            <li><a href="../Categorie/cupcakes.php">Cupcakes</a></li>
            <li><a href="../Categorie/croissant.php">Croissants</a></li>
            <li><a href="../Categorie/chocolat.php">Chocolats</a></li>
          </ul>
        </li>
        <li><a href="../A propos/propos.php">A propos</a></li>
        <li>
        <?php

    
// Vérification et affichage de la variable de session
if (isset($_SESSION['email'])) {
    $nomUtilisateur = $_SESSION['email'];
    echo  '                <a href="../Favoris/favoris.php"><i class="fas fa-heart"></i></a>
    </li>
    <li class="cart">
      <a href="../Panier/panier.php"><i class="fas fa-shopping-cart"></i> </a>
    </li>        ' ;
} else {
    
}
?>
      </ul>
    </nav>

    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <div id="container">
      <div class="tout">
        <div>
          <aside class="filtre">
            <!-- la partie droite-->
            <h4>Filtre</h4>
            <br />
            <?php



//error_reporting(E_ERROR | E_PARSE);

$host = 'localhost';
$dbname = 'patisserie';
$username = 'root';
$password = '';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


$adresseClient = $_SESSION['email'];

$query = "SELECT nomArt
          FROM article
        
          WHERE catArt= 3 ";

$stmt = $pdo->prepare($query);
$stmt->execute();

$rowCount = $stmt->rowCount(); // Nombre de lignes renvoyées par la requête

echo '<p>' . $rowCount .' produits </p>';
?>

            <hr />
            <br />
          </aside>
        </div>
        <div>
          <aside class="dispo">
            <h4>Disponibilité</h4>
            <br />
            <form class="check" name="formulaire" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
              <input type="checkbox" name="produit"  value="En stock" class="disponibilité"onclick="verificationCheckbox(document.formulaire.produit,0);"/>
              <span>En stock </span> <br />
              <br />
              <input type="checkbox" name="produit"  value="En rupture de stock" class="disponibilité"onclick="verificationCheckbox(document.formulaire.produit,1);"/>
              <span>En rupture de stock </span>
              <input type="submit" value="filtrer">

            </form>


            <script>
                 function verificationCheckbox(listeChoix,indiceChoix){
                  for(i=0;i<listeChoix.length;i++)
                  {
                      if(i!=indiceChoix){
                          listeChoix[i].checked=false;                
                      }
                  }       
                } 
            </script>
            
            <br />
            <hr />
            <br />
          </aside>
        </div>
      </div>

      <!-- Image backround-->
      <div class="first">
        <div class="centre">
          <!-- au centre et avec bordrer-->
          <img src="images/bgMacarons.jpg" class="img-general" />

          <div class="pub">
            <h1>Nos macarons</h1>
            <br />

            <p>
              "Un petit plaisir sucré à emporter partout avec vous -
              <br />savourez nos macarons faits à la main pour une expérience
              gustative inoubliable!"
            </p>
          </div>
        </div>
        <hr />

        <!--le tri  et avec border aussi-->
        <div class="tr">
          <p>Triez par :</p>
          <br />

          <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="event.preventDefault();">
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
// ...



try {






    // ...

    $dispo=$_POST['produit'];
    $tri = $_POST['Trie'];
    $currentOption = $tri;
    if ($dispo === 'En stock') {
        $query = "SELECT * FROM article WHERE catArt = 3 AND dispoArt=1";
    } elseif ($tri === 'Prix: élevé à faible') {
        $query = "SELECT * FROM article WHERE catArt = 3 ORDER BY prixArt DESC";
    } else {

      if (! isset($dispo))
        $query = "SELECT * FROM article WHERE catArt = 3";
        else if($dispo =='En rupture de stock'){
          $query = "SELECT * FROM article WHERE catArt = 3 AND dispoArt=0";
        }
        else{

          $query = "SELECT * FROM article WHERE catArt = 3 AND dispoArt=0";

        }

    }
    
    $stmt = $pdo->query($query);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <!--   </div>  -->
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
    <script src="js/heart.js"></script>
    <script>
const articles = document.getElementById("article-conteneur");

// Récupérer le menu déroulant
const select = document.getElementById("trie-prix");

// Fonction pour trier les articles
function trierArticles() {

  const option = select.value;
  const sortedArticles = Array.from(articles.children).sort((a, b) => {
    const prixA = parseFloat(a.querySelector(".price").textContent);
    
    const prixB = parseFloat(b.querySelector(".price").textContent);
    if (option === "Prix: faible à élevé") {
      return prixA - prixB;
    } else if (option === "Prix: élevé à faible") {
      return prixB - prixA;
    }
  });
  articles.innerHTML = "";
  sortedArticles.forEach((article) => articles.appendChild(article));
}

// Écouter les événements de changement sur le menu déroulant
select.addEventListener("change", trierArticles);
</script>

    <script src="js/aperçu.js"></script>
  </body>
</html>
