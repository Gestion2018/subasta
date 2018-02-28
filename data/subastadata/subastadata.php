<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['Eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])
|| isset($_POST['obtener']) || isset($_POST['registrarVenta']) || isset($_POST['insertarResubasta']) || isset($_POST['obtenerMontoSubastas']) || isset($_POST['FacturaComprador']) || isset($_POST['ObtenerResubastasyVentas']) || isset($_POST['obtenerUnaVenta']) || isset($_POST['vistaRegistroSubasta']) || isset($_POST['obtenerUnaResubasta'])) {

    include_once '../../data/data.php';
    include '../../domain/subasta/subasta.php';

}else {

    include_once '../data/data.php';
    include '../domain/subasta/subasta.php';

}


class SubastaData extends Data {

	public function insertarVenta($ventaAnimal, $ventaComprador, $ventaPrecio) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(ventaid) AS ventaid  FROM tbventa";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbventa VALUES (" . $nextId . "," . $ventaAnimal . "," . $ventaComprador . "," . $ventaPrecio . "," ."'A'" . ");";

        $result = mysqli_query($conn, $queryInsert);

        $queryActualizarAnimal = "UPDATE tbanimal SET  animalestado = " . "'vendido'".
                " WHERE animalnumero = " . $ventaAnimal . ";";

        mysqli_query($conn, $queryActualizarAnimal);

        mysqli_close($conn);

