<!DOCTYPE html>
<html>
<head>
	<title>Registro de Persona</title>
</head>
<body>
	<h1>Cargo persona</h1>
	<form action="<?php echo base_url();  ?>cPersona/guardar" method="POST">
		<table>
			<tr>
				<td><label>Nombres</label></td>
				<td><input type ="text" name="txtNombres"></td>
			</tr>
			<tr>
				<td><label>Apellido paterno</label></td>
				<td><input type ="text" name="txtApellidoPaterno"></td>
			</tr>
			<tr>
				<td><label>Apellido materno</label></td>
				<td><input type ="text" name="txtApellidoMaterno"></td>
			</tr>
			<tr>
				<td><label>Dirección</label></td>
				<td><input type ="text" name="txtDireccion"></td>
			</tr>	
			<tr>
				<td><label>Dni</label></td>
				<td><input type ="text" name="txtDni"></td>
			</tr>
			<tr>
				<td><label>Usuario</label></td>
				<td><input type ="text" name="txtUsuario"></td>
			</tr>
			<tr>
				<td><label>Contraseña</label></td>
				<td><input type ="text" name="txtContrasenia"></td>
			</tr>
			<tr><td><input type="submit" value="Registra"></td></tr>
		</table>
	</form>
	<a href="<?php echo base_url(); ?>cLogin">Login</a>
</body>
</html>
