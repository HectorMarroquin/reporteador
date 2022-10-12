<?php
use LDAP\Result;

require_once 'models/CarteraReclutado.php';
require_once 'models/CursoCapacitacion.php';

class ReclutamientoController 
{
	public function index(){

		Utils::checkSession();
		Utils::isAdmin();

		require_once 'views/reclutamiento/reclutamiento.php';
	}

	public function getDesgloseReclutamiento(){
		//Obten el rango de fecha
		$rangofecha = $_POST['rangofecha'];

		//separa las dos fechas
		$rangofecha = explode(' al ', $rangofecha);

		$fecha_i = $rangofecha[0];
		$fecha_f = $rangofecha[1];


		//tabla reclutamiento
		$conteoReclutador = new CarteraReclutado();
		$reclutadores = $conteoReclutador->getReclutador($fecha_i,$fecha_f);

		$arreglo=array();

		while ($reclutador = $reclutadores->fetch_object()) {

			$name_r       = $reclutador->nombre;	
			$citado       = $reclutador->citados;
			$entrevista   = $reclutador->entrevistas;
			$aceptado     = $reclutador->aceptados;
			$cartera      = $reclutador->cartera;

			$porc_entr = Utils::getPorcentaje($citado,$entrevista);
      		$porc_acpt=  Utils::getPorcentaje($citado,$aceptado);
      		$porc_cart=  Utils::getPorcentaje($citado,$cartera);

      		$arreglo[$name_r]=array(
      				'nombre'     => $name_r,
      				'citado'     => $citado,
      				'entrevista' => $entrevista,
      			    'porc_entr'  => $porc_entr,
      				'aceptado'   => $aceptado,
      				'porc_acpt'  => $porc_entr,
      			    'cartera'    => $cartera,
      				'porc_cart'  => $porc_cart,	
      		);
		}

		$total_recl = $this->getTotalReclutador($arreglo);	
		$tab_reclu = $this->getMaquetaTabla($arreglo,$total_recl);
		$resultado['reclutadores']=$tab_reclu;

	    echo json_encode($resultado);
	}

	public function getTotalReclutador($datos){

		$citados    = 0;
		$entrevista = 0;
		$aceptados  = 0;
		$cartera    = 0;

		$arreglo = array();

		foreach ($datos as $key => $dato) {
				
				$citados    += $dato['citado'];
				$entrevista += $dato['entrevista'];
				$aceptados  += $dato['aceptado'];
				$cartera    += $dato['cartera'];

		}
			$porcentr  = Utils::getPorcentaje($citados,$entrevista);
			$porcacpt  = Utils::getPorcentaje($citados,$aceptados);
			$porccart  = Utils::getPorcentaje($citados,$cartera);

			$arreglo["TOTAL"] = array(
                'nombre'      =>"TOTAL",
                'citados'     =>$citados,
                'entrevista'  =>$entrevista,
                'porc_entr'  =>$porcentr,
                'aceptados'   =>$aceptados,
                'porc_acpt'  =>$porcacpt,
                'cartera'     =>$cartera,
                'porc_cart'  =>$porccart,
              );

			return $arreglo;
	}

	public function getConteo(){
		//Obten el rango de fecha
		$rangofecha = $_POST['rangofecha'];

		//separa las dos fechas
		$rangofecha = explode(' al ', $rangofecha);

		$fecha_i = $rangofecha[0];
		$fecha_f = $rangofecha[1];

		//tabla cursos
		$conteoCurso = new CursoCapacitacion();
		$cursos = $conteoCurso->getCurso($fecha_i,$fecha_f);

		$arreglo = array();
		//obtener informacion de curso

		while ($curso = $cursos->fetch_object()) {
			$curso_id         = $curso->Id;	
			$curso_name       = $curso->curso;
			$turno            = $curso->turno;
			$fecha_ini_curso  = $curso->Fecha_inicio_capa;
		    $fecha_fin_curso  = $curso->Fecha_fin_capa;
		    $fecha_entrega    = $curso->Fecha_entrega_operacion;

			//llamamos funcion para detalle
			$dtCurso = new CursoCapacitacion();
			$detalle = $dtCurso->getConteoCurso($curso_id);
			$conteo = $this->getDesgloseConteo($detalle);


			$citado      = !empty($conteo[0])?$conteo[0]:'0';
			$asistido    = !empty($conteo[1])?$conteo[1]:'0';
			$porcasist   = $conteo[2];	
			$entregado   = !empty($conteo[3])?$conteo[3]:'0';
			$porcentr    = $conteo[4];	

			$arreglo[$curso_id]=array(

      				'curso'      => $curso_name,
      			    'turno'      => $turno,
      				'fecha_i'    => $fecha_ini_curso,
      				'fecha_f'    => $fecha_fin_curso,
      				'fecha_e'    => $fecha_entrega,	
      				'citado'     => $citado,
      				'asistido'   => $asistido,
      				'porc_asist'	 => $porcasist,
      			    'entregado'  => $entregado,
      			    'porc_entr'	 => $porcentr,      		      		
      		);

		}

		$total_curs = $this->getTotalCurso($arreglo);
		$tab_curs = $this->getMaquetaTablaCurso($arreglo,$total_curs);
		$resultado['cursos']=$tab_curs;

	    echo json_encode($resultado);				
	}	


