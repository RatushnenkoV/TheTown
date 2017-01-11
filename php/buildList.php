<?php
	include 'dbconnect.php';

	function showBuildList($userid){
		$r=mysql_query("select money from users where id = ".$userid);
		$f = mysql_fetch_array($r);
		$money = $f[money];

		$r=mysql_query("select * from buildings where id in (select building from discovering where user = ".$userid.")");
		$res = "";
		while ($f=mysql_fetch_array($r)){
			$res .= "<li class='buildListLi'>";
			$res .= "<img class='LiImage' src='img/build/$f[type].png'/>";
			$res .= "<div class='LiText'> $f[name]</div>";
			$jsf  = "buildOnSelectedCell($f[id], $f[price])";
			$class = "button";
			if ($money < $f[price]){
				$jsf = "";
				$class = "lockedButton";
			}
			$res .= "<div class=$class onclick='$jsf'>\n";
			$res .= $f[price];
			$res .= "<img class='coin' src='img/ui/coin.png'/>\n"; 
			$res .= "</div>\n";

		}
		return $res;
	}

	echo showBuildList($_GET["user"]);
?>