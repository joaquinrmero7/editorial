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
    AVENIDA SAAVEDRA Nro 1174
    ZONA MIRAFLORES
    Teléfono 65148428
    La Paz – Bolivia
    
    Factura Original
    ----------------------------------------
    NIT: 123456789
    FACTURA NRO: 000001
    AUTORIZACION: 2370401800000001
    ----------------------------------------
    SERVICIOS Y/O ACTIVIDADES SUJETAS AL IVA
    NIT: 0000000001
    NUMERO DE FACTURA: 
    AUTORIZACION: AA-0000001

    FECHA: <?php echo($hoy['mday']."/".$hoy['mon']."/".$hoy['year']."     ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'] )?> <br/>
    ----------------------------------------<br/>
    Sr/a: <?php echo($user[0]->lastname)?> <br/>
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
	CODIGO DE CONTROL: 00-A1-B2-C3-D4
    <br>
    <br>
    <center>
        <img src="images/huella.png" width="100">
    </center>
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
{{-- 
<h2 align="center">Recibo por Orden de Compra</h2>
<div class="table table-striped" align="center">
        <table width="100%" border=1 cellspacing=0 align="center" class="table table-bordered" >
            <thead class="table-primary">
                <tr>
                    <th>Id</th> 
                    <th>Producto</th> 
                    <th>Cantidad</th> 
                    <th>Precio</th> 
                    <th>Total</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>asdfasf</td>
                    <td>12</td>
                    <td>Bs. 12</td>
                    <td>Bs. 13</td>
                </tr>
                <tr>
                    <td colspan="5">

                            <p>Depositar el monto a la cuenta 123166XXX-XXX113
                                del Banco Bisa y apersonarse a las oficinas de Editorial Leonado para recoger
                                los libros</p>
                    </td>
                </tr>
            </tbody>
        </table>
</div> --}}
<br><br><br>
<div style="margin-bottom: 50px">
    <p>&nbsp;</p>
    <pre>
</div>
</body>
</html>