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

<form action="confirmacion_registro.php" method="post">
	Nombre: <input type="text" name="nombre"><br>
	1º Apellido: <input type="text" name="apellido1"><br>
	2º Apellido: <input type="text" name="apellido2"><br>
	Direccion: <input type="text" name="direccion"><br>
	Correo electronico: <input type="text" name="correo"><br>
	Contraseña: <input type="password" name="contrasena"><br><br>
	<input type="submit" value="Registrarse"><br>
</form>

</body>
</html>