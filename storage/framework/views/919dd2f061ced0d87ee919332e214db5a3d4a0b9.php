<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>

</head>
<body>
<?php
date_default_timezone_set('America/La_Paz');
$hoy = getdate();
?>
<div class="" align="center" style="margin-bottom: 15px; margin-right: 20px; text-align:center;border-spacing:0;border-collapse: collapse;">
        <pre>    
    EDITORIAL LEONARDO
    Casa Matriz
    AVENIDA SAAVEDRA EDIFICIO “EL CEIBO”
    ZONA MIRAFLORES
    Teléfono 2232345
    La Paz – Bolivia
    

    REPORTE MENSUAL DE VENTAS 

    JUNIO 2018
    <br><br><br>
    ----------------------------------------
        <table align="center" style="font-family:'Times New Roman', Times, serif;font-style:normal;font-size:16px;">
            <tr >
                <td >| CANT.    |</td>
                <td >P. UNIT     |</td>
                <td >DETALLE     |</td>
                <td >SUBTOTAL    |</td>
            </tr>
            <?php $sum = 0; ?>
            <?php foreach ($libros as $l) : ?>
            <?php $sum = $sum + ($l->precio*$l->cantidad); ?>
            <?php echo('<tr><td>| '.$l->cantidad.'</td><td>| '.$l->precio . '</td>')?>
            <?php echo('<td>| '.$l->nombre . '</td>')?>
            <?php echo('<td>| '.($l->precio * $l->cantidad).'</td></tr>') ?>
            
            <?php endforeach; ?>
        </table>
</div>
<br><br><br>
<div style="margin-bottom: 50px">
    <p>&nbsp;</p>
    <pre>
</div>
</body>
</html>