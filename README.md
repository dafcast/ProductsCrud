# ProductsCrud

Proyecto CRUD de productos relacionados con sus categorías en Symfony 5

# Características:

  - Se integro el freamwork boostrap 4 por medio de webpack usando un renderizado de plantillas sass
  - Se crearon la respectivas entidades con sus entidades y la relación ManyToOne de productos -> categorias
  - Base de datos utilizada Mysql
  - Se crearon Formularios agregar y editar los productos (también uno para agregar las categorías)
  - Se listaron las categorías y los productos
  - Se inactivo la validación del formulario de productos desde el formulario de HTML y toda la validación se hace desde Symfony en la propiedades de la entidad con Assert
  - Se agrego la barra de navegación en la interfaz con los respectivos botones de Bootstrap para eliminar, editar y volver a listado principal
  - Se realizo la integración del bundle Mailer (con el servidor de gmail), se creo una interfaz para listar los correos enviados asi como enviar nuevos (Para esto se creo la respectiva entidad y formulario)
