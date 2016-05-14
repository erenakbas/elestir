<?php
include("db.php");
session_start();
?>

<?php


$icerik_id= $_POST['icerik_id'];
$begeni_kontrol=mysql_query("select uye_id from begeni where icerik_id='".$icerik_id."' and uye_id='".$_SESSION['uye_id']."'");
$begeni_say=mysql_num_rows($begeni_kontrol);

if((isset($_SESSION["login"]))&&($begeni_say==0))
					{
$begeni_ekle = mysql_query("insert into begeni (icerik_id,uye_id) values ('$icerik_id' , ".$_SESSION['uye_id'].")");
header("Location: ayrintilar.php?begeni_eklendi&id=".$icerik_id);

					}
if(empty($_SESSION["login"]))					
{
header("Location: ayrintilar.php?giris_yap&id=".$icerik_id);
}
if($begeni_say!=0){header("Location: ayrintilar.php?begendin&id=".$icerik_id);}					
					
					





?>