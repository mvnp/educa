<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Propostas <small>propostas de aulas feitas no site</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                    	Painel de controle
                    </li>
                    <li class="active">
                        Propostas
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
        	<div class="col-md-12">
        		<?php echo $table; ?>
        	</div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>

<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<!-- /#page-wrapper -->