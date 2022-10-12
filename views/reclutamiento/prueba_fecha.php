<?php
require_once 'views/layout/header.php';
?>
<section class="info-section-head">
  
  <div class="container">
  <div class="row align-items-center">
    <div class="col-sm">
      <h1>LCC RECLUTAMIENTO</h1>
    </div>
    <div class="col-sm">
      <img id="img-home" class="img-fluid" src="<?=base_url?>/assets/img/lcc_azul.png">
    </div>
  </div>

</section>

<section class="info-section bg-light text-muted" id="info-section">

<div class="container">
  <!-- Buscador de fechas -->

  <div class="buscador_fecha">
      <div class="row justify-content-center">
                     
        <div class="col-sm-2">
          <div class="col-xs-1">
            <button type="button" class="btn btn-outline-success btn-sm" id="btnEnviar">Consultar fechas</button> 
          </div>
        </div>
      </div>
  </div>

  <br><br>

  <div class="row align-items-center">

    <div class="col-sm table-responsive-sm">
      <div class="col-sm">
       <h1>REPORTE POR RECLUTADOR</h1>
      </div>

      <table class="table caption-top">
        
        <thead>
          <tr>
            <th scope="col-sm">Reclutador</th>
            <th scope="col-sm">Citados</th>
            <th scope="col-sm">Entrevista</th>
            <th scope="col-sm">%</th>
            <th scope="col-sm">Aceptados</th>
            <th scope="col-sm">%</th>
            <th scope="col-sm">Cartera</th>
            <th scope="col-sm">%</th>
          </tr>
        </thead>
        <tbody id="reclutadores">
             <?php foreach ($repor_recl as $key => $reclutador) : ?>
            <tr>
                <td><?= $reclutador['nombre']?></td>
                <td><?= $reclutador['citado']?></td>
                <td><?= $reclutador['entrevista']?></td>
                <td><?= $reclutador['porc_entr']?>%</td>
                <td><?= $reclutador['aceptado']?></td>
                <td><?= $reclutador['porc_acpt']?>%</td>
                <td><?= $reclutador['cartera']?></td>
                <td><?= $reclutador['porc_cart']?>%</td>
              
            </tr>
          <?php endforeach;?>
          <?php foreach ($total_recl as $key => $total) : ?>

            <tr class="table-active fw-bold">
                <td><?= $total['nombre']?></td>
                <td><?= $total['citados']?></td>
                <td><?= $total['entrevista']?></td>
                <td><?= $total['porc_entr']?>%</td>
                <td><?= $total['aceptados']?></td>
                <td><?= $total['porc_acpt']?>%</td>
                <td><?= $total['cartera']?></td>
                <td><?= $total['porc_cart']?>%</td>              
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>

  <br><br>
  <div class="row align-items-center">
    <div class="col-sm table-responsive-sm">

      <div class="col-sm">
       <h1>REPORTE POR CURSO</h1>
      </div>

      <table class="table caption-top">
        
        <thead>
          <tr>
            <th scope="col-sm">Curso</th>
            <th scope="col-sm">Turno</th>
            <th scope="col-sm">Inicio</th>
            <th scope="col-sm">Fin</th>
            <th scope="col-sm">Entrega</th>
            <th scope="col-sm">Citados</th>            
            <th scope="col-sm">Asistidos</th>
            <th scope="col-sm">%</th>
            <th scope="col-sm">Entregados</th>
            <th scope="col-sm">%</th>
          </tr>
        </thead>
        <tbody id="cursos">
             <?php foreach ($repor_curs as $key => $curso) : ?>
            <tr>
                <td><?= $curso['curso']?></td>
                <td><?=$curso['turno']?></td>
                <td><?=$curso['fecha_i']?></td>
                <td><?=$curso['fecha_f']?></td>
                <td><?= $curso['fecha_e']?></td>
                <td><?= $curso['citado']?></td> 
                <td><?= $curso['asistido']?></td>
                <td><?= $curso['porc_asist']?>%</td> 
                <td><?= $curso['entregado']?></td>
                <td><?= $curso['porc_entr']?>%</td>               
            </tr>
          <?php endforeach;?>
          <?php foreach ($total_curs as $key => $total) : ?>

            <tr class="table-active fw-bold">
                <td colspan="5"><?= $total['nombre']?></td>
                <td><?= $total['citados']?></td>
                <td><?= $total['asistido']?></td>
                <td><?= $total['porc_asist']?>%</td>
                <td><?= $total['entregado']?></td>
                <td><?= $total['porc_entr']?>%</td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>

<br><br>
  <div class="row align-items-center">
    <div class="col-sm table-responsive-sm">
      <div class="col-sm">
       <h1>REPORTE POR SEGUIMIENTO</h1>
      </div>
        <?php foreach ($repor_seg as $key => $seguimiento) : ?>
          <br><br>
        <table class="table caption-top">
        <thead>
          <tr>
            <th scope="col-sm">Curso: <?= $seguimiento['curso'].' '.$seguimiento['turno'] ?></th>
            <th scope="col-sm">Campaña: <?= $seguimiento['campania'] ?></th>
            <th scope="col-sm">Modalidad: <?= $seguimiento['modalidad'] ?></th>
            <th scope="col-sm">Fecha Entrega Operación: <?= $seguimiento['fecha_e'] ?></th>
          </tr>
        </thead>
        <thead>
                  <tr>
                    <th scope='col'>Reclutador</th>
                    <th scope='col'>Citados</th>
                    <th scope='col'>Asistidos</th>
                    <th scope='col'>Entregados</th>
                  </tr>
         </thead>
        <tbody>
            <!-- Despliega informacion de los reclutadores -->
              <?php foreach ($seguimiento['reclutadores'] as $key => $value):
                ?>
                <tr>
              <?php foreach($value as $ky => $val):
                ?>
                  
                    <th scope='col'><?=$val?></th>
                <?php 
                endforeach;?>
                 </tr>
                <?php endforeach;?>
        
         <!-- Muestra el total obtenido--> 
         <tr class="table-active fw-bold">
                <td><?= $seguimiento['TOTAL']['nombre']?></td>
                <td><?= $seguimiento['TOTAL']['citados']?></td>
                <td><?=$seguimiento['TOTAL']['asistido']?></td>                
                <td><?= $seguimiento['TOTAL']['entregado']?></td>
            </tr>
          

        </tbody>
      </table> 
        <?php endforeach;?>
    </div>
  </div>
</div>
</section>
<?php
require_once 'views/layout/footer.php';
?>

<script>var base_url = '<?= base_url ?>';</script>
<script src="<?=base_url?>assets/js/funciones_reclutamiento.js"></script>
