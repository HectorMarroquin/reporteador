$("#btnEnviar").click(function() {
    var fecha = new Date();
    var formato = fecha.getFullYear()+'-'+(fecha.getMonth()+1)+'-'+fecha.getDate();
 Swal.fire({
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirmar',
    cancelButtonText: 'Cancelar',
    customClass: 'swal2-overflow',
    title: "Ingrese el rango de fechas",
    html:'<input id="rangofecha" class="form-control" autofocus>',
        didOpen() {
                //caracteristicas Fecha
                $('#rangofecha').daterangepicker({
                        "locale": {
                            "format": "YYYY-MM-DD",
                            "separator": " al ",
                            "applyLabel": "Guardar",
                            "cancelLabel": "Cancelar",
                            "fromLabel": "Desde",
                            "toLabel": "Hasta",
                            "customRangeLabel": "Personalizar",
                            "daysOfWeek": [
                                "Do",
                                "Lu",
                                "Ma",
                                "Mi",
                                "Ju",
                                "Vi",
                                "Sa"
                            ],
                            "monthNames": [
                                "Enero",
                                "Febrero",
                                "Marzo",
                                "Abril",
                                "Mayo",
                                "Junio",
                                "Julio",
                                "Agosto",
                                "Setiembre",
                                "Octubre",
                                "Noviembre",
                                "Diciembre"
                            ],
                            "firstDay": 1
                        },
                        "startDate": formato,
                        "endDate": formato,
                        "opens": "center",
                });//Fin de daterange
            }//Fin de DidOpen
    }).then(function(isConfirm) {
        var rangofecha = $('#rangofecha').val();

        if(isConfirm.isConfirmed){
            url = base_url + "Reclutamiento/getDesgloseReclutamiento";
            url2 = base_url + "Reclutamiento/getConteo";
            url3 = base_url + "Reclutamiento/getDatosCurso";

            //envia valor de fechas a etiqueta
            $('#fechainfo').show();
            $('#fechas').html(rangofecha);

            $.ajax({
                    type: 'POST',
                    url:url,                        
                    data:{
                        'rangofecha':rangofecha
                    },
                     success : function(data){
                                try {
                                    var obj = JSON.parse(data);
                                    $('#tab_recl').show();
                                    $("#reclutadores").html(obj.reclutadores);                            
                                }
                                catch (error) {
                                    console.log('presenta error');
                                    console.log('Error parsing JSON:', error, data);
                                }
                            },
                        error: function (data){
                                   Swal.fire({
                                      icon: 'error',
                                      title: 'Oops...',
                                      text: 'Se presento un error',                             
                                    })
                                },                    
            });//Fin de ajax reclutamiento    
            
            $.ajax({
                 type: "POST",
                 url: url2,                 
                 data:{'rangofecha':rangofecha},
                    success: function(data){
                            try {                                       
                                var obj = JSON.parse(data);  
                                $('#tab_curs').show();                             
                                $("#cursos").html(obj.cursos);                            
                            }
                            catch (error) {
                                console.log('presenta error');
                                console.log('Error parsing JSON:', error, data);
                            }
                        },
                      error: function (data){
                               Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'Se presento un error',                             
                                })
                            },                      
            });//Fin de ajax curso    

            $.ajax({
                 type: "POST",
                 url: url3,                 
                 data:{'rangofecha':rangofecha},
                    success: function(data){
                            try {                                       
                                var obj = JSON.parse(data);
                                $('#tab_seg').show();
                                $("#cursos_seg").html(obj.seguimiento);                            
                            }
                            catch (error) {
                                console.log('presenta error');
                                console.log('Error parsing JSON:', error, data);
                            }
                        },
                      error: function (data){
                               Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'Se presento un error para extraer información seguimiento',                             
                                })
                            },                      
            });//Fin de ajax seguimiento

        }//Fin de Confirm
    }); //Fin de then
});//Fin de boton enviar