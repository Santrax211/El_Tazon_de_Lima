<?php
include_once('../shared/vista.php');
include_once('../moduloseguridad/Controlemitirinformedeinventario.php');

class formprodsecosyenlatados extends vista {
    public function formprodsecosyenlatadosShow($productos) {
        $this->getCabecera("Productos Secos y Enlatados");
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Productos Secos y Enlatados</title>
            <link rel="stylesheet" href="../assets/stylestablas.css">
        </head>
        <body>
            <div class="container">
                <header>
                    <img src="../img/logo.png" alt="Logo" class="logo">
                    <h1>PRODUCTOS SECOS Y ENLATADOS</h1>
                </header>
                <main>
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
                                <td><?php echo $producto['cantidad']; ?></td>
                                <td><?php echo $producto['limite']; ?></td>
                                <td><?php echo $producto['fechavencimiento']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </main>
                <footer>
                    <form method="POST" action="../moduloseguridad/getemitirinformedeinventario.php">
                        <button type="submit" name="btn_editar" class="button">EDITAR</button>
                    </form>
                    <a href="../modulologistica/emitirinformedeinventario.php" class="button">REGRESAR</a>
                </footer>
            </div>
        </body>
        </html>

        <?php
        
    }
}
?>
