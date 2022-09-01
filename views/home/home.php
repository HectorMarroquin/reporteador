<?php
require_once 'views/layout/header.php';
?>

<section class="info-section-head">
  
  <div class="container">
  <div class="row align-items-center">
    <div class="col-sm">
      <h1>LCC REPORTES</h1>
    </div>
    <div class="col-sm">
      <img id="img-home" class="img-fluid" src="<?=base_url?>/assets/img/lcc_azul.png">
    </div>
  </div>

  <div class="row">
      <div class="col-sm">
           Ultima hora de actualización: <span style="font-weight: bold"><?= $reg ?></span>
      </div>
  </div>
</div>

</section>


<section class="info-section bg-light text-muted" id="info-section">

<div class="container">
  <div class="row align-items-center">
    
    <div class="col-sm table-responsive-sm">
      <table class="table caption-top">
         <caption>Reporte por centros</caption>
        <thead>
          <tr>
            <th scope="col-sm">Centro</th>
            <th scope="col-sm">Prepago</th>
            <th scope="col-sm">Pospago</th>
            <th scope="col-sm">Pos/pre</th>
            <th scope="col-sm">% Pos</th>
            <th scope="col-sm">Asistencia</th>
            <th scope="col-sm">Factor</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($desglose as $key => $centro) : ?>

            <tr>
                <td><?= $centro['nombre']?></td>
                <td><?= $centro['prepago']?></td>
                <td><?= $centro['pospago']?></td>
                <td><?= $centro['totales']?></td>
                <td><?= $centro['porcentaje']?>%</td>
                <td><?= $centro['asistencia']?></td>
                <td><?= $centro['factor']?>%</td>
              
            </tr>
          <?php endforeach;?>

          <?php foreach ($total_acum as $key => $total) : ?>

            <tr class="table-active fw-bold">
                <td><?= $total['nombre']?></td>
                <td><?= $total['prepago']?></td>
                <td><?= $total['pospago']?></td>
                <td><?= $total['totales']?></td>
                <td><?= $total['porcentaje']?>%</td>
                <td><?= $total['asistencia']?></td>
                <td><?= $total['factor']?>%</td>
              
            </tr>
          <?php endforeach;?>

        </tbody>
      </table>


    </div>

    <div class="col-sm">
      <h1>REPORTE POR SECTOR</h1>
    </div>

  </div>
</div>


</section>



<?php
require_once 'views/layout/footer.php';
?>