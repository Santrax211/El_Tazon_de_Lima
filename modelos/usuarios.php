<?php
include_once('conexion.php');
require_once('../PasswordHash.php');

class usuarios extends conexion
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
   public function existeuserpassword($login, $password)
{
    $this->conectarBD();
    $consulta = "SELECT password FROM usuarios WHERE login = '$login'";
    $resultado = mysql_query($consulta);
    $fila = mysql_fetch_assoc($resultado);

    $this->desConectarBD();

    if ($fila) {
        $hashGuardado = $fila['password'];
        $hasher = new PasswordHash(8, false); 
        $verificado = $hasher->CheckPassword($password, $hashGuardado);

        if ($verificado) {
            return 1; 
        } else {
            return 0; 
        }
    }

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

   public function validarcorreoBD($email)
   {
    $this->conectarBD();
    $consulta = "SELECT correo FROM usuarios WHERE correo = '$email' ";
    $resultado = mysql_query($consulta);
    $linea = mysql_num_rows($resultado);
    $this->desConectarBD();
    if($linea == 1)
       return 1;
     else
       return 0;
   }

   public function validarespuestaclaveBD($email, $respuestaclave)
   {
    $this->conectarBD();
    $consulta = "SELECT pregunta_clave FROM usuarios WHERE correo = '$email' AND pregunta_clave = '$respuestaclave'";
    $resultado = mysql_query($consulta);
    $linea = mysql_num_rows($resultado);
    $this->desConectarBD();
    if($linea == 1)
       return 1;
     else
       return 0;
   }
   public function ingresarcontranuevaBD($email, $contranueva)
   {
       $this->conectarBD();
       
       $hasher = new PasswordHash(8, false); 
       $contranueva_encriptada = $hasher->HashPassword($contranueva);

       $consulta = "UPDATE usuarios SET password = '$contranueva_encriptada' WHERE correo = '$email'";
       $resultado = mysql_query($consulta);

       $this->desConectarBD();

       if ($resultado) {
           return 1; 
       } else {
           return 0;
       }
   }

}
?>