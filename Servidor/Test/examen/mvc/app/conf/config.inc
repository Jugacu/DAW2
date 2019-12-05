<?php
/* configuraciones comunes a la aplicación */
class configuracion
{
  private $dbParams = []; /*Vector con parámetros de configuración del SGBD */

  public function __construct()
  {
    $this->dbParams = [
      "driver" => "mysql", //no utilizada realmente
      "server" => "127.0.0.1", //nombre servidor
      "port" => "3306", //puerto por el que escucha las peticiones de la aplicación
      "database" => "goyo", //nombre de la base de datos
      "user" => "root", //usuario definido para la aplicación
      "pass" => "rootroot", //contraseña del usuario
      "charset" => "utf-8"
    ]; //conjunto de caracteres
  }

  public function getDbParams(): array
  {
    return $this->dbParams;
  }
}
