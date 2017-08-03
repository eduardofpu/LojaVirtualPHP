<?php

/**
 * TRATANDO URLS
 * Selecione o codigo e precione alt+shif+I+F  para identamento do codigo
 * @autor Eduardo
 */
class Rotas {

    /**
     *
     * @var string: define a pasta controller
     */
    private static $pasta_controller = 'controller';

    /**
     *
     * @var string: define a pasta view
     */
    private static $pasta_view = 'view';
    private static $pasta_ADM = 'adm';

    /**
     *
     * @var array: recebe os parametros da URL 
     */
    public static $pag;

    /**
     * verifica se exit a pagina e parametros na url
     */
    static function get_Pagina() {


        if (isset($_GET['pag'])):

            $pagina = $_GET['pag'];


            //Separa a url pela barra  e gera os parametros
            self::$pag = explode('/', $pagina);

            //Para criar uma barra diacordo com cada sistema operacional
            $barra = DIRECTORY_SEPARATOR;

            $pagina = self:: $pasta_controller . $barra . self::$pag[0] . '.php';

            if (file_exists($pagina)):
                include $pagina;
            //echo $pagina;
            else:
                echo 'Arquivo não encontrado:' . $pagina;
                include 'erro.php';
            endif;

        //Se não existir a pagina e parametros
        else:
            include 'home.php';
        endif;
    }

    static function Image_Link($img, $largura, $altura) {

        $imagem = self::get_ImageURL() . 'thumb.php?src='
                . $img . '&w=' . $largura . '&h=' . $altura . '&zc=1';

        return $imagem;
    }

    /**
     * 
     * @return string: URL home do site
     */
    static function get_SiteHOME() {
        return Config::SITE_URL . '/' . Config::SITE_PASTA;
    }

    /**
     * 
     * @return string: Pasta Raiz do meu sistema
     */
    static function get_SiteRAIZ() {
        return $_SERVER['DOCUMENT_ROOT'] . '/' . Config::SITE_PASTA;
    }

    /**
     * 
     * @return string: URL do template do site, css, js
     */
    static function get_SiteTEMA() {
        return self::get_SiteHOME() . '/' . self::$pasta_view;
    }

    /**
     * 
     * @return pagina de carrinho
     */
    static function pag_Carrinho() {
        return self::get_SiteHOME() . '/carrinho';
    }

    /**
     * 
     * @return pagina de manipulação do carrinho
     */
    static function pag_CarrinhoAlterar() {
        return self::get_SiteHOME() . '/carrinho_alterar';
    }

    /**
     * 
     * @return pagina de produtos
     */
    static function pag_Produtos() {
        return self::get_SiteHOME() . '/produtos';
    }

    /**
     * 
     * @return pagina de detalhe do produto
     */
    static function pag_ProdutosInfo() {
        return self::get_SiteHOME() . '/produtos_info';
    }

    /**
     * 
     * @return pagina de login
     */
    static function pag_ClienteLogin() {
        return self::get_SiteHOME() . '/login';
    }

    /**
     * 
     * @return string retorna pagina logoff
     */
    static function pag_Logoff() {
        return self::get_SiteHOME() . '/logoff';
    }

    /**
     * 
     * @return pagina de recuperação de senha
     */
    static function pag_ClienteRecovery() {
        return self::get_SiteHOME() . '/clientes_recovery';
    }

    /**
     * 
     * @return pagina de conta do cliente
     */
    static function pag_ClientePedidos() {
        return self::get_SiteHOME() . '/clientes_pedidos';
    }

    /**
     * 
     * @return pagina itens do cliente
     */
    static function pag_ClienteItens() {
        return self::get_SiteHOME() . '/clientes_itens';
    }

    /**
     * 
     * @return pagina de dados cliente
     */
    static function pag_ClienteDados() {
        return self::get_SiteHOME() . '/clientes_dados';
    }

    /**
     * 
     * @return pagina de senha
     */
    static function pag_ClienteSenha() {
        return self::get_SiteHOME() . '/clientes_senha';
    }

    /**
     * 
     * @return pagina de conta do cliente
     */
    static function pag_ClienteConta() {
        return self::get_SiteHOME() . '/minhaconta';
    }

