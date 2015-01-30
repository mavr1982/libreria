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
include 'cabecera.html';
?>
<h3>Insertar un producto</h3>

<form action="insertar_producto.php">
	<input type="submit" value="Insertar">
</form>

<h3>Ventas realizada</h3>

<form action="consultar_ventas.php">
	<input type="submit" value="Consultar ventas">
</form>

<h3>Stock</h3> 
		
<form action="stock.php">
	<input type="submit" value="Consultar stock">
</form>

</body>
</html>
