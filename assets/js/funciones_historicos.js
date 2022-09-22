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

            html: '<input type="date" id="Date1" class="swal2-input">' +
                '<input type="date" id="Date2" class="swal2-input">',
        }).then(function(isConfirm) {

            var date1 = $('#Date1').val();
            var date2 = $('#Date2').val();
            if (isConfirm.isConfirmed) {

                if (date1 >= date2) {
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
                } // termina if


                url = base_url + "Historico/desglose";
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: { 'date1': date1, 'date2': date2 },
                    success: function(data) {
                        $("#table").html('');

                        data.forEach(element => {

                            var LCC = "LCC";
                            if (element.prefijo === 'ECI') {
                                element.prefijo = LCC;
                            } // condicion para cambair ECI a LCC

                            var fila = "<tr>";
                            fila = fila + "<td>" + element.prefijo + "</td>";
                            fila = fila + "<td>" + element.prepago + "</td>";
                            fila = fila + "<td>" + element.pospago + "</td>";
                            fila = fila + "<td>" + element.totales + "</td>";
                            fila = fila + "<td>" + element.porcentaje + "</td>";
                            fila = fila + "<td>" + element.asistencia + "</td>";
                            fila = fila + "<td>" + element.factor + "</td>";
                            fila = fila + "</tr>";

                            $("#table").append(fila);
                        }); // termina forEach
                    }

                }); //termina ajax


            } //termina la confirmacion de cancelar

        });

    }); // cierre de llave y parentesis de #btnEnviar

});