# SideFlip
Proyecto para la gestión de asistencia en academias de baile
#### PHP 7.0 MVC, NO FRAMEWORKS BACKEND

**Frameworks Frontend**
* <a href="https://materializecss.com">Materialize v1.0.0</a>
* <a href="https://materializecss.com">jquery-1.12.4</a>

#### SGBD: PostgreSQL v9.5

Consta de tres tipos de usuarios:

1. Asesor
2. Estudiante
3. Docente

## Asesor
+ Modificar su información y/o contraseña.
+ Puede gestionar CRUD de los roles estudiante y docente.
+ Puede gestionar CRUD de:
  - Categorias
  - Clases
  - Ritmos

## Estudiante
+ Modificar su información y/o contraseña.
+ Visualizar el historico de clases asignadas.
+ Solicitar una nueva clase.
+ Enviar mensaje a Docente (llegará a su correo electrónico).

## Docente
+ Modificar su información y/o contraseña.
+ Visualizar el historico de clases asignadas.
+ Enviar mensaje a Estudiantes (llegará a su correo electrónico).


**Dentro de la carpeta SIDEFLIP_DB** se encuentra la base de datos con todas las tablas necesarias para el proyecto
