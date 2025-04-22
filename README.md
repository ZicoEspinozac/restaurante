# Prueba Técnica – Desarrollo de Sistema CRUD

## Tecnologías
- Backend: Laravel 10+  
- Base de datos: MySQL  
- Frontend: Vue 3, Vite, Vuetify (u otro sistema de diseño)  
- Comunicación HTTP: Axios  
- (Opcional) Docker & Docker Compose  

## 1. Objetivo
Desarrollar una aplicación web para gestionar **comensales**, **reservas** y **mesas** de un restaurante con operaciones CRUD completas.  

## 2. Alcance
- CRUD de **Comensales**, **Reservas** y **Mesas** en Laravel.  
- Relaciones:  
  - Reserva ↔ Comensal  
  - Reserva ↔ Mesa  
- Interfaz en Vue 3 que consuma la API REST (`/api/*`).  
- Opcional: contenedores Docker para la app y MySQL.  
- Documentación en este README y comentarios en el código.  

## 3. Requisitos Previos
- PHP 8.1+ y Composer  
- Node.js 16+ y npm/yarn  
- MySQL 5.7+  
- (Opcional) Docker & Docker Compose  

## 4. Instalación

### 4.1 Backend (Laravel)
1. Clonar el repositorio y entrar en la carpeta del backend:  
   ```sh
   cd restaurant-crud

2. Instalar las dependencias de Laravel:  
    ```sh
    composer install
    ```

3. Copiar el archivo de configuración de entorno y configurarlo:  
    ```sh
    cp .env.example .env
    ```

4. Generar la clave de la aplicación:  
    ```sh
    php artisan key:generate
    ```

5. Configurar la base de datos en el archivo `.env`.  

6. Ejecutar las migraciones y los seeders:  
    ```sh
    php artisan migrate --seed
    ```

7. Iniciar el servidor de desarrollo:  
    ```sh
    php artisan serve
    ```

### 4.2 Frontend (Vue 3)
1. Entrar en la carpeta del frontend:  
    ```sh
    cd frontend
    ```

2. Instalar las dependencias:  
    ```sh
    npm install
    ```

3. Configurar el archivo `.env` para apuntar a la URL del backend.  

4. Iniciar el servidor de desarrollo:  
    ```sh
    npm run dev
    ```

### 4.3 (Opcional) Docker
1. Asegurarse de tener Docker y Docker Compose instalados.  

2. Construir y levantar los contenedores:  
    ```sh
    docker-compose up --build
    ```

3. Acceder a la aplicación en el navegador en `http://localhost`.  

## 5. Uso
- Acceder a la interfaz web para gestionar comensales, reservas y mesas.  
- Utilizar las operaciones CRUD desde la interfaz o mediante herramientas como Postman para probar la API REST.  

## 6. Estructura del Proyecto
- **Backend**: Carpeta `restaurant-crud` con el código de Laravel.  
- **Frontend**: Carpeta `frontend` con el código de Vue 3.  
- **Docker**: Archivos `Dockerfile` y `docker-compose.yml` para contenedores.  

## 7. Notas
- Asegurarse de que los puertos utilizados no estén ocupados por otros servicios.  
- Revisar los logs en caso de errores (`storage/logs` en Laravel y consola en Vue).  

## 8. Licencia
Este proyecto está bajo la Licencia MIT.  