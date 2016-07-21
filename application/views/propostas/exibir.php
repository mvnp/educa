<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="proposta_wrapper container">

	<div class="page-header">
		<h1>Proposta</h1>
	</div>

	<!-- botoes de açoes -->
	<section class="col-xs-12">
		
		<div class="pull-left">
			<h3>Título da proposta</h3>
		</div>

		<div class="pull-right">
			<br>
			<button type="button" class="btn btn-success">Aceitar proposta</button>
			<button type="button" class="btn btn-danger">Recusar proposta</button>
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
				</strong> R$ 23,50
			</span>

			<span class="item">
				<strong>
					<span class="glyphicon glyphicon-user"></span> Professor
				</strong> Gustavo Vilas Boas
			</span>

			<span class="item">
				<strong>
					<span class="glyphicon glyphicon-calendar"></span> Publicada em
				</strong> 23/11/1996
			</span>

		</article>

		<article class="col-xs-12">
			<h2>Descrição</h2>
			<p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>
		</article>

	</section>

	<!-- dados do professor -->
	<section class="col-xs-12 col-md-4">
		<article class="col-xs-12">

			<!-- imagem do professor -->
			<center>
				<h3>Professor</h3>
				<img class="thumbnail" src="<?php echo base_url(); ?>/uploads/default.png" width="100px">
				
				<span class="block">
					<strong>Nome de usuário: </strong> @villasboas
				</span>

				<span class="block">
					<strong>Membro desde: </strong> 22/22/2222
				</span>

				<span class="block">
					<strong>Aulas ministradas</strong> 22
				</span>

				<span class="block">
					<a href="#">ver perfil</a>
				</span>

				<span class="block">
					<span class="label label-info">Matemática</span>
					<span class="label label-info">Matemática</span>
					<span class="label label-info">Matemática</span>
					<span class="label label-info">Matemática</span>
				</span>

			</center>

		</article>
	</section>

</section>