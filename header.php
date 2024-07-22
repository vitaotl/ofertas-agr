<?php
	$site_name = "ofertas";
	$url = 'https://www.agro.agr.br';
	
	$url_api = $url.'/api/site/'.str_replace('ç', 'c', $site_name) . "?" . http_build_query([ "ip" => $_SERVER["REMOTE_ADDR"], "ua" => $_SERVER['HTTP_USER_AGENT'] ]);
	//echo $url_api;

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_URL, $url_api);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($curl); 
	$site = json_decode($response, true);
	$linkWhatsapp = $site['link_whatsapp'];
	$banner = $site['banners'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Ofertas</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
	<link rel="stylesheet" href="<?= $url ?>/assets/css/lib/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="shortcut icon" href="assets/img/ico.png" type="image/x-icon">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="canonical" href="https://www.contrato.agr.br"/>	

	<meta property="og:locale" content="pt_BR"/>
	<meta property="og:locale:alternate" content="pt-br"/>
	<meta property="og:title" content="Ofertas"/>
	<meta property="og:type" content="Website"/>
	<meta property="og:url" content="https://www.contrato.agr.br"/>
	<meta property="og:site_name" content="Ofertas"/>
	<meta property="og:description" content="Ofertas."/>

	<meta name="language" content="pt-br">
	<meta name="doc-class" content="Completed">
	<meta name="doc-rights" content="Public">
	<meta name="Googlebot" content="index,follow">
	<meta name="MSSmartTagsPreventParsing" content="true">
	<meta http-equiv="Content-Language" content="pt-br">
	<meta http-equiv="Content-Language" content="Português">

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="Expires" CONTENT="May 20, 2013, 17:17:17 PM">
	<META NAME="PUBDATE" content="May 20, 2013, 17:17:17 PM">
	<META NAME="Updated" CONTENT="daily">
	<META NAME="revisit=2 days">
	<META NAME="ROBOTS" CONTENT="follow,index">
	<META HTTP-EQUIV="Content-Language" CONTENT="pt-br">
	<META NAME="Description" CONTENT="Ofertas">
	<META NAME="Keywords" CONTENT="Ofertas, APP de Ofertas, Aplicativo de Ofertas, comércio de Ofertas, comprar Ofertas, compras de Ofertas, fornecedor de Ofertas, fornecedores de Ofertas,  produtor de Ofertas, produtores de Ofertas, vendedor de Ofertas, cotação de Ofertas, representante de Ofertas, oferta de Ofertas, ofertas de Ofertas, comparação de preço de Ofertas, distribuidores de Ofertas, distribuidor de Ofertas, Whatsapp de Ofertas, vendas de Ofertas, Ofertas na roça, encontrar  Ofertas, variedade de Ofertas, carga fechada de Ofertas, Ofertas no Brasil, Ofertas direto do produtor, revendedor de Ofertas, Ofertas em São Paulo, Ofertas no Acre - AC, Ofertas em Alagoas - AL, Ofertas no Amapá - AP,Ofertas em Amazonas - AM, Ofertas na Bahia - BA, Ofertas no Ceará - CE, Ofertas no Distrito Federal - DF, Ofertas no Espírito Santo - ES, Ofertas em Goiás - GO, Ofertas no Maranhão - MA, Ofertas em Mato Grosso - MT, Ofertas em Mato Grosso do Sul - MS, Ofertas em Minas Gerais - MG, Ofertas no Pará - PA, Ofertas na Paraíba - PB, Ofertas no Paraná - PR, Ofertas em Pernambuco - PE, Ofertas no Piauí - PI, Ofertas no Rio de Janeiro - RJ, Ofertas no Rio Grande do Norte - RN, Ofertas no Rio Grande do Sul - RS, Ofertas em Rondônia - RO, Ofertas em Roraima - RR, Ofertas em Santa Catarina - SC, Ofertas em São Paulo - SP, Ofertas em Sergipe - SE, Ofertas em Tocantins - TO,  empresas do agronegócio. ">
	<META NAME="Author" CONTENT="https://www.contrato.agr.br/">
	<META HTTP-EQUIV="Reply-to" CONTENT="agro@agro.agr.br">
</head>
<body>
	<div class="main">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<div class="navbar-brand">
					<a href="https://www.agro.agr.br"><img src="https://www.agro.agr.br/assets/img/logo-agro.png" alt="Agro Agr"></a>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-mobile" > 
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.agro.agr.br"> Home</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.agro.agr.br/empresa"> Empresa</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.produtos.agr.br"> Produtos</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.fornecedores.agr.br"> Fornecedores</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://contratos.agr.br"> Contratos</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.agro.agr.br/admin"> Login</a>
					</li>
				</ul>
			
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.facebook.com/agroagrbr"><i class="fab fa-2x fa-facebook-square"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.twitter.com/AgroAgrbr"><i class="fab fa-2x fa-twitter-square"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.youtube.com/AgroAgrbr"><i class="fab fa-2x fa-youtube-square"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.linkedin.com/company/agroagrbr"><i class="fab fa-2x fa-linkedin"></i></a>
					</li>
				</ul>
			</div> 
			</div>
		</nav>