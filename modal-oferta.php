<style>
	/* Make the image fully responsive */

	.carousel-inner img {
		width: 90%;
		height: 90%;
	}

	.myCarousel .carousel-indicators {
		position: static;
		margin-top: 5px;
	}

	.myCarousel .carousel-indicators>li {
		width: 100px;
	}

	.myCarousel .carousel-indicators li img {
		display: block;
		opacity: 0.5;
	}

	.myCarousel .carousel-indicators li.active img {
		opacity: 1;
	}

	.myCarousel .carousel-indicators li:hover img {
		opacity: 0.75;
	}

	.img-slide {
		/*width: 500px !important;
		height: 300px !important;*/
		object-fit: cover !important;
		max-height: 360px !important;
		/* Esta propriedade faz o corte mantendo proporções */
	}

	.img-slide-thumbl {
		width: 100px !important;
		height: 70px !important;
		object-fit: cover !important;
		/* Esta propriedade faz o corte mantendo proporções */
	}

  .bg-orange {
    background-color: rgb(255, 87, 34);
  }

  .breadcrumb-item.active {
    color: #FFFFFF !important;
  }

	/* Adicionando media query para telas menores que 1000px */

	@media (max-width: 1000px) {
		.img-slide {
			width: 100% !important;
			height: auto !important;
			max-height: 400px !important;
		}

		.img-slide-thumbl {
			width: 40px !important;
			height: 30px !important;
			object-fit: cover !important;
			/* Esta propriedade faz o corte mantendo proporções */
		}
	}

	.btn-rounded {
		border-radius: 10px;
		/* Ajuste o valor conforme necessário para arredondar os cantos */
	}

  .border-0 {
    border-radius: 0px;
  }

  .border-modal-header {
    border-radius: 10px 36px 0 0 !important;
    border-bottom: none;
  }

  .border-modal-content {
    border-radius: 13px 41px 0 0 !important;
  }
  
</style>


