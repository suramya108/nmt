<html>
<head>
<style>
body{
background-image:url("images2.jpeg");
color:#ccc;
}
th{
font-family:Arial;
font-size:30px;
border: 5px solid #ccc;
padding: 3px,3px;
font-style: bold;
}
td {
font-family: Arial;
font-size: 20px;
border: 5px solid #ccc;
padding: 3px 3px;
}
</style>
</head>
<body>
<?php
$packet=$_POST['packet'];
$field=$_POST['field'];
$tablef;
if($field == "timestamp")
{
$tablef="TIMESTAMP";
}
else if($field =="SMAC")
{
$tablef="SOURCE MAC";
}
else if($field =="DMAC")
{
$tablef="DESTINATION MAC";
}
else if($field =="SIP")
{
$tablef="SOURCE IP";
}
else if($field =="DIP")
{
$tablef="DESTINATION IP";
}
else if($field =="port1")
{
$tablef="SOURCE PORT";
}
else if($field =="port2")
{
$tablef="DESTINATION PORT";
}
else if($field =="len")
{
$tablef="LENGTH";
}

$t1=$packet."_timestamp.txt";
$t2=$packet."_SMAC.txt";
$t3=$packet."_DMAC.txt";
$t4=$packet."_SIP.txt";
$t5=$packet."_DIP.txt";
$t6=$packet."_len.txt";
$t7=$packet."_port1.txt";
$t8=$packet."_port2.txt";
if($field == "all")
{
if($packet=="arp"){
echo "<center><h1>ARP</h1>";
echo "<table>";
echo "<tr><th>TIMESTAMP</th><th>SOURCE MAC</th><th>DESTINATION MAC</th><th>SOURCE IP</th><th>DESTINATION IP</th><th>LENGTH</th></tr>";
$f1= fopen("$t1","r");
$f2= fopen("$t2","r");
$f3= fopen("$t3","r");
$f4= fopen("$t4","r");
$f5= fopen("$t5","r");
$f6= fopen("$t6","r");
while(!feof($f1)){
echo "<tr><td>".fgets($f1)."</td>";
echo "<td>".fgets($f2)."</td>";
echo "<td>".fgets($f3)."</td>";
echo "<td>".fgets($f4)."</td>";
echo "<td>".fgets($f5)."</td>";
echo "<td>".fgets($f6)."</td></tr>";
}
echo "</center>";

}
else if($packet =="udp" || $packet =="tcp"){
$UP=strtoupper($packet);
echo "<center><h1>".$UP."</h1>";
echo "<table>";
echo "<tr><th>TIMESTAMP</th><th>SOURCE MAC</th><th>DESTINATION MAC</th><th>SOURCE IP</th><th>SOURCE PORT</th><th>DESTINATION IP</th><th>DESTINATION PORT</th><th>LENGTH</th></tr>";
$f1= fopen("$t1","r");
$f2= fopen("$t2","r");
$f3= fopen("$t3","r");
$f4= fopen("$t4","r");
$f5= fopen("$t5","r");
$f6= fopen("$t6","r");
$f7= fopen("$t7","r");
$f8= fopen("$t8","r");
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
$fullname=$packet."_".$field.".txt";
//echo $fullname;
echo "<center>";
$UP=strtoupper($packet);
echo "<h1>".$UP."</h1>";
echo "<table>";
echo "<tr><th>".$tablef."</th></tr>";


$data= fopen("$fullname","r");
while(!feof($data)){
echo "<tr><td>".fgets($data)."</td></tr>";
}
fclose($data);
echo "</center";
}
?>
</body>
</html>
