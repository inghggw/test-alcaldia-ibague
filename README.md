## Requerimientos para Laravel 11:

* Php v.8.2
* Npm v.8
* Composer v.2.4.4
* MySQL 8  o MariaDB 10.6

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>

## Pasos iniciales:

-   Cambiar variables de conexión MySQL o MariaDB en el archivo `/.env`

-   Ejecutar script `DATABASE.sql` en el mysql local para crear la base de datos.

-   Descargar las dependencias con el comando:

    -   `composer install`

-   Ejecutar las migraciones y seeds:

    -   `php artisan migrate:fresh --seed`

-   Descargar dependencias node:

    -   `npm install`

-   Compilar el front:

    -   `npm run build`

-   Iniciar el server local:

    -   `php artisan serve`

-   En el navegador ingresar a la url:
    -   `http://localhost:8000`

-   Se puede registrar o usar este usuario de prueba:
    -   Correo: admin@mail.com
    -   Contraseña: 12345678
---

### Herramientas aplicadas:

    - Autenticación con Breeze.
    - FrontEnd con Livewire y Tailwind.
    - Paquete de i18n para multilenguaje.
    - Paquete Datatables (RappaSoft) para Livewire.
    - Paquete Fontawesome para los iconos.
    - Factorys para crear data fake y ver la páginación en Departamentos.

### Pruebas unitarias:

    - Ejecutar las pruebas unitarias: php artisan test
    - Se realizaron 35 test y 126 assertions.
  - [Screenshot from 2024-05-23 00-04-38](https://github.com/inghggw/test-alcaldia-ibague/assets/5940404/ddd8474f-5c70-4411-b7cf-38c8630f50dd)

### Demo:

[demo.webm](https://github.com/inghggw/test-alcaldia-ibague/assets/5940404/33c0b424-1e0a-40f0-a9da-d87b40a8570b)

## Autor

-   Mg. Henry Giovanny Gonzalez Waltero.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
