<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<TITLE>Libreria ASIR2</TITLE>
</head>
<body>

<?php 

$con=mysqli_connect("localhost","vendedor","Admin1234","libreria");
if (mysqli_connect_error())
{
	echo "Fallo al conectar con mySql: " . mysqli_connect_error();
}

else 
{
$sql= "select imagen,nombre,precio from catalogo";
$resultado= mysqli_query($con, $sql);
	 
	if (mysqli_num_rows($resultado)>0)
	{
		echo "<table border='1'>
		<tr>
		<th>Imagen</th>
		<th>Nombre del libro</th>
		<th>Autor</th>
		<th>Editorial</th>
		<th>Descripción</th>
		<th>Precio</th>
		<th>¿Está en oferta?</th>
		<th>Disponibilidad</th>
		</tr>";
	
		while ($fila = mysqli_fetch_assoc($resultado))
		{
			
			echo	"<tr>".
					"<td>".$fila['imagen']."</td>".
					"<td>".$fila['nombre']."</td>".
					"<td>".$fila['autor']."</td>".
					"<td>".$fila['editorial']."</td>".
					"<td>".$fila['descripcion']."</td>".
					"<td>".$fila['precio']."</td>".
					"<td>".$fila['oferta']."</td>".
					"<td>".$fila['stock']."</td></tr>";
		}
		echo "</table>";
	}	
	else
	{
		echo "<br><br>No hay información en la tabla.";
	}
}

?>
</body>

</html>