<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container tab_container">
    
    <!-- titulo do table -->
    <div class="col-md-12">
        <h3 class="pull-left">Propostas</h3>
    </div>
    
    <!-- filtros de buscas -->
    <div class="well col-md-12">
        <strong class="block">Exibir:</strong>
        <label>
            <input type="radio" name="propostas" checked> Propostas nos meus pedidos
        </label>
        <label>
            <input type="radio" name="propostas"> Minhas propostas
        </label> 
    </div>
    
    <!-- wrapper dos pedidos -->
    <section class="col-md-12">
        
        <!-- html do pedido -->
        <?php for($i=0;$i<5;$i++):?>
        <article class="pedido">
            <!-- titulo do pedido -->
            <div class="pedido_title">
                <h3>
                    Gustavo vilas boas em Aula de Matemática
                    <small>
                        <span class="label label-danger">Recusada</span>
                    </small>
                </h3>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <!-- botoes de ação -->
            <div class="pedido_action">
                <br>
                <a href="#" class="btn btn-pill btn-pill-info">
                    <small>
                        <span class="glyphicon glyphicon-eye-open"></span>
                        Ver detalhes
                    </small>
                </a>
                
                <a href="#" class="btn btn-pill btn-pill-warning">    
                    <small>
                        <span class="glyphicon glyphicon-remove"></span>
                        Deletar proposta
                    </small>
                </a>
            </div>
        </article><!-- html do pedido -->
        <?php endfor;?>
        
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