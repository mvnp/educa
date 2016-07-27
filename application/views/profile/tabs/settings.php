<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container tab_container">

	<!-- informaçoes -->
	<div class="col-md-8 col-md-offset-2 no-padding">
		<br>
		<p class="text-info">
			<strong>
				<span class="glyphicon glyphicon-info-sign"></span> Informações
			</strong> Esses dados são sigilosos e serão usados apenas em efeitos de pagamentos.
		</p>
	</div>	

	<!-- form caso for a primeira compra -->
	<form class="col-md-8 col-md-offset-2 no-padding" action="<?PHP echo site_url();?>profile/settings" method="post">

		<!-- alerta do formulário -->
		<?php if($error): ?>
		<div class="alert alert-danger">
			<strong>Algo deu errado ...</strong>
			<p><?php echo $error; ?></p>	
		</div>
		<?php endif; ?>

		<!-- dados pessoais -->	
		<div class="col-md-12 no-padding">
			<h3 class="dark-text">Dados pessoais</h3>
		</div>

		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Nome</label>		
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="Renato"
						name="cad_nome" 
						value="<?php echo (isset($this->__user->nome)) ? $this->__user->nome : "" ;?>">		
			</div>	
		</div><!-- nome -->
			
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Sobrenome</label>		
			<div class="input-wrapper">
				<input 	type="text"	
						class="input-wrapped" 
						placeholder="Souza"
						name="cad_sobrenome"
						value="<?php echo (isset($this->__user->sobrenome)) ? $this->__user->sobrenome : "" ;?>">		
			</div>	
		</div><!-- sobrenome -->
		
		<div class="col-md-12 no-padding">
			<label class="get-margin dark-text">CPF</label>		
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="000.000.000-00"
						name="cad_cpf"
						value="<?php echo (isset($this->__user->cpf)) ? $this->__user->cpf : "" ;?>">		
			</div>	
		</div><!-- cpf -->

		<!-- dados da cobrança -->	
		<div class="col-md-12 no-padding">		
			<h3 class="dark-text">Dados para cobrança</h3>
		</div>

		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Estado</label>			
			<div class="input-wrapper">
				<select type="text" class="input-wrapped" placeholder="Nome" name="cad_estado">
					<option value="SP">São Paulo</option>
					<option value="SP">São Paulo</option>
					<option value="SP">São Paulo</option>
					<option value="SP">São Paulo</option>
				</select>		
			</div>	
		</div><!-- estado -->

		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">CEP</label>			
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="00000-000"
						name="cad_cep"
						value="<?php echo (isset($this->__user->cep)) ? $this->__user->cep : "" ;?>">		
			</div>	
		</div><!-- cep -->
		
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Endereço</label>			
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="R. Emilio José"
						name="cad_endereco"
						value="<?php echo (isset($this->__user->endereco)) ? $this->__user->endereco : "" ;?>">		
			</div>	
		</div><!-- endereço -->
		
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Número</label>			
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="000"
						name="cad_numero"
						value="<?php echo (isset($this->__user->numero)) ? $this->__user->numero : "" ;?>">		
			</div>	
		</div><!-- numero -->
		
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Complemento</label>	
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="Apartamento, conjunto, casa"
						name="cad_complemento"
						value="<?php echo (isset($this->__user->complemento)) ? $this->__user->complemento : "" ;?>">		
			</div>	
		</div><!-- complemento -->
		
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Bairro</label>		
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="Jardim Silvana"
						name="cad_bairro"
						value="<?php echo (isset($this->__user->bairro)) ? $this->__user->bairro : "" ;?>">		
			</div>
		</div><!-- bairro -->
		
		<div class="col-md-6 no-padding">	
			<label class="get-margin dark-text">Cidade</label>	
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="Sorocaba"
						name="cad_cidade"
						value="<?php echo (isset($this->__user->cidade)) ? $this->__user->cidade : "" ;?>">		
			</div>	
		</div><!-- cidade -->
		
		<div class="col-md-6 no-padding">	
			<label class="get-margin dark-text">Telefone</label>		
			<div class="input-wrapper">
				<input 	type="text" 
						class="input-wrapped" 
						placeholder="(00) 00000-0000"
						name="cad_telefone"
						value="<?php echo (isset($this->__user->telefone)) ? $this->__user->telefone : "" ;?>">		
			</div>	
		</div><!-- telefone -->

		<!-- botões de ações -->
		<div class="col-md-12 no-padding">
			<button type="submit" class="btn btn-info pull-right get-margin btn-lg">
				<span class="glyphicon glyphicon-floppy-disk"></span>&nbsp; Salvar
			</button>
		</div>

	</form>
</div>