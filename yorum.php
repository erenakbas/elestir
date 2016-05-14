<?php
include("db.php");
session_start();
?>
<?php
$yorum = $_POST['yorum'];
$icerik_id = $_POST['icerik_id'];
if(isset($_SESSION["login"])){
$mesajekle = mysql_query("insert into yorumlar (yorum,icerik_id,uye_id) values ('$yorum' , '$icerik_id' , ".$_SESSION['uye_id'].")");
}
else{
$mesajekle = mysql_query("insert into yorumlar (yorum,icerik_id) values ('$yorum' , '$icerik_id')");
}

if($mesajekle){
header("Location: ayrintilar.php?y_eklendi&id=".$icerik_id);
}else{
echo "Mesaj eklenemedi";
}

?>