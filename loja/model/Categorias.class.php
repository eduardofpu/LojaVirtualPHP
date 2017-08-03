<?php


class Categorias extends Conexao{
    //put your code here
    
    private $cate_id, $cate_nome, $cate_slug;
            
    function __construct() {
        parent::__construct();
    }
    /**
     * retorna a sql da consulta de categorias
     */
    function GetCategorias(){
        $query = "SELECT * FROM {$this->prefix}categorias";
        $this->ExecuteSQL($query);
        $this->GetLista();
        
        //echo $query;
    }  
    
     /**
     * Retorna um array da tabela
     */
    private function GetLista(){
        $i=1;
        while($lista = $this->ListarDados() ):
        $this->itens[$i] = array(
            
            'cate_id'=>$lista['cate_id'],
            'cate_nome'=>$lista['cate_nome'],
            'cate_slug'=>$lista['cate_slug'],
            'cate_link'=> Rotas::pag_Produtos().'/'.$lista['cate_id'].'/'.$lista['cate_slug'], 
            'cate_link_adm'=> Rotas::pag_ProdutosADM().'/'.$lista['cate_id'].'/'.$lista['cate_slug'], 
            
            
            
        );
            
        $i++;
        endwhile;
    }
    
    function Editar($cate_id,$cate_nome){
        //trato os compos
        $this->setCate_nome($cate_nome);
        $this->setCate_slug($cate_nome);
        //monto a SQL
        $query =" UPDATE ".$this->prefix."categorias SET cate_nome = :cate_nome , cate_slug = :cate_slug WHERE cate_id = :cate_id";
        
        $params = array(':cate_nome' => $this->getCate_nome(),
                        ':cate_slug' => $this->getCate_slug(),
                        ':cate_id' => (int)$cate_id,                        
                        );
        //PASSO OS PARAMETROS
        if($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }
    
    
    function Inserir($cate_nome){
        //trato os compos
        $this->setCate_nome($cate_nome);
        $this->setCate_slug($cate_nome);
        //monto a SQL
        $query =" INSERT INTO ".$this->prefix."categorias (cate_nome, cate_slug) VALUES (:cate_nome, :cate_slug )";
        
        $params = array(':cate_nome' => $this->getCate_nome(),
                        ':cate_slug' => $this->getCate_slug(),
                                               
                        );
        //PASSO OS PARAMETROS
        if($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }
    
    
    
    function Apagar($cate_id){
        
        //Verifico se não tenho  itens antes de apagar a categoria
        $pro = new Produtos();
        $pro->GetProdutosCateID($cate_id);
        
        if($pro->TotalDados() > 0 ):
        echo '<div class="alert alert-danger"> Esta categoria tem ';
        echo $pro->TotalDados();
        echo ' Produtos. Não pode ser apagada, para apagar precisa primeiro apagar os produtos dela</div>';
        
        else:
            
        $query ="DELETE FROM ".$this->prefix."categorias WHERE cate_id = :cate_id";        
        $params = array('cate_id' => (int)$cate_id);
        $this->ExecuteSQL($query, $params);   
            
        endif;
        
       
    }
    


    //Getter e set-----------------------------------------
    
    function getCate_nome() {
        return $this->cate_nome;
    }

    function getCate_slug() {
        return $this->cate_slug;
    }
    //Set---------------------------------------------------------
    function setCate_nome($cate_nome) {
        $this->cate_nome = filter_var($cate_nome, FILTER_SANITIZE_STRING);
    }

    function setCate_slug($cate_slug) {
        $this->cate_slug = Sistema::GetSlug($cate_slug);
    }


}
