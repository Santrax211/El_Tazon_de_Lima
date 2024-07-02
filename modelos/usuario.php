<?php
include_once('conexion.php');
class usuario extends conexion
{
   public function existeuser($login)
   {
       $this->conectarBD();
       $consulta = "SELECT login FROM usuarios WHERE login = '$login' ";
       $resultado = mysql_query($consulta);
       $linea = mysql_num_rows($resultado);
       $this->desConectarBD();
       if($linea == 1)
          return 1;
        else
          return 0;
   }
   public function existeuserpassword($login,$password)
   {
    $this->conectarBD();
    $consulta = "SELECT login FROM usuarios WHERE login = '$login' AND password='$password' ";
    $resultado = mysql_query($consulta);
    $linea = mysql_num_rows($resultado);
    $this->desConectarBD();
    if($linea == 1)
       return 1;
     else
       return 0;
   }
   public function userestado($login)
   {
    $this->conectarBD();
    $consulta = "SELECT estado FROM usuarios WHERE login = '$login' ";
    $resultado = mysql_query($consulta);
    $this->desConectarBD();
    $linea = mysql_fetch_array($resultado);
    if($linea[0] == 1)
       return 1;
     else
       return 0;
   }
}
?>