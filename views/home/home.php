<?php
require_once 'views/layout/header.php';
?>

<?php //Usuarios
      $sesionGrupo = $_SESSION['identity']->idgrupo;
      $sesionCoach = $_SESSION['identity']->idgrupo == "150";

      $gruposVerTodo = ['42','212','12','220','32','227','157','12','16','234'];

      $col = $sesionGrupo == '226' ? 'col-sm-12' : 'col-sm';

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
    
    <div class="col-sm-6 col-md-7 table-responsive-sm">
      <table class="table table-striped table-hover caption-top table-sm" id="myTable">
         <caption>Reporte Centros</caption>
        <thead>
          <tr class="ocultar-cab">
            <th scope="col-sm">Centro</th>
            <th scope="col-sm" onclick="sortTable(1, 'int')">Pre</th>
            <th scope="col-sm" onclick="sortTable(2, 'int')">Pos</th>
            <th scope="col-sm" onclick="sortTable(3, 'int')">Pos/pre</th>
            <th scope="col-sm" onclick="sortTable(4, 'int')">%Pos</th>
            <th scope="col-sm" onclick="sortTable(5, 'int')">Asis</th>
            <th scope="col-sm" onclick="sortTable(6, 'int')">Factor</th>
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
            <td><?= $centro['porcentaje']?></td>
            <td><?= $centro['asistencia']?></td>
            <td><?= $centro['factor']?></td>
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
              <div class="<?=$col. ' table-responsive-sm'?>">
                    <!-- visualizan todos la cabecera de la tabla -->
                    <table class="table table-striped table-hover caption-top">
                    <caption>Reporte Pospago De Base</caption>
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
                                    <td><?=$centro['coach']?></td>
                                    <td><?=$centro['exitosa']?></td>
                                    <td><?=$centro['ingresada']?></td>
                                    <td><?=$centro['asistencia']?></td>
                                    <td><?=$centro['factor']?></td>
                                </tr>
                      <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

            <div class="col-sm table-responsive-sm">
            <?php if(in_array($sesionGrupo,$gruposVerTodo) || $sesionCoach ) : ?>
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
            <?php endif ?>
            </div>

          </div>
        </div>
</section>

<section class="info-section bg-light text-muted" id="info-section">
  <div class="container">
      <div class="row">
          <div class="col-sm table-responsive-sm">
          <?php  if(in_array($sesionGrupo,$gruposVerTodo) || $sesionCoach) : ?>
              <table class="table table-striped table-hover caption-top">
                <caption>Reporte Coaches</caption>
                <thead>
                  <tr>
                    <th scope="col-sm">Coach</th>
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
                        <td><?= $coach['coach']     ?></td>
                        <td><?= $coach['prepago']   ?></td>
                        <td><?= $coach['migradas']  ?></td>
                        <td><?= $coach['base']      ?></td>
                        <td><?= $coach['total']     ?></td>
                        <td><?= $coach['asistencia']?></td>
                        <td><?= $coach['factor']    ?></td>
                        <td><?= $coach['conexion']  ?></td>
                        <td><?= $coach['talk']      ?></td>
                        <td><?= $coach['sph']       ?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
             </table>
             <?php endif ?>
            </div>
        </div>
    </div>
</section>


<section class="info-section bg-light text-muted" id="info-section">
<div class="container">
  <div class="row">
    
    <div class="col-sm table-responsive-sm">
      <!-- la tabla solo se le mostrara a los coordinadores y Admin -->
    <?php if(in_array($sesionGrupo,$gruposVerTodo)) : ?> 
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
          <?php $res = 'table-active fw-bold'; ?>

            <tr>
                <td><?= $ky ?></td>
                <td><?= $centroshora['hora08']?></td>
                <td><?= $centroshora['hora09']?></td>
                <td><?= $centroshora['hora10']?></td>
                <td><?= $centroshora['hora11']?></td>
                <td><?= $centroshora['hora12']?></td>
                <td><?= $centroshora['hora13']?></td>
                <td><?= $centroshora['hora14']?></td>
                <td><?= $centroshora['hora15']?></td>
                <td><?= $centroshora['hora16']?></td>
                <td><?= $centroshora['hora17']?></td>
                <td><?= $centroshora['hora18']?></td>
                <td><?= $centroshora['hora19']?></td>
                <td><?= $centroshora['hora20']?></td>
                <td><?= $centroshora['hora21']?></td>
                <td class="<?=$res?>"><?=$centroshora['total']?></td>
            </tr>

      <?php endforeach; ?>
    </tbody>
  </table>
  <?php endif ?>
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
                          <tr>
                                <td><?= $k ?></td>
                                <td><?= $coachhora['hora08']?></td>
                                <td><?= $coachhora['hora09']?></td>
                                <td><?= $coachhora['hora10']?></td>
                                <td><?= $coachhora['hora11']?></td>
                                <td><?= $coachhora['hora12']?></td>
                                <td><?= $coachhora['hora13']?></td>
                                <td><?= $coachhora['hora14']?></td>
                                <td><?= $coachhora['hora15']?></td>
                                <td><?= $coachhora['hora16']?></td>
                                <td><?= $coachhora['hora17']?></td>
                                <td><?= $coachhora['hora18']?></td>
                                <td><?= $coachhora['hora19']?></td>
                                <td><?= $coachhora['hora20']?></td>
                                <td><?= $coachhora['hora21']?></td>
                                <td class="<?=$res?>"><?=$coachhora['total']?></td>
                          </tr>
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