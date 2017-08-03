<?php
//chamando o objeto do  template
$smarty = new Template();


//chamo a classe de categorias
$categorias = new Categorias();
//verificar se passou o post editar

if(isset($_POST['cate_editar'])):
    
    $cate_id = $_POST['cate_id'];
    $cate_nome = $_POST['cate_nome'];
    
    
    if($categorias->Editar($cate_id, $cate_nome)):
        echo '<div class="alert alert-success"> Categoria Editada com sucesso!</div>';
    Rotas::Redirecionar(1, Rotas::pag_CategoriasADM());
    endif;  
    
    
endif;
//Verifico se passei o post apagar
if(isset($_POST['cate_apagar'])):
    
    $cate_id = $_POST['cate_id'];
    
    
    if($categorias->Apagar($cate_id)):
        
        echo '<div class="alert alert-danger"> Categoria Apagada com sucesso!</div>';
    
    endif; 
    
    
endif;

//Verifico se passei o post inserir
if(isset($_POST['cate_nova'])):
    
    $cate_nome = $_POST['cate_nome'];
    
    
    if($categorias->Inserir($cate_nome)):
        
        echo '<div class="alert alert-success"> Categoria Inserida com sucesso!</div>';
       
        Rotas::Redirecionar(1, Rotas::pag_CategoriasADM());
    
        
    
    endif; 
    
    
endif;


//chamo os métodos que trazem as categorias
$categorias->GetCategorias();

//Passando variaveis do template
$smarty->assign('CATEGORIAS',$categorias->GetItens());



//chamando o template
$smarty->display('adm_categorias.tpl');