<?php
require_once 'views/layout/header.php';
require_once 'helpers/permisos.php';
?>
<?php //Uusarios
      $sesionAdmin = $_SESSION['identity']->idgrupo == "42";
      $sesionCoach = $_SESSION['identity']->idgrupo == "150";
      $sesionCoordinador = $_SESSION['identity']->idgrupo == "193";
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
              <?php if($sesionAdmin) :?>
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
                  <?php endif;?>
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
                     
                      <!-- permiso solo mostar los datos del coach cm ejecutivos -->
                      <?php if($sesionCoach && $dato["nomCoach"] === $_SESSION['identity']->Nombre) : ?>
                        <tr class="<?=$res?>">
                          <?php $tablaCM = Permisos::cmEjecutivos($dato);
                          echo $tablaCM;?>
                        </tr>
                      <?php elseif($sesionCoordinador) :?>
                        <!-- permisos de coordinar solo se mostrara en la zona que esta con sus respectivos coach -->
                        <?php if($dato['nomCoach'] != "CAE CONTACT" && $dato['nomCoach'] != "HOMEOFFICE Y COMISIONISTA" && $dato['nomCoach'] != "TEZIUTLAN CONTACT" && $dato['nomCoach'] != "ZACAPOAXTLA CONTACT" && $dato['nomCoach'] != "MELENDEZ SERRANO CECILIA MICHEL") : ?>
                          <tr class="<?=$res?>">
                            <?php $tablaCM = Permisos::cmEjecutivos($dato);
                            echo $tablaCM;?>
                          </tr>
                          <?php endif; ?>
                        <?php elseif($sesionAdmin): ?>
                          <!-- permisos del Admin se muestran todas las filas de la tabla -->
                          <tr class="<?=$res?>">
                          <?php $tablaCM = Permisos::cmEjecutivos($dato);
                          echo $tablaCM;?>
                          </tr>
                      <?php endif; ?>
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