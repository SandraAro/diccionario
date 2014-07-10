<?php

$Construccion=1;
if($Construccion!=0){
	header('Location: /diccionario/public');
	}else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>...::: Bienvenido a Amigos del Gesto :::...</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<style type="text/css">
.F {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 36px;
}
body {
	background-image: url(Logo-Fondo.png);
	background-repeat: repeat;
}
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <th width="20%" scope="col">&nbsp;</th>
    <th width="60%" scope="col">&nbsp;</th>
    <th width="20%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><img src="/web/templates/fag/images/logo/logo.png" width="675" height="279" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center" valign="middle"><strong class="F">EN CONSTRUCCIÓN</strong></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<?php

	}
?>