<?
class conexion
{
    protected function conectarBD()
    {
            mysql_connect('localhost','root','12345678');
            mysql_select_db('proyectoads');
    }
    protected function desConectarBD()
    {
        mysql_close();
    }

}
?>