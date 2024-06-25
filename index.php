<?php include 'header.php'; 

//define('URL_AGRO', 'http://localhost/agro');
define('URL_AGRO', 'https://agro.agr.br');

$sites = json_decode(file_get_contents(URL_AGRO.'/api/get-sites'));

$offers_destak = json_decode(file_get_contents(URL_AGRO.'/api/get-offers/10/1'));

$offers = json_decode(file_get_contents(URL_AGRO.'/api/get-offers?'.http_build_query($_POST)));

?>

<div class="container pt-5 pb-5">
	<div class="row ">
		<div class="col-sm-5 order-2 order-sm-1">
			<h1 class="text-primary font-bold">Ofertas</h1>
			<p class="text-primary">Nesta página você pode verificar todas as ofertas da plataforma Agro e articular ótimos negócios.</p>
			<p class="text-primary">Se você for produtor também terá a chance de ofertar seus produtos e ampliar suas vendas.</p>

		</div>
		<div class="col-4 col-md-3 text-center order-1 order-sm-2">
			<img class="img-fluid mb-5" src="assets/img/agro-logo-lg.jpg" alt="Agro Agr" style="max-height: 175px">
		</div>
		<div class="col-8 col-md-4 text-center order-1 order-sm-2">
			<img class="img-fluid mb-5" src="https://agro.agr.br/upload/banners/9fab2392f13a177fe8a9f9e10fbc0bb5_thumb.png" alt="Apoio">
		</div>
	</div>
	
	<div class="row ">
		<div class="col-sm-3 order-2 order-sm-1">
			<div class="row">
				<div class="col-6 p-1">
					<img class="img-fluid w-100" src="https://chart.googleapis.com/chart?chs=170x170&cht=qr&chl=https://www.agro.agr.br/api/link-group/e4578b970adec93874c991ec00813e3e9c821dc72fca9afbeaf7a8039607e83ff87f0699a69146af0f0ec852c40acf4d86e1ef81df911bf2a64cd58c9163a8a1_5e0aMspmA0UA9K60PuSqGQKI65mJKFyps9Bn.pc7XQ-&choe=UTF-8" alt="Agro Agr">
				</div>
				<div class="col-6 p-2">
					<img src="assets/img/whatsapp.jpg" alt="Agro Agr" width="87" height="87" class="img-fluid w-95 mt-2">
				</div>
			</div>
		</div>
		<div class="col-sm-9  order-1 order-sm-2">
			<h2 class="text-primary font-bold">Grupo de WhatsApp de Ofertas</h2>
		  <p class="text-primary"><small>Entre no grupo  de Whatsapp para agilizar o atendimento.<br>
		  </small></p>

			<p><a href="https://chat.whatsapp.com/Htgpvc1oP9U65JM0NlBaH7" target="_blank" class="btn btn-danger btn-sm pr-5 pl-5">Grupo de 
		    Ofertas
		  </a>
		       </p>
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-sm-6">
			<h2 class="mb-0 text-primary text-center"><strong>Ofertas em destaque</strong></h2>
			<div class="divider bg-info"></div>
			<p class="text-center mb-2 text-primary"><i class="fa fa-caret-down fa-3x mt-n3"></i></p>

			<?php 
			foreach($offers_destak as $offer)
			{
				$id = rand();

				include 'modal-oferta.php';

				?>

				<div class="card mb-4 border-0">
					<div class="row">
						<div class="col-4 pr-0 bg-light ">
							<?php
							if($offer->img)
							{
								?>
								<div style="height: 260px; width: 100%; background-image: url(<?= URL_AGRO.'/upload/fotos/'.$offer->img.'_thumb.png' ?>); background-size: cover; background-position: center center;"></div>
								<?php
							}
							else
							{
								?>
								<div class="text-center text-muted" style="height: 240px; padding-top: 100px;">Sem imagem</div>
								<?php
							} ?>
						</div>
						<div class="col-8">
							<div class="card-body pl-0">
								<span class="badge badge-<?= $offer->tipo_oferta[1]  ?>"><?= $offer->tipo_oferta[0]  ?></span>
								<h6 class="mb-1"><strong>Produto:</strong> <?= $offer->site  ?></h6>
								<h6 class="mb-1"><strong>Tipo:</strong> <?= $offer->tipo  ?></h6>
								<h6 class="mb-1"><strong>Quantidade:</strong> <?= $offer->quantidade  ?></h6>
								<h6 class="mb-1"><strong>Cidade:</strong> <?= $offer->cidade  ?></h6>
								<h6 class="mb-1"><strong>Estado:</strong> <?= $offer->estado  ?></h6>

								<a data-toggle="modal" data-target="#modal-offer-<?= $id  ?>" href="#" class="mt-4 btn  pr-4 pl-4 btn-primary">Detalhes da oferta</a>
								<div class="clearfix"></div>
								<a target="_blank" href="https://<?= $offer->site_url ?>.agr.br"><?= $offer->site_url ?>.agr.br</a>
							</div>
						</div>
					</div>
				</div>
				<?php
			} ?>
		</div>
		<div class="col-sm-6">
			<iframe width="100%" height="315" src="https://www.youtube.com/embed/NzBZpXhl-PQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			 <form action="<?= URL_AGRO.'/api/send-offer'  ?>" method="post" class="form-horizontal w-75 mt-5 mr-auto ml-auto" id="form-oferta" enctype="multipart/form-data">
			<fieldset class="mt-3">
				<legend class="text-center mb-0">Envie sua oferta</legend>
				<div class="divider bg-info"></div>
				<p class="text-center mb-2 text-primary"><i class="fa fa-caret-down fa-3x mt-n3"></i></p>
				
				<div class="form-group text-center mt-3 mb-3">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="tipo_oferta1" name="tipo_oferta" class="custom-control-input" value="2" checked>
						<label class="custom-control-label" for="tipo_oferta1">VENDA</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="tipo_oferta2" name="tipo_oferta" class="custom-control-input" value="1">
						<label class="custom-control-label" for="tipo_oferta2">COMPRA</label>
					</div>
				</div>

			 	<div class="form-group">
			 		<label class="mb-0">Produto</label>
			 		<select name="site" class="form-control" required>
			 			<option value="">Selecione...</option>
			 			<?php 
			 			foreach($sites as $site)
			 			{
			 				?>
			 				<option value="<?= $site->url  ?>"><?= $site->title  ?></option>
			 				<?php
			 			} ?>
			 		</select>
			 	</div>
			 	<div class="form-group">
			 		<label class="mb-0">Tipo</label>
			 		<input type="text" name="tipo" class="form-control" required>
			 	</div>
			 	<div class="form-group">
			 		<label class="mb-0">Quantidade</label>
			 		<input type="text" name="quantidade" class="form-control" required>
			 	</div>
			 	<div class="form-group">
			 		<label class="mb-0">Cidade</label>
			 		<input type="text" name="cidade" class="form-control" required>
			 	</div>
			 	<div class="form-group">
			 		<label class="mb-0">Estado</label>
			 		<input type="text" name="estado" class="form-control" required>
			 	</div>
			 	<div class="form-group">
			 		<label class="mb-0">Fotos</label>
			 		<input type="file" name="fotos[]" class="form-control" multiple>
			 	</div>
			 	<div class="form-group">
			 		<label class="mb-0">Vídeos</label>
			 		<input type="file" name="video[]" class="form-control" multiple>
			 	</div>
			 	<div class="form-group">
			 		<label class="mb-0">Descrição</label>
			 		<textarea name="obs" rows="4" class="form-control"></textarea>
			 		<small class="text-center">Após aplicar as informações do produto, aplicar dados de contato</small>
			 	</div>

			 	<div class="form-group text-right">
					<a data-toggle="modal" data-target="#modal-password" class="btn btn-primary" href="#" >Continuar</a>
				</div>
			</fieldset>

				<div class="modal fade" id="modal-password">
					<div class="modal-dialog" style="width: 338px;">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Confirmar envio de oferta</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Telefone para contato:</label>
									<input type="phone" class="form-control" name="phone" required>
								</div>
								<div class="form-group">
									<label>E-mail para contato:</label>
									<input type="email" class="form-control" name="email" required>
								</div>
								<hr>
								<div class="form-group">
									<label>Digite sua senha:</label>
									<input type="password" class="form-control" name="senha" required>
								</div>
								<div class="form-group d-flex justify-content-center">
									<div class="g-recaptcha" data-sitekey="6Ld9Cb4aAAAAAD1VoyaBhaFhxQEgt8NSV16I34-6"></div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								<button data-loading-text="Enviando..." class="btn btn-primary" type="submit">Enviar oferta</button>
							</div>
						</div>
					</div>
				</div>
			 </form>
		</div>
	</div>
	<hr>


	<fieldset id="busca-ofertas">
		<legend>Ofertas</legend>

		<form action="#busca-ofertas" method="POST">
			<div class="row">
				<div class="col-sm-3">
					<label class="mb-0">Produto</label>
					<select name="site" class="form-control form-control-sm">
						<option value="">Selecione...</option>
			 			<?php 
			 			foreach($sites as $site)
			 			{
			 				?>
			 				<option <?= ($_POST['site'] == $site->url) ? 'selected' : null ?> value="<?= $site->url  ?>"><?= $site->title  ?></option>
			 				<?php
			 			} ?>
			 		</select>
				</div>
				<div class="col-sm-2">
					<label class="mb-0">Tipo</label>
					<input type="text" class="form-control form-control-sm" name="tipo" value="<?= $_POST['tipo']  ?>">
				</div>
				<div class="col-sm-2">
					<label class="mb-0">Localidade</label>
					<input type="text" class="form-control form-control-sm" name="local" value="<?= $_POST['local']  ?>">
				</div>
				<div class="col-sm-3">
					<label class="mb-0">Palavra-chave</label>
					<input type="text" class="form-control form-control-sm" name="q" value="<?= $_POST['q']  ?>">
				</div>
				<div class="col-sm-2">
					<label class="mb-0">&nbsp;</label>
					<div class="clearfix"></div>
					<button type="submit" class="btn btn-sm btn-primary pr-4 pl-4">Filtrar</button>
					<a href="index.php#ofertas" class="btn btn-sm btn-secondary">Limpar</a>
				</div>
			</div>
		</form>

		<?php 
		foreach($offers as $offer)
		{
			$id = $offer->id = 'destak'.rand();

			include 'modal-oferta.php';

		} ?>

		<div class="table-responsive mt-4" id="ofertas">
			<table class="table table-sm">
				<thead>
					<tr>
						<th></th>
						<th>Produto/Tipo</th>
						<th>Quantidade</th>
						<th>Localidade</th>
						<th>Site</th>
						<th>Detalhes</th>
						<th>Data</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($offers as $offer)
					{
						?>
						<tr>
							<td><span class="badge badge-<?= $offer->tipo_oferta[1]  ?>"><?= $offer->tipo_oferta[0]  ?></span> </td>
							<td><strong><?= $offer->site ?></strong> <small><?= $offer->tipo ?></small></td>
							<td><?= $offer->quantidade ?></td>
							<td><?= $offer->cidade ?>/<?= $offer->estado ?></td>
							<td><a href="https://<?= $offer->site_url ?>.agr.br"><strong><?= $offer->site_url ?>.agr.br</strong></a></td>
							<td><a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id  ?>" class="btn btn-primary">Detalhes da oferta</a></td>
							<td><?= date('d/m/Y', strtotime($offer->created_at)) ?></td>
						</tr>
						<?php
					} ?>
					
				</tbody>
			</table>
		</div>
	</fieldset>
</div>

<?php include 'footer.php'; ?>
