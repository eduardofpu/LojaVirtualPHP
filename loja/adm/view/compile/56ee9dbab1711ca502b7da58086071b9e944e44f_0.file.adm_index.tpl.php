<?php
/* Smarty version 3.1.31, created on 2017-07-31 16:04:18
  from "C:\xampp\htdocs\loja\adm\view\adm_index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597f7f32c98036_90792557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56ee9dbab1711ca502b7da58086071b9e944e44f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_index.tpl',
      1 => 1501527856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597f7f32c98036_90792557 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>

<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['SITE_NOME']->value;?>
</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/jquery-2.2.1.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
        <!-- meu aquivo pessoal de CSS-->
        <link href="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/tema/css/tema.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
        <![endif]-->

    </head>
    <body>

        <!-- começa  o container geral -->
        <div class="container-fluid">

            <!-- começa a div topo -->
            <div class="row" id="topo">


                <div class="container">

                    <div class="col-md-6">                
                     <!--<img src="<?php echo $_smarty_tpl->tpl_vars['GET_TEMA']->value;?>
/images/adm_logo.jpg" alt=""  width="15%"  > -->
                        <label>

                            <h3 class="alert alert-dismissable ">Painel adiministrativo</h3>


                        </label> 


                    </div> 

                    <div class="col-md-6 text-right">                    

                        <?php if ($_smarty_tpl->tpl_vars['LOGADO']->value == true) {?>
                            <h4>
                            Olá: <?php echo $_smarty_tpl->tpl_vars['USER']->value;?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_LOGOFF']->value;?>
" class="btn btn-danger"><i class="glyphicon glyphicon-log-out"></i> Sair </a> 
                                        
                             <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_SENHA']->value;?>
" class="btn btn-warning"><i class="glyphicon glyphicon-asterisk"></i> Alterar senha </a> 
                            <br> <br>                            
                            </h4>
                            <p>
                            Último login: <?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
 às <?php echo $_smarty_tpl->tpl_vars['HORA']->value;?>

                            </p>
                        <?php }?>
                    </div>  


                </div>    

            </div><!-- fim da div topo -->

            <!-- começa a barra MENU-->
            <div class="row" id="barra-menu">

                <!--começa navBAR-->
                <nav class="navbar navbar-inverse">

                    <!-- container navBAr-->
                    <div class="container">
                        <!-- header da navbar-->
                        <div class="navbar-header">
                            <!-- botao que mostra e esconde a navbar--> 
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div><!--fim header navbar-->  

                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav">


                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['GET_SITE_ADM']->value;?>
"><i class="glyphicon glyphicon-home"></i> Home </a> </li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_CATEGORIAS']->value;?>
"><i class="glyphicon glyphicon-tag"></i> Categorias</a> </li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_ADM_PRODUTOS']->value;?>
"><i class="glyphicon glyphicon-tag"></i> Produtos </a> </li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_ADM_CLIENTE']->value;?>
"><i class="glyphicon glyphicon-user"></i> Clientes </a> </li>                    
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['PAG_ADM_PEDIDOS']->value;?>
"><i class="glyphicon glyphicon-shopping-cart"></i> Pedidos </a> </li>
                               



                            </ul>


                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Digite para buscar" required>
                                </div>
                                <button type="submit" class="btn btn-geral">Buscar</button>
                            </form>

                        </div><!-- fim navbar collapse-->   


                    </div> <!--fim container navBar-->

                </nav><!-- fim da navBar-->   





            </div> <!-- fim barra menu--> 

            <!-- começa DIV conteudo-->
            <div class="row" id="conteudo">

                <div class="container"> 

                    <!-- coluna da esquerda -->
                    <div class="col-md-2" id="lateral">

                        <div class="list-group">
                            <span class="list-group-item active"> Categorias</span>


                            <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_ADM_PRODUTOS']->value;?>
" class="list-group-item">
                                <span class="glyphicon glyphicon-menu-right"></span>Todos</a> 
                            <!---->
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CATEGORIAS']->value, 'C');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['C']->value) {
?>

                                <a href="<?php echo $_smarty_tpl->tpl_vars['C']->value['cate_link_adm'];?>
" class="list-group-item">
                                    <span class="glyphicon glyphicon-menu-right"></span> <?php echo $_smarty_tpl->tpl_vars['C']->value['cate_nome'];?>
</a> 


                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                           

                        </div><!--fim da list group-->              

                    </div> <!-- finm coluna esquerda -->  

                    <!-- coluna direita CONYEUDO CENTRAL -->
                    <div class="col-md-10">


                        <ul class="breadcrumb">
                            <li><a href="#"><i class="glyphicon glyphicon-home"></i> Home </a></li>
                            <li><a href="#"> Produtos </a></li>
                            <li><a href="#"> Info </a></li>
                            <li>Hoje é <?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
</li>
                        </ul>   
                        <!-- fim do menu breadcrumb   var_dump(Rotas::$pag);  -->             
                        <?php 
                       Rotas::get_Pagina();
                      
                        ?>


                    </div>  <!--fim coluna direita-->  

                </div>   






            </div><!-- fim DIV conteudo-->

            <!-- começa div rodape -->
            <div class="row" id="rodape">

                <center><?php echo $_smarty_tpl->tpl_vars['SITE_NOME']->value;?>
</center>


            </div><!-- fim div rodape-->



        </div> <!-- fim do container geral -->




    </body>
</html>
<?php }
}
