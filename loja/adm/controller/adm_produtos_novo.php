<?php

//objeto do template
$smarty = new Template();


if (isset($_POST['pro_nome']) && isset($_POST['pro_valor'])):

    $pro_nome = $_POST['pro_nome'];
    $pro_categoria = $_POST['pro_categoria'];
    $pro_ativo = $_POST['pro_ativo'];
    $pro_modelo = $_POST['pro_modelo'];
    $pro_ref = $_POST['pro_ref'];
    $pro_valor = $_POST['pro_valor'];
    $pro_estoque = $_POST['pro_estoque'];
    $pro_peso = $_POST['pro_peso'];
    $pro_altura = $_POST['pro_altura'];
    $pro_largura = $_POST['pro_largura'];
    $pro_comprimento = $_POST['pro_comprimento'];
    $pro_img = $_FILES['pro_img']['name'];
    $pro_desc = $_POST['pro_desc'];
    $pro_slug = $_POST['pro_slug'];
    
 //Chamando a classe upload tratando a imagem-------------------------------------------------
   
    //verifico se o arquivo do post veio vazio
   if(!empty($_FILES)): 
       
        $upload = new ImagemUpload();
   
    if($upload->Upload(900, 'pro_img')):
        $pro_img = $upload->retorno;
    
    else:
        
        exit('<div class="alert alert-danger">Erro no envio da imagem</div>');
        
    endif;
    
   endif;

//crio o objeto produtos------------Gravando o produto------------------
    $gravar = new Produtos();
//chamo o metodo que prepara os campos ----------------------------------------
    $gravar->Preparar($pro_nome, $pro_categoria, $pro_ativo, $pro_modelo, $pro_ref, $pro_valor, $pro_estoque, $pro_peso, $pro_altura, $pro_largura, $pro_comprimento, $pro_img, $pro_desc, $pro_slug);
    //Gravar os dados  caso seja ok redireciona 
    if($gravar->Inserir()):
        
        echo '<div class="alert alert-success">Produto cadastrado com sucesso!</div>';
        Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());
        
        //caso não mostra erro
        else:
        
         echo '<div class="alert alert-danger">Ocorreu algum erro!';
         Sistema::VoltarPagina();         
         echo '</div>';
         exit();
    endif;

//   echo '<pre>';
//   print_r($_POST);
//   echo '</pre>';


endif;

//Trata dados da categorias
$categorias = new Categorias();
$categorias->GetCategorias();
//passando variaveis para o template
$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());


$smarty->display('adm_produtos_novo.tpl');
