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

	$login=array(	'Isla_0' => array(
				'num_isla' => '0',
				'nombre' => 'Cecilia',
				'Extensiones' => '234-245',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '234',
						'activo' => '1',
						'ventas' => '5'
					),
					'mampara_2' =>array(
						'extension' => '235',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '236',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '237',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '238',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_6' =>array(
						'extension' => '239',
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '240',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'extension' => '241',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_9' =>array(
						'extension' => '242',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_10' =>array(
						'extension' => '243',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'extension' => '244',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_12' =>array(
						'extension' => '245',
						'activo' => '1',
						'ventas' => '5'
					)
				)
			),

			'Isla_1' => array(

				'num_isla' => '1',
				'nombre' => 'JANETHE',
				'Extensiones' => '101-112',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '106',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'extension' => '105',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_3' =>array(
						'extension' => '104',
						'activo' => '1',
						'ventas' => '5'
					),
					'mampara_4' =>array(
						'extension' => '103',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '102',
						'activo' => '0',
					),
					'mampara_6' =>array(
						'extension' => '101',
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '112',
						'activo' => '0',
					),
					'mampara_8' =>array(
						'extension' => '111',
						'activo' => '0',
					),
					'mampara_9' =>array(
						'extension' => '110',
						'activo' => '0',
					),
					'mampara_10' =>array(
						'extension' => '109',
						'activo' => '2',
					),
					'mampara_11' =>array(
						'extension' => '108',
						'activo' => '2',
					),
					'mampara_12' =>array(
						'extension' => '107',
						'activo' => '1',
						'ventas' => '1'
					)
				)
			),
			
			'Isla_2' => array(
				'num_isla' => '2',
				'nombre' => 'Daniel',
				'Extensiones' => '246-257',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '246',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_2' =>array(
						'extension' => '247',
						'activo' => '2',
					),
					'mampara_3' =>array(
						'extension' => '248',
						'activo' => '2',
					),
					'mampara_4' =>array(
						'extension' => '249',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_5' =>array(
						'extension' => '250',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'extension' => '251',
						'activo' => '0',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '252',
						'activo' => '2',
					),
					'mampara_8' =>array(
						'extension' => '253',
						'activo' => '2',
					),
					'mampara_9' =>array(
						'extension' => '254',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '255',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_11' =>array(
						'extension' => '256',
						'activo' => '0',
					),
					'mampara_12' =>array(
						'extension' => '257',
						'activo' => '0',
					)
				)
			),
			'Isla_3' => array(

				'num_isla' => '3',
				'nombre' => 'CAB-1002',
				'Extensiones' => '113-124',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '118',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_2' =>array(
						'extension' => '117',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_3' =>array(
						'extension' => '116',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_4' =>array(
						'extension' => '115',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_5' =>array(
						'extension' => '114',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_6' =>array(
						'extension' => '113',
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '124',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '123',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_9' =>array(
						'extension' => '122',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_10' =>array(
						'extension' => '121',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'extension' => '120',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_12' =>array(
						'extension' => '119',
						'activo' => '1',
						'ventas' => '4'
					)
				)
			),
			
			'Isla_4' => array(
				'num_isla' => '4',
				'nombre' => 'CAB-1014',
				'Extensiones' => '258-269',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '258',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'extension' => '259',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '260',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '261',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '262',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'extension' => '263',
						'activo' => '0',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '264',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_8' =>array(
						'extension' => '265',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'extension' => '266',
						'activo' => '0',
					),
					'mampara_10' =>array(
						'extension' => '267',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'extension' => '268',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_12' =>array(
						'extension' => '269',
						'activo' => '0',
					)
				)
			),
			'Isla_5' => array(

				'num_isla' => '5',
				'nombre' => 'DANTE',
				'Extensiones' => '125-136',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '130',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '129',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '128',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '127',
						'activo' => '2',
					),
					'mampara_5' =>array(
						'extension' => '126',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_6' =>array(
						'extension' => '125',
						'activo' => '1',
						'ventas' => '3'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '136',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '135',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_9' =>array(
						'extension' => '134',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_10' =>array(
						'extension' => '133',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_11' =>array(
						'extension' => '132',
						'activo' => '0',
					),
					'mampara_12' =>array(
						'extension' => '131',
						'activo' => '0',
					)
				)
			),
			
			'Isla_6' => array(
				'num_isla' => '6',
				'nombre' => 'Alejandro',
				'Extensiones' => '270-281',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '270',
						'activo' => '0',
					),
					'mampara_2' =>array(
						'extension' => '271',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '272',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '273',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '274',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'extension' => '275',
						'activo' => '2',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '276',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_8' =>array(
						'extension' => '277',
						'activo' => '2',
					),
					'mampara_9' =>array(
						'extension' => '278',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '279',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'extension' => '280',
						'activo' => '2',
					),
					'mampara_12' =>array(
						'extension' => '281',
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			'Isla_7' => array(

				'num_isla' => '7',
				'nombre' => 'Navil',
				'Extensiones' => '137-148',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '142',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '141',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_3' =>array(
						'extension' => '140',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '139',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '138',
						'activo' => '0',
					),
					'mampara_6' =>array(
						'extension' => '137',
						'activo' => '0',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '148',
						'activo' => '2',
					),
					'mampara_8' =>array(
						'extension' => '147',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_9' =>array(
						'extension' => '146',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_10' =>array(
						'extension' => '145',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_11' =>array(
						'extension' => '144',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'extension' => '143',
						'activo' => '0',
					)
				)
			),
			
			'Isla_8' => array(
				'num_isla' => '8',
				'nombre' => 'CAB-1016',
				'Extensiones' => '282-293',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '282',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '283',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_3' =>array(
						'extension' => '284',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '285',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '286',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'extension' => '287',
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '288',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '289',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_9' =>array(
						'extension' => '290',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '291',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'extension' => '292',
						'activo' => '0',
					),
					'mampara_12' =>array(
						'extension' => '293',
						'activo' => '0',
					)
				)
			),
			'Isla_9' => array(
				'num_isla' => '9',
				'nombre' => 'CAB-1005',
				'Extensiones' => '149-160',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '154',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '153',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '152',
						'activo' => '2',
					),
					'mampara_4' =>array(
						'extension' => '151',
						'activo' => '2',
					),
					'mampara_5' =>array(
						'extension' => '150',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'extension' => '149',
						'activo' => '1',
						'ventas' => '2'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '160',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'extension' => '159',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'extension' => '158',
						'activo' => '0',
					),
					'mampara_10' =>array(
						'extension' => '157',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'extension' => '156',
						'activo' => '0',
					),
					'mampara_12' =>array(
						'extension' => '155',
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			
			'Isla_10' => array(
				'num_isla' => '10',
				'nombre' => 'Cautiño',
				'Extensiones' => '294-305',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '294',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '295',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '296',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '297',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '298',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'extension' => '299',
						'activo' => '1',
						'ventas' => '4'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '300',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '301',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'extension' => '302',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '303',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_11' =>array(
						'extension' => '304',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_12' =>array(
						'extension' => '305',
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			'Isla_11' => array(

				'num_isla' => '11',
				'nombre' => 'Lalo/Rafael',
				'Extensiones' => '161-172',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '166',
						'activo' => '1',
						'ventas' => '5'
					),
					'mampara_2' =>array(
						'extension' => '165',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_3' =>array(
						'extension' => '164',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '163',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '162',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'extension' => '161',
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '172',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '171',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'extension' => '170',
						'activo' => '2',
					),
					'mampara_10' =>array(
						'extension' => '169',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_11' =>array(
						'extension' => '168',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_12' =>array(
						'extension' => '167',
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			
			'Isla_12' => array(
				'num_isla' => '13',
				'nombre' => 'CAB-1007',
				'Extensiones' => '173-184',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '178',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'extension' => '177',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '176',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '175',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '174',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'extension' => '173',
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '184',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '183',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'extension' => '182',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '181',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'extension' => '180',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_12' =>array(
						'extension' => '179',
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			
			'Isla_13' => array(
				'num_isla' => '14',
				'nombre' => 'CAB-1018',
				'Extensiones' => '306-317',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '306',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '307',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '308',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '309',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '310',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'extension' => '311',
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '312',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '313',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'extension' => '314',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '315',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'extension' => '316',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'extension' => '317',
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			
			'Isla_14' => array(
				'num_isla' => '15',
				'nombre' => 'Oscar',
				'Extensiones' => '185-196',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '190',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'extension' => '189',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '188',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '187',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '186',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_6' =>array(
						'extension' => '185',
						'activo' => '1',
						'ventas' => '2'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '196',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '195',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'extension' => '194',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_10' =>array(
						'extension' => '193',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_11' =>array(
						'extension' => '192',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'extension' => '191',
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			'Isla_15' => array(
				'num_isla' => '16',
				'nombre' => 'CAB-1019',
				'Extensiones' => '318-329',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '318',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '319',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '320',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '321',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '322',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'extension' => '323',
						'activo' => '1',
						'ventas' => '5'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '324',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'extension' => '325',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'extension' => '326',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '327',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'extension' => '328',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_12' =>array(
						'extension' => '329',
						'activo' => '1',
						'ventas' => '3'
					)
				)
			),
			
			'Isla_16' => array(
				'num_isla' => '17',
				'nombre' => 'Fernando',
				'Extensiones' => '197-208',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '202',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '201',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '200',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '199',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '198',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'extension' => '197',
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '208',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'extension' => '207',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'extension' => '206',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_10' =>array(
						'extension' => '205',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'extension' => '204',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_12' =>array(
						'extension' => '203',
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			'Isla_17' => array(
				'num_isla' => '18',
				'nombre' => 'CAB-1020',
				'Extensiones' => '330-341',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '330',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '331',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '332',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '333',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '334',
						'activo' => '1',
						'ventas' => '3'
					),
					'mampara_6' =>array(
						'extension' => '335',
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '336',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_8' =>array(
						'extension' => '337',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_9' =>array(
						'extension' => '338',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_10' =>array(
						'extension' => '339',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_11' =>array(
						'extension' => '340',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_12' =>array(
						'extension' => '341',
						'activo' => '1',
						'ventas' => '1'
					)
				)
			),
			
			'Isla_18' => array(
				'num_isla' => '19',
				'nombre' => 'CAB-1010',
				'Extensiones' => '209-220',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '214',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_2' =>array(
						'extension' => '213',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '212',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '211',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '210',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'extension' => '209',
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '220',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '219',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'extension' => '218',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '217',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'extension' => '216',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_12' =>array(
						'extension' => '215',
						'activo' => '1',
						'ventas' => '2'
					)
				)
			),
			'Isla_19' => array(

				'num_isla' => '20',
				'nombre' => 'CAB-1021',
				'Extensiones' => '342-353',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '342',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'extension' => '343',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '344',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '345',
						'activo' => '0',
					),
					'mampara_5' =>array(
						'extension' => '346',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'extension' => '347',
						'activo' => '1',
						'ventas' => '0'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '348',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_8' =>array(
						'extension' => '349',
						'activo' => '0',
					),
					'mampara_9' =>array(
						'extension' => '350',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_10' =>array(
						'extension' => '351',
						'activo' => '0',
					),
					'mampara_11' =>array(
						'extension' => '352',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_12' =>array(
						'extension' => '353',
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			
			'Isla_20' => array(
				'num_isla' => '21',
				'nombre' => 'CAB-1011',
				'Extensiones' => '221-232',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '226',
						'activo' => '2',
					),
					'mampara_2' =>array(
						'extension' => '225',
						'activo' => '2',
					),
					'mampara_3' =>array(
						'extension' => '224',
						'activo' => '2',
					),
					'mampara_4' =>array(
						'extension' => '223',
						'activo' => '2',
					),
					'mampara_5' =>array(
						'extension' => '222',
						'activo' => '2',
					),
					'mampara_6' =>array(
						'extension' => '221',
						'activo' => '2',
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '232',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_8' =>array(
						'extension' => '231',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_9' =>array(
						'extension' => '230',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_10' =>array(
						'extension' => '229',
						'activo' => '1',
						'ventas' => '2'
					),
					'mampara_11' =>array(
						'extension' => '228',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_12' =>array(
						'extension' => '227',
						'activo' => '1',
						'ventas' => '0'
					)
				)
			),
			'Isla_21' => array(

				'num_isla' => '22',
				'nombre' => 'CAB-1022',
				'Extensiones' => '354-365',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '354',
						'activo' => '1',
						'ventas' => '1'
					),
					'mampara_2' =>array(
						'extension' => '355',
						'activo' => '0',
					),
					'mampara_3' =>array(
						'extension' => '356',
						'activo' => '0',
					),
					'mampara_4' =>array(
						'extension' => '357',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_5' =>array(
						'extension' => '358',
						'activo' => '1',
						'ventas' => '0'
					),
					'mampara_6' =>array(
						'extension' => '359',
						'activo' => '1',
						'ventas' => '1'
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '360',
						'activo' => '2',
					),
					'mampara_8' =>array(
						'extension' => '361',
						'activo' => '2',
					),
					'mampara_9' =>array(
						'extension' => '362',
						'activo' => '2',
					),
					'mampara_10' =>array(
						'extension' => '363',
						'activo' => '2',
					),
					'mampara_11' =>array(
						'extension' => '364',
						'activo' => '2',
					),
					'mampara_12' =>array(
						'extension' => '365',
						'activo' => '2',
					)
				)
			)
	);
	
	for ($i=0; $i < 22; $i++) { 
		$propiedadDinamica = "Isla_" . $i;
		$mamparas = &$login[$propiedadDinamica]['mamparas'];
		$mamparas_2 = &$login[$propiedadDinamica]['mamparas_2'];

// ------------------------------------------------------------------------------------------------------------------------------
		for ($a=1; $a <7 ; $a++) { 
		$propiedadDinamica2 = "mampara_". $a;
		$extensionescom = &$mamparas[$propiedadDinamica2]['extension'];


		$sql   = "SELECT Extension FROM USUARIO_LOGIN WHERE Extension = $extensionescom AND Fecha ='2023-01-12' AND Estado = 1";

		$simon = $this->db->query($sql);

			foreach ($simon as $key ) {
				$uno = $key['Extension'];
				var_dump($mamparas[$propiedadDinamica2]['extension']);
				$mamparas[$propiedadDinamica2]['extension'] = $uno;
				var_dump($mamparas[$propiedadDinamica2]['extension']);

			}
		}
// ------------------------------------------------------------------------------------------------------------------------------
		for ($a=7; $a <13 ; $a++) { 
		$propiedadDinamica2 = "mampara_". $a;
		$extensionescom = &$mamparas_2[$propiedadDinamica2]['extension'];
		

		$sql   = "SELECT Extension FROM USUARIO_LOGIN WHERE Extension = $extensionescom AND Fecha ='2023-01-12' AND Estado = 1";

		$simon = $this->db->query($sql);

			foreach ($simon as $key ) {
				$dos = $key['Extension'];
				var_dump($mamparas_2[$propiedadDinamica2]['extension']);
				$mamparas_2[$propiedadDinamica2]['extension'] = $dos;
				var_dump($mamparas_2[$propiedadDinamica2]['extension']);
			}
		}
// ------------------------------------------------------------------------------------------------------------------------------
	}
	return $login;

	}

}


?>