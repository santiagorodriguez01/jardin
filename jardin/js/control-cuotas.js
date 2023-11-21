function registrarCuota() {
  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var dni = document.getElementById("dni").value;
  var monto = document.getElementById("monto").value;
  var mes = document.getElementById("mes").value;

  if (!validarMonto(monto)) {
    alert("Ingrese un monto válido.");
    return;
  }

  alert(
    `Cuota registrada exitosamente:\n\nAlumno: ${nombre} ${apellido}\nDNI: ${dni}\nMonto: ${monto}\nMes: ${mes}`
  );
}

function validarMonto(monto) {
  return !isNaN(parseFloat(monto)) && isFinite(monto) && parseFloat(monto) > 0;
}
