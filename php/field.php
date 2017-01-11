<?php
	include 'dbconnect.php';
	include 'log.php';

	function showField($userid){
		$r=mysql_query("select field from users where id = ".$userid);
		if (mysql_errno()){
			_LOG('8'.mysql_error().'   '.$userid);
			return "";
		};
		$f=mysql_fetch_array($r);
		$field = json_decode($f[field], true);
		$res = "";
		
		for ($i = 0; $i < 5; $i++){
			$res .= "<tr>";
			for ($j = 0; $j < 5; $j++){
				$idx = $i*5 + $j;
				$buildId = $field["c".$i.$j];
				_LOG("c".$i.$j."    ".$buildId);

				$r1=mysql_query("select type from buildings where id = ".$buildId);
				if (mysql_errno()){
					_LOG('23'.mysql_error());
					return "";
				};
				$f1=mysql_fetch_array($r1);				
				$type = $f1[type];

				$res .= "<td>";
				$res .= "<div id = 'c$i$j' class='cell' data-building='$buildId'>";
				$res .= "<img onclick='onCellClick(this.parentElement)' src='img/build/$type.png'/>";
				$res .= "</div>";
				$res .= "</td>";
			}
			$res .= sprintf("</tr>");
		}
		return $res;
	}

	function showCell($userid, $cellId, $bid){
		$r=mysql_query("select field from users where id = ".$userid);
		if (mysql_errno()){
			_LOG('44'.mysql_error());
			return "";
		};
		$f=mysql_fetch_array($r);

		$r=mysql_query("select field from users where id = ".$userid);
		if (mysql_errno()){
			_LOG(mysql_error());
			return "";
		};
		$f=mysql_fetch_array($r);
		$field = json_decode($f[field], true);
		$field[$cellId] = $bid;
		$field = json_encode($field);

		$sql = "update users set field = '".$field."' where id = ".$userid;
		$r=mysql_query($sql);
		if (mysql_errno()){	
			_LOG(mysql_error());
			return "";
		};

		$r=mysql_query("select type from buildings where id = ".$bid);
		if (mysql_errno()){	
			_LOG(mysql_error());
			return "";
		};
		$f=mysql_fetch_array($r);
		$type = $f[type];

		$res .= sprintf("<img onclick='onCellClick(this.parentElement)' src='%s' style='right:20px; bottom: 20px;'/>", "img/build/".$type.".png");
		return $res;
	}

	if ($_GET["cell"]){
		echo showCell($_GET["user"], $_GET["cell"], $_GET["building"]);
	} else {
		echo showField($_GET["user"]);
	}
	
?>
