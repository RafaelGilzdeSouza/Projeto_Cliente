$ (function(){
	$("#input_produtos").keyup(function(){
		//recupera o valor do campo
		var input_produtos = $(this).val();

		//verifica se algo foi digitado
		if (input_produtos != ''){
		var dados = {
            palavra : input_produtos
        }		
		$.post('home_backend.php', dados, function(retorna){
			//mostra dentro da ul os resultados obtidos
			$(".resultado").html(retorna);
			});
		}
	});
});