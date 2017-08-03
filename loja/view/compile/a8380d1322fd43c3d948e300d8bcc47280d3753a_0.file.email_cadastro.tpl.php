<?php
/* Smarty version 3.1.31, created on 2017-07-28 00:31:21
  from "C:\xampp\htdocs\loja\view\email_cadastro.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_597a69b98d8324_63995760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8380d1322fd43c3d948e300d8bcc47280d3753a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\loja\\view\\email_cadastro.tpl',
      1 => 1501166154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597a69b98d8324_63995760 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3>Olá <?php echo $_smarty_tpl->tpl_vars['NOME']->value;?>
, obrigado por se cadastrar em <?php echo $_smarty_tpl->tpl_vars['SITE']->value;?>
</h3>

<h3>Cadastro efetuado com sucesso, para fazer login use seu email cadastrado ( <?php echo $_smarty_tpl->tpl_vars['EMAIL']->value;?>
 )
    <br>
    com a sua senha, sua senha neste momento é ( <?php echo $_smarty_tpl->tpl_vars['SENHA']->value;?>
 )
</h3>

<h3>
    
    Para acessar o site da sua conta basta usar este endereço <a href="<?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['PAG_MINHA_CONTA']->value;?>
</a>
</h3><?php }
}
