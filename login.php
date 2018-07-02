<?php 
session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if(!empty($_POST['email'])){
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$usuarios = new Usuarios($pdo);

	if($usuarios->fazerLogin($email, $senha)){

		header("Location: index.php");
		exit;

	} else {
		echo "Usuário ou senha estão errados!";
	}



}

?>

<form method="POST">
	Email:<br>
	<input type="email" name="email"><br>
	Senha:<br>
	<input type="password" name="senha"><br>
	<input type="submit" value="Logar">
</form>