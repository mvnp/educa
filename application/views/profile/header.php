<div class="container">
    
    <div class="col-md-7 get-center">
        
        <div class="thumbnail get-margin avatar-wrapper pull-left">
            <img src="<?PHP base_url(); ?>uploads/default.png" width="100px">
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
    
    <div class="col-md-7 profile_tab_wrapper get-center">
        <a href="#" class="profile_tab profile_tab_active">
            <span class="glyphicon glyphicon-home"></span>
            <strong class="hidden-xs">Inicio</strong>
        </a>
        <a href="#" class="profile_tab">
            <span class="glyphicon glyphicon-home"></span>
            <strong class="hidden-xs">Inicio</strong>
        </a>
        <a href="#" class="profile_tab">
            <span class="glyphicon glyphicon-home"></span>
            <strong class="hidden-xs">Inicio</strong>
        </a>
        <a href="#" class="profile_tab">
            <span class="glyphicon glyphicon-home"></span>
            <strong class="hidden-xs">Inicio</strong>
        </a>
    </div>
    
</div>