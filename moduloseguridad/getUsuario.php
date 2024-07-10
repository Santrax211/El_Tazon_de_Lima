<?

function validarbotons($boton)
{
    return isset($boton);
}
function validarcampo($login, $password)
{
    if(strlen(trim($login))>3 and strlen($password)>3)
       return 1;
    else
      return 0;
}

if (validarbotons($_POST['btningresar'])) {
    $login = strtolower(trim($_POST['txtusuario']));
    $password = trim($_POST['txtcontra']);
    if (validarcampo($login, $password)) {
      include_once("ControlAutenticarUsuario.php");
        $objControl = new ControlAutenticarUsuario();
        $objControl->verificaruser($login, $password);
    } else {
    include_once("../shared/viewmensajesistema.php");
        $objMensaje = new viewmensajesistema();
        $objMensaje->viewmensajesistemaShow("Los datos ingresados no son válidos", 
        "warning",
        "Ir al inicio",
        "../index.php");
    }
} else {
    include_once("../shared/viewmensajesistema.php");
    $objMensaje = new viewmensajesistema();
    $objMensaje->viewmensajesistemaShow("ACCESO DENEGADO", 
    "forbidden",
    "Ir al inicio",
    "../index.php");
}
?>
