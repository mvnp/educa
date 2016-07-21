<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container tab_container">
    
    <!-- titulo do table -->
    <div class="col-md-12">
        <h3 class="pull-left">Propostas</h3>
    </div>
    
    <!-- tabs de busca -->
    <div class="col-md-12">
        <ul class="nav nav-pills">
            <li role="presentation" <?php echo ($type == "recebidas") ? 'class="active"': '';?>>
                <a href="<?php echo site_url()."profile/propostas/recebidas"; ?>">Recebidas</a>
            </li>
            <li role="presentation" <?php echo ($type == "feitas") ? 'class="active"': '';?>>
                <a href="<?php echo site_url()."profile/propostas/feitas"; ?>">Feitas</a>
            </li>
        </ul>
    </div>
    
    <!-- wrapper dos pedidos -->
    <section class="col-md-12">
        
        <!-- html do pedido -->
        <?php if($propostas): ?>
        <?php foreach($propostas as $proposta):?>
        <article class="pedido">
            <!-- titulo do pedido -->
            <div class="pedido_title">
                <h4>
                    <?php echo $proposta->username; ?> <span class="dark-text">em <?php echo $proposta->desc_title; ?></span>
                    <small>
                        <?php echo $proposta->flg_status; ?>
                    </small>
                </h4>
            </div>
            
            <!-- dados do pedido -->
            <div class="pedido_data">
                <span class="data_container">
                    <strong>Valor: </strong> R$ 50,00
                </span>
                <span class="data_container">
                    <strong>Postado em: </strong> 17/11/1996
                </span>
            </div>
            
            <!-- descrição do pedido -->
            <div class="pedido_description">
            <p><?php echo $proposta->desc_descricao; ?></div>

            <!-- botoes de ação -->
            <div class="pedido_action">
                <br>
                <a href="<?php echo site_url(); ?>propostas/exibir/<?php echo $proposta->proposta_id; ?>" class="btn btn-pill btn-pill-info">
                    <small>
                        <span class="glyphicon glyphicon-eye-open"></span>
                        Ver detalhes
                    </small>
                </a>
                
                <?php if($type == 'feitas'): ?>
                <a href="#" class="btn btn-pill btn-pill-warning">    
                    <small>
                        <span class="glyphicon glyphicon-remove"></span>
                        Deletar proposta
                    </small>
                </a>
                <?php endif; ?>

            </div>
        </article><!-- html do pedido -->
        <?php endforeach;?>
        <?php else :?>
        <h3>Nenhuma proposta encontrada</h3>
        <?PHP endif; ?>    
    </section>
    
    <!-- paginaçao -->
    <section class="col-md-12">
        <nav class="col-md-5 col-md-offset-4">
            <?php echo $links;?>
        </nav>
    </section>
    
</div>