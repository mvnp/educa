$(document).ready(function(){
    
    //pega a url para ajax
    url = $('#site_url').val();

    //select das categorias principais
    $('#cat_principal').change(function(){
        
        //pega o valor a ser carregado
        value = $(this).val();
        dados = { 'categoria_mae': value};
        url = $('#site_url').val();
        
        //url do ajax
        url += 'ajax/get_subcategorias';
        
        //manda o post
        $.post(url, dados)
        .success(function(data){
            $('#cat_sec').removeAttr('disabled');
            $("#cat_sec").html(data);
        })
        .error(function(data){
            alert('nao foi')
        })
        
    })

    //manda novas mensagens
    $('#new_message_form').submit(function(e){
        e.preventDefault();

        //pega os dados do form
        dados = $(this).serialize();

        $.post(url+"ajax/chat_add_msg", dados)
        .success(function(data){
            //converte para json
            $response = $.parseJSON(data);
            $('.chat_messages_content').append($response.html);

            altura = $('.chat_messages').prop("scrollHeight");
            $('.chat_messages').scrollTop(altura + 1050);
        })

        return false;
    })

    //busca por novas mensagens
    setInterval(function() {
      


    }, 1000);
      
})