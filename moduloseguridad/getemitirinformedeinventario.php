<?php
session_start();
function validarbtnedit($boton) {
    return isset($boton);
}

function validarcategory($botons){
    return isset($botons);
}

include_once("../shared/viewmensajesistema.php");
include_once("Controlemitirinformedeinventario.php");


if (validarcategory($_POST['nombre_categoria'])) {
    $nombre_categoria = $_POST['nombre_categoria'];
    $path = $_POST['pathcategoria'];
    $idcategoria = $_POST['idcategoria'];

    if ($idcategoria == 1) {
        $objControl = new Controlemitirinformedeinventario();
        $productos=$objControl->obtenerProductosSyE();
    } elseif ($idcategoria == 2) {
    } 
    exit();
} else if (validarbtnedit($_POST['btn_editar'])) {
    $objControl = new Controlemitirinformedeinventario();
    $objControl->mostrarFormularioEdicion();
}else if (validarbtnedit($_POST['btn_guardar'])) {
    $objControl = new Controlemitirinformedeinventario();
    $cantidades = $_POST['cantidad'];
    $fechasVencimiento = $_POST['fechavencimiento'];
    $objControl->actualizarProductosSyE($cantidades,$fechasVencimiento); 
} else {
    $objMensaje = new viewmensajesistema();
    $objMensaje->viewmensajesistemaShow("ACCESO DENEGADO", 
        "forbidden",
        "Ir al inicio",
        "../index.php");
    exit();
}
?>

