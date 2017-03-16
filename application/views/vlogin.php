<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo base_url(); ?>cLogin/ingresar" method="POST">
		<table>
			<tr>
				<td><label>Usuario</label></td>
				<td><input type="text" name="txtUsuario"></td>
			</tr>
			<tr>
				<td><label>Contraseña</label></td>
				<td><input type="password" name="txtContrasenia"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Ingresar"></td>
			</tr>
		</table>
	</form>
</body>
</html>