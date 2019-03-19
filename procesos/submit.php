<?php 
if (isset($_POST['submit'])) {
	
	if (empty($_POST['nombre'])) {
		header("Location: ../contacto.html?nombre-requerido");
	}

	if (empty($_POST['email'])) {
		header("Location: ../contacto.html?email-requerido");
	}


	if (empty($_POST['tel'])) {
		header("Location: ../contacto.html?telefono-requerido");
	}

	if (empty($_POST['mensaje'])) {
		header("Location: ../contacto.html?mensaje-requerido");
	}
	// Información del formulario
	$info['nombre'] = $_POST['nombre'];
	$info['email'] = $_POST['email'];
	$info['tel'] = $_POST['tel'];
	$info['mensaje'] = $_POST['mensaje'];
	$info['ip'] = $_SERVER['REMOTE_ADDR'];
	$info['fecha'] = date('d M Y h:m:s');

	// Remitente y destinatario
	$para = "hellow@joystick.com.mx";
	// Debe ser un email del servidor local
	$de = $para;

	// Asunto del mensaje
	$asunto = 'Nuevo mensaje - Blackparadox';

	// Cabeceras que aparecen en la parte superior
	$headers = "From: {$de}\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	
	// Mensaje del correo
	$mensaje = "
	<html>
	<body>
	<h3>Mensaje para Blackparadox</h3>
	<p><strong>Nombre:</strong> {$info['nombre']}</p>
	<p><strong>E-mail:</strong> {$info['email']}</p>
	<p><strong>Teléfono:</strong> {$info['tel']}</p>
	<p><strong>Mensaje:</strong> {$info['mensaje']}</p>
	<br>
	<p><i>{$info['ip']}</i></p>
	<p><i>{$info['fecha']}</i></p>
	</body>
	</html>
	";

	// Valida si se envía o no
	$enviar = mail($para, $asunto, $mensaje, $headers);
	if (!$enviar) {
		header("Location: ../index.html?mensaje-enviado");
	} else {
		header("Location: ../index.html?ok");
	}
} else {
	header("Location: ../index.html?error");
}

 ?>