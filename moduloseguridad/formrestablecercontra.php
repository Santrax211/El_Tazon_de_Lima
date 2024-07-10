<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../shared/vista.php');

class formrestablecercontra extends vista
{
    public function formrestablecercontraShow()
    {
        $this->getcabecera("LA SAZON");
        echo '<link rel="stylesheet" type="text/css" href="../assets/stylesautenticar.css">';
    ?>
    <form name="restablecercontra" method="POST" action="../moduloseguridad/getRestablecer.php">
        <table align="center" border="0">
            <tr>
                <td colspan="3" class="form-title">Restablecer contrasena</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td> 
            </tr>
            <tr>
            <td class="logo-container" rowspan="2"><img src="../img/logo.png" class="logo" alt="Logo"></td>
            <td colspan="1" style="text-align: center;">
            <label>Ingresa Correo Electronico:</label>
            <br>
            <br>
            <input type="email" name="txtcorreo" id="txtcorreo" class="input-field">
            <br>
            <br> 
            <input type="submit" name="btnrestablecer" id="btnrestablecer" value="Restablecer" class="login-button">
            </td>
            </tr>

        </table>
    </form>
    <?
        $this->getfooter();
    }
}

$form = new formrestablecercontra();
$form->formrestablecercontraShow();
?>
