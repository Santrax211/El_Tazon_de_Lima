
<?
include_once('conexion.php');
class usuarioprivilegios extends conexion
{
    public function getPrivilegios($login)
    {
        $this->conectarBD();
       $consulta = "SELECT P.labelPrivilegio,P.pathPrivilegio,P.iconPrivilegio,P.namePrivilegio
                    FROM usuarios U, privilegios P, usuariosprivilegios UP
                    WHERE U.login = UP.login AND
                          P.idPrivilegio = UP.idPrivilegio AND
                          U.login ='$login' ";
       $respuesta = mysql_query($consulta);
       $linea = mysql_num_rows($respuesta);
       $this->desConectarBD();
       for($i = 0; $i < $linea; $i++)
            $fila[$i] = mysql_fetch_array($respuesta);
       return $fila;
    }
}
?>