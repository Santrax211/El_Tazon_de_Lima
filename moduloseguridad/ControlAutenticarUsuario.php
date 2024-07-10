<?php
    class ControlAutenticarUsuario
    {
        public function verificaruser($login,$password)
        {
            session_start();
            include_once("../modelos/usuarios.php");
            $objUsuario = new usuarios();
            $respuesta = $objUsuario -> existeuser($login);
            if($respuesta)
            {
                $respuesta = $objUsuario -> existeuserpassword($login,$password);
               if($respuesta)
               {
                        $respuesta = $objUsuario -> userestado($login);
                        if($respuesta)
                        {
                            include_once("../modelos/usuarioprivilegios.php");
                            include_once("panelprincipal.php");
                            $objUP = new usuarioprivilegios();
                            $objPnel = new panelprincipal();
                            $listaprivilegios= $objUP -> getPrivilegios($login);
                            $_SESSION['login'] = $login;
                            $objPnel -> panelprincipalShow($listaprivilegios);
                        }
                        else
                        {
                            include_once("../shared/viewmensajesistema.php");
                            $objMensaje = new viewmensajesistema();
                            $objMensaje -> viewmensajesistemaShow("El usuario esta deshabilitado, contacte con el admin.",
                            "forbidden",
                            "Ir al inicio",
                            "../index.php");
                        }
               }
               else
               {
                include_once("../shared/viewmensajesistema.php");
                $objMensaje = new viewmensajesistema();
                $objMensaje -> viewmensajesistemaShow("Contrasena incorrecta, intente nuevamente",
                "warning",
                "Ir al inicio",
                "../index.php");
               }
            }
            else
            {
                include_once("../shared/viewmensajesistema.php");
                $objMensaje = new viewmensajesistema();
                $objMensaje -> viewmensajesistemaShow("Usuario no existe o incorrecto, intente nuevamente",
                "warning",
                "Ir al inicio",
                "../index.php");
            }
        }
    }
?>