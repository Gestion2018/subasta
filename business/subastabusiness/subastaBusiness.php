<?php
/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['Eliminar']) || isset($_POST['insertarVenta']) || isset($_POST['insertarResubasta'])
|| isset($_POST['eliminarSubastaVenta']) || isset($_POST['eliminarSubastaResubasta'])
|| isset($_POST['obtener']) || isset($_POST['registrarVenta']) || isset($_POST['obtenerMontoSubastas'])
|| isset($_POST['FacturaComprador']) || isset($_POST['vistaRegistroSubasta']) || isset($_POST['ObtenerResubastasyVentas']) || isset($_POST['obtenerUnaVenta']) || isset($_POST['obtenerUnaResubasta']) || isset($_POST['actualizar'])) {
    include_once '../../data/subastadata/subastadata.php';
}else {
    include_once '../data/subastadata/subastadata.php';
}
class SubastaBusiness {

    private $subastaData;

    public function SubastaBusiness() {
        $this->subastaData = new SubastaData();
    }//constructor

    public function insertarTBSubastaVenta($subasta) {
        return $this->compradorData->insertarSubastaVenta($subasta);
    }//InsertarComprador

    public function insertarTBSubastaResubasta($subasta) {
        return $this->compradorData->insertarSubastaResubasta($subasta);
    }//InsertarComprador


    public function eliminarVenta($subastaid) {
        return $this->subastaData->eliminarVenta($subastaid);
    }//EliminarComprador

    public function eliminarResubasta($subastaid) {
        return $this->subastaData->eliminarResubasta($subastaid);
    }//EliminarComprador


    public function obtenerTBSubastaVenta() {
        return $this->subastaData->obtenerSubastaVenta();
    }//ObtenerComprador

    public function obtenerTBSubastaResubasta() {
        return $this->subastaData->obtenerSubastaResubasta();
    }//ObtenerComprador

    public function obtenerAnimalesComprador($tipo){
        return $this->compradorData->obtenerAnimalesComprador($tipo);
    }//obtenerAnimalesComprador



    public function insertarVenta($ventaAnimal, $ventaComprador, $subastaPrecio){
        return $this->subastaData->insertarVenta($ventaAnimal, $ventaComprador, $subastaPrecio);
    }//obtenerAnimalesComprador

    public function insertarResubasta($resubastaAnimal, $resubastaComprador,
    $resubastaPrecio){
        return $this->subastaData->insertarResubasta($resubastaAnimal, $resubastaComprador,
        $resubastaPrecio);
    }//obtenerAnimalesComprador

    public function obtenerVentasPorComprador($compradorid){

      return $this->subastaData->obtenerVentasPorComprador($compradorid);

    }

    public function obtenerMontoSubastas() {
        return $this->subastaData->obtenerMontoSubastas();
    }//insertarVenta

    /*Obtiene los ultimos 4 registros*/
    public function obtenerDatosSubastas() {
        return $this->subastaData->obtenerDatosSubastas();
    }//obtenerDatosActualizar

    public function obtenerResubastasYventas() {
         return $this->subastaData->obtenerResubastasYventas();
    }

    public function obtenerUnaVenta($idVenta) {
         return $this->subastaData->obtenerUnaVenta($idVenta);
    }

    public function obtenerUnaResubasta($idSubasta) {
         return $this->subastaData->obtenerUnaResubasta($idSubasta);
    }

    public function actualizarVenta($subasta, $table) {
        return $this->subastaData->actualizarVenta($subasta, $table);
    }//InsertarComprador
}//class

?>
