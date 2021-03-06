<?php

include './subastaBusiness.php';
 if (isset($_POST['Eliminar'])) {
    if (isset($_POST['tabla'])) {

        $subastaid = $_POST['Eliminar'];
        $subastaBusiness = new subastaBusiness();
        if($_POST['tabla']=='resubasta'){
          $resultado = $subastaBusiness->eliminarResubasta($subastaid);
        }else{
          $resultado = $subastaBusiness->eliminarVenta($subastaid);
        }

    } else {
        header("location: ../../view/subastaView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['registrarVenta'])) {

    $ventas = json_decode($_POST['registrarVenta'], true);

    foreach ($ventas as $venta) {
        $subastaCompradorId = $venta[0]['comprador'];
        $subastaPrecio = $venta[1]['precio'];
        $subastaAnimalId = $venta[2]['numeroAnimal'];
    }

    if (strlen($subastaCompradorId) > 0 && strlen($subastaAnimalId) > 0 && strlen($subastaPrecio) > 0) {

        $subastaBusiness = new subastaBusiness();

        $resultado = $subastaBusiness->insertarVenta($subastaAnimalId, $subastaCompradorId,
        $subastaPrecio);

        echo "La inserción se realizo adecuadamente";

    } else {
        echo "Error al momento de insertar el dato";
    }//if si se dejo en blanco
}else if (isset($_POST['insertarResubasta'])) {

    $resubastas = json_decode($_POST['insertarResubasta'], true);

    foreach ($resubastas as $resubasta) {
        $subastaCompradorId = $resubasta[0]['comprador'];
        $subastaPrecio = $resubasta[1]['precio'];
        $subastaAnimalId = $resubasta[2]['numeroAnimal'];
    }

    if (strlen($subastaCompradorId) > 0 && strlen($subastaAnimalId) > 0 && strlen($subastaPrecio) > 0) {

            $subastaBusiness = new subastaBusiness();

            $resultado = $subastaBusiness->insertarResubasta($subastaAnimalId, $subastaCompradorId,
            $subastaPrecio);

            echo "La inserción se realizo adecuadamente";
    } else {
        echo "Error al momento de insertar el dato";
    }//if si se dejo en blanco
  }else if (isset($_POST['eliminarSubastaResubasta'])) {

     if (isset($_POST['subastaid'])) {

         $subastaid = $_POST['subastaid'];

         $subastaBusiness = new subastaBusiness();
         $resultado = $subastaBusiness->eliminarTBSubastaResubasta($subastaid);

         if ($resultado == 1) {
             header("location: ../../view/subastaView.php?success=deleted");
         } else {
             header("location: ../../view/subastaView.php?error=dbError");
         }//if error a nivel de base
     } else {
         header("location: ../../view/subastaView.php?error=error");
     }//if si esta seteado el campo
 } else if (isset($_POST['obtenerMontoSubastas'])) {
    
    $subastaBusiness = new subastaBusiness();
    $resultado = $subastaBusiness->obtenerMontoSubastas();

 }else if(isset($_POST['FacturaComprador'])){
   $compradorid = $_POST['FacturaComprador'];

   $subastaBusiness = new subastaBusiness();
   $resultado = $subastaBusiness->obtenerVentasPorComprador($compradorid);

}else if (isset($_POST['vistaRegistroSubasta'])) {
    $subastaBusiness = new SubastaBusiness();
    $respuesta = $subastaBusiness->obtenerDatosSubastas();
}else if (isset($_POST['ObtenerResubastasyVentas'])) {
    $subastaBusiness = new SubastaBusiness();
    $respuesta = $subastaBusiness->obtenerResubastasYventas();

}else if (isset($_POST['obtenerUnaVenta'])) {
    $idVenta = $_POST['obtenerUnaVenta'];
    $subastaBusiness = new SubastaBusiness();
    $respuesta = $subastaBusiness->obtenerUnaVenta($idVenta);
}
else if (isset($_POST['obtenerUnaResubasta'])) {
    $idSubasta = $_POST['obtenerUnaResubasta'];
    $subastaBusiness = new SubastaBusiness();
    $respuesta = $subastaBusiness->obtenerUnaResubasta($idSubasta);

}else if (isset($_POST['actualizar'])) {

    if(isset($_POST['numeroVenta']) || isset($_POST['numeroAnimal']) || isset($_POST['numeroComprador']) || isset($_POST['precio']) || isset($_POST['table'])){

        $subastaNumeroVenta = $_POST['numeroVenta'];
        $subastaCompradorId = $_POST['numeroComprador'];
        $subastaPrecio = $_POST['precio'];
        $subastaAnimalId = $_POST['numeroAnimal'];
        $table = $_POST['table'];

        if(strlen($subastaCompradorId) > 0 && strlen($subastaAnimalId) > 0 && strlen($subastaPrecio) > 0 && $subastaNumeroVenta > -1 && $table != "default") {

            $subastaBusiness = new subastaBusiness();
            $resultado = $subastaBusiness->actualizarVenta(new subasta($subastaNumeroVenta, $subastaAnimalId, $subastaCompradorId, $subastaPrecio, 0), $table);
                
            echo "La inserción se realizo adecuadamente";

        } else {
            echo "Error al momento de insertar el dato";
        }//if si se dejo en blanco
    }else{
        echo "No se ha enviado todos los datos";
    }//if-else
}

?>
