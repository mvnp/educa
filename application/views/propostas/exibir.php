<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="proposta_wrapper container">

	<!-- caixa para recusar a proposta -->
	<section id="recusar_proposta_box" class="col-xs-12 alert alert-danger hidden">
		<strong>Você tem certeza que deseja recusar essa proposta?</strong><br><br>
		<p>Se você recusar essa proposta, ela não será mais listada para você. Você também não poderá voltar atrás após recusa-la</p><br>
		<a href="<?php echo site_url(); ?>propostas/recusar/<?php echo $proposta->proposta_id; ?>" class="btn btn-danger">
			Recusar proposta
		</a>
		<button type="button" id="voltar_proposta_btn" class="btn btn-info">
			Voltar
		</button>
	</section>

	<!-- caixa para aceitar a proposta -->
	<section id="aceitar_proposta_box" class="col-xs-12 alert alert-success hidden">
		<strong>Você tem certeza que deseja aceitar essa proposta?</strong><br><br>
		<p>Se você recusar essa proposta, ela não será mais listada para você. Você também não poderá voltar atrás após recusa-la</p><br>
		<a href="<?php echo site_url(); ?>propostas/pagar/<?php echo $proposta->proposta_id; ?>" class="btn btn-success">
			Aceitar proposta
		</a>
		<button type="button" id="voltar_aceitar_btn" class="btn btn-info">
			Voltar
		</button>
	</section>

	<!-- botoes de açoes -->
	<section class="col-xs-12">
		
		<div class="pull-left">
			<h3>
				<?php echo $professor->username .' em '.$proposta->job_title;?>
			</h3>
		</div>

		<div class="pull-right">
			<br>
			<button id="aceitar_proposta_btn" type="button" class="btn btn-success">Aceitar proposta</button>
			<button id="recusar_proposta_btn" type="button" class="btn btn-danger">Recusar proposta</button>
		</div>

		<div class="clearfix"></div>			
	</section>

	<!-- dados da proposta -->
	<section class="col-xs-12 col-md-8">
		
		<article role="spacer" class="col-xs-12"><br></article>

		<article class="col-xs-12 bg-warning informacoes">
			<span class="title">Informações</span>
			
			<span class="item">
				<strong>
					<span class="glyphicon glyphicon-credit-card"></span> Valor
				</strong> R$ <?php echo number_format($proposta->desc_valor, 2, ',', ' '); ?>
			</span>

			<span class="item">
				<strong>
					<span class="glyphicon glyphicon-user"></span> Professor
				</strong> <?php echo (isset($professor->nome)) ? $professor->nome ." ".$professor->sobrenome : $professor->username;?>
			</span>

			<span class="item">
				<strong>
					<span class="glyphicon glyphicon-calendar"></span> Publicada em
				</strong> <?php echo date('m/d/Y',strtotime($proposta->date_pub)); ?>
			</span>

		</article><!-- informações da proposta -->

		<article class="col-xs-12 bg-info informacoes" style="margin-top: 5px">
			<span class="title">Informações do pedido</span>
			
			<span class="item">
				<strong>
					<span class="glyphicon glyphicon-font"></span> Título
				</strong> <?php echo $proposta->job_title;?>
			</span>

			<span class="item">
				<strong>
					<span class="glyphicon glyphicon-list"></span> Descrição
				</strong> <?php echo $proposta->job_desc;?>
			</span>

			<span class="item">
				<strong>
					<span class="glyphicon glyphicon-calendar"></span> Publicada em
				</strong> <?php echo date('m/d/Y',strtotime($proposta->pub_job)); ?>
			</span>

		</article><!-- informações do pedido -->

		<article class="col-xs-12">
			<h2>Descrição</h2>
			<p><?php echo $proposta->desc_descricao; ?></p>
		</article>
	</section>

	<!-- dados do professor -->
	<section class="col-xs-12 col-md-4">
		<article class="col-xs-12">

			<!-- imagem do professor -->
			<center>
				<h3>Professor</h3>
				<img class="thumbnail" src="<?php echo base_url(); ?>/uploads/<?php echo $professor->foto; ?>" width="100px">
				
				<?PHP if(isset($professor->nome) && isset($professor->sobrenome)):?>
				<span class="block">
					<strong>Nome: </strong> <?php echo $professor->nome . " " . $professor->sobrenome; ?>
				</span>
				<?php endif; ?>

				<span class="block">
					<strong>Nome de usuário: </strong> <?php echo $professor->username; ?>
				</span>

				<span class="block">
					<strong>E-mail: </strong> <?php echo $professor->email; ?>
				</span>

				<span class="block">
					<strong>Membro desde: </strong> <?PHP echo date('d/m/Y', $professor->created_on);?>
				</span>

				<span class="block">
					<strong>Último login: </strong> <?PHP echo date('H:i d/m/Y', $professor->last_login);?>
				</span>

				<?PHP if(isset($professor->nome) && isset($professor->sobrenome)):?>
				<span class="block">
					<strong>Estado em que reside: </strong> <?php echo $professor->estado; ?>
				</span>
				<?php endif; ?>

				<span class="block">
					<a href="#">ver perfil</a>
				</span>

				<!--<span class="block">
					<span class="label label-info">Matemática</span>
					<span class="label label-info">Matemática</span>
					<span class="label label-info">Matemática</span>
					<span class="label label-info">Matemática</span>
				</span>-->

			</center>

		</article>
	</section>

</section>