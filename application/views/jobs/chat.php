<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<div class="job_container container" style="margin-top: 10px">
    
    <!-- cabecalho da pagina -->
    <div class="page-header">
        <h1>Chat - Aula de matemática em casa</h1>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Library</a></li>
          <li class="active">Data</li>
        </ol>
    </div>
    
    <!-- conteudo principal -->
    <div class="row">
        
        <!-- detalhes do job -->
        <div class="col-md-9">
            
            <!-- cabecalho do chat -->
            <header class="col-md-12 chat_header">
                <strong class="hidden-xs">
                    <span class="glyphicon glyphicon-comment"></span> Mensagens com
                </strong> 
                <a href="#">
                    Gustavo villas boas
                </a>
                
                <a href="<?php echo site_url(); ?>jobs/proposta/2" class="btn btn-pill btn-pill-warning pull-right">
                    <small>fazer proposta</small>
                </a>
                
                <div class="clearfix"></div>
            </header>
            
            <!-- mensagens do chat -->
            <div class="col-md-12 chat_messages">
                <ul>
                    <li class="bubble received">
                        <span class="chat_author">Gustavo diz:</span>
                        <span class="chat_msg">minha mensagem super top</span>
                        <span class="chat_date">14:00 em 17/11/1996</span>
                    </li>
                    <li class="bubble send">
                        <span class="chat_author">Gustavo diz:</span>
                        <span class="chat_msg">minha mensagem super top</span>
                        <span class="chat_date">14:00 em 17/11/1996</span>
                    </li>
                    <li class="bubble received">
                        <span class="chat_author">Gustavo diz:</span>
                        <span class="chat_msg">minha mensagem super top</span>
                        <span class="chat_date">14:00 em 17/11/1996</span>
                    </li>
                    <li class="bubble received">
                        <span class="chat_author">Gustavo diz:</span>
                        <span class="chat_msg">minha mensagem super top</span>
                        <span class="chat_date">14:00 em 17/11/1996</span>
                    </li>
                    <li class="bubble send">
                        <span class="chat_author">Gustavo diz:</span>
                        <span class="chat_msg">minha mensagem super top</span>
                        <span class="chat_date">14:00 em 17/11/1996</span>
                    </li>
                </ul>
            </div>
            
            <!-- formulario de chat -->
            <form class="col-md-12" method="post">
                <h4>Escreva sua mensagem</h4>
                <textarea class="form-control" rows="5"></textarea>
                <br>
                <button type="submit" class="btn btn-success btn-lg">Enviar mensagem</button>
            </form>
            
        </div>
        
        <!-- detalhes do cliente -->
        <div class="col-md-3">
        aaaaaa
        </div>
        
    </div>

</div>