<div class="modal fade" tabindex="-1" id="modal-offer-<?= $offer->id  ?>" style>
	<div class="modal-dialog modal-xl" style="">
		<div class="modal-content m-0 p-0 border-modal-content">
			<div class="modal-header m-0 p-2 align-items-center bg-orange border-modal-header" style="<?= $offer->tipo_oferta[0] == "Compra" ? "background:#033 " : "" ?>">
				<!-- Breadcrumb -->

				<div aria-label="breadcrumb">
					<ol class="breadcrumb bg-orange mb-0" style="<?= $offer->tipo_oferta[0] == "Compra" ? "background:#033 " : "" ?>">
						<li class="breadcrumb-item"><a href="#" style="<?= $offer->tipo_oferta[0] == "Compra" ? "color:#ececec80 " : "" ?>"><?= translateText('Página Inicial', 'pt') ?></a></li>
						<li class="breadcrumb-item"><a href="#" style="<?= $offer->tipo_oferta[0] == "Compra" ? "color:#ececec80 " : "" ?>"><?= translateText($offer->tipo_oferta[0], 'pt') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $offer->site ?></li>
					</ol>
				</div>

				<button type="button" class="close mr-0" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="<?= $offer->tipo_oferta[0] == "Compra" ? "color: #FFFFFF " : "" ?>">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<!-- Conteúdo do Produto -->
				<div class="container-fluid mt-2">
					<!-- Card -->
					<div class="">
						<div class="">
							<!-- Row -->
							<div class="row">
								<!-- Coluna com Slider (8 colunas) -->
								<div class="col-md-8">

									<!-- Adicione aqui o seu slider de imagens -->
									<div class="container-fluid">



										<div class="row">
											<!--Ik gebruik hieronder alleen het middiv omdat dat de enige info is die ik wil vervangen-->
											<div class="col-md-12 mb-5" id="middiv" style="background-color: rgba(255, 255, 255, 0.1)">
												<div id="myCarousel-<?= $offer->id ?>" class="myCarousel carousel slide" data-ride="carousel" align="center">
													<!-- Wrapper for slides -->
													<div class="carousel-inner">
														<?php
														if ($offer->fotos) {
															$cont = '0';
															foreach ($offer->fotos as $foto) {

														?>
																<div class="carousel-item <?php if ($cont == '0') {
																								echo 'active';
																							} ?>">
																	<img class="img-slide" src="<?= $url . '/upload/fotos/' . $foto . '.png'  ?>" style="">
																</div>
															<?php
																$cont = $cont + '1';
															}
														}
														if ($offer->videos) {
															foreach ($offer->videos as $video) {
															?>
																<div class="carousel-item">
																	<iframe style="width: 200px; height: 300px;" src="<?= $url . '/upload/videos/' . $video . '.mp4'  ?>"><?= $video . '.mp4'  ?></iframe>
																</div>
														<?php
																$cont = $cont + '1';
															}
														}
														?>
													</div>

													<!-- Left and right controls -->
													<a class="carousel-control-prev" href="#myCarousel-<?= $offer->id ?>" data-slide="prev">
														<span class="carousel-control-prev-icon"></span>
													</a>
													<a class="carousel-control-next" href="#myCarousel-<?= $offer->id ?>" data-slide="next">
														<span class="carousel-control-next-icon"></span>
													</a>

													<!-- Indicators -->
													<ol class="carousel-indicators list-inline">
														<?php
														if ($offer->fotos) {
															$cont = '0';
															foreach ($offer->fotos as $foto) {

														?>
																<li class="list-inline-item <?php if ($cont == '0') {
																								echo 'active';
																							} ?>">
																	<a id="carousel-selector-<?= $cont ?>" class="selected" data-slide-to="<?= $cont ?>" data-target="#myCarousel-<?= $offer->id ?>">
																		<img src="<?= $url . '/upload/fotos/' . $foto . '_thumb.png'  ?>" class="img-slide-thumbl">
																	</a>
																</li>
															<?php
																$cont = $cont + '1';
															}
														}
														if ($offer->videos) {
															foreach ($offer->videos as $video) {
															?>
																<li class="list-inline-item">
																	<a id="carousel-selector-<?= $cont ?>" data-slide-to="<?= $cont ?>" data-target="#myCarousel-<?= $offer->id ?>">
																		<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLPN6XtCmUFg-DypEGjliuL-FgZG03Mbxc_Q&usqp=CAU" class="img-slide-thumbl">
																	</a>
																</li>
														<?php
																$cont = $cont + '1';
															}
														}
														?>
													</ol>
												</div>
											</div>
										</div>
									</div>
									<!-- Botão de Contato -->
									<div class="text-center w-100 align-items-center text-center align-content-center">

										<div class="btn-group rounded align-items-center text-center align-content-center mx-auto my-auto" role="group" aria-label="Group of buttons"> <!-- Botão de Contato -->
											
											
											<a href="<?= $site->link_whatsapp ?>" target="_blank" class="btn btn-success btn-rounded fs-6">
												
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
													<path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
												</svg> <?= translateText('Contato via WhatsApp', 'pt') ?>
											</a>

											<!-- Botão de Acessar o Site -->
											
											<a href="<?= $url_base ?>" class="btn btn-primary btn-rounded fs-6"><?= translateText('Acessar o site', 'pt') ?></a>
											
										</div>
									</div>
								</div>

								<!-- Coluna com Detalhes do Produto (4 colunas) -->
								<div class="col-md-4">
									<div class="row  mt-2">
										<div class="col-9">
											<div class="detalhes-header m-0 p-0">
												<h6 class="detalhes-title h5"><?= translateText('Detalhes da oferta', 'pt') ?></h6>
												<h6 class="mb-n1"><strong><?= translateText('Oferta de', 'pt') ?>  <?= translateText($offer->tipo_oferta[0], 'pt') ?>: </strong> <?= $offer->site ?></h6>
												<small><em><?= translateText('Adicionado em', 'pt') ?>  <?= date('d/m/Y H:i', strtotime($offer->created_at)) ?></em></small>
												<hr>
											</div>
										</div>
										<div class="col-3">
											<img class="" src="https://www.agro.agr.br/assets/img/agro-logo-lg.jpg" alt="Agro Agr" style="width: 80%; max-width: 100px; max-height: 100px;">
										</div>
									</div>
									<!-- Botão de Compartilhamento no Facebook -->
									<!-- Botão de Compartilhamento no Facebook -->
									<!-- Título do Produto -->
									<h4><?= translateText('Descrição:', 'pt') ?></h4>
									<!-- Descrição do Produto -->
									<p style="font-size: 14px;"><?= nl2br($offer->obs) ?></p>
									<div class="row mb-4">
										<div class="col-sm-12">
											<div class="card bg-light border-0">
												<div class="card-body text-center">
													<small><?= translateText('Tipo', 'pt') ?></small>
													<h6 class="mb-0"><?= $offer->tipo ?></h6>
													<small><?= translateText('Quantidade', 'pt') ?></small>
													<h6 class="mb-0"><?= $offer->quantidade ?></h6>
													<small><?= translateText('Localidade', 'pt') ?></small>
													<h6 class="mb-0"><?= $offer->cidade ?>/<?= $offer->estado ?></h6>
												</div>
											</div>
										</div>
									</div>
									<div class="text-center">
										<small class="text-muted text-center "><?= translateText('Ofertas são atendidas via whatsapp botão abaixo ou via formulário no site.', 'pt') ?></small>
									</div>

								</div>

							</div>

						</div>
					</div>

				</div>

			</div>
		</div>
	</div>


</div>