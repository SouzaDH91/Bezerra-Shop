
  $(document).ready(function(){ 
     // validar frete
       $('#buscarFrete').click(function(){ 
        var CEP_CLIENTE = $('#cepFrete').val();
        var PESO_FRETE = $('#pesoFrete').val();
         
          if (CEP_CLIENTE.length !== 8 ) {
            //alert('Digite seu CEP corretamente, 8 dígitos e sem traço ou ponto');  
             $('#frete').addClass(' text-center text-danger');
             $('#frete').html('<b>Digite seu CEP corretamente, 8 dígitos e sem traço ou ponto</b>');
            $('#cepFrete').focus();
          } else {
            $('#frete').html('<img src="views/assets/images/loader.gif" width="35" /> <b>Carregando...</b>');
            $('#frete').addClass(' text-center text-danger');
            // carrego o combo com os bairros
            $('#frete').load('controllers/frete.php?cepcliente='+CEP_CLIENTE+'&pesofrete='+PESO_FRETE);
          } // fim do IF digitei o CEP
      }); // fim do change
  }); // fim do ready
