

<link
      rel="stylesheet"
      href="../fontawesome-free-6.4.0-web/css/all.min.css"
    />

<form action="testfavoris.php" method="POST">
  <input type="hidden" name="article_id" value="ID_ARTICLE" />
  <button type="submit" name="favori" value="ajouter" ><i class="fas fa-heart"></i></button>
</form>
<?php
// Récupérer l'ID de l'article soumis depuis le formulaire
$article_id = 52;

// Vérifier quelle action a été soumise (ajouter ou supprimer)
if ($_POST['favori'] == 'ajouter') {
  // Ajouter l'article à la liste des favoris
  // Insérer une nouvelle ligne dans votre table de favoris avec l'ID de l'utilisateur et l'ID de l'article
} else {
  // Supprimer l'article de la liste des favoris
  // Supprimer la ligne correspondante dans votre table de favoris en utilisant l'ID de l'article
}

// Rediriger l'utilisateur vers la page précédente ou une autre page
?>
<script>
var heartButtons = document.querySelector(".fa-heart");
  heartButtons.addEventListener("click", function () {
    this.classList.toggle("fa-heart");
    this.classList.toggle("fa-times");
  });

</script>