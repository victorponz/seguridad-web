<?php
session_start();

//En una aplicación real, los usuarios estarían almaenados en la base de datos
$all_users = array ("mario" => "qwerty", "juan" => "123456");
$valid_users = array_keys($all_users);

$ya_registrado = $_SESSION['ya_registrado'] ?? false;


if ($_SERVER['REQUEST_METHOD'] == "POST" && !$ya_registrado){
	$usuario = $_POST['usuario'] ?? "";
	$password = $_POST['password'] ?? "";
    
	$ya_registrado = (in_array($usuario, $valid_users)) && ($password == $all_users[$usuario]);
	if ($ya_registrado){
		$_SESSION['ya_registrado'] = true;
		$_SESSION['usuario'] = $usuario;
	}
}

if ($ya_registrado){
	// Si llega aqui es porque es un usuario válido.
	echo "<p>Welcome " . $_SESSION['usuario'] . "</p>";
	echo "<p>Congratulations, you are into the system.</p>";
}else{
?>
	
	<form action='login.php' method='post'>
		Usuario: <input type='text' name = "usuario" id="usuario" value=""><br>
		Contraseña: <input type='password' name = "password" id = "password" value=""><br>
		<input type='submit' value='Enviar'>
	</form>
<?php
}
?>