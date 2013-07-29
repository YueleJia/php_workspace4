<?php

	$username = $_GET["username"];
	$score1 = $_GET["score1"];
	$score2 = $_GET["score2"];
	$score3 = $_GET["score3"];
	$score4 = $_GET["score4"];
	$score5 = $_GET["score5"];
	$score6 = $_GET["score6"];
	
	$str = $username."\t".$score1."\t"
			.$score2."\t".$score3."\t"
			.$score4."\t".$score5."\t".$score6."\n";
	var_dump($str);
	file_put_contents("/home/james/php/homework4_score.txt", $str, FILE_APPEND);
	echo "评分成功";
?>
