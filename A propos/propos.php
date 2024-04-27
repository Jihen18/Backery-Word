
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
    <link rel="stylesheet" href="Css/stylePropos.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/all.min.css" />

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
    <div class="div-presentatif">
      <img class="img-apropos" src="images/ApropsNous.jpg" alt="" />
      <div class="a-propos">
        <h2>A Propos De Nous</h2>
        <div class="parag-a-propos">
          <p>
            Notre pâtisserie artisanale a été fondée en 2011 avec une passion
            pour la création de desserts délicieux et de qualité. Nous sommes
            fiers d'utiliser uniquement des ingrédients frais et locaux dans
            toutes nos créations, ce qui garantit des saveurs authentiques et
            uniques
          </p>
          <p>
            Notre équipe de pâtissiers hautement qualifiés travaille dur pour
            produire une large gamme de desserts, des gâteaux classiques aux
            créations plus originales. Nous aimons relever les défis et créer
            des desserts sur mesure pour les occasions spéciales de nos clients
          </p>
          <p>
            En tant qu'entreprise familiale, nous nous engageons à offrir un
            service exceptionnel et personnalisé à tous nos clients. Nous
            voulons que chaque visite dans notre pâtisserie soit une expérience
            mémorable et nous espérons que vous apprécierez nos desserts autant
            que nous aimons les créer
          </p>
        </div>
      </div>
    </div>

    <section class="conteneur-principal">
      <h2>L'équipe Backery World</h2>
      <button class="nxt-btn"><i class="fas fa-arrow-right"></i></button>
      <button class="pre-btn">
        <i class="fas fa-arrow-left"></i>
      </button>
      <div class="conteneur">
        <div class="carte">
          <div class="contenu-carte">
            <div class="img-carte">
              <img src="images/jihen.jpg" alt="" />
            </div>

            <div class="nom-prof">
              <h3>Jihen Trabelsi</h3>
              <p>Propriétaire de Bakery Wolrd</p>
            </div>
          </div>
        </div>

        <div class="carte">
          <div class="contenu-carte">
            <div class="img-carte">
              <img src="images/chadha.jpg" alt="" />
            </div>

            <div class="nom-prof">
              <h3>Chadha Salem</h3>
              <p>Propriétaire de Bakery Wolrd</p>
            </div>
          </div>
        </div>

        <div class="carte">
          <div class="contenu-carte">
            <div class="img-carte">
              <img src="images/oumaima.jpg" alt="" />
            </div>

            <div class="nom-prof">
              <h3>Oumaima Guesmi</h3>
              <p>Propriétaire de Bakery Wolrd</p>
            </div>
          </div>
        </div>

        <div class="carte">
          <div class="contenu-carte">
            <div class="img-carte">
              <img src="images/webDesigner.jpg" alt="" />
            </div>

            <div class="nom-prof">
              <h3>Mohamed Trabelsi</h3>
              <p>Web designer</p>
            </div>
          </div>
        </div>

        <div class="carte">
          <div class="contenu-carte">
            <div class="img-carte">
              <img src="images/secretaire.jpg" alt="" />
            </div>

            <div class="nom-prof">
              <h3>Sondes Hm</h3>
              <p>Secrétaire générale</p>
            </div>
          </div>
        </div>

        <div class="carte">
          <div class="contenu-carte">
            <div class="img-carte">
              <img src="images/finance.jpg" alt="" />
            </div>

            <div class="nom-prof">
              <h3>Sami Ben Slimen</h3>
              <p>Comptable</p>
            </div>
          </div>
        </div>

        <div class="carte">
          <div class="contenu-carte">
            <div class="img-carte">
              <img src="images/chef2.jpg" alt="" />
            </div>

            <div class="nom-prof">
              <h3>Ismail Hm</h3>
              <p>Chef cuisine</p>
            </div>
          </div>
        </div>

        <div class="carte">
          <div class="contenu-carte">
            <div class="img-carte">
              <img src="images/chef3.jpg" alt="" />
            </div>

            <div class="nom-prof">
              <h3>Raghreb Ben Salah</h3>
              <p>Cuisinier</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="valeur-global">
      <div class="valeurs">
        <div class="img-valeurs">
          <img src="images/chefValeurs2.png" alt="" />
        </div>
        <div class="descrip-valeurs">
          <h3>Nos valeurs</h3>
          <p>
            Chaque création de Backery World est un message de générosité,
            d'amour, de finesse, d'expertise. nous sommes fiers de créer un
            environnement de travail inclusif et positif pour notre équipe, où
            chacun est encouragé à s'exprimer, à innover et à se développer
            professionnellement et personnellement.
          </p>
        </div>
      </div>

      <div class="valeurs">
        <div class="img-valeurs">
          <img src="images/savoirFaire.jpg" alt="" />
        </div>
        <div class="descrip-valeurs">
          <h3>Notre savoir-faire</h3>
          <p>
            Notre passion pour les desserts artisanaux de qualité supérieure se
            reflète dans chacune de nos créations. Chez Backery Wolrd, nous
            utilisons uniquement des ingrédients frais et de qualité pour créer
            des desserts délicieux et uniques pour tous les goûts et toutes les
            occasions. Venez découvrir notre savoir-faire en pâtisserie et
            laissez-nous vous offrir une expérience sucrée inoubliable
          </p>
        </div>
      </div>

      <div class="valeurs">
        <div class="img-valeurs">
          <img src="images/chefValeur.png" alt="" />
        </div>
        <div class="descrip-valeurs">
          <h3>La qualité Backery World</h3>
          <p>
            Ce travail d’orfèvres de nos artisans qui confectionnent ce qui se
            fait de mieux dans la pâtisserie tunisienne afin d'offrir à nos
            clients des saveurs raffinées, à l’esthétisme soigné, et aux
            ingrédients de qualité, c’est cela notre touche. C'est ce qui nous
            différencie !
          </p>
        </div>
      </div>
    </div>

      <div class="second">
        <video src="images/bakery_Trim.mp4" controls></video>
        <div class="descrip-valeurs descrip-video">
          <h3>Découvrez le processus artisanal de préparation de nos sucres</h3>
          <p>
            Regardez notre vidéo de préparation de nos sucres artisanaux et
            découvrez comment nous créons ces délices sucrés pour satisfaire vos
            papilles gustatives. De la sélection des ingrédients de qualité
            supérieure à la mise en forme de chaque cristal, notre processus est
            méticuleusement exécuté avec soin et passion pour vous offrir une
            expérience gustative exceptionnelle à chaque bouchée.
          </p>
        </div>






      </div>



      <div class="avis">
        <audio src="images\𝐀𝐯𝐢𝐬 𝐜𝐥𝐢𝐞𝐧𝐭 🇨🇦 🇺🇸 🇹🇳🥰.mp3" autoplay loop controls></audio>
        
      </div>
<div class="conteneur-table">
        <table border>
          <caption>
            Nos locaux
          </caption>
          <tr class="titres">
            <th>Ville</th>
            <th>Local</th>
            <th>Numéro</th>
          </tr>
          <tr>
            <td>Tunis</td>
            <td>Centre urbain nord</td>
            <td>72000001</td>
          </tr>
          <tr>
            <td>La manouba</td>
            <td>Denden</td>
            <td>72003001</td>
          </tr>
          <tr>
            <td>Ariana</td>
            <td>El Ghazela</td>
            <td>72200200</td>
          </tr>
          <tr>
            <td>Sfax</td>
            <td>Sakiet Ezzit</td>
            <td>75800945</td>
          </tr>
          <tr>
            <td>Monastir</td>
            <td>R6</td>
            <td>75800944</td>
          </tr>
          <tr>
            <td>Gabes</td>
            <td>Zrig</td>
            <td>73200641</td>
          </tr>
          <tr>
            <td>Kébili</td>
            <td>Douz</td>
            <td>73200648</td>
          </tr>
        </table>
      </div>
      </div>

      <div id="mapid"></div>


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

    <script src="js/scriptAprops.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="js/maps.js"></script>
  </body>
</html>
