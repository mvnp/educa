<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="col-md-5 get-center" method="post" action="">
    
    <!-- titulo do form -->
    <div class="page-header">
        <h1 class="dark-text">Registrar</h1>
    </div>
    
    <!--mensagens de erro -->
    <?PHP if($response['error'] && isset($response['status']) && !empty($response['status'])):?>
    <div class="alert alert-danger">
        <?PHP echo $response['status']; ?>
    </div>
    <?PHP endif?>
    
    <p class="dark-text get-margin">
        Faça seu registro gratuito agora mesmo, e tenha acesso a todo o serviço do nosso site.
    </p>
    <!-- caixa para o nome de usuario -->
    <label class="input-wrapper-label dark-text" for="">Nome de usuário</label>
    <div class="input-wrapper">
        <input  type="text" 
                id="usuario_register" 
                name="usuario_register" 
                placeholder="Nome de usuário" 
                class="input-wrapped username">
        <div class="input-wrapper-icon">
            <span class="glyphicon glyphicon-user"></span>
        </div>
    </div>
    <!-- caixa para o email -->
    <label class="input-wrapper-label dark-text" for="">Email</label>
    <div class="input-wrapper">
        <input  type="email" 
                id="email_register" 
                name="email_register" 
                placeholder="E-mail para cadastro" 
                class="input-wrapped">
        <div class="input-wrapper-icon">@</div>
    </div>
    <!-- caixa para a senha -->
    <label class="input-wrapper-label dark-text" for="">Senha</label>
    <div class="input-wrapper">
        <input  type="password" 
                id="password_register" 
                name="password_register" 
                placeholder="Senha" 
                class="input-wrapped">
        <div class="input-wrapper-icon">
            <span class="glyphicon glyphicon-lock"></span>
        </div>
    </div>
    <!-- confirme a senha -->
    <label class="input-wrapper-label dark-text" for="">Senha</label>
    <div class="input-wrapper">
        <input  type="password" 
                id="password_repeat_register" 
                name="password_repeat_register" 
                placeholder="Repita a senha" 
                class="input-wrapped">
        <div class="input-wrapper-icon">
            <span class="glyphicon glyphicon-lock"></span>
        </div>
    </div>
    <!--termos e condições -->
    <p class="get-margin line--60">
        <label>
            <input type="checkbox" required>
            <span class="dark-text">Declaro que li os</span> <a href="">Termos e Condições</a>
        </label>
    </p>
    <!-- botao de submit -->
    <button type="submit" class="btn btn-block btn-lg btn-warning btn-pill-lg">
        Cadastrar
    </button>
    
</form>