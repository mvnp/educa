<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<div class="job_container container" style="margin-top: 10px">
    
    <!-- cabecalho da pagina -->
    <div class="page-header">
        <h1>Proposta - Aula de matemática em casa</h1>
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
            
            <!-- alert de erros -->
            <?php if($error): ?>
            <div class="col-md-12 alert alert-danger">
                <p><strong>Erro! </strong><?php echo $error; ?></p>
            </div>
            <?php endif; ?> 
            
            <!-- formulario de propostas -->
            <?php if(!$has_propose): ?>
            <form class="col-md-12" action="<?php site_url()."jobs/propostas"?>" method="post">
                <h4>Fale mais sobre sua proposta</h4>
                <textarea class="form-control" name="descricao_proposta" rows="5"></textarea>
                
                <h4>Proposta</h4>
                <label for="price">Diga o seu preço</label>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">$</span>
                    <input type="text" name="valor_proposta" class="form-control money" placeholder="Valor" aria-describedby="basic-addon1">
                </div>
                
                <div class="text-danger">
                    <br>
                    Lembre-se que o site cobrará x% sobre o valor da sua proposta
                </div>
                
                <br>
                <button type="submit" class="btn btn-success btn-lg">Fazer proposta</button>    
            </form>
            <?php else:?>
            <div class="col-md-12 alert alert-info">
                <p>
                    <strong>Você já fez uma proposta para esse pedido</strong>
                    Acompanhe e edite sua proposta a partir do painel de controle no seu perfil.
                </p>
            </div>    
            <?php endif;?>
        </div>
        
        <!-- detalhes do cliente -->
        <div class="col-md-3">
        aaaaaa
        </div>
        
    </div>

</div>