<?php 
//Variables del formulario de contacto 
  
@$nombre = addslashes($_POST['nombre']); 
@$correo = addslashes($_POST['correo']);
@$telefono = addslashes($_POST['empresa']);
@$mensaje = addslashes($_POST['mensaje']); 
  
  
  
//Mensaje de contacto 
$cabeceras = "From: PTNS Web\n"
 . "Reply-To: $correo\n"; 
$asunto = "Mensaje desde la página Web"; 
$email_to = "gmoreno@ptns.com.mx.com"; 
$contenido = "$nombre ha enviado un mensaje desde la web de PTNS\n"
. "\n"
. "Nombre: $nombre\n"
. "Email: $correo\n"
. "Empresa: $empresa\n"
. "Mensaje: $mensaje\n"
. "\n"; 

//Enviamos el mensaje y comprobamos el resultado
if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {

//Si el mensaje se envía muestra una confirmación
die("Gracias, su mensaje se envio correctamente.");
}else{

//Si el mensaje no se envía muestra el mensaje de error
die("Error: Su información no pudo ser enviada, intente más tarde");
}
  
?>

<script type='text/javascript'>
     self.close();
</script>
