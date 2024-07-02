<?
include('../shared/vista.php');
class panelprincipal extends vista
{
    public function panelPrincipalShow($listaPrivilegios)
    {
        $this->getCabecera("PANEL PRINCIPAL");
        $cantidad=count($listaPrivilegios);

    ?>
        <p>USUARIO: <? echo $_SESSION['login']?></p>
        <table align='center' border='0'>
        <?
        for($i=0;$i<$cantidad; $i++)
        {
        ?>
            <tr>
                <td>
                    <form method='POST' action="<? echo $listaPrivilegios[$i]['pathPrivilegio']?>">
                        <input type='submit' value='<? $listaPrivilegios[$i]['namePrivilegio'] ?>'/>
                    </form>
                </td>
                <td> <? echo $listaPrivilegios[$i]['labelPrivilegio'] ?></td>
            </tr>
        <?
        }
        ?>
        </table>
    <?
        $this->getPiePagina();
    }
}
?>