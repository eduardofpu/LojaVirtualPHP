<?php


/**
 * Description of User
 *
 * @author Eduardo
 */
class User extends Conexao{
    private $user,$senha,$email;
    function __construct() {
        parent::__construct();
    }
    
    /**
     * retorna o usuario
     */
    function GetUserEmail($email){
        
        $query =" SELECT * FROM ".$this->prefix."user WHERE user_email = :email";
        
        $params = array(':email'=> $this->getEmail());
        
        if($this->ExecuteSQL($query, $params)):
            return TRUE;
        else:
            return FALSE;
        endif;
        
        return $this->TotalDados();
        
    }
    
    /*
     * Alterar a senha
     */
    function AlterarSenha($senha,$email){
        
        $this->setSenha($senha);
        $this->setEmail($email);
        
        $query ="UPDATE ".$this->prefix."user SET user_pw = :senha WHERE user_email = :email";
        
        $params = array(':senha'=> $this->getSenha(),':email'=> $this->getEmail());
        
        if($this->ExecuteSQL($query, $params)):
            return TRUE;
        
        else:
            
            return FALSE;
        endif;
        
    }
    



    //Getter e seters--------------------------------------------------------
    function getUser() {
        return $this->user;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setSenha($senha) {
        $this->senha = Sistema::Criptografia($senha);
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
