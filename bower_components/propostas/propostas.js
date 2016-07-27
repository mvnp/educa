$(document).ready(function(){
    
    //seta as configurações iniciais   
    $("#recusar_proposta_box").hide().removeClass('hidden');
    $("#aceitar_proposta_box").hide().removeClass('hidden');

    //mostra a caixa para recusar a proposta
    $('#recusar_proposta_btn').click(function(){    
        $('#recusar_proposta_box').slideDown(300);
    })

    //fecha a caixa de recusar proposta
    $('#voltar_proposta_btn').click(function(){    
        $('#recusar_proposta_box').slideUp(300);
    })

    //mostra a caixa para recusar a proposta
    $('#aceitar_proposta_btn').click(function(){    
        $('#aceitar_proposta_box').slideDown(300);
    })

    //fecha a caixa de recusar proposta
    $('#voltar_aceitar_btn').click(function(){    
        $('#aceitar_proposta_box').slideUp(300);
    })

})