<html>
<body>
<title> my third pagme</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>

<?php
	$str = file_get_contents("./homework4_score.txt");
	//var_dump($str);
	$infos = explode("\n", $str);
	//var_dump($infos);
	$i = 0;
	$arrayinfos=array();
	foreach($infos as $node) {
		$info = explode("\t", $node);
		if(sizeof($info) == 7){
			array_push($arrayinfos, $info);
		}else 
				continue;
	}
	//var_dump($arrayinfos);
?>

<table border="1">
	<?php
		foreach($arrayinfos as $node) {
				echo "<tr><td>	
					<a href=./homework4_detail.php?username="
					.$node[0]."&score1=".$node[1]."&score2=".$node[2]
					."&score3=".$node[3]."&score4=".$node[4].
					"&score5=".$node[5]."&score6=".$node[6].">".$node[0]."</a></td>"
					."<td>".$node[1]."</td>".
					"<td>".$node[2]."</td>"."<td>".$node[3]."</td>".
					"<td>".$node[4]."</td>"."<td>".$node[5]."</td>".
					"<td>".$node[6]."</tr></td>";
		}
	?>

</table>

</body>
</html>
