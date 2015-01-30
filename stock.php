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
	<h3>stock de almacen:</h3>	
<?php 

$con=mysqli_connect("localhost", "root", "", "libreria");

// Chequeo el resultado
if (mysqli_connect_errno())
{
	echo "Falla la conexion a MySQL";
}else  //Si no hay error
{
	//insertavalores nuevos en la tabla
	$sql="select codigo, nombre, autor, editorial, precio, oferta, precio_rebajado, stock from catalogo";
	$resultado=mysqli_query($con, $sql);
			
			echo "<table border='1'>";
			echo "<tr>";
			echo "<th> Codigo </th>".
					"<th> Nombre </th>".
					"<th> Autor </th>".
					"<th> Editorial </th>".
					"<th> Precio </th>".
					"<th> Oferta </th>".
					"<th> Precio Rebajado </th>".
					"<th> Stock </th>";
			echo "</tr>";
			
			if (mysqli_num_rows($resultado)>0)
			{
				
				while ($fila=mysqli_fetch_assoc($resultado))
				{		
					echo "<tr>";
					echo "<td> $fila[codigo] </td>".
						"<td> $fila[nombre] </td>".
						"<td> $fila[autor] </td>".
						"<td> $fila[editorial] </td>".
						"<td> $fila[precio] </td>".
						"<td> $fila[oferta] </td>".
						"<td> $fila[precio_rebajado] </td>".
						"<td> $fila[stock] </td>";
					echo "</tr>";
				}
			}
			echo "</table>";

	// para cerrar la conexion a la BBDD
	mysqli_close($con);
}

?>

</body>
</html>
