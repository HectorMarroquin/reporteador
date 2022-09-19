<?php
require_once 'views/layout/header.php';
?>
<link rel="stylesheet" type="text/css" href="<?=base_url?>assets/sweetalert/sweetalert2.min.css">

<section class="info-section-head">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm">
                <h1>LCC HISTORICO</h1>
            </div>
            <div class="col-sm">
                <img id="img-home" class="img-fluid" src="<?=base_url?>/assets/img/lcc_azul.png">
            </div>
        </div>

</section>

<section class="info-section bg-light text-muted">
    <div class="col-auto p-5 text-center">
        <form action="" id="formulario">
            <input type="date" id="Date1" require>
            <input type="date" id="Date2" require>
            <!--<input type="button" value="fecha" id="fecha">-->
            <br>
            <br>
            <!---<button class="btn btn-primary" type="submit">Enviar</button>---->
            <input type="button" value="Enviar" id="btnEnviar">
            </body>
            </html>
        </form>
    </div>

</section>

<section class="info-section bg-light text-muted" id="info-section">
    <div class="text-center container">
        <h1>Reporte Centros</h1>
        <table class="table caption-top">
            <thead>
                <th scope="row col-sm">Centro</th>
                <th scope="row col-sm">Prepago</th>
                <th scope="row col-sm">Pospago</th>
                <th scope="row col-sm">Pos/pre</th>
                <th scope="row col-sm">% Pos</th>
                <th scope="row col-sm">Asistencia</th>
                <th scope="row col-sm">Factor</th>
            </thead>
        </table>
    </div>
</section>


<?php
require_once 'views/layout/footer.php';
?>

<script>
    var base_url = '<?= base_url ?>';
</script>
<script src="<?= base_url?>assets/js/funciones_historicos.js"></script>