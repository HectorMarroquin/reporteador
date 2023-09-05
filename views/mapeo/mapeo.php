
<?php
require_once 'views/layout/header.php';
//require_once 'helpers/permisos.php'
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Modelado |ECI</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url?>/assets/css/estilos_mapeo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<!--<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400&display=swap" rel="stylesheet">
	-->
</head>
<!--
<body>
	<header class="header">
		<div class="nav-bg">  
    		<nav class="navegacion-principal">
    			<div class="cajas">
    				<div class="cajap r"></div><p>Ocupados</p>
    			</div>
    			
    			<div class="cajas">
    				<div class="cajap v"></div><p>Disponibles</p>
    			</div>
    			
    			<div class="cajas">
    				<div class="cajap g"></div><p>Sin funcion</p>
    			</div>
    		</nav>
    	</div>
	</header>



	<div class="contenido-principal">
		

		<div class="parte1__individual parteCalidad" style="visibility: hidden;"> </div>


		Empieza isla de Cecilia
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorvalidacion">234 Val</div>
						<div class="numero colorvalidacion">Val 241</div>
						<div class="numero colorvalidacion">Val 242</div>
						<div class="numero colorvalidacion">Val 243</div>
						<div class="numero colorvalidacion">Val 244</div>
						<div class="numero colorvalidacion">Val 245</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-md'></i>
					<i class='bx bx-child bx-md'></i>
					<i class='bx bx-child bx-md'></i>
					<i class='bx bx-child bx-md'></i>
					<i class='bx bx-child bx-md'></i>
					<i class='bx bx-child bx-md'></i>
					
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flip-vertical bx-md' ></i>
					<i class='bx bx-child bx-flip-vertical bx-md' ></i>
					<i class='bx bx-child bx-flip-vertical bx-md' ></i>
					<i class='bx bx-child bx-flip-vertical bx-md' ></i>
					<i class='bx bx-child bx-flip-vertical bx-md' ></i>
					<i class='bx bx-child bx-flip-vertical bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorvalidacion">Val 240</div>
						<div class="numero colorvalidacion">Val 241</div>
						<div class="numero colorvalidacion">Val 242</div>
						<div class="numero colorvalidacion">Val 243</div>
						<div class="numero colorvalidacion">Val 244</div>
						<div class="numero colorvalidacion">Val 245</div>
					</div>
				</div>
				<marquee class="div4">CAB-1012 Cecilia</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de JANETHE
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorinv">106 Inv</div>
						<div class="numero colorinv">105 Inv</div>
						<div class="numero colorFuntionDiadema">104 Ope</div>
						<div class="numero colorFuntionDiadema">103 Ope</div>
						<div class="numero colorFuntionDiadema">102 Ope</div>
						<div class="numero colorFuntionDiadema">101 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 112</div>
						<div class="numero colorFuntionDiadema">Ope 111</div>
						<div class="numero colorFuntionDiadema">Ope 110</div>
						<div class="numero colorFuntionDiadema">Ope 109</div>
						<div class="numero colorFuntionDiadema">Ope 108</div>
						<div class="numero colorFuntionDiadema">Ope 107</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1001 Janethe</marquee>
		</div>
		se cierra isla

		Empieza isla de Daniel
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorvalidacion">246 Val</div>
						<div class="numero colorvalidacion">247 Val</div>
						<div class="numero colorvalidacion">248 Val</div>
						<div class="numero colorvalidacion">249 Val</div>
						<div class="numero colorvalidacion">250 Val</div>
						<div class="numero colorinv">251 Inv</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 252</div>
						<div class="numero colorFuntionDiadema">Ope 253</div>
						<div class="numero colorFuntionDiadema">Ope 254</div>
						<div class="numero colorFuntionDiadema">Ope 255</div>
						<div class="numero colorFuntionDiadema">Ope 256</div>
						<div class="numero colorFuntionDiadema">Ope 257</div>
					</div>
				</div>
				<marquee class="div4">CAB-1013 Daniel</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de CAB-1002
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">118 Ope</div>
						<div class="numero colorFuntionDiadema">117 Ope</div>
						<div class="numero colorFuntionDiadema">116 Ope</div>
						<div class="numero colorFuntionDiadema">115 Ope</div>
						<div class="numero colorFuntionDiadema">114 Ope</div>
						<div class="numero colorFuntionDiadema">113 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 124</div>
						<div class="numero colorFuntionDiadema">Ope 123</div>
						<div class="numero colorFuntionDiadema">Ope 122</div>
						<div class="numero colorFuntionDiadema">Ope 121</div>
						<div class="numero colorFuntionDiadema">Ope 120</div>
						<div class="numero colorFuntionDiadema">Ope 119</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1002</marquee>
		</div>
		se cierra isla

		Empieza isla de CAB-1014
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">258 Ope</div>
						<div class="numero colorFuntionDiadema">259 Ope</div>
						<div class="numero colorFuntionDiadema">260 Ope</div>
						<div class="numero colorFuntionDiadema">261 Ope</div>
						<div class="numero colorFuntionDiadema">262 Ope</div>
						<div class="numero colorFuntionDiadema">263 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorvalidacion">Val 264</div>
						<div class="numero colorvalidacion">Val 265</div>
						<div class="numero colorvalidacion">Val 266</div>
						<div class="numero colorvalidacion">Val 267</div>
						<div class="numero colorFuntionDiadema">Ope 268</div>
						<div class="numero colorFuntionDiadema">Ope 269</div>
					</div>
				</div>
				<marquee class="div4">CAB-1014</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de DANTE
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">130 Ope</div>
						<div class="numero colorFuntionDiadema">129 Ope</div>
						<div class="numero colorFuntionDiadema">128 Ope</div>
						<div class="numero colorFuntionDiadema">127 Ope</div>
						<div class="numero colorFuntionDiadema">126 Ope</div>
						<div class="numero colorFuntionDiadema">125 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 136</div>
						<div class="numero colorFuntionDiadema">Ope 135</div>
						<div class="numero colorFuntionDiadema">Ope 134</div>
						<div class="numero colorFuntionDiadema">Ope 133</div>
						<div class="numero colorFuntionDiadema">Ope 132</div>
						<div class="numero colorFuntionDiadema">Ope 131</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1003 Dante</marquee>
		</div>
		se cierra isla

		Empieza isla de Alejandro
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">270 Ope</div>
						<div class="numero colorFuntionDiadema">271 Ope</div>
						<div class="numero colorFuntionDiadema">272 Ope</div>
						<div class="numero colorFuntionDiadema">273 Ope</div>
						<div class="numero colorFuntionDiadema">274 Ope</div>
						<div class="numero colorFuntionDiadema">275 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 276</div>
						<div class="numero colorFuntionDiadema">Ope 277</div>
						<div class="numero colorFuntionDiadema">Ope 278</div>
						<div class="numero colorFuntionDiadema">Ope 279</div>
						<div class="numero colorFuntionDiadema">Ope 280</div>
						<div class="numero colorFuntionDiadema">Ope 281</div>
					</div>
				</div>
				<marquee class="div4">CAB-1015 Alejandro</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de Navil
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">142 Ope</div>
						<div class="numero colorFuntionDiadema">141 Ope</div>
						<div class="numero colorFuntionDiadema">140 Ope</div>
						<div class="numero colorFuntionDiadema">139 Ope</div>
						<div class="numero colorFuntionDiadema">138 Ope</div>
						<div class="numero colorFuntionDiadema">137 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 148</div>
						<div class="numero colorFuntionDiadema">Ope 147</div>
						<div class="numero colorFuntionDiadema">Ope 146</div>
						<div class="numero colorFuntionDiadema">Ope 145</div>
						<div class="numero colorFuntionDiadema">Ope 144</div>
						<div class="numero colorFuntionDiadema">Ope 143</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1004 Navil</marquee>
		</div>
		se cierra isla

		Empieza isla de CAB-1016
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">282 Ope</div>
						<div class="numero colorFuntionDiadema">283 Ope</div>
						<div class="numero colorFuntionDiadema">284 Ope</div>
						<div class="numero colorFuntionDiadema">285 Ope</div>
						<div class="numero colorFuntionDiadema">286 Ope</div>
						<div class="numero colorFuntionDiadema">287 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 288</div>
						<div class="numero colorFuntionDiadema">Ope 289</div>
						<div class="numero colorFuntionDiadema">Ope 290</div>
						<div class="numero colorFuntionDiadema">Ope 291</div>
						<div class="numero colorFuntionDiadema">Ope 292</div>
						<div class="numero colorFuntionDiadema">Ope 293</div>
					</div>
				</div>
				<marquee class="div4">CAB-1016</marquee>
			</div>
			
		</div>
		se cierra


		Empieza isla de CAB-1005
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">154 Ope</div>
						<div class="numero colorFuntionDiadema">153 Ope</div>
						<div class="numero colorFuntionDiadema">152 Ope</div>
						<div class="numero colorFuntionDiadema">151 Ope</div>
						<div class="numero colorFuntionDiadema">150 Ope</div>
						<div class="numero colorFuntionDiadema">149 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 160</div>
						<div class="numero colorFuntionDiadema">Ope 159</div>
						<div class="numero colorFuntionDiadema">Ope 158</div>
						<div class="numero colorFuntionDiadema">Ope 157</div>
						<div class="numero colorFuntionDiadema">Ope 156</div>
						<div class="numero colorFuntionDiadema">Ope 155</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1005</marquee>
		</div>
		se cierra isla

		Empieza isla de Cautiño
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">294 Ope</div>
						<div class="numero colorFuntionDiadema">295 Ope</div>
						<div class="numero colorFuntionDiadema">296 Ope</div>
						<div class="numero colorFuntionDiadema">297 Ope</div>
						<div class="numero colorFuntionDiadema">298 Ope</div>
						<div class="numero colorFuntionDiadema">299 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 300</div>
						<div class="numero colorFuntionDiadema">Ope 301</div>
						<div class="numero colorFuntionDiadema">Ope 302</div>
						<div class="numero colorFuntionDiadema">Ope 303</div>
						<div class="numero colorFuntionDiadema">Ope 304</div>
						<div class="numero colorinv">SIS 305</div>
					</div>
				</div>
				<marquee class="div4">CAB-1017 Cautiño</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de Lalo/Rafael
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">166 Ope</div>
						<div class="numero colorFuntionDiadema">165 Ope</div>
						<div class="numero colorFuntionDiadema">164 Ope</div>
						<div class="numero colorFuntionDiadema">163 Ope</div>
						<div class="numero colorFuntionDiadema">162 Ope</div>
						<div class="numero colorFuntionDiadema">161 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 172</div>
						<div class="numero colorFuntionDiadema">Ope 171</div>
						<div class="numero colorFuntionDiadema">Ope 170</div>
						<div class="numero colorFuntionDiadema">Ope 169</div>
						<div class="numero colorFuntionDiadema">Ope 168</div>
						<div class="numero colorFuntionDiadema">Ope 167</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-006 Lalo/Rafael</marquee>
		</div>
		se cierra isla

		Empieza isla de Coordinador
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2__coordinador">
				<div class="coordinador__coach---sistemas">
					<img src="<?=base_url?>/assets/img/mesaeci2.png" class="img2">
					<div class="generenteOperaciones">Gerente de Operaciones</div>
				</div>
				<div class="coordinador__coach---sistemas">
					<img src="<?=base_url?>/assets/img/sistemas.png" class="img2">
					<div class="sistemas">Sistemas</div>
				</div>
				
			</div>
		</div>
		se cierra

		Empieza isla de CAB-1007
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">178 Ope</div>
						<div class="numero colorFuntionDiadema">177 Ope</div>
						<div class="numero colorFuntionDiadema">176 Ope</div>
						<div class="numero colorFuntionDiadema">175 Ope</div>
						<div class="numero colorFuntionDiadema">174 Ope</div>
						<div class="numero colorFuntionDiadema">173 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 184</div>
						<div class="numero colorFuntionDiadema">Ope 183</div>
						<div class="numero colorFuntionDiadema">Ope 182</div>
						<div class="numero colorFuntionDiadema">Ope 181</div>
						<div class="numero colorFuntionDiadema">Ope 180</div>
						<div class="numero colorFuntionDiadema">Ope 179</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1007</marquee>
		</div>
		se cierra isla

		Empieza isla de CAB-1018
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">306 Ope</div>
						<div class="numero colorFuntionDiadema">307 Ope</div>
						<div class="numero colorFuntionDiadema">308 Ope</div>
						<div class="numero colorFuntionDiadema">309 Ope</div>
						<div class="numero colorFuntionDiadema">310 Ope</div>
						<div class="numero colorFuntionDiadema">311 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 312</div>
						<div class="numero colorFuntionDiadema">Ope 313</div>
						<div class="numero colorFuntionDiadema">Ope 314</div>
						<div class="numero colorFuntionDiadema">Ope 315</div>
						<div class="numero colorFuntionDiadema">Ope 316</div>
						<div class="numero colorFuntionDiadema">Ope 317</div>
					</div>
				</div>
				<marquee class="div4">CAB-1018</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de Oscar
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">190 Ope</div>
						<div class="numero colorFuntionDiadema">189 Ope</div>
						<div class="numero colorFuntionDiadema">188 Ope</div>
						<div class="numero colorFuntionDiadema">187 Ope</div>
						<div class="numero colorFuntionDiadema">186 Ope</div>
						<div class="numero colorFuntionDiadema">185 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">196 Ope</div>
						<div class="numero colorFuntionDiadema">195 Ope</div>
						<div class="numero colorFuntionDiadema">194 Ope</div>
						<div class="numero colorFuntionDiadema">193 Ope</div>
						<div class="numero colorFuntionDiadema">192 Ope</div>
						<div class="numero colorFuntionDiadema">191 Ope</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1008 Oscar</marquee>
		</div>
		se cierra isla

		Empieza isla de CAB-1019
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">318 Ope</div>
						<div class="numero colorFuntionDiadema">319 Ope</div>
						<div class="numero colorFuntionDiadema">320 Ope</div>
						<div class="numero colorFuntionDiadema">321 Ope</div>
						<div class="numero colorFuntionDiadema">322 Ope</div>
						<div class="numero colorFuntionDiadema">323 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 324</div>
						<div class="numero colorFuntionDiadema">Ope 325</div>
						<div class="numero colorFuntionDiadema">Ope 326</div>
						<div class="numero colorFuntionDiadema">Ope 327</div>
						<div class="numero colorFuntionDiadema">Ope 328</div>
						<div class="numero colorFuntionDiadema">Ope 329</div>
					</div>
				</div>
				<marquee class="div4">CAB-1019</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de Fernando
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">202 Ope</div>
						<div class="numero colorFuntionDiadema">201 Ope</div>
						<div class="numero colorFuntionDiadema">200 Ope</div>
						<div class="numero colorFuntionDiadema">199 Ope</div>
						<div class="numero colorFuntionDiadema">198 Ope</div>
						<div class="numero colorFuntionDiadema">197 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 208</div>
						<div class="numero colorFuntionDiadema">Ope 207</div>
						<div class="numero colorFuntionDiadema">Ope 206</div>
						<div class="numero colorFuntionDiadema">Ope 205</div>
						<div class="numero colorFuntionDiadema">Ope 204</div>
						<div class="numero colorFuntionDiadema">Ope 203</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1009 Fernando</marquee>
		</div>
		se cierra isla

		Empieza isla de CAB-1020
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">330 Ope</div>
						<div class="numero colorFuntionDiadema">331 Ope</div>
						<div class="numero colorFuntionDiadema">332 Ope</div>
						<div class="numero colorFuntionDiadema">333 Ope</div>
						<div class="numero colorFuntionDiadema">334 Ope</div>
						<div class="numero colorFuntionDiadema">335 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 336</div>
						<div class="numero colorFuntionDiadema">Ope 337</div>
						<div class="numero colorFuntionDiadema">Ope 338</div>
						<div class="numero colorFuntionDiadema">Ope 339</div>
						<div class="numero colorFuntionDiadema">Ope 340</div>
						<div class="numero colorFuntionDiadema">Ope 341</div>
					</div>
				</div>
				<marquee class="div4">CAB-1020</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de CAB-1010
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">214 Ope</div>
						<div class="numero colorFuntionDiadema">213 Ope</div>
						<div class="numero colorFuntionDiadema">212 Ope</div>
						<div class="numero colorFuntionDiadema">211 Ope</div>
						<div class="numero colorFuntionDiadema">210 Ope</div>
						<div class="numero colorFuntionDiadema">209 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 220</div>
						<div class="numero colorFuntionDiadema">Ope 219</div>
						<div class="numero colorFuntionDiadema">Ope 218</div>
						<div class="numero colorFuntionDiadema">Ope 217</div>
						<div class="numero colorFuntionDiadema">Ope 216</div>
						<div class="numero colorFuntionDiadema">Ope 215</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1010</marquee>
		</div>
		se cierra isla

		Empieza isla de CAB-1021
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">342 Ope</div>
						<div class="numero colorFuntionDiadema">343 Ope</div>
						<div class="numero colorFuntionDiadema">344 Ope</div>
						<div class="numero colorFuntionDiadema">345 Ope</div>
						<div class="numero colorFuntionDiadema">346 Ope</div>
						<div class="numero colorFuntionDiadema">347 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorinv">348</div>
						<div class="numero colorinv">349</div>
						<div class="numero colorinv">350</div>
						<div class="numero colorinv">351</div>
						<div class="numero colorinv">352</div>
						<div class="numero colorinv">353</div>
					</div>
				</div>
				<marquee class="div4">CAB-1021</marquee>
			</div>
			
		</div>
		se cierra

		Empieza isla de CAB-1011
		<div class="contenedor">
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorFuntionDiadema">226 Ope</div>
						<div class="numero colorFuntionDiadema">225 Ope</div>
						<div class="numero colorFuntionDiadema">224 Ope</div>
						<div class="numero colorFuntionDiadema">223 Ope</div>
						<div class="numero colorFuntionDiadema">222 Ope</div>
						<div class="numero colorFuntionDiadema">221 Ope</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorFuntionDiadema">Ope 232</div>
						<div class="numero colorFuntionDiadema">Ope 231</div>
						<div class="numero colorFuntionDiadema">Ope 230</div>
						<div class="numero colorFuntionDiadema">Ope 229</div>
						<div class="numero colorFuntionDiadema">Ope 228</div>
						<div class="numero colorFuntionDiadema">Ope 227</div>
					</div>
				</div>
				
			</div>
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
			</div>
			<marquee class="div4">CAB-1011</marquee>
		</div>
		se cierra isla

		Empieza isla de CAB-1022
		<div class="estecontenido">
			<div class="contenedor3">
				<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
				<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
			</div>
			<div class="contenedor2">
				<div class="divs div1">
					<div class="contenido-div">
						<div class="numero colorinv">354</div>
						<div class="numero colorinv">355</div>
						<div class="numero colorinv">356</div>
						<div class="numero colorinv">357</div>
						<div class="numero colorinv">358</div>
						<div class="numero colorinv">359</div>
					</div>
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
					<i class='bx bx-child bx-flashing bx-md'></i>
				</div>
				<div class="div2">
					
				</div>
				<div class="laptops">
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
					<i class='bx bx-child bx-flashing bx-rotate-180 bx-md' ></i>
				</div>

				<div class="divs div3">
					<div class="contenido-div">					
						<div class="numero colorinv">360</div>
						<div class="numero colorinv">361</div>
						<div class="numero colorinv">362</div>
						<div class="numero colorinv">363</div>
						<div class="numero colorinv">364</div>
						<div class="numero colorinv">365</div>
					</div>
				</div>
				<marquee class="div4">CAB-1022</marquee>
			</div>
			
		</div>
		se cierra
		


	</div>
