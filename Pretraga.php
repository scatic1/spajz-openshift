<html>
<head>
<script>
function showResult(str){
if(str.length==0){
document.getElementById("pretraga").innerHTML="";
document.getElementById("pretraga").style.border="0px";
return;
}
if(window.XMLHttpRequest){

xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById("pretraga").innerHTML=xmlhttp.responseText;
document.getElementById("pretraga").style.border="1px solid #A5ACB2";
}
}
xmlhttp.open("GET", "pretraga.php?q="+str,true);
xmlhttp.send();
}

</script>
</head>
<body>

</body>
</html>
<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("korisnici.xml");
 
$x=$xmlDoc->getElementsByTagName('user');
 

 
$q=$_GET["q"];
 

 
if(strlen($q)>0){
 $odgovor="";
 for($i=0; $i<($x->length); $i++){
 $y=$x->item($i)->getElementsByTagName('name');
 $z=$x->item($i)->getElementsByTagName('username');
 if($y->item(0)->nodeType==1){
 

 if(stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)){
 
 if($odgovor==""){
 
 $odgovor="<a  href='" .
 
 $z->item(0)->childNodes->item(0)->nodeValue.
 "' >" .
 
 $y->item(0)->childNodes->item(0)->nodeValue. "  </a>";
 }
 else
 {
 $odgovor=$odgovor . "<a href='" .
 
 $z->item(0)->childNodes->item(0)->nodeValue .
 "' >".
 
 $y->item(0)->childNodes->item(0)->nodeValue. "  </a>";
 }
 }
 if(stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)){
 
 if($odgovor==""){
 
 $odgovor="<a href='" .
 
 $y->item(0)->childNodes->item(0)->nodeValue.
 "' >" .
 
 $z->item(0)->childNodes->item(0)->nodeValue. "<br></a>";
 }
 else
 {
 $odgovor=$odgovor . "<a href='" .
 
 $y->item(0)->childNodes->item(0)->nodeValue .
 "' >".
 
 $z->item(0)->childNodes->item(0)->nodeValue. "<br></a>";
 }
 }
 }
 }
}
 

 
if($odgovor==""){
 $ispis = "Nema rezultata!";
}
else
{
 $ispis=$odgovor;
}
 

echo $ispis;
?>