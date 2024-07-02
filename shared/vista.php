<?
class vista
{
    protected function getCabecera($titulo)
    {
        ?>
        <html>
            <head>
            <title><?echo strtoupper($titulo) ?></title>
            </head>
            <body>
        <?    
    }
    protected function getfooter()
    {
        ?>
        <hr>
        <marque>INSANOS ADS 2024</marque>
        </body>
        <?
    }
}
?>