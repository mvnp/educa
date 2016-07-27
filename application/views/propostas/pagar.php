<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="proposta_wrapper container">

	<!-- cabecalho da pagina -->	
	<div class="page-header">
		<h1>Finalizar pagamento</h1>
	</div>

	<!-- caso o cliente ainda nao tenha feito o registro dos dados -->
	<?PHP if(!isset($this->__user->nome)):?>
	<div class="alert alert-danger">
		<strong>Complete o seu cadastro!</strong>
		<p>Para realizar o pagamento de propostas, você deve completar o seu cadastro com todas as informações necessárias.</p>
		<p>Para completar o seu cadastro, clique no botão abaixo.</p>
		<br>
		<a href="<?PHP echo site_url(); ?>profile/settings" class="btn btn-success">
			Completar meu cadastro
		</a>
	</div>
	<?php else : ?>

	<!-- dados do cliente -->
	<article class="col-md-6 no-padding">

		<!-- dados pessoais -->	
		<div class="col-md-12 no-padding">
			<h3 class="dark-text">Dados pessoais</h3>
		</div>

		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Nome</label>	
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->nome)) ? $this->__user->nome : "" ;?>		
				</strong>
			</div>	
		</div><!-- nome -->
			
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Sobrenome</label>		
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->sobrenome)) ? $this->__user->sobrenome : "" ;?>		
				</strong>
			</div>	
		</div><!-- sobrenome -->
		
		<div class="col-md-12 no-padding">
			<label class="get-margin dark-text">CPF</label>		
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->cpf)) ? $this->__user->cpf : "" ;?>		
				</strong>
			</div>	
		</div><!-- cpf -->

		<!-- dados da cobrança -->	
		<div class="col-md-12 no-padding">		
			<h3 class="dark-text">Dados para cobrança</h3>
		</div>

		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Estado</label>			
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->estado)) ? $this->__user->estado : "" ;?>		
				</strong>
			</div>	
		</div><!-- estado -->

		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">CEP</label>			
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->cep)) ? $this->__user->cep : "" ;?>		
				</strong>
			</div>	
		</div><!-- cep -->
		
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Endereço</label>			
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->endereco)) ? $this->__user->endereco : "" ;?>		
				</strong>
			</div>		
		</div><!-- endereço -->
		
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Número</label>			
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->numero)) ? $this->__user->numero : "" ;?>		
				</strong>
			</div>		
		</div><!-- numero -->
		
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Complemento</label>	
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->complemento)) ? $this->__user->complemento : "" ;?>		
				</strong>
			</div>		
		</div><!-- complemento -->
		
		<div class="col-md-6 no-padding">
			<label class="get-margin dark-text">Bairro</label>		
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->bairro)) ? $this->__user->bairro : "" ;?>		
				</strong>
			</div>	
		</div><!-- bairro -->
		
		<div class="col-md-6 no-padding">	
			<label class="get-margin dark-text">Cidade</label>	
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->cidade)) ? $this->__user->cidade : "" ;?>		
				</strong>
			</div>		
		</div><!-- cidade -->
		
		<div class="col-md-6 no-padding">	
			<label class="get-margin dark-text">Telefone</label>		
			<div class="well no-padding get-margin">
				<strong class="get-padding">
					<?php echo (isset($this->__user->telefone)) ? $this->__user->telefone : "" ;?>		
				</strong>
			</div>		
		</div><!-- telefone -->

		<!-- botões de ações -->
		<div class="col-md-12 no-padding">
			<a href="<?php echo site_url();?>profile/settings" class="btn btn-warning pull-right get-margin">
				<span class="glyphicon glyphicon-edit"></span>&nbsp; Editar
			</a>
		</div>
	</article>

	<!-- dados da proposta a ser aceita -->
	<article class="col-md-6">
		<div class="col-md-12 no-padding">
			<h3 class="dark-text">Dados da proposta</h3>
		</div>

		<div class="col-md-12">
			
			<div class="row">
				<h2 class="text-success">R$ <?PHP echo number_format($proposta->desc_valor, 2, ',', ' ');?></h2>
			</div>	

			<div class="row">
				<img src="<?php echo base_url();?>uploads/<?PHP echo $professor->foto; ?>" class="thumbnail pull-left" width="100px">
				<ul class="pull-left get-margin no_list">
					
					<?PHP if(isset($professor->nome) && isset($professor->sobrenome)):?>
					<li>
						<strong>Nome do professor:</strong>  <?php echo $professor->nome . " ".$professor->sobrenome; ?>
					</li>
					<?PHP else: ?>
					<li>
						<strong>Nome de usuário professor:</strong> <?php echo $professor->username; ?>
					</li>
					<?PHP endif; ?>
					<li>
						<strong>E-mail do professor</strong> <?php echo $professor->email; ?>
					</li>
					<li>
						<strong>Data da proposta:</strong> <?PHP echo date("H:i d/m/Y", strtotime($proposta->date_pub)); ?>
					</li>
			</div>

			<div class="row">
				<h3 class="dark-text">Descrição</h3>
				<p><?PHP echo $proposta->desc_descricao; ?></p>
			</div>

		</div>	
	</article>	

	<!-- alertas para o usuário -->
	<div class="col-md-12 bg-warning" style="margin-top: 50px;">	
		<p class="bg-warning get-padding">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
	</div>

	<!-- botoes de ação -->
	<div class="col-md-12 no-padding">
		<br>	
		<a href="<?php echo site_url(); ?>propostas/fazer_pagamento/<?PHP echo $proposta->proposta_id; ?>" class="btn btn-success btn-lg get-margin">
			Fazer pagamento
		</a>
	</div>		

	<?PHP endif; ?><!-- fim da verificação de perfil -->

</section>