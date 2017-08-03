<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutosImages
 *
 * @author Eduardo
 */
class ProdutosImages extends Conexao{
   
    /**
     * @param retorna um int
     */
    function GetImagesPRO($pro){
       $query = "SELECT * FROM {$this->prefix}imagens WHERE img_pro_id = :pro";       
             
       $params = array(':pro'=>(int)$pro);       
       
       $this->ExecuteSQL($query,$params);
       
        $this->GetLista();
    }
    
    
    /**
     * Retorna um array da tabela
     */
    private function GetLista(){
        $i=1;
        while($lista = $this->ListarDados() ):
            
        $this->itens[$i] = array(
            
            'img_id'    =>$lista['img_id'],
            'img_nome'  =>Rotas::Image_Link($lista['img_nome'],150, 150),
            'img_pro_id'=>$lista['img_pro_id'],
            'img_link'  =>Rotas::Image_Link($lista['img_nome'],500, 500), 
            'img_arquivo'  =>$lista['img_nome'],  
            
        );
        
        $i++;
        endwhile;
    }
    
    /**
     * 
     * @param  $img nome da foto
     * @param  $produto id do produto
     */    
    public function Insert($img,$produto){
        
        $query = "INSERT INTO ".$this->prefix."imagens (img_nome,img_pro_id) VALUES (:img_nome, :img_pro_id)"; 
        
        $params = array(':img_nome' => $img, ':img_pro_id' => (int)$produto);
        $this->ExecuteSQL($query, $params); 
        
    }
    
    /**
     * 
     * @param int $img_id da foto apagar
     */
    public function Deletar($img_nome){
        
        $query=" DELETE FROM ".$this->prefix."imagens WHERE img_nome = :img_nome";
        
        $params = array('img_nome' => $img_nome);
        $this->ExecuteSQL($query, $params);
        
    }
}
