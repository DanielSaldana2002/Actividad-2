<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/productosGaleon.css">
    <link rel="stylesheet" href="/style/galeon/eventosGaleon.css">
</head>
<body>
    <div>
    <ul id="menu">
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/index-galeon.php">Inicio</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/html/galeras/index.html" id="title">Galeras</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/eventosGaleon.php">Eventos</a></li> 
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/cuentas.php">Cuentas</a></li>   
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Ventas</a>
                <div class="dropdown-content">
                    <a href="/php/galeon/views/productosGaleon.php">Cortes</a>
                    <a href="/php/galeon/views/almacenGaleon.php">Historial</a>
                    <a href="/php/galeon/views/facturaGaleon.php">Factura</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Productos</a>
                <div class="dropdown-content">
                    <a href="/php/galeon/views/productosGaleon.php">Producto</a>
                    <a href="/php/galeon/views/almacenGaleon.php">Almacen</a>
                </div>
                </li>
            </li>      
        </ul>
    </div>
    <div id="shadowForm">
        <h1></h1>
    </div>
    <div id="shadowForm2">
        <h1></h1>
    </div>
    <div id="boxForm">
        <br>
        <h1>Agregar eventos</h1>
        <form action="/php/galeon/controllers/verificacionEventos.php" method="post">
            <input type="text" name="titleEvento" id="" placeholder="Titulo" required>
            <br>
            <textarea name="descripcionEvento" id="" cols="23" rows="5" placeholder="Descripcion" required></textarea>
            <br>
            <input id="dateBox" type="date" name="dateCombo" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
            <select name="cTipoEvento">
                <?php
                    $stmt = "localhost";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT nombre_tipo_evento FROM dbo.tipo_evento";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $categoria = $row['nombre_tipo_evento'];
                        echo <<<TEXTO
                            <option>$categoria</option>
                        TEXTO;
                    }
                ?>
            </select>
            <br><button>Enviar</button>
        </form>
    </div>
    <div id="boxForm2">
        <br><h1>Eventos</h1>
        <div style="height: 400px; overflow-y: scroll;">
            <table >
                <tr id="title-table">
                    <td>Nombre</td>
                    <td>Fecha</td>
                    <td>Creado</td>
                    <td>Tipo</td>
                </tr> 
                <?php
                    $stmt = "localhost";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT nombre_evento, fecha_evento, usuario_sesion, nombre_tipo_evento FROM dbo.eventos INNER JOIN dbo.tipo_evento ON id_tipo_evento = fk_id_tipo_evento INNER JOIN dbo.cuentas ON id_cuenta = fk_id_cuentas_e ORDER BY fecha_evento ASC";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $nombre = $row['nombre_evento'];
                        $fecha = $row['fecha_evento'];
                        $fecha = $fecha->format('Y-m-d  ');
                        $usuario = $row['usuario_sesion'];
                        $tipoE = $row['nombre_tipo_evento'];
                        echo <<<TEXTO
                            <tr id="cuerpoTable">
                                <td>$nombre</td>
                                <td>$fecha</td>
                                <td>$usuario</td>
                                <td>$tipoE</td>
                            </tr> 
                        TEXTO;
                    }
                ?>   
            </table>
        </div>
    </div>
</body>
</html>