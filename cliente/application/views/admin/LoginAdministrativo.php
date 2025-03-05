

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="Css2.0/Registro.css">
    <link rel="stylesheet" href="<?= base_url('assets/Css2.0/Registro.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css2/Global.css') ?>">
</head>
<body>

<div class="SeparadorSeccion">
    <img src="<?= base_url('assets/imagenes/logo.webp') ?>" alt="Logo Zoolandia" class="logo">

    <h1 class="Titulo">Zoolandia</h1>

    <div class="formulario">
        <h2>Inicio de sesión</h2>
        <form method="post">
            <div class="username">
                <input type="text" name="Correo" id="mi-input" placeholder="">
                <label>Correo electrónico</label>
            </div>
            <div class="username">
                <input type="password" name="Contrasena" id="mi-input" placeholder="">
                <label>Contraseña</label>
           </div>
          <input type="submit" name="Ingresar" value="Iniciar">
        </form>
    </div>
</div>

</body>
</html>
