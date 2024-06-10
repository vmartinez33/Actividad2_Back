<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Descripción
Proyecto desarrollado con PHP más framework Laravel y base de datos MySQL. Interfaz para gestionar tu propia biblioteca de series; CRUD de actores, directores y plataformas de emisión, así como de las propias series. Versión mejorada del proyecto https://github.com/vmartinez33/PHP-CRUD_series

# Instrucciones a seguir para que el proyecto funcione

- **PASO 1** >>> composer install

- **PASO 2** >>> Crear una base de datos desde phpMyadmin con el nombre "biblioteca_series" (comprobar que la cadena de conexión sea correcta).

- **PASO 3** >>> composer dump-autoload

- **PASO 4** >>> php artisan migrate:fresh --seed
