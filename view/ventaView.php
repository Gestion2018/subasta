<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Subasta</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="./alertify.core.css" />
        <link rel="stylesheet" href="./alertify.default.css" id="toggleCSS" />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../js/jquery-1.11.0.min.js"></script>
        <script src="./alertify.min.js"></script>
        <!-- Custom Theme files -->
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
        <!-- start-->

        <script src="./jquery-3.2.1.js"></script>
        <link href="../select2.min.css" rel="stylesheet" />
        <script src="../select2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="jquery-ui.css"/>
        <script type="text/javascript" src="jquery-ui.js"></script>

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
 <div class="container">
   <div class="single">
        <div class="banner-bottom">
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider4">
                    <li>
                    <div class=" col-md-2 banner-right comment-bottom">
                            <div>
                                <h3>Tipo de Vista</h3> <br>
                                <div><input type ="radio" name ="vista" value ="1" checked> Inserción</div>
                                <div><input type ="radio" name ="vista" value ="2"> Actualización</div>
                            </div>
                        </div>
                    <div id="espaciosInsertar">
                        <div class=" col-md-5 comment-bottom">
                            <h3 id="datosAnimalInsert">Datos de Animal</h3>
                            <form id="cargarD">
                                <label id="numeroAnimalInsert" for="">Número animal</label>
                                <input type="number" id="numeroAnimal2" name="numeroAnimal2" autofocus>
                                <!-- <select id="numeroAnimal" name="numeroAnimal" class="pruebaSelect"></select> -->
                            </form>

                            <form id="datosAnimal"></form>
                            <label id="message" hidden for="Error" style="color:red">Sin coincidencias</label>
                        </div>
                        <div class="col-md-5 banner-right">
                            <div class="comment-bottom">
                                <h3 id="otrosDatosInsert">Otros datos</h3>
                                <form>
                                    <label id="nombreCompradorInsert" for="">Comprador</label>
                                    <!-- <select id="nombreComprador"></select> -->
                                    <input type="text" id="nombreComprador"  name="nombreComprador">

                                    <label id="priceInsert" for="Precio">Precio</label>

                                    <input id="price" autocomplete="off" name="price" type="text" class="form-control
                                    required" data-mask="₡"placeholder="₡">
                                    <div class="col-md-5 banner-right">
                                        <input type="button" id="insertarVenta" class="button_subasta" value="Vender" onclick="registrarAnimal()">
                                    </div>
                                    <div class="col-md-2 banner-right"></div>
                                    <div class="col-md-5 banner-right">
                                        <input type="button" id="insertarResubasta" class="button_subasta" value="Resubastar" onclick="registrarReSubasta()">
                                    </div>
                                    <br><br>
                                </form>
                            </div>
                        </div>
                    </div>
                        
                        
                    <div id="espaciosActualizar">
                        <div class=" col-md-5 comment-bottom">
                            <h3 id="subastasUpdate">Subastas</h3>
                            <form id="cargarD">
                                
                                     <label  id="lSubastas" for="">Subastas</label>
                                    <select id="subastas" name="subastas"></select>
                                
                                
                                    <label id="lResubastas" for="">Resubastas</label>
                                    <select id="resubastas" name="resubastas"></select>
                                
                            </form>
                        </div>
                        <div class="col-md-5 banner-right comment-bottom">
                                <h3 id="datosUpdate">Datos</h3>
                                <form>
                                    <input type="hidden" name="numeroVenta" id="numeroVenta" value="-1">
                                    <input type="hidden" name="table" id="table" value="default">
                                    <label id="lNumeroAnimalUpdate" for="">Numero de Animal</label>
                                    <!-- <select id="nombreComprador"></select> -->
                                    <input type="text" id="numeroAnimalUpdate"  name="numeroAnimalUpdate">

                                    <label id="lNombreCompradorUpdate" for="">Comprador</label>
                                    <!-- <select id="nombreComprador"></select> -->
                                    <input type="text" id="nombreCompradorUpdate"  name="nombreCompradorUpdate">

                                    <label id="lPriceUpdate" for="Precio">Precio</label>

                                    <input id="priceUpdate" autocomplete="off" name="priceUpdate" type="text" class="form-control
                                    required" data-mask="₡"placeholder="₡">
                                    <div>
                                        <input id="actualizar" type="button" class="button_subasta" value="Actualizar" onclick="actualizarRegistro();">
                                    </div>
                                    <br><br>
                                </form>
                            
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
        <span class="mover"> </span>
  </div>
