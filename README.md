Desarrollar un micro sitio utilizando Laravel, Jquery, Bootstrap, y MySQL el cual debe contener: <br><br>
● Autenticación básica de Laravel: posibilidad de iniciar sesión como administrador<br>
● Utilice las semillas de la base de datos para crear el primer usuario con el correo electrónico admin@admin.com y la contraseña "contraseña"<br>
● Funcionalidad CRUD (Crear / Leer / Actualizar / Eliminar) para dos elementos del menú: Empresas y Empleados.<br>
● La tabla de bases de datos de empresas consta de estos campos: Nombre (obligatorio), correo electrónico, logotipo (mínimo 100 × 100), sitio web<br>
● La tabla de la base de datos de empleados consta de estos campos: nombre (obligatorio), apellido (obligatorio), empresa (clave externa para empresas), correo electrónico, teléfono<br>
● Utilizar migraciones de base de datos para crear los esquemas anteriores<br>
● Almacene los logotipos de las empresas en storage/app/public pública y hágalos accesibles desde el público<br>
● Utilizar controladores de recursos básicos de Laravel con métodos predeterminados: indexar, crear, almacenar, etc.<br>
● Utilizar la función de validación de Laravel, usando clases de solicitud<br>
● Utilizar la paginación de Laravel para mostrar la lista de Empresas / Empleados, 10 entradas por página<br>
● Hacer una interfaz utilizando Bootstrap 4.<br>

Develop by
<h1>Cristian Membreño</h1>
<h5>cmembreno048@gmail.com</h5>
<h5>Contact: <span style="font-weight:600" > 87698166</span></h5>


<h1>Como usar</h1>
● Clonar el repositiorio <br>
● Crear base de datos con el nombre <h4><strong>db_micro_site_enterprice</strong></h4> <br>
● Ejecutar migraciones con el comando <strong> php artisan migrate --seed </strong> <br>

● Iniciar sesión con: <br> 
<strong>Usuario: admin@admin.com</strong> <br>
<strong>Contraseña: contraseña</strong>

<h5>Ejecutar el servidor con <strong>php artisan serve</strong><h5>