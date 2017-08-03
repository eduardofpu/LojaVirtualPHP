<?php

/**
 * Description of login
 *
 * @author Eduardo
 */
class Login extends Conexao {

    private $user, $senha,$email;

    function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @param string $user
     * @param strin $senha
     */
    function GetLogin($user, $senha) {

        $this->setUser($user);
        $this->setSenha($senha);
        $query = "SELECT * FROM " . $this->prefix . "clientes WHERE cli_email = :email AND cli_pass = :senha";
        $params = array(':email' => $this->getUser(), ':senha' => $this->getSenha());

        $this->ExecuteSQL($query, $params);

        //caso o login foi feito com sucesso
        if ($this->TotalDados() > 0):

            $lista = $this->ListarDados();

            $_SESSION['CLI']['cli_id'] = $lista['cli_id'];
            $_SESSION['CLI']['cli_nome'] = $lista['cli_nome'];
            $_SESSION['CLI']['cli_sobrenome'] = $lista['cli_sobrenome'];
            $_SESSION['CLI']['cli_endereco'] = $lista['cli_endereco'];
            $_SESSION['CLI']['cli_numero'] = $lista['cli_numero'];
            $_SESSION['CLI']['cli_bairro'] = $lista['cli_bairro'];
            $_SESSION['CLI']['cli_cidade'] = $lista['cli_cidade'];
            $_SESSION['CLI']['cli_uf'] = $lista['cli_uf'];
            $_SESSION['CLI']['cli_cep'] = $lista['cli_cep'];
            $_SESSION['CLI']['cli_cpf'] = $lista['cli_cpf'];
            $_SESSION['CLI']['cli_rg'] = $lista['cli_rg'];
            $_SESSION['CLI']['cli_ddd'] = $lista['cli_ddd'];
            $_SESSION['CLI']['cli_fone'] = $lista['cli_fone'];
            $_SESSION['CLI']['cli_celular'] = $lista['cli_celular'];
            $_SESSION['CLI']['cli_email'] = $lista['cli_email'];
            $_SESSION['CLI']['cli_pass'] = $lista['cli_pass'];
            $_SESSION['CLI']['cli_data_nasc'] = $lista['cli_data_nasc'];
            $_SESSION['CLI']['cli_data_cad'] = $lista['cli_data_cad'];
            $_SESSION['CLI']['cli_hora_cad'] = $lista['cli_hora_cad'];


            //apos passar valores atualiza a pagina            
            Rotas::Redirecionar(3, Rotas::pag_ClienteLogin());

            echo ' 
            <center>
            <div class="">
              <img src="view/images/barradeprogresso.gif"> <b></b>
             </div>
             </center>
        
       ';


        // echo 'logado com sucesso';
        //caso o login seja incorreto
        else:
            //  echo 'login não foi efetivado';  

            echo '<h4 class="alert alert-danger"> login incorreto</h4>';

            Rotas::Redirecionar(1, Rotas::pag_ClienteLogin());
        endif;
    }

    /**
     * Faz logoff do usuario
     */
    static function Logoff() {
        unset($_SESSION['CLI']); // VAI LIMPAR TUDO QUE ESTIVER NA FUNÇÃO CLI

        echo ' 
            
       <div class="">
         <img src="view/images/progresso.gif"> <b>Saindo...</b>
         </div> 
        
       ';

        Rotas::Redirecionar(3, Rotas::get_SiteHOME()); // VOLTA PARA PAGINA INICIAL
    }

