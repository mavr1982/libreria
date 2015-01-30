<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>Libreria ASIR2</TITLE>
</head>
<body>

<form action="confirmacion_producto.php" method="post">
	Codigo: <input type="text" name="codigo"><br>
	Nombre: <input type="text" name="nombre"><br>
	Autor: <input type="text" name="autor"><br>
	Editorial: <input type="text" name="apellido"><br>
	Descripcion: <input type="text" name="descripcion"><br>
	Precio: <input type="text" name="precio"><br>
	Oferta: <input type="text" name="oferta"><br>
	Precio rebajado: <input type="text" name="precio_rebajado"><br><br>
	<input type="submit" value="Registrar"><br>
</form>

</body>
</html>

