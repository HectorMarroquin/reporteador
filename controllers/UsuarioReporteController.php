<?php
require_once 'models/UsuarioReporte.php';

class UsuarioReporteController{

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



			$usuarioReporte = new UsuarioReporte();
			$usuarioReporte->setUsuario($usuario);
			$usuarioReporte->setPassword($password);
			$identity = $usuarioReporte->login();

			if ($identity && is_object($identity)) {
				
				   $_SESSION['identity'] = $identity;

				if ($identity->rol == "admin") {
					
					$_SESSION['admin'] = true;
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

