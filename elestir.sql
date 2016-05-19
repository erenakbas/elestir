-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 May 2016, 15:16:17
-- Sunucu sürümü: 5.6.21
-- PHP Sürümü: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `elestir`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `begeni`
--

CREATE TABLE IF NOT EXISTS `begeni` (
`id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `icerik_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `begeni`
--

INSERT INTO `begeni` (`id`, `uye_id`, `icerik_id`) VALUES
(230, 49, 4),
(231, 50, 5),
(232, 51, 5),
(233, 49, 5),
(234, 52, 5),
(235, 52, 1),
(236, 52, 3),
(237, 52, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `icerik`
--

CREATE TABLE IF NOT EXISTS `icerik` (
`id` int(11) NOT NULL,
  `icerik_adi` varchar(80) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `icerik_resmi` varchar(120) NOT NULL,
  `yonetmen` varchar(80) NOT NULL,
  `yapimci` varchar(80) NOT NULL,
  `senarist` varchar(80) NOT NULL,
  `oyuncular` text NOT NULL,
  `tur` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `icerik`
--

INSERT INTO `icerik` (`id`, `icerik_adi`, `kategori_id`, `icerik_resmi`, `yonetmen`, `yapimci`, `senarist`, `oyuncular`, `tur`) VALUES
(1, 'Esaretin Bedeli', 1, 'img/esaretin_bedeli.jpg', 'Frank Darabont', 'Niki Marvin', 'Roman: Stephen King\r\nUyarla:Frank Darabont', 'Tim Robbins\r\nMorgan Freeman\r\nBob Gunton\r\nClancy Brown\r\nWilliam Sadler\r\nGil Bellows', ''),
(2, 'Leyla ile Mecnun', 4, 'img/leyla.jpg', 'Onur ÜNLÜ\r\nEyüp BOZ\r\nMurat ONBUL', 'Orkun ÜNLÜ', 'Burak AKSAK', 'Ali ATAY\r\nEzgi ASAROĞLU\r\nMüge BOZ\r\nMelis BİRKAN', 'Absürt komedi'),
(3, 'Tiyatro', 2, 'img/tiyatro.jpg', '', '', '', '', ''),
(4, 'Call of Duty: Black Ops III', 3, 'img/callof.jpg', '', 'David Vonderhaar\r\nJason Blundell', '', '', 'First Person Shooter (FPS)'),
(5, 'Aşk İçin Gelmişiz', 5, 'img/ceceli.jpg', '', 'Mustafa Ceceli\r\nSinan Ceceli', '', '', 'Tasavvuf müziği ve İlahi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id` int(11) NOT NULL,
  `kategori_adi` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_adi`) VALUES
(1, 'Sinema'),
(2, 'Tiyatro'),
(3, 'Oyun'),
(4, 'Dizi'),
(5, 'Müzik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
`id` int(11) NOT NULL,
  `k_adi` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `sifre` varchar(20) NOT NULL,
  `avatar` varchar(120) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `k_adi`, `email`, `sifre`, `avatar`) VALUES
(49, 'eren', 'erenakbas@gmail.com', '12345678E', NULL),
(50, 'Ali', 'ali@gmail.com', '12345678E', NULL),
(51, 'Ahmet', 'ahmet@gmail.com', '12345678E', NULL),
(52, 'Fatma', 'fatma@gmail.com', '12345678E', NULL),
(53, 'eee', 'e@a', '12345678E', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE IF NOT EXISTS `yorumlar` (
`id` int(11) NOT NULL,
  `icerik_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `yorum` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `icerik_id`, `uye_id`, `yorum`) VALUES
(110, 4, 49, 'super'),
(113, 5, 0, 'super'),
(114, 5, 49, 'harika'),
(115, 5, 50, 'iyi'),
(116, 5, 51, 'Ceceli!'),
(117, 5, 52, 'Fena degil'),
(118, 1, 52, 'iyi'),
(119, 3, 52, 'tiyatro'),
(120, 2, 52, 'harika');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `begeni`
--
ALTER TABLE `begeni`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `icerik`
--
ALTER TABLE `icerik`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
 ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `begeni`
--
ALTER TABLE `begeni`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=238;
--
-- Tablo için AUTO_INCREMENT değeri `icerik`
--
ALTER TABLE `icerik`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