</div>
<!--header end here-->
<!--footer start here-->
<br><br>
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

    /*Se carga los números de los animales en el combo*/
    $.ajax({
      url: '../business/animalbusiness/animalAction.php',
      type: 'POST',
      dataType: 'text',
      data: {'obtenerNumerosAnimales' : 'obtenerNumerosAnimales'}
    })
    .done(function(resp){
        /*Convierte el objeto codificado en un objeto json*/
        var numeros = JSON.parse(resp);
        var asignacion = "<option disabled selected>Número</option>"

        /*Se generan las respectivas opciones del combobox*/
        for (var i = 0; i < numeros.Data.length; i++) {
            asignacion +="<option value='" + numeros.Data[i].animalnumero + "'>"+
            numeros.Data[i].animalnumero +"</option>";
        }

        /*Se envían los numeros al combobox*/
        $("#numeroAnimal").html(asignacion);

    }).fail( function(error, textStatus, errorThrown) {
        console.log(error.value); //Check console for output
        //$("#loadIMg").hide();//#datos es un div
    });

    $(document).ready(function() {
        cargarCompradores();
        cargarAnimales();
        cargarVentasResubastas();
        mostrarCamposInsertar();
    });

    function cargarVentasResubastas(){
        $.post("../business/subastabusiness/subastaAction.php",{'ObtenerResubastasyVentas': 'ObtenerResubastasyVentas'}, function(data){
            var allVentas = JSON.parse(data);

            document.getElementById("subastas").options.length = 0;
            $('#subastas').append($("<option></option>").attr("value", "-1").text("Seleccione la Subastas"));
            for (var i = 1; i <allVentas.Ventas.length; i++) {
                $('#subastas').append($("<option></option>").attr("value", allVentas.Ventas[i].ventaid).text( "Animal: "+allVentas.Ventas[i].ventaanimal+" - Comprador: "+allVentas.Ventas[i].ventacomprador));
            }//for

            document.getElementById("resubastas").options.length = 0;
            $('#resubastas').append($("<option></option>").attr("value", "-1").text("Seleccione la Resubastas"));
            for (var i = 1; i <allVentas.Ventas.length; i++) {
                $('#resubastas').append($("<option></option>").attr("value", allVentas.Resubastas[i].resubastaid).text( "Animal: "+allVentas.Resubastas[i].resubastaanimal+" - Comprador:"+allVentas.Resubastas[i].resubastacomprador));
            }//for

            /*asignacion1 = "";
            asignacion2 = "";
            for (var i = 1; i < allVentas.Resubastas.length; i++) {
                asignacion1 +="<option value='" + allVentas.Ventas[i].ventaid+"'>"+ allVentas.Ventas[i].ventaanimal+"-"+allVentas.Ventas[i].ventacomprador +"</option>";
            }//end for
            $('#subastas').html(asignacion1);

            for (var i = 1; i < allVentas.Resubastas.length; i++) {
                asignacion2 +="<option value='" + allVentas.Resubastas[i].resubastaanimal+"'>"+ allVentas.Resubastas[i].resubastaanimal+"-"+allVentas.Resubastas[i].resubastacomprador +"</option>";
            }//end for

            $('#resubastas').html(asignacion2);*/
       });
    }

    $('#subastas').change(function(){
        var ventaid = $(this).val();
        if(ventaid != "-1"){
            $.post("../business/subastabusiness/subastaAction.php",{'obtenerUnaVenta': ventaid}, function(data){
                //alert(data);
                var venta = JSON.parse(data);
                limpiarEspaciosActualizacion();
                $('#numeroAnimalUpdate').val(venta.venta[0].ventaanimal);
                $('#nombreCompradorUpdate').val(venta.venta[0].ventacomprador);
                $('#priceUpdate').val(venta.venta[0].ventaprecio);
                $('#numeroVenta').val(venta.venta[0].ventaid);
                $('#table').val("tbventa");
            });
        }else{
            limpiarEspaciosActualizacion();
        }//if-else
    });

    $('#resubastas').change(function(){
        var resubastaid = $(this).val();
        if(resubastaid != "-1"){
            $.post("../business/subastabusiness/subastaAction.php",{'obtenerUnaResubasta': resubastaid}, function(data){
                //alert(data);
                var resubasta = JSON.parse(data);
                limpiarEspaciosActualizacion();
                $('#numeroAnimalUpdate').val(resubasta.resubasta[0].resubastaanimal);
                $('#nombreCompradorUpdate').val(resubasta.resubasta[0].resubastacomprador);
                $('#priceUpdate').val(resubasta.resubasta[0].resubastaprecio);
                $('#numeroVenta').val(resubasta.resubasta[0].resubastaid);
                $('#table').val("tbresubasta");
            });
        }else{
            limpiarEspaciosActualizacion();
        }//if-else
    });

    function cargarCompradores(){
        $.post("../business/compradorbusiness/compradorAction.php",{'obtenerCompradores': 'obtenerCompradores'}, function(data){
            var compradores = JSON.parse(data);
            var items = [];
            for (var i = 0; i < compradores.Data.length; i++) {
                items.push(compradores.Data[i].compradorcodigo + " - " + compradores.Data[i].compradornombrecompleto);
            }
            $("#nombreComprador").autocomplete({
                source: items
            });
        });
    }

    function cargarAnimales(){
        $.post("../business/animalbusiness/animalAction.php",{'obtenerNumerosAnimales': 'obtenerNumerosAnimales'}, function(data){
            var animales = JSON.parse(data);
            var items = [];
            for (var i = 0; i < animales.Data.length; i++) {
                items.push(animales.Data[i].animalnumero);
            }
            $("#numeroAnimal2").autocomplete({
                source: items
            });
        });
    }

    /*Se carga los nombres de los compradores en el combo*/
    $.ajax({
      url: '../business/compradorbusiness/compradorAction.php',
      type: 'POST',
      dataType: 'text',
      data: {'obtenerCompradores' : 'obtenerCompradores'}
    })
    .done(function(resp){
        /*Convierte el objeto codificado en un objeto json*/
        var comprador = JSON.parse(resp);
        var asignacion = "<option disabled selected>Comprador</option>"

        /*Se generan las respectivas opciones del combobox*/
        for (var i = 0; i < comprador.Data.length; i++) {
            asignacion +="<option value='" + comprador.Data[i].compradorcodigo + "'>"+
            comprador.Data[i].compradornombrecompleto +"</option>";
        }

        /*Se envían los numeros al combobox*/
        $("#nombreComprador").html(asignacion);

    }).fail( function(error, textStatus, errorThrown) {
        console.log(error.value); //Check console for output
        //$("#loadIMg").hide();//#datos es un div
    });

    /*Se captura el número del animal escogido por el usuario*/
    $("#numeroAnimal").change(function(){
        var opcion = $(this).val();

        /*Se llama a la función que carga los datos en el formulario*/
        cargarDatos(opcion);
    });

    $("#numeroAnimal2").blur(function(){
        var opcion = $(this).val();
        cargarDatos(opcion);
    });

    /*Se traen los daros correspondientes del animal, y se recibe por parámetro
    el número del animal*/
    function cargarDatos(opcion){
        /*Se valida si el usuario escogió una opción correcta y no la opción
        por defecto "Número"*/
        if (opcion != '') {

            $.ajax({
              url: '../business/animalbusiness/animalAction.php',
              type: 'POST',
              dataType: 'text',
              data: {'animalNumero' : parseInt(opcion)}
            })
            .done(function(resp){
                /*Convierte el objeto codificado en un objeto json*/
                
                var datos = JSON.parse(resp);
                var asignacion = "";

                /*Se generan las respectivas opciones del formulario*/
                for (var i = 0; i < datos.Data.length; i++) {
                    asignacion +="<label id='lblDonador' for='Donador'>Donador</label>"+
                    "<input type='text' id='txtDonador' readonly value='" + datos.Data[i].animaldonador + "'>"+
                    "<label id='lblLugarProc' for='Lugar de procedencia'>Lugar de procedencia</label>"+
                    "<input type='text' id='txtLugarProc' readonly value='" + datos.Data[i].animallugarprocedencia + "'>"+
                    "<label id='lblTipAnimal' for='Tipo del animal'>Tipo de animal</label>"+
                    "<input type='text' id='txtTipAnimal' readonly value='" + datos.Data[i].tipoanimalnombre + "'>"+
                    "<label id='lblRazaAnimal' for='Raza del animal'>Raza de animal</label>"+
                    "<input type='text' id='txtRazaAnimal' readonly value='" + datos.Data[i].razanombre  + "'>"+
                    "<label id='lblEstadoAnimal' for='Estado del animal'>Estado del animal</label>"+
                    "<input type='text' id='txtEstadoAnimal' readonly value='" + datos.Data[i].animalestado + "'>"+
                    "<label id='lblDescripcion' for='Descripción'>Descripción</label>"+
                    "<textarea id='txtDescripcion' readonly>" + datos.Data[i].animaldescripcion + "</textarea>";
                }

                /*Se envían los datos al formulario*/
                $("#datosAnimal").html(asignacion);

                $('#message').hide();
                limpiarEspaciosActualizacion();

            }).fail( function(error, textStatus, errorThrown) {
                console.log(error.value); //Check console for output
                limpiarEspaciosActualizacion();
                //$("#loadIMg").hide();//#datos es un div
            });
        }else {
            /*Se ocultan todos los label*/
            $('#lblDonador').hide();
            $('#lblLugarProc').hide();
            $('#lblTipAnimal').hide();
            $('#lblRazaAnimal').hide();
            $('#lblEstadoAnimal').hide();
            $('#lblDescripcion').hide();

             /*Se ocultan todos los input*/
            $('#txtDonador').hide();
            $('#txtLugarProc').hide();
            $('#txtTipAnimal').hide();
            $('#txtRazaAnimal').hide();
            $('#txtEstadoAnimal').hide();
            $('#txtDescripcion').hide();

            limpiarEspaciosActualizacion();
        }
    }

    /*Se encarga de la venta de un animal*/
    function registrarAnimal() {
        var precio, comprador, numeroAnimal;

        /*Se capturan los datos de los campos de texto*/
        precio = document.getElementById("price").value;
        comprador = document.getElementById("nombreComprador").value.split(" - ")[0];
        numeroAnimal = document.getElementById("numeroAnimal2").value;

        /*Se arma un objeto JSON*/
        var datos;

        datos = {
            "animal": [
                { "comprador": comprador},
                { "precio": precio},
                { "numeroAnimal": numeroAnimal}
            ]
        }

        $.ajax({
          url: '../business/subastabusiness/subastaAction.php',
          type: 'POST',
          dataType: 'text',
          data: {'registrarVenta' : JSON.stringify(datos)}
        })
        .done(function(resp){

            var respuesta;

            if (resp == "Error al momento de insertar el dato") {
                /*respuesta = "<label id='lblDonador' for='" + resp +"' style='color:red'>"+
                resp + "</label>";*/
                mostrarMensaje("error", resp);
                limpiarEspaciosActualizacion();
            }else {
                /*respuesta = "<label id='lblDonador' for='" + resp +"' style='color:green'>"+
                resp + "</label>";*/
                //$("#numeroAnimal option[value='"+numeroAnimal+"']").remove();

                registro = (parseInt($("#registro").text()) + parseInt($("#price").val()));
                $("#registro").html(registro);

                $('#numeroAnimal2').val("");
                $('#price').val("");
                $('#nombreComprador').val("");


                $('#lblDonador').hide();
                /*Se ocultan todos los label*/
                $('#lblLugarProc').hide();
                $('#lblTipAnimal').hide();
                $('#lblRazaAnimal').hide();
                $('#lblEstadoAnimal').hide();
                $('#lblDescripcion').hide();

                 /*Se ocultan todos los input*/
                $('#txtDonador').hide();
                $('#txtLugarProc').hide();
                $('#txtTipAnimal').hide();
                $('#txtRazaAnimal').hide();
                $('#txtEstadoAnimal').hide();
                $('#txtDescripcion').hide();

                cargarAnimales();
                mostrarMensaje("success", resp);
                limpiarEspaciosActualizacion();
                cargarVentasResubastas();
            }

            //$('#submitMessage').html(respuesta);

        }).fail( function(error, textStatus, errorThrown) {
            console.log(error.value); //Check console for output
            limpiarEspaciosActualizacion();
            //$("#loadIMg").hide();//#datos es un div
        });
    }


    /*Se encarga de la venta de un animal*/
    function registrarReSubasta() {
        var precio, comprador, numeroAnimal;

        /*Se capturan los datos de los campos de texto*/
        precio = document.getElementById("price").value;
        comprador = document.getElementById("nombreComprador").value.split(" - ")[0];
        numeroAnimal = document.getElementById("numeroAnimal2").value;

        /*Se arma un objeto JSON*/
        var datos;

        datos = {
            "animal": [
                { "comprador": comprador},
                { "precio": precio},
                { "numeroAnimal": numeroAnimal}
            ]
        }

        $.ajax({
          url: '../business/subastabusiness/subastaAction.php',
          type: 'POST',
          dataType: 'text',
          data: {'insertarResubasta' : JSON.stringify(datos)}
        })
        .done(function(resp){

            var respuesta;

            if (resp == "Error al momento de insertar el dato") {
                /*respuesta = "<label id='lblDonador' for='" + resp +"' style='color:red'>"+
                resp + "</label>";*/
                mostrarMensaje("error", resp);
                limpiarEspaciosActualizacion();
            }else {
                /*respuesta = "<label id='lblDonador' for='" + resp +"' style='color:green'>"+
                resp + "</label>";*/

                registro = (parseInt($("#registro").text()) + parseInt($("#price").val()));

                $('#lblDonador').hide();
                /*Se ocultan todos los label*/
                $('#lblLugarProc').hide();
                $('#lblTipAnimal').hide();
                $('#lblRazaAnimal').hide();
                $('#lblEstadoAnimal').hide();
                $('#lblDescripcion').hide();

                 /*Se ocultan todos los input*/
                $('#txtDonador').hide();
                $('#txtLugarProc').hide();
                $('#txtTipAnimal').hide();
                $('#txtRazaAnimal').hide();
                $('#txtEstadoAnimal').hide();
                $('#txtDescripcion').hide();

                $('#numeroAnimal2').val("");
                $('#price').val("");
                $('#nombreComprador').val("");

                //alert(registro);
                $("#registro").html(registro);

                cargarAnimales();
                mostrarMensaje("success", resp);
                limpiarEspaciosActualizacion();
                cargarVentasResubastas();
            }

            //$('#submitMessage').html(respuesta);

        }).fail( function(error, textStatus, errorThrown) {
            console.log(error.value); //Check console for output
            limpiarEspaciosActualizacion();
            //$("#loadIMg").hide();//#datos es un div
        });
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
        }//if-else
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
    
    function validarDatos(){

        numeroAnimal = $("#numeroAnimalUpdate").val().trim();
        numeroComprador = $("#nombreCompradorUpdate").val().trim();
        precio = $("#priceUpdate").val().trim();

        if(numeroAnimal.length < 1){
            mostrarMensaje("error", "Debe indicar el animal");
            return false;
        }else if(numeroComprador.length < 1){
            mostrarMensaje("error", "Debe ingresar el comprador");
            return false;
        }else if(precio.length < 1){
            mostrarMensaje("error", "Debe ingresar un precio");
            return false;
        }//if-else

        return true;
    }//validarDatos

    /*FUNCION PARA ACTUALIZAR EL REGISTRO*/
    function actualizarRegistro(){

        if(validarDatos()){
            var parameters = {
                "actualizar" : 'actualizar',
                "numeroVenta": $("#numeroVenta").val(),
                "numeroComprador": $("#nombreCompradorUpdate").val(),
                "numeroAnimal": $("#numeroAnimalUpdate").val(),
                "precio": $("#priceUpdate").val(),
                "table": $("#table").val()
            };

            $.post("../business/subastabusiness/subastaAction.php",parameters, function(data){
                if(data == "La inserción se realizo adecuadamente"){
                    mostrarMensaje("success", data);
                    limpiarEspaciosActualizacion();
                    cargarVentasResubastas();
                }else{
                    mostrarMensaje("error", data);
                }//if-else
            });
        }else{
            //mostrarMensaje("error", "Datos Erroneos");
        }//if-else validacion
    }//actualizarRegistro

    function limpiarEspaciosActualizacion(){
        $("#numeroVenta").val("-1");
        $("#table").val("default");
        $("#numeroAnimalUpdate").val("");
        $("#nombreCompradorUpdate").val("");
        $("#priceUpdate").val("");
    }//limpiarEspaciosActualizacion


    $('input:radio[name=vista]').change(function () {
        if(this.value == '1'){
            limpiarEspaciosActualizacion();
            mostrarCamposInsertar();
        }//if
        if(this.value == '2'){
            limpiarEspaciosActualizacion();
            mostrarCamposActualizar();
        }//if
    });

    function mostrarCamposInsertar(){
        $("#espaciosActualizar").hide();
        $("#espaciosInsertar").show();
        $("#numeroAnimal2").focus();
    }//mostrarCamposInsertar

    function mostrarCamposActualizar(){
        $("#espaciosActualizar").show();
        $("#espaciosInsertar").hide();
    }//mostrarCamposActualizar
</script>
