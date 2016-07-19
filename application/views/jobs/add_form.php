<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="job_container container" style="margin-top: 10px">
    
    <!-- cabecalho da pagina -->
    <div class="page-header">
        <h1>Pedir uma aula</h1>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Library</a></li>
          <li class="active">Data</li>
        </ol>
    </div>
    
    <!-- conteudo principal -->
    <div class="row">
        <form id="adicionaJob" class="col-md-8 no-padding" action="<?php echo site_url();?>jobs/add" method="post">
            
            <!-- ajax -->
            <input type="hidden" value="<?php echo site_url();?>" id="site_url">
            
            <!-- erros a serem exibidos -->
            <?php if($error):?>
            <div class="col-md-12 get-margin alert alert-danger">
                <p>
                    <strong>Erro! </strong>
                    <?php echo $error; ?>
                </p>
            </div>
            <?php endif; ?>
            
            <!-- categoria principal-->
            <div class="col-md-12">
                <label for="cat_principal">Selecione uma matéria</label>
                <p class="text-muted">O que você deseja aprender?</p>
                <select id="cat_principal" name="cat_principal" class="form-control" required>
                    <?php echo $options_categoria; ?>
                </select>
                <br>
            </div>

            <!-- categoria secundaria-->
            <div class="col-md-12">
                <label for="cat_sec">Selecione uma sub-matéria</label>
                <p class="text-muted">Seja mais específico ...</p>
                <select id="cat_sec" name="cat_sec" class="form-control" disabled></select>
                <br>
            </div>

            <!-- categoria secundaria-->
            <div class="col-md-12">
                <label for="desc_orcamento">Orçamento</label>
                <p class="text-muted">Diga quanto pretende pagar e encontre profissionais que cabem no seu bolso</p>
                <select id="desc_orcamento" name="desc_orcamento" class="form-control">
                    <option value="R$ 10,00 - 25,00">R$ 10,00 - 25,00</option>
                    <option value="R$ 25,00 - 50,00">R$ 25,00 - 50,00</option>
                    <option value="R$ 50,00 - 100,00">R$ 50,00 - 100,00</option>
                    <option value="R$ 100,00 - 500,00">R$ 100,00 - 500,00</option>
                    <option value="R$ 500,00 -">R$ 500,00 -</option>
                </select>
                <br>
            </div>
            
            <!-- titulo -->
            <div class="col-md-12">
                <label for="desc_title">Título do pedido</label>
                <p class="text-muted">De um titulo ao seu pedido</p>
                <input type="text" class="form-control" placeholder="Aula de matemática" name="desc_title" id="desc_title">
                <br>
            </div>
            
            <!-- breve descrição -->
            <div class="col-md-12">
                <label for="desc_job">Descrição do pedido</label>
                <p class="text-muted">Conte mais sobre o que você está procurando?</p>
                <textarea id="desc_job" name="desc_job" class="form-control" rows="10" required></textarea>
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

</div>
