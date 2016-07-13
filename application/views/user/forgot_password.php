<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="col-md-5 get-center" method="post" action="">
    
    <!-- titulo do form -->
    <div class="page-header">
        <h1 class="dark-text">Esqueci minha senha</h1>
    </div>
    <!-- text explicativo -->
    <p class="dark-text get-margin">
        Caso tenha perdido ou não se lembre da sua senha, informe o seu e-mail, que
        enviaremos um link de recuperação de senha o mais rápido possível.
    </p>
    <!-- caixa para o email -->
    <label class="input-wrapper-label dark-text" for="">E-mail</label>
    <div class="input-wrapper">
        <input  type="text" 
                id="identity_login" 
                name="identity_login" 
                placeholder="Nome de usuário ou e-mail" 
                class="input-wrapped">
        <div class="input-wrapper-icon">
            <span class="glyphicon glyphicon-user"></span>
        </div>
    </div>
    <br>
    <!-- botao de submit -->
    <button type="submit" class="btn btn-block btn-lg btn-danger btn-pill-lg">
        Recuperar minha senha
    </button>
    
</form>