        $this->insertarControl($ventaAnimal, $ventaComprador, $ventaPrecio);
    }//insertarVenta

    public function insertarResubasta($resubastaAnimal, $resubastaComprador,
    $resubastaPrecio) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(resubastaid) AS resubastaid  FROM tbresubasta";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbresubasta VALUES (" . $nextId . "," .$resubastaAnimal. ",
        " .$resubastaComprador. "," .$resubastaPrecio. "," ."'A'" . ");";

        $result = mysqli_query($conn, $queryInsert);

        $queryActualizarAnimal = "UPDATE tbanimal SET  animalestado = " . "'resubastado'".
                " WHERE animalnumero = " . $resubastaAnimal . ";";

        mysqli_query($conn, $queryActualizarAnimal);

        mysqli_close($conn);

        $this->insertarControl($resubastaAnimal, $resubastaComprador, $resubastaPrecio);
    }//insertarresubasta

    public function insertarControl($Animal, $Comprador, $Precio) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryInsert = "INSERT INTO tbsubasta (id_animal, id_comprador, precio) VALUES (" . $Animal . "," . $Comprador . "," . $Precio . ");";

        $result = mysqli_query($conn, $queryInsert);

        mysqli_close($conn);

    }//insertarVenta

    public function eliminarVenta($subastaid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbventa SET ventaestado = 'B' WHERE ventaid = " . $subastaid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarVenta

    public function eliminarRresubasta($subastaid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbresubasta SET resubastaestado = 'B' WHERE resubastaid = " . $subastaid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarResubasta

    public function obtenerVentas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbventa;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $ventas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['ventaestado']!='B' && $row['ventaestado'] != 'C'){
                 $subasta = new subasta($row['ventaid'], $row['ventaanimal']
                ,$row['ventacomprador'],$row['ventaprecio'], $row['ventaestado']);
                array_push($ventas, $subasta);

            }//end if

        }//end while

        return $ventas;

    }//obtenerVentas

    public function obtenerResubastas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbresubasta;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $resubastas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['resubastaestado']!='B' && $row['resubastaestado'] != 'C'){
                 $subasta = new subasta($row['resubastaid'], $row['resubastaanimal']
                ,$row['resubastacomprador'],$row['resubastaprecio'], $row['resubastaestado']);
                array_push($resubastas, $subasta);

            }//end if

        }//end while

        return $resubastas;

    }//obtenerResubastas

    public function obtenerResubastasYventas() {

                $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
                $conn->set_charset('utf8');

                $querySelect = "SELECT tbventa.ventaid,tbventa.ventaanimal,tbventa.ventacomprador,tbventa.ventaprecio,tbventa.ventaestado FROM tbventa WHERE tbventa.ventaestado <>'B';";
                 $querySelect2 = "SELECT tbresubasta.resubastaid,tbresubasta.resubastaanimal,
                 tbresubasta.resubastacomprador,tbresubasta.resubastaprecio,tbresubasta.resubastaestado
                 FROM tbresubasta WHERE tbresubasta.resubastaestado <>'B';";
                $result1 = mysqli_query($conn, $querySelect);
                $result2 = mysqli_query($conn, $querySelect2);

                mysqli_close($conn);
                $allVentas["Ventas"][] = [];
                $allVentas["Resubastas"][] = [];
                while ($row = mysqli_fetch_array($result1)) {
                        $allVentas["Ventas"][] = $row;
                }//end while

                while ($row = mysqli_fetch_array($result2)) {
                        $allVentas["Resubastas"][] = $row;
                }//end while

                echo json_encode($allVentas);

        }//obtenerResubastas

        public function obtenerUnaVenta($idVenta){

            $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            $conn->set_charset('utf8');
            $querySelect = "SELECT * FROM tbventa WHERE ventaid=" . $idVenta. ";";
            $result1 = mysqli_query($conn, $querySelect);
            while ($row = mysqli_fetch_array($result1)) {
                    $venta["venta"][] = $row;
            }//end while
            echo json_encode($venta);
        }
        public function obtenerUnaResubasta($idResubasta){

            $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            $conn->set_charset('utf8');
            $querySelect = "SELECT * FROM tbresubasta WHERE resubastaid=" . $idResubasta. ";";
            $result1 = mysqli_query($conn, $querySelect);
            while ($row = mysqli_fetch_array($result1)) {
                    $resubasta["resubasta"][] = $row;
            }//end while
            echo json_encode($resubasta);
        }


    public function obtenerMontoSubastas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //monto acumulado de las subastas realizadas
        $queryMonto = "SELECT SUM(precio) AS precio  FROM tbsubasta";
        $idCont = mysqli_query($conn, $queryMonto);

        if ($row = mysqli_fetch_row($idCont)) {
            $montoVentas = trim($row[0]);
        }//end if

        if($montoVentas == ""){
            $montoTotal = 0;
        }else{
            $montoTotal = $montoVentas + 0;
        }
        

        mysqli_close($conn);

        echo json_encode($montoTotal);

    }//insertarVenta


    public function obtenerVentasPorComprador($compradorId){
            $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            $conn->set_charset('utf8');

            $querySelectVentas = "SELECT tbcomprador.compradorcodigo,tbcomprador.compradornombrecompleto,
             tbcomprador.compradortelefono,tbventa.ventaid,tbventa.ventaprecio,
             tbventa.ventaanimal,tbventa.ventaestado FROM tbcomprador,tbventa WHERE tbventa.ventacomprador=" .$compradorId.
              " AND tbcomprador.compradorcodigo =" .$compradorId.";";

            $querySelectResubastas = "SELECT tbcomprador.compradorcodigo,tbcomprador.compradornombrecompleto,
             tbcomprador.compradortelefono,tbresubasta.resubastaid,tbresubasta.resubastaprecio,
             tbresubasta.resubastaanimal,tbresubasta.resubastaestado FROM tbcomprador,tbresubasta WHERE tbresubasta.resubastacomprador=" .$compradorId.
          " AND tbcomprador.compradorcodigo =" .$compradorId. ";";

            $resultVentas = mysqli_query($conn, $querySelectVentas);
            $resultResubastas = mysqli_query($conn, $querySelectResubastas);

            mysqli_close($conn);
            $ventas["Ventas"][] = [];
            $ventas["Resubastas"][] = [];
            while ($row = mysqli_fetch_array($resultVentas)) {
							if($row['ventaestado']!='C' && $row['ventaestado']!='B'){
								$ventas["Ventas"][] = $row;
							}
            }//end while

            while ($row = mysqli_fetch_array($resultResubastas)) {
							if($row['resubastaestado']!='C' && $row['resuabastaestado']!='B'){
								$ventas["Resubastas"][] = $row;
							}
						}//end while

            echo json_encode($ventas);
    }//Facturas por

    public function obtenerDatosSubastas() {
       $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
       $conn->set_charset('utf8');

       $querySelect = "SELECT id, id_animal, id_comprador,
       precio FROM tbsubasta ORDER BY id DESC LIMIT 4";

       //SELECT * FROM tabla ORDER BY id DESC LIMIT 5

       $result = mysqli_query($conn, $querySelect);
       mysqli_close($conn);

       $flag = false;

       while ($row = mysqli_fetch_array($result)) {
           $subastas["Data"][] = $row;

           $flag = true;
       }//end while

       if ($flag == true) {
           echo json_encode($subastas);
       }else {
           echo "Sin coincidencias";
       }

   }//obteneranimales

   public function actualizarSubasta($subasta, $subastaAnterior){

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(ventaid) AS ventaid  FROM tbventa";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryUpdateState = "UPDATE tbventa SET  ventaestado = " . "'B'". " WHERE ventaid = " . $subasta->getSubastaId() . ";";

        $result = mysqli_query($conn, $queryUpdateState);

        $queryInsert = "INSERT INTO tbventa VALUES (" . $nextId . "," . $subasta->getSubastaAnimal() . "," . $subasta->getSubastaComprador() . "," . $subasta->getSubastaPrecio() . "," ."'A'" . ");";

        $resultInsert = mysqli_query($conn, $queryInsert);

        $queryDelete = "DELETE FROM tbsubasta WHERE id_animal = " . $subastaAnterior->getSubastaAnimal()." AND id_comprador= ".$subastaAnterior->getSubastaComprador().";";

        $resultDelete = mysqli_query($conn, $queryDelete);

        mysqli_close($conn);

        $this->insertarControl($subasta->getSubastaAnimal(), $subasta->getSubastaComprador(), $subasta->getSubastaPrecio());
   }//actualizarSubasta

   public function actualizarResubasta($subasta, $subastaAnterior){

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(resubastaid) AS resubastaid  FROM tbresubasta";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryUpdateState = "UPDATE tbresubasta SET  resubastaestado = " . "'B'". " WHERE resubastaid = " . $subasta->getSubastaId() . ";";

        $result = mysqli_query($conn, $queryUpdateState);

        $queryInsert = "INSERT INTO tbresubasta VALUES (" . $nextId . "," . $subasta->getSubastaAnimal() . "," . $subasta->getSubastaComprador() . "," . $subasta->getSubastaPrecio() . "," ."'A'" . ");";

        $resultInsert = mysqli_query($conn, $queryInsert);

        $queryDelete = "DELETE FROM tbsubasta WHERE id_animal = " . $subastaAnterior->getSubastaAnimal()." AND id_comprador= ".$subastaAnterior->getSubastaComprador().";";

        $resultDelete = mysqli_query($conn, $queryDelete);

        mysqli_close($conn);

        $this->insertarControl($subasta->getSubastaAnimal(), $subasta->getSubastaComprador(), $subasta->getSubastaPrecio());
   }//actualizarSubasta

   public function actualizarVenta($subasta, $table) {
        /*Actualizar el estado de la venta o de la resubasta (Borrado lógico)*/
        if($table == "tbventa"){
            $datos = $this->obtenerDatosVenta($subasta->getSubastaId());
            $this->actualizarSubasta($subasta, $datos);
        }else if($table == "tbresubasta"){
            $datos = $this->obtenerDatosResubasta($subasta->getSubastaId());
            $this->actualizarResubasta($subasta, $datos);
        }//if-else
    }//insertarVenta

    public function obtenerDatosVenta($idVenta){

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT * FROM tbventa WHERE ventaid=" . $idVenta. ";";
        $result1 = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $datos;
        while ($row = mysqli_fetch_array($result1)) {
            $datos = new subasta($row['ventaid'], $row['ventaanimal']
           ,$row['ventacomprador'],$row['ventaprecio'], $row['ventaestado']);
        }//end while
        return $datos;
    }

    public function obtenerDatosResubasta($idResubasta){

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT * FROM tbresubasta WHERE resubastaid=" . $idResubasta. ";";
        $result1 = mysqli_query($conn, $querySelect);
        $datos;
        mysqli_close($conn);
        while ($row = mysqli_fetch_array($result1)) {
            $datos = new subasta($row['resubastaid'], $row['resubastaanimal']
           ,$row['resubastacomprador'],$row['resubastaprecio'], $row['resubastaestado']);
        }//end while
        return $datos;
    }

}//end class

?>
