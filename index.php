<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Consultar Ruc</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/soloNL.js"></script>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


</head>

 <body style="background: #a7aeb7  position: relative; backgraund-color:#eee;">
    <div class="contenedorr" style="height:100vh; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 90%;  background-color: white; position: absolute; left: 5%" >
        <form class="search" action="" method="post" name="" id="miForm" style="background-image: linear-gradient(to right top, #327e99, #2b7da1, #287ca9, #2d7ab0, #3878b6, #2c78b4, #1d79b2, #0379b0, #007aa1, #007990, #18777f, #337470); width: 100%; box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);" >
            <div class="col-lg-6">
                <div class="input-group">
                    <input class="form-control mr-sm-2" type="text" name="ruc" placeholder="Buscar RUC" aria-label="Search" onkeypress="return solonumeros(event)" maxlength="13" required="">
                    <span class="input-group-btn">
                    <input class="btn btn-success" type="submit" value="Buscar" name="submit"  onclick="busc(),limpiarFormulario()">
                    </span>
                </div>
            </div>
        </form>
        <nav class="navbar fixed-bottom navbar-light bg-light" style="width:90%; left: 5%">
            <div class="container-fluid">
                <p>Desarrollado por Cristian Narváez | ram-mds@hotmail.com</p>
            </div>
        </nav>
    </div>
</body>
</html>

<?php
session_start();//esta linea tiene que ir antes de cualquier cosa, incluso de espacios

if(isset($_POST['submit'])){
    
        $ruc=$_POST['ruc'];
    
        $url = 'https://servicio-api.herokuapp.com/personas/'.$ruc;
        $json = file_get_contents($url);
        $datos = json_decode($json, true);

        if ($datos != null) { //si el json no viene null
    
            $rucs=$datos["NUMERO_RUC"];
            $razon=$datos["RAZON_SOCIAL"];
            $ncomercial=$datos["NOMBRE_COMERCIAL"];
            $econtribuyente=$datos["ESTADO_CONTRIBUYENTE"];
            $ccontribuyente=$datos["CLASE_CONTRIBUYENTE"];
            $finicio=$datos["FECHA_INICIO_ACTIVIDADES"];
            $factualizacion=$datos["FECHA_ACTUALIZACION"];
            $fsuspension=$datos["FECHA_SUSPENSION_DEFINITIVA"];
            $freinicio=$datos["FECHA_REINICIO_ACTIVIDADES"];
            $obligado=$datos["OBLIGADO"];
            $tcontribuyente=$datos["TIPO_CONTRIBUYENTE"];
            $numeroest=$datos["NUMERO_ESTABLECIMIENTO"];
            $nfantasia=$datos["NOMBRE_FANTASIA_COMERCIAL"];
            $calle=$datos["CALLE"];
            $numero=$datos["NUMERO"];
            $interseccion=$datos["INTERSECCION"];
            $estadoest=$datos["ESTADO_ESTABLECIMIENTO"];
            $provincia=$datos["DESCRIPCION_PROVINCIA"];
            $canton=$datos["DESCRIPCION_CANTON"];
            $parroquia=$datos["DESCRIPCION_PARROQUIA"];
            $codigo=$datos["CODIGO_CIIU"];
            $actividad=$datos["ACTIVIDAD_ECONOMICA"];
            //echo("$json");
            echo'<br>';
            echo'<div class="c" style="position: absolute; margin-top: 10%; left: 7.5%; width: 85%"; >';
            echo '<table class="table">'
                .'<tr style="text-align:center">'
                .'<td style="background:#EEE"><b>NÚMERO DE RUC</b></td>'
                .'<td style="background:#EEE"><b>RAZON SOCIAL</b></td>'
                .'<td style="background:#EEE"><b>ESTADO</b></td>'
                .'<td style="background:#EEE"><b>PDF</b></td>'
                .'</tr>';
            echo '<tr style="text-align: center">'
                    .'<td>' . $rucs. '</td>'
                    .'<td>' . $razon. '</td>'
                    .'<td>' . $econtribuyente. '</td>'
                    .'<td>' . '<a href="pdf/pdf.php"><img src="https://www.fundacionmariaauxiliadora.org/wp-content/uploads/2017/10/pdf-icon.png" width="30" height="35" /></a>'. '</td>'
                    .'</tr>';
        
            echo '</table>';
            echo'</div>';
            $_SESSION['ruc']=$rucs;
            $_SESSION['razon']=$razon;
            $_SESSION['comercial']=$ncomercial ;
            $_SESSION['estado']=$econtribuyente ;
            $_SESSION['clase']=$ccontribuyente ;
            $_SESSION['inicio']=$finicio ;
            $_SESSION['actualizacion']=$factualizacion ;
            $_SESSION['suspension']=$fsuspension ;
            $_SESSION['reinicio']=$freinicio ;
            $_SESSION['obligado']=$obligado ;
            $_SESSION['tipo']=$tcontribuyente ;
            $_SESSION['numero']=$numeroest ;
            $_SESSION['nombre']=$nfantasia ;
            $_SESSION['calle']=$calle ;
            $_SESSION['numer']=$numero ;
            $_SESSION['interseccion']=$interseccion ;
            $_SESSION['establecimiento']=$estadoest ;
            $_SESSION['provincia']=$provincia ;
            $_SESSION['canton']=$canton ;
            $_SESSION['parroquia']=$parroquia ;
            $_SESSION['codigo']=$codigo ;
            $_SESSION['actividad']=$actividad;
    
        }else { // si el json viene null lanzara el mensaje
            echo '<script>
                    toastr.warning("El número de ruc no existe");
                </script>';
                exit;
            }
    
}

