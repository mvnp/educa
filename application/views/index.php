<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $page_lang; ?>">
    <head>
        <!-- php que carrega as metatags -->
        <?PHP foreach($metatags as $file) echo $file . "\n"; ?>
        <!-- php que carrega o css -->
        <?PHP foreach($page_CSS as $file) echo $file . "\n"; ?>
        <title><?php echo $title; ?></title><!-- titulo do site -->
    </head>
    <body>
        <!-- php que carrega os scripts -->
        <?PHP foreach($page_JS as $file) echo $file . "\n"; ?>
        
        <?PHP if(isset($is_admin) && $is_admin): ?>
            <?php $this->load->view('admin/index'); ?>
        <?PHP else: ?>
            <div class="page-wrapper">

                <!-- inclui o header -->
                <?php $this->load->view("template/header");?>

                <!-- inclui o conteudo da pagina -->
                <?php  if(isset($view)) $this->load->view($view); ?>

            </div>
            <!-- inclui a div fixada no bottom -->
            <?php $this->load->view("template/bottom"); ?>
        <?PHP endif; ?>
        
    </body>
</html>

