<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- header do profile -->
<header class="job_header">

</header>

<!-- corpo do profile -->
<section class="job_wrapper">
    
    <section class="job_container container">
        
        <!-- cabeçalho da página -->
        <div class="page-header">
            <h1>Pedidos de aula</h1>
        </div>
         
        <!-- container do resultado das buscas -->
        <section class="jobs_content">
            
            <!-- filtros -->
            <?php if(!$no_filters):?>
            <div class="bg-warning col-md-12 get-padding">
                <strong>
                    <span class="glyphicon glyphicon-filter"></span>
                    Filtros:
                </strong><br>
                
                <p class="get-margin">
                    <?php if($this->session->userdata('filter_cat_principal')):?>
                    <span class="label label-warning get-margin">
                        <?php echo $this->session->userdata('filter_cat_principal');?>
                    </span>
                    <?php endif;?>

                    <?php if($this->session->userdata('filter_cat_sec')):?>
                    <span class="label label-warning get-margin">
                        <?php echo $this->session->userdata('filter_cat_sec');?>
                    </span>
                    <?php endif;?>

                    <?php if($this->session->userdata('filter_desc_orc')):?>
                    <span class="label label-warning get-margin">
                        <?php echo $this->session->userdata('filter_desc_orc');?>
                    </span>
                    <?php endif;?>
                    <a href="<?php echo site_url(); ?>jobs/remove_filters" class="label label-danger">Remover filtros</a>
                </p>
            </div>
            <?php endif; ?>
            
            <?php if($result):?>
            <?php foreach($result as $job):?>
            <!-- inicio do article do job -->
            <article class="job <?php echo ($job->user_id == $this->__user->id)? "my_job": ""; ?>">
                <h2 class="job_title">
                    <?php echo $job->desc_title; ?>
                </h2>
                
                <div class="job_data">
                    <span class="job_data_span">
                        <span class="hidden-xs">orçamento: </span>
                        <strong><?php echo $job->desc_orcamento; ?></strong>
                    </span>
                    <span class="job_data_span">
                        <span class="hidden-xs">publicado em: </span>
                        <strong><?php echo $job->date_pub; ?></strong>
                    </span>
                    <span class="job_data_span">
                        <span class="hidden-xs">propostas: </span>
                        <strong>0</strong>
                    </span>
                </div>
                
                <div class="job_description">
                    <p><?php echo $job->desc_descricao; ?></p>
                </div>
                
                <div class="job_tags">
                    <span class="label label-success"><?php echo $job->desc_nome; ?></span>
                    <?php if(!empty($job->sub_nome)):?>
                    <span class="label label-info"><?php echo $job->sub_nome; ?></span>
                    <?php endif; ?>
                </div>
                
                
                <div class="job_action">
                    <?php if($job->user_id != $this->__user->id):?>
                    <a href="<?php echo site_url();?>jobs/aula/<?php echo $job->job_id;?>" class="btn btn-pill btn-pill-info">
                        Fazer proposta
                    </a>
                    <a href="#" class="btn btn-pill btn-pill-warning">
                        Denunciar
                    </a>
                    <?php endif; ?>
                </div>
                
                
            </article><!-- fim do article do job -->
            <?php endforeach; ?>
            
            <?php else: ?>
            <div class="col-md-12">
                <center>Nenhum resultado encontrado</center>
            </div>
            <?php endif; ?>
            
            <!-- paginaçao -->
            <section class="col-md-12">
                <nav class="col-md-5 col-md-offset-4">
                    <?php echo $links; ?>
                </nav>
            </section>
            
        </section>
        
        <!-- barra lateral -->
        <aside class="sidebar_jobs">
            
            <!-- form com os filtros -->
            <form method="post" action="<?php echo site_url();?>jobs/">
                <!-- filtros de busca -->
                <h3>Filtros</h3>
                <!-- ajax -->
                <input type="hidden" value="<?php echo site_url();?>" id="site_url">

                <!-- categoria principal-->
                <div class="col-md-12">
                    <label for="cat_principal">Matéria</label>
                    <select id="cat_principal" name="cat_principal" class="form-control">
                        <?php echo $options_categoria; ?>
                    </select>
                    <br>
                </div>

                <!-- categoria secundaria-->
                <div class="col-md-12">
                    <label for="cat_sec">Sub-matéria</label>
                    <select id="cat_sec" name="cat_sec" class="form-control" disabled>
                    </select>
                    <br>
                </div>

                <!-- categoria secundaria-->
                <div class="col-md-12">
                    <label for="desc_orcamento">Orçamento</label>
                    <select id="desc_orcamento" name="desc_orcamento" class="form-control">
                        <option value='' selected>Orçamento</option>
                        <option value="R$ 10,00 - 25,00">R$ 10,00 - 25,00</option>
                        <option value="R$ 25,00 - 50,00">R$ 25,00 - 50,00</option>
                        <option value="R$ 50,00 - 100,00">R$ 50,00 - 100,00</option>
                        <option value="R$ 100,00 - 500,00">R$ 100,00 - 500,00</option>
                        <option value="R$ 500,00 -">R$ 500,00 -</option>
                    </select>
                    <br>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-block btn-success">
                        <span class="glyphicon glyphicon-filter"></span>
                        Filtrar
                    </button>
                </div>
            </form>
            
        </aside>
        
    </section>
    
</section>