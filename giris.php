<?php 
 
include("db.php");
ob_start();
session_start();
 
$k_adi = $_POST['k_adi'];
$sifre = $_POST['sifre'];
 
$sql_check = mysql_query("select * from uyeler where k_adi='".$k_adi."' and sifre='".$sifre."' ") or die(mysql_error());
 
if(($yaz = mysql_fetch_array($sql_check)))
{
    $_SESSION["login"] = "true";
    $_SESSION["k_adi"] = $k_adi;
    $_SESSION["uye_id"] = $yaz['id'];
    header("Location:anasayfa.php");
}
else {
    if($k_adi=="" or $sifre=="") {
	header("Location: uyeler.php?k_s_bos");
       
    }
    else {
	header("Location: uyeler.php?k_s_yanlis");
       
    }
}
 
ob_end_flush();
?>