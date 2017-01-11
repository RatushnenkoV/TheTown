<?php
	include 'log.php';
	include 'dbconnect.php';

	function showUserInfo($userid){
		$r=mysql_query("select * from users where id = ".$userid);
		if (mysql_errno()){
			_LOG(mysql_error());
		}
		$f=mysql_fetch_array($r);

		$res = "";

		$res .= sprintf("<li>%s</li>", $f[name]);
		$res .= sprintf("<li>Уровень %s</li>", $f[level]);
		$res .= sprintf("<li>%s<img src='img/ui/coin.png' class='coin'/></li>", $f[money]);

		/* ПОТОМ НАДО ПОМЕНЯТЬ ЭТО ГОВНО */
		$res .= sprintf("<div id='money' style='display: none;'>%s</div>", $f[money]);

		return $res;
	}

	function setMoney($userid, $money){
		$r=mysql_query("update users set money = $money where id = ".$userid);
		if (mysql_errno()){
			_LOG(mysql_error());
		}
	} 

	if ($_GET["money"] || $_GET["money"] == 0){
		setMoney($_GET["user"], $_GET["money"]);
	}
	echo showUserInfo($_GET["user"]);
?>