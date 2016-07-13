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
                <?php echo $this->__user->username; ?>
                <small>
                <?php echo $this->__user->email;?>
                </small>
            </h2>
        </div>
        
        <!-- segunda linha do header do perfil -->
        <div class="profile_line pull-left">
            <button class="btn btn-default">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                <strong>Editar perfil</strong>
            </button>
        </div>
        
    </div>
    
</div>