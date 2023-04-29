<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/productosGaleon.css">
    <link rel="stylesheet" href="/style/eventosGaleon.css">
</head>
<body>
    <div>
        <ul id="menu">
        <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/index-galeon.php">Inicio</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/html/index.html" id="title">Galeras</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/productosGaleon.php">Productos</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/eventosGaleon.php">Eventos</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="">Comparativa</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="">Almacen</a></li>    
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/cuentas.php">Cuentas</a></li>   
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="">Historial</a></li>    
        </ul>
    </div>
    <div id="shadowForm">
        <h1></h1>
    </div>
    <div id="boxForm">
        <br>
        <h1>Agregar eventos</h1>
        <form action="/php/verificacionEventos.php" method="post">
            <input type="text" name="titleEvento" id="" placeholder="Titulo">
            <textarea name="descripcionEvento" id="" cols="22" rows="7" placeholder="Descripcion"></textarea>
            <br>
            <select name="cTipoEvento">
                <?php
                    $stmt = "209.126.107.8";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
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
            </select><button>Enviar</button>
        </form>
    </div>
</body>
</html>