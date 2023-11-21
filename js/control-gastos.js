var montoAcumulado = 0;

function registrarGasto() {
  var descripcion = document.getElementById("descripcion").value;
  var monto = parseFloat(document.getElementById("monto").value);

  if (isNaN(monto) || monto <= 0) {
    alert("Ingrese un monto válido.");
    return;
  }

  var fechaHoraActual = obtenerFechaHoraActual();

  var gasto = {
    descripcion: descripcion,
    monto: monto,
    fechaHora: fechaHoraActual,
  };

  montoAcumulado += monto;

  actualizarMontoAcumulado();

  mostrarGastoEnLista(gasto);
}

function obtenerFechaHoraActual() {
  var fechaHora = new Date();
  var formattedDate = fechaHora.toISOString().slice(0, 19).replace("T", " ");
  return formattedDate;
}

function mostrarGastoEnLista(gasto) {
  var listaGastos = document.getElementById("gastosUl");
  var nuevoGasto = document.createElement("li");
  nuevoGasto.innerHTML = `<strong>${gasto.descripcion}</strong> - Monto: $${gasto.monto} - Fecha: ${gasto.fechaHora}`;
  listaGastos.appendChild(nuevoGasto);
}

function actualizarMontoAcumulado() {
  var montoAcumuladoElement = document.getElementById("montoAcumuladoValor");
  montoAcumuladoElement.textContent = `$${montoAcumulado.toFixed(2)}`;
}
