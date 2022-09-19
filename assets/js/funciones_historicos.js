$(document).ready(function() {

  $('#btnEnviar').click(function() {
     
    var date1 = $('#Date1').val();
    var date2 = $('#Date2').val();
      
  url = base_url+"Historico/desglose";
      $.ajax({
          type: 'POST',
          url: url,
          dataType: 'json',
          data:{'date1' : date1, 'date2' : date2},
          success: function(data){
            alert(data);
          }
      });
      
  });

});
