# Descripción del Proyecto

El objetivo de este proyecto es desarrollar una aplicación web para el manejo de gastos e ingresos personales. La aplicación permitirá a los usuarios registrar sus gastos e ingresos, visualizar el estado actual de su cuenta y realizar operaciones CRUD sobre sus registros. Este proyecto se implementará utilizando el framework Laravel 10 y se integrará con SB Admin 2 para una interfaz de usuario amigable.

## Requisitos y Características

### Requisitos Técnicos

- **Instalación y Configuración de Laravel 10:** Configurar un proyecto Laravel 10 con las dependencias necesarias.
- **Repositorio Git:** Inicializar un repositorio Git para el manejo de versiones del proyecto.
- **Instalación de SB Admin 2:** Integrar la plantilla de administración SB Admin 2 con Laravel para la interfaz de usuario.

### Características de la Aplicación

- **Registro de Usuarios:** Los usuarios podrán registrarse proporcionando su nombre, apellido, email, teléfono y dirección.
- **Ingreso de Gastos e Ingresos:** Los usuarios podrán registrar la fecha, concepto y monto de sus gastos e ingresos.
- **Operaciones CRUD:** La aplicación ofrecerá funcionalidades CRUD (Crear, Leer, Actualizar, Eliminar) para manejar los registros de gastos e ingresos.
- **Validación de Datos:** Se validarán los datos ingresados para asegurar que sean del tipo correcto y se mostrarán mensajes de error en caso de datos incorrectos.

## Funcionalidades Adicionales (Extras)

- **Encriptación de Datos:** Considerar la encriptación de datos sensibles como el email y teléfono del usuario.
- **Niveles de Acceso:** Implementar diferentes niveles de acceso para los usuarios.
- **Filtrado de Registros:** Ofrecer opciones de filtrado para los registros de gastos e ingresos.

## Implementación Adicional

- **Integración con DataTables:** Utilizar la librería DataTables para mejorar la visualización y manejo de los registros de gastos e ingresos.

## Lógica de Implementación

La lógica principal de la aplicación consistirá en la gestión de usuarios y sus registros de gastos e ingresos. Se utilizarán controladores de Laravel para manejar las operaciones CRUD y se implementarán validaciones para asegurar la integridad de los datos. La interfaz de usuario se diseñará con SB Admin 2 y se mejorará la experiencia de usuario con funcionalidades adicionales como encriptación de datos, niveles de acceso y filtrado de registros.


## Requisitos

- PHP >= 8.1
- Composer
- Servidor MySQL o equivalente

## Instalación

```bash
1. Clonar el repositorio

    git clone https://github.com/cristhiankelm/technical_challenge

    cd technical_challenge

2. Instalar las dependencias de Composer

    composer install

3. Configurar el entorno

    Copia el archivo .env.example a .env:

    cp .env.example .env

    Edita el archivo .env y configura las variables de entorno, especialmente las relacionadas con la conexión a la base de datos (DB_*).

4. Generar la clave de la aplicación

    php artisan key:generate

5. Ejecutar las migraciones

    php artisan migrate --seed

6. Iniciar el servidor de desarrollo

    php artisan serve

Accede a la aplicación en http://localhost:8000.
