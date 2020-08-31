<?php 

$doup2s = "./inc/desc.txt";

function webalert($Key){
 $html="<script>\r\n";
 $html.="alert('".$Key."');\r\n";
 $html.="history.go(-1);\r\n";
 $html.="</script>";
 exit($html);
}

function webtable($Key){
 $html.="<table  cellspacing=\"0\">\r\n";
 $html.='<tr>';
 $html.="<td >$Key</td>";
 $html.='</tr>';
 $html.="</table>";
 exit($html);
}

Function Tram($Keys){
$Keys = Trim($Keys); 
$Keys = strtoupper($Keys); 
  return $Keys;
}

function characet($data){
  if(!empty($data) ){    
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
    if( $fileType != 'UTF-8'){   
      $data = mb_convert_encoding($data ,'utf-8' , $fileType);   
    }   
  }   
  return $data;    
}

function charaget($data){
  if(!empty($data) ){    
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
    if( $fileType != 'GBK'){   
      $data = mb_convert_encoding($data ,'GBK' , $fileType);   
    }   
  }   
  return $data;    
}

Function rephtmls($Keys){
$Keys = str_replace(array(" "), "&nbsp;", $Keys); 
$Keys = str_replace(array("\""), "&quot;", $Keys); 
$Keys = str_replace(array("<"), "&lt;", $Keys); 
$Keys = str_replace(array(">"), "&gt;", $Keys); 
$Keys = str_replace(array("\r\n", "\r", "\n"), "<br>", $Keys); 
  return $Keys;
}

function traverse($dir_name = '.',$dbtype) {
$dir = opendir($dir_name); 
$basename = basename($dir_name); 
$fileArr = array(); 
while ($file_name = readdir($dir)) 
{ 
if (($file_name ==".") || ($file_name == "..")) { 
 } else if(is_dir($file_name)) {
 } else {
$fName = "$dir_name/$file_name"; 
$fTime = filemtime($fName); 
$fileArr[$file_name] = $fTime; 
 } 
} 
arsort($fileArr); 
$numberOfFiles = sizeOf($fileArr); 
for($t=0;$t<$numberOfFiles;$t++) 
{ 
$thisFile = each($fileArr); 
$thisName = $thisFile[0]; 
$thisTime = $thisFile[1]; 
$thisTime = date("Y-m-d h:i:s", $thisTime); 
//付费版：数据库排序+文件名称过滤+网页的美化和体验
$filetp=substr($thisName,-strlen($dbtype));
$filetp=strtolower($filetp);
$filesw=substr($thisName,0,-strlen($dbtype));//注意后缀是4位数
if($filetp == $dbtype){
$file = $filesw;    //
echo '<option value="'.characet($file).'">' . characet($file) . '</option>';
echo "\r\n";
} else {
//echo "<!-- ".characet($filesw)." / ".characet($filetp)."-->";
}
} 
closedir($dir); 
} 

?>