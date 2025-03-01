<?php
require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
require APPPATH . 'libraries/phpmailer/src/SMTP.php';
require APPPATH . 'libraries/phpmailer/src/Exception.php';

require APPPATH . 'libraries/fpdf/fpdf.php';

$this->load->database();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// --------------------------------- Boleto ---------------------------------

$pdf_boleto = new FPDF('L', 'mm', array(80, 200)); 
$pdf_boleto->AddPage();
$pdf_boleto->SetFont('Arial', 'B', 10);
$pdf_boleto->SetCreator('ZOOLANDIA');
$pdf_boleto->Image('C:/xampp/htdocs/Zoolandia/application/models/Conexion/boleto.png', 0, 0, 200, 80);
$pdf_boleto->SetFont('Times', '', 12);

function setText($pdf, $texto, $longitud, $x, $y) {
    $pdf->setXY($x, $y);
    $pdf->MultiCell($longitud, 3, mb_convert_encoding($texto, 'ISO-8859-1', 'UTF-8'), 0, 'C');
}

$query_last_boleto = "SELECT MAX(id_boleto) AS last_boleto_id FROM boleto";
$result_last_boleto = $this->db->query($query_last_boleto);
$row_last_boleto = $result_last_boleto->row_array();
$id_a_ingresar = $row_last_boleto['last_boleto_id'];


$sql = "
   SELECT 
    b.id_boleto, 
    b.boletos_adulto, 
    b.boletos_nino, 
    b.boletos_nino_menor_3, 
    r.fecha_reserva, 
    r.hora_reserva, 
    p.nombre_paquete, 
    r.incluye_tour,   -- Aquí se está tomando de la tabla Reserva, no Paquete
    rt.nombre_ruta,
    c.nombre_comprador, 
    c.apellido_paterno_comprador, 
    c.apellido_materno_comprador,
    c.fecha_compra,  -- Fecha de la compra
    c.correo_comprador,  -- Correo del comprador
    p.precio_adulto,  -- Precio del boleto adulto
    p.precio_nino,  -- Precio del boleto niño
    b.boleto_total_adulto,  -- Total del costo de los boletos adultos
    b.boleto_total_nino,  -- Total del costo de los boletos niños
    b.boleto_total_general  -- Total general de los boletos
FROM 
    boleto b
JOIN reserva r ON b.id_reserva = r.id_reserva
JOIN paquete p ON r.id_paquete = p.id_paquete
LEFT JOIN Ruta rt ON r.id_ruta = rt.id_ruta
JOIN compra c ON b.id_compra = c.id_compra
WHERE b.id_boleto = $id_a_ingresar;
";


$resultado = $this->db->query($sql);
$datos = $resultado->row_array();  

if ($datos) {
    echo $datos['id_boleto'];  
} else {
    echo 'No se encontraron datos';
}

if ($datos['fecha_reserva'] && $datos['hora_reserva']) {
    if ($datos['hora_reserva'] != '00:00:00') {
        $fecha_visita = new DateTime($datos['fecha_reserva']);
        $hora_reserva = $datos['hora_reserva']; 
        $fecha_visita->setTime(substr($hora_reserva, 0, 2), substr($hora_reserva, 3, 2)); 
        $fecha_visita = $fecha_visita->format('d/m/Y H:i');
    } else {
        $fecha_visita = new DateTime($datos['fecha_reserva']);
        $fecha_visita = $fecha_visita->format('d/m/Y H:i');
    }
} else {
    $fecha_visita = "Fecha no disponible";
}

$paquete = $datos['nombre_paquete'];
$boletos_adulto = $datos['boletos_adulto'];
$boletos_nino = $datos['boletos_nino'];
$boletos_nino_menor_3 = $datos['boletos_nino_menor_3'];
$nombre_comprador = $datos['nombre_comprador'];
$apellido_paterno_comprador = $datos['apellido_paterno_comprador'];
$apellido_materno_comprador = $datos['apellido_materno_comprador'];
$total_num_boletos = $boletos_adulto + $boletos_nino + $boletos_nino_menor_3;


$total_ruta_guiada = 100;
if ($paquete == "VIP") {
    $total_ruta_guiada = 0;
}

if ($datos['incluye_tour'] == 1) {  
    $ruta_guiada = "Sí: " . $datos['nombre_ruta'];  
    $num_ruta_guiada = 1;
} else {  
    $num_ruta_guiada = 0;
    $ruta_guiada = "No tiene ruta guiada";
    $total_ruta_guiada = 0;
}



