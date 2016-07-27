<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container tab_container">
    
    <!-- titulo do table -->
    <div class="col-md-12">
        <h3 class="pull-left">Propostas</h3>
    </div>
    
    <!-- alert de resposta do ajax -->
    <div id="ajax_resposta" class="col-xs-12 hidden">
        <div class="alert">
            
        </div>
    </div>

    <!-- alerta para remover uma proposta -->
    <div id="excluir_proposta_box" class="col-md-12 hidden" data-id="">
        <div class="alert alert-warning">
            <strong>Tem certeza que deseja excluir essa proposta?</strong>
            <p>Caso o usuário dono do pedido já tenha aceitado e pagado a sua proposta, você terá que cumprir o acordo.</p>
            <br>
            <button id="excluir_proposta" type="button" class="btn btn-danger">
                Excluir proposta
            </button>
            <button id="voltar_excluir_proposta" type="button" class="btn btn-info">
                Voltar
            </button> 
        </div>
    </div>

    <!-- tabs de busca -->
    <div class="col-xs-12">
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
    <section class="col-xs-12">
        
        <!-- html do pedido -->
        <?php if($propostas): ?>
        <?php foreach($propostas as $proposta):?>
        <article class="pedido">
            <!-- titulo do pedido -->
            <div class="pedido_title">
                <h4>
                    <?php echo $proposta->username; ?> <span class="dark-text">em <?php echo $proposta->desc_title; ?></span>
                    <small>
                        <?php echo $proposta->flg_status_label; ?>
                    </small>
                </h4>
            </div>
            
            <!-- dados do pedido -->
            <div class="pedido_data">
                <span class="data_container">
                    <strong>Valor: </strong> R$ <?php echo number_format($proposta->desc_valor, 2, ',', ' '); ?>
                </span>
                <span class="data_container">
                    <strong>Postado em: </strong> <?php echo date("H:i d/m/Y", strtotime($proposta->date_pub)); ?>
                </span>
            </div>
            
            <!-- descrição do pedido -->
            <div class="pedido_description">
            <p><?php echo $proposta->desc_descricao; ?></div>

            <!-- botoes de ação -->
            <?php if($proposta->flg_status !== "R" || $type == 'feitas'):?>
            <div class="pedido_action">
                <br>
                
                <?php if($proposta->flg_status !== "R"):?>
                <a href="<?php echo site_url(); ?>propostas/exibir/<?php echo $proposta->proposta_id; ?>" class="btn btn-pill btn-pill-info">
                    <small>
                        <span class="glyphicon glyphicon-eye-open"></span>
                        Ver detalhes
                    </small>
                </a>
                <?php endif; ?><!-- ver detalhes -->

                <?php if($type == 'feitas'): ?>
                <button type="button" 
                        class="btn btn-pill btn-pill-warning excluir_proposta" 
                        data-id="<?php echo $proposta->proposta_id; ?>">    
                    <small>
                        <span class="glyphicon glyphicon-remove"></span>
                        Deletar proposta
                    </small>
                </button>
                <?php endif; ?><!-- deletar a proposta -->

            </div>
            <?php endif; ?>
        </article><!-- html do pedido -->
        <?php endforeach;?>
        <?php else :?>
        <h3>Nenhuma proposta encontrada</h3>
        <?PHP endif; ?>    
    </section>
    
    <!-- paginaçao -->
    <section class="col-xs-12">
        <nav class="col-md-5 col-md-offset-4">
            <?php echo $links;?>
        </nav>
    </section>
    
</div>