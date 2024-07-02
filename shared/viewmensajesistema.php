<?php
include_once("vista.php");

class viewmensajesistema extends vista
{
    
    public function viewmensajesistemaShow($msj, $link)
    { 
        $this->getCabecera("Mensaje del sistema");
        ?>
        <center><strong><?php echo strtoupper(htmlspecialchars($msj)); ?></strong></center>
        <p align="center"><?php echo $link; ?></p>
        <?php
    }
}
?>
