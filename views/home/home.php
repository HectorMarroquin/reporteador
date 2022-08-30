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
           Ultima hora de actualización: <span style="font-weight: bold"><?=$reg->Hora?></span>
      </div>
  </div>
</div>

</section>


<section class="info-section bg-light text-muted" id="info-section">

<div class="container">
  <div class="row align-items-center">
    
    <div class="col-sm">
      <h1>REPORTE POR CENTROS</h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Centro</th>
            <th scope="col">Ventas</th>
          </tr>
        </thead>
        <tbody>

          <?php while ($centro = $centros->fetch_object()) : ?>

            <tr>
                <td><?= $centro->nombre ?></td>
                <td><?= $centro->ventas ?></td>
              
            </tr>
          <?php endwhile;?>

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