<?php

function Validarbtnrestable($boton)
{
 return isset($boton);
 }

 function validarcorreo($email)
 {
    if (strpos($email, "@tazon.com") !== false) {
        $pos = strpos($email, '@');
        if ($pos !== false) {
            $parte_anterior = substr($email, 0, $pos);
            if (strlen($parte_anterior) >= 4 && ctype_alnum(substr($parte_anterior, 0, 3))) {
                return true; 
            }
        }
    }
     return false;
 }

function validarbtnpregunta($btnp)
{
 return isset($btnp);
 }

 function validarespuestaclave($respuestaclave)
 {
    
     if (strlen($respuestaclave) > 3 && strpos($respuestaclave, ' ') === false) {
         return true;
     }
     return false;
 }

 function validarbtncambiarcontra($btnc)
 {
  return isset($btnc);
  }
 
  function validarcamposcontra($contranueva, $confirmarcontra)
  {
     
    if (strlen($contranueva) >= 3 && $contranueva === $confirmarcontra) {
        return true;
    }
    return false;
  }

 include_once("Controlrestablecercontra.php");
 $objControl = new Controlrestablecercontra();
 
 
 if (Validarbtnrestable($_POST['btnrestablecer'])) {
     $email = strtolower(trim($_POST['txtcorreo']));
     if (validarcorreo($email)) {
         $objControl->verificaremail($email);
     } else {
         include_once("../shared/viewmensajesistema.php");
         $objMensaje = new viewmensajesistema();
         $objMensaje->viewmensajesistemaShow("El correo ingresado no es valido", 
         "warning",
         "Ir al inicio",
         "../index.php");
     }
 } else if (validarbtnpregunta($_POST['btnpregunta']) && isset($_SESSION['correo'])) {
     $respuestaclave = strtolower(trim($_POST['txtpregunta']));
     if (validarespuestaclave($respuestaclave)) {
         $objControl->verificarespuesta($respuestaclave);
     } else {
         include_once("../shared/viewmensajesistema.php");
         $objMensaje = new viewmensajesistema();
         $objMensaje->viewmensajesistemaShow("La respuesta clave ingresada no es valida", 
         "warning",
         "Ir al inicio",
         "../index.php");
     }
 }else if (validarbtncambiarcontra($_POST['btncambiarcontra']) && isset($_SESSION['correo'])) {
     $contranueva = strtolower(trim($_POST['txtcontranueva']));
     $confirmarcontra = strtolower(trim($_POST['txtconfirmarcontra']));
     if (validarcamposcontra($contranueva,$confirmarcontra)) {
         $objControl->actualizarcontra($contranueva);
     } else {
         include_once("../shared/viewmensajesistema.php");
         $objMensaje = new viewmensajesistema();
         $objMensaje->viewmensajesistemaShow("Las contrasenas no son iguales o no son validas, ingrese la contrasena y verifique que sean iguales.", 
         "warning",
         "Ir al inicio",
         "../index.php");
     }
 }  else {
     include_once("../shared/viewmensajesistema.php");
     $objMensaje = new viewmensajesistema();
     $objMensaje->viewmensajesistemaShow("ACCESO DENEGADO", 
      "forbidden",
      "Ir al inicio",
      "../index.php");
 }
 ?>


