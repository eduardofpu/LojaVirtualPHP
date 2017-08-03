    <?php

/**
 * Description of Config
 * armazena diversas informações do sistema/loja
 * @author Eduardo
 */
class Config {
    
    /*** Informações de banco de dados  */
    
  // const : não precisa usar $ exemplo $BD_HOST basta colocar BD_HOST                  
  const BD_HOST = "localhost",
        BD_USER = "root",
        BD_SENHA = "",
        BD_BANCO = "miniloja2017",      
        BD_PREFIXO = "as_",
        BD_LIMITE_POR_PAG = 6;

    /*** Informações do site  */
    
    /*** url do site */
    const SITE_URL = "http://localhost";
    /*** pasta padrão do site  */
    const SITE_PASTA = "loja";
    /*** Nome do site  */
    const SITE_NOME = "Mini Loja PHP 2017";
    /*** Email do Administrador do site  */
    const SITE_EMAIL_ADM = "eduardoeanaempreendedores@gmail.com";
    
    /*** DADOS DE ENDEREÇO FISICO DA LOJA*/
     const SITE_ENDERECO = "";
     /*** DADOS DE ENDEREÇO FISICO DA LOJA*/
     const SITE_FONE = "";
    
    /*** DADOS DE ENDEREÇO FISICO DA LOJA*/
     const SITE_CEP = "14940000";
    
    /*** Dados do servidor de email */
                       // Atenção e importante desabilitar no gmail email por outros dispositivos...
     
      const EMAIL_HOST = "smtp.gmail.com"; //smtp.gmail.com hotmail: smtp-mail.outlook.com
      const EMAIL_USER = "eduardoeanaempreendedores@gmail.com";//Meu email administrador 
      const EMAIL_NOME = "Contato Loja 2017"; //Nome do remetente   
      const EMAIL_SENHA = "cubomagico";
      const EMAIL_PORTA = 587;//
      const EMAIL_SMTPAUTH = "true";
      const EMAIL_SMTPSECURE = "tls";//tls 587   sll 465
      const EMAIL_COPIA = "hackereduuna@gmail.com";//copia para esse email
      
      
      // Dados do pgo seguro-------------------------------------------------------------------------------------
      const PS_EMAIL = "eduardoeanaempreendedores@gmail.com";// seu email do pague seguro
      const PS_TOKEN = "82C1B277EDF34EC999AC028435B9E27D";// seu token do pague seguro
      const PS_TOKEN_SBX= "B50F23FB383D44D59E01C21D91041F93";//seu token do sandbox
      //production para tempo real / sandbox para teste----------------------------------------------------------      
      //const PS_AMBIENTE = "production";// tempo real
      const PS_AMBIENTE = "sandbox";//sandbox para teste
     
     
      
    
    
    
}
