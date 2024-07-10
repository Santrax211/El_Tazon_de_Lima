<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../shared/vista.php');

class formcontranueva extends vista
{
    public function formcontranuevaShow()
    {
        $this->getcabecera("LA SAZON");
        echo '<link rel="stylesheet" type="text/css" href="../assets/stylesautenticar.css">';
    ?>
    <form name="contranueva" method="POST" action="../moduloseguridad/getRestablecer.php">
        <table align="center" border="0">
            <tr>
                <td colspan="3" class="form-title">Ingresar contrasena nueva</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td> 
            </tr>
            <tr>
            <td class="logo-container" rowspan="2"><img src="../img/logo.png" class="logo" alt="Logo"></td>
            <td colspan="1" style="text-align: center;">
            <label>Ingresa Contra nueva:</label>
            <br>
            <br>
            <input type="password" name="txtcontranueva" id="txtcontranueva" class="input-field">
            <br>
            <br>
            <label>Confirmar contra:</label>
            <br>
            <br>
            <input type="password" name="txtconfirmarcontra" id="txtconfirmarcontra" class="input-field">
            <br>
            <br>
            <input type="submit" name="btncambiarcontra" id="btncambiarcontra" value="Cambiar" class="login-button">
            </td>
            </tr>

        </table>
    </form>
    <?
        $this->getfooter();
    }
}


?>
