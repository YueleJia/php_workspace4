<html>
<head>
<title> my homework4_detail</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<style type="text/css">.filmname{margin-top:6px;margin-bottom:-14px;margin-left:15px;}.score{margin-top:6px;margin-bottom:0px;margin-left:44px;}
</style>
</head>
<?php
	$username = $_GET["username"];
	$score1 = $_GET["score1"];
	$score2 = $_GET["score2"];
	$score3 = $_GET["score3"];
	$score4 = $_GET["score4"];
	$score5 = $_GET["score5"];
	$score6 = $_GET["score6"];
?>

<body>
<form>
	<div class=username>	
		<?php echo "用户名: $username"; ?>
 	</div>
<table>
	<tr>
      	<td>
          	<div>
            	<img src="http://img3.douban.com/spic/s19836660.jpg" width=100 height=100><br/>
              	<div class="filmname">人在冏途</div>
              	<input type="hidden" name="file1" value="jiongtu"/><br/>
				<div class="score"><?php echo "$score1"; ?></div> 
          	</div>
	  	</td>
 		<td>
         	<div>
             	<img src="http://img3.douban.com/spic/s24519706.jpg" width=100 height=100><br/>
             	<div class="filmname">十二生肖</div>
             	<input type="hidden" name="file2" value="shengxiao"/><br/>
				<div class="score"><?php echo "$score2";?></div>
         	</div>
		</td>	
		<td>	
			<div>	
            	 <img src="http://img3.douban.com/spic/s24585226.jpg" width=100 height=100><br/>
             	<div class="filmname">快乐到家</div>
             	<input type="hidden" name="file3" value="kuailedaojia"/><br/>
				<div class="score"><?php echo "$score3";?></div>
         	</div>
     	</td>
	</tr>
 	<tr>
    	<td>
          	<div>
              	<img src="http://img5.douban.com/spic/s11353209.jpg" width=100 height=100><br/>
              	<div class="filmname">怪物旅社</div>
              	<input type="hidden" name="file4" value="guaiwulvshe"/><br/>
				<div class="score"><?php echo "$score4";?></div>
          	</div>
      	</td>
  
      	<td>
          	<div>
             	<img src="http://img5.douban.com/spic/s4433349.jpg" width=100 height=100><br/>
              	<div class="filmname">三傻大闹宝莱坞</div>
              	<input type="hidden" name="file5" value="sansha"/><br/>
				<div class="score"><?php echo "$score5";?></div>
          	</div>
      	</td>
  
      	<td>	
          	<div>
              	<img src="http://img3.douban.com/spic/s10392260.jpg" width=100 height=100><br/>
              	<div class="filmname">泰迪熊</div>
              	<input type="hidden" name="file6" value="taidixiong"/><br/>
				<div class="score"><?php echo "$score6";?></div>
          	</div>
      	</td>
  	</tr>	

</table>

<?php
	$str = file_get_contents("./homework4_score.txt");
	//var_dump($str);
  	$infos = explode("\n", $str);
  	//var_dump($infos);
  	$i = 0;
   	$arrayinfos=array();
   	foreach($infos as $node) {
	 	$info = explode("\t", $node);
	    if(sizeof($info) == 7 && $info[0] != $username){
	       	array_push($arrayinfos, $info);
	    }else
	        continue;
	}

	//var_dump($arrayinfos);
	function cmp($a, $b) {
		if($a == $b) return 0;
		$asimilar=	sqrt(pow(($a[1] - $score1), 2) + pow(($a[2] - $score2), 2) +
			pow(($a[3] - $score3), 2) + pow(($a[4] - $score4), 2) +
			pow(($a[5] - $score5), 2) + pow(($a[6] - $score6), 2));
		$bsimilar=	sqrt(pow(($b[1] - $score1), 2) + pow(($b[2] - $score2), 2) +
			pow(($b[3] - $score3), 2) + pow(($b[4] - $score4), 2) +
			pow(($b[5] - $score5), 2) + pow(($b[6] - $score6), 2));
		return ($a > $b) ? -1:1;
	}

	usort($arrayinfos, "cmp");
	//var_dump($arrayinfos);

	$near3 = array_slice($arrayinfos, 0, 3);
	//var_dump($near3);	
	echo "与您评分相似度最近的三位朋友的评分情况是：\n";
	foreach($near3 as $node) {
?>
	<div class=username>	
		<?php echo "用户名: $node[0]"; ?>
 	</div>
<table>
	<tr>
      	<td>
          	<div>
            	<img src="http://img5.douban.com/spic/s19836660.jpg" width=100 height=100><br/>
              	<div class="filmname">人在冏途</div>
              	<input type="hidden" name="file1" value="jiongtu"/><br/>
				<div class="score"><?php echo "$node[1]"; ?></div> 
          	</div>
	  	</td>
 		<td>
         	<div>
             	<img src="http://img3.douban.com/spic/s24519706.jpg" width=100 height=100><br/>
             	<div class="filmname">十二生肖</div>
             	<input type="hidden" name="file2" value="shengxiao"/><br/>
				<div class="score"><?php echo "$node[2]";?></div>
         	</div>
		</td>	
		<td>	
			<div>	
            	 <img src="http://img3.douban.com/spic/s24585226.jpg" width=100 height=100><br/>
             	<div class="filmname">快乐到家</div>
             	<input type="hidden" name="file3" value="kuailedaojia"/><br/>
				<div class="score"><?php echo "$node[3]";?></div>
         	</div>
     	</td>
	</tr>
 	<tr>
    	<td>
          	<div>
              	<img src="http://img5.douban.com/spic/s11353209.jpg" width=100 height=100><br/>
              	<div class="filmname">怪物旅社</div>
              	<input type="hidden" name="file4" value="guaiwulvshe"/><br/>
				<div class="score"><?php echo "$node[4]";?></div>
          	</div>
      	</td>
  
      	<td>
          	<div>
             	<img src="http://img5.douban.com/spic/s4433349.jpg" width=100 height=100><br/>
              	<div class="filmname">三傻大闹宝莱坞</div>
              	<input type="hidden" name="file5" value="sansha"/><br/>
				<div class="score"><?php echo "$node[5]";?></div>
          	</div>
      	</td>
  
      	<td>	
          	<div>
              	<img src="http://img3.douban.com/spic/s10392260.jpg" width=100 height=100><br/>
              	<div class="filmname">泰迪熊</div>
              	<input type="hidden" name="file6" value="taidixiong"/><br/>
				<div class="score"><?php echo "$node[6]";?></div>
          	</div>
      	</td>
  	</tr>	

</table>


	
<?php	}
	//var_dump($arrayinfos);
//	$similar = array();
//	foreach($arrayinfos as $node) {
//		$a=	sqrt(pow(($node[1] - $score1), 2) + pow(($node[2] - $score2), 2) +
//			pow(($node[3] - $score3), 2) + pow(($node[4] - $score4), 2) +
//			pow(($node[5] - $score5), 2) + pow(($node[6] - $score6), 2));
//		array_push($similar, $a);
//		//var_dump($similar);
//	}
//	//sort默认升序排列rsort降序排列
//	sort($similar);
//	var_dump($similar);
//
//	$near3 = array_slice($similar, 0, 3);	
//	var_dump($near3);
?>




</form>
</body>

</html>
