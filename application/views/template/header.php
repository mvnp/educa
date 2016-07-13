<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<header class="header">
    <div class="header-row container">
        
        <div class="header-left">
            <!-- icone do menu -->
            <a href="#" class="header-icone">
                <span class="glyphicon glyphicon-menu-hamburger"></span>
            </a>
        </div>
        
        <div class="header-right">
            
            <?php if($this->__logged):?>
            <div class="dropdown inline-block">
                <button class="btn btn-pill btn-pill-info header-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php echo $this->__user->username;?>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li>
                        <a href="<?php site_url(); ?>profile">
                            <span class="glyphicon glyphicon-user"></span>
                            Perfil
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="<?php echo site_url()."user/logout"; ?>">
                            <span class="glyphicon glyphicon-off"></span>
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
            <?php else: ?>
            <a href="<?php echo site_url()."user/register";?>" class="btn btn-pill btn-pill-info header-btn">
                <small>
                    <span class="hidden-xs">Cadastrar &nbsp;</span><span class="glyphicon glyphicon-edit"></span>
                </small>
            </a>
            <a href="<?php echo site_url()."user/login";?>" class="btn btn-pill btn-pill-warning header-btn">
                <small>
                    <span class="hidden-xs">Entrar &nbsp;</span><span class="glyphicon glyphicon-user"></span>
                </small>
            </a>
            <?php endif; ?>
            
            <!-- icones de pesquisa e menu de opções -->
            <a href="#" class="header-icone no-padding-aside">
                <span class="glyphicon glyphicon-search"></span>
            </a>
            <a href="#" class="header-icone no-padding-aside">
                <span class="glyphicon glyphicon-option-vertical"></span>
            </a>
        </div>
        
    </div>
</header>