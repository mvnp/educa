<div id="page-wrapper">
    
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sub-categorias <small>adicionar uma nova categoria</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> &nbsp;Painel de controle
                    </li>
                    <li class="active">
                        <span class="glyphicon glyphicon-list"></span> &nbsp;Sub-categorias
                    </li>
                    <li class="active">
                        <span class="glyphicon glyphicon-plus-sign"></span> &nbsp;Adicionar
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <form class="col-md-5" method="post" action="<?PHP echo site_url();?>admin_subcategorias/add">
                
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
                
                <?php if(isset($dados[$this->subcategorias_model->getField('SubID')])):?>
                <input type="hidden" name="id_editar" value="<?php echo $dados[$this->subcategorias_model->getField('SubID')];?>">
                <?php endif; ?>
                
                <div class="col-md-12">
                    <br>
                    <label for="categoria_id">Categoria mãe</label>
                    <select class="form-control" name="categoria_id" id="categoria_id">
                        <?php echo $options; ?>
                    </select>
                </div>
                
                <div class="col-md-12">
                    <br>
                    <label for="subcategoria_nome">Sub-categoria</label>
                    <input type="text" 
                           id="subcategoria_nome" 
                           name="subcategoria_nome" 
                           class="form-control" 
                           value="<?php echo set_value("subcategoria_nome",isset($dados[$this->subcategorias_model->getField('SubNome')])?$dados[$this->subcategorias_model->getField('SubNome')]:"");?>"
                           placeholder="Matematica, português ...">
                </div>    
                    
                <div class="col-md-12">
                    <br>
                    <label for="subcategoria_nome">Descrição</label>
                    <textarea id="subcategoria_desc" 
                              name="subcategoria_desc" 
                              class="form-control"
                              placeholder="Descrição da categoria"><?php echo set_value("subcategoria_desc",isset($dados[$this->subcategorias_model->getField('SubDesc')])?$dados[$this->subcategorias_model->getField('SubDesc')]:"");?></textarea>
                </div>

                <div class="col-md-12">
                    <br>
                    <button type="submit" class="btn btn-success get-margin pull-right">
                        Salvar &nbsp;<span class="glyphicon glyphicon-plus-sign"></span>
                    </button>
                    <a href="<?php echo site_url();?>admin_subcategorias" class="btn btn-warning get-margin pull-right">
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