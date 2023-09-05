<?php

class UsuarioLogin
{
	private $id;
	private $idUsuarioCliente;
	private $ip;
	private $ip_address;
	private $mac;
	private $state;
	private $extension;
	private $fecha;
	private $hora;
	private $estado;
	private $db;

	public function __construct(){

		$this->db = Database::connect();
	}


	public function consulta_general(){
		
	$registros =array(
			'Isla_0' => array(
				'num_isla' => '0',
				'nombre' => 'Cecilia',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '5'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '5'
					)
				)
			),
			
			'Isla_1' => array(

				'num_isla' => '1',
				'nombre' => 'JANETHE',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_3' =>array(
						'activo' => '1',
						'ventas' => '5'
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '0',
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '0',
					),
					'mampara_8' =>array(
						'activo' => '0',
					),
					'mampara_9' =>array(
						'activo' => '0',
					),
					'mampara_10' =>array(
						'activo' => '2',
					),
					'mampara_11' =>array(
						'activo' => '2',
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				)
			),
			
			'Isla_2' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '2',
				'nombre' => 'Daniel',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_2' =>array(
						'activo' => '2',
					),
					'mampara_3' =>array(
						'activo' => '2',
					),
					'mampara_4' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'activo' => '0',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '2',
					),
					'mampara_8' =>array(
						'activo' => '2',
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_11' =>array(
						'activo' => '0',
					),
					'mampara_12' =>array(
						'activo' => '0',
					)
				)
			),
			'Isla_3' => array(

				'num_isla' => '3',
				'nombre' => 'CAB-1002',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_2' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_3' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_4' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '4'
					)
				)
			),
			
			'Isla_4' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '4',
				'nombre' => 'CAB-1014',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'activo' => '0',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'activo' => '0',
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_12' =>array(
						'activo' => '0',
					)
				)
			),
			'Isla_5' => array(

				'num_isla' => '5',
				'nombre' => 'DANTE',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '2',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '3'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_11' =>array(
						'activo' => '0',
					),
					'mampara_12' =>array(
						'activo' => '0',
					)
				)
			),
			
			'Isla_6' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '6',
				'nombre' => 'Alejandro',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '0',
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'activo' => '2',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_8' =>array(
						'activo' => '2',
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'activo' => '2',
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			'Isla_7' => array(

				'num_isla' => '7',
				'nombre' => 'Navil',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '0',
					),
					'mampara_6' =>array(
						'activo' => '0',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '2',
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'activo' => '0',
					)
				)
			),
			
			'Isla_8' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '8',
				'nombre' => 'CAB-1016',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'activo' => '0',
					),
					'mampara_12' =>array(
						'activo' => '0',
					)
				)
			),
			'Isla_9' => array(

				'num_isla' => '9',
				'nombre' => 'CAB-1005',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '2',
					),
					'mampara_4' =>array(
						'activo' => '2',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'activo' => '0',
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'activo' => '0',
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			
			'Isla_10' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '10',
				'nombre' => 'Cautiño',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '4'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			'Isla_11' => array(

				'num_isla' => '11',
				'nombre' => 'Lalo/Rafael',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '5'
					),
					'mampara_2' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'activo' => '2',
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			
			'Isla_12' => array(

				'num_isla' => '12',
				'nombre' => 'CAB-1007',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			
			'Isla_12' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '12',
				'nombre' => 'CAB-1018',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			'Isla_13' => array(

				'num_isla' => '13',
				'nombre' => '',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			
			'Isla_14' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '14',
				'nombre' => 'Oscar',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			'Isla_15' => array(

				'num_isla' => '15',
				'nombre' => 'CAB-1019',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '5'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '3'
					)
				)
			),
			
			'Isla_16' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '16',
				'nombre' => 'Fernando',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			'Isla_17' => array(

				'num_isla' => '17',
				'nombre' => 'CAB-1020',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				)
			),
			
			'Isla_18' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '18',
				'nombre' => 'CAB-1010',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			'Isla_19' => array(

				'num_isla' => '19',
				'nombre' => 'CAB-1021',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '0',
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'activo' => '0',
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_10' =>array(
						'activo' => '0',
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			
			'Isla_20' => array(
				'marca' => "Pritt",
				'precio'  => "1.75€",
				'referencia'  => "567PRI13",
				'num_isla' => '20',
				'nombre' => 'CAB-1011',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '2',
					),
					'mampara_2' =>array(
						'activo' => '2',
					),
					'mampara_3' =>array(
						'activo' => '2',
					),
					'mampara_4' =>array(
						'activo' => '2',
					),
					'mampara_5' =>array(
						'activo' => '2',
					),
					'mampara_6' =>array(
						'activo' => '2',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_12' =>array(
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			'Isla_21' => array(

				'num_isla' => '21',
				'nombre' => 'CAB-1022',
				'mamparas' =>array(
					'mampara_1' =>array(
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'activo' => '0',
					),
					'mampara_3' =>array(
						'activo' => '0',
					),
					'mampara_4' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_5' =>array(
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'activo' => '2',
					),
					'mampara_8' =>array(
						'activo' => '2',
					),
					'mampara_9' =>array(
						'activo' => '2',
					),
					'mampara_10' =>array(
						'activo' => '2',
					),
					'mampara_11' =>array(
						'activo' => '2',
					),
					'mampara_12' =>array(
						'activo' => '2',
					)
				)
			)
	);

	return $registros;

	}


}


?>