<?php
require_once 'views/layout/header.php';
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
</section>

<section class="info-section bg-light text-muted" id="info-section">
    <div class="col-auto p-5 text-center d-md-block">
        <form>
            <input type="button" class="btn btn-outline-info" value="CALENDARIO" id="btnEnviar" autofocus="autofocus">
            </body>

            </html>
        </form>
    </div>
    <section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row">
                <h1>Reporte Centros</h1>
                <div class="table-responsive-sm">
                    <table class="table table-striped table-hover table caption-top">
                        <thead>
                            <tr>
                                <th scope="row col-sm">Centro</th>
                                <th scope="row col-sm">Prepago</th>
                                <th scope="row col-sm">Pospago</th>
                                <th scope="row col-sm">Pos/pre</th>
                                <th scope="row col-sm">% Pos</th>
                                <th scope="row col-sm">Asistencia</th>
                                <th scope="row col-sm">Factor</th>
                            </tr>
                        </thead>
                        <tbody id="tableReporteCentro">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row">
                <h1>Reporte Pospago</h1>
                <div class="table-responsive-sm">
                    <table class="table table-striped table-hover table caption-top">
                        <thead>
                            <tr>
                                <th scope="row col-sm">Coach</th>
                                <th scope="row col-sm">Exitosas</th>
                                <th scope="row col-sm">Ingresadas</th>
                                <th scope="row col-sm">Asistencias</th>
                                <th scope="row col-sm">Factor</th>
                            </tr>
                        </thead>
                        <tbody id="tableReportePos">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    <br><br>

    <section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row">
                <h1>Reporte Coaches</h1>
                <div class="table-responsive-sm">
                <table class="table table-striped table-hover caption-top">
                    <thead>
                        <tr>
                            <th scope="row col-sm">Centro</th>
                            <th scope="row col-sm">Prepago</th>
                            <th scope="row col-sm">Migradas</th>
                            <th scope="row col-sm">Pos/Base</th>
                            <th scope="row col-sm">Total</th>
                            <th scope="row col-sm">Asistencia</th>
                            <th scope="row col-sm">Factor</th>
                        </tr>
                    </thead>
                    <tbody id="tableCoach">

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </section>
<br><br>

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