-->
	<hr>
	<hr>

	<div class="contenido-principal">
		<?php foreach ($iniciados as $key):?>
			<?php if ($key['num_isla'] == '0') {
				echo "<div class='parte1__individual parteCalidad' style='visibility: hidden;'> </div>";
			} ?>
			<div class="estecontenido">
				<div class="contenedor3">
					<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
					<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
				</div>
				
				<div class="contenedor2">
					<div class="divs div1">
						<div class="contenido-div">
						<?php foreach($key['mamparas'] as $mapara_uno): ?>
							<?php if($mapara_uno['activo'] == '0'){
								echo '<div class="numero colorinv">234 Val</div>';
							}else if($mapara_uno['activo'] == '1'){

								if ($mapara_uno['ventas'] == '0') {
									echo '<div class="numero colorFuntionDiadema_0">234 Val</div>';
								}else if ($mapara_uno['ventas'] == '1'){
									echo '<div class="numero colorFuntionDiadema_1">234 Val</div>';
								}else if ($mapara_uno['ventas'] == '2'){
									echo '<div class="numero colorFuntionDiadema">234 Val</div>';
								}else if ($mapara_uno['ventas'] >= '3'){
									echo '<div class="numero colorFuntionDiadema_3">234 Val</div>';
								}

							}else if($mapara_uno['activo'] == '2'){
								echo '<div class="numero colorvalidacion">234 Val</div>';
							}?>
						<?php endforeach; ?>
						</div>
					</div>
					<div class="laptops">
						<i class='bx bx-child bx-md'></i>
						<i class='bx bx-child bx-md'></i>
						<i class='bx bx-child bx-md'></i>
						<i class='bx bx-child bx-md'></i>
						<i class='bx bx-child bx-md'></i>
						<i class='bx bx-child bx-md'></i>
						
					</div>
					<div class="div2">
						
					</div>
					<div class="laptops">
						<i class='bx bx-child bx-flip-vertical bx-md' ></i>
						<i class='bx bx-child bx-flip-vertical bx-md' ></i>
						<i class='bx bx-child bx-flip-vertical bx-md' ></i>
						<i class='bx bx-child bx-flip-vertical bx-md' ></i>
						<i class='bx bx-child bx-flip-vertical bx-md' ></i>
						<i class='bx bx-child bx-flip-vertical bx-md' ></i>
					</div>

					<div class="divs div3">
						<div class="contenido-div">		
						<?php foreach($key['mamparas_2'] as $mapara_dos): ?>
							<?php if($mapara_dos['activo'] == '0'){
								echo '<div class="numero colorinv">234 Val</div>';
							}else if($mapara_dos['activo'] == '1'){
								if ($mapara_dos['ventas'] == '0') {
									echo '<div class="numero colorFuntionDiadema_0">234 Val</div>';
								}else if ($mapara_dos['ventas'] == '1'){
									echo '<div class="numero colorFuntionDiadema_1">234 Val</div>';
								}else if ($mapara_dos['ventas'] == '2'){
									echo '<div class="numero colorFuntionDiadema">234 Val</div>';
								}else if ($mapara_dos['ventas'] >= '3'){
									echo '<div class="numero colorFuntionDiadema_3">234 Val</div>';
								}

							}else if($mapara_dos['activo'] == '2'){
								echo '<div class="numero colorvalidacion">234 Val</div>';
							}?>			
	
						<?php endforeach; ?>
						</div>
					</div>
					<marquee class="div4"><?php echo $key['nombre']; ?></marquee>
				</div>
			</div>

			<?php if ($key['num_isla'] == '11') {
			echo " <div class='estecontenido'>
					<div class='contenedor3'>
						<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
						<img src='<?=base_url?>/assets/img/escritorioder.png' class='img1'>
					</div>
					<div class='contenedor2__coordinador'>
						<div class='coordinador__coach---sistemas'>
							<img src='<?=base_url?>/assets/img/mesaeci2.png' class='img2'>
						<div class='generenteOperaciones'>Gerente de Operaciones</div>
					</div>
					<div class='coordinador__coach---sistemas'>
						<img src='<?=base_url?>/assets/img/sistemas.png' class='img2'>
						<div class='sistemas'>Sistemas</div>
						</div>
					</div>
				</div> ";
			} ?>
		<?php endforeach; ?>
		
	</div>
	
</body>
</html>