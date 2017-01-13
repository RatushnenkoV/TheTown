<?php 
	include 'php/dbconnect.php';

	if ($_POST['token']){
		$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
		$user = json_decode($s, true);
		$socid = $user['identity'];
		
		$r=mysql_query("select id from users where id = '".$socid."'");
		if (!($f = mysql_fetch_array($r))){
			mysql_query("insert into users (socnet) values ('$socid')");
			$r = mysql_query("select id from users where socnet = '$socid'");
			$f = mysql_fetch_array($r);
		}
		$id .= $f[id];
		echo '<script type="text/javascript">var USER_ID = '.$id.'</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>The Town</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/field.css">
	<link rel="stylesheet" type="text/css" href="css/blocks.css">
	<link rel="stylesheet" type="text/css" href="css/mail.css">
	<script type="text/javascript" src="js/field.js"></script>
	<script type="text/javascript" src="js/game.js"></script>
	<script type="text/javascript" src="js/blocks.js"></script>
	<script type="text/javascript" src="js/mail.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
	<header>
		The Town
		<div id="playerBlock">
			<table>
				<tr>
					<td>
						<img id="avatar" src="img/avatar/a000001.jpg"/>
					</td>
					<td>
						<ul id="userInfoUl">
						</ul>
					</td>
					<td>
						<img id="escape" src="img/ui/logout.png" onclick="window.location.href = 'registration.php'">
					</td>
				</tr>
			</table>
		</div>
	</header>
	<table width="100%">
		<tr>
			<td width="400px" style="vertical-align: top;">
				<div id="mail">
					<ul id="mailListUl" >
					</ul>
				</div>
				<img src="img/ui/letter.png" id="letter">
			</td>
			<td>
				<table id="field">
				</table>
			</td>
			<td width="400px" id="rightBlocks">
				<div id="infoBlock">
					<div id="infoBlockText"></div>
					<div class="button" onclick="clearSelectedCell();"> Удалить </div>
				</div>

				<div id="buildListBlock">
					<ul id="buildListUl" >
					</ul>
				</div>
			</td>
		</tr>
	</table>

	<div id="loading">
		<img src="img/ui/loading.gif">
	</div>
</body>
</html>