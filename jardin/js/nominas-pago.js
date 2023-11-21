function generarNomina() {
  var tipoPersonal = document.getElementById("tipoPersonal").value;
  var mes = document.getElementById("mes").value;
  var anio = document.getElementById("anio").value;

  if (!/^\d{1,2}$/.test(mes) || !/^\d{4}$/.test(anio)) {
    alert("Ingrese un mes y año válidos (formato: MM y AAAA).");
    return;
  }

  var fechaGeneracion = obtenerFechaGeneracion();

  var mensajeNomina = `Nómina generada exitosamente:\n\nTipo de Personal: ${tipoPersonal}\nMes: ${mes}\nAño: ${anio}\nFecha de Generación: ${fechaGeneracion}`;
  alert(mensajeNomina);
}

function obtenerFechaGeneracion() {
  var fechaGeneracion = new Date();
  var formattedDate = fechaGeneracion
    .toISOString()
    .slice(0, 19)
    .replace("T", " ");
  return formattedDate;
}
