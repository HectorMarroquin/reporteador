<?php
require_once 'views/layout/header.php';
require_once 'helpers/permisos.php'
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
  <div class="row justify-content-center">
    
    <div class="col-sm-8 table-responsive-sm">
      <table class="table table-striped table-hover caption-top">
         <caption>Reporte Centros</caption>
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
          <?php if($sesionCoach || $sesionCoordinador) :?>  <!--coach y Coordinar que solo puede visiualizar LCC--->
            <?php if($centro['prefijo'] === "ECI") : ?>
             
            <?php $res = $centro['prefijo'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>
            <tr class="<?=$res?>">
            <?php $fila = Permisos::reporteCentro($centro);
            echo $fila;
            ?>
            </tr>
            <?php endif;?>
        <?php elseif($sesionAdmin) :?>
          <!-- perimisos a Admin puede ver toda la tabla reporte centro -->
            <tr class="<?=$res?>">
                <?php $fila = Permisos::reporteCentro($centro);
                echo $fila;
            ?>
            </tr>
            <?php endif;?>
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
              <div class="col-sm table-responsive-sm">
                    <!-- visualizan todos la cabecera de la tabla -->
                    <table class="table table-striped table-hover caption-top">
                    <caption>Reporte Pospago</caption>
                      <thead>
                        <tr>
                          <th scope="col-sm">Coach</th>
                          <th scope="col-sm">Exitosas</th>
                          <th scope="col-sm">Ingresadas</th>
                          <th scope="col-sm">Asistencia</th>
                          <th scope="col-sm">Factor</th>
                        </tr>
                      </thead>
                      <?php  ?>
                      <?php foreach ($desglosePos as $key => $centro) : ?>
                      <?php if($sesionCoach) :?>
                        <tbody>                
                          <?php if($centro['coach'] === $_SESSION['identity']->Nombre) :?> <!--solo pueden vesualizar sus datos de coach-->
                          <?php $res = $centro['coach'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>
                          <tr class="<?=$res?>">
                              <?php $tabladesglosePospago = Permisos::reportePospago($centro, $res);
                              echo $tabladesglosePospago;?>
                          </tr>
                          <?php endif;?>
                            <?php elseif($sesionCoordinador) : ?>
                              <?php if($centro['coach'] != "CAE CONTACT" && $centro['coach'] != "HOMEOFFICE Y COMISIONISTA" && $centro['coach'] != "TEZIUTLAN CONTACT" && $centro['coach'] != "ZACAPOAXTLA CONTACT" && $centro['coach'] != "MELENDEZ SERRANO CECILIA MICHEL") : ?>
                                <tr class="<?=$res?>">
                                <?php $tabladesglosePospago = Permisos::reportePospago($centro, $res);
                                echo $tabladesglosePospago;?>
                                </tr>
                                <?php endif;?>
                                  <?php elseif($sesionAdmin) : ?>
                                    <tr class="<?=$res?>">
                                    <?php $tabladesglosePospago = Permisos::reportePospago($centro, $res);
                                      echo $tabladesglosePospago;?>
                                    </tr>
                          <?php endif;?>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

            <div class="col-sm table-responsive-sm">
              
            <table class="table table-striped table-hover caption-top">
                <caption>Reporte Sectores</caption>
                <thead>
                  <tr>
                    <th scope="col-sm">Lugar</th>
                    <th scope="col-sm">Prepago</th>
                    <th scope="col-sm">Asistencia</th>
                    <th scope="col-sm">Factor</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($desgloSector as $key => $sector) : ?>
                  <?php $res = $sector['sector'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>
                  <tr class="<?=$res?>">
                      <td><?= $sector['sector']?></td>
                      <td><?= $sector['ventas']?></td>
                      <td><?= $sector['asistencia']?></td>
                      <td><?= $sector['factor']?>%</td>
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
          <div class="col-sm table-responsive-sm">
              <table class="table table-striped table-hover caption-top">
                <caption>Reporte Coaches</caption>
                <thead>
                  <tr>
                    <th scope="col-sm">Centro</th>
                    <th scope="col-sm">Prepago</th>
                    <th scope="col-sm">Migradas</th>
                    <th scope="col-sm">Pos/Base</th>
                    <th scope="col-sm">Total</th>
                    <th scope="col-sm">Asistencia</th>
                    <th scope="col-sm">Factor</th>
                    <th scope="col-sm">Horas Conexion</th>
                    <th scope="col-sm">Talk</th>
                    <th scope="col-sm">SPH</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($desgloseCoach as $key => $coach) : ?>

                <?php $res = $coach['coach'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>
                    <tr class="<?=$res?>">
                      <?php $tabladesgloseCoach = Permisos::reporteCoach($coach);
                      echo $tabladesglosePospago;?>
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
    
    <div class="col-sm table-responsive-sm">
      <!-- la tabla solo se le mostrara a los coordinadores y Admin -->
    <?php if($sesionAdmin || $sesionCoordinador) : ?> 
      <table class="table table-striped table-hover caption-top">
        <caption>Reporte Hora Centros</caption>
          <thead>
            <tr>
              <th scope="col-sm">Centro</th>
              <th scope="col-sm">08-09</th>
              <th scope="col-sm">09-10</th>
              <th scope="col-sm">10-11</th>
              <th scope="col-sm">11-12</th>
              <th scope="col-sm">12-13</th>
              <th scope="col-sm">13-14</th>
              <th scope="col-sm">14-15</th>
              <th scope="col-sm">15-16</th>
              <th scope="col-sm">16-17</th>
              <th scope="col-sm">17-18</th>
              <th scope="col-sm">18-19</th>
              <th scope="col-sm">19-20</th>
              <th scope="col-sm">20-21</th>
              <th scope="col-sm">21-22</th>
              <th scope="col-sm">Total</th>
            </tr>
          </thead>
          <tbody>
      <?php foreach($desgloseCentrosHoras as $ky => $centroshora) : ?>

        <!-- mostrar solo el centro LCC al coordinador  -->
        <?php if($sesionCoordinador) : ?> 
          <?php if($ky === "ECI") : ?>
        <?php $res = 'table-active fw-bold'; ?>
              <tr>
              <?php $tabladesgloseCoach = Permisos::tablaHoras($ky,$centroshora, $res);
                      echo $tabladesglosePospago;?>
            </tr>
            <?php endif;?>
          <?php elseif ($sesionAdmin) : ?>
            <tr>
            <?php $tabladesgloseCoach = Permisos::tablaHoras($ky,$centroshora, $res);
                      echo $tabladesglosePospago;?>
            </tr>
          <?php endif;?>
      <?php endforeach; ?>
      <?php endif ?>
      </tbody>
    </table>
  </div>
  </div>
</div>
</section>

<section class="info-section bg-light text-muted" id="info-section">
      <div class="container">
        <div class="row">
          <div class="col-sm table-responsive-sm">
              <table class="table table-striped table-hover caption-top">
                  <caption>Reporte Hora Coaches</caption>
                    <thead>
                      <tr>
                        <th scope="col-sm">Coaches</th>
                        <th scope="col-sm">08-09</th>
                        <th scope="col-sm">09-10</th>
                        <th scope="col-sm">10-11</th>
                        <th scope="col-sm">11-12</th>
                        <th scope="col-sm">12-13</th>
                        <th scope="col-sm">13-14</th>
                        <th scope="col-sm">14-15</th>
                        <th scope="col-sm">15-16</th>
                        <th scope="col-sm">16-17</th>
                        <th scope="col-sm">17-18</th>
                        <th scope="col-sm">18-19</th>
                        <th scope="col-sm">19-20</th>
                        <th scope="col-sm">20-21</th>
                        <th scope="col-sm">21-22</th>
                        <th scope="col-sm">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($desgloseCoachHoras as $k => $coachhora) : ?>
                      <?php $res = 'table-active fw-bold'; ?>
                      <?php if($sesionCoach || $sesionCoordinador) : ?> 
                        <?php if($k != "CAE CONTACT" && $k != "HOMEOFFICE Y COMISIONISTA" && $k != "TEZIUTLAN CONTACT" && $k != "ZACAPOAXTLA CONTACT" && $k != "MELENDEZ SERRANO CECILIA MICHEL") : ?>    
                            <tr>
                            <?php $tabladesgloseCoach = Permisos::tablaHoras($k,$coachhora, $res);
                            echo $tabladesglosePospago;?>
                            </tr>
                            <?php endif; ?>
                            <?php elseif(isset($_SESSION['identity']) && $_SESSION['identity']->idgrupo == "42") : ?>
                              <tr>
                              <?php $tabladesgloseCoach = Permisos::tablaHoras($k,$coachhora, $res);
                              echo $tabladesglosePospago;?>
                            </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
              </table>
            </div>
          </div>
       </div>
</section>
<?php
require_once 'views/layout/footer.php';
?>