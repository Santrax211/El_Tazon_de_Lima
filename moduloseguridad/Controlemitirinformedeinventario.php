<?php
session_start();
include_once('../modelos/categorias.php');
include_once('../modulologistica/formprodsecosyenlatados.php');
include_once('../modulologistica/formeditprodsecosyenlatados.php');

class Controlemitirinformedeinventario {
    public function categorias() {
        $modeloCategorias = new categorias();
        $categorias = $modeloCategorias->obtenerCategorias();

        $vista = new emitirinformedeinventario();
        $vista->emitirinformedeinventarioShow($categorias);
    }

    public function obtenerProductosSyE() {
        $modeloCategorias = new categorias();
        $productosSecosYEnlatados = $modeloCategorias->obtenerProductosSecosYEnlatados(); 
       
        $vista = new formprodsecosyenlatados();
        $vista->formprodsecosyenlatadosShow($productosSecosYEnlatados);
    }

    public function actualizarProductosSyE($cantidades, $fechasVencimiento) {
        $modeloCategorias = new categorias();
        $productos = $modeloCategorias->obtenerProductosSecosYEnlatados();
    
        foreach ($productos as $producto) {
            $codigo = $producto['codigo'];
            $cantidadAnterior = $producto['cantidad'];
            $fechaVencimientoAnterior = $producto['fechavencimiento'];
            $nuevaCantidad = isset($cantidades[$codigo]) ? (int)$cantidades[$codigo] : $producto['cantidad'];
            $nuevaFechaVencimiento = isset($fechasVencimiento[$codigo]) ? $fechasVencimiento[$codigo] : $producto['fechavencimiento'];
            
            if ($cantidadAnterior>=0 && $nuevaFechaVencimiento!==NULL ){
                $objMensaje = new viewmensajesistema();
                $objMensaje->viewmensajesistemaShow(
                    "No puedes editar un campo que no tenía fecha de vencimiento previamente.",
                    "forbidden",
                    "Intenta de nuevo",
                    "../modulologistica/formeditprodsecosyenlatados.php"
                );
                return; 
            }
            if (is_null($fechaVencimientoActual) && !is_null($nuevaFechaVencimiento)) {
                $objMensaje = new viewmensajesistema();
                $objMensaje->viewmensajesistemaShow(
                    "No puedes editar un campo que no tenía fecha de vencimiento previamente.",
                    "forbidden",
                    "Intenta de nuevo",
                    "../modulologistica/formeditprodsecosyenlatados.php"
                );
                return; 
            } else {
                $modeloCategorias->actualizarProducto($codigo, $nuevaCantidad, $nuevaFechaVencimiento);
            }
        }
    }
    
    public function mostrarFormularioEdicion() {
        $modeloCategorias = new categorias();
        $productosSecosYEnlatados = $modeloCategorias->obtenerProductosSecosYEnlatados();

        $vista = new formeditprodsecosyenlatados();
        $vista->formeditprodsecosyenlatadosShow($productosSecosYEnlatados);
    }
}

?>
