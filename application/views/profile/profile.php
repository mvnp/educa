<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- header do profile -->
<header class="profile_header">
<?php $this->load->view("profile/header");?>
</header>

<!-- corpo do profile -->
<section class="profile_wrapper">
    <?php if(isset($tab_view)) $this->load->view('profile/tabs/'.$tab_view); ?>
</section>