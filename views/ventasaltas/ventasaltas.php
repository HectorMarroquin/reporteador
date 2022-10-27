<?php
require_once 'views/layout/header.php';
?>
<section class="info-section-head">
  
  <div class="container">
  <div class="row align-items-center">
    <div class="col-sm">
      <h1>LCC VENTAS / ALTAS</h1>
    </div>
    <div class="col-sm">
      <img id="img-home" class="img-fluid" src="<?=base_url?>/assets/img/lcc_azul.png">
    </div>
  </div>
</div>

</section>

<section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row">
                <h1>Altas Coaches</h1>
                <div class="table-responsive-sm">
                <table class="table table-striped table-hover caption-top">
                    <thead>
                        <tr>
                            <th scope="row col-sm">Coach</th>
                            <th scope="row col-sm">ventas</th>
                            <th scope="row col-sm">FVC</th>
                            <th scope="row col-sm">%FVC</th>
                            <th scope="row col-sm">Alta</th>
                            <th scope="row col-sm">%Alta</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($desglosAltasCoach as $key => $altaCoach):?>
                      <?php $res = 'table-active fw-bold'; ?>
                      <tr>
                        <td><?= $altaCoach["coach"];?></td>
                        <td><?= $altaCoach["venta"];?></td>
                        <td><?= $altaCoach["fvc"];?></td>
                        <td><?= $altaCoach["porcentajefvc"];?></td>
                        <td><?= $altaCoach["altas"];?></td>
                        <td><?= $altaCoach["porcentajealta"];?></td>
                        
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </section>
<?php
require_once 'views/layout/footer.php';
?>