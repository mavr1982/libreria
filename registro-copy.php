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
	$sql="insert into tabla_usuarios (usuario, password, email)" . "values ('$user', '$pass', '$mail')";
	$resultado= mysqli_query($con, $sql);
	
	if (mysqli_num_rows($resultado)<1)
	{
		echo "Usuario y/o contraseña erroneos.</br></br>";
		echo "<a href='login.php'>Volver a introducir datos.</a></br></br>";
		echo "<a href='registro.php'>Si aún no está registrado pinche aquí para hacerlo.</a></br></br>";
	}
	else
	{
		if ($user!=='administrador')
		{
			echo "Los datos son correctos.</br></br>";
			$_SESSION["usuario"]=$_POST['user'];
			echo "Bienvenido " . $_SESSION["usuario"] . "<br><br>";
			echo "<a href='index.php'>Acceda a nuestro catalogo de productos.</a></br></br>";
		}
		else
		{
			echo "Los datos son correctos.</br></br>";
			$_SESSION["usuario"]=$_POST['user'];
			echo "Bienvenido " . $_SESSION["usuario"] . "<br><br>";
			echo "<a href='pag_admin.php'>Acceda a su página de administración.</a></br></br>";
		}
	}
	
}
}
?>
</body>

</html>