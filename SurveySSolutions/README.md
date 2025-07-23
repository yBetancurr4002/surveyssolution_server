# SurveySSolutions API

API desarrollada para la gestión de encuestas y sus respuestas.

---

## Descripción

SurveySSolutions es un backend RESTful construido con Laravel + MySQL para gestionar:
- Usuarios y autenticación (registro, login, logout)
- Creación y gestión de tipos de encuestas y encuestas
- Creación de preguntas y tipos de preguntas
- Respuesta a encuestas y recolección de resultados

---

## 🛠 Tecnologías

- PHP 8.2.12
- Laravel 10.x
- MySQL 8.0
- Sanctum 4.1.2
- PHPUnit 11.3

---

## Instalación

### Prerrequisitos
- PHP >= 8.1
- Composer
- MySQL
- Node.js
- Postman (opcional para pruebas)

### Pasos

1. Clona el repositorio:
```bash
git clone https://github.com/yBetancurr4002/surveyssolution_server.git
cd surveyssolutions
```

2. Instala dependencias: `composer install`
3. Copia y configura .env: `cp .env.example .env`
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=surveyssolutions
DB_USERNAME=root
DB_PASSWORD=
```

* Esto ajústalo de acuerdo a tu configuración MySql, el nombre que le des a la BD y tu usuario y contraseña para la BD.

4. Genera la clave: `php artisan key:generate`

5. Arranca el servidor: `php artisan serve`
    * Ejecutar el archivo de la BD, incluyendo los *seeders*.


## Autenticación

El API usa Laravel Sanctum.
Para obtener un token:

- `POST /api/v1/register`
- `POST /api/v1/login`

Todas las rutas protegidas requieren header: `Authorization: Bearer <token>`

## Endpoints 

A continuación comparto un acceso público hecho con **Postman**, en donde podrá observar información de ejemplo sobre la implementación manual de la API, en sus diferentes recursos.

* [Acceso aqui](https://api.postman.com/collections/27164618-36d57c5d-1532-47ce-87d7-a113d99e21ab?access_key=PMAT-01K0TESFEPMVW0NWGVA144T1FA) 👈

## Tests

Para ejecutar los tests unitarios: `php artisan test`
