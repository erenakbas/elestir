<?php

$baglanti = @mysql_connect('localhost', 'root', '');
$veritabani = @mysql_select_db('elestir');
  mysql_query("SET character_set_results=utf8", $baglanti);
?>