	public function getDesgloseConteo($datos){
		//obtener el conteo de estatus
		$conteo = array();
		
			while($dato = $datos->fetch_object()){
				$citados += $dato->citados;
				$asistidos += $dato->asistidos;
				$entregados += $dato->entregados;			
			}

		$porcasist  = Utils::getPorcentaje($citados,$asistidos);		
		$porcentr  = Utils::getPorcentaje($citados,$entregados);
		 
		$conteo = array($citados, $asistidos,$porcasist,$entregados,$porcentr);
		

		return $conteo;
	}

	public function getTotalCurso($datos){
		
		$citados     = 0;
		$asistidos   = 0;
		$entregados  = 0;
		

		$arreglo = array();
		foreach ($datos as $key => $dato) {
				
				$citados    += $dato['citado'];				
				$asistidos  += $dato['asistido'];
				$entregados  += $dato['entregado'];

		}


			$porcasist = Utils::getPorcentaje($citados,$asistidos);
			$porcentr  = Utils::getPorcentaje($citados,$entregados);

			$arreglo["TOTAL"] = array(
                'nombre'      =>"TOTAL",
                'citados'     =>$citados,
                'asistido'    =>$asistidos,
                'porc_asist'   =>$porcasist,           
                'entregado'   =>$entregados,
                'porc_entr'   =>$porcentr,
              );

			return $arreglo;

	}	

	public function getDatosCurso(){

		//Obten el rango de fecha
		$rangofecha = $_POST['rangofecha'];

		//separa las dos fechas
		$rangofecha = explode(' al ', $rangofecha);

		$fecha_i = $rangofecha[0];
		$fecha_f = $rangofecha[1];


		//tabla seguimiento
		$desgloseCurso = new CursoCapacitacion();
		$desglosecursos  = $desgloseCurso->getCurso($fecha_i,$fecha_f);
				
		$arreglo = array();
		//obtener informacion de curso

		while ($desglosecurso = $desglosecursos->fetch_object()) {			
			$curso_id         = $desglosecurso->Id;	
			$curso_name       = $desglosecurso->curso;
			$turno            = ($desglosecurso->turno=='Matutino'?'TM':'TV');
			$campania         = $desglosecurso->Campania;
		    $modalidad        = $desglosecurso->Grupo;
		    $fecha_entrega    = $desglosecurso->Fecha_entrega_operacion;

		    //Detalle reclutamiento
		    $desgloseReclu = new CarteraReclutado();
			$desgloser = $desgloseReclu->getdesgloseReclutador($curso_id);
			$infoRe = $this->getseguimientoReclutador($desgloser);
			$total_seg = $this->getTotalSeguimiento($infoRe);

			//enviamos datos del curso
			$arreglo[$curso_id]=array(

      				'curso'        => $curso_name,
      			    'turno'        => $turno,
      				'campania'     => $campania,
      				'modalidad'    => $modalidad,
      				'fecha_e'      => $fecha_entrega,
      				'reclutadores' => $infoRe,
      				'TOTAL'        => $total_seg,      			  		      		
      		);
		}
		
		$tablaseg = $this->getMaquetaTablaSeg($arreglo);
		$resultado['seguimiento']=$tablaseg;

		echo json_encode($resultado);
	}

	public function getseguimientoReclutador($reclutadores){

		$arreglo = array();
		$lista = array();

		//obtener informacion de reclutador
		while ($reclutador = $reclutadores->fetch_object()){

				$curso_id      = $reclutador->Id;
				$r_name        = $reclutador->reclutador;
				$citados	   = $reclutador->Citados;
				$asistidos	   = $reclutador->Asistidos;
				$entregados    = $reclutador->Entregados;	
				
				//enviamos datos reclutador		
				$arreglo = array(
					'reclutador'   => $r_name,
					'citados'      => $citados,
					'asistidos'    => $asistidos,
					'entregados'   => $entregados,
				);

				//pasamos a lista de reclutador
				array_push($lista, $arreglo);
			}

			return $lista;			
	}

