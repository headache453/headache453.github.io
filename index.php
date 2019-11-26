<!DOCTYPE html>
<html>
<head>
<title> Donne ici un titre à ta page html </title>
<meta charset="UTF-8">
<script src="//api.dedipass.com/v1/pay.js"></script>
</head>

<body>
<?php
$code = isset($_POST['code']) ? preg_replace('/[^a-zA-Z0-9]+/', '', $_POST['code']) : '';
if( empty($code) ) {
  echo 'Vous devez saisir un code';
}
else {
  $dedipass = file_get_contents('http://api.dedipass.com/v1/pay/?public_key=f93c0f1c64001e23a417b4cd03bdde8f&private_key=e91b268e393e9022f03bc0127d29fd62f31c294c&code=' . $code);
  $dedipass = json_decode($dedipass);
  if($dedipass->status == 'success') {
    // Le transaction est validée et payée.

  }
  else {
    // Le code est invalide
    echo 'Le code '.$code.' est invalide';
  }
}
?>
  
  </body>
</html>
