<?php

/**
 * Description of Clientes
 *
 * @author Eduardo
 */
class Clientes extends Conexao {

    private $cli_nome,
            $cli_sobrenome,
            $cli_data_nasc,
            $cli_rg,
            $cli_cpf,
            $cli_ddd,
            $cli_fone,
            $cli_celular,
            $cli_endereco,
            $cli_numero,
            $cli_bairro,
            $cli_cidade,
            $cli_uf,
            $cli_cep,
            $cli_email,
            $cli_data_cad,
            $cli_hora_cad,
            $cli_senha;

    /**
     * classe pai de conexão
     */
    function __construct() {
        parent::__construct();
    }
    
    
    function GetClientes(){
        $query = "SELECT * FROM ".$this->prefix."clientes";       
        
        $this->ExecuteSQL($query);
        $this->GetLista();
    }
    /**
     * 
     * @param type $id cliente
     */
    function GetClientesID($id){
        
        $query = "SELECT * FROM ".$this->prefix."clientes WHERE cli_id = :id";
        
        $params = array(':id' =>(int)$id);
        
        $this->ExecuteSQL($query, $params);
        $this->GetLista();
    }
    
     private function GetLista(){
        $i=1;
        while($lista = $this->ListarDados() ):
        $this->itens[$i] = array(
            
            'cli_id'=>$lista['cli_id'],
            'cli_nome'=>$lista['cli_nome'],
            'cli_sobrenome'=>$lista['cli_sobrenome'],
            'cli_endereco'=>$lista['cli_endereco'],
            'cli_numero'=>$lista['cli_numero'],
            'cli_bairro'=>$lista['cli_bairro'],
            'cli_cidade'=>$lista['cli_cidade'],
            'cli_uf'=>$lista['cli_uf'],
            'cli_cpf'=>$lista['cli_cpf'],
            'cli_cep'=>$lista['cli_cep'],
            'cli_rg'=>$lista['cli_rg'],
            'cli_ddd'=>$lista['cli_ddd'],
            'cli_fone'=>$lista['cli_fone'],            
            'cli_email'=>$lista['cli_email'],
            'cli_celular'=>$lista['cli_celular'],
            'cli_pass'=>$lista['cli_pass'],            
            'cli_data_nasc'=>$lista['cli_data_nasc'],
            'cli_hora_cad'=> $lista['cli_hora_cad'],
            'cli_data_cad'=>Sistema::Fdata($lista['cli_data_cad']),
                        
        );
            
        $i++;
        endwhile;
    }
        

    /**
     * prepara os campos para inserir e atualizar
     */
    function Preparar($cli_nome, $cli_sobrenome, $cli_data_nasc, $cli_rg, $cli_cpf, $cli_ddd, $cli_fone, $cli_celular, $cli_endereco, $cli_numero, $cli_bairro, $cli_cidade, $cli_uf, $cli_cep, $cli_email, $cli_data_cad, $cli_hora_cad, $cli_senha) {

        $this->setCli_nome($cli_nome);
        $this->setCli_sobrenome($cli_sobrenome);
        $this->setCli_data_nasc($cli_data_nasc);
        $this->setCli_rg($cli_rg);
        $this->setCli_cpf($cli_cpf);
        $this->setCli_ddd($cli_ddd);
        $this->setCli_fone($cli_fone);
        $this->setCli_celular($cli_celular);
        $this->setCli_celular($cli_celular);
        $this->setCli_endereco($cli_endereco);
        $this->setCli_numero($cli_numero);
        $this->setCli_bairro($cli_bairro);
        $this->setCli_cidade($cli_cidade);
        $this->setCli_uf($cli_uf);
        $this->setCli_cep($cli_cep);
        $this->setCli_email($cli_email);
        $this->setCli_data_cad($cli_data_cad);
        $this->setCli_hora_cad($cli_hora_cad);
        $this->setCli_senha($cli_senha);
    }

