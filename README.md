# Proyecto de Películas y Series

Este proyecto está desarrollado con Laravel y permite gestionar información sobre películas y series.

## Requisitos

- PHP >= 8.1
- Composer
- Base de datos (MySQL, PostgreSQL, etc.)
- Servidor web (Apache, Nginx)

## Instalación

1. Clona el repositorio:
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd peliculas-y-series
   ```

2. Instala las dependencias:
   ```bash
   composer install
   ```

3. Copia el archivo `.env.example` a `.env` y configura las variables de entorno:
   ```bash
   cp .env.example .env
   ```

4. Genera la clave de aplicación:
   ```bash
   php artisan key:generate
   ```

5. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

6. Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

## Uso

Una vez instalado, puedes acceder a la aplicación en tu navegador a través de `http://localhost:8000`.

## Contribuciones

Las contribuciones son bienvenidas. Por favor, lee las [guías de contribución](CONTRIBUTING.md) antes de enviar un pull request.

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](LICENSE.md).
