<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url();?>admin">
            Administração
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <strong><?php $this->__user->username; ?></strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" src="http://placehold.it/50x50" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-footer">
                    <a href="#">Read All New Messages</a>
                </li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
                </li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php echo $this->__user->username; ?><b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php site_url()?>user/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
        
    </ul>
    
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <!-- home -->
            <li>
                <a href="<?php echo site_url()?>admin">
                <span class="glyphicon glyphicon-home"></span>&nbsp; Inicio</a>
            </li>
            
            <!--categorias -->
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#sistema">
                    <span class="glyphicon glyphicon-scale"></span>&nbsp;
                    Sistema <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="sistema" class="collapse">
                    <li>
                        <a href="<?php echo site_url();?>admin_categorias">
                            Logs
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_subcategorias">
                            Usuários
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_subcategorias">
                            Estatísticas
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_subcategorias">
                            Informações
                        </a>
                    </li>
                </ul>
            </li>

            <!--categorias -->
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#categorias">
                    <span class="glyphicon glyphicon-education"></span>
                    Categorias <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="categorias" class="collapse">
                    <li>
                        <a href="<?php echo site_url();?>admin_categorias">
                            <span class="glyphicon glyphicon-list"></span>
                            Categorias
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_subcategorias">
                            <span class="glyphicon glyphicon-list"></span>
                            Sub-categorias
                        </a>
                    </li>
                </ul>
            </li>

            <!--pagamentos -->
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#pagamentos">
                    <span class="glyphicon glyphicon-credit-card"></span>&nbsp;
                    Pagamentos <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="pagamentos" class="collapse">
                    <li>
                        <a href="<?php echo site_url();?>admin_categorias">
                            <span class="glyphicon glyphicon-list"></span>&nbsp;
                            Pagamentos recebidos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_subcategorias">
                            <span class="glyphicon glyphicon-list"></span>&nbsp;
                            Pagamentos realizados
                        </a>
                    </li>
                </ul>
            </li>

            <!--propostas -->
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#propostas">
                    <span class="glyphicon glyphicon-ok"></span>&nbsp;
                    Propostas <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="propostas" class="collapse">
                    <li>
                        <a href="<?php echo site_url();?>admin_propostas">
                            Ver todas
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_propostas/denuncias">
                            Denunciadas
                        </a>
                    </li>
                </ul>
            </li>

            <!--pedidos -->
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#pedidos">
                    <span class="glyphicon glyphicon-edit"></span>&nbsp;
                    Pedidos <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="pedidos" class="collapse">
                    <li>
                        <a href="<?php echo site_url();?>admin_pedidos/listar">
                            Ver todos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_subcategorias">
                            Denunciados
                        </a>
                    </li>
                </ul>
            </li>

            <!--configurações -->
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#settings">
                    <span class="glyphicon glyphicon-cog"></span>&nbsp;
                    Configurações <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="settings" class="collapse">
                    <li>
                        <a href="<?php echo site_url();?>admin_categorias">
                            Confiruações do site
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_subcategorias">
                            Configurações de pagamentos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>admin_subcategorias">
                            Configurações da landing page
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
