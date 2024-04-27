


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
          <a href="../Favoris/favoris.html"><i class="fas fa-heart"></i></a>
        </li>
        <li class="cart">
          <a href="../Panier/panier.php"><i class="fas fa-shopping-cart"></i> </a>
        </li>
      </ul>
    </nav>



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


$adresse=$_POST["adresse"];
$telephone=$_POST["telephone"];
$codeP=$_POST["codeP"];
$ville=$_POST["ville"];
$email=$_SESSION['email'];
$modePaiement = $_POST['cards'];
$dateCourante = date('YYYY-mm-dd'); // Obtient la date courante au format 'AAAA-MM-JJ'




if (!empty($email) && !empty($adresse) &&  isset($modePaiement))  {




    //parcours panier 

    $query = "SELECT a.nomArt, a.designArt, a.imgArt, a.prixArt, p.quantite,p.code_article
    FROM panier p
    INNER JOIN article a ON a.idArt = p.code_article
    WHERE p.adresse_client = :email";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

$q = "SELECT MAX(numCommande) AS maxNumCommande FROM commande";
$st = $pdo->query($q);
$result = $st->fetch(PDO::FETCH_ASSOC);

// Stocker la valeur maximale dans une variable
$maxNumCommande = $result['maxNumCommande'];
// Parcourir les articles et les afficher
$testGlobal=1;



foreach ($articles as $article) {
    

   $nom = $article['code_article'];
   $quantite=$article['quantite'];
  $total=$article['prixArt']*$article['quantite'];



  $testDisp = "SELECT dispoArt AS dispo FROM article where idArt=$nom";

  $st = $pdo->query($testDisp);
$resultat = $st->fetch(PDO::FETCH_ASSOC);

// Stocker la valeur maximale dans une variable
$dispo = $resultat['dispo'];

$testquanti = "SELECT quantArt AS qte FROM article where idArt=$nom";

$stt = $pdo->query($testquanti);
$resultat1 = $stt->fetch(PDO::FETCH_ASSOC);

// Stocker la valeur maximale dans une variable
$qte = $resultat1['qte'];



if($dispo == 1 && $qte-$quantite >= 0)
{

    $insertQuery = "INSERT INTO commande (numCommande,dateCommande,total,adresse,telephone,ville,idClient,idArticle,modePaiement,codePostal) VALUES ($maxNumCommande+1,'$dateCourante',$total, '$adresse',$telephone,'$ville','$email','$nom','$modePaiement',$codeP) ";
    $sql = "DELETE FROM panier WHERE code_article = $nom ";


    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $pdo->exec($insertQuery); // Exécuter la requête d'insertion

    $updateQuery = "UPDATE article SET quantArt = quantArt - $quantite WHERE idArt = $nom";



$stmt = $pdo->prepare($updateQuery);
$stmt->execute();

if ($qte-$quantite == 0) {

    $updateQuery1 = "UPDATE article SET dispoArt = 0 WHERE idArt = $nom";

    $stmt = $pdo->prepare($updateQuery1);
$stmt->execute();

   
}




}

else{

$testGlobal=0;


 }

    }
    echo '
    <div class="containerCommande">
    <div class="background">
  <div class="overlayy">

    
    
    ';
    echo '<h3> Votre commande a été bien passé ';
    if ($testGlobal==0) {
        echo " mais il y'a des articles en rupture de stock vous pouvez les consultez dans votre panier </h3>
           <a class='retour_panier' href='../Panier/panier.php' > retour au panier </a> ";
    }

echo '</div>
</div>
</div>';


 


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
              <a href="../Mentions/mentions.html">Mentions légales </a>
            </li>

            <li><a href="../A propos/propos.html">A propos de nous</a></li>
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




