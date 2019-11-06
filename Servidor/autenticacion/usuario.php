<?php
class Usuario
{
  private $usuario=null;
  private $pwd = false;

  public function __construct(array $datos){
    include 'UsuarioException.inc';
    if(!$this->setUsuario($datos['usu'])){
      throw new UsuarioException('Usuario o contraseña incorretos');
    }
    if(!$this->setPwd($datos['pwd'])){
      throw new UsuarioException('Usuario o contraseña incorretos');
    }
  }

  public function getUsuario(){
    return $this->usuario;
  }

  private function getPwd(){
    return $this->pwd;
  }

  public function setUsuario(string $usu):bool{
    if(strlen($usu)<4){
      return false;
    }
    $this->usuario = $usu;
    return true;
  }

  public function setPwd(string $pwd):bool{
    $expreg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/";
    if(!preg_match($expreg, $pwd)){
      return false;
    }
    return true;//$this->pwd=password_hash($pwd,PASSWORD_DEFAULT);
  }

  public function compruebaPwd(string $pwd, string $hash):bool{
    return password_verify($this->pwd, $pwd);
  }
}
