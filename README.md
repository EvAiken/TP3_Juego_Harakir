# TP3_Juego_Harakir
App creada como integracion de los modulos DIW,DWC,DAW y DWS

# Archivos a tener en cuenta:

- En config/database.php se ha configurado la BD
- En config/config.php Se ha configurado la base_url con la ip del servidor de amazon en el que alojamos la aplicacion.
- En views/pages estan las vistas de login (formulario de entrada), ranking y el juego en si.
- El controlador unico, llamado LoginController es el que gestiona la aplicacion una vez se acceda al index de nuestra aplicacion. Solo tiene un metodo llamado view que hace que, dependiendo de los request o post llame al modelo o redireccione a una pagina en concreto.
- El modelo Login_model, es llamado por el controlador y accede a los metodos que son : 
	- getUsuarios devuelve a los 10 usuarios con mejores puntuaciones (ranking).
	- buscar_usuario, consigue los datos de un usuario concreto y si no existe lo inserta en la base de datos y recoge sus datos para mandarlo al cliente (juegos.php) .
	- actualizar_usuario, para guardar actualizar los datos de los usuarios.

- Ademas hay archivo llamado servicePalabras.php que accede a la base de datos de palabras y lo manda al cliente en formato json.
 - Necesita BD usuarios(id,nombre,puntos,role) y palabras(id,inicial,palabra,pista)
