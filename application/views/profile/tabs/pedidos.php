<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container tab_container">
    
    <!-- botoes de pedidos -->
    <div class="col-md-12 get-padding">
        <h3 class="pull-left">Meus pedidos de aula</h3>
        <br>
        <a href="<?php echo site_url(); ?>jobs/add" class="btn btn-pill btn-pill-info pull-right">
            <span class="glyphicon glyphicon-plus-sign"></span>
            <small>Criar um pedido</small>
        </a>
        <div class="clearfix"></div>
    </div>
    
    <!-- wrapper dos pedidos -->
    <section class="col-md-12">
        
        <!-- html do pedido -->
        <?php if($pedidos):?>
        <?php foreach($pedidos as $pedido):?>
        <article class="pedido">
            <!-- titulo do pedido -->
            <div class="pedido_title">
                <h3>
                    <?PHP echo $pedido->desc_title; ?>
                    <small>
                        <span class="label label-success">Aberto</span>
                    </small>
                </h3>
            </div>
            
            <!-- dados do pedido -->
            <div class="pedido_data">
                <span class="data_container">
                    <strong>Postado em: </strong> <?php echo date('d-m-y', strtotime($pedido->date_pub));?>
                </span>
            </div>
            
            <!-- descrição do pedido -->
            <div class="pedido_description">
            <p><?php echo $pedido->desc_descricao; ?></p>
            </div>
            
            <!-- dados do pedido -->
            <div class="pedido_data">
                <span class="data_container">
                    <strong>Validade: </strong> 3 dias
                </span>
                <span class="data_container">
                    <strong>Propostas: </strong> 3
                </span>
                <span class="data_container">
                    <strong>Visualizações: </strong> 260 pessoas
                </span>
            </div>
            
            <!-- botoes de ação -->
            <div class="pedido_action">
                <br>
                <a href="#" class="btn btn-pill btn-pill-info">
                    <small>
                        <span class="glyphicon glyphicon-edit"></span>
                        Editar pedido
                    </small>
                </a>
                <a href="#" class="btn btn-pill btn-pill-warning">
                    <small>
                        <span class="glyphicon glyphicon-remove"></span>
                        Deletar pedido
                    </small>
                </a>
            </div>
        </article><!-- html do pedido -->
        <?php endforeach;?>
        <?php else :?>
        <h2><center>Nenhum pedido encontrado</center></h2>
        <?php endif;?>

    </section>
    
    <!-- paginaçao -->
    <section class="col-md-12">
        <nav class="col-md-5 col-md-offset-4">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </section>
    
    
</div>