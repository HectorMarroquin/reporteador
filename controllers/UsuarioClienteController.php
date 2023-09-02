<?php
require_once 'models/UsuarioCliente.php';

class UsuarioClienteController{

	public function index(){

		require_once 'maqueta_login.php';
		Utils::deleteSession('error_login');
	}

	public function login(){

		if ($_POST) {

			$usuario = $_POST['usuario'];
			$pass  = $_POST['password'];

			$usuario    = isset($usuario) ? $usuario : false;
			$password = isset($pass) ? $pass: false;

			$administradores = ['42','220','227','157','32','193','237','226','212','12'];
			
			$usuarioCliente = new UsuarioCliente();
			$usuarioCliente->setUsuario($usuario);
			$usuarioCliente->setPassword($password);
			$identity = $usuarioCliente->login();


			$idgrupo = $identity->idgrupo;

			if ($identity && is_object($identity)) {
				
				   $_SESSION['identity'] = $identity;

				if (in_array($idgrupo,$administradores)) {
					
					$_SESSION['admin'] = true;
				
				}else{
					$_SESSION['admin'] = false;

				}

				header("Location:".base_url."Home/index");
				
			}else{
			     	$_SESSION['error_login'] = "Usuario o contraseña incorrecta.";

					header("Location:".base_url);

			}
		
		}


	}

	public function logout(){

		if (isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}
		
		if (isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}

		if (isset($_SESSION['error_login'])) {
			unset($_SESSION['error_login']);
		}

		header("Location:".base_url);
	}

}

