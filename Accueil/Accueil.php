
<?php



session_start();


?>

    



<?php

    
    // Vérification et affichage de la variable de session
    if (isset($_SESSION['email'])) {
        $nomUtilisateur = $_SESSION['email'];
        echo "                Bienvenue, " . $nomUtilisateur;
    } else {
        echo "         Vous n'etes pas connecté ";
    }
    ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Css/styleAccueil.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap"
      rel="stylesheet"
    />
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
        <li><a href="Accueil.php">Accueil </a></li>
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
    <div id="caroussel">
      <div class="div-background" id="img-container">
        <img
          id="carousel-img"
          class="first-img"
          src="images/ImageIndex.jpg"
          alt=""
        />
        <h2 class="first-title">
          Découvrez l'univers sucré de notre pâtisserie artisanale
        </h2>
        <p class="first-parag">Un Voyage De Saveurs</p>
        <p class="first-link">
          <a href="#nos-categories">Decouvrir nos pâtisseries</a>
        </p>
      </div>

      <button class="fleche-droite" id="d">
        <i class="fa fa-angle-right"></i>
      </button>
      <button class="fleche-gauche" id="g">
        <i class="fa fa-angle-left"></i>
      </button>
    </div>

    <div class="conteneur-line">
      <hr class="line" />
      <div class="diamond"></div>
      <hr class="line" />
    </div>

    <div class="sucre">
      <div>
        <h3>Nos Sucrés</h3>
        <p class="descrip-sucre">
          Le cœur du savoir-faire de Gourmandise : une gamme de pâtisseries
          sucrées composée de macarons cupcakes et croissant, de délicieux
          entremets. Nos sucrés sont de véritables délices pour les papilles
          gustatives. Chaque bouchée vous transporte dans un monde de saveurs et
          de textures qui vous feront fondre de plaisir. Nos sucrés sont
          moelleux et légers, garnis de crème onctueuse et de fruits frais. Nos
          cupcakes sont tout aussi délicieux, avec une variété de garnitures
          croquantes pour satisfaire toutes les envies. Nos macarons sont
          croustillants à l'extérieur, tendres et fondants à l'intérieur
          ,généreuses pour une touche de gourmandise.
        </p>
        <img
          class="img-general-macarons"
          src="images/macaronsFram.jpg"
          alt=""
        />
      </div>
    </div>

 
    


    <div class="chocolat">
      <div>
        <h3>Nos Chocolats</h3>
        <p class="descrip-choco">
          notre chocolat est de qualité supérieure, élaboré à partir des
          meilleures fèves de cacao et sans additifs artificiels. Savourez une
          expérience gustative unique avec chaque bouchée. Venez découvrir notre
          gamme de produits artisanaux de haute qualité.notre chocolat est de
          qualité supérieure, élaboré à partir des meilleures fèves de cacao et
          sans additifs artificiels. Savourez une expérience gustative unique
          avec chaque bouchée. Venez découvrir notre gamme de produits
          artisanaux !
        </p>

        <img
          class="img-general-chocolats"
          src="images/chocolatGen.jpg"
          alt=""
        />
      </div>
    </div>
    <div class="conteneur-line2">
      <hr class="line" />
      <div class="diamond"></div>
      <hr class="line" />
    </div>

    <a href="#compte"
      ><button class="scroll"><i class="fa fa-angle-double-up"></i></button
    ></a>

    <div class="social-div">
      <div class="Facebook">
        <a
          href="https://www.facebook.com/groups/292204118759292/"
          target="_blank"
          ><i class="fab fa-facebook fb"></i
        ></a>
      </div>
      <div class="Instagram">
        <a href=""
          ><a href="https://www.instagram.com/world.of.bakery/" target="_blank"
            ><i class="fab fa-instagram ins"></i></a
        ></a>
      </div>
      <div class="Twitter">
        <img src="" alt="" /><a
          href="https://twitter.com/search?q=backery%20world&src=typed_query"
          target="_blank"
          ><i class="fab fa-twitter twit"></i
        ></a>
      </div>
      <div class="Pinterest">
        <img src="" alt="" /><a
          href="https://www.pinterest.fr/search/pins/?q=backery%20world&rs=typed"
          ><i class="fab fa-pinterest pint" target="_blank"></i
        ></a>
      </div>
    </div>


 


    <?php
    $host = 'localhost';
    $dbname = 'patisserie';
    $username = 'root';
    $password = '';
    


    try {
    
      
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
    
    <h2 class="titre-categorie">Nos catégories</h2>

    <div class="div-types-global" id="nos-categories">


    <?php
// ...



try {












  





    // ...

    // Exécution d'une requête pour récupérer les articles
   
    
  
    // Modifiez votre requête SQL en fonction de la valeur de tri
    
        $query = "SELECT * FROM categorie ";

    
    $stmt = $pdo->query($query);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Parcourir les articles et les afficher
    foreach ($categories as $categorie) {









     
      echo '<div class="div-type">
        <img class="type-img" src='.'"'.$categorie['imgCat'].'"'.' alt="" />
        <div class="descrip-type">
          <p class="description-gen">La meilleure pâtisserie</p>
          <h3>Nos'.$categorie['nomCat'].'s</h3>
          <p class="desc-parag">'.$categorie['descripCat'].'</p>
          <a href="../Categorie/croissant.php
          ">Découvrir > </a>
        </div>
      </div>';






    }

   



} catch (PDOException $e) {
    // ...
}
?>





  



    </div>

    <h2 class="titre-best-seller">Nos best seller</h2>

    <div class="best-seller-section">
      <div class="div-best-seller">


      <?php





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patisserie";

// Connexion à la base de données avec PDO
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT c.idArticle, SUM(c.total) as total_quantite, a.idArt,a.imgArt,a.nomArt
          FROM commande c
          INNER JOIN article a ON a.idArt = c.idArticle
          GROUP BY c.idArticle, a.idArt
          ORDER BY total_quantite DESC
          LIMIT 5";
$stmt = $pdo->prepare($query);
$stmt->execute();

$topArticles = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($topArticles as $article) {
  
  echo  '
  <div class="div-best">
   
      <img class="best-img" src="../Categorie/'.$article['imgArt'].'" alt=""
    /></a>
    <div>
      <h4>'.$article["nomArt"].'</h4>
    </div>
  </div>';

}








        ?>

       
      </div>
      <div class="btn-div" id="sectionComm" >
        <button class="pre-btn" >
          <i class="fas fa-arrow-left"></i>
        </button>
        <button class="nxt-btn"><i class="fas fa-arrow-right"></i></button>
      </div >
    </div>







    
    <div   class="div-opinion">
      <img src="images/opinion.jpg" alt="" />
      <div class="opinion">



      <?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "patisserie"; 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$requete = "SELECT * FROM commentaire ORDER BY id";
$resultat = $conn->query($requete);

$commentaires = $resultat->fetchAll(PDO::FETCH_ASSOC);

$commentaireAffiche = $commentaires[0];
if (isset($_POST['bouton1'])) {
    $commentaireAffiche = $commentaires[0];
} elseif (isset($_POST['bouton2'])) {
    $commentaireAffiche = $commentaires[1];
} elseif (isset($_POST['bouton3'])) {
    $commentaireAffiche = $commentaires[2];
}






     echo "   <h3>Ce que vous pensez de Bakery World</h3>
        <p class='type-avis'>".$commentaireAffiche['satisfaction']."</p>
        <p class='nom-client'>".$commentaireAffiche['nom']." ".$commentaireAffiche['prenom']."</p>
        <p class='commentaire'>". $commentaireAffiche['commentaire'] ."
          
        </p>";
?>

        <!-- displays a 2x solid circle icon -->
        <form method="POST" action="Accueil.php#sectionComm">
     <button name="bouton1" > <i id="first-btn" class="far fa-circle"></i></button>  
       <button name="bouton2"> <i id="second-btn" class="far fa-circle"></i></button>
      <button name="bouton3"> <i id="third-btn" class="far fa-circle"></i></button> 
      </form>
      </div>
    </div>
    <div class="div-valeurs">
      <div class="valeur">
        <i class="fas fa-truck icon-valeur"></i>
        <div class="descrip">
          <h4>Livraison à domicile</h4>
          <p>Gratuite sur toute la Tunisie</p>
        </div>
      </div>
      <div class="valeur">
        <i class="fa-solid fa-lock icon-valeur"></i>
        <div class="descrip">
          <h4>Paiement sécurisé</h4>
          <p>Carte bancaire ou paiement à la livraison</p>
        </div>
      </div>
      <div class="valeur">
        <i class="fa-solid fa-trophy icon-valeur"></i>
        <div class="descrip">
          <h4>Certification</h4>
          <p>Conforme aux normes internationales</p>
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
          <a href="https://twitter.com/search?q=backery%20world&src=typed_query" target="_blank"
            ><i class="fab fa-twitter sm twi"></i
          ></a>
          <a
            href="https://www.pinterest.fr/search/pins/?q=backery%20world&rs=typed" target="_blank"
            ><i class="fab fa-pinterest sm pin"></i
          ></a>
        </div>
      </div>

      <div class="copyrights">
        <p>Copyright © 2023 Backery World</p>
      </div>
    </footer>

    <script src="js/accueil.js"></script>
  </body>
</html>
