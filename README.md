# BOTON_PANICO_BACK

Proyecto desarrollado con Laravel **^12.0**.

## Requisitos previos

Asegúrate de tener las siguientes herramientas instaladas en tu entorno de desarrollo:

- **Composer**: Versión 2.8.5
- **PHP**: Versión 8.4.3
- **MySQL** (o MariaDB) en ejecución localmente

## Instalación y configuración

Sigue estos pasos para configurar y ejecutar el proyecto:

### 1. Clonar el repositorio
```bash
git clone https://github.com/viklop-amiquero/btn_panic_back
cd boton_panico_back

2. Instalar dependencias

composer install

3. Configurar la base de datos
    1. Asegúrate de que MySQL esté en ejecución localmente.
    2. Conéctate a MySQL desde un cliente DBMS (DataGrip, MySQL Workbench, etc.).
    3. Crea una nueva base de datos con el nombre boton_panico_back si no existe:

    CREATE DATABASE boton_panico_back;

4. Copia el archivo de entorno de ejemplo y ajústalo según tu configuración:
    cp .env.example .env

5. Modifica el archivo .env con las credenciales de tu base de datos:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1  # Puedes usar "localhost"
    DB_PORT=3306
    DB_DATABASE=boton_panico_back   
    DB_USERNAME=root   # Reemplaza con tu usuario de MySQL
    DB_PASSWORD=root   # Reemplaza con tu contraseña de MySQL

4. Ejecutar migraciones
    php artisan migrate

5. Levantar el servidor de desarrollo
    php artisan serve


Solución de problemas
    .Error: "Base de datos app_pedidos no encontrada"

    .Verifica que el archivo .env tiene el nombre correcto de la base de datos (boton_panico_back).
    .Si persiste, elimina el caché de configuración
    
    php artisan config:clear
    php artisan cache:clear


Developed by: Victor López
Repositorio en GitHub: https://github.com/viklop-amiquero/btn_panic_back

