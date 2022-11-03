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
                <div class="table-responsive-sm table-wrapper">
                <table class="table table-striped table-hover caption-top">
                <caption>DESGLOSE CM</caption>
                    <thead>
                        <tr>
                            <th scope="row col-sm">ID</th>
                            <th scope="row col-sm">TLMK</th>
                            <th scope="row col-sm">NOMBRE</th>
                            <th scope="row col-sm">VENTAS</th>
                            <th scope="row col-sm">FVC</th>
                            <th scope="row col-sm">%FVC</th>
                            <th scope="row col-sm">ALTA</th>
                            <th scope="row col-sm">%ALTA</th>
                            <th scope="row col-sm">COACH</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($desglose as $key => $dato):?>
                      <?php $res = $dato['user'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>
                     
                      <tr class="<?=$res?>">
                        <td><?= $dato["nomina"];?></td>
                        <td><?= $dato["tlmk"];?></td>
                        <td><?= $dato["user"];?></td>
                        <td><?= $dato["venta"];?></td>
                        <td><?= $dato["fvc"];?></td>
                        <td><?= $dato["porcentajefvc"];?></td>
                        <td><?= $dato["alta"];?></td>
                        <td><?= $dato["porcentajealta"];?></td>
                        <td><?= $dato["nomCoach"];?></td>
                        
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