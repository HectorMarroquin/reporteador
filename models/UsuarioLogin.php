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
				'nombre' => 'CAB-1012',
				'Extensiones' => '234-245',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0234',
						'activo' => '1',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0235',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0236',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0237',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0238',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0239',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0240',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0241',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0242',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0243',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0244',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0245',
						'activo' => '1',
						'ventas' => '5',
						'color' => ''
					)
				)
			),

			'Isla_1' => array(

				'num_isla' => '1',
				'nombre' => 'CAB-1001',
				'Extensiones' => '101-112',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0106',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0105',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0104',
						'activo' => '1',
						'ventas' => '5',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0103',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0102',
						'activo' => '0',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0101',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0112',
						'activo' => '0',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0111',
						'activo' => '0',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0110',
						'activo' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0109',
						'activo' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0108',
						'activo' => '2',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0107',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				)
			),
			
			'Isla_2' => array(
				'num_isla' => '2',
				'nombre' => 'CAB-1013',
				'Extensiones' => '246-257',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0246',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0247',
						'activo' => '2',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0248',
						'activo' => '2',
					),
					'mampara_4' =>array(
						'extension' => '0249',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0250',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0251',
						'activo' => '0',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0252',
						'activo' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0253',
						'activo' => '2',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0254',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0255',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0256',
						'activo' => '0',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0257',
						'activo' => '0',
						'color' => ''
					)
				)
			),
			'Isla_3' => array(

				'num_isla' => '3',
				'nombre' => 'CAB-1002',
				'Extensiones' => '113-124',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0118',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0117',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0116',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0115',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0114',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0113',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0124',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0123',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0122',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0121',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0120',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0119',
						'activo' => '1',
						'ventas' => '4',
						'color' => ''
					)
				)
			),
			
			'Isla_4' => array(
				'num_isla' => '4',
				'nombre' => 'CAB-1014',
				'Extensiones' => '258-269',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0258',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0259',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0260',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0261',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0262',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0263',
						'activo' => '0',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0264',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0265',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0266',
						'activo' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0267',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0268',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0269',
						'activo' => '0',
						'color' => ''
					)
				)
			),
			'Isla_5' => array(

				'num_isla' => '5',
				'nombre' => 'CAB-1003',
				'Extensiones' => '125-136',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0130',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0129',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0128',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0127',
						'activo' => '2',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0126',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0125',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0136',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0135',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0134',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0133',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0132',
						'activo' => '0',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0131',
						'activo' => '0',
						'color' => ''
					)
				)
			),
			
			'Isla_6' => array(
				'num_isla' => '6',
				'nombre' => 'CAB-1015',
				'Extensiones' => '270-281',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0270',
						'activo' => '0',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0271',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0272',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0273',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0274',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0275',
						'activo' => '2',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0276',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0277',
						'activo' => '2',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0278',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0279',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0280',
						'activo' => '2',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0281',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				)
			),
			'Isla_7' => array(

				'num_isla' => '7',
				'nombre' => 'CAB-1004',
				'Extensiones' => '137-148',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0142',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0141',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0140',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0139',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0138',
						'activo' => '0',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0137',
						'activo' => '0',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0148',
						'activo' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0147',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0146',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0145',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0144',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0143',
						'activo' => '0',
						'color' => ''
					)
				)
			),
			
			'Isla_8' => array(
				'num_isla' => '8',
				'nombre' => 'CAB-1016',
				'Extensiones' => '282-293',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0282',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0283',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0284',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0285',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0286',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0287',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0288',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0289',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0290',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0291',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0292',
						'activo' => '0',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0293',
						'activo' => '0',
						'color' => ''
					)
				)
			),
			'Isla_9' => array(
				'num_isla' => '9',
				'nombre' => 'CAB-1005',
				'Extensiones' => '149-160',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0154',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0153',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0152',
						'activo' => '2',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0151',
						'activo' => '2',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0150',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0149',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0160',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0159',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0158',
						'activo' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0157',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0156',
						'activo' => '0',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0155',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					)
				)
			),
			
			'Isla_10' => array(
				'num_isla' => '10',
				'nombre' => 'CAB-1017',
				'Extensiones' => '294-305',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0294',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0295',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0296',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0297',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0298',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0299',
						'activo' => '1',
						'ventas' => '4',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0300',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0301',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0302',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0303',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0304',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0305',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					)
				)
			),
			'Isla_11' => array(

				'num_isla' => '11',
				'nombre' => 'CAB-006',
				'Extensiones' => '161-172',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0166',
						'activo' => '1',
						'ventas' => '5',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0165',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0164',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0163',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0162',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0161',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0172',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0171',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0170',
						'activo' => '2',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0169',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0168',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0167',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				)
			),
			
			'Isla_12' => array(
				'num_isla' => '13',
				'nombre' => 'CAB-1007',
				'Extensiones' => '173-184',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0178',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0177',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0176',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0175',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0174',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0173',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0184',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0183',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0182',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0181',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0180',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0179',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					)
				)
			),
			
			'Isla_13' => array(
				'num_isla' => '14',
				'nombre' => 'CAB-1018',
				'Extensiones' => '306-317',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0306',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0307',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0308',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0309',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0310',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0311',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0312',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0313',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0314',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0315',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0316',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0317',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					)
				)
			),
			
			'Isla_14' => array(
				'num_isla' => '15',
				'nombre' => 'CAB-1008',
				'Extensiones' => '185-196',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0190',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0189',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0188',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0187',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0186',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0185',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0196',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0195',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0194',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0193',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0192',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0191',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					)
				)
			),
			'Isla_15' => array(
				'num_isla' => '16',
				'nombre' => 'CAB-1019',
				'Extensiones' => '318-329',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0318',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0319',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0320',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0321',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0322',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0323',
						'activo' => '1',
						'ventas' => '5',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0324',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0325',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0326',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0327',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0328',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0329',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					)
				)
			),
			
			'Isla_16' => array(
				'num_isla' => '17',
				'nombre' => 'CAB-1009',
				'Extensiones' => '197-208',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0202',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0201',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0200',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0199',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0198',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0197',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0208',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0207',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0206',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0205',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0204',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0203',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				)
			),
			'Isla_17' => array(
				'num_isla' => '18',
				'nombre' => 'CAB-1020',
				'Extensiones' => '330-341',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0330',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0331',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0332',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0333',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0334',
						'activo' => '1',
						'ventas' => '3',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0335',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0336',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0337',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0338',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0339',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0340',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0341',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				)
			),
			
			'Isla_18' => array(
				'num_isla' => '19',
				'nombre' => 'CAB-1010',
				'Extensiones' => '209-220',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0214',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0213',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0212',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0211',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0210',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0209',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0220',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0219',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0218',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0217',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0216',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0215',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					)
				)
			),
			'Isla_19' => array(

				'num_isla' => '20',
				'nombre' => 'CAB-1021',
				'Extensiones' => '342-353',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0342',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0343',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0344',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0345',
						'activo' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0346',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0347',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0348',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0349',
						'activo' => '0',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0350',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0351',
						'activo' => '0',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0352',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0353',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				)
			),
			
			'Isla_20' => array(
				'num_isla' => '21',
				'nombre' => 'CAB-1011',
				'Extensiones' => '221-232',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0226',
						'activo' => '2',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0225',
						'activo' => '2',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0224',
						'activo' => '2',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0223',
						'activo' => '2',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0222',
						'activo' => '2',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0221',
						'activo' => '2',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0232',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0231',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0230',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0229',
						'activo' => '1',
						'ventas' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0228',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0227',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					)
				)
			),
			'Isla_21' => array(

				'num_isla' => '22',
				'nombre' => 'CAB-1022',
				'Extensiones' => '354-365',
				'mamparas' =>array(
					'mampara_1' =>array(
						'extension' => '0354',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					),
					'mampara_2' =>array(
						'extension' => '0355',
						'activo' => '0',
						'color' => ''
					),
					'mampara_3' =>array(
						'extension' => '0356',
						'activo' => '0',
						'color' => ''
					),
					'mampara_4' =>array(
						'extension' => '0357',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_5' =>array(
						'extension' => '0358',
						'activo' => '1',
						'ventas' => '0',
						'color' => ''
					),
					'mampara_6' =>array(
						'extension' => '0359',
						'activo' => '1',
						'ventas' => '1',
						'color' => ''
					)
				),
				'mamparas_2' => array(
					'mampara_7' =>array(
						'extension' => '0360',
						'activo' => '2',
						'color' => ''
					),
					'mampara_8' =>array(
						'extension' => '0361',
						'activo' => '2',
						'color' => ''
					),
					'mampara_9' =>array(
						'extension' => '0362',
						'activo' => '2',
						'color' => ''
					),
					'mampara_10' =>array(
						'extension' => '0363',
						'activo' => '2',
						'color' => ''
					),
					'mampara_11' =>array(
						'extension' => '0364',
						'activo' => '2',
						'color' => ''
					),
					'mampara_12' =>array(
						'extension' => '0365',
						'color' => '',
					)
				)
			)
	);
	
	for ($recorrerIsla=0; $recorrerIsla < 22; $recorrerIsla++) { 
		$propiedadDinamica = "Isla_" . $recorrerIsla;
		$mamparas = &$login[$propiedadDinamica]['mamparas'];
		$mamparas_2 = &$login[$propiedadDinamica]['mamparas_2'];

		$today = date("2023-09-22");
// ------------------------------------------------------------------------------------------------------------------------------
		for ($recorrerMampara=1; $recorrerMampara <7 ; $recorrerMampara++) { 
			$propiedadDinamica2 = "mampara_". $recorrerMampara;
			$extensionescom = &$mamparas[$propiedadDinamica2]['extension'];

			

			$sql   = "SELECT Extension, IdUsuario_cliente
			FROM USUARIO_LOGIN
			INNER JOIN USUARIO_CLIENTE AS UC ON USUARIO_LOGIN.IdUsuario_cliente = UC.Id
			WHERE Extension = $extensionescom AND Fecha ='".$today."'
			AND USUARIO_LOGIN.Estado =1 
			ORDER BY USUARIO_LOGIN.Hora DESC
			LIMIT 1 ";

			$ejecucion = $this->db->query($sql);


			if ($ejecucion->num_rows > 0) {
		    	$row = $ejecucion->fetch_assoc();
		    	$extension = $row["Extension"];
		    	$IdUsuariocliente = $row["IdUsuario_cliente"];
		    	
	
		    	$mamparas[$propiedadDinamica2]['extension'] = $extension;

		    	$sql1   = "SELECT COUNT(*) AS TOTAL FROM BITACORA_VALIDACION
		    	WHERE Fecha = '".$today."'
		    	AND IdUsuario_ejecutivo = $IdUsuariocliente AND IdEstatus_bitacora_validador = 2 AND Estado = 1";



		    	// if($IdUsuariocliente = '22921352'){
		    	// 	$sql1   = "SELECT COUNT(*) AS TOTAL FROM BITACORA_VALIDACION
		    	// 	WHERE Fecha = '".$today."'
		    	// 	AND IdUsuario_ejecutivo = $IdUsuariocliente AND IdEstatus_bitacora_validador = 2 AND Estado = 1";
		    	// 	$ejecucion_pre = $this->db->query($sql1);

		    	// 	$prepago = $ejecucion_pre->fetch_assoc();

		    	// 	$prepago =empty($prepago) ? 0 : intval($prepago["TOTAL"]);

		    	// 	$sql2 = "SELECT COUNT(*) AS TOTAL2 FROM VENTAS_POSPAGO_VAL
		    	// 	WHERE VENTAS_POSPAGO_VAL.Fecha_capturo = '".$today."'
		    	// 	 AND  IdUsuario_vendio  = $IdUsuariocliente AND `IdEstatusPospago` = 2 AND Estado = 1";
		    	// 	$ejecucion_pos = $this->db->query($sql2);

		    	// 	$pospago = $ejecucion_pos->fetch_assoc();

		    	// 	$pospago =empty($pospago) ? 0 : intval($pospago["TOTAL"]);
		    	// 	$total = $prepago + $pospago;

		    	// 	echo $total;
		    	// 	exit();
		    	// }
		    	$ejecucion_pre = $this->db->query($sql1);

		    	$prepago = $ejecucion_pre->fetch_assoc();

		    	$prepago =empty($prepago) ? 0 : intval($prepago["TOTAL"]);

		    	$sql2 = "SELECT COUNT(*) AS TOTAL2 FROM VENTAS_POSPAGO_VAL
		    	WHERE VENTAS_POSPAGO_VAL.Fecha_capturo = '".$today."'
		    	 AND  IdUsuario_vendio  = $IdUsuariocliente AND `IdEstatusPospago` = 2 AND Estado = 1";
		    	$ejecucion_pos = $this->db->query($sql2);

		    	$pospago = $ejecucion_pos->fetch_assoc();

		    	$pospago =empty($pospago) ? 0 : intval($pospago["TOTAL"]);


				$total = $prepago + $pospago;



				if ($total > 0 ) {
				    // Obtener la fila de resultados

				    // Extraer el valor de la columna "Extension"
				    if($total == 1){
				    	$color = 'unaVenta';
				    	$mamparas[$propiedadDinamica2]['color'] = $color;
				    }else if($total == 2){
				    	$color = 'dosVentas';
				    	$mamparas[$propiedadDinamica2]['color'] = $color;
				    }else if($total >= 3){
				    	$color = 'masDeTres';
				    	$mamparas[$propiedadDinamica2]['color'] = $color;
				    }
				}else{
					$color = 'sinVentas';
					$mamparas[$propiedadDinamica2]['color'] = $color;
				}
				
			}else{
				$color = 'vacia';
				$mamparas[$propiedadDinamica2]['color'] = $color;
			}

		}
// ------------------------------------------------------------------------------------------------------------------------------
		for ($recorrerMampara=7; $recorrerMampara <13 ; $recorrerMampara++) { 
			$propiedadDinamica2 = "mampara_". $recorrerMampara;
			$extensionescom = &$mamparas_2[$propiedadDinamica2]['extension'];
		

			$sql   = "SELECT Extension, IdUsuario_cliente
			FROM USUARIO_LOGIN
			INNER JOIN USUARIO_CLIENTE AS UC ON USUARIO_LOGIN.IdUsuario_cliente = UC.Id
			WHERE Extension = $extensionescom AND Fecha = '".$today."'
			AND USUARIO_LOGIN.Estado =1
			ORDER BY USUARIO_LOGIN.Hora DESC
			LIMIT 1 ";
			
			$ejecucion = $this->db->query($sql);

				if ($ejecucion->num_rows > 0) {
		    	$row = $ejecucion->fetch_assoc();
		    	$extension = $row["Extension"];
		    	$IdUsuariocliente = $row["IdUsuario_cliente"];
		    	$Usuariotelemarketing = $row["Usuario_telemarketing"];
	
		    	$mamparas_2[$propiedadDinamica2]['extension'] = $extension;

		    	$sql1   = "SELECT COUNT(*) AS TOTAL FROM BITACORA_VALIDACION
		    	WHERE Fecha = '".$today."'
		    	AND IdUsuario_ejecutivo = $IdUsuariocliente AND IdEstatus_bitacora_validador = 2 AND Estado = 1";
		    	$ejecucion_pre = $this->db->query($sql1);
		    	$prepago = $ejecucion_pre->fetch_assoc();

		    	$prepago =empty($prepago) ? 0 : intval($prepago["TOTAL"]);

		    	$sql2 = "SELECT COUNT(*) AS TOTAL2 FROM VENTAS_POSPAGO_VAL
		    	WHERE VENTAS_POSPAGO_VAL.Fecha_capturo = '".$today."'
		    	 AND  IdUsuario_vendio  = $IdUsuariocliente AND `IdEstatusPospago` = 2 AND Estado = 1";
		    	$ejecucion_pos = $this->db->query($sql2);

		    	$pospago = $ejecucion_pos->fetch_assoc();

		    	$pospago =empty($pospago) ? 0 : intval($pospago["TOTAL"]);

		    	$total = $prepago + $pospago;
	


				if ($total > 0) {
				    // Extraer el valor de la columna "Extension"
				    if($total == 1){
				    	$color = 'unaVenta';
				    	$mamparas_2[$propiedadDinamica2]['color'] = $color;
				    }else if($total == 2){
				    	$color = 'dosVentas';
				    	$mamparas_2[$propiedadDinamica2]['color'] = $color;
				    }else if($total >= 3){
				    	$color = 'masDeTres';
				    	$mamparas_2[$propiedadDinamica2]['color'] = $color;
				    }
				}else{
					$color = 'sinVentas';
					$mamparas_2[$propiedadDinamica2]['color'] = $color;
				}
				
			}else{
				$color = 'vacia';
				$mamparas_2[$propiedadDinamica2]['color'] = $color;
			}
	}

// ------------------------------------------------------------------------------------------------------------------------------
	}
	return $login;

	}

}


?>

<!-- SELECT *
FROM CARGA_PORTABILIDAD
WHERE Fecha_venta = '2023-01-12'
AND UsuarioVenta LIKE 'LCCGASD822'
AND Tipificar LIKE '%Acepta Oferta / NIP%' -->
