<?php
include_once('../shared/vista.php');
include_once('../moduloseguridad/Controlemitirinformedeinventario.php');

class formeditprodsecosyenlatados extends vista {
    public function formeditprodsecosyenlatadosShow($productos) {
        $this->getCabecera("Editar Productos Secos y Enlatados");
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Productos Secos y Enlatados</title>
            <link rel="stylesheet" href="../assets/stylestablas.css">
        </head>
        <body>
            <div class="container">
                <header>
                    <img src="../img/logo.png" alt="Logo" class="logo">
                    <h1>EDITAR PRODUCTOS SECOS Y ENLATADOS</h1>
                </header>
                <main>
                    <form method="POST" action="../moduloseguridad/getemitirinformedeinventario.php">
                        <table border="1" cellpadding="5" cellspacing="0">
                            <tr>
                                <th>CÓDIGO</th>
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>LÍMITE</th>
                                <th>FECHA DE VENCIMIENTO</th>
                            </tr>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?php echo $producto['codigo']; ?></td>
                                    <td><?php echo $producto['producto']; ?></td>
                                    <td><input type="number" name="cantidad[<?php echo $producto['codigo']; ?>]" value="<?php echo $producto['cantidad']; ?>" min="0" max="<?php echo $producto['limite']; ?>"></td>
                                    <td><?php echo $producto['limite']; ?></td>
                                    <td><input type="date" name="fechavencimiento[<?php echo $producto['codigo']; ?>]" value="<?php echo $producto['fechavencimiento']; ?>"></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <button type="submit" name="btn_guardar" class="button">GUARDAR</button>
                    </form>
                </main>
                <footer>
                    <a href="../modulologistica/emitirinformedeinventario.php" class="button">REGRESAR</a>
                </footer>
            </div>
        </body>
        </html>
        <?php
    }
}
?>
