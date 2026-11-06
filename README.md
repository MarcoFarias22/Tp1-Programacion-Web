
# 📚 CÓMIC HUB - Portal de Cómics y Comunidad

Portal web interactivo para fanáticos y coleccionistas de cómics (Marvel, DC Comics y más), diseñado para organizar cronologías de lectura, explorar catálogos editoriales, gestionar colecciones y debatir en comunidad.

---

## 🎨 Diseño y Prototipado (TP1)
- **Prototipo Interactivo en Figma:** [Ver Prototipo en Figma](https://www.figma.com/design/5BKQgl8KkOb1KteYsUIHvK/Comic-Hub?node-id=0-1&p=f&t=dIOoDC4gvRuB2X9w-0)
- **Bocetos e Historias de Usuario:** Definición de wireframes, arquitectura de la información y requerimientos iniciales.

---

## 🚀 Historial de Evolución del Proyecto (TP1 - TP10)

### 💻 TP2 y TP3: Maquetación Front-End, Bootstrap 5 y Git Workflow
- **Tecnologías:** HTML5 semántico, CSS3 y Bootstrap 5.
- **Estructura:** Maquetación responsiva de las vistas principales del sistema (`index.html`, `personajes.html`, `cronologias.html`, `busqueda-avanzada.html`, `foro.html`, `detalle-hilo.html`, `detalle.html`, `detalle-personaje.html`, `acerca-de.html`).
- **Control de Versiones:** Flujo Git basado en ramas `feature/`, Pull Requests y merges hacia `main`.
- **Auditoría de Calidad:** Evaluación de accesibilidad (A11y), SEO y semántica mediante **Lighthouse** (documentada en `AUDITORIA.md`).

---

### ⚙️ TP4: Migración a Backend en PHP & Modularización SSI (Server Side Includes)
- **Entorno:** Servidor local Apache en XAMPP (`htdocs/COMIC-HUB/`).
- **Migración a PHP:** Conversión de archivos estáticos `.html` a páginas dinámicas `.php`.
- **Arquitectura SSI:** Extracción de componentes reutilizables a la carpeta `/includes/` (`header.php`, `nav.php`, `footer.php`).
- **Server-Side Rendering (SSR Básico):** Gestión de la variable `$titulo_pagina` para personalizar dinámicamente la etiqueta `<title>` de cada vista.

---

### 🛡️ TP5: Procesamiento de Formularios y Seguridad Web (OWASP Top 10)
- **Procesamiento HTTP:** Captura por `POST` (`acerca-de.php`) y filtros `GET` (`busqueda-avanzada.php`).
- **Seguridad OWASP (Anti-XSS):** Helper de sanitización en `includes/functions.php` con `htmlspecialchars()`, `trim()` y `stripslashes()`.
- **Persistencia & UX:** Retención de datos ingresados ante errores y mensajes de retroalimentación dinámicos.

---

### 🗄️ TP6: Diseño y Normalización del Esquema Relacional en MySQL
- **Normalización Aplicada (3FN):** Descomposición relacional documentada en `tp6/NORMALIZACION.md`.
- **Scripts DDL/DML:** Creación de la BD `comic_hub_db` (`tp6/schema.sql`) con PK, FK e índices explícitos, más consultas de prueba CRUD (`tp6/consultas.sql`).

---

### 🔒 TP7: Persistencia y Conexión Segura PHP-MySQL (PDO)
- **Conexión Segura (`config/conexion.php`):** Instancia PDO con try-catch y charset `utf8mb4`.
- **Módulo CRUD Completo (`admin/`):** Operaciones de Altas, Lecturas, Ediciones y Bajas integradas a MySQL.
- **Seguridad Anti-SQLi:** Uso exclusivo de **Consultas Preparadas** (`PDO::prepare`).

---

### 🔑 TP8: Manejo de Estado, Sesiones y Autenticación de Usuarios
- **Persistencia de Sesión:** Manejo de estado con `$_SESSION` y regeneración de ID contra Session Fixation.
- **Módulo de Registro e Ingreso:** Hashing seguro de contraseñas con `password_hash($password, PASSWORD_BCRYPT)` y verificación con `password_verify()`.
- **Guardián de Rutas & Roles (`includes/auth_guard.php`):** Control de acceso a paneles protegidos (`/admin/`) por rol.
- **Interfaz Dinámica (`includes/header.php`):** Renderizado condicional mostrando login/registro o insignia del usuario autenticado.

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

---

## 🛠️ Instrucciones de Instalación y Ejecución Local

Sigue estos pasos para clonar el repositorio y ejecutar la aplicación en un servidor local utilizando **XAMPP** 

### 📋 Requisitos Previos
- Tener instalado [Git](https://git-scm.com/).
- Tener instalado un servidor local con soporte PHP 8.x y MySQL (ej. [XAMPP](https://www.apachefriends.org/))

---

### 🚀 Pasos de Instalación

1. **Clonar el Repositorio:**
   Abre la terminal de comandos e ingresa al directorio raíz de tu servidor local (`htdocs` en XAMPP) y clona el proyecto:
   ```bash
   cd C:/xampp/htdocs
   git clone [https://github.com/MarcoFarias22/Tp1-Programacion-Web.git](https://github.com/MarcoFarias22/Tp1-Programacion-Web.git) COMIC-HUB

```

2. **Acceder a la Carpeta del Proyecto:**

```bash
cd COMIC-HUB

```


3. **Configurar el Archivo de Variables de Entorno (`.env`):**
Crea una copia del archivo de ejemplo `.env.example` y renómbralo a `.env`:
* En Windows (PowerShell/CMD):
```cmd
copy .env.example .env

```


* O crea manualmente el archivo `.env` en la raíz con la siguiente configuración:
```ini
APP_NAME="CÓMIC HUB"
APP_ENV=local
APP_URL=http://localhost/COMIC-HUB

DB_HOST=localhost
DB_NAME=comic_hub_db
DB_USER=root
DB_PASS=

```




4. **Iniciar el Servidor Local:**
* Abre el **XAMPP Control Panel**.
* Inicia los servicios de **Apache** y **MySQL** (ambos deben figurar en verde).


5. **Importar la Base de Datos en MySQL:**
* Inicia sesión en **phpMyAdmin** desde tu navegador: `http://localhost/phpmyadmin/`.
* Crea una nueva base de datos llamada `comic_hub_db`.
* Selecciona la base de datos e importa los scripts SQL presentes en el proyecto (`tp6/schema.sql` y `tp6/consultas.sql`).


6. **Ejecutar la Aplicación en el Navegador:**
Abre tu navegador e ingresa a la siguiente URL:
```text
http://localhost/COMIC-HUB/index.php

```



---

## 🛠️ Tecnologías Utilizadas

* **Front-End:** HTML5, CSS3, JavaScript (Fetch API / Async-Await), Bootstrap 5.
* **Back-End:** PHP 8.x (Server-Side Includes, SSR y Arquitectura MVC Nativa).
* **Base de Datos:** MySQL 8.x / MariaDB (XAMPP).
* **Acceso a Datos:** PDO (PHP Data Objects) con Prepared Statements y Eloquent ORM.
* **Seguridad:** Hashing Bcrypt, OWASP Top 10 (Anti-XSS y Anti-SQLi), Session Fixation Protection.
* **Control de Versiones:** Git & GitHub.
