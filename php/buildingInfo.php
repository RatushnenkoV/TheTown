<?php 
	include 'dbconnect.php';
	include 'log.php';

	function showBuildingInfo($id){
		$sql = "select name, description from buildings where id = $id";
		$r=mysql_query($sql);
		if (mysql_errno()){
			_LOG($sql);
			_LOG(mysql_error());
			return "";
		};

		$f=mysql_fetch_array($r);
		$name = $f[name];
		$desc = $f[description];

		$res .= "<h2>$name</h2>$desc<br>";
		return $res;
	}

	if ($_GET["bid"]){
		echo showBuildingInfo($_GET["bid"]);
	}
	
 ?>