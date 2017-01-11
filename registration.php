<!DOCTYPE html>
<html>
<head>
	<title>The Town</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header>
		The Town
	</header>

	<div id="mainBlock">
		<p> Регистрация и вход: </p>
		<script src="//ulogin.ru/js/ulogin.js"></script>
		<div id="uLogin" data-ulogin="display=panel;theme=flat;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=;redirect_uri=http%3A%2F%2F127.0.0.1%2Fthetown%2Fregistration.php;mobilebuttons=0;"></div>
	</table>
</body>
</html>

<?php 
	include 'php/dbconnect.php';

	if ($_POST['token']){
		$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
		$user = json_decode($s, true);
		$socid = $user['identity'];
		
		$r=mysql_query("select id from users where id = '$socid'");
		if ($f = mysql_fetch_array($r)){
			$id .= $f[id];
			echo '<script type="text/javascript">window.location.href = "game.php?user='.$id.'"</script>';
		} else {
			mysql_query("insert into users (socnet) values ('$socid')");
			$r = mysql_query("select id from users where socnet = '$socid'");
			$f = mysql_fetch_array($r);
			$id .= $f[id];
			echo '<script type="text/javascript">window.location.href = "game.php?user='.$id.'"</script>';
		}
	}
                
 ?>