<?php
    session_start();
    $date = new DateTime();
    $idTicket = $_POST['idTicketF'];
    $nombreF = $_POST['nombreF'];
    $apellidoPF = $_POST['apellidoPF'];
    $apellidoMF = $_POST['apellidoMF'];
    $rfc = $_POST['rfc'];
    $correo = $_POST['correo'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120");
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql = "INSERT INTO dbo.factura(fk_id_tickets_factura, fecha_expedicion, nombre_factura, apellido_p_factura, apellido_m_factura, rfc, correo_electronico) VALUES ($idTicket,GETDATE(),'$nombreF','$apellidoPF','$apellidoMF','$rfc','$correo')";
    $res=sqlsrv_query($con,$sql);
    while(sqlsrv_fetch_array($res)){

    }
    header("Location: agregarPedidos.php");
?>