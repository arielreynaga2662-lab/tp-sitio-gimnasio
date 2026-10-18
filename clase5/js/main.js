// Año actual en el pie de página
document.getElementById("anio").textContent = new Date().getFullYear();

// Cerrar el menú en celulares al tocar un enlace
const menu = document.getElementById("menu");
document.querySelectorAll("#menu .nav-link").forEach((enlace) => {
  enlace.addEventListener("click", () => {
    if (menu.classList.contains("show")) {
      bootstrap.Collapse.getOrCreateInstance(menu).hide();
    }
  });
});

