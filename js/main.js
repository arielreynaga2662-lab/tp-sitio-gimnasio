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

// Validación del formulario de contacto (estilo Bootstrap)
const formulario = document.getElementById("form-contacto");
const mensajeEnviado = document.getElementById("mensaje-enviado");

formulario.addEventListener("submit", (evento) => {
  evento.preventDefault();

  if (!formulario.checkValidity()) {
    formulario.classList.add("was-validated");
    return;
  }

  formulario.reset();
  formulario.classList.remove("was-validated");
  mensajeEnviado.classList.remove("d-none");
});
