<?php

session_start();
include_once('../shared/vista.php');
include_once('../moduloseguridad/Controlemitirinformedeinventario.php');

class emitirinformedeinventario extends vista {
    public function emitirinformedeinventarioShow($categorias) {
        $this->getCabecera("PANEL PRINCIPAL");
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Gestión de Inventario</title>
            <link rel="stylesheet" href="../assets/stylesinformeinventario.css">
        </head>
        <body>
            <div class="container">
                <header>
                    <img src="../img/logo.png" alt="El Tazón">
                    <h1>Emisión de gestión de inventario</h1>
                </header>
                <main>
                    <p>USUARIO: <?php echo $_SESSION['login']?></p>
                    <table align='center' border='0'>
                        <?php foreach ($categorias as $categoria): ?>
                        <tr>
                            <td>
                                <div class="form-container">
                                    <form method='POST' action='../moduloseguridad/getemitirinformedeinventario.php'>
                                        <input type='hidden' name='idcategoria' value='<?php echo $categoria['idcategoria']; ?>'/>
                                        <input type='hidden' name='pathcategoria' value='<?php echo htmlspecialchars($categoria['pathcategoria']); ?>'/>
                                        <input type='submit' name='nombre_categoria' value='<?php echo htmlspecialchars($categoria['nombre']); ?>'/>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </main>
                <footer>
                    <button class="btn-generar">GENERAR INFORME DE INVENTARIO ACTUALIZADO</button>
                    <button class="btn-agregar">AGREGAR PRODUCTOS</button>
                </footer>
            </div>
        </body>
        </html>
        <?php
    }
}

$controlador = new Controlemitirinformedeinventario();
$controlador->categorias();
?>
