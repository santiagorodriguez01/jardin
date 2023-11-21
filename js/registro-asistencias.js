function registrarAsistencia() {
    var tipoAsistencia = document.getElementById('tipoAsistencia').value;
    var dniPersona = document.getElementById('dniPersona').value;
    var asistencia = document.getElementById('asistencia').value;

    var fechaHoraActual = obtenerFechaHoraActual();

    var mensajeAsistencia = `Asistencia registrada exitosamente:\n\nTipo: ${tipoAsistencia}\nDNI: ${dniPersona}\nEstado: ${asistencia}\nFecha y Hora: ${fechaHoraActual}`;
    alert(mensajeAsistencia);
}

function obtenerFechaHoraActual() {
    var fechaHora = new Date();
    var formattedDate = fechaHora.toISOString().slice(0, 19).replace('T', ' ');
    return formattedDate;
}