	public function getTotalSeguimiento($lista){
		
		$citados    = 0;
		$asistidos  = 0;
		$entregados = 0;

		$arreglo = array();

		foreach($lista as $key => $datos){
				$citados    += $datos['citados'];				
				$asistidos  += $datos['asistidos'];
				$entregados  += $datos['entregados'];
		}

			$arreglo = array(
	                'nombre'      =>"TOTAL",
	                'citados'     =>$citados,
	                'asistido'    =>$asistidos,          
	                'entregado'   =>$entregados,
	              );
		

			return $arreglo;
	}

	public function getMaquetaTabla($repor_recl,$total_recl){
		$maq_tab = '';

		//recorre tabla reclutador
	
		foreach ($repor_recl as $key => $reclutador) {
			$maq_tab .= '
						<tr>
						<td>'.$reclutador['nombre'].'</td>
						<td>'.$reclutador['citado'].'</td>
						<td>'.$reclutador['entrevista'].'</td>
						<td>'.$reclutador['porc_entr'].'</td>
						<td>'.$reclutador['aceptado'].'</td>
						<td>'.$reclutador['porc_acpt'].'</td>
						<td>'.$reclutador['cartera'].'</td>
						<td>'.$reclutador['porc_cart'].'</td>
						</tr>';
		}
	   //recorre total
		foreach ($total_recl as $key => $total) {
			$maq_tab .='
						<tr class="table-active fw-bold">
						 <td>'.$total['nombre'].'</td>
						 <td>'.$total['citados'].'</td>
						 <td>'.$total['entrevista'].'</td>
						 <td>'.$total['porc_entr'].'%</td>
						 <td>'.$total['aceptados'].'</td>
						 <td>'.$total['porc_acpt'].'%</td>
						 <td>'.$total['cartera'].'</td>
						 <td>'.$total['porc_cart'].'%</td>
						 </tr>';
		}
		//retorna maquetacion
		return $maq_tab;
	}

	public function getMaquetaTablaCurso($repor_curs,$total_curs){
		$maq_tab = '';
		//recorre tabla reclutador
		foreach ($repor_curs as $key => $curso){
			$maq_tab .= '
						<tr>
						<td>'.$curso['curso'].'</td>
						<td>'.$curso['turno'].'</td>
						<td>'.$curso['fecha_i'].'</td>
						<td>'.$curso['fecha_f'].'</td>
						<td>'.$curso['fecha_e'].'</td>
						<td>'.$curso['citado'].'</td>
						<td>'.$curso['asistido'].'</td>
						<td>'.$curso['porc_asist'].'</td>
						<td>'.$curso['entregado'].'</td>
						<td>'.$curso['porc_entr'].'</td>
						</tr>';
		}
		//recorre total
		foreach ($total_curs as $key => $total){
			$maq_tab .='
						<tr class="table-active fw-bold">
						 <td colspan="5">TOTAL</td>
						 <td>'.$total['citados'].'</td>
						 <td>'.$total['asistido'].'</td>
						 <td>'.$total['porc_asist'].'%</td>
						 <td>'.$total['entregado'].'</td>
						 <td>'.$total['porc_entr'].'%</td>					
						 </tr>';
		}
		//retorna maquetacion
		return $maq_tab;		
	}

	public function getMaquetaTablaSeg($repor_seg){

		$maq_tab = '';
		//recorre tabla seguimiento

		foreach($repor_seg as $key => $seguimiento){

				$maq_tab .= '<br><br> <table class = "table caption-top">
				<thead><tr><th scope="col-sm">Curso:'.$seguimiento['curso'].' '.$seguimiento['turno'].'</th> <th scope="col-sm">Campaña:'.$seguimiento['campania'].'</th><th scope="col-sm">Modalidad:'.$seguimiento['modalidad'].'</th><th scope="col-sm">Fecha Entrega Operación:'.$seguimiento['fecha_e'].'</th><tr></thead>';

				$maq_tab.='<thead><tr><th scope="col">Reclutados</th>
									  <th scope="col">Citados</th>
									  <th scope="col">Asistidos</th>
									  <th scope="col">Entregados</th>
								  <tr></thead>';

				$maq_tab.='<tbody>';

				foreach($seguimiento['reclutadores'] as $key => $value){

					$maq_tab.='<tr>';

					foreach($value as $ky => $val){
						$maq_tab.='<th scope="col">'.$val.'</th>';
					}
				}				  

				$maq_tab.='<tr class="table-active fw-bold">
							<td>'.$seguimiento['TOTAL']['nombre'].'</td>
							<td>'.$seguimiento['TOTAL']['citados'].'</td>
							<td>'.$seguimiento['TOTAL']['asistido'].'</td>
							<td>'.$seguimiento['TOTAL']['entregado'].'</td>
						   </tr>';

				$maq_tab.='</tbody><table>';
		}

		return $maq_tab;				
	}

}

?>