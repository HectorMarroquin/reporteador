
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

<!-- 	<div class="contenido-principal">

		<?php foreach ($iniciados as $key):?>
			<?php if ($key['num_isla'] == '0') :?>
				<div class='parte1__individual parteCalidad' style='visibility: hidden;'> </div>
			<?php endif; ?>


			<div class=" <?php echo $key['num_isla'] % 2 ? 'contenedor' : 'estecontenido' ?>">

			<?php if ($key['num_isla'] % 2 == 0) : ?>
				<div class="contenedor3">
					<i class='bx bxs-user-voice bx-flashing bx-lg' ></i>
					<img src="<?=base_url?>/assets/img/escritorioder.png" class="img1">
				</div>
			<?php endif; ?>

				<div class="contenedor2">
					<div class="divs div1">
						<div class="contenido-div">
							<?php foreach($key['mamparas'] as $mapara_uno): ?>
								<div class="numero <?php echo $mapara_uno['color']; ?>"> <?php echo $mapara_uno['extension']; ?> </div>

								<?php if($mapara_uno['extension'] == '359'): ?>
									<div class="numero colorvalidacion"> <?php echo $mapara_uno['extension']; ?> </div>
								<?php endif; ?>

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
							<div class="numero <?php echo $mapara_dos['color']; ?>"> <?php echo $mapara_dos['extension']; ?> </div>
						<?php endforeach; ?>
						</div>
					</div>
					
					<marquee class="div4"><?php echo $key['nombre']; ?></marquee>
				</div>
				<?php if ($key['num_isla'] == 1 || $key['num_isla'] == 3 || $key['num_isla'] == 5 || $key['num_isla'] == 7 || $key['num_isla'] == 9 || $key['num_isla'] == 11 || $key['num_isla'] == 13 || $key['num_isla'] == 15 || $key['num_isla'] == 17 || $key['num_isla'] == 19 || $key['num_isla'] == 21) : ?>
					<div class="contenedor3">
						<i class='bx bxs-user-voice bx-flashing bx-flip-horizontal bx-lg' ></i>
						<img src="<?=base_url?>/assets/img/escritorioizq.png" class="img1">
					</div>
				<?php endif; ?>	
			</div>

		<?php if($key['num_isla'] == '11'): ?>


			<div class='estecontenido'>
					<div class='contenedor4'>
						<img src='<?=base_url?>/assets/img/escritorioder.png' class='img1'>
						<div class='gerente'>Coordinacion de operaciones</div>
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
			</div>

		<?php endif; ?>

	<?php endforeach; ?>
		
	</div>
 -->

         <div class="contenedor">
         	<?php foreach ($iniciados as $key):?>
             <div class="contenido-principal">
                 <!-- Contenido CAB12 -->
                 <?php if ($key['num_isla'] >= '11') : ?>
                 	<div class="col-9">
                 	  <p><?php echo $key['nombre']; ?></p>
                 	</div>
                 <?php endif; ?>

                 <div class="col-2">
                     <div class="contenido-div1">
                     	<?php foreach($key['mamparas'] as $mapara_uno): ?>
                         <div class="numero colorvalidacion <?php echo $mapara_uno['color'];?> "> <?php echo $mapara_uno['extension']; ?></div>
                    	<?php endforeach; ?>
                     </div>
                 </div>
     
                 <div class="col-3">
                     <div class="contenido-div2">     
                     <?php foreach($key['mamparas_2'] as $mapara_dos): ?>            
                         <div class="numero left-vertical <?php echo $mapara_dos['color'];?>"> <?php echo $mapara_dos['extension']; ?></div>
                     <?php endforeach; ?>
                     </div>
                 </div>

                 <?php if ($key['num_isla'] < '11') : ?>
                 	<div class="col-9">
                 	  <p><?php echo $key['nombre']; ?></p>
                 	</div>
                 <?php endif; ?>
 
             </div>


             <?php if($key['num_isla'] == '5'): ?>

             	<div class="contenido-principal">
             	    <!-- Contenido SISTEMAS -->
             	    <div class="col-21">
             	        <div class="contenido-div1">
             	            <div class="coor sistems">Sistemas</div>
             	            <div class="coor sistems">Sistemas</div>
             	            <div class="coor gereope">Gerente de Operaciones</div>

             	        </div>
             	    </div>
             	    
             	
             	    <div class="col-9">
             	      <p>Coordinador</p>
             	    </div>
             	</div>

             <?php endif; ?>

             <?php if($key['num_isla'] == '10'): ?>
             	<div class="contenido-principal">
             	    <!-- Contenido VACIO -->
             	    <div class="col-91">
             	        <p></p>
             	    </div>
             	    <div class="col-2_1">
             	        <div class="contenido-div">
             	            
             	        </div>
             	    </div>
             	    
             	    <div class="col-3_1">
             	        <div class="contenido-div2">                 
             	            
             	        </div>
             	    </div>
             	</div>

             <?php endif; ?>

         	<?php endforeach; ?>
     
         </div>
	
</body>
</html>

<?php
require_once 'views/layout/footer.php';
?>