<?php 
//Creamos la sesión
session_start();
$con=mysqli_connect("localhost","vendedor","Admin1234","libreria");
if (mysqli_connect_error())
{
	echo "Fallo al conectar con mySql: " . mysqli_connect_error();
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>Libreria ASIR2</TITLE>
</head>
<body>

<h1>Registrese en nuestra tienda</h1>
<?php 

if ((empty($_POST)) || (!isset($_POST)))
{
?>
<form action="registro.php" method="post">
	<label for='user'>Introduzca su nombre de usuario</label>
	<input type="text" name='user'/><br><br>
	<label for='pass'>Introduzca su contraseña</label>
	<input type="password" name='pass'/><br><br>
	<label for='mail'>Introduzca su correo electrónico</label>
	<input type="email" name='mail'/><br><br>
	<p><input type="submit" value="Validar datos"></p>
</form>
<?php 
}
else 
{
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$mail=$_POST['mail'];
	$subject= "Usuario registrado";
	$message= "Se ha registrado como cliente en nuestra base de datos.";
	$sql="insert into usuarios (usuario, password, email)" . "values ('$user', '$pass', '$mail')";
	$resultado= mysqli_query($con, $sql);
	mail($mail, $subject, $message);
	echo "Nuevo registro introducido.<br><br>";
	echo "<a href='login.php'>Identifiquese para iniciar su compra.</a></br></br>";
	
	mysqli_close($con);
}
}
?>
</body>
</html>