# Consumo de API, mediante MYSQL PHP LARAVEL

#Instruccion de despliegue

1. Se necesita gestor de BD mysql, en este caso se uso xampp para acceder phpmyadmin.
2. Importar BD a phpmyadmin, en el sql se encuentra la creacion de base de datos y sus respectivas tablas.
3. Descargar proyecto desde github e implementarlo en htdocs de la carpeta de xampp.
4. Se debe editar el archivo .env, para la conexion a la BD (El proyecto no trae el archivo implementado se debe crear). Se dejo archivo .dev en el zip de la BD
    4.1 EDITAR LOS CAMPOS
        DB_DATABASE=likeu
        DB_USERNAME=root
        DB_PASSWORD=
        XAMPP por defecto tiene el usuario root, sin contraseña
5. Desde la terminar de windows o la terminal de visual studio code, se debe acceder a la ruta del proyecto, ejemplo:
    cd C:\xampp\htdocs\proyecto-likeu   
6. Cuando se esté en la ruta, se debe instalar los complementos de composer(dependencias del proyecto), con el siguiente comando:
    composer install 
7. Para finalizar se inicia el proyecto, ejecutando el comando: php artisan serv
8. Para el consumo de las APIS, se utilizó POSTMAN
    8.1 En el archivo zip, se encuentra un archivo json con los archivos a implementar en postman y realizar las respectivas pruebas
    8.2 Ingresar a postman y buscar opcion "import", y seleccionar el archivo json y luego en Upload Files
    
