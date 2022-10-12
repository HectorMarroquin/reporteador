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

      <br>
      <div id="fechainfo"  class="row justify-content-center" style="display: none;">
          <div class="col-sm-3"> 
            Fecha buscada: <span id="fechas" style="font-weight: bold"></span>
         </div>
      </div>
  </div>

  <br><br>

  <div id= "tab_recl" class="row align-items-center" style="display: none;">

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
        </tbody>
      </table>
    </div>
  </div>

  <br><br>
  <div  id= "tab_curs" class="row align-items-center" style="display: none;">
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
        </tbody>
      </table>
    </div>
  </div>

<br><br>
  <div id="tab_seg" class="row align-items-center" style="display: none;">
    <div class="col-sm table-responsive-sm">
      <div class="col-sm">
       <h1>REPORTE POR SEGUIMIENTO</h1>        
        <div id="cursos_seg">          
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php
require_once 'views/layout/footer.php';
?>

<script>var base_url = '<?= base_url ?>';</script>
<script src="<?=base_url?>assets/js/funciones_reclutamiento.js"></script>
