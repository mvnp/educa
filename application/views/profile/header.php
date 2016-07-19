<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">   
    <div class="col-md-7 get-center">
        <div class="thumbnail get-margin avatar-wrapper pull-left">
            <img src="<?PHP echo base_url(); ?>uploads/default.png" width="100px">
            <span class="legend">
                Alterar
            </span>
        </div>
        
        <!-- primeira linha do header do perfil -->
        <div class="profile_line pull-left">
            <h2>
                <!--nome de usuário -->
                <?php echo $this->__user->username; ?>
                <small class="hidden-xs">
                <?php echo $this->__user->email;?>
                </small><!-- email -->
            </h2>
        </div>
        
        <!-- segunda linha do header do perfil -->
        <div class="profile_line pull-left">
            <button class="btn btn-default">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                <strong>Editar perfil</strong>
            </button>
        </div>
        
        <div style="clear:both"></div>
        
    </div>
    
    <?php if(isset($tab_key)):?>
    <div class="col-md-7 profile_tab_wrapper get-center">
        <a href="<?php echo site_url().'profile';?>" class="profile_tab <?php echo ($tab_key == 1)? "profile_tab_active" : "";?>">
            <span class="glyphicon glyphicon-home"></span>
            <strong class="hidden-xs">Inicio</strong>
        </a>
        <a href="<?php echo site_url().'profile/pedidos';?>" class="profile_tab <?php echo ($tab_key == 2)? "profile_tab_active" : "";?>">
            <span class="glyphicon glyphicon-education"></span>
            <strong class="hidden-xs">Pedidos</strong>
        </a>
        <a href="<?php echo site_url().'profile/propostas';?>" class="profile_tab <?php echo ($tab_key == 3)? "profile_tab_active" : "";?>">
            <span class="glyphicon glyphicon-pencil"></span>
            <strong class="hidden-xs">Propostas</strong>
        </a>
        <a href="<?php echo site_url().'profile/settings';?>" class="profile_tab <?php echo ($tab_key == 4)? "profile_tab_active" : "";?>">
            <span class="glyphicon glyphicon-cog"></span>
            <strong class="hidden-xs">Configurações</strong>
        </a>
    </div>
    <?php endif; ?>
    
</div>