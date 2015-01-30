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
$codigo=mysqli_real_escape_string($con,$_POST['codigo']);
$nombre=mysqli_real_escape_string($con,$_POST['nombre']);
$autor=mysqli_real_escape_string($con,$_POST['autor']);
$editorial=mysqli_real_escape_string($con,$_POST['editorial']);
$descripcion=mysqli_real_escape_string($con,$_POST['descripcion']);
$precio=mysqli_real_escape_string($con,$_POST['precio']);
$oferta=mysqli_real_escape_string($con,$_POST['oferta']);
$precio_rebajado=mysqli_real_escape_string($con,$_POST['precio_rebajado']);

// Chequeo el resultado
if (mysqli_connect_errno())
{
	echo "Falla la conexion a MySQL";
}else  //Si no hay error 
	{
		//insertavalores nuevos en la tabla
		$sql="insert into productos (codigo, nombre, autor, editorial, descripcion, precio, oferta, precio_rebajado) " . 
		"values ('$codigo', '$nombre', '$autor', '$editorial', '$descripcion', '$precio', '$oferta', '$precio_rebajado')";
		$resultado=mysqli_query($con, $sql);
		echo "Los datos han sido actualizados";
		
		echo "<table border='1'>";
		echo "<tr>";
			echo "<th> Codigo </th>".
			"<th> Nombre </th>".
			"<th> Autor </th>".
			"<th> Editorial </th>".
			"<th> Descripcion </th>".
			"<th> Precio </th>".
			"<th> Oferta </th>".
			"<th> Precio Rebajado </th>";
		echo "</tr>";
		echo "<tr>";
			echo "<td> $codigo </td>".
			"<td> $nombre </td>".
			"<td> $autor </td>".
			"<td> $editorial </td>".
			"<td> $descripcion </td>".
			"<td> $precio </td>".
			"<td> $oferta </td>".
			"<td> $precio_rebajado </td>";
		echo "</tr>";
		
		echo "</table>";
		
	// para cerrar la conexion a la BBDD
	mysqli_close($con);
	}
?>


</body>
</html>
