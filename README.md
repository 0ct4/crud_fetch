📦 Sistema CRUD de Productos con PHP y Fetch API

📋 Descripción
Sistema web para la gestión de productos. Permite realizar operaciones CRUD (Crear, Leer, Actualizar, Buscar) utilizando PHP con programación orientada a objetos y Fetch API para peticiones asíncronas.

🚀 Características
- ✅ **CRUD Completo**: Crear, listar, editar y buscar productos
- 🎨 **Interfaz moderna**: Diseño responsivo con Bootstrap
- ⚡ **Comunicación asíncrona**: Uso de Fetch API
- 🛡️ **Seguridad**: Consultas preparadas con PDO
- 📱 **Responsive**: Compatible con dispositivos móviles
- 🔔 **Notificaciones**: Alertas con SweetAlert2

🛠️ Tecnologías Utilizadas
- Frontend: HTML5, Bootstrap, JavaScript (Fetch API)
- Backend: PHP, PDO (PHP Data Objects)
- Base de datos: MySQL
- Librerías: SweetAlert2 para notificaciones

📁 Estructura del Proyecto

crud-productos/
│
├── index.php          //Interfaz principal del sistema
├── conexion.php       //Clase de conexión a la base de datos
├── registrar.php      //Procesa guardar y actualizar productos
├── listar.php         //Lista y busca productos
├── editar.php         //Obtiene datos de producto para editar
├── script.js          //Lógica JavaScript con Fetch API
├── estilos.css        //Estilos personalizados
├── crud.sql           //Script de la base de datos
└── README.md          //Este archivo

⚙️Configuración

Prerrequisitos
- Servidor web (WAMPSERVER)
- PHP
- MySQL
- Navegador cualquiera

🎯 Funcionalidades

➕ Agregar Producto
1. Completar formulario con código, producto, precio y cantidad
2. Hacer clic en "Registrar"
3. Confirmación con SweetAlert2

✏️ Editar Producto
1. Hacer clic en "Editar" en la tabla de productos
2. Los datos se cargan automáticamente en el formulario
3. El botón cambia a "Actualizar"
4. Hacer clic para guardar cambios

🔍 Buscar Productos
- Escribir en el campo de búsqueda para filtrar productos
- Búsqueda en tiempo real por ID, producto o precio

📊 Estructura de la Base de Datos
Tabla: productos
| Campo    | Tipo         | Descripción               |
|----------|--------------|---------------------------|
| id       | INT          | Clave primaria autoincrementar |
| código   | VARCHAR(20)  | Código del producto       |
| producto | VARCHAR(100) | Nombre/descripción        |
| precio   | DECIMAL(10,2)| Precio unitario           |
| cantidad | INT          | Stock disponible          |

🔧 Archivos Principales

conexion.php
- Maneja la conexión a MySQL usando PDO
- Implementa consultas preparadas para seguridad

registrar.php
- Procesa tanto inserción como actualización
- Usa `$_POST['idp']` para determinar la acción

script.js
- Maneja eventos del formulario y tabla
- Implementa Fetch API para comunicación asíncrona
- Usa SweetAlert2 para feedback al usuario


Universidad Tecnológica
Facultad de Ingeniería en Sistemas
Ingeniería Web - II Semestre 2025  
Instructor: Ing. Irina Fong

👥 Autores
- Frauca, Octavio 8-1010-1989
- Carrion, Arelys 8-994-1678

📝 Notas del Trabajo
- Desarrollado como práctica de laboratorio
- Implementa buenas prácticas de programación
- Código documentado y estructurado
- Compatible con estándares web modernos