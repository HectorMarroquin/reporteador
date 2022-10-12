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
                        $("#tableReportePos").empty();

                        datospos.forEach(pos => {

                            totalcolor = colorTotal(pos);
                            console.log("color pospago: " + totalcolor);
                            var tablapos = "<tr id=" + totalcolor + ">" +
                                "<td>" + pos.coach + "</td>" +
                                "<td>" + pos.exitosa + "</td>" +
                                "<td>" + pos.ingresada + "</td>" +
                                "<td>" + pos.asistencia + "</td>" +
                                "<td>" + pos.factor + "%" + "</td>" +
                                "</tr>";
                            $("#tableReportePos").append(tablapos);
                        }); // termia el foreach

                        $("#colorfila").css('background-color', '#919191');
                        $("#colorfila").css('font-weight', '800');
                    }
                }); // termina ajax reporte pospago

                url3 = base_url + "Historico/desgloseCoach";
                $.ajax({
                        type: "POST",
                        url: url3,
                        dataType: "json",
                        data: { 'date1': date1, 'date2': date2 },
                        success: function(dataCoach) {
                            //console.log(dataCoach);
                            $("#tableCoach").empty();

                            dataCoach.forEach(coach => {

                                totalcolor = Totalcolor(coach);
                                console.log("color coach: " + totalcolor);
                                var tablacoach = "<tr id = " + totalcolor + " >" +
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
                            $("#colorfila2").css('background-color', '#919191');
                            $("#colorfila2").css('font-weight', '800');
                        }
                    }) //termina ajax de reporte coach

                // ******************** EN PROCESO ***************************

                /* TODO: Empieza reporte por hora coach */
                url4 = base_url + "Historico/HoraCoach";
                $.ajax({
                    type: "POST",
                    url: url4,
                    dataType: "json",
                    data: { 'date1': date1, 'date2': date2 },
                    success: function(horasCoach) {

                        $("#tableHoraCoach").empty();

                        horasCoach.forEach(horaCoach => {

                            var tablaHoraCoach = "<tr>" +
                                "<td>" + horaCoach.name + "</td>" +
                                "<td>" + horaCoach.hora1 + "</td>" +
                                "<td>" + horaCoach.hora2 + "</td>" +
                                "<td>" + horaCoach.hora3 + "</td>" +
                                "<td>" + horaCoach.hora4 + "</td>" +
                                "<td>" + horaCoach.hora5 + "</td>" +
                                "<td>" + horaCoach.hora6 + "</td>" +
                                "<td>" + horaCoach.hora7 + "</td>" +
                                "<td>" + horaCoach.hora8 + "</td>" +
                                "<td>" + horaCoach.hora9 + "</td>" +
                                "<td>" + horaCoach.hora10 + "</td>" +
                                "<td>" + horaCoach.hora11 + "</td>" +
                                "<td>" + horaCoach.hora12 + "</td>" +
                                "<td>" + horaCoach.hora13 + "</td>" +
                                "<td>" + horaCoach.hora14 + "</td>" +
                                "<td>" + horaCoach.total + "</td>" +
                                "</tr>";
                            $("#tableHoraCoach").append(tablaHoraCoach);
                        }); // termina for each

                    },
                }); // trermina hora coach

            } //termina la confirmacion de cancelar

        });
    }); // cierre de llave y parentesis de #btnEnviar

});



function colorTotal(total) {
    if (total.coach === 'TOTAL') {
        colortotal = "colorfila";
    } else {
        colortotal = "na";
    }
    return colortotal;
}

function Totalcolor(total) {
    if (total.coach === 'TOTAL') {
        colortotal = "colorfila2";
    } else {
        colortotal = "na";
    }
    return colortotal;
}