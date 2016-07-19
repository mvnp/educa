<!-- pagina central da landing -->
<div id="landing_panel_image" class="container-fluid">
    <center>
        <h1 class="landing_slogan">A educação a um clique de distância</h1>
        <h1 class="col-md-7 get-center" style="color: #fff;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        </h1>
        <br>
        <a href="<?php echo site_url();?>user/register" class="btn btn-padding btn-warning btn-lg">
            <span class="xl-font">Começar a usar</span>
        </a>
    </center>
</div>

<!-- timeline -->
<div class="container">
    
    <h1 style="text-align: center;">
        Como funciona?<br>
        <small>
        O site é programado em "APRENDER".  
        </small>
    </h1>
    
    <ul class="timeline">
        <li>
            <div class="timeline-badge"><i class="fa fa-check"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                    </p>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio, tempore. Animi officiis alias, officia repellendus.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge info">
                <span class="glyphicon glyphicon-user"></span>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur impedit nulla qui! Laborum, atque.</p>
                    <hr>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-gear"></i>  <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a>
                            </li>
                            <li><a href="#">Another action</a>
                            </li>
                            <li><a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi fuga odio quibusdam. Iure expedita, incidunt unde quis nam! Quod, quisquam. Officia quam qui adipisci quas consequuntur nostrum sequi. Consequuntur, commodi.</p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque eaque.</p>
                </div>
            </div>
        </li>
    </ul>
</div>

<!-- usuarios -->
<div id="opiniao_usuarios" class="container-fluid">
    <div class="container">
        <center>
            <h2>Junte-se ao nosso grupo</h2>
            <h3 class="col-md-5 get-center">Code School has impacted over a million students from 237 countries. Read how these students learn by doing with Code School courses and screencasts.s</h3>
        </center>
    
        <?php for($i=0;$i<3;$i++):?>    
        <div class="col-md-4 user_wrapper">
        <br>    
        <p>
            “I had never tried to learn code before out of fear that I wasn’t ‘techy enough’ and probably not smart enough — I was a Mathlete, but I spent most of my time making doodles with the DRAW function of my TI89. Every time I finish a Code School lesson, I feel like I prove that fear wrong. I truly appreciate you making an accessible resource.”</p>
            <center>
                <img class="user_pic" src="<?php echo base_url()?>images/user_icon.jpg">
                <h4>Juliana Alves Pereira</h4>
            </center>
        </div>
        <?php endfor; ?>
    </div>
    
</div>

<!-- footer -->
<footer id="footer_landing_page">

</footer>