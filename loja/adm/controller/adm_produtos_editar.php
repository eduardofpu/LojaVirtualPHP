<?php

//objeto do template
$smarty = new Template();

//crio o objeto produtos------------Editar o produto------------------
$gravar = new Produtos();

//verifica se tem o post de apagar o produto--------------------------------------------
if (isset($_POST['pro_apagar']) && isset($_POST['pro_id_apagar']) && $_POST['pro_apagar'] == 'SIM'):

    if ($gravar->Apagar($_POST['pro_id_apagar'])):

        echo '<div class="alert alert-warning">Produto Deletado com sucesso!</div>';
    
            //Apagar a imagem antiga------------------------------------
            @unlink($_POST['pro_img_arquivo']); // Recurso do PHP para apagar imagem

             
        //volta para a pagina de produtos
        Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());

    endif;


    exit();

endif;

//verifica se tem o posta para adcionar e editar-----------------------------------------
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
    $pro_id = $_POST['pro_id'];
    $pro_img_arquivo = $_POST['pro_img_arquivo'];




    //Chamando a classe upload tratando a imagem-------------------------------------------------
    //verifico se o arquivo do post veio vazio
    if (!empty($_FILES['pro_img']['name'])):

        $upload = new ImagemUpload();

        if ($upload->Upload(900, 'pro_img')):
            $pro_img = $upload->retorno;

            //Apagar a imagem antiga------------------------------------
            @unlink($pro_img_arquivo); // Recurso do PHP para apagar imagem

        else:

            exit('<div class="alert alert-danger">Erro no envio da imagem</div>');

        endif;
    //Se a imagem não foi escolhida usa uma que ja existe
    else:
        $pro_img = $_POST['pro_img_atual'];

    endif;


//chamo o metodo que prepara os campos ----------------------------------------
    $gravar->Preparar($pro_nome, $pro_categoria, $pro_ativo, $pro_modelo, $pro_ref, $pro_valor, $pro_estoque, $pro_peso, $pro_altura, $pro_largura, $pro_comprimento, $pro_img, $pro_desc, $pro_slug);
    //Gravar os dados  caso seja ok redireciona 
    if ($gravar->Alterar($pro_id)):

        echo '<div class="alert alert-success">Produto Editado com sucesso!</div>';

    //Rotas::Redirecionar(2, Rotas::pag_ProdutosADM());
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

//Pegando o produto atual-------------------------------------

$produtos = new Produtos();

$id = (int) $_POST['pro_id'];
$produtos->GetProdutosID($id);



//passando variaveis para o template
$smarty->assign('CATEGORIAS', $categorias->GetItens());
$smarty->assign('GET_TEMA', Rotas::get_SiteTEMA());
$smarty->assign('PRO', $produtos->GetItens()); //Retorna os dados do produtos





$smarty->display('adm_produtos_editar.tpl');
