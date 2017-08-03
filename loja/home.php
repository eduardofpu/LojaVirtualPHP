<?php

//istancio a classe ismarty
$smarty = new Template();
//passo variaveis para o template
$smarty->assign('BANNER', Rotas::Image_Link('banner.jpg', 750, 230));
//chamo o template
$smarty->display('home.tpl');
//incluo a pagina de produtos
include_once Rotas::get_Pasta_Controller().'/produtos.php';//chama a pasta produtos dentro da home