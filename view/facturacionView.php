<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Comprador</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="./alertify.core.css" />
<link rel="stylesheet" href="./alertify.default.css" id="toggleCSS" />
<script src="./alertify.min.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="shortcut icon" type="image/x-icon" href="../images/vaca.ico" /><!-- Icono de la pagina -->
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Horse Farm Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>
<script src="./jquery-3.2.1.js"></script>
<script src="../pdf/html2pdf.js" type="text/javascript"></script>
<script src="../pdf/jspdf.debug.js" type="text/javascript"></script>
<link href="../select2.min.css" rel="stylesheet" />
<script src="../select2.min.js"></script>
<?php
    include '../business/compradorbusiness/compradorBusiness.php';
?>
</head>
<body>
<!--header start here-->
<div class="banner-two">
  <div class="header">
    <div class="container">
         <div class="header-main">
                <div class="logo">
                    <h1><a href="../index.html">Inicio</a></h1>
                </div>
         <div class="clearfix"> </div>
      </div>
    </div>
 </div>
</div>
<!--header end here-->

    <?php
        $compradorBusiness = new CompradorBusiness();
        $compradores = $compradorBusiness->obtenerTBCompradorFactura();

    ?>

    <div class="container">
        <div class="col-md-4 banner-left">
            <div class="comment-bottom">
            <form id="form-animal">
                <div>
                    <label>Nombre de Comprador</label>
                    <select id="compradores" name="compradores" class="pruebaSelect">
                      <option value='-1'>Seleccione un comprador</option>
                        <?php
                            foreach ($compradores as $comprador) {
                                echo '<option value = '.$comprador->getCompradorCodigo().' >'.$comprador->getCompradorCodigo()."-".$comprador->getCompradorNombreCompleto().'</option>';
                            }//foreach
                        ?>
                    </select>
                </div>
            </form>
            </div>
            <div>
                <span id="resultado"></span>
            </div>
        </div>
        <div class="col-md-8 banner-right">
            <div class="single">
            <div class="comment-bottom">
                <h3>Datos de la Factura</h3>
                <form method="post" action="../business/compradorbusiness/compradorAction.php">
                    <div>
                        <label>N&uacute;mero de Identificaci&oacute;n</label>
                        <input type="text" name="compradorNumeroIdentificacion" id="compradorNumeroIdentificacion" placeholder="Número Identificación" />
                    </div>
                    <div>
                        <label>Nombre Completo</label>
                        <td><input type="text" name="compradorNombreCompleto" id="compradorNombreCompleto" placeholder="Nombre Completo" /></td>
                    </div>
                    <div id="pdf">
                      <div id="ventas">

                      </div>
                    </div>
                    <div>
                        <input type="button" value="Facturar" name="facturar" id="facturar" onclick="generarFactura();" />
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!--footer start here-->
<div class="footer">
    <div class="container">
        <div class="copy-right">
            <p>© 2018 Subasta. Template obtenido de <a href="http://w3layouts.com/" target="_blank">  W3layouts </a></p>
        </div>
    </div>
</div>
<!--footer end here-->
</body>
</html>

