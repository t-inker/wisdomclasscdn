<?php 
//推荐php5.4-5.6 注意7.0+未必都支持
error_reporting(0);
header("content-Type: text/html; charset=utf-8");//输出编码GBK

$tiaojian1="许可证号";			//查询条件1列标题，跟excel列头一致，注意无空格回车;

$title="Dreamsky许可证查询";		//设置查询标题,相信你懂的。
$copyr="huosoft";			//设置底部版权文字,相信你懂的。
$copyu="/";				//设置底部版权连接,相信你懂的。

$dbtype =".xls"; //不要修改哦
$UpDir="shujukufangzheli";  //修改为只有自己知道的文件名名称，同时修改对应文件夹

?>