setText($pdf_boleto, "" . $datos['id_boleto'], 0, 42, 23.5);
setText($pdf_boleto, "" . $nombre_comprador . " " . $apellido_paterno_comprador . " " . $apellido_materno_comprador, 0, 20, 30.3);
setText($pdf_boleto, "" . $paquete, 0, 2, 36.5);
setText($pdf_boleto, "". $ruta_guiada, 0, 28, 43);
setText($pdf_boleto, "Adultos: " . $boletos_adulto, 0, 5, 49.5);
setText($pdf_boleto, "Niños: " . $boletos_nino, 0, 42, 49.5);
setText($pdf_boleto, "Menores: " . $boletos_nino_menor_3, 0, 80, 49.5);
setText($pdf_boleto, $fecha_visita, 0, 29, 56);

$pdf_boletoOutput = 'C:/xampp/htdocs/Zoolandia/assets/archivos_temporales/boleto_' . $datos['id_boleto'] . '.pdf';
$pdf_boleto->Output('F', $pdf_boletoOutput);


$mm = 0.264583;
$pdf_factura = new FPDF('P', 'mm', array((1545 * $mm), (2000 * $mm)));  
$pdf_factura->AddPage();
$pdf_factura->SetCreator('ZOOLANDIA');
$pdf_factura->Image('C:/xampp/htdocs/Zoolandia/application/models/Conexion/Factura.png', 0, 0, (1545 * $mm), (2000 * $mm)); 
$pdf_factura->SetFont('Times', '', 20);

function setText_s($pdf, $texto, $longitud, $x, $y) {
    $pdf->setXY($x, $y);
    $pdf->MultiCell($longitud, 8, mb_convert_encoding($texto, 'ISO-8859-1', 'UTF-8'), 0, 'S');
}
function setText_c($pdf, $texto, $longitud, $x, $y) {
    $pdf->setXY($x, $y);
    $pdf->MultiCell($longitud, 8, mb_convert_encoding($texto, 'ISO-8859-1', 'UTF-8'), 0, 'C');
}

setText_s($pdf_factura, "" . $datos['fecha_compra'], (250*$mm), (605*$mm), (397*$mm));

setText_c($pdf_factura, "" . $datos['id_boleto'], (204*$mm), (1021*$mm), (460*$mm));

setText_s($pdf_factura, "" . $nombre_comprador , (312*$mm), (422*$mm), (540*$mm));
setText_s($pdf_factura, "" . $apellido_paterno_comprador . ' '. $apellido_materno_comprador, (330*$mm), (946*$mm), (536*$mm));


setText_s($pdf_factura, "" . $datos['correo_comprador'], (710*$mm), (570*$mm), (598*$mm));

setText_s($pdf_factura, "" . $paquete, (200*$mm), (474*$mm), (781*$mm));

setText_s($pdf_factura, "" . $fecha_visita, (260*$mm), (1006*$mm), (781*$mm));

setText_c($pdf_factura, "" . '$' . $datos['precio_adulto'], (211*$mm), (629*$mm), (917*$mm));
setText_c($pdf_factura, "" . '$' . $datos['precio_nino'], (211*$mm), (629*$mm), (983*$mm));

setText_c($pdf_factura, "" . $boletos_adulto, (143*$mm), (879*$mm), (917*$mm));
setText_c($pdf_factura, "" . $boletos_nino, (143*$mm), (879*$mm), (983*$mm));
setText_c($pdf_factura, "" . $boletos_nino_menor_3, (143*$mm), (879*$mm), (1064*$mm));
setText_c($pdf_factura, "" . $num_ruta_guiada, (143*$mm), (879*$mm), (1170*$mm));

setText_c($pdf_factura, "" . '$' . $datos['boleto_total_adulto'], (197*$mm), (1061*$mm), (917*$mm));
setText_c($pdf_factura, "" . '$' . $datos['boleto_total_nino'], (197*$mm), (1061*$mm), (983*$mm));
setText_c($pdf_factura, "$" . $total_ruta_guiada, (197*$mm), (1061*$mm), (1170*$mm));

setText_c($pdf_factura, "" . $datos['boleto_total_general'], (197*$mm), (1061*$mm), (1285*$mm));


setText_c($pdf_factura, "" . $ruta_guiada, (300*$mm), (294*$mm), (1184*$mm));

