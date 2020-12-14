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
    SUPERMERCADO LURAÑANI
    Casa Matriz
    AVENIDA CHACALTAYA Nro 1174
    ZONA ACHACHICALA
    Teléfono 65148428
    La Paz – Bolivia
    

    REPORTE MENSUAL DE VENTAS 

    JUNIO 2018
    <br><br><br>
    ----------------------------------------
        <table align="center" style="font-family:'Times New Roman', Times, serif;font-style:normal;font-size:16px;">
            <tr >
                <td >| CANT.    |</td>
                <td >|P. UNIT     |</td>
                <td >|FECHA Y HORA   |</td>
                <td >DETALLE     |</td>
                <td >SUBTOTAL    |</td>
            </tr>
            <?php $sum = 0; ?>
            <?php foreach ($libros as $l) : ?>
            <?php $sum = $sum + ($l->precio*$l->cantidad); ?>
            <?php echo('<tr><td>| '.$l->cantidad.'</td><td>|Bs. '.$l->precio . '</td><td>| '.$l->created_at . '</td>')?>
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