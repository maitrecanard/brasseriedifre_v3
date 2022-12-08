/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./src/assets/javascripts/topbar.js ***!
  \******************************************/
// Nous créons les références pour notre menu et l’icône du menu :
var iconMobile = document.querySelector(".header-menu-icon");
var headerMenu = document.querySelector(".header-menu");
var sectionMobile = document.querySelector(".mobile"); // Cette propriété permettra de savoir si le menu est ouvert :

var isMenuOpen = false; // Cette propriété permettra de savoir si le menu mobile est créé :

var mobileMenuDOM; // Pour fermer le menu il suffit d’enlever la classe open sur le menu :

var closeMenu = function closeMenu() {
  mobileMenuDOM.classList.remove("open");
}; // Nous créons une div et nous ajoutons la classe mobile-menu.
// Nous empêchons la fermeture du menu sur un clic à l’intérieur.
// Nous y clonons ensuite les liens du menu normal.


var createMobileMenu = function createMobileMenu() {
  mobileMenuDOM = document.createElement("div");
  mobileMenuDOM.classList.add("mobile-menu");
  mobileMenuDOM.addEventListener("click", function (event) {
    event.stopPropagation();
  });
  mobileMenuDOM.append(headerMenu.querySelector("ul").cloneNode(true));
  sectionMobile.append(mobileMenuDOM);
}; // Si le menu n’est pas créé nous le créons.
// Dans tous les cas nous l’ouvrons en ajoutant la classe open :


var openMenu = function openMenu() {
  if (!mobileMenuDOM) {
    createMobileMenu();
  }

  mobileMenuDOM.classList.add("open");
  mobileMenuDOM.classList.add("open");
  mobileMenuDOM.classList.add("open");
}; // Permet d’ouvrir ou de fermer le menu en fonction de son état :


var toggleMobileMenu = function toggleMobileMenu(event) {
  if (isMenuOpen) {
    closeMenu();
  } else {
    openMenu();
  }

  isMenuOpen = !isMenuOpen;
}; // Un clic sur l’icône va ouvrir ou fermer le menu 
// et empêcher la propagation de l’événement à window :


iconMobile.addEventListener("click", function (event) {
  event.stopPropagation();
  toggleMobileMenu();
}); // Nous récupérons les clics sur window pour fermer le menu.

window.addEventListener("click", function () {
  if (isMenuOpen) {
    toggleMobileMenu();
  }
}); // Si la fenêtre est agrandie et qu’elle dépasse 480px de largeur
// Alors nous fermons le menu si il est ouvert :

window.addEventListener("resize", function (event) {
  if (window.innerWidth > 480 && isMenuOpen) {
    toggleMobileMenu();
  }
});
/******/ })()
;
//# sourceMappingURL=topbar.bundle.js.map