<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Categorias <small>categorias de educação</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> &nbsp;Painel de controle
                    </li>
                    <li class="active">
                        <span class="glyphicon glyphicon-list"></span> &nbsp;Categorias
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row" style="padding-bottom: 50px;">
            <a href="<?php site_url(); ?>admin_categorias/add" class="btn btn-success">Adicionar</a>
        </div>    

        <div class="row">
            <?php echo $datatable; ?>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->