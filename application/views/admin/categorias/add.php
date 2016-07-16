<div id="page-wrapper">
    
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Categorias <small>adicionar uma nova categoria</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> &nbsp;Painel de controle
                    </li>
                    <li class="active">
                        <span class="glyphicon glyphicon-list"></span> &nbsp;Categorias
                    </li>
                    <li class="active">
                        <span class="glyphicon glyphicon-plus-sign"></span> &nbsp;Adicionar
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <form class="col-md-5" method="post" action="<?PHP echo site_url();?>admin_categorias/add">
                
                <div class="col-md-12">
                    <p>Adicionar uma nova categoria para as aulas ministradas no site</p>
                </div>
                
                <?php if($error):?>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <strong>Houve um erro</strong>
                        <span>
                            <?php echo $error; ?>
                        </span>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if(isset($dados[$this->categorias_model->getField('CategoriaID')])):?>
                <input type="hidden" name="id_editar" value="<?php echo $dados[$this->categorias_model->getField('CategoriaID')];?>">
                <?php endif; ?>
                
                <div class="col-md-12">
                    <label for="categoria_nome">Categoria</label>
                    <input type="text" 
                           id="categoria_nome" 
                           name="categoria_nome" 
                           class="form-control" 
                           value="<?php echo set_value('categoria_nome',(isset($dados[$this->categorias_model->getField('Categoria')]))?$dados[$this->categorias_model->getField('Categoria')]:"");?>"
                           placeholder="Matematica, português ...">
                </div>    

                <div class="col-md-12">
                    <br>
                    <label for="categoria_nome">Descrição</label>
                    <textarea id="categoria_desc" 
                              name="categoria_desc" 
                              class="form-control"
                              placeholder="Descrição da categoria"><?php echo set_value('categoria_desc',(isset($dados[$this->categorias_model->getField('CategoriaInfo')]))?$dados[$this->categorias_model->getField('CategoriaInfo')]:"");?></textarea>
                </div>

                <div class="col-md-12">
                    <br>
                    <button type="submit" class="btn btn-success get-margin pull-right">
                        Salvar &nbsp;<span class="glyphicon glyphicon-plus-sign"></span>
                    </button>
                    <a href="<?php echo site_url();?>admin_categorias" class="btn btn-warning get-margin pull-right">
                        Listagem &nbsp;<span class="glyphicon glyphicon-list"></span>
                    </a>
                </div>

            </form>

        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->

</div>
    <!-- /#page-wrapper -->