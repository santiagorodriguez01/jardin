function buscarLegajo() {
    var buscarDNI = document.getElementById('buscarDNI').value;

    var datosLegajo = obtenerDatosLegajo(buscarDNI);

    if (datosLegajo) {
        mostrarResultadoLegajo(datosLegajo);
    } else {
        alert('No se encontró el legajo para el DNI ingresado.');
    }
}

function obtenerDatosLegajo(dni) {
    var datosLegajo = {
        nombre: 'Juan',
        apellido: 'Pérez',
        dni: '12345678',
        enfermedades: 'Ninguna',
        retiroAutorizado: 'Sí',
        actividadesExtracurriculares: 'Música, Arte'
    };

    return datosLegajo;
}

function mostrarResultadoLegajo(datosLegajo) {
    document.getElementById('nombreAlumno').textContent = datosLegajo.nombre;
    document.getElementById('apellidoAlumno').textContent = datosLegajo.apellido;
    document.getElementById('dniAlumno').textContent = datosLegajo.dni;
    document.getElementById('enfermedadesAlumno').textContent = datosLegajo.enfermedades;
    document.getElementById('retiroAutorizado').textContent = datosLegajo.retiroAutorizado;
    document.getElementById('actividadesExtracurriculares').textContent = datosLegajo.actividadesExtracurriculares;

    document.getElementById('legajoResultado').style.display = 'block';
}
