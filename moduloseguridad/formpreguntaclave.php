<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../shared/vista.php');

class formpreguntaclave extends vista
{
    public function formpreguntaclaveShow()
    {
        $this->getcabecera("LA SAZON");
        echo '<link rel="stylesheet" type="text/css" href="../assets/stylesautenticar.css">';
    ?>
    <form name="preguntaclave" method="POST" action="../moduloseguridad/getRestablecer.php">
        <table align="center" border="0">
            <tr>
                <td colspan="3" class="form-title">PREGUNTA CLAVE</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td> 
            </tr>
            <tr>
            <td class="logo-container" rowspan="2"><img src="../img/logo.png" class="logo" alt="Logo"></td>
            <td colspan="1" style="text-align: center;">
            <label>¿Como se llamo su primer mascota?</label>
            <br>
            <br>
            <input type="string" name="txtpregunta" id="txtpregunta" class="input-field">
            <br>
            <br>
            <input type="submit" name="btnpregunta" id="btnpregunta" value="Verificar" class="login-button">
            </td>
            </tr>

        </table>
    </form>
    <?
        $this->getfooter();
    }
}


?>