<script>

    function validarDatos(){

        identificacion = $("#compradorNumeroIdentificacion").val().trim();
        nombre = $("#compradorNombreCompleto").val().trim();
        telefono = $("#compradorTelefono").val().trim();
        direccion = $("#compradorDireccion").val().trim();

        if(identificacion.length < 1){
            $("#resultado").html("La cédula es inválida");
            return false;
        }else if(nombre.length < 1 || nombre.length > 100){
            $("#resultado").html("Debe ingresar el nombre");
            return false;
        }else if(telefono.length < 1 || telefono.length < 8 || isNaN(telefono)){
            $("#resultado").html("Número de Teléfono inválido");
            return false;
        }else if(direccion.length < 1 || direccion.length > 200){
            $("#resultado").html("Debe ingresar una dirección");
            return false;
        }//if-else

        return true;
    }//validarDatos

    function actualizarComprador() {

        if(validarDatos()){

            var parameters = {
                "actualizar" : 'actualizar',
                "compradorCodigo" : $("#compradores").val(),
                "compradorNombreCompleto" : $("#compradorNombreCompleto").val(),
                "compradorNumeroIdentificacion" : $("#compradorNumeroIdentificacion").val(),
                "compradorTelefono" : $("#compradorTelefono").val(),
                "compradorDireccion" : $("#compradorDireccion").val(),
                "compradorTipoPago" : $("#compradorTipoPago").val(),
                "compradorRecomendacion" : $("#compradorRecomendacion").val()
            };

            $.post("../business/compradorbusiness/compradorAction.php",parameters, function(data){

                if(data !== "false"){
                    $("#resultado").html("Transacción Exitosa");
                }else{
                    $("#resultado").html("Error al procesar la transacción");
                }//if
            });

        }//if-else
    }//insertarComprador

    $(document).ready(function() {
        $('.pruebaSelect').select2();
    });


    $("#compradores").change(function () {
        var codigoComprador = $("#compradores").val();
        if(codigoComprador != '-1'){
          $.post("../business/subastabusiness/subastaAction.php",{'FacturaComprador': codigoComprador}, function(data){
              var comprador = JSON.parse(data);
             salida = "<table class='table'>\n"+
                                  "<thead>\n"+
                                      "<tr>\n"+
                                          "<th>Código Animal</th>\n"+
                                          "<th>Precio</th>\n"+
                                          "<th>Código Venta</th>\n"+
                                          "<th>Cancelar</th>\n"+

                                      "</tr>\n"+
                                      "</thead>\n"+
                              "<tbody>\n";

                              if(comprador.Ventas.length > 1){
                                  $("#compradorNumeroIdentificacion").val(comprador.Ventas[1].compradorcodigo);
              $("#compradorNombreCompleto").val(comprador.Ventas[1].compradornombrecompleto);

                                for (var i = 1; i < comprador.Ventas.length; i++) {
                                    salida += "<tr>"+
                                        "<td>" + comprador.Ventas[i].ventaanimal + "</td>\n"+
                                        "<td>" + comprador.Ventas[i].ventaprecio + "</td>\n"+
                                        "<td>" + comprador.Ventas[i].ventaid + "</td>\n"+
                                        "<td><input type='checkbox' id='Venta" + i + "'  > </td>\n"+
                                    "</tr>\n";
                                }
                              }

                              if(comprador.Resubastas.length > 1){

                                  $("#compradorNumeroIdentificacion").val(comprador.Resubastas[1].compradorcodigo);
                                  $("#compradorNombreCompleto").val(comprador.Resubastas[1].compradornombrecompleto);

                                  salida +="<tr>\n"+
                                          "<th>Código Animal</th>\n"+
                                          "<th>Precio</th>\n"+
                                          "<th>Código Resubasta</th>\n"+
                                          "<th>Cancelar</th>\n"+
                                      "</tr>";

                                for (var i = 1; i < comprador.Resubastas.length; i++) {
                                    salida += "<tr>"+
                                        "<td>" + comprador.Resubastas[i].resubastaanimal + "</td>\n"+
                                        "<td>" + comprador.Resubastas[i].resubastaprecio + "</td>\n"+
                                        "<td>" + comprador.Resubastas[i].resubastaid + "</td>\n"+
                                        "<td><input type='checkbox' id='Resubasta"+ i +"' > </td>\n"+
                                    "</tr>";
                                }
                              }
              $('#ventas').show();     
              $('#ventas').html(salida);
          });
        }else{
          $('#compradorNumeroIdentificacion').val("");
          $('#compradorNombreCompleto').val("");
          $('#ventas').hide();
        }
    });

    function generarFactura(){
    var codigoComprador = $("#compradores").val();

    $.post("../business/subastabusiness/subastaAction.php",{'FacturaComprador': codigoComprador}, function(data){
        var comprador = JSON.parse(data);
        var precio = 0.0;

        if(comprador.Ventas.length>1){
        var salida = "<table id='facturacion' name='facturacion' class='table'>"+
                  "<thead>"+
                    "<tr>"+
                      "<th>Código Animal</th>"+
                      "<th>Precio</th>"+
                      "<th>Código Venta</th>"+
                    "</tr>"+
                  "</thead>"+
                "<tbody>";
        }//en if

    for(i=1;i<comprador.Ventas.length;i++){
      if($('input:checkbox[id="Venta'+i+'"]').prop('checked')){
        cancelarVenta(comprador.Ventas[i].ventaid);
        salida += "<tr>"+
            "<td>" + comprador.Ventas[i].ventaanimal + "</td>"+
            "<td>" + comprador.Ventas[i].ventaprecio + "</td>"+
            "<td>" + comprador.Ventas[i].ventaid + "</td>"+
        "</tr>";
        precio += parseInt(comprador.Ventas[i].ventaprecio);
      }//la tupla seleccionada por el check
    }//end for

    if(comprador.Resubastas.length>1){
    salida +="<tr>"+
            "<th>Código Animal</th>"+
            "<th>Precio</th>"+
            "<th>Código Resubasta</th>"+
        "</tr>";
        }
        for(i=1;i<comprador.Resubastas.length;i++){
          if($('input:checkbox[id="Resubasta'+i+'"]').prop('checked')){
            cancelarResubasta(comprador.Resubastas[i].resubastaid);
            salida += "<tr>"+
                "<td>" + comprador.Resubastas[i].resubastaanimal + "</td>"+
                "<td>" + comprador.Resubastas[i].resubastaprecio + "</td>"+
                "<td>" + comprador.Resubastas[i].resubastaid + "</td>"+
            "</tr>";
            precio += parseInt(comprador.Resubastas[i].resubastaprecio);
          }//la tupla seleccionada por el check
        }//end for

    salida += "<tr><th>PRECIO TOTAL</th><th>"+ precio +"</th><th> </th></tr></tbody></table>";
      $('#ventas').html(salida);
      mostrarMensaje("delay","Cancelando, generando factura....");
  });

}//generarFactura


