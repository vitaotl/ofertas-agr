<?php include 'header.php';
include 'translater.php';

//define('URL_AGRO', 'http://localhost/agro');
define('URL_AGRO', 'https://agro.agr.br');

$sites = json_decode(file_get_contents(URL_AGRO . '/api/get-sites'));

$offers_destak = json_decode(file_get_contents(URL_AGRO . '/api/get-offers/200/1'));

$offers = json_decode(file_get_contents(URL_AGRO . '/api/get-offers?' . http_build_query($_POST)));

$show_offers = $offers;
$buy_offers = [];
$sell_offers = [];

foreach ($offers as $offer) {
	if ($offer->tipo_oferta[0] === 'Compra') {
		$buy_offers[] = $offer;
	} elseif ($offer->tipo_oferta[0] === 'Venda') {
		$sell_offers[] = $offer;
	}
}

?>
<style>
	.badge {
		border-radius: 5px;
	}

	.button-wpp {
		background: #FF5722;
		width: max-content;
		border-radius: 5px;
	}

	.button-wpp a {
		color: #FFFFFF;
		font-size: 1rem;
	}

	.button-wpp a span {
		color: #033;
		font-weight: bold
	}

	.button-wpp a:hover {
		color: #FFFFFF;
		text-decoration: none;
	}

	.badge-warning {
		background-color: #FF5722 !important;
		color: #FFFFFF;
		border-radius: 4px;
	}

	.card-ofertas-destaque {
		width: 23%;
		padding: 10px;

		border: 1px solid #eee;
		border-radius: 5px;
	}

	.offer-image {
		height: 170px;
		width: 100%;
		max-width: 290px;
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat
	}

	.card-body {
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		justify-content: center;
	}

	.card-body h6 {
		font-size: 14px;
	}

	.card-body .btn {
		max-width: 320px;
		margin: 0 auto;

		color: #FFFFFF;
		background-color: #FF5722;
		border: none;
		border-radius: 5px;
	}

	.btn-compra {
		background-color: #033 !important;
	}

	.card-body a {
		width: 100%;
		margin-bottom: 10px;
		text-align: center;
	}

	.modal-header-custom {
		background: rgb(255, 87, 34);
		border-radius: 10px 25px 0 0;
		border-bottom: none;
	}

	.modal-content-custom {
		border-radius: 13px 30px 0 0;
	}

	.modal-title-custom {
		color: #FFFFFF;
		font-size: 1rem;
	}

	.ofertas-container {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		gap: 10px;
	}

	.ofertas {
		border: 1px solid #eee;
		border-radius: 5px 30px 0 0;
		border-top: none;

		width: 23%;
	}

	.ofertas:hover {
		box-shadow: 5px 5px 6px #eee;
	}

	.ofertas-header {
		padding: 5px 10px;
		background-color: #ff57222b;
		border-radius: inherit;
	}


	.radio-container {
		display: inline-block;
		position: relative;
		padding-left: 25px;
		cursor: pointer;
		font-size: 1rem;
		user-select: none;
	}

	.radio-container input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
	}

	.checkmark {
		position: absolute;
		top: 0;
		left: 0;
		height: 20px;
		width: 20px;
		background-color: #eee;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.radio-container input:checked~.checkmark {
		background-color: #FF5722;
	}

	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}

	.radio-container input:checked~.checkmark:after {
		display: block;
	}

	.radio-container .checkmark:after {
		width: 8px;
		height: 8px;
		border-radius: 50%;
		background: white;
	}

	.prev-page,
	.next-page,
	.prev-page2,
	.next-page2 {
		border-radius: 5px;
	}

	.prev-page,
	.prev-page2 {
		background-color: #FF5722 !important;
		border: none;
	}

	@media screen and (max-width: 1200px) {
		.card {
			width: 30%;
		}

		.card-body h6 {
			font-size: 16px;
		}
	}

	@media screen and (max-width: 1024px) {

		.card,
		.ofertas {
			width: 45%;
		}
	}

	@media screen and (max-width: 768px) {
		.ofertas-container {
			justify-content: center;
		}

		.card,
		.ofertas {
			width: 100%;
		}
	}

	@media screen and (max-width: 575px) {
		.ofertas {
			max-width: 320px;
		}
	}
</style>

<script src="//code-sa1.jivosite.com/widget/58qBmSBq4c" async></script>

