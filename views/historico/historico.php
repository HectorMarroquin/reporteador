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
    <div class="col-auto p-5 text-center">
        <form action="" id="formulario">
            <input type="button" class="btn btn-outline-success" value="Ingrese Las Fechas" id="btnEnviar" autofocus="autofocus">
            </body>

            </html>
        </form>
    </div>

    <section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row text-center">
                <h1>Reporte Centros</h1>
                <div class="table-responsive-sm">
                    <table class="table-container table caption-top">
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
                        <tbody id="table">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row text-center">
                <h1>Reporte Pospago</h1>
                <div class="table-responsive-sm">
                    <table class="table-container table caption-top">
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
            <div class="row text-center">
                <h1>Reporte por Coach</h1>
                <div class="table-responsive-sm">
                <table class="table-container table caption-top">
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
<!----
 ******************** EN PROCESO ***************************
<section class="info-section bg-light text-muted" id="info-section">
        <div class="container">
            <div class="row text-center">
                <h1>Reporte por Hora Coach</h1>
                <div class="table-responsive-sm">
                <table class="table-container table caption-top">
                <thead>
                        <tr>
                                <th scope="row col-sm">Hora/coach</th>
                                <th scope="row col-sm">MANUEL ALEJANDRO</th>
                                <th scope="row col-sm">CECILIA MICHEL</th>
                                <th scope="row col-sm">ALFREDO URIEL</th>
                                <th scope="row col-sm">JORGE YAKIL</th>
                                <th scope="row col-sm">JULIO CESAR</th>
                                <th scope="row col-sm">SANDRA CARINA</th>
                                <th scope="row col-sm">ALICIA</th>
                                <th scope="row col-sm">ABIGAIL</th>
                                <th scope="row col-sm">IAN OSWALDO</th>
                                <th scope="row col-sm">TV</th>
                                <th scope="row col-sm">OSCAR JOAQUIN</th>
                                <th scope="row col-sm">EDUARDO</th>
                            </tr>
                        </thead>
                </table>
                </div>
            </div>
        </div>
    </section>
---->

</section> <!-- /section del boton  -->

<?php
require_once 'views/layout/footer.php';
?>

<script>
    var base_url = '<?= base_url ?>';
</script>
<script src="<?= base_url ?>assets/js/funciones_historicos.js"></script>