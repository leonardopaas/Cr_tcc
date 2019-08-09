<?php
include "../funcoes/class.php";
//print_r($_POST);
switch ($_GET['acao']) {
	case 'cadastrar':
		
	/*	$query=new Query();
	$query->select('select * from usuario where email_usuario ="'.$_POST['email'].'"');
	if (!empty($query->dados)) {
		header("Refresh: 0; url = cadastro.php?u=e");
		//echo"existe";
	}else{
	//print_r($query);*/
	
	$usuario=new Usuario();
		//print_r($usuario);
	$usuario->cadastrar($_POST['nome'],$_POST['sobrenome'],$_POST['email'],$_POST['restricao'],$_POST['senha']);	
	//print_r($usuario);
	unset($usuario);
	unset($query);
	header("Refresh: 0; url = ../lista_usuarios.php");	
		break;

		case 'editar':
		$usuario=new usuario;
		$usuario->editar($_POST['nome'],$_POST['sobrenome'],$_POST['email'],$_POST['restricao'],$_POST['senha'],$_POST['id']);
		//print_r($usuario);
		
		//header("Refresh: 0; url = ../lista_usuarios.php");
				break;

		case 'excluir':
				$usuario=new Usuario;
				$usuario->excluir($_GET['id']);		
					break;

	case 'login':
			# code...
		break;
}