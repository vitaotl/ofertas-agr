<?php function translateText($text, $lang = 'en')
{
    // Implemente a lógica de tradução para diferentes idiomas aqui
    // Adicione mais traduções conforme necessário
    $translations = array(
        'Página Inicial' => array(
            'en' => 'Home',
            'pt' => 'Página Inicial'
        ),
        'Oferta de' => array(
            'en' => 'Offer of',
            'pt' => 'Oferta de'
        ),
        'Adicionado em' => array(
            'en' => 'Added on',
            'pt' => 'Adicionado em'
        ),
        'Descrição:' => array(
            'en' => 'Description:',
            'pt' => 'Descrição:'
        ),
        'Tipo' => array(
            'en' => 'Type',
            'pt' => 'Tipo'
        ),
        'Quantidade' => array(
            'en' => 'Quantity',
            'pt' => 'Quantidade'
        ),
        'Localidade' => array(
            'en' => 'Location',
            'pt' => 'Localidade'
        ),
        'Ofertas são atendidas via whatsapp botão abaixo ou via formulário no site.' => array(
            'en' => 'Offers are handled via WhatsApp button below <br> or through the website form.',
            'pt' => 'Ofertas são atendidas via botão de WhatsApp abaixo <br>  ou através do formulário no site.'
        ),
        'Acessar o site' => array(
            'en' => 'Access the website',
            'pt' => 'Acessar o site'
        ),
        'Abaixo estão algumas Ofertas de' => array(
            'en' => 'Below are some',
            'pt' => 'Abaixo estão algumas Ofertas de'
        ),
        'Quer comprar ou vender' => array(
            'en' => 'Do you want to buy or sell',
            'pt' => 'Quer comprar ou vender'
        ),
        'Podemos publicar sua oferta.' => array(
            'en' => 'We can publish your offer.',
            'pt' => 'Podemos publicar sua oferta.'
        ),
        'Tipo' => array(
            'en' => 'Type',
            'pt' => 'Tipo'
        ),
        'Quantidade' => array(
            'en' => 'Quantity',
            'pt' => 'Quantidade'
        ),
        'Data' => array(
            'en' => 'Date',
            'pt' => 'Data'
        ),
        'Detalhes da oferta' => array(
            'en' => 'Offer details',
            'pt' => 'Detalhes da oferta'
        ),
        'Venda' => array(
            'en' => 'Sell',
            'pt' => 'Venda'

        ),
        'Compra' => array(
            'en' => 'Buy',
            'pt' => 'Compra'
        ),
        'Contato via WhatsApp' => array(
            'en' => 'Contact via WhatsApp',
            'pt' => 'Contato via WhatsApp'
        ),


        // Adicione mais traduções conforme necessário
    );

    // Verifica se a tradução existe para o idioma desejado
    if (isset($translations[$text][$lang])) {
        return $translations[$text][$lang];
    }

    // Se não houver tradução disponível, retorna o texto original
    return $text;
}
