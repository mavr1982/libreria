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
<?php 
// conectamos con al bbdd
$con=mysqli_connect("localhost", "root", "", "libreria");

// varibales a introducir en la bbdd pero las filtramos para que no puedan poner caracteres extraños.
$nombre=mysqli_real_escape_string($con,$_POST['nombre']);
$apellido1=mysqli_real_escape_string($con,$_POST['apellido1']);
$apellido2=mysqli_real_escape_string($con,$_POST['apellido2']);
$direccion=mysqli_real_escape_string($con,$_POST['direccion']);
$correo=mysqli_real_escape_string($con,$_POST['correo']);
$contrasena=mysqli_real_escape_string($con,$_POST['contrasena']);

// Chequeo el resultado
if (mysqli_connect_errno())
{
	echo "Falla la conexion a MySQL";
}else  //Si no hay error 
	{
		//insertavalores nuevos en la tabla
		$sql="insert into tabla_usuarios (nombre, apellido1, apellido2, direccion, correo, contrasena) " . 
		"values ('$nombre', '$apellido1', '$apellido2', '$direccion', '$correo', '$contrasena')";
		$resultado=mysqli_query($con, $sql);
		echo "Se ha registrado correctamente";
?>
		<form action="index.php">
		<input type="submit" value="Inicio">
		</form>
<?php	
	// para cerrar la conexion a la BBDD
	mysqli_close($con);
	}
?>


</body>
</html>