<?php

/**
 * Description of Carrinho
 *
 * @author Eduardo
 */
class Carrinho {
    //put your code here

    /**
     *
     * @var float armazena o total dos itens do carrinho
     */
    private $total_Valor;

    /**
     *
     * @var floa peso total dos itens
     */
    private $total_Peso;

    /**
     *
     * @var array: todos os itens do carrinho
     */
    private $itens = array();

    function GetCarrinho($sessao = NULL) {

        $i = 1;
        $sub = 1.00;
        $peso = 0;

        foreach ($_SESSION['PRO'] as $lista):

            $sub = ($lista['VALOR_US'] * $lista['QTD']);
            $this->total_Valor += $sub;
            
            //calcula peso
            $peso = $lista['PESO'] * $lista['QTD'];
            $this->total_Peso += $peso;

            $this->itens[$i] = array(
                'pro_id' => $lista['ID'],
                'pro_nome' => $lista['NOME'],
                'pro_valor' => $lista['VALOR'],
                'pro_valor_us' => $lista['VALOR_US'],                
                'pro_peso' => $lista['PESO'],
                'pro_qtd' => $lista['QTD'],
                'pro_img' => $lista['IMG'],
                'pro_link' => $lista['LINK'],                
                'pro_subtotal' => Sistema::MoedaBR($sub)
            );
            $i++;
        endforeach;

        if (count($this->itens) > 0):
            return $this->itens;

        else:
            echo '<h4 class="alert alert-danger">Sem produtos no carrinho</h4>';
            Rotas::Redirecionar(1, Rotas::pag_Produtos());
            exit();
        endif;
    }

    /**
     * 
     * @return float total de todos itens do carrinho
     */
    function GetTotal() {
        
        return $this->total_Valor;
    }
    /**
     * 
     * @return retorna um float com o peso
     */
    function GetPeso(){
        return $this->total_Peso;
    }
                function CarrinhoADD($id) {

        //classe produtos
        $produtos = new Produtos();
        //Metodo que pega o produto pelo id
        $produtos->GetProdutosID($id);
        
       
        //Pega informações dos produtos
        foreach ($produtos->GetItens() as $pro):
            $ID       = $pro['pro_id'];
            $NOME     = $pro['pro_nome'];            
            $VALOR    = $pro['pro_valor'];
            $VALOR_US = $pro['pro_valor_us'];
            $PESO     = $pro['pro_peso'];
            $QTD      = 1;
            $IMG      = $pro['pro_img_p'];
            $LINK     = Rotas::pag_ProdutosInfo() . '/' . $ID . '/' . $pro['pro_slug'];
            $ACAO     = $_POST['acao'];


        endforeach;

        switch ($ACAO):
            //caso seja para inserir
            case 'add':
            //verifico se nao te não tenho ainda o produto se tenho gravo um novo
            if(!isset($_SESSION['PRO'][$ID]['ID'])):
                
           
                $_SESSION['PRO'][$ID]['ID']       = $ID;
                $_SESSION['PRO'][$ID]['NOME']     = $NOME;
                $_SESSION['PRO'][$ID]['VALOR']    = $VALOR;
                $_SESSION['PRO'][$ID]['VALOR_US'] = $VALOR_US;
                $_SESSION['PRO'][$ID]['PESO']     = $PESO;
                $_SESSION['PRO'][$ID]['QTD']      = $QTD;
                $_SESSION['PRO'][$ID]['IMG']      = $IMG;
                $_SESSION['PRO'][$ID]['LINK']     = $LINK;
                
                //se ja tenho aumentar a quantidade
            else:
                $_SESSION['PRO'][$ID]['QTD'] += $QTD;
            endif;
            
             echo '<h4 class="alert alert-success">Produto inserido</h4>';
            
                break;
            //caso seja para deletar
            case 'del':
                
                $this->CarrinhoDEL($id);                
                 echo '<h4 class="alert alert-danger">Produto removido</h4>';

                break;
            //caso seja para limpar o carrinho todo
            case 'limpar':
                
                 
                $this->CarrinhoLimpar();
                echo '<h4 class="alert alert-danger">Produtos removidos</h4>';
               
                break;


        endswitch;
    }
    /**
     * 
     * @param int produto e remove
     */
    private function CarrinhoDEL($id){
        
        unset($_SESSION['PRO'][$id]);
    }
    /**
     * LIMPO O CARRINHO TODO
     */
    private function CarrinhoLimpar(){
        unset($_SESSION['PRO']);
    }

}
