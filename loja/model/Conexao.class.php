<?php


/**
 * Description of Conexao
 * Gerencia a conexão com o DB
 * @author Eduardo
 */
class Conexao extends Config{
    private   $host,
              $user,
              $senha,
              $banco;
    
    //So pode ser enchergado dentro da classe
    protected $obj,
              $itens=array(),
              $prefix;
    
    
    public $paginacaolinks;
    
    /**
     *
     * int numero total de paginas
     */
     public $totalpags;
              
            
    function __construct() {
        
        // self pode ser usado no lugar de Config  ja que esta sendo extendido da classe config
        $this->host  = self::BD_HOST;
        $this->user  = self::BD_USER;
        $this->senha = self::BD_SENHA;
        $this->banco = self::BD_BANCO;
        //Para receber o prefixo do nome das tabelas do banco isoladamente
        $this->prefix = self::BD_PREFIXO;
        
        try {
            
            if($this->Conectar() == null):
                
                  $this->Conectar();
            
            endif;
            
        } catch (Exception $e) {
            
            die($e->getMessage().'<h2>Ops... Erro de conexão</h2>');
            
        }
        }
    /**
     * @return \PDO link com dados da conexão
     */
    private function  Conectar(){
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        
        $link = new PDO("mysql:host={$this->host};dbname={$this->banco}",
                $this->user, $this->senha, $options);
        
        return $link;
    }
    
   
    
    /**
     * 
     * @query type string SQL passada
     * @param array são parametros da sql
     * @return PDO uma consulta
     */
    function ExecuteSQL($query, array $params=NULL){ 
        
        $this->obj=$this->Conectar()->prepare($query);
            
       //Rotina de filtragem
        //Contagens dos Elementos do meu array
        if(count($params)>0):
            //Varrendo o array e pegando os dados
            foreach ($params as $key =>  $value):
            
        $this->obj->bindValue($key, $value);
            endforeach;           
            
        endif;
        
        
        return $this->obj->execute();
    }
    /**
     * 
     * @return array com dados da SQL
     */
    function ListarDados(){
        return $this->obj->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * 
     * @return int retorno um inteiro com total de registros
     */
    function TotalDados() {
        return $this->obj->rowCount();
    }
    
    function GetItens(){
        return $this->itens;
    }
    
    /**
     * 
     * @param string: campo da tabela
     * @param string: nome tabela
     * @return string: complemento da sql para limitar
     */
    function PaginacaoLinks($campo, $tabela){
        
        $pag = new Paginacao();
        $pag->GetPaginacao($campo, $tabela);
        $this->paginacaolinks = $pag->link;
        
        //recebo o total de paginas
        $this->totalpags = $pag->totalpags;
        
        $inicio = $pag->inicio; // se clicar na 1 mostrara 123  se for 2  mostra 456
        $limite = $pag->limite; // 123-456-789-10
        
        if($this->totalpags  > 0):
            
             return " limit {$inicio},{$limite}";
             
             else:
             return " ";             
             
           
    
             
        endif;
       
    }
    /**
     * 
     * retorna uma lista com as paginas para escolher
     * 
     */
    protected  function Paginacao($paginas=array()){
        
        $pag = '<ul class="pagination">';
        
        
        $pag .= '<li><a href="?p=1"> << INÍCIO </a></li>';
        
        
            foreach ($paginas as $p):
            $pag .= '<li><a href="?p='.$p.'"> '. $p.'</a></li>';    
        
            endforeach;
            
         $pag .= '<li><a href="?p='.$this->totalpags.'"> ... '.$this->totalpags.' >> </a></li>';
        
        $pag .= '</ul>';
        
        //retorna a paginação  somente se tiver + de uma página de itens
        if($this->totalpags > 1):
          return $pag; 
         endif;
              
    }
     /**
      * 
      * @return array  paginaçao com links
      */       
    function ShowPaginacao(){
        return $this->Paginacao($this->paginacaolinks);
    }
}
