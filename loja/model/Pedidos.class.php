<?php
/**
 * Description of Pedidos
 *
 * @author Eduardo
 */
class Pedidos extends Conexao{
    function __construct() {
        parent:: __construct();
    }
    
    /**
     * 
     * @param int para filtrar pedidos $cliente
     */
    function GetPedidos($cliente=null){
        
        $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c ON p.ped_cliente = c.cli_id";
        
        if($cliente !=NULL):
            
            $cli = (int)$cliente;            
            $query .=" WHERE ped_cliente = {$cli}";
            
        endif;
        
        $this->ExecuteSQL($query);
        $this->GetLista();
    }
    
     /**
     * 
     * @param int para filtrar pedidos data
     */
    function GetPedidosData($data_ini, $data_fim){
        //monta a SQL
        $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c ON p.ped_cliente = c.cli_id WHERE ped_data between :data_ini AND :data_fim";
       
         //PASSA OS PARAMETROS
        $params = array(':data_ini' =>$data_ini, ':data_fim' =>$data_fim);
        //EXECUTA
        $this->ExecuteSQL($query, $params);
        
        $this->GetLista();
    }
    
    
     /**
     * 
     * @param int para filtrar pedidos por referencia
     */
    function GetPedidosRef($ref){
        //monta a SQL
        $query = "SELECT * FROM {$this->prefix}pedidos p INNER JOIN {$this->prefix}clientes c ON p.ped_cliente = c.cli_id WHERE ped_ref = :ref";
       
         //PASSA OS PARAMETROS
        $params = array(':ref' =>$ref);
        //EXECUTA
        $this->ExecuteSQL($query, $params);
        
        $this->GetLista();
    }
    
    /**
     * 
     * @param int $cod_pedido
     */
    function Apagar($ped_cod){
        
        $query = "DELETE FROM ".$this->prefix."pedidos WHERE ped_cod =:ped_cod";
        
        $params = array(':ped_cod' =>$ped_cod);
        
        $this->ExecuteSQL($query, $params);
        
        //Apos apagar pedidos apaga itens do pedido--------------------------------------------
        
        $query = "DELETE FROM ".$this->prefix."pedidos_itens WHERE item_ped_cod =:ped_cod";
        
        $params = array(':ped_cod' =>$ped_cod);
        
        if($this->ExecuteSQL($query, $params)):
            return TRUE;
        endif;
    }


    /**
     * Retorna um array da tabela
     */
    private function GetLista(){
        $i=1;
        while($lista = $this->ListarDados() ):
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
            'ped_frete_valor'=> Sistema::MoedaBR($lista['ped_frete_valor']),
            'ped_frete_tipo'=> $lista['ped_frete_tipo'],
            'cli_nome'=> $lista['cli_nome'],            
            'cli_sobrenome'=> $lista['cli_sobrenome'],
            
            
            
            
        );
        
        $i++;
        endwhile;
    }
    
    
    function PedidoGravar($cliente,$cod,$ref,$freteValor=null,$freteTipo=null){
        $retorno = FALSE;
        
        $query  = "INSERT INTO ".$this->prefix."pedidos ";
        $query .= "(ped_data, ped_hora, ped_cliente, ped_cod, ped_ref, ped_frete_valor, ped_frete_tipo)";
        $query .= " VALUES ";     
        $query .= "(:ped_data, :ped_hora, :ped_cliente, :ped_cod, :ped_ref, :ped_frete_valor, :ped_frete_tipo)";
         
         $params = array(
             ':ped_data'=> Sistema::DataAtualUS(),
             ':ped_hora'=> Sistema::HoraAtual(),
             ':ped_cliente'=> (int)$cliente,
             ':ped_cod'=> $cod,
             ':ped_ref'=> $ref,
             ':ped_frete_valor'=> $freteValor,
             ':ped_frete_tipo'=> $freteTipo
         );
         
         //echo $query . '<br><br>';
         //gravo o pedido
         $this->ExecuteSQL($query, $params);
         //gravo os itens
         $this->ItensGravar($cod);
         
        $retorno = TRUE;
        
        return $retorno;
    }  
    
    /**
     * grava os itens do pedido
     * @param string codpedido
     */
    private function ItensGravar($codpedido){
        
        $carrinho = new Carrinho();       
        foreach ($carrinho->GetCarrinho() as $item):
            
            $query  = "INSERT INTO ".$this->prefix."pedidos_itens ";
            $query  .= "(item_produto, item_valor, item_qtd, item_ped_cod)";  
            $query  .=  " VALUES ";
            $query  .=  "(:produto, :valor, :qtd, :cod)";
                 
            
            $params = array(                
                ':produto'=> $item['pro_id'],
                ':valor'=> $item['pro_valor_us'],
                ':qtd'=> (int)$item['pro_qtd'],
                ':cod'=> $codpedido               
            );
            
            //echo $query . '<br>';
            $this->ExecuteSQL($query, $params);
            
            
        endforeach;
    }
    /**
     * Encerrar sessão do pedido e itens do carrinho
     */
    function LimparSessoes(){
        
        unset($_SESSION['PRO']);
        unset($_SESSION['PED']['pedido']);
        unset($_SESSION['PED']['ref']);
        
    }
}