    /**
     * 
     * @return string pagina de cadastro
     */
    static function pag_ClienteCadastro() {
        return self::get_SiteHOME() . '/cadastro';
    }

    /**
     * 
     * @return pagina de confirmar pedidos
     */
    static function pag_PedidoConfirmar() {
        return self::get_SiteHOME() . '/pedido_confirmar';
    }

    /**
     * 
     * @return pagina de finalizar pedido
     */
    static function pag_PedidoFinalizar() {
        return self::get_SiteHOME() . '/pedido_finalizar';
    }
    
   /**
     * 
     * @return tela de retorno apos pagamento ou não
     */
    static function pag_PedidoRetorno() {
        return self::get_SiteHOME() . '/pedido_retorno';
    }

    /**
     * 
     * @return tela de retornoErro apos pagamento ou não
     */
    static function pag_PedidoRetornoErro() {
        return self::get_SiteHOME() . '/pedido_retorno_erro';
    }

    /**
     * 
     * @return pagina de contato
     */
    static function pag_Contato() {
        return self::get_SiteHOME() . '/contato';
    }

    /**
     * 
     * @return string pasta fisica da imagem
     */
    static function get_ImagePasta() {
        return 'media/images/';
    }

    /**
     * 
     * @return string com a url da imagem
     */
    static function get_ImageURL() {
        return self::get_SiteHOME() . '/' . self::get_ImagePasta();
    }

    /**
     * 
     * @return string com a pasta controler
     */
    static function get_Pasta_Controller() {
        return self::$pasta_controller;
    }

    /**
     * 
     * @param int tempo em segundos
     * @param string $pagina que eu quero ir     
     */
    static function Redirecionar($tempo, $pagina) {

        $url = '<meta http-equiv="refresh" content="' . $tempo . '; url=' . $pagina . '">';

        echo $url;
    }
    
    
    
    //Referente as telas para a area administrativo------------------------------------------------------------------
    
    
    
    
    /**
     * 
     * @return string retorna a pasta administrativa do site
     */
    static function get_SiteADM() {

        return self::get_SiteHOME() . '/' . self::$pasta_ADM;
    }

    /**
     * 
     * @return string a pasta administrativa e a pasta produtos
     */
    static function pag_ProdutosADM() {
        return self::get_SiteADM() . '/adm_produtos';
    }
    
    /**
     * 
     * @return string a pasta administrativa editar
     */
    static function pag_ProdutosEditarADM() {
        return self::get_SiteADM() . '/adm_produtos_editar';
    }
    
     /**
     * 
     * @return string a pasta administrativa de imagens extras
     */
    static function pag_ProdutosImgADM() {
        return self::get_SiteADM() . '/adm_produtos_img';
    }
    
    /**
     * 
     * @return string a pasta administrativa deletar
     */
    static function pag_ProdutosDeletarADM() {
        return self::get_SiteADM() . '/adm_produtos_deletar';
    }
    
    
    /**
     * 
     * @return string a pasta administrativa inserir
     */
    static function pag_ProdutosNovoADM() {
        return self::get_SiteADM() . '/adm_produtos_novo';
    }
    
    
     /**
     * 
     * @return string a pasta administrativa e a pasta clientes
     */
    static function pag_ClientesADM() {
        return self::get_SiteADM() . '/adm_clientes';
    }
    
    /**
     * 
     * @return string a pasta administrativa e a pasta clientes edit
     */
    static function pag_ClientesEditarADM() {
        return self::get_SiteADM() . '/adm_clientes_editar';
    }
    
     /**
     * 
     * @return string a pasta administrativa e a pasta pedidos
     */
    static function pag_PedidosADM() {
        return self::get_SiteADM() . '/adm_pedidos';
    }
    
    
     /**
     * 
     * @return string a pasta administrativa e a pasta itens
     */
    static function pag_ItensADM() {
        return self::get_SiteADM() . '/adm_itens';
    }
    
    
    /**
     * 
     * @return string a pasta administrativa e a pasta itens
     */
    static function pag_CategoriasADM() {
        return self::get_SiteADM() . '/adm_categorias';
    }
    
    
    


}
