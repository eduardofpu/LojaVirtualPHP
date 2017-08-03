<?php

//Chama o template-------------------------------------
$smarty = new Template();

//id do produto passado
$pro_id = (int) $_POST['pro_id'];
//verifica se exite o post da imagem
if (isset($_POST['pro_id']) && isset($_FILES['pro_img']['name'])):

    $upload = new ImagemUpload();

    if (!empty($_FILES['pro_img']['name'])):

        //Upload
        $upload->Upload(900, 'pro_img');
        $pro_img = $upload->retorno;

        //gravar no banco de dados
        $gravar = new ProdutosImages();
        $gravar->Insert($pro_img, $pro_id);

    endif;

endif;

//Verifica se passou o post de apagar as fotos
if (isset($_POST['fotos_apagar'])):

    $apagar = new ProdutosImages();

//varrendo o array que vem do post apagar
    foreach ($_POST['fotos_apagar'] as $foto):
        $apagar->Deletar($foto);// apagando a foto da pasta
       // echo ' <br> Apagando foto: ' . $foto; // Debug mostra o nome da foto
        $filename = Rotas::get_SiteRAIZ().'/'. Rotas:: get_ImagePasta().$foto; // a pagando a foto da pasta
       // echo ' <br> Apagando foto: ' . $filename; // Debug mostra o caminho e o nome da foto
        @unlink($filename);// deleta as fotos escolhidas
    endforeach;

    echo '<div class="alert alert-success">Fotos(s) apagada(s) com sucesso!</div>';
endif;

//Pega objeto da classe imagens produtos
$img = new ProdutosImages();
//buscando as imagens pelo id vindo post
$img->GetImagesPRO($_POST['pro_id']);


//passando variaveis para o template

$smarty->assign('IMAGES', $img->GetItens());
$smarty->assign('PRO', $pro_id);

//mostra o template-----------------------------------
$smarty->display('adm_produtos_img.tpl');
