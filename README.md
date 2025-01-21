<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## ACTIVIDAD 2: GUIA CONSULTAS SQL EN LARAVEL (QUERY BUILDER & ORM)

### El contenido de esta actividad está en 

```
- **app / Http / Controllers / UsuarioController.php
- **app / Models / Pedido.php
- **app / Models / Usuario.php
- **database / migrations / 2025_01_21_162418_create_usuarios_table.php
- **database / migrations / 2025_01_21_162448_create_pedidos_table.php
- **routes / web.php
- **.env
```

## Indicaciones:

1. Crea un nuevo proyecto de Laravel y configura la conexión a una base de datos.
2. Basándote en el mini diagrama de la base de datos proporcionado, crea migraciones para
las dos tablas correspondientes y ejecútalas.
3. En un controlador, desarrolla métodos para cada uno de los ejercicios propuestos.
4. Asegúrate de que cada consulta esté correctamente escrita y probada antes de continuar.
5. No es necesario implementar vistas para esta actividad; solo se requiere la lógica de las
consultas SQL.
6. Añade comentarios explicativos en el código para una mejor comprensión.
7. Deberás entregar el repositorio del proyecto en GitHub para su evaluación

## consultas SQL en laravel:

> Ejecutar ruta: http://127.0.0.1:8000/insertar-registros para insertar los registros de USUARIOS y PEDIDOS en la base de datos.

> Ejecutar ruta: http://127.0.0.1:8000/obtener-pedidos para obtener la información detallada de los pedidos, incluyendo el nombre y correo electrónico de los usuarios.

> Ejecutar ruta: http://127.0.0.1:8000/pedidos-rango para obtener todos los pedidos cuyo total esté en el rango de $100 a $250.

> Ejecutar ruta: http://127.0.0.1:8000/usuarios-letra-r para obtener todos los usuarios cuyos nombres comiencen con la letra "R".

> Ejecutar ruta: http://127.0.0.1:8000/contar-pedidos/5 para obtener el calculo total de registros en la tabla de pedidos para el usuario con ID 5.

> Ejecutar ruta: http://127.0.0.1:8000/pedidos-ordenados para obtener todos los pedidos junto con la información de los usuarios, ordenándolos de forma descendente según el total del pedido

> Ejecutar ruta: http://127.0.0.1:8000/suma-total-pedidos para obtener la suma total del campo "total" en la tabla de pedidos.

> Ejecutar ruta: http://127.0.0.1:8000/pedido-mas-economico para obtener el pedido más económico, junto con el nombre del usuario asociado.

> Ejecutar ruta: http://127.0.0.1:8000/pedidos-agrupados para obtener el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
