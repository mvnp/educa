$(document).ready(function(){

	//url do site
	url = $("#site_url").val();

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
	
}) 