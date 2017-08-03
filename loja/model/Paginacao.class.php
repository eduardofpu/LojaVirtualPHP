<?php


class Paginacao extends Conexao{
    /**
     *
     * @var int passa o limite de pagina
     */
    public $limite; 
    /**
     *
     * @var int define onde começa a navegação
     */
    public $inicio;
    /**
     *
     * @var array numerico que pega as paginas para navegação   
     */
    public  $link = array();
    /**
     *
     * @var int retorna o total de paginas
     */
    public $totalpags;
   
    
        /**
         * 
         * @param string: $campo da tabela
         * @param string: $tabela do banco
         */
        function GetPaginacao($campo, $tabela){
        
        //faço uma consulta em um campo da tabela
        $query = "SELECT {$campo} FROM {$tabela}";
        $this->ExecuteSQL($query);
        
        //conto o resultado  e pego o total
        $total = $this->TotalDados();
        
        //defino limite de paginas
        $this->limite = Config::BD_LIMITE_POR_PAG;
        
        //exemplo 21/3 retorna 7 paginas  pego o numero total de pagina para navegação na URL      
        $paginas = ceil( $total / $this->limite);
        
        //recebe paginas
        $this->totalpags = $paginas;
       
        
        
        // Se não foi setado o padrão sera 1  PEGO O NUMERO DE PAGINA PARA NAVEGAÇÃO NA URL
        $p = (int)isset($_GET['p']) ? $_GET['p'] : 1;
        
        
        $p =  filter_var($p,FILTER_SANITIZE_NUMBER_INT);
        
        //verifica se passei pagina na rul a mais do que eu tenho
        if($p > $paginas):
            $p = $paginas;
        endif;
              
        
        //DEFINO ONDE COMEÇA A PAGINAÇAO
        $this->inicio = ($p * $this->limite) - $this->limite;
        
        
        //margem de tolerancia pra cima e pra baixo da pagina atual
        $tolerancia = 8;
        
        //quantos links mostrar na tela (atual + ou - tolerancia)
        $mostrar = $p + $tolerancia;
        
        //verifico  se quantos  mostrar  não é maior  do que eu tenho  no total
        if($mostrar > $paginas):
            $mostrar = $paginas;
        endif;
        
        
        
        //FAÇO UM LAÇO PASSANDO OS LINKS DAS PAGINAS PARA UM ARRAY
        for($i = ($p - $tolerancia); $i <= $mostrar; $i++):
            
            //verifico se o meu i não e negativo
            if($i < 1):
                $i = 1;
            endif;
            array_push($this->link, $i);
        
        endfor;
    }
}
