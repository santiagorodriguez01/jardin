function registrar() {
  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var dni = document.getElementById("dni").value;
  var tipoRegistro = document.querySelector(
    'input[name="registro-switch"]:checked'
  ).value;

  if (!validarDni(dni)) {
    document.getElementById("errorDni").style.display = "block";
    return;
  } else {
    document.getElementById("errorDni").style.display = "none";
  }

  var fechaHoraActual = obtenerFechaHoraActual();

  enviarDatosAlServidor(nombre, apellido, dni, tipoRegistro, fechaHoraActual);
}

function obtenerFechaHoraActual() {
  var fechaHora = new Date();

  var formattedDate = fechaHora.toISOString().slice(0, 19).replace("T", " ");

  return formattedDate;
}

function validarDni(dni) {
  var regex = /^\d{7,8}$/;
  return regex.test(dni);
}

function enviarDatosAlServidor(
  nombre,
  apellido,
  dni,
  tipoRegistro,
  fechaHoraActual
) {
  var xhr = new XMLHttpRequest();
  var url = "tu_servidor_php_registro.php"; 

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      mostrarMensajeCargaExitosa(
        nombre,
        apellido,
        dni,
        tipoRegistro,
        fechaHoraActual
      );
    }
  };

  var datos = `nombre=${nombre}&apellido=${apellido}&dni=${dni}&tipoRegistro=${tipoRegistro}&fechaHoraActual=${fechaHoraActual}`;

  xhr.send(datos);
}

function mostrarMensajeCargaExitosa(
  nombre,
  apellido,
  dni,
  tipoRegistro,
  fechaHoraActual
) {
  var mensaje = `Registro de ${
    tipoRegistro === "ingreso" ? "Ingreso" : "Egreso"
  } exitoso:\n\n`;
  mensaje += `Maestro/a: ${nombre} ${apellido}\nDNI: ${dni}\nFecha: ${
    fechaHoraActual.split(" ")[0]
  }\nHora: ${fechaHoraActual.split(" ")[1]}`;

  alert(mensaje);
}
