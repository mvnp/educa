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
            
            <!-- mensagens do chat -->
            <div class="col-md-12 chat_messages" last-id="">
                <ul class="chat_messages_content">
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
            <form id="new_message_form" class="col-md-12" method="post">
                <h4>Escreva sua mensagem</h4>
                <input type="hidden" value="<?PHP echo $usuario->id; ?>" name="id_para">
                <textarea name="chat_msg" class="form-control" rows="5"></textarea>
                <br>
                <button type="submit" class="btn btn-success btn-lg">Enviar mensagem</button>
            </form>     
        </div>
        
        <!-- detalhes do cliente -->
        <div class="col-md-3">
            <center>
                <strong class="hidden-xs">
                    <img src="<?PHP echo base_url();?>uploads/<?PHP echo $usuario->foto;?>" width="70px" class="thumbnail">
                    <span class="glyphicon glyphicon-comment"></span> Mensagens com
                    <a href="#"> <?php echo $usuario->username; ?> </a><br>
                    Ultimo login: <?PHP echo date('H:i d/m/Y', $usuario->last_login); ?>
                </strong>
            </center>
        </div>
        
    </div>

</div>