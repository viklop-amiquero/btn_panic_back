                                APP BOTON PÁNICO BACKEND
                               --------------------------

Proyecto creado con la versión de laravel "^12.0"

Herramientas instaladas localmente:
-------------------------------------------------
> Composer version 2.8.5
> PHP version 8.4.3 
> mysql


Pasos para correr el proyecto
--------------------------------------------

1. Clonar el proyecto
2. Instalar las dependencias "composer install" 
2. Crear una conexión desde cualquier DBMS (DataGrip, Mysql Workbench), asegurarse que este corriendo localmente "mysql".
4. Crear el archivo ".env" y copiar todo de .env-example, reescribir lo siguiente:

                    ####ojo: 127.0.0.1 ó "localhost"
                    el user y password, es el usuario y contraseña de "mysql". 

                    DB_CONNECTION=mysql
                    DB_HOST=127.0.0.1 
                    DB_PORT=3306
                    DB_DATABASE=boton_panico_back
                    DB_USERNAME=root
                    DB_PASSWORD=root

5. En caso haya un error que no encuentre la base de datos "boton_panico_back", crear el "schema" de nombre "boton_panico_back" en el DBMS.
