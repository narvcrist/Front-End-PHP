<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/soloNL.js"></script>
</head>
<body>
  <form class="search" action="" method="post" name="" id="miForm" >    
    <div class="col-lg-6">
        <div class="input-group">
            <input type="text" class="form-control" name="ruc" placeholder="Buscar RUC" id="txt" onkeypress="return solonumeros(event)" maxlength="13">
            <span class="input-group-btn">
              <input class="btn btn-success" type="submit" value="&#10140;"  onclick="busc(),limpiarFormulario()">              
          </span>
         </div><!-- /input-group -->
     </div><!-- /.col-lg-6 -->
  </form>
  <div class="iniciar">
    <a href="index.php"><input type="submit" value="Volver" type="button" class="btn btn-light"></a>
  </div>

  <section class="section">
  <form method="POST" action="">
    <label >Registrar nuevo ruc</label>
    <input class="form-control" type="text" name="ruc" placeholder="Ingrese ruc"  onkeypress="return solonumeros(event)" maxlength="13">
    <br>
    <input class="form-control" type="text" name="razon" placeholder="Razon social"  maxlength="60" onkeypress="return soloLetras(event)"onKeyUp="this.value=this.value.toUpperCase();">
    <br>
    <input class="form-control" type="text" name="estado" placeholder="Estado contribuyente"  maxlength="10" onkeypress="return validar(event);return soloLetras(event)" onKeyUp="this.value=this.value.toUpperCase();" spellcheck="true">
    <br>
    <a href="index.php"><input class="btn btn-info" type="button" name="" value="Cancelar"></a>
    <input class="btn btn-success" type="submit" name="" value="Registrar">

  </form>
  </section>
</section> 
 
</body>
</html>


<?php
if (isset($_POST['estado'])){
//$ruc=$_POST["ruc"];
//$razon=$_POST["razon"];
//$estado=$_POST["estado"];

  //API Url
  $url = 'https://servicio-api.herokuapp.com/personas/';
 
  //Initiate cURL.
  $ch = curl_init($url);
 
  //The JSON data.
  $jsonData = array(
    'NUMERO_RUC' => $_POST["ruc"],
    'RAZON_SOCIAL' => $_POST["razon"],
    'ESTADO_CONTRIBUYENTE' => $_POST["estado"]
  );
  //Encode the array into JSON.
  $jsonDataEncoded = json_encode($jsonData);
  //Tell cURL that we want to send a POST request.
  curl_setopt($ch, CURLOPT_POST, 1);
  //Attach our encoded JSON string to the POST fields.
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
  //Set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
 
  //Execute the request
  $result = curl_exec($ch);
}

















