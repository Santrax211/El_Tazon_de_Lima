<?php
include_once('conexion.php');

class categorias extends conexion {
    public function obtenerCategorias() {
        $this->conectarBD();
        
        $query = "SELECT idcategoria, nombre, pathcategoria FROM categorias";
        $resultado = mysql_query($query);

        if (!$resultado) {
            die('Error en la consulta: ' . mysql_error());
        }

        $categorias = array();
        while ($fila = mysql_fetch_assoc($resultado)) {
            $categorias[] = $fila;
        }

        mysql_free_result($resultado);
        $this->desConectarBD();

        return $categorias;
    }
    public function obtenerProductosSecosYEnlatados() {
        $this->conectarBD();
        $query = "SELECT * FROM productos 
                  INNER JOIN categoria_producto ON productos.codigo = categoria_producto.codigo
                  WHERE categoria_producto.idcategoria = 1
                  ORDER BY productos.codigo";
        $resultado = mysql_query($query);
    
        if (!$resultado) {
            die('Error en la consulta: ' . mysql_error());
        }
        $productos = array();
        while ($fila = mysql_fetch_assoc($resultado)) {
            $productos[] = $fila;
        }
    
        mysql_free_result($resultado);
        $this->desConectarBD();
        return $productos;
    }

    public function actualizarProducto($codigo, $cantidad, $fechavencimiento) {
        $this->conectarBD();
        $query = "UPDATE productos SET 
                  cantidad = '$cantidad', 
                  fechavencimiento = '$fechavencimiento' 
                  WHERE codigo = '$codigo'";
        $resultado = mysql_query($query);
        if (!$resultado) {
            die('Error en la actualización: ' . mysql_error());
        }

        $this->desConectarBD();
    }
   
}
?>
