<?php
$packet=$_POST['menu'];
$field=$_POST['field'];
$tablef;
if($field =="ts")
{
$tablef="TIMESTAMP";
}
else if($field =="sc")
{
$tablef="SOURCE MAC";
}
else if($field =="dm")
{
$tablef="DESTINATION MAC";
}
else if($field =="si")
{
$tablef="SOURCE IP";
}
else if($field =="di")
{
$tablef="DESTINATION IP";
}
else if($field =="l")
{
$tablef="LENGTH";
}
else if($field =="sp")
{
$tablef="SOURCE PORT";
}
else if($field =="dp")
{
$tablef="DESTINATION PORT";
}
if($field == "all")
{
if($packet=="ARP"){
echo "<center><h1>ARP</h1>";
echo "<table>";
echo "<tr><th>TIMESTAMP</th><th>SOURCE MAC</th><th>DESTINATION MAC</th><th>SOURCE IP</th><th>DESTINATION IP</th><th>LENGTH</th></tr>"
;
$f1= fopen("arp_timestamp.txt","r");
$f2= fopen("arp_SMAC.txt","r");
$f3= fopen("arp_DMAC.txt","r");
$f4= fopen("arp_SIP.txt","r");
$f5= fopen("arp_DIP.txt","r");
$f6= fopen("arp_len.txt","r");
while(!feof($f1)){
echo "<tr><td>".fgets($f1)."</td>";
echo "<td>".fgets($f2),"</td>";
echo "<td>".fgets($f3),"</td>";
echo "<td>".fgets($f4),"</td>";
echo "<td>".fgets($f5),"</td>";
echo "<td>".fgets($f6),"</td></tr>";
}
echo "</center>";

} 
else if($packet =="UDP" || $packet =="TCP"){
$UP=strtoupper($packet);
echo "<center><h1>".$UP."</h1>";
echo "<table>";
echo "<tr><th>TIMESTAMP</th><th>SORCE MAC</th><th>DESTINATION MAC</th><th>SOURCE IP</th><th>SOURCE PORT</th><th>DESTINATION IP</th><th>DESTINATION port</th><th>LENGTH</th></tr>";
$f1= fopen("$t1","r");
$f1= fopen("$t2","r");
$f1= fopen("$t3","r");
$f1= fopen("$t4","r");
$f1= fopen("$t5","r");
$f1= fopen("$t6","r");
$f1= fopen("$t7","r");
$f1= fopen("$t8","r");
while(!feof($f1)){
echo "<tr><td>".fgets($f1)."</td>";
echo "<td>".fgets($f2)."</td>";
echo "<td>".fgets($f3)."</td>";
echo "<td>".fgets($f4)."</td>";
echo "<td>".fgets($f5)."</td>";
echo "<td>".fgets($f6)."</td>";
echo "<td>".fgets($f7)."</td>";
echo "<td>".fgets($f8)."</td></tr>";
}
echo "</center>";
}
}
else
{

$fullname=$packet.$field.".txt";
echo "<center>";
$UP=strtoupper($packet);
echo "<h1>".$UP."</h1>";
echo "<table>";
echo "<tr><th>".$tablef."</th></tr>";

$data=fopen("$fullname","r");
while (!feof($data)){
echo "<tr><th>".fgets($data)."</td></tr>";
}
fclose($data);
echo "</center";
}
?>
