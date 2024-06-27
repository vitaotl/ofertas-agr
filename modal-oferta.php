<style>
	.border-modal-content {
    border-radius: 13px 41px 0 0 !important;
	}
	.border-modal-header {
		border-radius: 10px 36px 0 0 !important;
    border-bottom: none;
	}
	.modal-title {
		color: #FFFFFF;
	}
	.bg-orange {
    background-color: rgb(255, 87, 34);
	}
</style>

<div class="modal fade" tabindex="-1" id="modal-offer-<?= $id  ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content border-modal-content">
			<div class="modal-header bg-orange border-modal-header">
				<h5 class="modal-title">Detalhes da oferta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h2 class="mb-n1"><strong>Oferta de <?= $offer->tipo_oferta[0] ?>: </strong> <?= $offer->site ?></h2>
				<small><em>Adicionado em <?= date('d/m/Y H:i', strtotime($offer->created_at)) ?></em></small>
				<hr>
				<div class="row mb-4">
					<div class="col-sm-4">
						<div class="card bg-light border-0">
							<div class="card-body text-center">
								<small>Tipo</small>
								<h4 class="mb-0"><?= $offer->tipo ?></h4>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card bg-light border-0">
							<div class="card-body text-center">
								<small>Quantidade</small>
								<h4 class="mb-0"><?= $offer->quantidade ?></h4>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card bg-light border-0">
							<div class="card-body text-center">
								<small>Localidade</small>
								<h4 class="mb-0"><?= $offer->cidade ?>/<?= $offer->estado ?></h4>
							</div>
						</div>
					</div>
				</div>

				<fieldset class="mb-4">
					<legend>Fotos (<?= count($offer->fotos)  ?>)</legend>

					<?php
					if ($offer->fotos) {
						echo '<div class="bg-light p-2">';

						foreach ($offer->fotos as $foto) {
					?>
							<a target="_blank" href="<?= URL_AGRO . '/upload/fotos/' . $foto . '_thumb.png'  ?>"><img style="height: 250px;" src="<?= URL_AGRO . '/upload/fotos/' . $foto . '_thumb.png'  ?>"></a>
					<?php
						}
						echo '<div class="clearfix"></div></div>';
					} else {
						echo '<div class="bg-light p-5 text-center">Nenhuma imagem</div>';
					}
					?>

				</fieldset>

				<fieldset class="mb-4">
					<legend>Vídeos (<?= count($offer->videos)  ?>)</legend>

					<?php
					if ($offer->videos) {
						echo '<div class="bg-light p-2">';


						foreach ($offer->videos as $video) {
					?>
							<video controls autoplay='false' style="width: 100%; height: auto; max-width: 500px; max-height: 500px;">
								<source src="<?= URL_AGRO . '/upload/videos/' . $video . '.mp4' ?>" type="video/mp4">
							</video>

					<?php
						}

						echo '<div class="clearfix"></div></div>';
					} else {
						echo '<div class="bg-light p-5 text-center">Nenhum vídeo</div>';
					}
					?>

				</fieldset>

				<fieldset class="mb-4">
					<legend>Descrição:</legend>
					<div class="bg-light p-2">



						<p class="mt-3"><?= nl2br($offer->obs) ?></p>
					</div>

				</fieldset>

				<p class="text-muted text-center">Ofertas são atendidas via whatsapp botão abaixo ou via formulário no site.</p>

			</div>
			<div class="modal-footer">
				<a href="<?= $offer->link_whatsapp ?>" target="_blank" class="btn btn-danger">Contato via WhatsApp</a>

				<a href="https://<?= $offer->site_url ?>.agr.br" class="btn btn-primary">Acessar o site</a>
			</div>
		</div>
	</div>
</div>