    /**
     * 
     * @return mostra um bloco de clientes logados
     */
    static function MenuClientes() {


        //Verifico se esta logado
        if (!self::Logado()):
            self::AcessoNegado();
            Rotas::Redirecionar(2, Rotas::pag_ClienteLogin()); // obriga o redirecionamento para login
            exit();
            
            
            
        //Caso esteja mostra a tela minhaconta
        else:


            $smarty = new Template();
            $smarty->assign('PAG_CONTA', Rotas::pag_ClienteConta());
            $smarty->assign('PAG_CARRINHO', Rotas::pag_Carrinho());
            $smarty->assign('PAG_LOGOFF', Rotas::pag_Logoff());
            $smarty->assign('PAG_CLIENTES_PEDIDOS', Rotas::pag_ClientePedidos());
            $smarty->assign('PAG_CLIENTES_DADOS', Rotas::pag_ClienteDados());
            $smarty->assign('PAG_CLIENTES_SENHA', Rotas::pag_ClienteSenha());
            $smarty->assign('USER', $_SESSION['CLI']['cli_nome']);


            $smarty->display('menucliente.tpl');
        endif;
    }
    

    /**
     * 
     * @return boolean se esta logado ou não
     */
    static function Logado() {

        if (isset($_SESSION['CLI']['cli_email']) && isset($_SESSION['CLI']['cli_id'])):

            return TRUE;

        else:
            return FALSE;
        endif;
    }

    /**
     * mostra aviso para fazer login e botao
     */
    static function AcessoNegado() {
        echo '<div class="alert alert-danger"><a href="' . Rotas::pag_ClienteLogin() . ''
        . '" class="btn btn-danger">Login</a> Acesso negado. Faça login</di>';
    }
    
    
    /**
     * 
     * @param type $user
     * @param type $senha LOGIN COM ADM--------------------------------------
     */
    function GetLoginADM($email, $senha) {

        $this->setEmail($email);
        $this->setSenha($senha);
        $query = "SELECT * FROM ". $this->prefix ."user WHERE user_email = :email AND user_pw = :senha";
        $params = array(':email' => $this->getEmail(), ':senha' => $this->getSenha());

        $this->ExecuteSQL($query, $params);

        //caso o login foi feito com sucesso
        if ($this->TotalDados() > 0):

            $lista = $this->ListarDados();

            $_SESSION['ADM']['user_id'] = $lista['user_id'];
            $_SESSION['ADM']['user_nome'] = $lista['user_nome'];
            $_SESSION['ADM']['user_email'] = $lista['user_email'];
            $_SESSION['ADM']['user_pw'] = $lista['user_pw'];            
            $_SESSION['ADM']['user_data'] = Sistema::DataAtualBR();
            $_SESSION['ADM']['user_hora'] = Sistema::HoraAtual();
                       
            //echo '<center><div class=""><img src="../view/images/barradeprogresso.gif"> <b></b></div></center> ';
                   
            return TRUE;
        //caso o login seja incorreto
        else:
            //  echo 'login não foi efetivado';  

            echo '<h4 class="alert alert-danger"> login incorreto</h4>';

           return FALSE;
            
        endif;
    }
    
    
    /**
     * 
     * @return boolean se O ADM esta logado ou não
     */
    static function LogadoADM() {

        if (isset($_SESSION['ADM']['user_email']) && isset($_SESSION['ADM']['user_id'])):

            return TRUE;

        else:
            return FALSE;
        endif;
    }
    
    /**
     * Faz logoff do usuario
     */
    static function LogoffADM() {
        unset($_SESSION['ADM']); // VAI LIMPAR TUDO QUE ESTIVER NA FUNÇÃO CLI

        echo '<center><div class="alert alert-info"> <img src="../view/images/progresso.gif"> <b>Saindo...</b></div></center>';

        Rotas::Redirecionar(3, 'login.php'); // VOLTA PARA PAGINA INICIAL
    }
    
    
    

    private function setUser($user) {
        $this->user = $user;
    }

    private function setSenha($senha) {
        //$this->senha = md5($senha);        
        //$cliente = new Clientes();
        //$cliente->setCli_senha($senha);        
        //$this->senha =  $cliente->getCli_senha();
        $this->senha = Sistema::Criptografia($senha);
        
        
    }

    function getUser() {
        return $this->user;
    }

    function getSenha() {
        return $this->senha;
    }
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }



}
