function showLoadingAndRedirect() {
    // Obtener el formulario
    var form = document.getElementById('donationForm');
    
    // Validar si todos los campos obligatorios están llenos
    if (!form.checkValidity()) {
        // Si el formulario no es válido, mostrar una alerta y evitar la redirección
        alert("Por favor, completa todos los campos requeridos.");
        return false;  // Esto evita que el formulario se envíe
    }
    
    // Si el formulario es válido, mostrar el mensaje de carga
    document.getElementById('loading').style.display = 'block';
  
    // Esperar 2 segundos antes de redirigir
    setTimeout(function () {
        // Ocultar el mensaje de carga
        document.getElementById('loading').style.display = 'none';
        
        // Redirigir a la página de agradecimiento
        window.location.href = 'agradecimientoDonaciones';
    }, 2000);
  
    return false;  // Evitar que el formulario se envíe inmediatamente
}
