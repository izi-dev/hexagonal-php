#PRUEBAS EDIFICIOS WAYNE

##REQUISITOS
- PHP 8.0
- Mysql
- Composer

##INSTALACION

- `composer install`
- Crear tabla en mysql
- Configurar BD en `/Config/database.php`
- Ejecutar comando `php -S localhost:8000`
- Collect de postman en el archivo `/postman.json`
- Csv de ejemplos : `/playes.csv` y `/teams.csv`

##ARQUITECTURA API

Este proyecto no es recomendado para ambientes productivos, ya que solamente fue realizado para la prueba.

Realice mi propio microframework para la api con solamente los componentes que se iba a necesitar para la prueba.

El microframework contiene

- Rutas
- Controladores
- Ioc
- Database

Al momento de iniciar el proyecto, este ejecuta las migraciones de manera Automatica.

##ARQUITECTURA HEXAGONAL
- SOLID
- IOC
- CAPA DOMAIN
- VALUE OBJECT
- AGGRETE ROOT
- CAPA APP
- CAPA INFRASTRUCTURA


