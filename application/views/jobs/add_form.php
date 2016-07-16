<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="addform_wrapper" class="container">
    <!-- titulo da pagina -->
    <div class="page-header">
        <h1 class="dark-text">Pedir uma aula</h1>
    </div>
    
    <form id="adicionaJob" class="col-md-4 no-padding" action="" method="post">
        
        <!-- categoria principal-->
        <div class="col-md-12">
            <label for="cat_principal">Selecione uma matéria</label>
            <p class="text-muted">O que você deseja aprender?</p>
            <select id="cat_principal" name="cat_principal" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <br>
        </div>
        
        <!-- categoria secundaria-->
        <div class="col-md-12">
            <label for="cat_sec">Selecione uma sub-matéria</label>
            <p class="text-muted">Seja mais específico ...</p>
            <select id="cat_sec" name="cat_sec" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <br>
        </div>
        
        <!-- categoria secundaria-->
        <div class="col-md-12">
            <label for="cat_sec">Orçamento</label>
            <p class="text-muted">Diga quanto pretende pagar e encontre profissionais que cabem no seu bolso</p>
            <select id="cat_sec" name="cat_sec" class="form-control">
                <option>R$ 10-25</option>
                <option>R$ 10-25</option>
                <option>R$ 10-25</option>
                <option>R$ 10-25</option>
                <option>R$ 10-25</option>
            </select>
            <br>
        </div>
        
        <!-- breve descrição -->
        <div class="col-md-12">
            <label for="desc_job">Descrição do pedido</label>
            <p class="text-muted">Conte mais sobre o que você está procurando?</p>
            <textarea id="desc_job" name="desc_job" class="form-control"></textarea>
            <br>
        </div>
        
        <!-- botões do formulário-->
        <div class="col-md-12">
            
            <button type="submit" class="btn btn-pill btn-success pull-right">
                Pedir aula
            </button>
            
            <button type="reset" class="btn btn-pill btn-default">
                Cancelar
            </button>
            
        </div>
        
    </form>
    
</div>