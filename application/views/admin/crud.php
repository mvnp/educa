<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?php echo $main_title; ?>
                    <small>
                    	<?php echo $main_desc; ?>
                    </small>
                </h1>
                <ol class="breadcrumb">
                	<?php
                		$active = count($bread) - 1; 
                		foreach($bread as $index => $link): 
                	?>
                	<li class="<?php echo ($active == $index) ? "active":"";?>">
                        <?php echo $link; ?>
                    </li>
                	<?php endforeach;?>
                    
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