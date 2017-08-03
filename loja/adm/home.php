<?php

//istancio a classe ismarty
$smarty = new Template();


//chamo o template
$smarty->display('adm_home.tpl');
//incluo a pagina de produtos
//include_once Rotas::get_Pasta_Controller().'/produtos.php';//chama a pasta produtos dentro da home