    function Inserir() {
        //se for maior que zero significa que exite algum cpf igual-------------------------
        if($this->GetClienteCPF($this->getCli_cpf())>0):
            echo '<div class="alert alert-danger" id="erro_mostra">Este CPF já esta cadastrado  ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        
        //se for maior que zero significa que exite algum email igual----------------------
        if($this->GetClienteEmail($this->getCli_email())>0):
            echo '<div class="alert alert-danger" id="erro_mostra">Este Email já esta cadastrado  ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
       //Caso passou na verificação os dados serão gravados no banco-------------------------
        $query = "INSERT INTO ".$this->prefix."clientes (cli_nome,
            cli_sobrenome,
            cli_data_nasc,
            cli_rg,
            cli_cpf,
            cli_ddd,
            cli_fone,
            cli_celular,
            cli_endereco,
            cli_numero,
            cli_bairro,
            cli_cidade,
            cli_uf,
            cli_cep,
            cli_email,
            cli_data_cad,
            cli_hora_cad,
            cli_pass) VALUES (:cli_nome,
            :cli_sobrenome,
            :cli_data_nasc,
            :cli_rg,
            :cli_cpf,
            :cli_ddd,
            :cli_fone,
            :cli_celular,
            :cli_endereco,
            :cli_numero,
            :cli_bairro,
            :cli_cidade,
            :cli_uf,
            :cli_cep,
            :cli_email,
            :cli_data_cad,
            :cli_hora_cad,
            :cli_senha)";
        
