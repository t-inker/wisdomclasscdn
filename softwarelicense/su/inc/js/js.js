var $=function(node){
return document.getElementById(node);
}
function $(objId){
return document.getElementById(objId);
}
document.onkeydown = function(e){
 if(!e) e = window.event;
 if((e.keyCode || e.which) == 13){
 document.getElementById("sub").click();
}
}
function inst() {
if ($("name")!=null) $("name").value = $("tishi1").innerHTML;

if ($("time")!=null) {
var objSelect = $("time");
var ips = objSelect.options.length;
if (ips=="1"){
$("10").style.display = "none";
}
//objSelect.options["1"].selected = true;
}
}
//过滤文本左右两端的空格
function GetRequest(Url,GetFunction){
if(window.ActiveXObject){
var xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
}else{
var xmlHttpRequest = new XMLHttpRequest();
}
xmlHttpRequest.onreadystatechange = function(){
if(xmlHttpRequest.readyState == 4){
if(xmlHttpRequest.status == 200){
GetFunction(xmlHttpRequest.responseText);
}else{
GetFunction(404);
}
}else{
GetFunction(0);
}
}
var Url = Url.replace(/\+/g, "%2B"); 
xmlHttpRequest.open("post",'?'+Url,true);
xmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlHttpRequest.send(Url);
}


function st(ids,Num){
if ($(ids).value == $("tishi"+Num).innerHTML){
$(ids).value = "";
}
}

function startRequest(Num) {
var queryString;
if(Num == 1 || Num == 0){
if($("time").value == ""){
$('time').style.borderColor='red';
return false;
}else{
$('time').style.borderColor='green';
}
}
if(Num == 2 || Num == 0){
if($("name").value == $("tishi1").innerHTML){
$("name").value = $("tishi1").innerHTML;
$('11').style.borderColor='red';
return false;
}else{
SendUrl = "Act=name&file="+ encodeURI($("time").value) +"&val="+ encodeURI($("name").value) +"&T="+Math.random();
GetRequest(SendUrl,function(GetText){
if(GetText == 404){
$('11').style.borderColor='red';
$('jieguo').innerHTML='<span><b>提示：</b>查询失败。</span>';
return false;
}else{
$('11').style.borderColor='green';
$('jieguo').innerHTML=GetText;
}
});

}
}

if(Num == "0"){
}
}