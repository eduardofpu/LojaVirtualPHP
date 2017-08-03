<?php


    
    $smarty = new Template();
    Login::MenuClientes();
    //var_dump($pedidos);
    $smarty->display('minhaconta.tpl');

 