/**
*
* Animação da sidebar esquerda
*
* Função anonima responsavel por esconder e mostrar a sidebar esquerda
*
* @param string $button da classe do botao de toggle
* @param element $sidebar sidebar para animacao
* @param element $pagewrapper wrapper principal do site
*
* @return void
*/
(function($button, $sidebar, $pagewrapper) {
    
    //variaveis das classes ativas
    var active_class_sidebar = "sidebar-is-active";
    var active_class_page_wrapper = "page-wrapper-is-active";
    
    //delega o click para o botao
    $('body').delegate($button, "click", function(){
        //toggle nas classes de ativação
        $sidebar.toggleClass(active_class_sidebar);
        $pagewrapper.toggleClass(active_class_page_wrapper);
        
    })
    
})(".toggle_sidebar",$(".sidebar-left"),$(".page-wrapper"));

/**
*
* Animação da caixa de pesquisa
* 
* Função anonima responsavel por esconder, mostrar e submeter o formulário de pesquisa
*
* @param string $button da classe do botao de toggle
* @param element $sidebar sidebar para animacao
* @param element $pagewrapper wrapper principal do site
*
* @return void
*/
(function($button, $input, $close){
   
    //seta o status para false
    $status = false;
    
    $('body').delegate($button,'click', function(){
        
        //pega o valor do input
        $value = $input.val();
        
        //verifica se a pesquisa esta aberta
        $status = $(this).attr('data-enabled');
        
        //se nao tiver, abre e seta o atributo para true
        if($status === "false") {
            $($close).removeClass('hidden');
            $input.addClass('search_active_input');
            $(this).attr('data-enabled','true');
            $input.focus();
        } else {
            
            //verifica se algum dado foi digitado
            if(!$value) {
                $($close).addClass('hidden');
                $input.removeClass('search_active_input');
                $(this).attr('data-enabled','false');
            }
            //se tiver conteudo, submete o formulario
            else
            {
                alert('seu formulário foi submetido');
            }
        }
        
    })
    
    //cancela a pesquisa e esconde o formulario
    $('body').delegate($close,'click', function(){
        $(this).addClass('hidden');
        $($button).attr('data-enabled','false');
        $input.removeClass('search_active_input');
        $input.val('');
    })
    
    $input.keypress(function(){
        alert('submetendo por ajax');
    })
    
})('.toggle_search', $('.search_input'), '.close_search');

/**
*
* Animação da caixa de pesquisa
*
* Função anonima responsavel por esconder, mostrar e submeter o formulário de pesquisa
*
* @param string $button da classe do botao de toggle
* @param element $sidebar sidebar para animacao
* @param element $pagewrapper wrapper principal do site
*
* @return void
*/
(function($inputwrapped){
    
    $('body').delegate($inputwrapped,'focusin',function(){
        $inputwrapper = $(this).parent('.input-wrapper');
        $icon = $inputwrapper.find('.input-wrapper-icon');
        $icon.addClass('input-wrapper-icon-focused');
        $inputwrapper.addClass('input-wrapper-focused');
    })
    
    $('body').delegate($inputwrapped,'focusout',function(){
        $inputwrapper = $(this).parent('.input-wrapper');
        $icon = $inputwrapper.find('.input-wrapper-icon');
        $icon.removeClass('input-wrapper-icon-focused');
        $inputwrapper.removeClass('input-wrapper-focused');
    })
    
})('.input-wrapped');