$(document).ready(function(){
    
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
    
})