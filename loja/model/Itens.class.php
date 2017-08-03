<?php


/**
 * Description of Itens
 *
 * @author Eduardo
 */
class Itens extends Conexao{
    
    private $total_valor;
    
    
    function __construct() {
        parent::__construct();
    }
    
    function GetItensPedidos($pedido,$cliente=null){
        
        $query="SELECT * FROM ".$this->prefix."pedidos p, ".$this->prefix."pedidos_itens i, ".$this->prefix."produtos d  WHERE p.ped_cod = i.item_ped_cod AND i.item_produto = d.pro_id AND p.ped_cod = :pedido";          
       
        //Verifico se o cliente não veio nulo
        if($cliente !=NULL):
          
            $query.= " AND p.ped_cliente = :cliente";
            
            $params [':cliente']=(int)$cliente;
                       
        endif;
        
        
       $params ['pedido']=$pedido;
       $this->ExecuteSQL($query, $params);
       $this->GetLista(); 
        
    }
    
    
    /**
     * Retorna um array da tabela
     */
    private function GetLista(){
        $i=1; $sub = 0;
        while($lista = $this->ListarDados() ):
            //sub total de cada item
            $sub = $lista['item_valor'] * $lista['item_qtd'];
            $this->total_valor += $sub;
        $this->itens[$i] = array(
            
            'ped_id'=> $lista['ped_id'],
            'ped_data'=> Sistema::Fdata($lista['ped_data']),            
            'ped_data_US'=> $lista['ped_data'],            
            'ped_hora'=> $lista['ped_hora'],
            'ped_cliente'=> $lista['ped_cliente'],
            'ped_cod'=> $lista['ped_cod'], 
            'ped_ref'=> $lista['ped_ref'],
            'ped_pag_status'=> $lista['ped_pag_status'], 
            'ped_pag_forma'=> $lista['ped_pag_forma'],
            'ped_pag_tipo'=> $lista['ped_pag_tipo'], 
            'ped_pag_codigo'=> $lista['ped_pag_codigo'],
            'ped_frete_valor'=> $lista['ped_frete_valor'], 
            'ped_frete_tipo'=> $lista['ped_frete_tipo'],             
            'pro_nome'=> $lista['pro_nome'],            
            'item_id'=> $lista['item_id'],            
            'item_nome'=> $lista['pro_nome'],
            'item_valor'=> Sistema::MoedaBR($lista['item_valor']),            
            'item_valor_us'=> $lista['item_valor'],
            'item_qtd'=> $lista['item_qtd'],            
            'item_img'=> Rotas::Image_Link($lista['pro_img'], 60, 60),            
            'item_sub'=> Sistema::MoedaBR($sub),
            'item_sub_us'=> $sub,
            
            
            
            
            
        );
        
        $i++;
        endwhile;
    }
    
    
    function GetTotal(){
        return $this->total_valor;
    }
    
    
}
