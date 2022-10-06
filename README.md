## Instalación inicial 

Antes de inicar el proyecto es necesario realizar estas configuraciones

Comandos: 

- cp .env.example .env
- Configurar variables de conexión a base de datos DB_DATABASE,DB_USERNAME,DB_PASSWORD
- Ejecutar "npm install para" instalar dependencias node 
- Ejecutar "composer install" para instalar dependencias de Laravel
- Ejecutar "php artisan migrate" para la instalación de tablas
- Ejecutar "npm run dev" para configurar los assets de tailwind y javascripts.
- Si los test dan error , será necesario cambiar el APP_ENV=local a APP_ENV=testing 


## Tecnologias utilizadas 

- Laravel 8
- Tailwind 
- flowbite (componentes visuales)
