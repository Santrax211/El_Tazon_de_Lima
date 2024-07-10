<?php
session_start();
class Controlrestablecercontra
{ 
    public function verificaremail($email)
    {
        $_SESSION['correo'] = $email; // Almacenar el correo en la sesión
        
        include_once("../modelos/usuarios.php");
        $objUsuario = new usuarios();
        $respuesta = $objUsuario -> validarcorreoBD($email);
        if($respuesta)
        {
                include_once("formpreguntaclave.php");
                $form = new formpreguntaclave();
                $form -> formpreguntaclaveShow();
        }
        else
        {
                include_once("../shared/viewmensajesistema.php");
                $objMensaje = new viewmensajesistema();
                $objMensaje -> viewmensajesistemaShow("El correo no existe, intente nuevamente",
                "warning",
                "Ir al inicio",
                "../index.php");
        }
    }

    public function verificarespuesta($respuestaclave)
    {
        if (isset($_SESSION['correo'])) {
            $correo = $_SESSION['correo'];
            include_once("../modelos/usuarios.php");
            $objUsuario = new usuarios();
    
            $respuestaclave = $objUsuario->validarespuestaclaveBD($correo, $respuestaclave);
            if ($respuestaclave) {
                include_once("formcontranueva.php");
                $form = new formcontranueva();
                $form->formcontranuevaShow();
            } else {
                include_once("../shared/viewmensajesistema.php");
                $objMensaje = new viewmensajesistema();
                $objMensaje->viewmensajesistemaShow("La respuesta es incorrecta, intente nuevamente", 
                "warning",
                "Ir al inicio",
                "../index.php");
            }
        } else {
            include_once("../shared/viewmensajesistema.php");
            $objMensaje = new viewmensajesistema();
            $objMensaje->viewmensajesistemaShow("Error: No se recibio el correo electronico", "<a href='../index.php'>Ir al inicio</a>");
        }
    }

    public function actualizarcontra($contranueva)
    {
        if (isset($_SESSION['correo'])) {
            $correo = $_SESSION['correo'];
            include_once("../modelos/usuarios.php");
            $objUsuario = new usuarios();
    
            $respuestacontra = $objUsuario->ingresarcontranuevaBD($correo, $contranueva);
            if ($respuestacontra) {
                include_once("../shared/viewmensajesistema.php");
                $objMensaje = new viewmensajesistema();
                $objMensaje -> viewmensajesistemaShow("Su contrasena fue actualizada",
                "success",
                "Ir al inicio",
                "../index.php");
            } else {
                include_once("../shared/viewmensajesistema.php");
                $objMensaje = new viewmensajesistema();
                $objMensaje->viewmensajesistemaShow("Hubo un problema en la insercion, contacte con el administrador", 
                "warning",
                "Ir al inicio",
                "../index.php");
            }
        } else {
            include_once("../shared/viewmensajesistema.php");
            $objMensaje = new viewmensajesistema();
            $objMensaje->viewmensajesistemaShow("Error: No se recibio el correo electrónico", "<a href='../index.php'>Ir al inicio</a>");
        }
    }
}
?>