/*
//fecha_compra jeje
setText_s($pdf_factura, "" . '2024-11-24 12:00:00', (250*$mm), (605*$mm), (397*$mm));
//id del boleto para la factura jeje
setText_c($pdf_factura, "" . '1', (204*$mm), (1021*$mm), (460*$mm));
//Nombres
setText_s($pdf_factura, "" . 'Victor Leonel', (312*$mm), (422*$mm), (540*$mm));
//Apellidos
setText_s($pdf_factura, "" . 'Nolasco Dzib', (330*$mm), (946*$mm), (536*$mm));
//Correo electronico
setText_s($pdf_factura, "" . 'vnolasco62@gmail.com', (710*$mm), (570*$mm), (598*$mm));
//Paquete
setText_s($pdf_factura, "" . 'Zoomax', (200*$mm), (474*$mm), (781*$mm));
//Fecha_reserva
setText_s($pdf_factura, "" . '2024-11-25 15:00:00', (260*$mm), (1006*$mm), (781*$mm));

//Precio_unidad Adulto
setText_c($pdf_factura, "" . '$150', (211*$mm), (629*$mm), (917*$mm));
//Precio_unidad Niño
setText_c($pdf_factura, "" . '$80', (211*$mm), (629*$mm), (983*$mm));
//Cantidad_Adulto
setText_c($pdf_factura, "" . '2', (143*$mm), (879*$mm), (917*$mm));
//Cantidad_Niño
setText_c($pdf_factura, "" . '2', (143*$mm), (879*$mm), (983*$mm));
//Cantidad_Niño_menor
setText_c($pdf_factura, "" . '2', (143*$mm), (879*$mm), (1064*$mm));
//Cantidad_Ruta_Guiada
setText_c($pdf_factura, "" . '1', (143*$mm), (879*$mm), (1170*$mm));

//Precio_Total_Adulto
setText_c($pdf_factura, "" . '$300', (197*$mm), (1061*$mm), (917*$mm));
//Precio_Total_Niño
setText_c($pdf_factura, "" . '$160', (197*$mm), (1061*$mm), (983*$mm));
//Precio_Total_Ruta_Guiada
setText_c($pdf_factura, "" . '$100', (197*$mm), (1061*$mm), (1170*$mm));
//Precio_Total_Final
setText_c($pdf_factura, "" . '$560', (197*$mm), (1061*$mm), (1285*$mm));

//Incluye ruta? (Validacion)
setText_c($pdf_factura, "" . 'Sí: Ruta de reptiles y aves', (300*$mm), (294*$mm), (1184*$mm));*/


$pdf_facturaOutput = 'C:/xampp/htdocs/Zoolandia/assets/archivos_temporales/factura_'.'.pdf';
$pdf_factura->Output('F', $pdf_facturaOutput);

// --------------------------------- Enviar Correo ---------------------------------
$text_agrade = '';
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'estefanycc81@gmail.com';
    $mail->Password = 'olsl sdwq byur skil'; 
    
    $mail->Port = 587;

    $mail->setFrom('estefanycc81@gmail.com', 'ZOOLANDIA');
    $mail->addAddress($datos['correo_comprador'], '');

    // Adjuntar ambos PDFs
    $mail->addAttachment($pdf_boletoOutput);
    $mail->addAttachment($pdf_facturaOutput);

    $mail->isHTML(true);
    $mail->Subject = 'Boleto y Factura';
    $mail->Body    = 'Adjuntamos su boleto y factura de la compra realizada.';

    $mail->send();
    //echo 'Correo enviado exitosamente';
    $text_agrade = 'Correo enviado exitosamente';
} catch (Exception $e) {
    //echo "Error al enviar el correo: {$mail->ErrorInfo}";
    $text_agrade = "Error al enviar el correo";
} 
?>



<!doctype html>
<html lang="es">

<head>
    <title>Listado de Usuarios</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link href="<?= base_url('assets/jquery/jquery-ui.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css2/Agradecimiento.css')?>">


</head>
<body>

<div class="SeparadorSeccion">
<section class="thank-you-section">
    <div class="thank-you-container">
    <div class="Inicio">
    <img src="<?= base_url('/assets/imagenes/logo con letras.webp') ?>" alt="Logo" class="thank-you-logo">
        <h1 class="thank-you-title">¡GRACIAS POR TU COMPRA EN ZOOLANDIA!</h1>
        </div>
        <p class="thank-you-text">
            ¡Tu compra ha sido confirmada! Hemos enviado tu factura y boleto de entrada a tu correo electrónico.
            Asegúrate de revisar tu bandeja de entrada y, si no lo encuentras, también revisa la carpeta de spam.
            Recuerda que el boleto es válido para tu visita en la fecha seleccionada. Si tienes alguna pregunta, no dudes en contactarnos.
        </p>
        <p class="thank-you-note">
            ¡Te esperamos en Zoolandia para una experiencia única con nuestros animales!<br>
        </p>

        <p class="thank-you-thank">  Gracias por elegirnos.</p>
        <button class="thank-you-button" onclick="window.location.href='<?= base_url() ?>'">Regresar al inicio</button>
    </div>
</section>
</div>
</body>
</html>