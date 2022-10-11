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

            <?php $res = $centro['prefijo'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>

            <tr class="<?=$res?>">
                <td><?= $centro['prefijo']?></td>
                <td><?= $centro['prepago']?></td>
                <td><?= $centro['pospago']?></td>
                <td><?= $centro['totales']?></td>
                <td><?= $centro['porcentaje']?>%</td>
                <td><?= $centro['asistencia']?></td>
                <td><?= $centro['factor']?>%</td>
              
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
                    <table class="table caption-top">
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
                        <tbody>
                        <?php foreach ($desglosePos as $key => $centro) : ?>

                          <?php $res = $centro['coach'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>

                          <tr class="<?=$res?>">
                              <td><?= $centro['coach']?></td>
                              <td><?= $centro['exitosa']?></td>
                              <td><?= $centro['ingresada']?></td>
                              <td><?= $centro['asistencia']?></td>
                              <td><?= $centro['factor']?>%</td>
                            
                          </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                </div>

            <div class="col-sm table-responsive-sm">
              
                    <h1>REPORTE POR SECTOR</h1>
            </div>

          </div>
        </div>
</section>

<section class="info-section bg-light text-muted" id="info-section">
  <div class="container">
      <div class="row">
          <div class="col-sm table-responsive-sm">
              <table class="table caption-top">
                <caption>Reporte Por Coach</caption>
                <thead>
                  <tr>
                    <th scope="col-sm">Centro</th>
                    <th scope="col-sm">Prepago</th>
                    <th scope="col-sm">Migradas</th>
                    <th scope="col-sm">Pos/Base</th>
                    <th scope="col-sm">Total</th>
                    <th scope="col-sm">Asistencia</th>
                    <th scope="col-sm">Factor</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($desgloseCoach as $key => $coach) : ?>

                <?php $res = $coach['coach'] == 'TOTAL' ? 'table-active fw-bold' : '' ?>

                    <tr class="<?=$res?>">
                        <td><?= $coach['coach']?></td>
                        <td><?= $coach['prepago']?></td>
                        <td><?= $coach['migradas']?></td>
                        <td><?= $coach['base']?></td>
                        <td><?= $coach['total']?></td>
                        <td><?= $coach['asistencia']?></td>
                        <td><?= $coach['factor']?>%</td>
                      
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

      <table class="table caption-top">
        <caption>Reporte Por Centro</caption>
          <thead>
            <tr>
              <th scope="col-sm">Centro</th>
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

            <tr>
                <td><?=$ky;?></td>
                <td><?= $centroshora['09-10'];?></td>
                <td><?= $centroshora['10-11'];?></td>
                <td><?= $centroshora['11-12'];?></td>
                <td><?= $centroshora['12-13'];?></td>
                <td><?= $centroshora['13-14'];?></td>
                <td><?= $centroshora['14-15'];?></td>
                <td><?= $centroshora['15-16'];?></td>
                <td><?= $centroshora['16-17'];?></td>
                <td><?= $centroshora['17-18'];?></td>
                <td><?= $centroshora['18-19'];?></td>
                <td><?= $centroshora['19-20'];?></td>
                <td><?= $centroshora['20-21'];?></td>
                <td><?= $centroshora['21-22'];?></td>
                <td><?= $centroshora['total'];?></td>
            </tr>
      <?php endforeach; ?>
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
              <table class="table caption-top">
                  <caption>Reporte Por Coach</caption>
                    <thead>
                      <tr>
                        <th scope="col-sm">Coaches</th>
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

                    </tbody>
              </table>
            </div>
          </div>
       </div>
</section>

<?php
require_once 'views/layout/footer.php';
?>