<?php
session_start();
if(isset($_SESSION["login"])){
header("Location:anasayfa.php");
}
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
<div class="header-search">
<form id="search" name="arama" method="post" action="ara.php">
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




 <div class="uye_div">
  
   <div class="uyeol_logo"> <h1>Üye ol</h1></div>
   <div class="girisyap_logo"> <h1>Giriş Yap</h1></div>
   
  <div class="uyeol_arkaplan">
  <form method="post" action="kayit.php" >
 <div class="k_adi"><h3>Kullanıcı adı:<input type="text" name="k_adi" id="k_adi" class="kutu"></h3></div>
  <div class="email"><h3>Email:<input type="email" name="email" id="email" class="kutu"></h3></div>
  <div class="sifre"><h3>Şifre:<input type="password" name="sifre" id="sifre" class="kutu"></h3></div>
  <div class="sifre_t"><h3>Şifre Tekrarı:<input type="password" name="sifretekrar" id="sifretekrar" class="kutu"></h3></div>
  <div class="k_ol"><button type="submit" name="uyeol" class="buttonuyeol">Üye Ol</button> </form></div>
 
  </div>
  
  <div class="uyari">
  <?php
if(isset($_GET['basarili'])){
echo "<h4>'Kayıt İşlemi Başarılı Lütfen Giriş Yapınız'</h4>";
}
?>
<?php
if(isset($_GET['emailtekrar'])){
echo "<h4>'Mevcut E-mailde Kullanıcı Vardır'</h4>";
}
?>
<?php
if(isset($_GET['k_adi_Bos'])){
echo "<h4>'Kullanıcı Adı Alanı Boş Geçilemez'</h4>";
}
?>
<?php
if(isset($_GET['email_bos'])){
echo "<h4>'E-mail Alanı Boş Geçilemez'</h4>";
}
?>
<?php
if(isset($_GET['sifre_bos'])){
echo "<h4>'Şifre Alanı Boş Geçilemez'</h4>";
}
?>
<?php
if(isset($_GET['farklisifre'])){
echo "<h4>'Şifreler Aynı Değil'</h4>";
}
?>
<?php
if(isset($_GET['k_tekrar'])){
echo "<h4>'Aynı Kullanıcı Adında Kayıt Mevcut'</h4>";
}
?>
<?php
if(isset($_GET['k_s_bos'])){
echo "<h4>'Lutfen kullanici adi ya da sifreyi bos birakmayiniz'</h4>";
}
?>
<?php
if(isset($_GET['k_s_yanlis'])){
echo "<h4>'Kullanici Adi/Sifre Yanlis'</h4>";
}
?>
<?php
if(isset($_GET['format'])){
echo "<h4>'Şifreniz En Az 8 Karakter ve En Az 1 Büyük Harf İçermek Zorundadır!'</h4>";
}
?>
</div>
  
  <div class="uyegiris_arkaplan">
  <form method="post" action="giris.php" >
  <div class="k_adi"><h3>Kullanıcı adı:<input type="text" name="k_adi" id="k_adi" class="kutu"></h3></div>  
  <div class="u_sifre"><h3>Şifre:<input type="text" name="sifre" id="sifre" class="kutu"></h3></div>
  <div class="g_yap"><button type="action" name="uyeol" class="buttonuyeol">Giriş Yap</button><form></div>
  </div>
 
</div>
 </div>
 <div class="alt">
 </div>

</div>
</body>
</html>
