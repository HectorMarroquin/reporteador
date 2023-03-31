<?php
require_once 'views/layout/header.php';

$grupo       = $_SESSION['identity']->idgrupo;
$sesionAdmin = $_SESSION['identity']->idgrupo == "42";
$sesionCoach = $_SESSION['identity']->idgrupo == "150";
$sesionCoordinador = $_SESSION['identity']->idgrupo == "193";

$col = $grupo == '226' ? 'col-sm-12' : 'col-sm';
?>
<section class="info-section-head">

    <div class="container">
        <div class="row align-items-center">
            <link rel="stylesheet" type="text/css" href="<?= base_url ?>assets/sweetalert/sweetalert2.min.css">
            <link rel="stylesheet" href="<?= base_url ?>assets/css/estilo_fecha_historico.css">
            <div class="col-sm">
                <h1>LCC HISTORICO</h1>
            </div>
            <div class="col-sm">
                <img id="img-home" class="img-fluid" src="<?= base_url ?>/assets/img/lcc_azul.png">
            </div>
        </div>
    </div>
    <!-- //*!progress bar  -->
<section>
        <div id="contenedor" class="fondo">
                <div class="wrapper">
                <div>
                <h1 class="color text-center">Cargando</h1>
            </div>
            <div class="border">
                <div class="space">
                    <div class="cargando">
                    </div>
                </div>
            </div>
            </div>
            </div>  
</section>
</section>


<section class="info-section bg-light text-muted" id="info-section">
    <div class="col-auto p-5 text-center d-md-block">
        <form>
            <input type="button" class="btn btn-outline-info" value="CALENDARIO" id="btnEnviar" autofocus="autofocus">
            </body>

            </html>
        </form>
    </div>
</section>
    <section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class = "text-center"> 
                    <h5 id="fechasconsultadas" style="font-weight: bold"></h5>
                </div>
                <h1>Reporte Centros</h1>
                <div class="col-sm-6 col-md-7 table-responsive-sm">
                    <table class="table table-striped table-hover caption-top table-sm">
                        <thead>
                            <tr class="ocultar-cab">
                                <th scope="col-sm">Centro</th>
                                <th scope="col-sm">Prepago</th>
                                <th scope="col-sm">Pospago</th>
                                <th scope="col-sm">Pos/pre</th>
                                <th scope="col-sm">% Pos</th>
                                <th scope="col-sm">Asistencia</th>
                                <th scope="col-sm">Factor</th>
                            </tr>
                        </thead>
                        <tbody id="tableReporteCentro">
                            <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<section class="info-section bg-light text-muted" id="info-section">

      <div class="container">
          <div class="row">
              <div class= <?=$col." table-responsive-sm"?>>
                    <table class="table table-striped table-hover caption-top">
                    <h1>Pospago Base</h1>
                      <thead>
                        <tr>
                          <th scope="col-sm">Coach</th>
                          <th scope="col-sm">Exitosas</th>
                          <th scope="col-sm">Ingresadas</th>
                          <th scope="col-sm">Asistencia</th>
                          <th scope="col-sm">Factor</th>
                        </tr>
                      </thead>
                        <tbody id="tableReportePos">
                        <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            <div class="col-sm table-responsive-sm">
            <?php if($sesionAdmin || $sesionCoordinador || $sesionCoach) : ?>
            <table class="table table-striped table-hover caption-top">
                <h1>Reporte Sectores</h1>
                <thead>
                  <tr>
                    <th scope="col-sm">Lugar</th>
                    <th scope="col-sm">Prepago</th>
                    <th scope="col-sm">Asistencia</th>
                    <th scope="col-sm">Factor</th>
                  </tr>
                </thead>
                <tbody id="sector">
                <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                </tbody>
             </table>
             <?php endif ?>
            </div>

          </div>
        </div>
</section>

<?php if($sesionAdmin || $sesionCoordinador || $sesionCoach) : ?>
<section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row">
                <h1>Reporte Coaches</h1>
                <div class="table-responsive-sm container">
                    <table class="table table-striped table-hover table caption-top">
                        <thead>
                            <tr>
                            <th scope="row col-sm">Centro</th>
                            <th scope="row col-sm">Prepago</th>
                            <th scope="row col-sm">Migradas</th>
                            <th scope="row col-sm">Pos/Base</th>
                            <th scope="row col-sm">Total</th>
                            <th scope="row col-sm">Asistencia</th>
                            <th scope="row col-sm">Factor</th>
                            <th scope="row col-sm">Horas Conexion</th>
                            <th scope="row col-sm">Talk</th>
                            <th scope="row col-sm">SPH</th>
                        </tr>
                    </thead>
                    <tbody id="tableCoach">
                    <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <input class="btn btn-success" type="button" value="Descargar Tabla En Formato CSV"  onclick="descargar()" >
        </div>
    </section>
<?php endif ?>

<section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row">
                <h1>Reporte Horas Coaches</h1>
                <div class="table-responsive-sm">
                <table class="table table-striped table-hover caption-top">
                    <thead class="colorfila">
                        <tr>
                        <th scope="row col-sm">Hora/coach</th>
                                <th scope="row col-sm">8-9</th>
                                <th scope="row col-sm">9-10</th>
                                <th scope="row col-sm">10-11</th>
                                <th scope="row col-sm">11-12</th>
                                <th scope="row col-sm">12-13</th>
                                <th scope="row col-sm">13-14</th>
                                <th scope="row col-sm">14-15</th>
                                <th scope="row col-sm">15-16</th>
                                <th scope="row col-sm">16-17</th>
                                <th scope="row col-sm">17-18</th>
                                <th scope="row col-sm">18-19</th>
                                <th scope="row col-sm">19-20</th>
                                <th scope="row col-sm">20-21</th>
                                <th scope="row col-sm">21-22</th>
                                <th scope="row col-sm">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody id="tableHoraCoach">
                    <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                               
                            </tr>
                            <tr>
                                <td>---</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                              
                            </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </section>

</section> <!-- /section del boton  -->
<?php
require_once 'views/layout/footer.php';
?>

<script>
    var base_url = '<?= base_url ?>';
</script>
<script src="<?= base_url ?>assets/js/funciones_historicos.js"></script>
