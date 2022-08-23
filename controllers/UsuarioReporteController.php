<?php
require_once 'models/UsuarioReporte.php';

class UsuarioReporteController{

	public function index(){

		require_once 'maqueta_login.php';
		Utils::deleteSession('error_login');
	}

	public function login(){

		if ($_POST) {

			$email = $_POST['email'];
			$pass  = $_POST['password'];

			$email    = isset($email) ? $email : false;
			$password = isset($pass) ? $pass: false;

			$usuario = new UsuarioReporte();
			$usuario->setUsuario($email);
			$usuario->setPassword($password);
			$identity = $usuario->login();

			if ($identity && is_object($identity)) {
				
				   $_SESSION['identity'] = $identity;

				if ($identity->Permisos == "TODO") {
					
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

