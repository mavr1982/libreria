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
include 'funciones_libreria.php';
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
$con=mysqli_connect("localhost","vendedor","Admin1234","libreria");
if (mysqli_connect_error())
{
	echo "Fallo al conectar con mySql: " . mysqli_connect_error();
}

else 
{

$sql= "select * from catalogo where oferta=1";
$resultado= mysqli_query($con, $sql);
	 
	if (mysqli_num_rows($resultado)>0)
	{
		echo "<table border='1'>
		<tr>
		<th>Imagen</th>
		<th>Código</th>
		<th>Nombre del libro</th>
		<th>Autor</th>
		<th>Editorial</th>
		<th>Descripción</th>
		<th>Precio original</th>
		<th>Precio en rebajas</th>
		<th>Disponibilidad</th>
		</tr>";
	
		while ($fila = mysqli_fetch_assoc($resultado))
		{
			$stock=$fila['stock'];
			$disp=disponibilidad($stock);
			echo	"<tr>".
					"<td>".$fila['imagen']."</td>".
					"<td>".$fila['codigo']."</td>".
					"<td>".$fila['nombre']."</td>".
					"<td>".$fila['autor']."</td>".
					"<td>".$fila['editorial']."</td>".
					"<td>".$fila['descripcion']."</td>".
					"<td>".$fila['precio']."</td>".
					"<td>".$fila['precio_rebajado']."</td><td>".
					$disp . "</td></tr>";
		}
		echo "</table>";
		echo 	"<form action='index.php' method='post' name='comprar'>
				<button name='volver' type='submit' value='".$fila['codigo']."'>Volver al inicio</button>
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