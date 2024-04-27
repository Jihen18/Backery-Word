
<?php


    session_start();
    
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

    // Votre code ici...

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
          <a class="inscription" href="../../Inscription/inscription.html"
            ><span>Inscription</span></a
          >
          <a class="connexion" href="../../Connexion/connexion.html"
            ><span>Connexion</span></a
          >
        </div>
        <nav>
          <div class="logo">
            <p>Bakery World</p>
          </div>
          <ul>
            <li><a href="../../Accueil/Accueil.html">Accueil</a></li>
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
              <a href="../Favoris/favoris.html"
                ><i class="fas fa-heart"></i
              ></a>
            </li>
            <li class="cart">
              <a href="../cart.html"
                ><i class="fas fa-shopping-cart"></i><span>0</span>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <?php
// Vérifier si l'ID de l'article est passé dans l'URL
if (isset($_GET['nom'])) {
    $articleNom = $_GET['nom'];

    // Récupérer les détails de l'article depuis la base de données en utilisant l'ID
    $statement = $pdo->prepare("SELECT * FROM article WHERE idArt = :nom");
    $statement->bindParam(':nom', $articleNom);
    $statement->execute();
    $article = $statement->fetch();

    // Vérifier si l'article existe
    if ($article) {
       
    } 
 

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

            <span class="bold">Disponibilté : </span>
            <span id="stock"> en stock <i class="fa-solid fa-check"></i></span>
            <br />
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

            <span class="bold">Quantité </span>
            <span id="inline">
              <table id="table1">
                <tr>
                  <td class="cell1">
                    <button class="plus-btn" id="plus">
                      <i class="fas fa-plus"></i>
                    </button>
                  </td>
                  <p class="cell2" id="quantity">1</p>
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
                      <i class="fas fa-heart button-heart"></i>
                    </button>
                  </td>
                  <td class="cellule2" id="cel2">
            <form method="POST" action="traitementPanier.php" >

            <input type="hidden" name="nom" value="<?php echo $_GET['nom']; ?>">

            <input type="text" name="content" id="contente" value="0">

                  <input class="add-cart" type="submit" value="AJOUTER AU PANIER">
                  </td>
                  <td class="cellule2" id="cel3">
                    <a href="../../Paiement/paiement.html">ACHAT DIRECT</a>
                  </td></form>
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

          <button class="pre-btn"><img id="btn1" src="../next.jpg" /></button>
          <button class="next-btn"><img id="btn2" src="../next.jpg" /></button>

          <div class="product_container">
            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(0)"
                onmouseout="hideButtons(0)"
              >
                <a href="framboise.html"
                  ><img
                    src="../images/chocociframboise macaron.png"
                    class="product-size-mac"
                    class="product_thumb"
                /></a>

                <div class="product-btn">
                  <button id="product-BTN" class="cart">
                    <i class="fas fa-heart button-heart"></i>
                  </button>
                  <button id="product-BTN" class="add-cart">
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                  <button id="product-BTN" onclick="changeIcon(0)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron du chocociframboise</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">22.000 DT</div>
              </div>
            </div>

            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(1)"
                onmouseout="hideButtons(1)"
              >
                <a href="fraisemac.html"
                  ><img
                    src="../images/fraisemac.png"
                    class="product-size-mac"
                    class="product_thumb"
                /></a>

                <div class="product-btn">
                  <button id="product-BTN" class="cart">
                    <i class="fas fa-heart button-heart"></i>
                  </button>
                  <button id="product-BTN" class="add-cart">
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                  <button id="product-BTN" onclick="changeIcon(1)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron aux fraises</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">18.000 DT</div>
              </div>
            </div>

            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(2)"
                onmouseout="hideButtons(2)"
              >
                <a href="crème.html">
                  <img
                    src="../images/macaron crème.png"
                    class="product-size-mac"
                    class="product_thumb"
                /></a>

                <div class="product-btn">
                  <button id="product-BTN" class="cart">
                    <i class="fas fa-heart button-heart"></i>
                  </button>
                  <button id="product-BTN" class="add-cart">
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                  <button id="product-BTN" onclick="changeIcon(2)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron à la crème du lait</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">18.000 DT</div>
              </div>
            </div>
            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(3)"
                onmouseout="hideButtons(3)"
              >
                <a href="mogador.html"
                  ><img
                    src="../images/macaron mogador.png"
                    class="product-size-mac"
                    class="product_thumb"
                /></a>

                <div class="product-btn">
                  <button id="product-BTN" class="cart">
                    <i class="fas fa-heart button-heart"></i>
                  </button>
                  <button id="product-BTN" class="add-cart">
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                  <button id="product-BTN" onclick="changeIcon(3)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron du mogador</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">18.000 DT</div>
              </div>
            </div>

            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(4)"
                onmouseout="hideButtons(4)"
              >
                <a href="jardin.html"
                  ><img
                    src="../images/macrons jardin enchanté.png"
                    class="product-size-mac"
                    class="product_thumb"
                /></a>

                <div class="product-btn">
                  <button id="product-BTN" class="cart">
                    <i class="fas fa-heart button-heart"></i>
                  </button>
                  <button id="product-BTN" class="add-cart">
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                  <button id="product-BTN" onclick="changeIcon(4)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">Macaron du jardin enchanté</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">23.000 DT</div>
              </div>
            </div>

            <div class="product_card">
              <div
                class="product_image-mac"
                onmouseover="showButtons(5)"
                onmouseout="hideButtons(5)"
              >
                <a href="pistache.html"
                  ><img
                    src="../images/pistache.png"
                    class="product-size-mac"
                    class="product_thumb"
                /></a>

                <div class="product-btn">
                  <button id="product-BTN" class="cart">
                    <i class="fas fa-heart button-heart"></i>
                  </button>
                  <button id="product-BTN" class="add-cart">
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                  <button id="product-BTN" onclick="changeIcon(5)">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="product_info">
                <h4 class="product_name">macaron au saveur de pistache</h4>
                <h4 class="product_name">12 Pièces</h4>
                <div class="price">22.000 DT</div>
              </div>
            </div>
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

    <script
      src="https://kit.fontawesome.com/759fe707e1.js"
      crossorigin="anonymous"
    ></script>

    <script>
    



    const plusBtn = document.getElementById("plus");
const minusBtn = document.getElementById("minus");
var quantityElement = document.getElementById("contente");


plusBtn.addEventListener("click", function () {
  let quantity = parseInt(quantityElement.value);
  quantity += 1;
  quantityElement.value = quantity;

 
  alert(quantityElement.value);
});

minusBtn.addEventListener("click", function () {
  let quantity = parseInt(quantityElement.innerHTML);
  if (quantity > 1) {
    quantity -= 1;
    quantityElement.value = quantity;
  }
});





  </script>

  </body>
</html>










