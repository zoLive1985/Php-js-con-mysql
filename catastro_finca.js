"use strict";
var datosFiltrados=[];
$( document ).ready(function() {
   // debugger;
    console.log(datosOriginales);
    datosFiltrados=datosOriginales;
    desplegarDatos();
    $("#reset").click(function (e) { 
      datosFiltrados=datosOriginales;
      desplegarDatos();
      $("#regiones").val("null");
      $("#alimento").val("null");
      $("#min").val("0");
      $("#max").val("0");
      $("#especimen").val("null");

    });
    $("#buscar").click(function (e) { 
      // Primero creamos el objeto dondo vamos a agrear las propiedades que vamos a usar.
      var condiciones = {};
      datosFiltrados = datosOriginales;
      if( $("#regiones").val() != "null"){
        datosFiltrados = datosFiltrados.filter(finca =>{
            return finca.region == $("#regiones").val();
        });
      }
      if( $("#alimento").val() !=  "null"){
         datosFiltrados = datosFiltrados.filter( finca =>{
            return  finca.alimento == $("#alimento").val();
         } );
      }
      if( $("#especimen").val() != "null" ){
          var nombreColumna = $("#especimen").val();
          var min = ( $("#min").val()!="" && Number($("#min").val()) > 0 )?$("#min").val():0;
          var max = ( $("#max").val()!="" && Number($("#max").val()) > 0 )?$("#max").val():0;
          datosFiltrados = datosFiltrados.filter( finca =>{
            return finca[nombreColumna] >= min  && finca[nombreColumna] <=max;
          });
      }
      // Verificamos que el valor sea diferente de vacio y sea mayor que 0, si es mayor que 0 entonces le asignamos el valor que ingresó, sino solo le asignamos el valor 0.
      desplegarDatos();
    });
});
/**
 * Función que muestra los datos en la tabla
 */
function desplegarDatos(){
    $("#catastro tbody").find("tr").remove();
    datosFiltrados.forEach( finca => {
        var fila = '<tr>';
        fila += `<td>${finca.nombre_finca}</td>`;
        fila += `<td>${finca.alimento}</td>`;
        fila += `<td>${finca.region}</td>`;
        fila += `<td><span class="badge bg-success">Longitud:</span> ${finca.longitud}<br/> <span class="badge bg-success">Latitud:</span> ${finca.latitud}</td>`;
        fila += `<td>`;
            fila += `<span class="badge bg-success">Terneras:</span> ${finca.terneras}<br/>`;
            fila += `<span class="badge bg-success">Vaconas:</span> ${finca.vaconas}<br/>`;
            fila += `<span class="badge bg-success">Vacas:</span> ${finca.vacas}<br/>`;
            fila += `<span class="badge bg-warning text-dark">Terneros:</span> ${finca.terneros}<br/>`;
            fila += `<span class="badge bg-warning text-dark">Toretes:</span> ${finca.toretes}<br/>`;
            fila += `<span class="badge bg-warning text-dark">Toros:</span> ${finca.toros}<br/>`;

        fila += `</td>`;

        $("#catastro tbody").append(fila);
    });
}