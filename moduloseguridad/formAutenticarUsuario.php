<?php
session_start();
include('./shared/vista.php');

class formAutenticarUsuario extends vista
{
    public function formAutenticarUsuarioShow()
    {
        $this->getcabecera("LA SAZON");
        echo '<link rel="stylesheet" type="text/css" href="./assets/stylesautenticar.css">';
    ?>
    <form name="login" method="POST" action="./moduloseguridad/getUsuario.php">
        <table align="center" border="0">
            <tr>
                <td colspan="3" class="form-title">Autenticar Usuario</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td> 
            </tr>
            <tr>
                <td class="logo-container" rowspan="2"><img src="./img/logo.png" class="logo" alt="Logo"></td>
                <td>USUARIO</td>
                <td><input type="text" name="txtusuario" id="txtusuario" class="input-field"></td>
            </tr>
            <tr>
                <td>CONTRASENA</td>
                <td><input type="password" name="txtcontra" id="txtcontra" class="input-field"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" class="button-container">
                    <input type="submit" name="btningresar" id="btningresar" value="Ingresar" class="login-button">
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" class="forgot-password-container">
                    <a href="moduloseguridad/formrestablecercontra.php"> ¿Olvidaste tu contrasena?</a>
                </td>
            </tr>
        </table>
    </form>
    <?
    }
}
?>
