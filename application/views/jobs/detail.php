<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="job_container container" style="margin-top: 10px">
    
    <!-- cabecalho da pagina -->
    <div class="page-header">
        <h1>
            Aula de matemática em casa 
            <small><span class="label label-success">recebendo propostas</span></small>
        </h1>
        
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
            
            <!-- jumbotron com os principais detalhes -->
            <h3>Detalhes</h3>
            <div class="well col-md-12">
                <div class="col-md-6">
                    <strong>$ Orçamento: </strong> <?php echo $job->desc_orcamento; ?>
                </div>
                <div class="col-md-6">
                    <strong>
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp; 
                        Publicado: 
                    </strong> <?php echo date('d-m-Y', strtotime($job->date_pub)); ?>
                </div>
                <div class="col-md-6">
                    <strong>
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;
                        Vencimento
                    </strong>17/11/1996
                </div>
                <div class="col-md-6">
                    <strong>
                        <span class="glyphicon glyphicon-comment"></span>&nbsp;
                        Interessados: 
                    </strong> 5
                </div>
                <div class="col-md-12">
                    <br>
                    <span class="label label-success"><?php echo $job->desc_nome ;?></span>
                    <?php if(isset($job->sub_nome)):?>
                    <span class="label label-warning"><?php echo $job->sub_nome; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- descrição -->
            <h3><?php echo $job->desc_title; ?></h3>
            <div class="col-md-12">
                <p><?php echo $job->desc_descricao; ?></p>
            </div>
            
            <!-- botoes de ação -->
            <div class="col-md-12">
                <a href="<?php echo site_url(); ?>jobs/proposta/<?php echo $job->job_id; ?>" class="btn btn-success btn-lg">Fazer uma proposta</a>
                <a href="<?php echo site_url(); ?>jobs/chat/4" class="btn btn-info pull-right">Fazer uma pergunta</a>
            </div>
            
        </div>
        
        <!-- detalhes do cliente -->
        <div class="col-md-3">
        aaaaaa
        </div>
        
    </div>
    
</div>