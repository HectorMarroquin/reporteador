<?php

class HistoricoController 
{
	public function index(){

		Utils::checkSession();
		require_once 'views/historico/historico.php';
	}
}

?>