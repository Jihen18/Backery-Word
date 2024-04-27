

<?php


    session_start();

error_reporting(E_ERROR | E_PARSE); // N'affiche que les erreurs fatales et les erreurs de syntaxe




    
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/styleCommentaire.css" />
    <link rel="stylesheet" href="../Accueil/Css/styleAccueil.css" />
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

    <div class="conteneur-princip">
      <div class="conteneur-form">
        <h2>Exprimer votre avis <i class="fa-regular fa-face-smile"></i></h2>
        <form id="commentaire-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <span class="obligatoire">*</span>
          <label for="nom-utilisateur">Nom</label> <br />
          <input
            type="text"
            placeholder="nom"
            id="nom"
            name="nom"
            required
            autocomplete="off"
          />
          <br />

          <span class="obligatoire">*</span>
          <label for="nom-utilisateur">Prenom</label> <br />
          <input
            type="text"
            placeholder="prenom"
            id="nom"
            name="prenom"
            required
            autocomplete="off"
          />
          <br />
          <div class="degre-satisfaction">
            <p class="titre-satisfaction">Degre de satisfaction:</p>

            <input type="radio" value="très satisfait" name="satisfaction" id="" checked />
            <p>Très satisfait</p>
            <input type="radio" value="Plus au moins" name="satisfaction" id="" />
            <p>Plus au moins</p>
            <input type="radio" value="Non satisfait" name="satisfaction" id="" />
            <p>Non satisfait</p>
            <br />
          </div>
          <span class="obligatoire">*</span>

          <label for="nom-utilisateur">Commentaire</label> <br />
          <textarea
            id="message"
            name="message"
            rows="10"
            required
            autocomplete="off"
          ></textarea>
          <p id="erreur-commentaire"></p>

          <button class="envoyer-btn">
            <i class="fa-solid fa-paper-plane"></i> Envoyer
          </button>


          <button class="envoyer-btn" type="reset">
            <i class="fa-solid fa-trash" ></i> Effacer
          </button>

        </form>
      </div>

      <div class="commentaire-descrip">
        <div class="child-div">
          <p id="Contenu-descrip">
            Nous prenons très au sérieux les commentaires de nos clients et
            sommes toujours prêts à les écouter pour améliorer nos produits et
            services. N'hésitez pas à nous faire part de vos commentaires à tout
            moment
          </p>
        </div>
      </div>
    </div>
    <?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "patisserie"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("La connexion a échoué : " . $e->getMessage());
}


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$commentaire = $_POST['message'];
$adresse=$_SESSION['email'];
$satisfaction=$_POST['satisfaction'];

if(!empty($nom)&& !empty($prenom)&& !empty($commentaire) && !empty($adresse) && isset($satisfaction)){
  $sql = "INSERT INTO commentaire (nom, prenom, commentaire,adresse_client,satisfaction) VALUES (:nom, :prenom, :commentaire, '$adresse','$satisfaction')";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nom', $nom);
  $stmt->bindParam(':prenom', $prenom);
  $stmt->bindParam(':commentaire', $commentaire);


try {
    $stmt->execute();
    echo "Le commentaire a été ajouté avec succès.";
} catch(PDOException $e) {
    echo "Erreur lors de l'ajout du commentaire : " . $e->getMessage();
}


$conn = null;
}

else{
}
?>


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
              <a href="">Mentions légales </a>
            </li>

            <li><a href="">A propos de nous</a></li>
            <li><a href="">Exprimer votre Feedback</a></li>
          </ul>
        </div>

        <div class="reseaux-soc info">
          <h4>Suivez nous</h4>
          <hr />
          <a href="#"><i class="fa-brands fa-facebook sm faceb"></i></a>
          <a href="#"><i class="fab fa-instagram sm insta"></i></a>
          <a href="#"><i class="fab fa-twitter sm twi"></i></a>
          <a href="#"><i class="fab fa-pinterest sm pin"></i></a>
        </div>
      </div>

      <div class="copyrights">
        <p>Copyright © 2023 Backery World</p>
      </div>
    </footer>
    <script src="js/commentaire.js"></script>
  </body>
</html>
