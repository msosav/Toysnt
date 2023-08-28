# Manual de uso

## Local

### Primer uso

1. [Instalar XAMPP](https://www.apachefriends.org/download.html)

2. En el directorio donde se instaló XAMPP, ir a la carpeta de xampp y luego a htdocs

3. En la carpeta htdocs, clonar el repositorio desde

    ```git
     https://github.com/msosav/Toysnt.git
    ```

4. En la aplicación de XAMPP:

    - Iniciar Apache
    - Iniciar MySQL

5. Abrir la carpeta del repositorio clonado en el editor de código a utilizar (si no sabes cual usar, puedes ver [como instalar VSCode](https://code.visualstudio.com/download))

6. En el editor de código, pararse en el directorio padre y crear un nuevo archivo al que se le pondrá `.env` y donde copiarás y pegaras en contenido de `.env.example`

7. Luego de haber copiado el contenido debes modificar lo que dice `DB_DATABASE=laravel` a `DB_DATABASE=toysnt`

8. Abrir la consola en el directorio del proyecto y ejecutar el siguiente comando

    ```cmd
    php composer.phar update
    ```

    Esto instalará los paquetes necesarios para que el proyecto pueda ejecutarse con normalidad

9. En la misma consola, ejecutar el siguiente comando

    ```cmd
    php artisan migrate
    ```

    Si sale un aviso que indique que la tabla toysnt no existe en la conexión mysql, lo que debes escribir es 'Si'

10. Por último, ejecutar el siguiente comando

    ```cmd
    php artisan serve
    ```

    Y luego dirígete a la dirección que este te indica ej. `http://127.0.0.1:8000`

### Uso recurrente

1. En la aplicación de XAMPP:

    - Iniciar Apache
    - Iniciar MySQL

2. Ejecutar el siguiente comando

    ```cmd
    php artisan serve
    ```
