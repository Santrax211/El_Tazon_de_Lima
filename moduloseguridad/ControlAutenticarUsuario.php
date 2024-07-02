<?php
    class ControlAutenticarUsuario
    {
        public function verificaruser($login,$password)
        {
            session_start();
            include_once("../modelos/usuario.php");
            $objUsuario = new usuario();
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
                            //session_start();
                            $_SESSION['login'] = $login;
                            $objPnel -> panelprincipalShow($listaprivilegios);
                        }
                        else
                        {
                            include_once("../shared/viewmensajesistema.php");
                            $objMensaje = new viewmensajesistema();
                            $objMensaje -> viewmensajesistemaShow("El usuario esta deshabilitado, contacte con el admin.","<a href='../index.php'>Ir al inicio</a>");
                        }
               }
               else
               {
                include_once("../shared/viewmensajesistema.php");
                $objMensaje = new viewmensajesistema();
                $objMensaje -> viewmensajesistemaShow("Contraseña incorrecta, intente nuevamente","<a href='../index.php'>Ir al inicio</a>");
               }
            }
            else
            {
                include_once("../shared/viewmensajesistema.php");
                $objMensaje = new viewmensajesistema();
                $objMensaje -> viewmensajesistemaShow("Usuario no existe o incorrecto, intente nuevamente","<a href='../index.php'>Ir al inicio</a>");
            }
        }
    }
?>