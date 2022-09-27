$(document).ready(function() {

    $('#btnEnviar').click(function() {

        Swal.fire({
            title: "Ingrese una fecha inicial y una final",
            confirmButtonText: "Aceptar",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,

            showDenyButton: true,
            denyButtonText: "Cancelar",

            background: "linear-gradient(63deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 37%, rgba(0,212,255,1) 100%)",
            color: "#FFFFFF",

            html: '<input type="date" id="Date1" class="flex-nowrap w-50 swal2-input">' +
                '<input type="date" id="Date2" class="flex-nowrap w-50 swal2-input">',
        }).then(function(isConfirm) {

            var date1 = $('#Date1').val();
            var date2 = $('#Date2').val();
            if (isConfirm.isConfirmed) {

                if (date1 > date2) {
                    Swal.fire({
                        icon: "error",
                        title: "Error en las fechas",
                        text: "asegurese de agregar correctamente las fechas",
                        timer: "3500",
                        showConfirmButton: false,
                        timerProgressBar: true,
                        customClass: {
                            timerProgressBar: "progress-bar"
                        },
                        iconColor: "#FFFFFF",
                        color: "#FFFFFF",
                        background: "linear-gradient(63deg, rgba(2,0,36,1) 22%, rgba(121,9,32,1) 48%, rgba(255,0,22,1) 100%)"
                    });
                } // termina if error 


                url = base_url + "Historico/desglose";
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: { 'date1': date1, 'date2': date2 },
                    success: function(data) {
                        $("#table").empty()

                        var id;

                        data.forEach(element => {

                            switch (element.prefijo) {
                                case 'ECI':
                                    element.prefijo = 'LCC';
                                    break;
                                case 'TOTAL':
                                    id = "tablecolor";
                                default:
                                    break;
                            }

                            var fila = "<tr id=" + id + ">" +
                                "<td>" + element.prefijo + "</td>" +
                                "<td>" + element.prepago + "</td>" +
                                "<td>" + element.pospago + "</td>" +
                                "<td>" + element.totales + "</td>" +
                                "<td>" + element.porcentaje + "%" + "</td>" +
                                "<td>" + element.asistencia + "</td>" +
                                "<td>" + element.factor + "%" + "</td>" +
                                "</tr>";
                            $("#table").append(fila);
                        }); // termina forEach

                        $("#tablecolor").css('background-color', '#919191');
                        $("#tablecolor").css('font-weight', '800');

                    }

                }); //termina ajax reporte por centro
                url2 = base_url + "Historico/desglosePos";
                $.ajax({
                    type: "POST",
                    url: url2,
                    dataType: "json",
                    data: { 'date1': date1, "date2": date2 },
                    success: function(datospos) {
                        console.log(datospos);
                        $("#tableReportePos").empty();

                        var idtotalpos;

                        datospos.forEach(pos => {

                            if (pos.coach === 'TOTAL') {
                                idtotalpos = "colortabla";
                            }

                            var tablapos = "<tr id=" + idtotalpos + ">" +
                                "<td>" + pos.coach + "</td>" +
                                "<td>" + pos.exitosa + "</td>" +
                                "<td>" + pos.ingresada + "</td>" +
                                "<td>" + pos.asistencia + "</td>" +
                                "<td>" + pos.factor + "%" + "</td>" +
                                "</tr>";
                            $("#tableReportePos").append(tablapos);
                        }); // termia el foreach
                        $("#colortabla").css('background-color', '#919191');
                        $("#colortabla").css('font-weight', '800');
                    }
                }); // termina ajax 
            } //termina la confirmacion de cancelar

        });

    }); // cierre de llave y parentesis de #btnEnviar

});