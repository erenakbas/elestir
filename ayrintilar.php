<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include("db.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>




<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<link href="anasayfa.css" rel="stylesheet" type="text/css" />
<style type="text/css">

</style>
</head>

<body>

<div class="zemin">
<div class="banner">
<div class="ikon"><a href="anasayfa.php"> <img src="ikon.jpg"></a></div>
<div class="header-search"><form id="search" name="arama" method="post" action="ara.php">
<input type="text" class="search" id="headerSearch" value="" name="arama" style="opacity: 0.7;"> 
<input type="submit" class="button" value="arama yap" /></form></div>

<?php 
if(isset($_SESSION["login"])){
echo'<div class="uye"><table><tr><td><a href="profil.php"><h3>'. $_SESSION["k_adi"].'</a></td><td><a href="cikis.php"><h3>Çıkış Yap</h3></a></td></tr></table>  </div>';
}
else{
echo '<div class="uye"><table><tr><td> <a href="uyeler.php"><h3> Üye Girişi </h3></a> </td><td>  <a href="uyeler.php"><h3> Üye Ol</h3></a></td></tr></table>  </div>';
}
?>

</div>
<div class="menu"><table align="center" class="one" border="0"><tr>
<?php
$cek=mysql_query("select * from kategori");

while($yaz = mysql_fetch_array($cek))
{
echo '<td><a href="icerik.php?id='.$yaz['id'].'"/><h2>'.$yaz['kategori_adi'].'</h2></a></td>';
}

  ?>


</tr></table></div>

<div class="orta">
<div class="sol_menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td>
<h2 style="color:#9f011e" > <u>Kategoriler</u></h2>
</td>
</tr>

<?php
$cek=mysql_query("select * from kategori");

while($yaz = mysql_fetch_array($cek))
{
echo '<tr>
<td>';
echo '<a href="icerik.php?id='.$yaz['id'].'"/><h2>'.$yaz['kategori_adi'].'</h2></a>';
echo '</td>
</tr>';
}

  ?>
</table>	  
</div>

<div class="o_orta">
<form action="yorum.php" method="post">
<h6>Yorum Yap :</h6><textarea name="yorum" cols="45" rows="8" maxlength="120"></textarea>
<input type="hidden" name="icerik_id" value="<?php echo $id ?>">
<input type="submit" value="Yorum Yap" class="yy_button"></p>

</form>
<div class="o_solmenu">
<form action="begen.php" method="post">

<input type="hidden" name="icerik_id" value="<?php echo $id ?>">
<input type="submit" value="Beğen" class="yy_buton">
</form>

<?php 

$cek=mysql_query("select * from begeni where icerik_id='$id' ORDER BY id DESC LIMIT 3");


while(($yaz = mysql_fetch_array($cek)))
{
if($yaz['uye_id'] == 0)
{
echo 'Buna Yetkiniz Yok';
}
else
{
	$kul_adi=mysql_query("select k_adi from uyeler where id='".$yaz['uye_id']."'");
	while(($yazz = mysql_fetch_array($kul_adi)))
	{
		echo '<a href="profil.php?kul_adi='.$yazz['k_adi'].'"><h4>'.$yazz['k_adi'].' Bunu Beğendi</h4></a>';
		
	}


}
}
if(isset($_GET['giris_yap'])){
echo '<b><h7>Beğenmek İçin Giriş Yapınız</h7></b>';
}
if(isset($_GET['begendin'])){
echo '<b><h7>Bu Gönderiyi Zaten Beğendiniz</h7></b>';

}

?>

</p>
<label for="gizle" class="modalac">

<?php 
$oku= mysql_query("select id from begeni where icerik_id='$id'"); 
$say=mysql_num_rows($oku);
$eren=$say-3;
 if($say>3){
 
	echo '<h2 >Ve '.$eren.'Kişi Daha Bunu Beğendi </h2>';
 
 }
?></label></p>

<input id="gizle" type="checkbox" class="gizle" />

<div class="cerceve2">
  <div class="modal2">

    <label for="gizle" class="kapat">X</label>
     <?php
$cek=mysql_query("select * from begeni where icerik_id='$id' ORDER BY id DESC");


while(($yaz = mysql_fetch_array($cek)))
{
if($yaz['uye_id'] == 0)
{
echo 'Buna Yetkiniz Yok';
}
else
{
	$kul_adi=mysql_query("select k_adi from uyeler where id='".$yaz['uye_id']."'");
	while(($yazz = mysql_fetch_array($kul_adi)))
	{
		echo '<a href="profil.php?kul_adi='.$yazz['k_adi'].'"><h4>'.$yazz['k_adi'].' Bunu Beğendi</h4></a>';
		
	}


}
}

?>
   
  </div>
</div>

</form>
</div>
<div class="yorum">
  <?php
$cek=mysql_query("select * from yorumlar where icerik_id='$id' order by id desc LIMIT 3");

while(($yaz = mysql_fetch_array($cek)))
{
if($yaz['uye_id'] == 0){
echo '<h4>Misafir</h4>'.$yaz['yorum'];

}
else{
$kul_adi=mysql_query("select k_adi from uyeler where id='".$yaz['uye_id']."'");
while(($yazz = mysql_fetch_array($kul_adi))){

echo '<a href="profil.php?kul_adi='.$yazz['k_adi'].'"><h4>'.$yazz['k_adi'].' Diyor ki:</h4></a>'.$yaz['yorum'];

}
}
}
if(isset($_GET['y_eklendi'])){echo '<h4>'.$yaz['yorum'].'</h4>';}



?>
<label for="gizli-checkbox" class="modal-ac">

<?php 
$oku= mysql_query("select yorum from yorumlar where icerik_id='$id'"); 
$say=mysql_num_rows($oku);
$eren=$say-3;
 if($say>3){
 
	echo '</p><h2> Diğer '.$eren.' yorumu görmek için tıklayın </h2>';
 
 }
?></label></p>

<input id="gizli-checkbox" type="checkbox"/>

<div class="cerceve">
  <div class="modal">

    <label for="gizli-checkbox" class="kapat">X</label>
   
     <?php
$cek=mysql_query("select * from yorumlar where icerik_id='$id' order by id desc");

while(($yaz = mysql_fetch_array($cek)))
{
if($yaz['uye_id'] == 0){
echo '<h4>Misafir</h4>'.$yaz['yorum'];

}
else{
$kul_adi=mysql_query("select k_adi from uyeler where id='".$yaz['uye_id']."'");
while(($yazz = mysql_fetch_array($kul_adi))){

echo '<a href="profil.php?kul_adi='.$yazz['k_adi'].'"><h4>'.$yazz['k_adi'].' Diyor ki:</h4></a>'.$yaz['yorum'];

}
}
}
if(isset($_GET['y_eklendi'])){echo '<h4>'.$yaz['yorum'].'</h4>';}



?>
    
  </div>
</div>

</div>






</div>
 <div class="sag_orta">
 <div class="baslik">
 
  <?php
$cek=mysql_query("select * from icerik where id = ".$id);
 
 while($yaz = mysql_fetch_array($cek))
{

echo ' <h5> '.$yaz['icerik_adi'].'</h5></div>';
echo '</tr><tr></td>';
echo ' <div class="sag_ic"><img src="'.$yaz['icerik_resmi'].'"/>';
echo '<table class="sag_tablo" cellspacing="0" cellpadding="5" border="0">';
if(!empty($yaz['yonetmen'])){
echo ' <tr><th scope="row" style="white-space: nowrap">Yönetmen</th><td>'.$yaz['yonetmen'].'</td></tr>';
}
if(!empty($yaz['yapimci'])){
echo '  <tr><th scope="row" style="white-space: nowrap">Yapımcı</th><td>'.$yaz['yapimci'].'</td></tr>';
}
if(!empty($yaz['senarist'])){
echo '  <tr><th scope="row" style="white-space: nowrap">Senarist</th><td>'.$yaz['senarist'].'</td></tr>';
}
if(!empty($yaz['oyuncular'])){
echo '  <tr><th scope="row" style="white-space: nowrap">Oyuncular</th><td>'.$yaz['oyuncular'].'</td></tr>';
}
if(!empty($yaz['tur'])){
echo '  <tr><th scope="row" style="white-space: nowrap">Tür</th><td>'.$yaz['tur'].'</td></tr>';
}


}

  ?>



 
 
 </table>
 </div>
 


	
	
  



 </div>
 <div class="alt">
 </div>

</div>
</body>
</html>
