<?php
require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
require APPPATH . 'libraries/phpmailer/src/SMTP.php';
require APPPATH . 'libraries/phpmailer/src/Exception.php';

require APPPATH . 'libraries/fpdf/fpdf.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// URL de la API
$api_url = "http://localhost:3000/api/donaciones/ultima";
// Inicializar cURL
$curl = curl_init($api_url);
// Configurar opciones de cURL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($curl);
// Verificar si hubo un error en la solicitud
if ($response === FALSE) {
    // Manejar el error
    echo "Error: No se pudo conectar al servidor.";
    exit; // Detener la ejecución del script
}
// Decodificar la respuesta JSON
$data = json_decode($response, true);
// Cerrar la sesión de cURL
curl_close($curl);
// Verificar si la respuesta contiene los datos esperados
if (isset($data['id_donacion'])) {
    // Asignar los datos a las variables PHP
    $id_donacion = $data['id_donacion'];
    $nombre = $data['nombre_donante'];
    $apellido_paterno = $data['apellido_paterno_donante'];
    $apellido_materno = $data['apellido_materno_donante'];
    $correo = $data['correo_donante'];
    $fecha_donacion = $data['fecha_donacion'];
    $monto = $data['monto_donacion'];
} else {
    // Manejar el caso en que no se encuentren datos
    echo "Error: " . ($data['message'] ?? 'Error desconocido');
}


$mm = 0.264583;

$pdf = new FPDF('P', 'mm', array((1545 * $mm), (2000 * $mm)));
$pdf->AddPage();

$pdf->SetCreator('ZOOLANDIA');

$pdf->Image('C:/xampp/htdocs/Zoolandia/application/models/Conexion/fact_donacion.png', 0, 0, (1545 * $mm), (2000 * $mm));

$pdf->SetFont('Times', '', 20);

function setText_c($pdf, $texto, $longitud, $x, $y) {
    $pdf->setXY($x, $y);
    $pdf->MultiCell($longitud, 8, mb_convert_encoding($texto, 'ISO-8859-1', 'UTF-8'), 0, 'C');
}

function setText_s($pdf, $texto, $longitud, $x, $y) {
    $pdf->setXY($x, $y);
    $pdf->MultiCell($longitud, 8, mb_convert_encoding($texto, 'ISO-8859-1', 'UTF-8'), 0, 'S');
}

setText_s($pdf, "" . $fecha_donacion, (250*$mm), (605*$mm), (397*$mm));
setText_c($pdf, "" . $id_donacion, (204*$mm), (1021*$mm), (460*$mm));
setText_s($pdf, "" . $nombre, (312*$mm), (422*$mm), (540*$mm));
setText_s($pdf, "" . $apellido_paterno." ".$apellido_materno, (330*$mm), (946*$mm), (536*$mm));
setText_s($pdf, "" . $correo, (710*$mm), (570*$mm), (598*$mm));
setText_c($pdf, "" . $monto, (211*$mm), (629*$mm), (1046*$mm));
setText_c($pdf, "" . $monto, (197*$mm), (1061*$mm), (1046*$mm));
setText_c($pdf, "" . $monto, (197*$mm), (1061*$mm), (1154*$mm));

$pdfOutput = 'C:/xampp/htdocs/Zoolandia/assets/archivos_temporales/factura_donacion'.'.pdf';
$pdf->Output('F', $pdfOutput);

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'estefanycc81@gmail.com';
    $mail->Password = 'olsl sdwq byur skil';
    
    $mail->Port = 587;

    $mail->setFrom('estefanycc81@gmail.com', 'ZOOLANDIA');
    $mail->addAddress($correo, '');

    $mail->addAttachment($pdfOutput);

    $mail->isHTML(true);
    $mail->Subject = 'Factura de donativo Zoolandia';
    $mail->Body = '
    <html>
    <body style="font-family: Arial, sans-serif; color: #333;">
        <h2 style="color: #2A7AE2;">¡Gracias por tu generosa donación a Zoolandia!</h2>
        <p>Estimado/a <strong>' . $nombre . '</strong>,</p>
        <p>Te agradecemos profundamente por tu apoyo. Gracias a tu donación, podemos seguir trabajando para cuidar a nuestros animales y mantener Zoolandia como un lugar especial para todos.</p>
        
        <h3>Detalles de la donación:</h3>
        <ul>
            <li><strong>Donación N°:</strong> ' . $id_donacion . '</li>
            <li><strong>Fecha:</strong> ' . $fecha_donacion . '</li>
            <li><strong>Total donado:</strong> $' . $monto . '</li>
        </ul>
        
        <p>Tu generosidad marca la diferencia en la vida de nuestros animales. Si tienes alguna pregunta o deseas obtener más información sobre cómo utilizamos las donaciones, no dudes en contactarnos.</p>
        
        <p>¡Esperamos contar contigo en futuras iniciativas y vernos pronto en Zoolandia!</p>

        <p style="font-size: 12px; color: #888;">Si no has realizado esta donación, por favor contacta con nuestro soporte.</p>
    </body>
</html>
    ';

    $mail->send();
} catch (Exception $e) {
    echo 'Mensaje no enviado. Error: ' . $mail->ErrorInfo;
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>Gracias por donar</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('/assets/bootstrap/css/bootstrap.min.css') ?>">


    <link rel="stylesheet" href="<?= base_url('assets/css2/Agradecimiento.css')?>">


</head>
<body>
<div class="SeparadorSeccion">
<section class="thank-you-section">
    <div class="thank-you-container">
    <div class="Inicio">
    <img src="<?= base_url('/assets/imagenes/logo con letras.webp') ?>" alt="Logo" class="thank-you-logo">
        <h1 class="thank-you-title">¡GRACIAS POR TU DONACIÓN A ZOOLANDIA!</h1>
        </div>
        <p class="thank-you-text">
        ¡Tu generoso aporte ha sido recibido con éxito!<br>
        Hemos enviado la factura de tu donación a tu correo electrónico. Asegúrate de revisar tu bandeja de entrada.
        </p>
        <p class="thank-you-note">
        Tu apoyo nos permite seguir ofreciendo experiencias educativas y de conservación en Zoolandia puesto a que marcan una diferencia en el bienestar de los animales.   
        Si tienes alguna pregunta, no dudes en contactarnos.
        </p>

        <p class="thank-you-thank">¡Gracias por ayudar a cuidar y proteger a nuestros animales!</p>
        <button class="thank-you-button" onclick="window.location.href='<?= base_url('Zoolandia') ?>'">Regresar al inicio</button>
    </div>
</section>
</div>
</body>
</html>
