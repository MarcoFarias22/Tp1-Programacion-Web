// js/buscar_comics.js
document.addEventListener('DOMContentLoaded', () => {
    const inputBusqueda = document.getElementById('inputBusqueda');
    const contenedorResultados = document.getElementById('contenedorResultados');

    if (inputBusqueda && contenedorResultados) {
        let timerBusqueda = null;

        // Función asincrónica Fetch
        const realizarBusqueda = async (query = '') => {
            try {
                // Petición asincrónica mediante Fetch API
                const response = await fetch(`api/buscar_comics.php?q=${encodeURIComponent(query)}`);

                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status}`);
                }

                const res = await response.json();

                if (res.status === 'success') {
                    renderizarComics(res.data);
                } else {
                    contenedorResultados.innerHTML = `<div class="col-12"><div class="alert alert-warning">${res.message}</div></div>`;
                }
            } catch (error) {
                console.error("Error Fetch:", error);
                contenedorResultados.innerHTML = '<div class="col-12"><div class="alert alert-danger">Ocurrió un error al cargar los resultados.</div></div>';
            }
        };

        // Escuchar tipeo con temporizador (Debounce de 300ms)
        inputBusqueda.addEventListener('input', (e) => {
            const query = e.target.value.trim();

            // Cancelar la búsqueda previa si el usuario sigue tipeando rápido
            clearTimeout(timerBusqueda);

            // Limpiar mensaje de error anterior mientras el usuario escribe
            contenedorResultados.innerHTML = '';

            // Esperar 300ms a que deje de tipear para hacer la petición Fetch
            timerBusqueda = setTimeout(() => {
                realizarBusqueda(query);
            }, 300);
        });
    }

    // Inyección dinámica en el DOM
    function renderizarComics(comics) {
        contenedorResultados.innerHTML = '';

        if (!comics || comics.length === 0) {
            contenedorResultados.innerHTML = '<div class="col-12"><p class="text-muted">No se encontraron cómics que coincidan con la búsqueda.</p></div>';
            return;
        }

        comics.forEach(comic => {
            const card = document.createElement('div');
            card.className = 'col-md-4 mb-3';
            card.innerHTML = `
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary mb-2 align-self-start">${comic.editorial} (${comic.anio_publicacion})</span>
                        <h5 class="card-title fw-bold text-dark">${comic.titulo}</h5>
                        <p class="card-text text-muted small">${comic.sinopsis ? comic.sinopsis.substring(0, 90) + '...' : 'Sin sinopsis disponible.'}</p>
                        <a href="detalle.php?id=${comic.id_comic}" class="btn btn-outline-primary btn-sm mt-auto">Ver detalle</a>
                    </div>
                </div>
            `;
            contenedorResultados.appendChild(card);
        });
    }
});