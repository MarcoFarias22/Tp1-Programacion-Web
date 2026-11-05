# 📚 CÓMIC HUB - Portal de Cómics y Comunidad

Portal web interactivo para fanáticos y coleccionistas de cómics (Marvel, DC Comics y más), diseñado para organizar cronologías de lectura, explorar catálogos editoriales, gestionar colecciones y debatir en comunidad.

---

## 🎨 Diseño y Prototipado (TP1)
- **Prototipo Interactivo en Figma:** [Ver Prototipo en Figma](https://www.figma.com/design/5BKQgl8KkOb1KteYsUIHvK/Comic-Hub?node-id=0-1&p=f&t=dIOoDC4gvRuB2X9w-0)[cite: 14]
- **Bocetos e Historias de Usuario:** Definición de wireframes, arquitectura de la información y requerimientos iniciales[cite: 14].

---

## 🚀 Historial de Evolución del Proyecto (TP1 - TP9)

### 💻 TP2 y TP3: Maquetación Front-End, Bootstrap 5 y Git Workflow
- **Tecnologías:** HTML5 semántico, CSS3 y Bootstrap 5[cite: 13, 14].
- **Estructura:** Maquetación responsiva de las vistas principales del sistema[cite: 13, 14].
- **Control de Versiones:** Flujo Git basado en ramas `feature/`, Pull Requests y merges hacia `main`[cite: 13, 14].
- **Auditoría de Calidad:** Evaluación de accesibilidad (A11y), SEO y semántica mediante **Lighthouse** (documentada en `AUDITORIA.md`)[cite: 13, 14].

---

### ⚙️ TP4: Migración a Backend en PHP & Modularización SSI (Server Side Includes)
- **Entorno:** Servidor local Apache en XAMPP (`htdocs/COMIC-HUB/`)[cite: 13, 14].
- **Migración a PHP:** Conversión de archivos estáticos `.html` a páginas dinámicas `.php`[cite: 13, 14].
- **Arquitectura SSI:** Extracción de componentes reutilizables a la carpeta `/includes/` (`header.php`, `nav.php`, `footer.php`)[cite: 13, 14].
- **Server-Side Rendering (SSR Básico):** Gestión de la variable `$titulo_pagina` para personalizar dinámicamente el `<title>` de cada vista[cite: 13, 14].

---

### 🛡️ TP5: Procesamiento de Formularios y Seguridad Web (OWASP Top 10)
- **Procesamiento HTTP:** Captura por `POST` (`acerca-de.php`) y filtros `GET` (`busqueda-avanzada.php`)[cite: 13, 14].
- **Seguridad OWASP (Anti-XSS):** Helper de sanitización en `includes/functions.php` con `htmlspecialchars()`, `trim()` y `stripslashes()`[cite: 13, 14].
- **Persistencia & UX:** Retención de datos ingresados ante errores y mensajes de retroalimentación dinámicos[cite: 13, 14].

---

### 🗄️ TP6: Diseño y Normalización del Esquema Relacional en MySQL
- **Normalización Aplicada (3FN):** Descomposición relacional documentada en `tp6/NORMALIZACION.md`[cite: 13, 14].
- **Scripts DDL/DML:** Creación de la BD `comic_hub_db` (`tp6/schema.sql`) con PK, FK e índices explícitos, más consultas de prueba CRUD (`tp6/consultas.sql`)[cite: 13, 14].

---

### 🔒 TP7: Persistencia y Conexión Segura PHP-MySQL (PDO)
- **Conexión Segura (`config/conexion.php`):** Instancia PDO con try-catch y charset `utf8mb4`[cite: 13, 14].
- **Módulo CRUD Completo (`admin/`):** Operaciones de Altas, Lecturas, Ediciones y Bajas integradas a MySQL[cite: 13, 14].
- **Seguridad Anti-SQLi:** Uso exclusivo de **Consultas Preparadas** (`PDO::prepare`)[cite: 13, 14].

---

### 🔑 TP8: Manejo de Estado, Sesiones y Autenticación de Usuarios
- **Persistencia de Sesión:** Manejo de estado con `$_SESSION` y regeneración de ID contra Session Fixation[cite: 14].
- **Módulo de Registro e Ingreso:** Hashing seguro de contraseñas con `password_hash($password, PASSWORD_BCRYPT)` y verificación con `password_verify()`[cite: 14].
- **Guardián de Rutas & Roles (`includes/auth_guard.php`):** Control de acceso a paneles protegidos (`/admin/`) por rol[cite: 14].
- **Interfaz Dinámica (`includes/header.php`):** Renderizado condicional mostrando login/registro o insignia del usuario autenticado[cite: 14].

---

### ⚡ TP9: Comunicación Asincrónica y APIs (AJAX & JSON)
- **Endpoint Backend JSON (`api/buscar_comics.php`):** Configuración de cabeceras HTTP `Content-Type: application/json`, consultas preparadas PDO con marcadores flexibles y estructuración JSON mediante `json_encode()`[cite: 1].
- **Consumo Frontend (`js/buscar_comics.js`):** Peticiones asincrónicas en tiempo real con **Fetch API** (`async/await`), manejo de errores de red con `try...catch` y técnica de debounce para optimización[cite: 1].
- **Manipulación Dinámica del DOM (`busqueda-avanzada.php`):** Inyección reactiva de tarjetas e información en pantalla sin recargar la página completa[cite: 1, 4].

---

### 🏗️ TP10: Refactorización a MVC e Introducción a Frameworks
- **Parte A (Arquitectura MVC Nativa):**
  - Refactorización modular del proyecto en `app/Models/`, `app/Views/` y `app/Controllers/`.
  - Consultas SQL seguras con PDO y Prepared Statements abstraídas en clases Modelo.
  - Implementación de Front Controller en `index.php` para el enrutamiento de peticiones (`index` y `ver`).
- **Parte B (Módulo en Framework PHP):**
  - Implementación de módulo independiente en `framework-module/` siguiendo convenciones de framework (Laravel/CodeIgniter).
  - Configuración de Routing (`routes/api.php`), Controlador (`ReporteController.php`), Modelo ORM Eloquent (`Editorial.php`) y Vista (`index.blade.php`).

## 🛠️ Tecnologías Utilizadas
- **Front-End:** HTML5, CSS3, JavaScript, Bootstrap 5.
- **Back-End:** PHP 8.x (Server-Side Includes & SSR).
- **Base de Datos:** MySQL 8.x / MariaDB (XAMPP).
- **Acceso a Datos:** PDO (PHP Data Objects) con Prepared Statements.
- **Seguridad:** Hashing Bcrypt, OWASP Top 10 (Anti-XSS y Anti-SQLi), Session Fixation Protection.
- **Control de Versiones:** Git & GitHub.