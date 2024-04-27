const suppresionLiens = document.querySelectorAll(".suppression");
var nbArticle = document.querySelector(".entier");
const nombreArticles = document.querySelectorAll(".article-favoris").length;
nbArticle.textContent = nombreArticles;

// Sélectionnez le bouton
const viderBTN = document.getElementById("vider-liste");

// Ajoutez un écouteur d'événements au bouton pour détecter les clics
