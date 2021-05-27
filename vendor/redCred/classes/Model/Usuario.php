<?php  namespace Model{


class Usuario {

    private $usuarioId;
    private $senha;
    private $login;
    private $pessoa;
    private $dataCriacao;




    public function getUsuarioId(){
        return $this->usuarioId;
    }

    
    public function getSenha(){
        return $this->senha;
    }
    

    public function getLogin(){
        return $this->login;
    }

    public function getDataCriacao(){
        return $this->dataCriacaoa;
    }

    public function getPessoa(){
        return $this->pessoa;
    }


    public function setUsuarioId($usuarioId){
         $this->usuarioId = $usuarioId;
    }

    
    public function setSenha($senha){
         $this->senha = $senha;
    }
    

    public function setLogin($login){
         $this->login = $login ;
    }

    public function setDataCriacao($dataCriacao){
         $this->dataCriacao = $dataCriacao;
    }

    public function setPessoa($pessoa){
         $this->pessoa = $pessoa;
    }


    public static function verificaSession(){


        
        if(!isset($_SESSION['usuario'])){
            header("Location:/admin");
            exit;
        }
    }


    public static function getSession(){


        
        if(isset($_SESSION['usuario'])){
           
            return $_SESSION['usuario'];
        }
    }


    public static function removeSession(){
        
        unset($_SESSION['usuario']);
            header("Location:/admin");
            exit;
        
    }


}

}

?>