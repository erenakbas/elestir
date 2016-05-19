<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include("db.php");
?>

<?php

$k_adi = $_POST['k_adi'];
$email = $_POST['email'];
$sifre = $_POST['sifre'];

$sifretekrar = $_POST['sifretekrar'];
$email_kontrol=mysql_query("SELECT * FROM uyeler where email='$email'");
$email_say=mysql_num_rows($email_kontrol);
$k_kontrol=mysql_query("SELECT * FROM uyeler where k_adi='$k_adi'");
$k_say=mysql_num_rows($k_kontrol);
$kontrol = "/\S*((?=\S{8,})(?=\S*[A-Z]))\S*/";



if(($k_adi!=null) &&($email!=null) && ($sifre!=null) &&($email_say==0) && ($sifre==$sifretekrar) &&($k_say==0) && (preg_match($kontrol,$sifre)) ){
include("db.php");
if ($_FILES["resim"]["size"]<1024*1024){
if ($_FILES["resim"]["type"]=="image/jpeg") {
$dosya_adi="imgprofil/".rand(100,1000).$_FILES["resim"]["name"] ;


											
										
										
if(move_uploaded_file($_FILES["resim"]["tmp_name"],$dosya_adi)){

$sql = "insert into uyeler (k_adi, email, sifre,resim)
values ('".$k_adi."', '".$email."', '".$sifre."','".$dosya_adi."')";
$kayit = mysql_query($sql);			
							
																}	
																
																
																
																else	{	
header("Location: uyeler.php?file");
		}
																

												}
			
else{			
		header("Location: uyeler.php?buyuk");
	}

			
											}				
																																					}

 else
 {
  header("Location: uyeler.php?format");
 }

 
 
if ($kayit){

header("Location: uyeler.php?basarili");
}
if(empty($k_adi)){
header("Location: uyeler.php?k_adi_Bos");}

if(empty($email)){
header("Location: uyeler.php?email_bos");}

if(empty($sifre)){
header("Location: uyeler.php?sifre_bos");}


if($email_say!=0){

header("Location: uyeler.php?emailtekrar");
}
if($k_say!=0){

header("Location: uyeler.php?k_tekrar");
}
if($sifre!=$sifretekrar){

header("Location: uyeler.php?farklisifre");
}




 
?>





