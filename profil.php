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
<div class="ikon"><a href="index.php"> <img src="ikon.jpg"></a></div>
<div class="header-search">
<form id="search" name="arama" method="post" action="ara.php">
<input type="text" class="search" id="headerSearch" value="" name="arama" required style="opacity: 0.7;"> 
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


</tr>
</table>
</div>

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
  <div class="orta_menu">
  
  <div class="fotoprofil">
  <?php
  
  
   if(isset($_SESSION["login"])){
  
  if(isset($_GET['kul_adi']))
{
  $cek=mysql_query("select * from uyeler where k_adi='".$_GET["kul_adi"]."'");
  while($yaz=mysql_fetch_array($cek)){
 
  echo '<img src="'.$yaz['resim'].'"width="160" height="200">';
}}
else{

  $cek=mysql_query("select * from uyeler where k_adi='".$_SESSION["k_adi"]."'");
  while($yaz=mysql_fetch_array($cek)){
   
   echo '<img src="'.$yaz['resim'].'"width="160" height="200">';
  }
}

  
 
}  
 else{
  echo '<a href="uyeler.php"><h3>Bu Sayfayı Görmeye Yetkiniz Yok Lütfen Giriş Yapınız</h3></a>';
  }
  
  
  
  
  ?>
  </div>

  
  <div class="p_bilgileri">
  <?php

  if(isset($_SESSION["login"])){
  
  if(isset($_GET['kul_adi']))
{
  $cek=mysql_query("select * from uyeler where k_adi='".$_GET["kul_adi"]."'");
  while($yaz=mysql_fetch_array($cek)){
  echo '<h4>Kullanıcı Adı<p></h4><h4>'.$yaz['k_adi'].'</h4>';
  echo '<h4>E-Mail<p></h4><h4>'.$yaz['email'].'</h4>';
  
}}
else{

  $cek=mysql_query("select * from uyeler where k_adi='".$_SESSION["k_adi"]."'");
  while($yaz=mysql_fetch_array($cek)){
    echo '<h4>Kullanıcı Adı<p></h4><h4>'.$yaz['k_adi'].'</h4>';
  echo '<h4>E-Mail<p></h4><h4>'.$yaz['email'].'</h4>';
  
  }
}

  
 
}  
 else{
  echo '<a href="uyeler.php"><h3>Bu Sayfayı Görmeye Yetkiniz Yok Lütfen Giriş Yapınız</h3></a>';
  }

  



  ?></div>
  
  
  
   </div>



 </div>
 <div class="alt">
 </div>

</div>
</body>
</html>
