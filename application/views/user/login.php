<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="col-md-5 get-center" method="post" action=""> 
    <!-- titulo do form -->
    <div class="page-header">
        <h1 class="dark-text">Entrar</h1>
    </div>
    <!--mensagens de erro -->
    <?PHP if($response['error'] && isset($response['status']) && !empty($response['status'])):?>
    <div class="alert alert-danger">
        <?PHP echo $response['status']; ?>
    </div>
    <?PHP endif?>
    <!-- caixa para o email -->
    <label class="input-wrapper-label dark-text" for="">Nome de usuário ou e-mail</label>
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
    <!-- caixa para a senha -->
    <label class="input-wrapper-label dark-text" for="">Senha</label>
    <div class="input-wrapper">
        <input  type="password" 
                id="password_login" 
                name="password_login" 
                placeholder="Senha" 
                class="input-wrapped">
        <div class="input-wrapper-icon">
            <span class="glyphicon glyphicon-lock"></span>
        </div>
    </div>
    <!--link para esqueceu a senha -->
    <a class="line--60 get-margin" href="<?php echo site_url()."user/forgot_password"?>">
        <span class="glyphicon glyphicon-question-sign"></span>
        Esqueceu sua senha?
    </a>
    <!-- botao de submit -->
    <button type="submit" class="btn btn-block btn-lg btn-info btn-pill-lg">
        Entrar
    </button>
    <!-- link para cadastrar novo usuario -->
    <p class="text-center line--60">
        <strong>
            <span class="dark-text">Não tem uma conta?</span>
            <a href="<?php echo site_url()."user/register"; ?>">Criar uma agora!</a>
        </strong>
    </p>
</form>