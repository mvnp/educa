$(document).ready(function(){

	//url do site
	url = $("#site_url").val();
	$('#excluir_proposta_box').removeClass('hidden').hide();

	//quando mudar, faz o upload
	$('#avatar_file').change(function(){
		
		//esconde a imagem e mosta o login
		$('#profile_avatar').hide();
		$('.loading_avatar').removeClass('hidden');	

		$(this).upload(url+"ajax/avatar_upload",function(success){
			new_image = 'uploads/'+success;
			
			$('#profile_avatar').attr('src',new_image);
			$('.loading_avatar').addClass('hidden');
			$('#profile_avatar').show();	 
		})
	})
	

	//botao de excluir proposta
	$('.excluir_proposta').click(function(){
		//pega o id da proposta
		id_proposta = $(this).attr('data-id');

		$('#excluir_proposta_box').slideDown(300);
		$('#excluir_proposta').attr('data-id',id_proposta);
	})

	//botao para fechar o box de exclusao
	$('#voltar_excluir_proposta').click(function(){
		$('#excluir_proposta_box').slideUp(300);
		$('#excluir_proposta').removeAttr('data-id');
	})

	//exclui a proposta
	$('#excluir_proposta').click(function(){

		//pega o id da proposta
		id_proposta = $(this).attr('data-id');

		//monta os dados
		dados = {
			proposta_id: id_proposta
		}

		//div de resposta
		resposta = $('#ajax_resposta');
		alerta   = resposta.find('.alert');

		//faz o ajax de exclusao
		$.post(url+"ajax/excluir_proposta",dados)
		.success(function(data){
			
			//converte os dados recebidos para json
			$response = $.parseJSON(data);

			console.log($response);

			//verifica qual foi o resultao do processo
			if($response.status === 'error') {
				//mosta o alert
				resposta.removeClass('hidden');
				alerta.addClass('alert-danger');
				alerta.removeClass('alert-success');
				alerta.html($response.msg+'<button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');

			} else {
				location.reload();
			}
		})
		.error(function(){
			//mosta o alert
			resposta.removeClass('hidden');
			alerta.addClass('alert-danger');
			alerta.removeClass('alert-success');
			alerta.html('Não foi possivel conectar com o servidor, verifique sua conexão com a internet. <button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');

		})
	})

}) 