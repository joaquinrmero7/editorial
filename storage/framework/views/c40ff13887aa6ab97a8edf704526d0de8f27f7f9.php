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
    

    Factura Original
    ----------------------------------------
    NIT: 192476549
    FACTURA NRO: 000001
    AUTORIZACION: 678354734689034
    ----------------------------------------
    SERVICIOS Y/O ACTIVIDADES SUJETAS AL IVA
    NIT: 6837705016
    NUMERO DE FACTURA: 
    AUTORIZACION: AA-5599914

    FECHA: <?php echo($hoy['mday']."/".$hoy['mon']."/".$hoy['year']."     ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'] )?> <br/>
    ----------------------------------------<br/>
    Sr/a: <?php echo($user[0]->name . ' '.$user[0]->lastname)?> <br/>
    NIT/CI: <?php echo($user[0]->ci )?> <br/>
    ----------------------------------------
    </pre>
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
    <pre>    
	SON:  <?php  echo($sum) ?> Bolivianos
	CODIGO DE CONTROL: 45-D3-C6-78-B5
	FECHA LIMITE DE EMISION: 25/12/2018
    ----------------------------------------
    “ESTA FACTURA CONTRIBUYE AL DESARROLLO 
    DEL PAIS. EL USO ILICITO DE ESTA SERA 
    SANCIONADO DE ACUERDO A LEY”

    

    Ley N° 453: Está prohibido importar
    distribuir a comercializar productos
    en el país por atentar a la salud.
        </pre>
</div>

<br><br><br>
<div style="margin-bottom: 50px">
    <p>&nbsp;</p>
    <pre>
</div>
</body>
</html>