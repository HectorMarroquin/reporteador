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

                //*urls para madar a cada ajax
                url = base_url + "Historico/desglose";
                url2 = base_url + "Historico/desglosePos";
                url3 = base_url + "Historico/desgloseCoach";
                url4 = base_url + "Historico/HoraCoach";

                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: { 'date1': date1, 'date2': date2 },
                    success: function(data) {
                        $("#tableReporteCentro").empty()

                        data.forEach(centro => {

                            switch (centro.prefijo) {
                                case 'ECI':
                                    centro.prefijo = 'LCC';
                                    break;
                            }

                            var fila = "<tr>" +

                                "<td>" + centro.prefijo + "</td>" +
                                "<td>" + centro.prepago + "</td>" +
                                "<td>" + centro.pospago + "</td>" +
                                "<td>" + centro.totales + "</td>" +
                                "<td>" + centro.porcentaje + "%" + "</td>" +
                                "<td>" + centro.asistencia + "</td>" +
                                "<td>" + centro.factor + "%" + "</td>" +
                                "</tr>";
                            $("#tableReporteCentro").append(fila);
                        }); // termina forEach

                        $("#tableReporteCentro tr:last").css('background-color', '#e6e6e7').css('font-weight', '800');
                    }

                }); //termina ajax reporte por centro

                $.ajax({
                    type: "POST",
                    url: url2,
                    dataType: "json",
                    data: { 'date1': date1, "date2": date2 },
                    success: function(datospos) {
                        $("#tableReportePos").empty();

                        datospos.forEach(pos => {

                            var tablapos = "<tr>" +

                                "<td>" + pos.coach + "</td>" +
                                "<td>" + pos.exitosa + "</td>" +
                                "<td>" + pos.ingresada + "</td>" +
                                "<td>" + pos.asistencia + "</td>" +
                                "<td>" + pos.factor + "%" + "</td>" +
                                "</tr>";

                            $("#tableReportePos").append(tablapos);

                        }); // termia el foreach
                        $("#tableReportePos tr:last").css('background-color', '#e6e6e7').css('font-weight', '800');
                    }
                }); // termina ajax reporte pospago

                $.ajax({
                        type: "POST",
                        url: url3,
                        dataType: "json",
                        data: { 'date1': date1, 'date2': date2 },
                        success: function(dataCoach) {

                            $("#tableCoach").empty();

                            dataCoach.forEach(coach => {

                                var tablacoach = "<tr>" +

                                    "<td>" + coach.coach + "</td>" +
                                    "<td>" + coach.prepago + "</td>" +
                                    "<td>" + coach.migradas + "</td>" +
                                    "<td>" + coach.base + "</td>" +
                                    "<td>" + coach.total + "</td>" +
                                    "<td>" + coach.asistencia + "</td>" +
                                    "<td>" + coach.factor + "%" + "</td>" +
                                    "</tr>";

                                $("#tableCoach").append(tablacoach);

                            }); //termina forEach de coach

                            $("#tableCoach tr:last").css("background-color", "#e6e6e7").css('font-weight', '800');

                        }
                    }) //termina ajax de reporte coach

                /* TODO: Empieza reporte por hora coach */

                $.ajax({
                    type: "POST",
                    url: url4,
                    dataType: "json",
                    data: { 'date1': date1, 'date2': date2 },
                    success: function(horasCoach) {

                        $("#tableHoraCoach").empty();

                        Object.keys(horasCoach).forEach(function(keyhoras) {

                            var tablaHoraCoach = "<tr>" +

                                "<td>" + keyhoras + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora08 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora09 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora10 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora11 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora12 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora13 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora14 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora15 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora16 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora17 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora18 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora19 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora20 + "</td>" +
                                "<td>" + horasCoach[keyhoras].hora21 + "</td>" +
                                "<td>" + horasCoach[keyhoras].total + "</td>" +
                                "</tr>";

                            $("#tableHoraCoach").append(tablaHoraCoach);
                            $("#tableHoraCoach td:last").css("background-color", "#e6e6e7").css('font-weight', '800'); // color a la ultima fila TOTAL

                        }); //termina foreach

                    }
                }); // trermina hora coach

            } //termina la confirmacion de cancelar

        });

    }); // cierre de llave y parentesis de #btnEnviar

});