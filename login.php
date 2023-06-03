<?php 

include 'db.php';

$usuario = addslashes($_POST['usuario']);

# antes
//$senha = md5($_POST['senha']);
print ($_POST['senha']);
$senha = md5($_POST['senha']);
print ("<br>");

#depois de criptografar com a função md5
print($senha);
exit();

$query = "SELECT * FROM USUARIOS WHERE USUARIO = '$usuario' and SENHA = '$senha'";

$consulta = mysqli_query($conexao, $query);

if(mysqli_num_rows($consulta) == 1){

	session_start();
	$_SESSION['login'] = true;
	$_SESSION['usuario'] = $usuario;

	header('location:index.php');
}
else{
	header('location:index.php?erro');
}