
<?php
require_once 'views/layout/header.php';
//require_once 'helpers/permisos.php'
$sesionGrupo = $_SESSION['identity']->idgrupo;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Modelado |ECI</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url?>/assets/css/estilos_mapeo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
         <div class="contenedor">
         	<?php foreach ($iniciados as $key):?>
             <div class="contenido-principal">
                 <!-- Contenido CAB12 -->
                 <?php if ($key['num_isla'] >= '12') : ?>
                 	<div class="col-9" onclick="abrir('<?php echo $key['nombre'];?>,<?php echo $key['num_isla'];?>')">
                 	  <p class="isla_nombre"><?php echo $key['nombre']; ?></p>
                 	</div>
                 <?php endif; ?>

                 <div class="col-2">
                     <div class="contenido-div1">
                     	<?php foreach($key['mamparas'] as $mapara_uno): ?>
                         <div class="numero colorvalidacion <?php echo $mapara_uno['color'];?> <?php echo $mapara_uno['turno'];?>"> <?php echo $mapara_uno['extension']; ?></div>
                    	<?php endforeach; ?>
                     </div>
                 </div>
     
                 <div class="col-3">
                     <div class="contenido-div2">     
                     <?php foreach($key['mamparas_2'] as $mapara_dos): ?>            
                         <div class="numero left-vertical <?php echo $mapara_dos['color'];?> <?php echo $mapara_dos['turno'];?>"> <?php echo $mapara_dos['extension']; ?></div>
                     <?php endforeach; ?>
                     </div>
                 </div>

                 <?php if ($key['num_isla'] < '12') : ?>
                 	<div class="col-9" onclick="abrir('<?php echo $key['nombre']; ?>,<?php echo $key['num_isla'];?>')">
                 	  <p class="isla_nombre"><?php echo $key['nombre']; ?></p>
                 	</div>
                 <?php endif; ?>
 
             </div>


             <?php if($key['num_isla'] == '6'): ?>

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

             <?php if($key['num_isla'] == '11'): ?>
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


         <script src="<?=base_url?>assets/js/funciones_mapeo.js"></script>
	
</body>
<!-- style="display:none;" -->
<div id="parte_black" style="visibility:hidden;" >

	<div id="contenedor-modal">
        <button id="cerrar" onclick="cerrar()">cerrar</button>
		
        <form action="<?=base_url ?>UsuarioLogin/index" method="POST" class="formulario-nombre">
		    <input type="text" name="nombre" value="" id="nombre" disabled>
		    <input type="hidden" name="idIsla" value="" id="idIsla">
            <label for="nuevo_nombre">Ingresa el nuevo nombre</label>
            <select id="nuevo_nombre" name="nuevo_nombre">
                <option value="0">----------</option>
                <?php foreach ($couches as $couch): ?>
                    <option value="<?php echo $couch["Id"];?>"><?php echo $couch["Nombre"]; ?></option>
                <?php endforeach; ?>
            </select>		    
            <?php if ($sesionGrupo == '42' || $sesionGrupo == '40' || $sesionGrupo == '212'):?>
		    <input type="submit" name="modificar_nombre" value="Modificar Nombre" id="Mod">
            <?php endif; ?>
		</form>
        
	</div>

</div>

</html>

<?php
require_once 'views/layout/footer.php';
?>