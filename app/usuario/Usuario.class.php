<?php
namespace App\usuario\usuario;

//session_start();

use Source\support\Helpers;

$raiz = "../../";
require_once("../../source/support/config.php");

class Usuario{
    public $id;
    public $nomeCompleto;
    public $username;
    public $email;
    public $senha;


    // public function __construct()
    // {
    //     $this->conection = new \Source\support\conection\Conection();
    // }
    // public function __destruct()
    // {
    //     $this->conection = null;
    // }
        
        

    //LOGIN TRAS NOME DE USUARIO OU EMAIL
    public function load($login, $senha){
        global $pdo;
        
        $senha = base64_encode($senha);
        //$senha = base64_decode('1234');
        //phpinfo();

        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE username = :username AND senha = :senha");    
        $stmt->bindValue(":username", $login);
        $stmt->bindValue(":senha", $senha);
        //var_dump($stmt); die;
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $usuario = $stmt->fetch();
            $_SESSION['idUsuario'] = $usuario->idUsuario;
            $primeiroNome = explode(" ", $usuario->nomeCompleto);
            $_SESSION['nomeUsuario'] = $primeiroNome[0];
            return true;
        }

        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
        $stmt->bindValue(":email", $login);
        $stmt->bindValue(":senha", $senha);

        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $usuario = $stmt->fetch();
            $_SESSION['idUsuario'] = $usuario->idUsuario;
            $primeiroNome = explode(" ", $usuario->nomeCompleto);
            $_SESSION['nomeUsuario'] = $primeiroNome[0];
            return true;
        }
        return false;
    }
    

    public function update($id){

    }

    public function delete($id){

    }
    
    public function insert($nomeCompleto, $username, $email, $senha){
        global $pdo;
        //var_dump($nomeCompleto, $username, $email, $senha); die;
        if(!$this->validaInsert($nomeCompleto, $username, $email, $senha)){
            return false;
        }
        
        $stmt = $pdo->prepare("INSERT INTO usuario 
        (nomeCompleto, username, email, senha)
        VALUES(:nomeCompleto, :username, :email, :senha)");

        $stmt->bindValue(":nomeCompleto", $this->nomeCompleto);
        $stmt->bindValue(":username", $this->username);
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":senha", $this->senha);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //valida e filtra os campos de cadastro
    public function validaInsert($nomeCompleto, $username, $email, $senha){
        global $pdo;
        global $nomeCompleto;
        if(Helpers::validaCampo255($_POST["nomeCompleto"])){
            $nomeCompleto = htmlspecialchars($_POST["nomeCompleto"], ENT_QUOTES, 'UTF-8');
        }else{
            $_SESSION["msgErro"] = "O campo de nome aceita apenas 255 caracteres!";
            return false;
        }

        if (Helpers::validaCampo255($_POST["username"])) {
            $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
        }else{
            $_SESSION["msgErro"] = "O campo de Nome de Usuário aceita apenas 255 caracteres!";
            return false;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION["msgErro"] = "E-mail inválido!";
            return false;
        }

        if(!Helpers::validaSenha($senha)) {
            $_SESSION["msgErro"] = "Sua senha deve conter entre 4 à 100 caracteres!";
            return false;
        }
        
        $senha = base64_encode(htmlspecialchars($senha, ENT_QUOTES, 'UTF-8'));

        $stmt = $pdo->prepare("SELECT idUsuario FROM usuario WHERE username = :username");    
        $stmt->bindValue(":username", $username);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $_SESSION['msgErro'] = VAL_USUARIO_CADASTRO_USERNAME_JA_EXISTE;
            return false;
        }

        $stmt = $pdo->prepare("SELECT idUsuario FROM usuario WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $_SESSION['msgErro'] = "Este email já está cadastrado!";
            return false;
            return VAL_USUARIO_CADASTRO_EMAIL_JA_EXISTE;
        }
        $this->nomeCompleto = $nomeCompleto;
        $this->username = $username;
        $this->email= $email;
        $this->senha = $senha;
        
        return true;
    }

}
