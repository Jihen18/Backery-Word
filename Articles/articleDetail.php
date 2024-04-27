
<?php


    session_start();


   
error_reporting(0);


    
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="chocolat.css" />
    <link rel="stylesheet" href="styleNavFooter.css" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-6.4.0-web/css/all.min.css"
    />


    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
      rel="stylesheet"
    />
    <title>Macarons Chocolat</title>
  </head>



  <body>





  <?php


$host = 'localhost';
$dbname = 'patisserie';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>



    <div id="overlay"></div>
    <div id="container">
      <header>
        <div class="div-compte">
          <span class="first-span">Besoin d'aide ? </span>
          <span class="second-span"> Appeler 72313478</span>
          <?php
// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['email'])) {
    echo '<a class="deconnexion" href="../Connexion/connexion.php"
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
            <li><a href="../Accueil/Accueil.php">Accueil</a></li>
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
      </header>
      <?php
// Vérifier si l'ID de l'article est passé dans l'URL
if (isset($_GET['nom'])) {
    $articleNom = $_GET['nom'];

    // Récupérer les détails de l'article depuis la base de données en utilisant l'ID
    $statement = $pdo->prepare("SELECT * FROM article WHERE idArt = :nom");

    $testDisp = "SELECT dispoArt AS dispo FROM article where idArt=$articleNom";

    $st = $pdo->query($testDisp);
  $resultat = $st->fetch(PDO::FETCH_ASSOC);
  
  // Stocker la valeur maximale dans une variable
  $dispo = $resultat['dispo'];
    $statement->bindParam(':nom', $articleNom);
    $statement->execute();
    $article = $statement->fetch();

 
 

   echo '<div id="rows">
        <div id="main">
          <div id="content">
            <figure id="magnifying_area">';
             echo  '<img id="magnifying_img" src="../Categorie/'.$article['imgArt'].'">';
         echo '   </figure>
          </div>
          <div class="content2">
            <h1>'. $article['nomArt'] .'</h1>
            <hr />
            <br />

            <span class="bold">Disponibilté : </span>';

            if($dispo==1){
              echo'
            <span id="stock"> en stock <i class="fa-solid fa-check"></i></span>';}

            else echo '<span id="rupture" > en rupture de stock <i class="fa-solid fa-xmark"></i></span>';
         echo'   <br />
            <br />
            <div id="prix">'. $article['prixArt'] .' millimes.</div>

            <br />
            <br />
            <p id="def">'. $article['designArt'] .
              
            '</p>
            <br />
            <br />
            <p class="infoss">
              ingrédients : Chocolat noir Crème liquide entière Beurre doux Café
              noir moulu de Legal le goût Liqueur de café Cacao en poudre non
              sucré
            </p>
            <br />
            <br />
            <p class="infoss">
              Valeurs nutritives : (pour 1 truffe) Cals:64 Gras:4,25g Glu:5,68g
              Prot:0,79g
            </p>
            <br />
            <br />
            <br />';

        }
            ?>







            <span class="bold"> Partager : </span>
            <span>
              <a href="https://www.facebook.com/" class="icon"
                ><i class="fa-brands fa-facebook sm faceb"></i
              ></a>
              <a href="https://www.instagram.com/" class="icon"
                ><i class="fab fa-instagram sm insta"></i
              ></a>
              <a href="https://www.pinterest.com/" class="icon"
                ><i class="fab fa-pinterest sm pin"></i
              ></a>
            </span>
            <br />
            <br />
            <br />

            <span class="bolder"
              >Poids Net :
              <select>
                <option selected>100g</option>
              </select></span
            >
            <br />
            <br />
            <br />

            <span class="bolder"
              >Poids Brut :
              <select>
                <option selected>120g</option>
              </select></span
            >
            <br />
            <br />
            <br />

            <span class="bolder"
              >Nombre de pièces :
              <select>
                <option selected>12PIECES</option>
              </select></span
            >
            <br />
            <br />
            <br />

            <span class="bold qte">Quantité </span>
            <span id="inline">
              <table id="table1">
                <tr>
                  <td class="cell1">
                    <button class="plus-btn" id="plus">
                      <i class="fas fa-plus"></i>
                    </button>
                  </td>
                  <p class="cell2 qte" id="quantity">1</p>
                  <td class="cell3">
                    <button class="minus-btn" id="minus">
                      <i class="fas fa-minus"></i>
                    </button>
                  </td>
                </tr>
              </table>
            </span>

            <br />
            <br />
            <br />

            <span>
              <table id="table2">
                <tr>
                  <td class="cellule2" id="cel1">
                    <button id="product-BTN">


<?php






$email=$_SESSION['email'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patisserie";

// Connexion à la base de données avec PDO
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Configuration des options PDO pour afficher les exceptions en cas d'erreur
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$existingArticleQuery = "SELECT COUNT(*) as count FROM favoris WHERE code_article = :articleNom AND adresse_client = :email";

// Exécution de la requête
$stmt = $pdo->prepare($existingArticleQuery);
$stmt->bindParam(':articleNom', $articleNom);
$stmt->bindParam(':email', $email);

// Exécution de la requête
$stmt->execute();
$existingArticle = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérification des résultats
if ($existingArticle['count'] > 0) {
    // Il y a des résultats
   


      echo' <form method="POST" action="AjoutFavoris.php"> <input name="codeArt" type="hidden"  value="'.$_GET['nom'].'"> <button class="subBtn retirerBtn" type="submit"> <i class="fa-solid fa-xmark xmark"></i></button></form>';

    
} else {
    // La requête est vide (aucun résultat)


    if (isset($_SESSION['email'])) {
  echo' <form method="POST" action="AjoutFavoris.php"> <input name="codeArt" type="hidden"  value="'.$_GET['nom'].'"> <button class="subBtn" type="submit"><i class="fas fa-heart button-heart"></i></button></form>';

 
    }




}



  



?>


                    </button>
                  </td>
                  <td class="cellule2" id="cel2">
            <form method="POST" action="traitementPanier.php" >

            <input type="hidden" name="nom" value="<?php echo $_GET['nom']; ?>">

            <input type="hidden" type="text" name="content" id="contente" value="1">




            <?php

    
if (isset($_SESSION['email'])) {
    $nomUtilisateur = $_SESSION['email'];
    echo  '       <input class="add-cart" type="submit" value="AJOUTER AU PANIER">
       ' ;
} else {
    
}
?>

               





                  </td>
                  </form>
                </tr>
              </table>
            </span>






            <h5 id="sécurisé">-Paiement Sécurisé-</h5>
            <img id="paiement" src="paiement.png" />
          </div>

          <div class="content3">
            <div class="con3">
              <h3>LIVRAISON</h3>
              <br />
              <p>Livraison dans toute la Tunisie en 24/72h</p>

              <i class="fas fa-truck icon-valeur"></i>
            </div>
            <div class="con3">
              <h3>PAIEMENT SÉCURISÉ</h3>
              <br />
              <p>Par carte bancaire, ou en paiement à la livraison</p>

              <i class="fa-solid fa-lock icon-valeur"></i>
            </div>
            <div class="con3">
              <h3>SERVICE CLIENT</h3>
              <br />
              <p>Toujours disponible</p>
              <br />
              <p>Téléphone : +216 72313478</p>

              <p>Email : Bakery-world@gmail.com</p>

              <i class="fa-solid fa-headphones icon-valeur"></i>
            </div>
          </div>
        </div>
        <div class="notif" id="notification"></div>
        <div id="content4">
          <h3 class="bolder">Vous pourriez également apprécier</h3>

          <button class="pre-btn"><img id="btn1" src="next.jpg" /></button>
          <button class="next-btn"><img id="btn2" src="next.jpg" /></button>

          <div class="product_container">






         



<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patisserie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Requête SQL pour récupérer les articles qui ne sont pas dans la table "panier"
$sql = "SELECT a.*
        FROM article a
        LEFT JOIN panier p ON a.idArt = p.code_article
        WHERE p.code_article IS NULL ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichage des articles
    while ($row = $result->fetch_assoc()) {
      echo 

      '
                  <div class="product_card">
                    <div
                      class="product_image-mac"
                      onmouseover="showButtons(0)"
                      onmouseout="hideButtons(0)"
                    >
                      <a href="http://localhost/patisserieFinal/Articles/articleDetail.php?nom='.$row["idArt"].'"
                        ><img
                          src="../Categorie/'.$row["imgArt"].'"
                          class="product-size-mac"
                          class="product_thumb"
                      /></a>
      
                    </div>
                    <div class="product_info">
                      <h4 class="product_name">'.$row["nomArt"].'</h4>
                     
                      <div class="price">'.$row["prixArt"].' Mm</div>
                    </div>
                  </div>'
      
                  ;
    }
} else {
    echo "Aucun article trouvé.";
}

$conn->close();






           


            ?>


          </div>
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
          <a href="https://twitter.com/search?q=backery%20world&src=typed_query"
            ><i class="fab fa-twitter sm twi"></i
          ></a>
          <a
            href="https://www.pinterest.fr/search/pins/?q=backery%20world&rs=typed"
            ><i class="fab fa-pinterest sm pin"></i
          ></a>
        </div>
      </div>

      <div class="copyrights">
        <p>Copyright © 2023 Backery World</p>
      </div>
    </footer>

   

   
    <script src="chocolatmac.js"></script>
    <script src="aperç.js"></script>
    <script src="script.js"></script>
    <script
      src="https://kit.fontawesome.com/759fe707e1.js"
      crossorigin="anonymous"
    ></script>

    <script>
    



    const plusBtn = document.getElementById("plus");
const minusBtn = document.getElementById("minus");
const quantityElement = document.getElementById("contente");
const quantityMaj = document.getElementById("quantity");

plusBtn.addEventListener("click", function () {
  let quantity = parseInt(quantityElement.value);
  quantity += 1;
  quantityElement.value = quantity;
  quantityMaj.innerHTML = quantity;
});

minusBtn.addEventListener("click", function () {
  let quantity = parseInt(quantityElement.value);
  if (quantity > 1) {
    quantity -= 1;
    quantityElement.value = quantity;
    quantityMaj.innerHTML = quantity;
  }
});






  </script>

  </body>
</html>










