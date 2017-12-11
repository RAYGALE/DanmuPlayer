<?php 
header('Content-type:text/html;charset=utf8');
$conn = @ mysql_connect("localhost", "root", "") or die("datebase can`t been connected");
mysql_select_db("danmu", $conn);
mysql_query("set names 'utf8'");

$danmu=$_POST['danmu'];
$sql="INSERT INTO `danmu`(`id`,`danmu`) VALUES ('','".$danmu."')";
echo $sql;
$query=mysql_query($sql); 
echo $danmu;

?>
