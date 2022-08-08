<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Instrucciones a seguir para que el proyecto funcione

- **PASO 1** >>> composer create-project --prefer-dist laravel/laravel biblioteca "6.*" (Se necesita php 7, el 8 no funciona con laravel 6)

- **PASO 2** >>> borrar todos los archivos del proyecto menos el directorio "vendor"; poner los archivos adjuntados en la entrega.

- **PASO 3** >>> composer require laravel/ui "^1.0" --dev

- **PASO 4** >>> Crear una base de datos desde phpMyadmin con el nombre biblioteca_series (comprobar que se puede realizar la conexión o si se debe de cambiar el puerto).

- **PASO 5** >>> php artisan migrate