function cancelarResubasta(id){
  $.post("../business/subastabusiness/subastaAction.php",{'Eliminar': id,'tabla': 'resubasta'}, function(data){
  });
}//cancelarResubastas
function cancelarVenta(id){
  $.post("../business/subastabusiness/subastaAction.php",{'Eliminar': id,'tabla': 'venta'}, function(data){
  });
}//cancelarVenta

function exportPdf() {
      var pdf = new jsPDF('l', 'pt', 'letter');
      var source = $('#pdf').get(0);

      specialElementHandlers = {
          '#bypassme': function (element, renderer) {
              return true;
          }
      };

      margins = {
          top: 40,
          bottom: 20,
          left: 100,
          width: "100%"
      };

      pdf.fromHTML(
              source,
              margins.left,
              margins.top, {
                  'width': margins.width,
                  'elementHandlers': specialElementHandlers
              },
              function (dispose) {
                  pdf.save($('#compradorNumeroIdentificacion').val()+"-"+$('#compradorNombreCompleto').val()+'.pdf');
              }, margins);
  }


  function mostrarMensaje(estado,mensaje){
      if(estado === "success"){
          reset();
          alertify.success(mensaje);
          return false;
      }else if(estado === "error"){
          reset();
          alertify.error(mensaje);
          return false;
      }else if(estado === "delay"){
        reset();
        alertify.log(mensaje);
        exportPdf();
        return false;
      }//else-if
  }//mostrarMensaje

  /*FUNCION QUE LIMPIA EL ESPACIO PARA COLOCAR LAS NOTIFICACIONES*/
  function reset () {
      $("#toggleCSS").attr("href", "./alertify.default.css");
          alertify.set({
              labels : {
                  ok     : "OK",
                  cancel : "Cancel"
              },
              delay : 5000,
              buttonReverse : false,
              buttonFocus   : "ok"
      });
  }//reset

</script>
