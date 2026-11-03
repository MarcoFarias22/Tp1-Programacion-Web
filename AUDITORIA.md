# Auditoría de Calidad y Accesibilidad - CÓMIC HUB

Documentación del **Paso 4** correspondiente al TP N°3 de Programación Web.

## 1. Herramientas Utilizadas
- **Prettier:** Formateo automático de código HTML5 y CSS3 para mantener consistencia sintáctica.
- **Chrome DevTools (Lighthouse):** Evaluación de Accesibilidad (A11y), Mejores Prácticas y SEO.

---

## 2. Resultados de la Auditoría (Lighthouse)

### Puntajes Obtenidos
- **Accesibilidad:** 98 / 100
- **Mejores Prácticas:** 100 / 100
- **SEO:** 95 / 100

---

## 3. Correcciones e Implementaciones Realizadas

### A. Accesibilidad (A11y)
1. **Etiquetas Alt en Imágenes:** Se aseguró que todas las imágenes y contenedores visuales tengan descripciones mediante el atributo `alt` o descripciones descriptivas accesibles.
2. **Jerarquía Semántica de Encabezados:** Se ajustó el orden de los títulos (`<h1>`, `<h2>`, `<h3>`) para evitar saltos de nivel y facilitar la lectura con lectores de pantalla.
3. **Contrastes de Color:** Se revisaron los fondos y textos (`bg-light`, `text-muted`, botones de Bootstrap) para garantizar un ratio de contraste adecuado.
4. **Navegación por Teclado y ARIA:** Se añadieron atributos `aria-label` en botones interactivos (como el botón de búsqueda y paginadores) y en barras de navegación (`<nav aria-label="...">`).

### B. SEO y HTML Semántico
1. **Etiquetas Meta:** Se incluyó `<meta name="description">` y `<meta name="viewport">` en cada una de las 10 vistas del sitio.
2. **Estructura Semántica:** Reemplazo de `<div>` genéricos por etiquetas semánticas HTML5 (`<header>`, `<main>`, `<nav>`, `<article>`, `<section>`, `<footer>`).
3. **Títulos Únicos:** Cada página cuenta con un `<title>` descriptivo correspondiente a su sección.