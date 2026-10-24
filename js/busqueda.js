// ============================================================
// TP9 - Búsqueda asincrónica de planes (Fetch API + JSON)
// Escucha el input del buscador en planes.php, consulta el
// endpoint api/buscar_planes.php y repinta solo la tabla de
// resultados, sin recargar la página.
// ============================================================

document.addEventListener('DOMContentLoaded', () => {
  const inputBusqueda = document.getElementById('inputBusqueda');
  const cuerpoResultados = document.getElementById('cuerpoResultados');
  const avisoResultados = document.getElementById('avisoResultados');

  // Este script solo actúa en la página que tiene el buscador.
  if (!inputBusqueda || !cuerpoResultados) {
    return;
  }

  let timer = null;

  const buscar = async (query) => {
    try {
      const response = await fetch(
        `api/buscar_planes.php?q=${encodeURIComponent(query)}`
      );

      if (!response.ok) {
        throw new Error(`Error HTTP: ${response.status}`);
      }

      const res = await response.json();

      if (res.status === 'success') {
        renderizarResultados(res.data);
      } else {
        mostrarAviso(res.message || 'Ocurrió un error en la búsqueda.');
      }
    } catch (error) {
      console.error('Error al realizar la petición:', error);
      mostrarAviso('No se pudo conectar con el servidor.');
    }
  };

  const renderizarResultados = (planes) => {
    cuerpoResultados.innerHTML = '';
    avisoResultados.classList.add('d-none');

    if (planes.length === 0) {
      mostrarAviso('No se encontraron planes con ese criterio.');
      return;
    }

    planes.forEach((plan) => {
      const fila = document.createElement('tr');

      const celdaNombre = document.createElement('th');
      celdaNombre.scope = 'row';
      celdaNombre.className = 'text-start';
      celdaNombre.textContent = plan.nombre;

      const celdaPrecio = document.createElement('td');
      celdaPrecio.textContent = `$${Number(plan.precio_mensual).toLocaleString(
        'es-AR',
        { minimumFractionDigits: 2 }
      )}`;

      const celdaDescripcion = document.createElement('td');
      celdaDescripcion.className = 'text-start';
      celdaDescripcion.textContent = plan.descripcion ?? '';

      fila.append(celdaNombre, celdaPrecio, celdaDescripcion);
      cuerpoResultados.appendChild(fila);
    });
  };

  const mostrarAviso = (texto) => {
    cuerpoResultados.innerHTML = '';
    avisoResultados.textContent = texto;
    avisoResultados.classList.remove('d-none');
  };

  inputBusqueda.addEventListener('input', (e) => {
    // Pequeña espera (debounce) para no pedir al servidor en cada tecla.
    clearTimeout(timer);
    const query = e.target.value.trim();
    timer = setTimeout(() => buscar(query), 250);
  });

  // Carga inicial: muestra todos los planes apenas abre la página.
  buscar('');
});