        $params = array(
            ':cli_nome'=> $this->getCli_nome(),
            ':cli_sobrenome'=> $this->getCli_sobrenome(),
            ':cli_data_nasc'=> $this->getCli_data_nasc(),
            ':cli_rg'=> $this->getCli_rg(),
            ':cli_cpf'=> $this->getCli_cpf(),
            ':cli_ddd'=> $this->getCli_ddd(),
            ':cli_fone'=> $this->getCli_fone(),
            ':cli_celular'=> $this->getCli_celular(),
            ':cli_endereco'=> $this->getCli_endereco(),
            ':cli_numero'=> $this->getCli_numero(),
            ':cli_bairro'=> $this->getCli_bairro(),
            ':cli_cidade'=> $this->getCli_cidade(),
            ':cli_uf'=> $this->getCli_uf(),
            ':cli_cep'=> $this->getCli_cep(),
            ':cli_email'=> $this->getCli_email(),
            ':cli_data_cad'=> $this->getCli_data_cad(),
            ':cli_hora_cad'=> $this->getCli_hora_cad(),
            ':cli_senha'=> $this->getCli_senha(),
             
            
        );
        //echo $query;
        $this->ExecuteSQL($query, $params);
        
        
    }
    
    
    
    
    function Alterar($id) {
        
         //se o cpf for diferente da sessao-------------------------
        if($this->GetClienteCPF($this->getCli_cpf())>0 && $this->getCli_cpf() <> $_SESSION['CLI']['cli_cpf']):
            echo '<div class="alert alert-danger" id="erro_mostra">Este CPF já esta cadastrado  ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        
        //se o email for diferente da sessao----------------------
        if($this->GetClienteEmail($this->getCli_email())>0 && $this->getCli_email() <> $_SESSION['CLI']['cli_email']):
            echo '<div class="alert alert-danger" id="erro_mostra">Este Email já esta cadastrado  ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
        endif;
        
        
        
       //Caso passou na verificação os dados serão gravados no banco-------------------------
        $query = "UPDATE ".$this->prefix."clientes SET cli_nome=:cli_nome,
            cli_sobrenome=:cli_sobrenome,
            cli_data_nasc=:cli_data_nasc,
            cli_rg=:cli_rg,
            cli_cpf=:cli_cpf,
            cli_ddd=:cli_ddd,
            cli_fone=:cli_fone,
            cli_celular=:cli_celular,
            cli_endereco=:cli_endereco,
            cli_numero=:cli_numero,
            cli_bairro=:cli_bairro,
            cli_cidade=:cli_cidade,
            cli_uf=:cli_uf,
            cli_cep=:cli_cep,
            cli_email=:cli_email,
            cli_data_cad=:cli_data_cad,
            cli_hora_cad=:cli_hora_cad,
            cli_pass=:cli_senha            
            WHERE cli_id =:cli_id";
            
        
        $params = array(
            ':cli_nome'=> $this->getCli_nome(),
            ':cli_sobrenome'=> $this->getCli_sobrenome(),
            ':cli_data_nasc'=> $this->getCli_data_nasc(),
            ':cli_rg'=> $this->getCli_rg(),
            ':cli_cpf'=> $this->getCli_cpf(),
            ':cli_ddd'=> $this->getCli_ddd(),
            ':cli_fone'=> $this->getCli_fone(),
            ':cli_celular'=> $this->getCli_celular(),
            ':cli_endereco'=> $this->getCli_endereco(),
            ':cli_numero'=> $this->getCli_numero(),
            ':cli_bairro'=> $this->getCli_bairro(),
            ':cli_cidade'=> $this->getCli_cidade(),
            ':cli_uf'=> $this->getCli_uf(),
            ':cli_cep'=> $this->getCli_cep(),
            ':cli_email'=> $this->getCli_email(),
            ':cli_data_cad'=> $this->getCli_data_cad(),
            ':cli_hora_cad'=> $this->getCli_hora_cad(),
            ':cli_senha'=> $this->getCli_senha(),
            ':cli_id' => (int)$id
             
            
        );
        
        //echo $query;
        
        
        if($this->ExecuteSQL($query, $params)):
            return true;
        else:
            return false;
        endif;
        
        
    }
    
    
    
    
    function AlterarADM($id) {
        
         //se o cpf for diferente da sessao-------------------------
//        if($this->GetClienteCPF($this->getCli_cpf())>0 && $this->getCli_cpf() != $_REQUEST['CLI']['cli_cpf']):
//            echo '<div class="alert alert-danger" id="erro_mostra">Este CPF já esta cadastrado  ';
//            Sistema::VoltarPagina();
//            echo '</div>';
//            exit();
//        endif;
        
        //se o email for diferente da sessao----------------------
//        if($this->GetClienteEmail($this->getCli_email())>0 && $this->getCli_email() != $_REQUEST['CLI']['cli_email']):
//            echo '<div class="alert alert-danger" id="erro_mostra">Este Email já esta cadastrado  ';
//            Sistema::VoltarPagina();
//            echo '</div>';
//            exit();
//        endif;
        
        
        
       //Caso passou na verificação os dados serão gravados no banco-------------------------
        $query = "UPDATE ".$this->prefix."clientes SET cli_nome=:cli_nome,
            cli_sobrenome=:cli_sobrenome,
            cli_data_nasc=:cli_data_nasc,
            cli_rg=:cli_rg,
            cli_cpf=:cli_cpf,
            cli_ddd=:cli_ddd,
            cli_fone=:cli_fone,
            cli_celular=:cli_celular,
            cli_endereco=:cli_endereco,
            cli_numero=:cli_numero,
            cli_bairro=:cli_bairro,
            cli_cidade=:cli_cidade,
            cli_uf=:cli_uf,
            cli_cep=:cli_cep,
            cli_email=:cli_email                           
            WHERE cli_id =:cli_id";
            
        
        $params = array(
            ':cli_nome'=> $this->getCli_nome(),
            ':cli_sobrenome'=> $this->getCli_sobrenome(),
            ':cli_data_nasc'=> $this->getCli_data_nasc(),
            ':cli_rg'=> $this->getCli_rg(),
            ':cli_cpf'=> $this->getCli_cpf(),
            ':cli_ddd'=> $this->getCli_ddd(),
            ':cli_fone'=> $this->getCli_fone(),
            ':cli_celular'=> $this->getCli_celular(),
            ':cli_endereco'=> $this->getCli_endereco(),
            ':cli_numero'=> $this->getCli_numero(),
            ':cli_bairro'=> $this->getCli_bairro(),
            ':cli_cidade'=> $this->getCli_cidade(),
            ':cli_uf'=> $this->getCli_uf(),
            ':cli_cep'=> $this->getCli_cep(),
            ':cli_email'=> $this->getCli_email(),
            
            ':cli_id' => (int)$id
             
            
        );
        
        //echo $query;
        
        
        if($this->ExecuteSQL($query, $params)):
            return true;
        else:
            return false;
        endif;
        
        
    }
    
    
    
    /**
     * 
     * @param string verifica se o cpf exite ou não no banco
     * @return int total de dados
     */
    function GetClienteCPF($cpf){
       
        $query = "SELECT * FROM ".$this->prefix."clientes WHERE cli_cpf = :cpf ";
        
        $params = array(':cpf'=> $cpf);
        
        $this->ExecuteSQL($query, $params);
        return $this->TotalDados();
    }
    
     /**
     * 
     * @param string verifica se o email exite ou não no banco
     * @return int total de dados
     */
    function GetClienteEmail($email){
       
        $query = "SELECT * FROM ".$this->prefix."clientes WHERE cli_email = :email ";
        
        $params = array(':email'=> $email);
        
        $this->ExecuteSQL($query, $params);
        return $this->TotalDados();
    }
    
    
    function SenhaUpdate($senha,$email){
        
        $query = "UPDATE ".$this->prefix."clientes SET cli_pass = :senha WHERE cli_email = :email ";
        $this->setCli_senha($senha);
        $this->setCli_email($email);
        
        $params = array(':senha'=> $this->getCli_senha(), ':email'=> $this->getCli_email());
        //grava no banco o update
        $this->ExecuteSQL($query, $params);
    }

    /**
     * 
     * @return metodo get  retorna os dados dos clientes
     */
    function getCli_nome() {
        return $this->cli_nome;
    }

    function getCli_sobrenome() {
        return $this->cli_sobrenome;
    }

    function getCli_data_nasc() {
        return $this->cli_data_nasc;
    }

    function getCli_rg() {
        return $this->cli_rg;
    }

    function getCli_cpf() {
        return $this->cli_cpf;
    }

    function getCli_ddd() {
        return $this->cli_ddd;
    }

    function getCli_fone() {
        return $this->cli_fone;
    }

    function getCli_celular() {
        return $this->cli_celular;
    }

    function getCli_endereco() {
        return $this->cli_endereco;
    }

    function getCli_numero() {
        return $this->cli_numero;
    }

    function getCli_bairro() {
        return $this->cli_bairro;
    }

    function getCli_cidade() {
        return $this->cli_cidade;
    }

    function getCli_uf() {
        return $this->cli_uf;
    }

    function getCli_cep() {
        return $this->cli_cep;
    }

    function getCli_email() {
        return $this->cli_email;
    }

    function getCli_data_cad() {
        return $this->cli_data_cad;
    }

    function getCli_hora_cad() {
        return $this->cli_hora_cad;
    }

    function getCli_senha() {
        return $this->cli_senha;
    }

    /**
     * 
     * @param metodos set Verificar e tratar os valores
     */
    function setCli_nome($cli_nome) {
        //validando campo nome---------------------------------------------------------
        //$nome = filter_var($cli_nome,  FILTER_SANITIZE_STRING);// remove caractere e retorna string  realiza limpeza        
        if(strlen($cli_nome)<3):
            
            echo '<div class="alert alert-danger" id="erro_mostra">Digite seu nome  ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
            else:
             $this->cli_nome = $cli_nome;
        endif;
       
    }

    function setCli_sobrenome($cli_sobrenome) {
        //validando campo Sobre nome---------------------------------------------------------
        //$sobrenome = filter_var($cli_sobrenome,  FILTER_SANITIZE_STRING);// remove caractere e retorna string  realiza limpeza        
         if(strlen($cli_sobrenome)<3):
            
            echo '<div class="alert alert-danger" id="erro_mostra">Digite seu Sobre nome  ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
            else:
            $this->cli_sobrenome = $cli_sobrenome;
        endif;
       
    }

    function setCli_data_nasc($cli_data_nasc) {
        $this->cli_data_nasc = $cli_data_nasc;
    }

    function setCli_rg($cli_rg) {
        $this->cli_rg = $cli_rg;
    }

    //Validando CPF--------------------------------------------------------------------------
    function setCli_cpf($cli_cpf) {
        
        //Validar CPF:    CPF PARA TESTE: 21368854303------senha gravada para s97n71tz usuario Eduardo email eduardo27_minotauro@hotmail.com--------
        if(!Sistema::ValidarCPF($cli_cpf)):
            
            echo '<div class="alert alert-danger" id="erro_mostra">CPF incorreto  ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
            else:
             $this->cli_cpf = $cli_cpf;
            
        endif;
       
    }
    //validando ddd-------------------------------------------------------------------
    function setCli_ddd($cli_ddd) {
        
         // faz filtragem pegando somente numeros-------------------------------------
        $ddd = filter_var($cli_ddd,  FILTER_SANITIZE_NUMBER_INT);            
        if(strlen($ddd) !=2):
            
            echo '<div class="alert alert-danger" id="erro_mostra">DDD incorreto';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
           
            else:
           $this->cli_ddd = $cli_ddd;
        endif;
        
        
    }

    function setCli_fone($cli_fone) {
        $this->cli_fone = $cli_fone;
    }

    function setCli_celular($cli_celular) {
        $this->cli_celular = $cli_celular;
    }

    function setCli_endereco($cli_endereco) {
        $this->cli_endereco = $cli_endereco;
    }

    function setCli_numero($cli_numero) {
        $this->cli_numero = $cli_numero;
    }

    function setCli_bairro($cli_bairro) {
        $this->cli_bairro = $cli_bairro;
    }

    function setCli_cidade($cli_cidade) {
        $this->cli_cidade = $cli_cidade;
    }
    //validando Estado-------------------------------------------------------------
    function setCli_uf($cli_uf) {
        // faz filtragem pegando somente numeros-------------------------------------
        $uf = filter_var($cli_uf,  FILTER_SANITIZE_STRING);// remove caractere e retorna string  realiza limpeza         
        if(strlen($uf) !=2):
            
            echo '<div class="alert alert-danger" id="erro_mostra">UF incorreto';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
            else:
           $this->cli_uf = $cli_uf;
        endif;
        
       
    }
  //validando campo cep--------------------------------------------------------------
    function setCli_cep($cli_cep) {
        // faz filtragem pegando somente numeros-------------------------------------
        $cep = filter_var($cli_cep,  FILTER_SANITIZE_NUMBER_INT);            
        if(strlen($cep) !=8):
            
            echo '<div class="alert alert-danger" id="erro_mostra">CEP incorreto';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
            else:
            $this->cli_cep = $cli_cep;  
        endif;
       
    }
    //Verificação de email caso a validação do java script falhe--------------------------------
    function setCli_email($cli_email) {
        
        if(!filter_var($cli_email, FILTER_VALIDATE_EMAIL)):// retorna um false ou true não realiza limpeza
            
            echo '<div class="alert alert-danger" id="erro_mostra">Email incorreto ';
            Sistema::VoltarPagina();
            echo '</div>';
            exit();
            else:
             $this->cli_email = $cli_email;
        endif;
       
    }

    function setCli_data_cad($cli_data_cad) {
        $this->cli_data_cad = $cli_data_cad;
    }

    function setCli_hora_cad($cli_hora_cad) {
        $this->cli_hora_cad = $cli_hora_cad;
    }

    //Se precisar mudar o tipo de criptografia  sera necessario mexer somente aqui....
    function setCli_senha($cli_senha) {
        //O md5 vai criptografar a senha
        //$this->cli_senha = md5($cli_senha);        
        //$this->cli_senha = hash('SHA512', $cli_senha);// SHA512 e uma senha com 128 digitos
        $this->cli_senha = Sistema::Criptografia($cli_senha);
        
    
    }
}
