function buscarLegajoPersonal() {
    var buscarDNI = document.getElementById('buscarDNI').value;

    var datosLegajoPersonal = obtenerDatosLegajoPersonal(buscarDNI);

    if (datosLegajoPersonal) {
        mostrarResultadoLegajoPersonal(datosLegajoPersonal);
    } else {
        alert('No se encontró el legajo para el DNI ingresado.');
    }
}

function obtenerDatosLegajoPersonal(dni) {
    var datosLegajoPersonal = {
        nombre: 'María',
        apellido: 'González',
        dni: '98765432',
        certificaciones: 'Educación Infantil, Primeros Auxilios',
        capacitaciones: 'Pedagogía Montessori',
        salario: '$40,000'
    };

    return datosLegajoPersonal;
}

function mostrarResultadoLegajoPersonal(datosLegajoPersonal) {
    document.getElementById('nombrePersonal').textContent = datosLegajoPersonal.nombre;
    document.getElementById('apellidoPersonal').textContent = datosLegajoPersonal.apellido;
    document.getElementById('dniPersonal').textContent = datosLegajoPersonal.dni;
    document.getElementById('certificacionesPersonal').textContent = datosLegajoPersonal.certificaciones;
    document.getElementById('capacitacionesPersonal').textContent = datosLegajoPersonal.capacitaciones;
    document.getElementById('salarioPersonal').textContent = datosLegajoPersonal.salario;

    document.getElementById('legajoPersonalResultado').style.display = 'block';
}
