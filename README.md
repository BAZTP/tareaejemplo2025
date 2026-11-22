# Empresa Tecnológica - Plataforma Web con Gestión de Productos

Sistema web dinámico desarrollado en **PHP** y **MySQL** para una empresa de servicios tecnológicos. La plataforma cuenta con catálogo interactivo de servicios, cotizador, formulario de contacto, sistema de autenticación de usuarios y un panel administrativo (Dashboard) con operaciones CRUD para productos.

---

## 🚀 Características y Módulos

- **Página de Inicio (`index.php`):**
  - Carrusel interactivo y catálogo visual de servicios tecnológicos (Finanzas, Ciberseguridad/DDoS, IaaS, Redes WLAN/Smart WiFi).
  - Tabla dinámica de cotización de servicios.
  - Barra de navegación responsiva con Bootstrap 5.

- **Formulario de Contacto (`contacto.php`):**
  - Envío y almacenamiento de mensajes de clientes en la base de datos.
  - Validación de campos en tiempo real mediante JavaScript (`app.js`).

- **Autenticación de Usuarios (`login.php` y `registro.php`):**
  - Registro de nuevas cuentas con validación de correo existente.
  - Inicio de sesión con gestión de sesiones PHP (`$_SESSION`).

- **Panel de Administración (`dashboard.php`):**
  - Acceso restringido para usuarios autenticados.
  - **CRUD completo de productos:**
    - **Crear:** Registro de nuevos servicios/productos con precio y descripción.
    - **Leer:** Listado tabular de todos los productos almacenados.
    - **Actualizar:** Modificación de datos existentes.
    - **Eliminar:** Borrado de registros.
  - Cierre seguro de sesión (`logout`).

---

## 🛠️ Tecnologías Utilizadas

- **Backend:** PHP 7.4+ / 8.x
- **Base de Datos:** MySQL / MariaDB
- **Frontend:** HTML5, CSS3, JavaScript
- **Framework UI:** Bootstrap 5 (CDN)
- **Entorno de desarrollo:** XAMPP (Apache + MySQL)

---

## 📂 Estructura del Proyecto

```plaintext
tareaejemplo/
├── app.js             # Validaciones frontend para el formulario de contacto
├── contacto.php       # Página y gestión de mensajes de contacto
├── dashboard.php      # Panel de administración (CRUD de productos)
├── db.php             # Archivo de conexión a MySQL mediante mysqli
├── functions.php      # Funciones CRUD y validaciones de usuario
├── index.php          # Página principal con catálogo y cotizador
├── login.php          # Formulario e inicio de sesión
├── registro.php       # Formulario y creación de cuentas
├── scrip.sql          # Script DDL/DML de la base de datos (empresa)
├── style.css          # Estilos personalizados adicionales
├── README.md          # Documentación del proyecto
└── *.jpg / *.webp     # Recursos gráficos y multimedia del sitio
```

---

## ⚙️ Requisitos Previos

- [XAMPP](https://www.apachefriends.org/) (o WampServer / LAMP) con:
  - Servidor web **Apache**
  - Servidor de base de datos **MySQL / MariaDB**
  - **PHP** 7.4 o superior
- Navegador web moderno (Chrome, Firefox, Edge, etc.)
- Git instalado en el sistema

---

## 📥 Instalación y Puesta en Marcha

### 1. Clonar el repositorio
Ubícate en la carpeta `htdocs` de tu instalación de XAMPP (usualmente `C:\xampp\htdocs\`) y clona este repositorio:

```bash
cd C:\xampp\htdocs
git clone https://github.com/BAZTP/tareaejemplo2025.git
```

### 2. Configurar la Base de Datos
1. Abre el panel de control de **XAMPP** e inicia los servicios de **Apache** y **MySQL**.
2. Ingresa a **phpMyAdmin** desde tu navegador: [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. Crea una nueva base de datos llamada `empresa` (o ejecuta directamente el script).
4. Ve a la pestaña **Importar** y selecciona el archivo [`scrip.sql`](file:///c:/xampp/htdocs/tareaejemplo/scrip.sql) incluido en el proyecto, o copia y ejecuta su contenido en la pestaña **SQL**.

### 3. Verificar Parámetros de Conexión
Revisa el archivo [`db.php`](file:///c:/xampp/htdocs/tareaejemplo/db.php) y asegúrate de que coincida con tus credenciales locales de MySQL:

```php
$servername = "localhost";
$username = "root";
$password = ""; // Contraseña vacía por defecto en XAMPP
$dbname = "empresa";
```

### 4. Ejecutar el Proyecto
Abre tu navegador e ingresa a:

```text
http://localhost/tareaejemplo
```

---

## 👤 Credenciales de Prueba

El script inicial `scrip.sql` incluye usuarios preconfigurados para probar el inicio de sesión:

| Correo Electrónico | Contraseña |
|---|---|
| `bryan@tecno.com` | `Admin` |
| `ale@tecno.com` | `Admin` |

También puedes registrar nuevos usuarios directamente desde [`registro.php`](file:///c:/xampp/htdocs/tareaejemplo/registro.php).

---

## 📄 Licencia

Este proyecto fue desarrollado con fines educativos y de demostración técnica.
