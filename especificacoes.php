<?php include 'header.php'; ?>

<div class="container pt-5 pb-5">
	<div class="text-center">
		<img src="<?= $url ?>/assets/img/agro-logo-lg.jpg" alt="Agro" class="img-search">
	</div>
	<h2 class="text-center mb-5 mt-3">Especificações de <?= $site->title ?></h2>

	<?php 
	
	
	foreach($site->especificacoes as $especificacao)
	{
		?>
		<p><strong><?= $especificacao['title'] ?></strong></p>

		<p class="pl-3"><?= join('<br> ', $especificacao['options']) ?></p>
		<?php
	} ?>
</div>

<?php include 'footer.php'; ?>