<div class="container pt-5 pb-5">
	<div class="row ">
		<div class="col-sm-5">
			<h1 class="text-primary font-bold">Ofertas</h1>
			<p class="text-primary">Nesta página você pode verificar todas as ofertas da plataforma Agro e articular ótimos negócios.</p>
			<p class="text-primary">Se você for produtor também terá a chance de ofertar seus produtos e ampliar suas vendas.</p>
			<p class="button-wpp">
				<a href="<?= $linkWhatsapp ?>" target="_blank" class="btn btn-sm">
					Entre no grupo de Ofertas
				</a>
			</p>
		</div>
		<div class="col-12 col-md-3 text-center d-flex flex-column align-items-center my-4 my-sm-0">
			<img class="" src="assets/img/agro-logo-lg.jpg" alt="Agro Agr" style="width: 100px; height: auto">
			<div class="d-flex align-items-center mt-2">
				<img width="70" height="70" src="https://www.agro.agr.br/assets/img/qrcode.jpg" alt="Agro Agr">
				<img src="assets/img/whatsapp.jpg" alt="Agro Agr" width="70" height="70">
				<!-- <img src="assets/img/whatsapp.jpg" alt="Agro Agr" width="80" height="80" class="img-fluid w-95 mt-2"> -->
			</div>
		</div>
		<div class="col-12 col-md-4 text-center">
			<img class="img-fluid mb-5" src="<?= $url ?>/upload/banners/<?= $banner; ?>_thumb.png" alt="Apoio">
		</div>
	</div>

	<div class="row ">
		<div class="col-sm-3 order-2 order-sm-1">
			<div class="row">
				<div class="col-6 p-1 d-none">
					<img class="img-fluid w-100" src="https://chart.googleapis.com/chart?chs=170x170&cht=qr&chl=https://www.agro.agr.br/api/link-group/e4578b970adec93874c991ec00813e3e9c821dc72fca9afbeaf7a8039607e83ff87f0699a69146af0f0ec852c40acf4d86e1ef81df911bf2a64cd58c9163a8a1_5e0aMspmA0UA9K60PuSqGQKI65mJKFyps9Bn.pc7XQ-&choe=UTF-8" alt="Agro Agr">
				</div>
				<div class="col-6 p-2 d-none">
					<img src="assets/img/whatsapp.jpg" alt="Agro Agr" width="87" height="87" class="img-fluid w-95 mt-2">
				</div>
			</div>
		</div>
		<div class="col-sm-9  order-1 order-sm-2 d-none">
			<h2 class="text-primary font-bold">Grupo de WhatsApp de Ofertas</h2>
			<p class="text-primary"><small>Entre no grupo de Whatsapp para agilizar o atendimento.<br>
				</small></p>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-12 d-flex flex-column flex-lg-row align-items-center">
			<form class="col-lg-6" action="<?= URL_AGRO . '/api/send-offer'  ?>" method="post" class="form-horizontal w-75 mt-5 mr-auto ml-auto" id="form-oferta" enctype="multipart/form-data">
				<fieldset>
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
					<div class="d-flex flex-column flex-sm-row justify-content-between" style="gap: 10px">
						<div class="form-group w-100 w-sm-50">
							<select name="site" class="form-control" required>
								<option value="">Selecione Produto</option>
								<?php
								foreach ($sites as $site) {
								?>
									<option value="<?= $site->url  ?>"><?= $site->title  ?></option>
								<?php
								} ?>
							</select>
						</div>
						<div class="form-group w-100 w-sm-50">
							<input type="text" placeholder="Tipo" name="tipo" class="form-control" required>
						</div>
					</div>

					<div class="d-flex flex-column flex-sm-row justify-content-between" style="gap: 10px">
						<div class="form-group">
							<input type="text" placeholder="Quantidade" name="quantidade" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" placeholder="Cidade" name="cidade" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="text" placeholder="Estado" name="estado" class="form-control" required>
						</div>
					</div>
					<div class="d-flex flex-column flex-sm-row justify-content-between" style="gap: 10px">
						<div class="form-group">
							<label class="m-0" for="fotos">Selecione as fotos:</label>
							<input type="file" name="fotos[]" id="fotos" class="form-control" multiple>
						</div>
						<div class="form-group">
							<label class="m-0" for="video">Selecione os vídeos:</label>
							<input type="file" name="video[]" id="video" class="form-control" multiple>
						</div>
					</div>
					<div class="form-group">
						<textarea name="obs" placeholder="Produtos com os quais trabalha (separados por vírgula, no maximo 20)." rows="4" class="form-control"></textarea>
						<small class="text-center">Após aplicar as informações do produto, aplicar dados de contato</small>
					</div>

					<div class="form-group text-right">
						<a data-toggle="modal" data-target="#modal-password" class="btn btn-primary" href="#" style="background-color: rgb(50, 205, 50); border: none; border-radius: 4px">Continuar</a>
					</div>
				</fieldset>
				<div class="modal fade" id="modal-password">
					<div class="modal-dialog" style="width: 338px;">
						<div class="modal-content modal-content-custom">
							<div class="modal-header modal-header-custom">
								<h5 class="modal-title modal-title-custom">Confirmar envio de oferta</h5>
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
			<iframe class="col-lg-6" width="100%" height="315" src="https://www.youtube.com/embed/NzBZpXhl-PQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>

		<?php
		foreach ($offers_destak as $offer) {
			$id = $offer->id;
			include 'modal-oferta.php';
		?><?php } ?>

		<div class="col-12">
			<h2 id="ofertas-em-destaque" class="py-1 mb-0 text-center" style="background-color: #FF5722; border-radius: 10px 30px 0 0; color: #FFFFFF "><strong>Ofertas em destaque</strong></h2>
			<div id="offersContainer" class="d-flex flex-wrap justify-content-start mt-2" style="gap: 20px">
				<!-- Itens de oferta serão inseridos aqui via JavaScript -->
			</div>

			<div class="pagination-container mt-4 py-2 d-flex align-items-center justify-content-center" style="gap: 10px;">
				<button class="prev-page2 btn btn-primary">Anterior</button>
				<span class="page-info2"></span>
				<button class="next-page2 btn btn-primary">Próximo</button>
			</div>
		</div>

	</div>
	<hr>


	<fieldset id="busca-ofertas">
		<h2 class="text-center mb-2" style="background-color: #FF5722; border-radius: 10px 30px 0 0; color: #FFFFFF ">Procura de Ofertas</h2>
		<div class="d-flex mt-4" style="gap: 20px">
			<label class="radio-container">
				Todas
				<input type="radio" name="filter" value="all" checked>
				<span class="checkmark"></span>
			</label>
			<label class="radio-container">
				Venda
				<input type="radio" name="filter" value="Venda">
				<span class="checkmark"></span>
			</label>
			<label class="radio-container">
				Compra
				<input type="radio" name="filter" value="Compra">
				<span class="checkmark"></span>
			</label>
		</div>

		<form action="#busca-ofertas" class="my-2" method="POST">
			<div class="row">
				<div class="col-sm-3">
					<label class="mb-0">Produto</label>
					<select name="site" class="form-control form-control-sm">
						<option value="">Selecione...</option>
						<?php
						foreach ($sites as $site) {
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
		foreach ($show_offers as $offer) {
			$id = $offer->id;

			include 'modal-oferta.php';
		} ?>

		<div class="table-responsive mt-4" id="ofertas">
			<div class="ofertas-container">
				<?php foreach ($show_offers as $offer) : ?>
					<div class="item ofertas <?= $offer->tipo_oferta[0] ?>">
						<div class="ofertas-header" style="<?= $offer->tipo_oferta[0] === 'Compra' ? 'background:#3addb487;' : '' ?>">
							<span class="badge badge-<?= $offer->tipo_oferta[1] ?>"><?= $offer->tipo_oferta[0] ?></span>
						</div>
						<div class="card-body" style="padding: 10px;">
							<h5 class="card-title"><?= $offer->site ?></h5>
							<h6 class="card-subtitle mb-2 text-muted"><?= $offer->tipo ?></h6>
							<p class="card-text">
								<strong>Quantidade:</strong> <?= $offer->quantidade ?><br>
								<strong>Localidade:</strong> <?= $offer->cidade ?>/<?= $offer->estado ?><br>
								<strong>Site:</strong> <a href="<?= $offer->site_url ?>" target="_blank"><?= str_replace("https://www.", "", $offer->site_url) ?></a><br>
								<strong>Data:</strong> <?= date('d/m/Y', strtotime($offer->created_at)) ?>
							</p>
							<a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id ?>" class="btn btn-primary" style="<?= $offer->tipo_oferta[0] === 'Compra' ? 'background-color: #033 !important;' : '' ?>">Detalhes da oferta</a>
							<a href="<?= $offer->site_url ?>" target="_blank"><?= str_replace("https://www.", "", $offer->site_url) ?></a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="pagination-container mt-4 py-2 d-flex align-items-center justify-content-center" style="gap: 10px;">
				<button class="prev-page btn btn-primary">Anterior</button>
				<span class="page-info"></span>
				<button class="next-page btn btn-primary">Próximo</button>
			</div>
		</div>
	</fieldset>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const offers = <?php echo json_encode($offers_destak); ?>;
		const itemsPerPage2 = 12;
		let currentPage2 = 1;
		const offersContainer = document.getElementById('offersContainer');
		const pageInfoContainer = document.querySelector('.page-info2');
		const prevPageButton = document.querySelector('.prev-page2');
		const nextPageButton = document.querySelector('.next-page2');
		const ofertasEmDestaque = document.getElementById('ofertas-em-destaque');

		function displayOffers2(page) {
			offersContainer.innerHTML = '';
			const start = (page - 1) * itemsPerPage2;
			const end = start + itemsPerPage2;
			const paginatedOffers = offers.slice(start, end);

			paginatedOffers.forEach(offer => {
				const offerElement = createOfferElement(offer);
				offersContainer.appendChild(offerElement);
			});

			updatePageInfo2(page);
			updateButtonsState(page);
			ofertasEmDestaque.scrollIntoView({
				behavior: 'smooth'
			});
		}

		function createOfferElement(offer) {
			const div = document.createElement('div');
			div.className = 'card card-ofertas-destaque mb-4';
			div.innerHTML = `
        <div class="d-flex align-items-center flex-column" style="gap: 10px">
          <div class="w-100 d-flex justify-content-center">
            ${offer.img ? `<div title="${offer.site}" data-toggle="modal" data-target="#modal-offer-${offer.id}" class="offer-image" style="cursor:pointer; background-image: url(https://agro.agr.br/upload/fotos/${offer.img}_thumb.png)"></div>` : '<div class="text-center text-muted offer-image">Sem imagem</div>'}
          </div>
          <hr class="w-100 my-1">
          <div class="w-100">
            <div class="card-body p-0">
              <span class="badge badge-${offer.tipo_oferta[1]}">${offer.tipo_oferta[0]}</span>
              <h6 class="mb-1"><strong>Produto:</strong> ${offer.site}</h6>
              <h6 class="mb-1"><strong>Tipo:</strong> ${offer.tipo}</h6>
              <h6 class="mb-1"><strong>Quantidade:</strong> ${offer.quantidade}</h6>
              <h6 class="mb-1"><strong>Cidade:</strong> ${offer.cidade}</h6>
              <h6 class="mb-1"><strong>Estado:</strong> ${offer.estado}</h6>
              <a data-toggle="modal" data-target="#modal-offer-${offer.id}" href="#" class="mt-2 btn">Detalhes da oferta</a>
              <div class="clearfix"></div>
              <a target="_blank" href="${offer.site_url}">${offer.site_url.replace('https://www.', '')}</a>
            </div>
          </div>
        </div>
      `;
			return div;
		}

		function updatePageInfo2(page) {
			const pageCount = Math.ceil(offers.length / itemsPerPage2);
			pageInfoContainer.innerText = `Página ${page} de ${pageCount}`;
		}

		function updateButtonsState(page) {
			const pageCount = Math.ceil(offers.length / itemsPerPage2);
			prevPageButton.disabled = page <= 1;
			nextPageButton.disabled = page >= pageCount;
		}

		prevPageButton.addEventListener('click', function() {
			if (currentPage2 > 1) {
				currentPage2--;
				displayOffers2(currentPage2);
			}
		});

		nextPageButton.addEventListener('click', function() {
			const pageCount = Math.ceil(offers.length / itemsPerPage2);
			if (currentPage2 < pageCount) {
				currentPage2++;
				displayOffers2(currentPage2);
			}
		});

		displayOffers2(currentPage2);


		var currentPage = 1;
		var itemsPerPage = 12;
		var allOffers = <?= json_encode($offers) ?>;
		var buyOffers = <?= json_encode($buy_offers) ?>;
		var sellOffers = <?= json_encode($sell_offers) ?>;

		function displayOffers(offers, page) {
			var container = document.querySelector('.ofertas-container');
			container.innerHTML = ''; // Limpa as ofertas atuais

			var start = (page - 1) * itemsPerPage;
			var end = start + itemsPerPage;
			var paginatedOffers = offers.slice(start, end);

			paginatedOffers.forEach(function(offer) {
				var offerDiv = document.createElement('div');
				offerDiv.classList.add('item', 'ofertas', offer.tipo_oferta[0]);

				var headerDiv = document.createElement('div');
				headerDiv.classList.add('ofertas-header');
				if (offer.tipo_oferta[0] === 'Compra') {
					headerDiv.style.background = '#3addb487';
				}
				headerDiv.innerHTML = '<span class="badge badge-' + offer.tipo_oferta[1] + '">' + offer.tipo_oferta[0] + '</span>';

				var cardBodyDiv = document.createElement('div');
				cardBodyDiv.classList.add('card-body');
				cardBodyDiv.style.padding = '10px';

				var title = document.createElement('h5');
				title.classList.add('card-title');
				title.textContent = offer.site;

				var subtitle = document.createElement('h6');
				subtitle.classList.add('card-subtitle', 'mb-2', 'text-muted');
				subtitle.textContent = offer.tipo;

				var text = document.createElement('p');
				text.classList.add('card-text');
				text.innerHTML = '<strong>Quantidade:</strong> ' + offer.quantidade + '<br>' +
					'<strong>Localidade:</strong> ' + offer.cidade + '/' + offer.estado + '<br>' +
					'<strong>Site:</strong> <a href="' + offer.site_url + '" target="_blank">' + offer.site_url.replace("https://www.", "") + '</a><br>' +
					'<strong>Data:</strong> ' + new Date(offer.created_at).toLocaleDateString('pt-BR');

				var detailsLink = document.createElement('a');
				detailsLink.href = '#';
				detailsLink.dataset.toggle = 'modal';
				detailsLink.dataset.target = '#modal-offer-' + offer.id;
				detailsLink.classList.add('btn', 'btn-primary');
				if (offer.tipo_oferta[0] === 'Compra') {
					detailsLink.classList.add('btn-compra');
				}
				detailsLink.textContent = 'Detalhes da oferta';

				var urlLink = document.createElement('a');
				urlLink.href = offer.site_url;
				urlLink.target = "_blank";
				urlLink.textContent = offer.site_url.replace("https://www.", "");

				cardBodyDiv.appendChild(title);
				cardBodyDiv.appendChild(subtitle);
				cardBodyDiv.appendChild(text);
				cardBodyDiv.appendChild(detailsLink);
				cardBodyDiv.appendChild(urlLink);

				offerDiv.appendChild(headerDiv);
				offerDiv.appendChild(cardBodyDiv);

				container.appendChild(offerDiv);
			});

			updatePageInfo(offers.length, page);
		}

		function updatePageInfo(totalItems, page) {
			var pageInfo = document.querySelector('.page-info');
			var totalPages = Math.ceil(totalItems / itemsPerPage);
			pageInfo.textContent = 'Página ' + page + ' de ' + totalPages;

			document.querySelector('.prev-page').disabled = (page === 1);
			document.querySelector('.next-page').disabled = (page === totalPages);
		}

		function changePage(increment) {
			currentPage += increment;
			var filterValue = document.querySelector('input[name="filter"]:checked').value;
			var offers = filterValue === 'Venda' ? sellOffers : filterValue === 'Compra' ? buyOffers : allOffers;
			displayOffers(offers, currentPage);
		}

		document.querySelector('.prev-page').addEventListener('click', function() {
			if (currentPage > 1) {
				changePage(-1);
			}
		});

		document.querySelector('.next-page').addEventListener('click', function() {
			var filterValue = document.querySelector('input[name="filter"]:checked').value;
			var offers = filterValue === 'Venda' ? sellOffers : filterValue === 'Compra' ? buyOffers : allOffers;
			var totalPages = Math.ceil(offers.length / itemsPerPage);
			if (currentPage < totalPages) {
				changePage(1);
			}
		});

		document.querySelectorAll('input[name="filter"]').forEach(function(radio) {
			radio.addEventListener('change', function() {
				currentPage = 1;
				var filterValue = this.value;
				var offers = filterValue === 'Venda' ? sellOffers : filterValue === 'Compra' ? buyOffers : allOffers;
				displayOffers(offers, currentPage);
			});
		});

		// Inicializa com todas as ofertas
		displayOffers(allOffers, currentPage);
	});
</script>

</script>

<?php include 'footer.php'; ?>