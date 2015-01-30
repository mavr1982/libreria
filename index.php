<?php 
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
<?php 
include 'funciones_libreria.php'; include 'cabecera.html';
if (isset($_SESSION['usuario']))
{
	echo "Conectado como " . $_SESSION['usuario'];
	echo "<p><a href='logout.php'><input type='button' value='Cerrar sesión'></a></p>";
}
else 
{
	echo "<p>Identifíquese para iniciar sus compras...";
	echo "<a href='login.php'><input type='button' value='Identifíquese'></a></p>";
	echo "<p>Si no está registrado aún...";
	echo "<a href='registro.php'><input type='button' value='Registrese'></a></p>";
}
if (isset($_SESSION['carro']))
{
	$carro=$_SESSION['carro'];
}
else
{
	$carro=false;
}

$sql= "select imagen,nombre,precio,codigo from catalogo";
$resultado= mysqli_query($con, $sql);
if (mysqli_num_rows($resultado)>0)
	{
		echo "<table border='1'>
		<tr>
		<th>Imagen</th>
		<th>Nombre del libro</th>
		<th>Precio</th>
		<th>Descripción</th>
		<th>Comprar</th>
		</tr>";
	
		while ($fila = mysqli_fetch_assoc($resultado))
		{
			echo	"<tr>".
					"<td>".$fila['imagen']."</td>".
					"<td>".$fila['nombre']."</td>".
					"<td>".$fila['precio']."</td>".
					"<td>	<form action='descripcion.php' method='post' name='descripcion'>
							<button name='descripcion' type='submit' value='".$fila['codigo']."'>Ver descripción</button>
							</form></td>".
					"<td>	Añadir al carrito</td></tr>";	
				
		}
		echo "</table>";
		echo "<br><form action='ofertas.php' method='post' name='ofertas'>
							<button name='ofertas' type='submit' value=''>Accede a nuestras ofertas</button>
							</form>";
	}	
	else
	{
		echo "<br><br>No hay información en la tabla.";
	}
}
?>
</body>
</html>