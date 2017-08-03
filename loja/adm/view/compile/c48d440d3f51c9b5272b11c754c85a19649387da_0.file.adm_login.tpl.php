<?php
/* Smarty version 3.1.31, created on 2017-07-31 15:57:13
  from "C:\xampp\htdocs\loja\adm\view\adm_login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597f7d89887aa0_63536406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c48d440d3f51c9b5272b11c754c85a19649387da' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\adm\\view\\adm_login.tpl',
      1 => 1501527431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597f7d89887aa0_63536406 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Area restrita</title>
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
    <body style="background-color: #245269">
        
        
        <section class="container" >
                 
                 
            <section class="row">
                
               <div class="col-md-4"></div>
                
                <div class="col-md-4 thumbnail" id="bloco_login_adm">
                    
                    <h4 class="text-center">Área restrita</h4>
                                       
                    <form name="login" method="post" action="">
                        
                        <label>Email</label>
                        <input type="email" name="txt_email" class="form-control" required>
                       
                        <label>Senha</label>
                        <input type="password" name="txt_senha" class="form-control" required>
                        <br><br>
                        <button class="btn btn-success btn-block btn-lg" name="txt_logar" value="txt_logar">Entrar</button>
                    
                    
                    </form>
                    
                    <!--botao senha recovery-->
                    <br>
                    <center> <a href="#" class="btn" data-toggle="collapse" data-target="#recovery">Esqueci a senha?</a></center>
                     
                     
                     
                     <div class="alert alert-danger collapse" id="recovery">
                         
                          <form name="recovery" method="post" action="">
                         
                              <input type="email" name="txt_email" placeholder="Digite o email do administrador" class="form-control" required>
                               <br>
                              <button class="btn btn-success " name="recovery" value="recovery">Solicitar senha</button>
                    
                          </form>
                     </div>
                     
                     
                </div>
                
                <div class="col-md-4"></div>
                
                
            </section>
                 
            
            
        </section>
        
    </body>

</html><?php }
}
