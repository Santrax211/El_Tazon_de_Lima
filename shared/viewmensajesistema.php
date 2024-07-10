<?php
include_once("vista.php");

class viewmensajesistema extends vista
{
    public function viewmensajesistemaShow($msj, $tipo, $botonTexto, $botonLink)
    {
        $this->getCabecera("Mensaje del sistema");
        echo '<link rel="stylesheet" type="text/css" href="../assets/stylesmensaje.css">'; // Ajusta la ruta según tu estructura
        ?>
        <div class="mensaje-sistema">
            <div class="mensaje-contenido">
                <img src="<?php echo $this->getImageForMessage($tipo); ?>" alt="Icono de mensaje">
                <strong><?php echo strtoupper(htmlspecialchars($msj)); ?></strong>
            </div>
            <button onclick="window.location.href='<?php echo $botonLink; ?>'"><?php echo htmlspecialchars($botonTexto); ?></button>
        </div>
        <?php
    }
    private function getImageForMessage($tipo)
    {
        switch ($tipo) {
            case 'forbidden':
                return '../img/prohibir.jpg'; 
            case 'warning':
                return '../img/advertencia.png'; 
            case 'success':
                return '../img/success.png';

        }
    }
}
?>
