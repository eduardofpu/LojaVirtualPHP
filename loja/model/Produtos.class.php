<?php

/**
 * Description of Produtos
 *
 * @author Eduardo
 */
class Produtos extends Conexao {

    private
            $pro_nome,
            $pro_categoria,
            $pro_ativo,
            $pro_modelo,
            $pro_ref,
            $pro_valor,
            $pro_estoque,
            $pro_peso,
            $pro_altura,
            $pro_largura,
            $pro_comprimento,
            $pro_img,
            $pro_desc,
            $pro_slug;

    function __construct() {
        parent::__construct();
    }

    /**
     * Busca todos os produtos sem filtrar
     */
    function GetProdutos() {

        $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.pro_categoria = c.cate_id";
        $query .=" ORDER BY pro_id DESC";
        // minimo e maximo de produtos na tabela
        //$query .=" limit 1,3";
        $query .= $this->PaginacaoLinks("pro_id", $this->prefix . "produtos");


        //echo $query;

        $this->ExecuteSQL($query);

        $this->GetLista();
    }

    /**
     * 
     * @param Int $id do produto
     */
    function GetProdutosID($id) {
        // Validação mais forte para evitar sql inject 
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.pro_categoria = c.cate_id";
        $query .= " AND pro_id = :id";

        $params = array(':id' => (int) $id);


        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

    /**
     * 
     * @param Int $id da categoria
     */
    function GetProdutosCateID($id) {

        // Validação mais forte para evitar sql inject 
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM {$this->prefix}produtos p INNER JOIN {$this->prefix}categorias c ON p.pro_categoria = c.cate_id";

        $query .= " AND pro_categoria = :id";

        $query .= $this->PaginacaoLinks("pro_id", $this->prefix . "produtos WHERE pro_categoria=" . (int) $id);

        $params = array(':id' => (int) $id);

        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }

    /**
     * Retorna um array da tabela
     */
    private function GetLista() {
        $i = 1;
        while ($lista = $this->ListarDados()):
            $this->itens[$i] = array(
                'pro_id' => $lista['pro_id'],
                'pro_nome' => $lista['pro_nome'],
                'pro_desc' => $lista['pro_desc'],
                'pro_peso' => $lista['pro_peso'],
                'pro_valor' => Sistema::MoedaBR($lista['pro_valor']),
                'pro_valor_us' => $lista['pro_valor'],
                'pro_altura' => $lista['pro_altura'],
                'pro_largura' => $lista['pro_largura'],
                'pro_comprimento' => $lista['pro_comprimento'],
                'pro_img_atual' => $lista['pro_img'],
                'pro_img' => Rotas::Image_Link($lista['pro_img'], 180, 180),
                'pro_img_p' => Rotas::Image_Link($lista['pro_img'], 70, 70),
                'pro_img_g' => Rotas::Image_Link($lista['pro_img'], 300, 300),
                'pro_slug' => $lista['pro_slug'],
                'pro_ref' => $lista['pro_ref'],
                'cate_nome' => $lista['cate_nome'],
                'cate_id' => $lista['cate_id'],
                'pro_modelo' => $lista['pro_modelo'],
                'pro_estoque' => $lista['pro_estoque'],
                'pro_ativo' => $lista['pro_ativo'],
                'pro_img_arquivo' => Rotas::get_SiteRAIZ().'/'.Rotas::get_ImagePasta().$lista['pro_img'],
            );

            $i++;
        endwhile;
    }

    /**
     *  Preparar antes de gravar no banco
     */
    function Preparar($pro_nome, $pro_categoria, $pro_ativo, $pro_modelo, $pro_ref, $pro_valor,$pro_estoque, $pro_peso, $pro_altura, $pro_largura, $pro_comprimento, $pro_img, $pro_desc, $pro_slug) {

        $this->setPro_nome($pro_nome);
        $this->setPro_categoria($pro_categoria);
        $this->setPro_ativo($pro_ativo);
        $this->setPro_modelo($pro_modelo);
        $this->setPro_ref($pro_ref);
        $this->setPro_valor($pro_valor);
        $this->setPro_estoque($pro_estoque);
        $this->setPro_peso($pro_peso);
        $this->setPro_altura($pro_altura);
        $this->setPro_largura($pro_largura);
        $this->setPro_comprimento($pro_comprimento);
        $this->setPro_img($pro_img);
        $this->setPro_desc($pro_desc);
        $this->setPro_slug($pro_nome);//vai receber o nome do produto
    }

    function Inserir() {

        $query = " INSERT INTO ".$this->prefix."produtos (pro_nome, pro_categoria, pro_ativo, pro_modelo, pro_ref, pro_valor, pro_estoque, pro_peso, pro_altura, pro_largura, pro_comprimento, pro_img, pro_desc, pro_slug) VALUES ( :pro_nome, :pro_categoria,:pro_ativo,:pro_modelo,:pro_ref, :pro_valor, :pro_estoque, :pro_peso, :pro_altura, :pro_largura, :pro_comprimento, :pro_img, :pro_desc, :pro_slug)";
        
        
        
        $params = array(            
            ':pro_nome'=> $this->getPro_nome(),
            ':pro_categoria'=> $this->getPro_categoria(),
            ':pro_ativo'=> $this->getPro_ativo(),
            ':pro_modelo'=> $this->getPro_modelo(),
            ':pro_ref'=> $this->getPro_ref(),
            ':pro_valor'=> $this->getPro_valor(),
            ':pro_estoque'=> $this->getPro_estoque(),              
            ':pro_peso'=> $this->getPro_peso(),
            ':pro_altura'=> $this->getPro_altura(),
            ':pro_largura'=> $this->getPro_largura(),
            ':pro_comprimento'=> $this->getPro_comprimento(),
            ':pro_img'=> $this->getPro_img(),
            ':pro_desc'=> $this->getPro_desc(),
            ':pro_slug'=> $this->getPro_slug(),
            );
         if($this->ExecuteSQL($query, $params)):
             
             return true;
             else:
             return false;    
         endif; 
       
    }
    
    
    
    function Alterar($id) {

        $query = " UPDATE ".$this->prefix."produtos SET pro_nome=:pro_nome, pro_categoria=:pro_categoria, pro_ativo=:pro_ativo, pro_modelo=:pro_modelo, pro_ref=:pro_ref, pro_valor=:pro_valor, pro_estoque=:pro_estoque, pro_peso=:pro_peso, pro_altura=:pro_altura, pro_largura=:pro_largura, pro_comprimento=:pro_comprimento, pro_img=:pro_img, pro_desc=:pro_desc, pro_slug=:pro_slug WHERE pro_id =:pro_id";
        
        
        
        $params = array(            
            ':pro_nome'=> $this->getPro_nome(),
            ':pro_categoria'=> $this->getPro_categoria(),
            ':pro_ativo'=> $this->getPro_ativo(),
            ':pro_modelo'=> $this->getPro_modelo(), 
            ':pro_ref'=> $this->getPro_ref(),
            ':pro_valor'=> $this->getPro_valor(),
            ':pro_estoque'=> $this->getPro_estoque(),              
            ':pro_peso'=> $this->getPro_peso(),
            ':pro_altura'=> $this->getPro_altura(),
            ':pro_largura'=> $this->getPro_largura(),
            ':pro_comprimento'=> $this->getPro_comprimento(),
            ':pro_img'=> $this->getPro_img(),
            ':pro_desc'=> $this->getPro_desc(),
            ':pro_slug'=> $this->getPro_slug(),
            ':pro_id'=> (int)$id,
            );
         if($this->ExecuteSQL($query, $params)):
             
             return true;
             else:
             return false;    
         endif; 
       
    }
    /**
     * 
     * @param Deletar produto
     */
    function Apagar($id){
       $query ="DELETE FROM ".$this->prefix."produtos WHERE pro_id = :id"; 
       $params = array(':id' => (int)$id); 
       
       if($this->ExecuteSQL($query, $params)):
           return true;
       else:
           return false;
       endif;
    }




    //--------------------CRIANDO GETTERS E SET-------------------------------


    function getPro_nome() {
        return $this->pro_nome;
    }

    function getPro_categoria() {
        return $this->pro_categoria;
    }

    function getPro_ativo() {
        return $this->pro_ativo;
    }

    function getPro_modelo() {
        return $this->pro_modelo;
    }

    function getPro_ref() {
        return $this->pro_ref;
    }

    function getPro_valor() {
        return $this->pro_valor;
    }

    function getPro_estoque() {
        return $this->pro_estoque;
    }

    function getPro_peso() {
        return $this->pro_peso;
    }

    function getPro_altura() {
        return $this->pro_altura;
    }

    function getPro_largura() {
        return $this->pro_largura;
    }

    function getPro_comprimento() {
        return $this->pro_comprimento;
    }

    function getPro_img() {
        return $this->pro_img;
    }

    function getPro_desc() {
        return $this->pro_desc;
    }

    function getPro_slug() {
        return $this->pro_slug;
    }

    //METODOS SET---------------------------------------------------------------



    function setPro_nome($pro_nome) {
        $this->pro_nome = $pro_nome;
    }

    function setPro_categoria($pro_categoria) {
        $this->pro_categoria = $pro_categoria;
    }

    function setPro_ativo($pro_ativo) {
        $this->pro_ativo = $pro_ativo;
    }

    function setPro_modelo($pro_modelo) {
        $this->pro_modelo = $pro_modelo;
    }

    function setPro_ref($pro_ref) {
        $this->pro_ref = $pro_ref;
    }

    function setPro_valor($pro_valor) {
        
        //1.355,99  por 1.335.99
        
        $pro_valor = str_replace('.','',$pro_valor);//1.960,99 pro  No mysql visualiza assim 1960.99 
        $pro_valor = str_replace(',','.',$pro_valor);        
        $this->pro_valor = $pro_valor ;
    }

    function setPro_estoque($pro_estoque) {
        $this->pro_estoque = $pro_estoque;
    }

    function setPro_peso($pro_peso) {
        $this->pro_peso = str_replace(',','.',$pro_peso);// Procura uma virgula e substitui pelo ponto 5,00 por 5.00
    }

    function setPro_altura($pro_altura) {
        $this->pro_altura = $pro_altura;
    }

    function setPro_largura($pro_largura) {
        $this->pro_largura = $pro_largura;
    }

    function setPro_comprimento($pro_comprimento) {
        $this->pro_comprimento = $pro_comprimento;
    }

    function setPro_img($pro_img) {
        $this->pro_img = $pro_img;
    }

    function setPro_desc($pro_desc) {
        $this->pro_desc = $pro_desc;
    }

    function setPro_slug($pro_slug) {
        $this->pro_slug = Sistema::GetSlug($pro_slug);
    }

}
