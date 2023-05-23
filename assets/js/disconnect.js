// <!Automtic disconnexion after 5 minutes>

// Disconnect
function deconnexionAutomatique() {
  // Rediriger vers la page de déconnexion ou effectuer d'autres actions de déconnexion
  window.location.href = "page_deconnexion.php";
}

// Reset automatic logout
function reinitialiserMinuteur() {
  // timerclear
  clearTimeout(timer);

  // Reset timer
  timer = setTimeout(deconnexionAutomatique, 5 * 60 * 1000); // 5 minutes 
}


window.addEventListener("mousemove", reinitialiserMinuteur);
window.addEventListener("keydown", reinitialiserMinuteur);
window.addEventListener("scroll", reinitialiserMinuteur);

// Reset loading page
var timer = setTimeout(deconnexionAutomatique, 5 * 60 * 1000); // 5 minutes 
