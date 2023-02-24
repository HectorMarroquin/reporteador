<?php
require_once 'views/layout/header.php';
require_once 'helpers/permisos.php';
?>
<?php //Usuarios

      $rol      = $_SESSION['identity']->idgrupo;
      $admincor = ['42','220','227','157','32','193','237'];

?>

<section class="info-section-head">
  
  <div class="container">
  <div class="row align-items-center">
    <div class="col-sm">
      <h1>DESGLOSE CM <span style="font-weight: bold"><?= $mes_actual ?></span></h1>
    </div>
    <div class="col-sm">
      <img id="img-home" class="img-fluid" src="<?=base_url?>/assets/img/lcc_azul.png">
    </div>
  </div>
  <div class="row">
      <div class="col-sm">
           Ultima fecha actualización CM: <span style="font-weight: bold"><?= $reg ?></span>
      </div>
  </div>
</div>
</section>

<section class="info-section bg-light text-muted" id="info-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm table-responsive-sm">
                  <table class="table table-striped table-hover caption-top">
                  <caption>CM COACHES</caption>
                      <thead>
                          <tr>
                              <th scope="row col-sm">COACH</th>
                              <th scope="row col-sm">VENTAS</th>
                              <th scope="row col-sm">FVC</th>
                              <th scope="row col-sm">%FVC</th>
                              <th scope="row col-sm">ALTA</th>
                              <th scope="row col-sm">%ALTA</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($desglosCoach as $key => $alta):?>
                        <?php $res = $alta['coach'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>
                      
                        <tr class="<?=$res?>">
                          <td><?= $alta["coach"];?></td>
                          <td><?= $alta["venta"];?></td>
                          <td><?= $alta["fvc"];?></td>
                          <td><?= $alta["porcentajefvc"];?></td>
                          <td><?= $alta["altas"];?></td>
                          <td><?= $alta["porcentajealta"];?></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                  </table>
              </div>

              <div class="col-sm table-responsive-sm">
                  <table class="table table-striped table-hover caption-top">
                      <caption>CM SECTORES</caption>
                      <thead>
                        <tr>
                            <th scope="col-sm">LUGAR</th>
                            <th scope="col-sm">VENTAS</th>
                            <th scope="col-sm">FVC</th>
                            <th scope="col-sm">%FVC</th>
                            <th scope="col-sm">ALTA</th>
                            <th scope="col-sm">%ALTA</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($desgloSector as $key => $sector):?>

                        <!-- <?php $res = $sector['lugar'] == 'TOTAL' ? 'table-active fw-bold' : '' ?> -->
                      
                        <tr class="<?=$res?>">
                          <td><?= $sector["lugar"];?></td>
                          <td><?= $sector["ventas"];?></td>
                          <td><?= $sector["fvc"];?></td>
                          <td><?= $sector["fvcporc"];?></td>
                          <td><?= $sector["alta"];?></td>
                          <td><?= $sector["altaporc"];?></td>
                          
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
    </section>

<section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row">
              <caption>CM EJECUTIVOS</caption>
               
                <div class="table-responsive-sm table-wrapper">
                <table class="table table-striped table-hover caption-top">
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
                            <td><?= $dato["nomina"] ?></td>
                            <td><?= $dato["tlmk"] ?></td>
                            <td><?= $dato["user"] ?></td>
                            <td><?= $dato["venta"] ?></td>
                            <td><?= $dato["fvc"] ?></td>
                            <td><?= $dato["porcentajefvc"] ?></td>
                            <td><?= $dato["alta"] ?></td>
                            <td><?= $dato["porcentajealta"] ?></td>
                            <td><?= $dato["nomCoach"] ?></td>
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