<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Generador de ordenes de compra</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<div class="contenedor" >
<body>
	
	<?php
	
	function r()
	{
	
	$pzas=pzas;
		
		
	
	}
	?>
	
	
	

<div class="cabecera">
	
	<p>Cabecera</p>
	
	</div>
	
	
	
	
		
<div class="margen">
	<p>margen</p>
	</div>
	
	<div class="cuerpo">
	
	<p>Cuerpo</p>
		
    <form id="form1" name="form1" method="post">
		
		<div class="fecha">
		<label>Fecha: </label>
		<input type="date">
		<label>Cliente: </label>
		<input type="text">
		<label>Direccion: </label>
		<input type="text">
		<label>Telefono: </label>
		<input type="text">
		<label>Contacto: </label>
		<input type="text">
		</div>
		
		
		<div class="producto">
			
		<label id="pzas"> Piezas:</label>	
		<input type="text" style="width:20px;">
		
		<label>Producto: </label>
     	<input type="text">
			
		<label>Costo base: </label>
			
	
		<input type="text" style="width: 50px;" id="es" value="<?php echo $pzas ?>">
		
	
			
		</div>	
		
		<div class="tabla">
		
		<table width="100%" border="1">
  <tbody>
    <tr>
      <th scope="col">Piezas</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Costo Unitario</th>
      <th scope="col">Total</th>
    </tr>
	<tr>
		<th scope="col"><label></label></th>
      <th scope="col"><label></label></th>
      <th scope="col"><label></label></th>
      <th scope="col"><label></label></th>
	</tr>
  </tbody>
</table>
</div>
			
		<div class="enviar">	
		<input type="submit">
		</div>
		
		
		<div class="agregar">
			
			
		<input type="submit" value="Agregar" onClick="r();">
			
			
			
		</div>
    </form>
		
		
		
		
		
</div>
</body>
</div>
</html>