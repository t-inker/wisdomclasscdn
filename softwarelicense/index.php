<?php include "inc/conn.php";?><?php include "inc/excel.php";?>
<?php include "inc/pubs.php";
$tts = date("YmdHis",time());

$stime=microtime(true); 


if($_POST['Act']=="name"){

$shujus = trim($_POST['file']);
$shuru1 = trim($_POST['val']);


if(!$shuru1){
 webtable("请输入 $tiaojian1!");
}
if(strlen($shuru1)<12){
 webtable("请完整输入许可证号！");
}
$files = $UpDir."/".$shujus.$dbtype;
$files = charaget($files);

if(!file_exists($files)){
$files = characet($files);
}

if(!file_exists($files)){
 webtable('请检查数据库文件是否存在!');
}
echo '<!--startprint-->';
$data = new Spreadsheet_Excel_Reader(); 
$data->setOutputEncoding('UTF-8'); 
$data->read($files); 

for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) { 
 if($i=="1"){
 $iaa=0;
 $iab=0;
 $iac=0;
echo "<table cellspacing=\"0\">";
/*echo "<caption align=\"center\">$shujus 中 $shuru1 的结果</caption>";
*/
echo "请在登陆后及时修改密码。";
echo '<thead><tr class="tt">';
for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
$taba = ''.$data->sheets[0]['cells'][$i][$j].'';
  $bh0=stristr($bubuxians,"--$taba--");
if(!$bh0){
      $ix++; 
  echo '<td><nobr>'.$taba.'</nobr></td>';
}
      $io++; 
    if($taba==$tiaojian1){
      $iaa=$io; 
    }
} 
 echo "</tr></thead><tbody>";
    if($iaa<1){
$iaa = 1; //如果和数据不对应，就是第一列为查询条件
    }
echo "\r\n";
 }else{
 $Excelx=Tram($data->sheets[0]['cells'][$i][$iaa]);
if(stristr($Excelx,$shuru1)){
 $iae++; 
 echo '<tr>';
for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
 $tabe = ''.$data->sheets[0]['cells']['1'][$j].'';
$tabu = Trim($data->sheets[0]['cells'][$i][$j]);
 echo '<td  data-label='.$tabe.'>'.$tabu.'</td>';
} 
 echo "</tr>\r\n";
} 
}
}

if($iae<1){
 $shuru1 = rephtmls($shuru1);
  echo '<tr>';
  echo "<td colspan={$j}  data-label=\"提示\">许可证号可能不正确。</td>";
/*  echo "<td colspan={$j}  data-label=\"提示\">没有查询到$tiaojian1 包含 $shuru1 相关信息哦</td>";
*/    
  echo '</tr>';
}
 echo "<tbody></table>\r\n";
echo '<!--endprint-->';

$etime=microtime(true);
$total=$etime-$stime;
echo "<!----页面执行时间：{$total} ]秒--->";
exit();
}


?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title><?php echo $title;?></title>
<meta name="author" content="yujianyue, admin@ewuyi.net">
<meta name="copyright" content="www.12391.net">
<link href="inc/css/style.css?t=180328" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="inc/js/js.js?t=190328"></script>
</head>
<body onLoad="inst();">
<div class="html">
<div class="divs" id="divs">
<div id="head" class="head" onclick="location.href='?t=<?php echo $tts;?>';">
<?php echo $title;?>
<!--div class="back" id="pageback">
<a href="http://chalide.com/" class="d">查立得</a>
</div-->
</div>
<div class="main" id="main">
<?php 
?>
<form name="queryForm" method="post" action="?t=<?php echo $tts;?>" onsubmit="return startRequest(0);">
<div class="select" id="10">
<select name="time" id="time" onBlur="startRequest(1)" >
<?php traverse($UpDir."/",$dbtype);?></select></div>

<!--<?php traverse($UpDir."/",$dbtype);?></select></div>
-->

<div class="so_box" id="11">
<input name="name" type="text" class="txts" id="name" value="" placeholder="请输入<?php echo $tiaojian1;?>" onfocus="st('name',1)" onKeyup="startRequest(2)"  autocomplete="off" />
</div>
<!--div class="so_but">
<input type="submit" name="button" class="buts" id="sub" value="立即查询" />
<input type="button" class="buts" value="刷新本页" name="print" onclick="location.reload();">
</div-->
<div id="tishi1" style="display:none;">请输入<?php echo $tiaojian1;?></div>
<div id="tishi4" style="display:none;">请输入4数字验证码</div>
</form>
<div id="jieguo" style="margin:0 auto;overflow-x:auto;width:98%;">
<div class="so_bus" id="tishi"><!--你的其他说明在这里添加：开始-->
请先选择许可证类型，然后使用许可证号码查询账户信息，许可证号为12位大写英文字母。
许可证类型为授权信息最后一位的字母。
<!--<?php

if(!file_exists($doup2s)){
//echo "<!-- $doup2s 不存在 -->";
}else{
echo file_get_contents($doup2s);
}

?>-->
<!--你的其他说明在这里添加：结束-->
</div>
</div>
</div>
<div class="boto" id="boto">
&copy;<?php echo date('Y');?>&nbsp; <a href="<?php echo $copyu;?>" target="_blank"><?php echo $copyr;?></a>
</div>
</div>
</div>
</body>
</html>