-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2019 lúc 06:58 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet_baitap`
--

CREATE TABLE `baiviet_baitap` (
  `mabaiviet_baitap` int(11) NOT NULL,
  `tieude` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `img` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tinhtrang` tinyint(4) DEFAULT NULL,
  `link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `matheloai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `baiviet_baitap`
--

INSERT INTO `baiviet_baitap` (`mabaiviet_baitap`, `tieude`, `mota`, `img`, `tinhtrang`, `link`, `matheloai`) VALUES
(1, 'Thể thao', 'Các từ vựng về thể thao', 'user/img baitap/imgbaiviet_baitap/sport.png', 0, '#', 1),
(2, 'Công việc', 'Các từ vựng liên quan đến nghề nghiệp', 'user/img baitap/imgbaiviet_baitap/job.png', 0, '#', 1),
(3, 'Món ăn', 'Các từ vựng về món ăn', 'user/img baitap/imgbaiviet_baitap/food.png', 0, '#', 1),
(4, 'Động vật', 'Các từ vựng về động vật', 'user/img baitap/imgbaiviet_baitap/animal.png', 0, '#', 1),
(5, 'Nghành IT', 'Các từ vựng về công việc IT', 'user/img baitap/imgbaiviet_baitap/ITindustry.png', 0, '#', 2),
(6, 'Phần mềm & phần cứng', 'Từ vựng liên quan phần cứng và phần mềm', 'user/img baitap/imgbaiviet_baitap/computersystem.png', 0, '#', 2),
(7, 'Website', 'Từ vững về các website', 'user/img baitap/imgbaiviet_baitap/webisite.png', 0, '#', 2),
(8, 'Database', 'Các từ vựng liên quan đến databasse', 'user/img baitap/imgbaiviet_baitap/database.png', 0, '', 2),
(9, 'Thương mại điện tử ', 'Các từ vựng liên quan đến thương mại điện tử', 'user/img baitap/imgbaiviet_baitap/ecommerce.png', 0, '', 2),
(10, 'Hệ thống mạng ', '', 'user/img baitap/imgbaiviet_baitap/webisite(0).png', 0, '', 2),
(11, 'IT Support', 'Các từ vựng liên quan đến IT support', 'user/img baitap/imgbaiviet_baitap/ITsupport.png', 0, '#', 2),
(12, 'IT security', 'Các từ vựng liên quan đến bảo mật', 'user/img baitap/imgbaiviet_baitap/ITsecurity.png', 0, '#', 2),
(13, 'test', 'ko co gi', '', 0, '', 1),
(14, 'dsadas', 'dsadsa', '', 0, 'dsadas', 1),
(15, 'Lý thuyết và ví dụ', '', NULL, 0, '', 3),
(16, 'Bài tập 1: Quá khứ đơn(PAST SIMPLE)(I did)', '', NULL, 0, '', 3),
(17, 'Bài tập 2: Quá khứ tiếp diễn(PAST CONTINUE) (I was doing)', '', NULL, 0, '', 3),
(18, 'Lý thuyết và ví dụ', '', NULL, 0, '', 4),
(19, 'Bài tập 1: Hiện tại đơn(PRESENT SIMPLE)(I do)', '', 'user/img baitap/imgbaiviet_baitap/cool-cartoon-5459043.png', 0, '', 4),
(20, 'Bài tập 2: Hiện tại tiếp diễn 1 (PRESENT CONTINUE) (I am doing)', '', 'user/img baitap/imgbaiviet_baitap/23755725_1973686619553563_3870486700845139923_n.jpg', 0, '', 4),
(21, 'Bài tập 3: Hiện tại tiếp diễn 2 (PRESENT CONTINUE) (I am doing)', '', NULL, 0, '', 4),
(22, 'Bài tập 4: Hiện tại hoàn thành (PRESENT PERFECT) (I have done)', '', NULL, 0, '', 4),
(23, 'Lý thuyết và ví dụ', '', NULL, 0, '', 5),
(24, 'Bài tập 1: Tương lai đơn 1(Will/Shall)', '', NULL, 0, '', 5),
(25, 'Bài tập 2: Tương lai đơn 2(Will/Shall)', '', NULL, 0, '', 5),
(26, 'Bài tập 3: Tương lai gần(I going to do)', '', NULL, 0, '', 5),
(27, 'Bài tập 4: Tương lai hoàn thành (Will be doing)', '', 'user/img baitap/imgbaiviet_baitap/545057114.jpg', 0, '', 5),
(28, 'Bài tập 3: Quá khứ hoàn thành (PAST PERFECT) (I had done)', '', 'user/img baitap/imgbaiviet_baitap/49748a1c4089639e8404b722ce2ddde1(2).jpg', 0, '', 3),
(29, 'Bài tập 5: Hiện tại hoàn thành tiếp diễn (PRESENT PERFECT CONTINUE)', '', 'user/img baitap/imgbaiviet_baitap/545057092(0).jpg', 0, '', 4),
(30, 'dsad', 'asdasdsa', NULL, 0, 'https://www.youtube.com/watch?v=7gfzFEiE67c', 1),
(31, 'dsadsa', 'dsadasdasd', NULL, 0, 'https://www.youtube.com/watch?v=7gfzFEiE67c', 1),
(32, 'đasa', 'đasadsa', NULL, 0, 'https://www.youtube.com/watch?v=7gfzFEiE67c', 2),
(33, 'asdsad', 'asdasdas', NULL, 0, 'https://www.youtube.com/watch?v=7gfzFEiE67c', 2),
(34, 'dadsa', 'dsadsa', NULL, 0, 'https://www.youtube.com/watch?v=7gfzFEiE67c', 2),
(35, 'oZIl', 'Best assitant footballer', 'user/img baitap/imgbaiviet_baitap/22c1086685d6813341f244c0e77ec18a.jpg', 0, 'https://www.youtube.com/watch?v=7gfzFEiE67c', 1),
(36, 'Mesut ozil', 'best assistant in primier league', 'user/img baitap/imgbaiviet_baitap/545057114(0).jpg', 0, 'https://www.youtube.com/watch?v=7gfzFEiE67c', 1),
(37, 'dsadsa', 'adsadsadsa', 'user/img baitap/imgbaiviet_baitap/World_Champion_Germany.jpg', 0, 'https://www.youtube.com/watch?v=7gfzFEiE67c', 2),
(38, 'dsadasdas', 'dsadsadsa', 'user/img baitap/imgbaiviet_baitap/49748a1c4089639e8404b722ce2ddde1(0).jpg', 0, 'http://localhost/projectnew/admin/menusetting.php?page=3', 2),
(39, 'Test2', '<p>test tinh trang&nbsp;</p>', 'user/img baitap/imgbaiviet_baitap/2018_fifa_world_cup_trophy_russia.jpg', 0, '', 1),
(40, 'Bài tập test 2 biên tập viên', 'dsadasdadasds', 'user/img baitap/imgbaiviet_baitap/22c1086685d6813341f244c0e77ec18a(4).jpg', 0, 'link bai tap', 2),
(41, 'dsadsadasdas', 'dsadsadsadasdsa', 'user/img baitap/imgbaiviet_baitap/22c1086685d6813341f244c0e77ec18a(6).jpg', 0, 'https://www.w3schools.com/php/func_mysqli_real_escape_string.asp', 1),
(42, 'What can I practise here', 'bài tập ', 'user/img baitap/imgbaiviet_baitap/545057114(1).jpg', 0, 'http://localhost/projectnew/admin/menusetting.php?page=3', 7),
(43, 'Can could be able to', 'nothing', 'user/img baitap/imgbaiviet_baitap/545057114(2).jpg', 1, 'https://www.w3schools.com/php/func_mysqli_real_escape_string.asp', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `macau` int(11) NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `mabaiviet_baitap` int(11) DEFAULT NULL,
  `audio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`macau`, `noidung`, `mabaiviet_baitap`, `audio`) VALUES
(1, '<p>B&aacute;c sĩ</p>', 2, NULL),
(13, '<p>C&acirc;u hỏi 1</p>', 1, NULL),
(16, '<p>Chọn đ&aacute;p &aacute;n đ&uacute;ng 3</p>', 1, NULL),
(17, '<p>Chọn đ&aacute;p &aacute;n đ&uacute;ng 2</p>', 1, NULL),
(18, '<p>________ DDiendsadadsadasd</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(2).mp3'),
(19, '<p>minh2________</p>', 19, 'user/audio/audio cauhoi/perry(1).mp3'),
(20, '<p>Susan_____(study) in her room when she heard the noise.</p>', 19, 'user/audio/audio cauhoi/perry(2).mp3'),
(21, 'dsadsadasdas', 17, NULL),
(24, '<p>Test sửa c&acirc;u hỏi quyền bi&ecirc;n tập vi&ecirc;n!!!</p>', 3, NULL),
(32, '<p>Chọn từ \"Cảnh s&aacute;t\"</p>', 1, NULL),
(33, '<p>Chọn đ&aacute;p &aacute;n đ&uacute;ng nhất 1</p>', 20, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(8).mp3'),
(34, '<p>Chọn đ&aacute;p &aacute;n đ&uacute;ng nhất 2</p>', 20, 'user/audio/audio cauhoi/perry(3).mp3'),
(43, '<p>Chọn từ \"Cảnh s&aacute;t\"</p>', 4, NULL),
(45, '<p>Vế đầu c&acirc;u hỏi ___vế sau c&acirc;u hỏi ?</p>', 29, NULL),
(46, '<p>Vế đầu c&acirc;u hỏi ____vế sau c&acirc;u hỏi ?</p>', 29, 'user/audio/audio cauhoi/goalkeepergloves7(4).mp3'),
(48, '<p>Chọn phương &aacute;n đ&uacute;ng 2</p>', 1, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(7).mp3'),
(49, '<p>Sửa c&acirc;u hỏi test</p>', 35, NULL),
(52, 'Array', 11, NULL),
(53, 'Array', 11, NULL),
(54, 'Array', 11, NULL),
(55, 'Array', 11, NULL),
(56, '<p>Nội dung c&acirc;u hỏi ?</p>', 11, NULL),
(57, '<p>Nội dung c&acirc;u hỏi ?</p>', 11, NULL),
(58, '<p>Nội dung c&acirc;u hỏi ?</p>', 11, NULL),
(59, '<p>Nội dung c&acirc;u hỏi ?</p>', 11, NULL),
(60, '<p>Nội dung c&acirc;u hỏi ?</p>', 11, NULL),
(61, '<p>Chọn từ tiếng anh đồng nghĩa với từ \"Hỗ trợ\"</p>', 11, NULL),
(62, '<p>H&atilde;y ch&aacute;&raquo;&Acirc;Ân t&aacute;&raquo;&laquo; ph&ugrave; h&aacute;&raquo;&pound;p _______ &Auml;&lsquo;i&aacute;&raquo;&Acirc;Ân v&agrave;o ch&aacute;&raquo;&mdash; tr&aacute;&raquo;&lsquo;ng?</p>', 20, NULL),
(63, '<p>Vế1 ____Vế 2 ?</p>', 20, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(0).mp3'),
(64, '<p>sdadsadsadsadsa____</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(4).mp3'),
(65, '<p>djsaldasjd djlsadjsaljdla dsjaldjsakldj dsjaldjsalkdjsal djsaldjsaldjlsa djs d d d d d d d</p>', 1, NULL),
(66, '<p>C&acirc;u hỏi tiếp theo dsadsadsadsadsadssadsadsa dsad sadsad asdsadsadasdsadsadsadaddsad dsadsa d&aacute; dsa</p>', 1, NULL),
(67, '<p>C&acirc;u hỏi test</p>', 1, NULL),
(68, '<p>Nội dung c&acirc;u hỏi ?</p>', 1, NULL),
(69, '<p>Th&ecirc;m c&acirc;u hỏi trong bi&ecirc;n tập vi&ecirc;n</p>', 1, NULL),
(70, '<p>adasdasdadadasdas</p>', 1, NULL),
(71, '<p>Nội dung c&acirc;u hỏi ?</p>', 1, NULL),
(72, '<p>Nội dung c&acirc;u hỏi 1 ?</p>', 40, NULL),
(73, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 21, NULL),
(74, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 21, NULL),
(75, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 20, NULL),
(76, '<p>Nội dung c&acirc;u hỏi ?</p>', 1, NULL),
(77, '<p>Nội dung c&acirc;u hỏi ?</p>', 41, NULL),
(78, '<p>C&acirc;u hỏi số 5 vế1 ______ C&acirc;u hỏi số 5 vế 2&nbsp;?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(5).mp3'),
(79, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(6).mp3'),
(80, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(7).mp3'),
(81, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(8).mp3'),
(82, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(9).mp3'),
(83, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(9)(0).mp3'),
(84, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(9)(1).mp3'),
(85, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(9)(2).mp3'),
(86, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(9)(3).mp3'),
(87, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(9)(4).mp3'),
(88, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi cau cuoi ?</p>', 19, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(9)(5).mp3'),
(89, '<p>test quyen bien tap vien ?</p>', 12, NULL),
(90, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 21, 'user/audio/audio cauhoi/PhineasAndFerbThemeSongDangcapnhaneaq.mp3'),
(91, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 43, 'user/audio/audio cauhoi/goalkeepergloves7(9)(9)(9)(9)(6).mp3'),
(92, '<p>Vế đầu c&acirc;u hỏi ______ vế sau c&acirc;u hỏi ?</p>', 43, 'user/audio/audio cauhoi/MobileMammalPhineasandFerb.mp3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noidungbaiviet`
--

CREATE TABLE `noidungbaiviet` (
  `mabaiviet` int(11) NOT NULL,
  `tieude` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `img` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `matheloai` int(11) DEFAULT NULL,
  `thoigian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tinhtrang` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `noidungbaiviet`
--

INSERT INTO `noidungbaiviet` (`mabaiviet`, `tieude`, `mota`, `img`, `noidung`, `matheloai`, `thoigian`, `tinhtrang`) VALUES
(1, 'CUDICINI NÓI VỀ CECH VÀ TRẬN GẶP ARSENAL', 'Carlo Cudicini mong đợi sẽ có trận đấu hấp dẫn trước Arsenal vào thứ Bảy này, ông cũng chia sẻ quan điểm về Petr Cech khi biết tin người đồng đội cũ ở Chelsea sẽ giải nghệ vào cuối mùa.', 'user/img baitap/img baiviet/22c1086685d6813341f244c0e77ec18a(9)(9)(5).jpg', '<div class=\"standard-article__synopsis ng-star-inserted\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; color: #ffffff; font-size: 16px; background-color: #ebe6df;\">\r\n<div class=\"page-rich-text ng-star-inserted\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; font-size: 1.125rem; line-height: 1.75; letter-spacing: 0.3px; color: #151211;\">\r\n<h1 class=\"standard-article__heading__title__text\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 4rem; line-height: 1.11;\">CUDICINI N&Oacute;I VỀ CECH V&Agrave; TRẬN GẶP ARSENAL</h1>\r\n<header class=\"standard-article__heading\" style=\"margin: 0px 0px 1.5625rem; padding: 0px; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; -webkit-box-ordinal-group: 2; order: 1; width: 1226.31px; grid-column: 2 / -1;\">\r\n<div class=\"standard-article__heading__title\" style=\"margin: 0px 0px 1.2rem; padding: 0px; box-sizing: border-box; font-family: \'Basis Grotesque Light\', Arial, Helvetica, sans-serif; letter-spacing: 0.3px; color: #001489; text-transform: uppercase;\">&nbsp;</div>\r\n<ul class=\"info-bar\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; display: flex; flex-wrap: wrap; -webkit-box-align: center; align-items: center; list-style-type: none;\">\r\n<li class=\"info-bar__timestamp\" style=\"margin: 0px 1em 0px 0px; padding: 0px; box-sizing: border-box; font-size: 0.875rem; text-transform: uppercase; color: #665f5a;\">17/01/2019</li>\r\n<li class=\"info-bar__social-media\" style=\"margin: 0px 1em 0px 0px; padding: 0px; box-sizing: border-box; width: auto; font-size: 0.875rem; text-transform: uppercase; color: #665f5a;\">\r\n<ul class=\"social-shares social-shares--default\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; list-style-type: none; display: flex; -webkit-box-align: center; align-items: center; font-size: 1rem; -webkit-box-pack: end; justify-content: flex-end;\">\r\n<li class=\"social-shares__item ng-star-inserted\" style=\"margin: 0px 0.625rem 0px 0px; padding: 0px; box-sizing: border-box; position: relative;\"><a style=\"margin: 0px; padding: 0px; box-sizing: border-box; text-decoration-line: none; color: #0033ff; display: flex; -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; border-radius: 4rem; border: 1px solid #001489; height: 2rem; width: 2rem; cursor: pointer;\" href=\"http://www.facebook.com/sharer.php?u=https%3A%2F%2Fwww.chelseafc.com%2Fvi%2Fnews%2F2019%2F1%2F17%2Fcudicini-discusses-cech-s-career-and-arsenal-test\" target=\"_blank\" rel=\"noopener\" data-social-type=\"facebook\"><span class=\"title\" style=\"margin: -1px; padding: 0px; box-sizing: border-box; position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); border: 0px;\">FACEBOOK</span></a></li>\r\n<li class=\"social-shares__item ng-star-inserted\" style=\"margin: 0px 0.625rem 0px 0px; padding: 0px; box-sizing: border-box; position: relative;\"><a style=\"margin: 0px; padding: 0px; box-sizing: border-box; text-decoration-line: none; color: #0033ff; display: flex; -webkit-box-pack: center; justify-content: center; -webkit-box-align: center; align-items: center; border-radius: 4rem; border: 1px solid #001489; height: 2rem; width: 2rem; cursor: pointer;\" href=\"https://twitter.com/intent/tweet?url=https%3A%2F%2Fwww.chelseafc.com%2Fvi%2Fnews%2F2019%2F1%2F17%2Fcudicini-discusses-cech-s-career-and-arsenal-test&amp;text=Cudicini%20n%C3%B3i%20v%E1%BB%81%20Cech%20v%C3%A0%20tr%E1%BA%ADn%20g%E1%BA%B7p%20Arsenal&amp;via=ChelseaFC\" target=\"_blank\" rel=\"noopener\" data-social-type=\"twitter\"><span class=\"title\" style=\"margin: -1px; padding: 0px; box-sizing: border-box; position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); border: 0px;\">TWITTER</span></a></li>\r\n<li class=\"social-shares__item\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; position: relative;\">&nbsp;</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n</header>\r\n<figure class=\"standard-article__hero ng-star-inserted\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; -webkit-box-ordinal-group: 3; order: 2; width: auto; grid-column: 1 / -1;\">\r\n<div class=\"standard-article__hero__image animate-image ng-star-inserted\" style=\"margin: 0px 0px 1.875rem; padding: 0px; box-sizing: border-box; transition: opacity 0.5s ease-out 0s, transform 0.3s ease-in-out 0s, -webkit-transform 0.3s ease-in-out 0s; min-height: 38.125rem; background-size: cover; background-position: center top; position: relative; opacity: 1; background-repeat: no-repeat; background-image: url(\'https://res.cloudinary.com/chelsea-production/image/upload/c_fill,dpr_auto,f_auto,fl_lossy,g_face,h_815,q_auto,w_1490/v1/video/2019/01/GettyImages-85601890\');\">&nbsp;</div>\r\n</figure>\r\n<section class=\"standard-article__body\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; -webkit-box-ordinal-group: 4; order: 3; width: 846.313px; grid-area: 3 / 2 / auto / 16;\">\r\n<div class=\"standard-article__synopsis ng-star-inserted\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; color: #ffffff; font-size: 16px; background-color: #ebe6df;\">\r\n<div class=\"page-rich-text ng-star-inserted\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; font-size: 1.125rem; line-height: 1.75; letter-spacing: 0.3px; color: #151211;\">&nbsp;</div>\r\n</div>\r\n<div class=\"standard-article__content\" style=\"margin: 0px 0px 1.875rem; padding: 0px; box-sizing: border-box; color: #ffffff; font-size: 16px; background-color: #ebe6df;\">\r\n<div class=\"page-rich-text ng-star-inserted\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; font-size: 1.125rem; line-height: 1.75; letter-spacing: 0.3px; color: #151211;\">&nbsp;</div>\r\n</div>\r\n</section>\r\n<h3 style=\"margin: 0px 0px 1.875rem; padding: 0px; box-sizing: border-box; font-family: \'Basis Grotesque Regular\', Arial, Helvetica, sans-serif; font-weight: 400; font-style: normal; letter-spacing: 0.3px; text-align: left; color: #001489; line-height: 1.33; font-size: 2.5rem;\">Carlo Cudicini mong đợi sẽ c&oacute; trận đấu hấp dẫn trước Arsenal v&agrave;o thứ Bảy n&agrave;y, &ocirc;ng cũng chia sẻ quan điểm về Petr Cech khi biết tin người đồng đội cũ ở Chelsea sẽ <a style=\"margin: 0px; padding: 0px; box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #0033ff;\" href=\"https://www.chelseafc.com/vi/news/2019/1/15/chelsea-legend-petr-cech-announces-retirement?cardIndex=1-1\">giải nghệ v&agrave;o cuối m&ugrave;a</a>.</h3>\r\n</div>\r\n</div>', 1, '2019-01-17 23:19:42', 0),
(2, 'Thì hiện tại đơn (Present Simple) – Cách dùng, Công Thức', 'Có thể nói thì hiện tại đơn là một trong những ngữ pháp căn bản nhất trong tiếng anh. Nó được sử dụng rất phổ biến trong văn phạm tiếng anh. Chính vì sự cần thiết cũng như tầm quan trọng của thì hiện tại đơn nên EFC đã tổng hợp các kiến thức cần thiết nhất giúp các bạn có thể hiểu rõ cấu trúc ngữ pháp này. Hy vọng bài viết này có thể giúp ích cho các bạn.', 'user/img baitap/img baiviet/2018_fifa_world_cup_trophy_russia.jpg', '<div class=\"td-post-featured-image\" style=\"box-sizing: border-box; position: relative; margin-bottom: 20px; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\">C&oacute; thể n&oacute;i<strong style=\"box-sizing: border-box;\">&nbsp;th&igrave; hiện tại đơn</strong>&nbsp;l&agrave; một trong những ngữ ph&aacute;p căn bản nhất trong tiếng anh. N&oacute; được sử dụng rất phổ biến trong văn phạm tiếng anh. Ch&iacute;nh v&igrave; sự cần thiết cũng như tầm quan trọng của th&igrave; hiện tại đơn n&ecirc;n EFC đ&atilde; tổng hợp c&aacute;c kiến thức cần thiết nhất gi&uacute;p c&aacute;c bạn c&oacute; thể hiểu r&otilde; cấu tr&uacute;c ngữ ph&aacute;p n&agrave;y. Hy vọng b&agrave;i viết n&agrave;y c&oacute; thể gi&uacute;p &iacute;ch cho c&aacute;c bạn.<br style=\"box-sizing: border-box;\" /><iframe style=\"box-sizing: border-box; height: 391.5px;\" src=\"https://www.youtube.com/embed/QpPuicx4Dac\" width=\"100%\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></div>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">1. Định nghĩa th&igrave; hiện tại đơn</h2>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">Th&igrave; hiện tại đơn (tiếng Anh: Simple present hoặc Present simple) l&agrave; một th&igrave; trong tiếng Anh hiện đại. Th&igrave; n&agrave;y diễn tả một h&agrave;nh động chung chung, tổng qu&aacute;t lặp đi lặp lại nhiều lần hoặc một sự thật hiển nhi&ecirc;n hoặc một h&agrave;nh động diễn ra trong thời gian hiện tại.</p>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">2. C&aacute;ch sử dụng th&igrave; hiện tại đơn</h2>\r\n<table style=\"box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; width: 696px; margin-bottom: 21px; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\">\r\n<tbody style=\"box-sizing: border-box;\">\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed; text-align: center;\" width=\"312\"><strong style=\"box-sizing: border-box;\">C&aacute;ch d&ugrave;ng th&igrave; hiện tại đơn</strong></td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed; text-align: center;\" width=\"312\"><strong style=\"box-sizing: border-box;\">V&iacute; dụ về th&igrave; hiện tại đơn</strong></td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">Diễn đạt một th&oacute;i quen hoặc h&agrave;nh động lặp đi lặp lại trong hiện tại</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">I usually go to bed at 11 p.m. (T&ocirc;i thường đi ngủ v&agrave;o l&uacute;c 11 giờ)\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">We go to work every day.&nbsp; (T&ocirc;i đi l&agrave;m mỗi ng&agrave;y)</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">My mother always gets up early. (Mẹ t&ocirc;i lu&ocirc;n lu&ocirc;n thức dậy sớm.)</p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">Ch&acirc;n l&yacute;, sự thật hiển nhi&ecirc;n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">The sun rises in the East and sets in the West. (Mặt trời mọc ở ph&iacute;a đ&ocirc;ng v&agrave; lặn ở ph&iacute;a T&acirc;y)\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">The earth moves around the Sun. (Tr&aacute;i đất quay quanh mặt trời)</p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">Sự việc xảy ra trong tương lai. C&aacute;ch n&agrave;y thường &aacute;p dụng để n&oacute;i về thời gian biểu, chương tr&igrave;nh hoặc kế hoạch đ&atilde; được cố định theo thời gian biểu.</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">The plane takes off at 3 p.m. this afternoon. (Chiếc m&aacute;y bay hạ c&aacute;nh l&uacute;c 3 giờ chiều nay)\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">The train leaves at 8 am tomorrow. (T&agrave;u khởi h&agrave;nh l&uacute;c 8 giờ s&aacute;ng mai.)</p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">Sử dụng trong c&acirc;u điều kiện loại 1:</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">What will you do if you fail your exam? (Bạn sẽ l&agrave;m g&igrave; nếu bạn trượt kỳ thi n&agrave;y?)</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\">Sử dụng trong một số cấu tr&uacute;c&nbsp;kh&aacute;c</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" width=\"312\"><em style=\"box-sizing: border-box;\">We will wait,&nbsp;<u style=\"box-sizing: border-box;\">until</u>&nbsp;she comes.&nbsp;</em>(Ch&uacute;ng t&ocirc;i sẽ đợi cho đến khi c&ocirc; ấy tới)</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">3. Học to&agrave;n bộ c&aacute;c th&igrave; tiếng Anh</h2>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">Th&igrave; hiện tại đơn l&agrave; một trong những th&igrave; cơ bản được sử dụng nhiều nhất trong tiếng Anh. Học tiếng Anh quan trọng nhất l&agrave; việc sử dụng th&agrave;nh thạo được c&aacute;c th&igrave; khi Nghe N&oacute;i Đọc Viết. Nếu bạn ở H&agrave; Nội v&agrave; muốn học lại to&agrave;n bộ c&aacute;c kiến thức nền tảng tiếng Anh về ngữ ph&aacute;p v&agrave; từ vựng kết hợp với luyện tập Nghe N&oacute;i trong 3 th&aacute;ng th&igrave; bạn c&oacute; thể tham khảo lộ tr&igrave;nh đ&agrave;o tạo Tiếng Anh cho người mới bắt đầu của&nbsp;<strong style=\"box-sizing: border-box;\">Anh Ngữ Jaxtina</strong>&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #0ae100; text-decoration-line: none;\" href=\"http://bit.ly/jaxtina-ngu-phap\">tại đ&acirc;y</a></p>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">4. C&ocirc;ng thức th&igrave; hiện tại đơn</h2>\r\n<table style=\"box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; width: 696px; margin-bottom: 21px; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px; height: 579px;\" border=\"1\" width=\"962\" cellpadding=\"0\">\r\n<tbody style=\"box-sizing: border-box;\">\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"114\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">Thể</strong></p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"264\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">Động từ &ldquo;tobe&rdquo;</strong></p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"293\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">Động từ &ldquo;thường&rdquo;</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"center\" width=\"114\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">Khẳng định</strong></p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"264\">\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px; font-size: 15px;\"><strong style=\"box-sizing: border-box;\">S + am/are/is + &hellip;&hellip;</strong></li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex:</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">I +&nbsp;am;</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">We, You, They&nbsp; +&nbsp;are He, She, It&nbsp; +&nbsp;is</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex:&nbsp; I&nbsp;am&nbsp;a student. (T&ocirc;i l&agrave; một sinh vi&ecirc;n.)</p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"293\">\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px; font-size: 15px;\"><strong style=\"box-sizing: border-box;\">S + V(e/es) + &hellip;&hellip;I ,</strong></li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">We, You, They&nbsp; +&nbsp; V (nguy&ecirc;n thể)</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">He, She, It&nbsp; +&nbsp;V (s/es)</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex:&nbsp; He often&nbsp;plays&nbsp;soccer. (Anh ấy thường xuy&ecirc;n chơi b&oacute;ng đ&aacute;)</p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"center\" width=\"114\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">Phủ định</strong></p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"264\">\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px; font-size: 15px;\"><strong style=\"box-sizing: border-box;\">S + am/are/is + not +</strong></li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><em style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box;\">is not = isn&rsquo;t ;</strong></em></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><em style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box;\">are not = aren&rsquo;t</strong></em></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex:&nbsp; I&nbsp;am not&nbsp;a student. (T&ocirc;i kh&ocirc;ng phải l&agrave; một sinh vi&ecirc;n.)</p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"293\">\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px; font-size: 15px;\"><strong style=\"box-sizing: border-box;\">S + do/ does + not + V(ng.thể)</strong></li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><em style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box;\">do not = don&rsquo;t</strong></em></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><em style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box;\">does not = doesn&rsquo;t</strong></em></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex:&nbsp; He&nbsp;doesn&rsquo;t&nbsp;often&nbsp;play soccer. (Anh ấy kh&ocirc;ng thường xuy&ecirc;n chơi b&oacute;ng đ&aacute;)</p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"center\" width=\"114\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">Nghi vấn</strong></p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"264\">\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px; font-size: 15px;\"><strong style=\"box-sizing: border-box;\">Yes &ndash; No question (C&acirc;u hỏi ngắn)&nbsp;</strong></li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Q:&nbsp;Am/ Are/ Is&nbsp;&nbsp;(not)&nbsp;+ S + &hellip;.?</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">A:Yes, S + am/ are/ is.</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">No, S + am not/ aren&rsquo;t/ isn&rsquo;t.</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex:&nbsp;&nbsp;Are&nbsp;you a student?</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Yes, I am. / No, I am not.</p>\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px; font-size: 15px;\"><strong style=\"box-sizing: border-box;\">Wh- questions (C&acirc;u hỏi c&oacute; từ để hỏi)</strong></li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Wh + am/&nbsp;are/&nbsp;is&nbsp;&nbsp;(not)&nbsp;+ S + &hellip;.?</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex: Where are you from? (Bạn đến từ đ&acirc;u?)</p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"bottom\" width=\"293\">\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px; font-size: 15px;\"><strong style=\"box-sizing: border-box;\">Yes &ndash; No question (C&acirc;u hỏi ngắn)</strong></li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Q: Do/ Does (not)&nbsp;+ S +&nbsp;V(ng.thể)..?</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">A:Yes, S + do/ does.</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">No, S + don&rsquo;t/ doesn&rsquo;t.</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex:&nbsp;&nbsp;Does he play soccer?</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Yes, he does. / No, he doesn&rsquo;t.</p>\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px; font-size: 15px;\"><strong style=\"box-sizing: border-box;\">Wh- questions (C&acirc;u hỏi c&oacute; từ để hỏi)</strong></li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Wh + do/ does(not)&nbsp;+ S +&nbsp;V(nguy&ecirc;n thể)&hellip;.?</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Ex: Where do you come from? (Bạn đến từ đ&acirc;u?)</p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" valign=\"center\" width=\"114\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">Lưu &yacute;</strong></p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\" colspan=\"2\" valign=\"bottom\" width=\"557\"><strong style=\"box-sizing: border-box;\">C&aacute;ch th&ecirc;m s/es:</strong><br style=\"box-sizing: border-box;\" />&ndash; Th&ecirc;m s v&agrave;o đằng sau hầu hết c&aacute;c động từ: want-wants; work-works;&hellip;<br style=\"box-sizing: border-box;\" />&ndash; Th&ecirc;m es v&agrave;o c&aacute;c động từ kết th&uacute;c bằng ch, sh, x, s: watch-watches;<br style=\"box-sizing: border-box;\" />miss-misses; wash-washes; fix-fixes;&hellip;<br style=\"box-sizing: border-box;\" />&ndash; Bỏ y v&agrave; th&ecirc;m ies v&agrave;o sau c&aacute;c động từ kết th&uacute;c bởi một phụ &acirc;m + y:<br style=\"box-sizing: border-box;\" />study-studies;&hellip;<br style=\"box-sizing: border-box;\" />&ndash; Động từ bất quy tắc: Go-goes; do-does; have-has.<br style=\"box-sizing: border-box;\" /><strong style=\"box-sizing: border-box;\">C&aacute;ch ph&aacute;t &acirc;m phụ &acirc;m cuối s/es:&nbsp;</strong><em style=\"box-sizing: border-box;\">Ch&uacute; &yacute; c&aacute;c ph&aacute;t &acirc;m phụ &acirc;m cuối n&agrave;y phải dựa v&agrave;o phi&ecirc;n &acirc;m quốc tế chứ kh&ocirc;ng dựa v&agrave;o c&aacute;ch viết.</em><br style=\"box-sizing: border-box;\" />&ndash; /s/:Khi từ c&oacute; tận c&ugrave;ng l&agrave; c&aacute;c phụ &acirc;m /f/, /t/, /k/, /p/ , /&eth;/<br style=\"box-sizing: border-box;\" />&ndash; /iz/:Khi từ c&oacute; tận c&ugrave;ng l&agrave; c&aacute;c &acirc;m /s/, /z/, /&int;/, /t&int;/, /ʒ/, /dʒ/ (thường c&oacute; tận c&ugrave;ng l&agrave; c&aacute;c chữ c&aacute;i ce, x, z, sh, ch, s, ge)<br style=\"box-sizing: border-box;\" />&ndash; /z/:Khi từ c&oacute; tận c&ugrave;ng l&agrave; nguy&ecirc;n &acirc;m v&agrave; c&aacute;c phụ &acirc;m c&ograve;n lại</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">5. Dấu hiệu nhận biết th&igrave; hiện tại đơn</h2>\r\n<ul style=\"box-sizing: border-box; padding: 0px; margin-bottom: 26px; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\">\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px;\">Always (lu&ocirc;n lu&ocirc;n) , usually (thường xuy&ecirc;n), often (thường xuy&ecirc;n), frequently (thường xuy&ecirc;n) , sometimes (thỉnh thoảng), seldom (hiếm khi), rarely (hiếm khi), hardly (hiếm khi) , never (kh&ocirc;ng bao giờ), generally (nh&igrave;n chung), regularly (thường xuy&ecirc;n).</li>\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px;\">Every day, every week, every month, every year,&hellip;&hellip;. (Mỗi ng&agrave;y, mỗi tuần, mỗi th&aacute;ng, mỗi năm)</li>\r\n<li style=\"box-sizing: border-box; line-height: 26px; margin-left: 21px;\">Once/ twice/ three times/ four times&hellip;.. a day/ week/ month/ year,&hellip;&hellip;. (một lần / hai lần/ ba lần/ bốn lần &hellip;&hellip;..một ng&agrave;y/ tuần/ th&aacute;ng/ năm)</li>\r\n</ul>', 4, '2019-01-17 23:22:14', 0),
(5, 'Xem video tri ân Petr Cech gần đây, tôi nhớ lại khoảnh khắc xuất thần mà bản thân hầu như quên mất của thủ môn người Czech, giúp the Blues làm nên lịch sử cách đây 15 năm. ', '\r\nXem video tri ân Petr Cech gần đây, tôi nhớ lại khoảnh khắc xuất thần mà bản thân hầu như quên mất của thủ môn người Czech, giúp the Blues làm nên lịch sử cách đây 15 năm. \r\n', 'user/img baitap/img baiviet/20140308-JMP-Arsenal-v-Everton-RT0237.jpg', '\r\nXem video tri ân Petr Cech gần đây, tôi nhớ lại khoảnh khắc xuất thần mà bản thân hầu như quên mất của thủ môn người Czech, giúp the Blues làm nên lịch sử cách đây 15 năm. \r\n', 3, '2019-01-18 08:11:19', 0),
(6, 'ffdsfdsfdsfdsfsd', '\r\nádsadsadsa\r\n\r\n', 'user/img baitap/img baiviet/22c1086685d6813341f244c0e77ec18a(9)(1).jpg', '\r\nĐó là pha cứu thua ngoạn mục và đầy quan trọng với trận đấu, khi hai bàn thắng muộn của Arjen Robben và Joe Cole giúp chúng ta thắng 2-0, trận thắng và giữ sạch lưới thứ ba liên tiếp ở Premier League, qua đó nhiều hơn đội xếp thứ hai Arsenal năm điểm.\r\n\r\nCuối mùa bóng năm đó, khoảng cách tăng lên 12 điểm giúp chúng ta giành chức vô địch, lần đầu tiên sau một nửa thế kỷ. Nhưng mọi thứ có thể sẽ khác biệt thế nào nếu không có pha cứu thua trước cú sút của Quashie ngày đó?\r\n\r\nNếu the Blues không thắng Portsmouth, khoảng cách giữa chúng ta và Arsenal có thể bị thu hẹp còn hai hoặc ba điểm trước khi có trận làm khách khó khăn ở Anfield vào ngày đầu năm mới.\r\n\r\n \r\nCÁC CẦU THỦ MỪNG CHIẾN THẮNG NHỌC NHẰN 2-0 TRƯỚC PORTSMOUTH\r\n \r\n\r\nDù vậy, chúng ta đã thắng trận cũng như trận kế tiếp gặp Middlesbrough để hơn Arsenal bảy điểm, giúp các fan đã chờ đợi thời gian dài bắt đầu tin tưởng cơn khát danh hiệu đã sắp đến hồi kết.\r\n\r\nĐộng lực chiến đầu của chúng ta được thiết lập sau trận thua duy nhất mùa đó trước Manchester City hồi tháng 10, kể từ đó hàng phòng ngự của Chelsea như khối bất bại nhờ Cech dường như có thể cản phá mọi cú sút xuyên qua hàng phòng ngự vốn chắc chắn của chúng ta.\r\n\r\nCuối mùa, chúng ta thiết lập kỷ lục của giải, trải qua 10 trận với 1024 phút mà không thủng lưới. Trong đó Cech chỉ để thua 13 bàn và có 24 trận giữ sạch lưới trong số 35 trận thi đấu và giành huy chương vô địch đầu tiên của anh. \r\n\r\nCảm giác mà anh mang lại cho mọi người ở Chelsea bằng khả năng bắt bóng tài tình giúp chúng ta có thêm nhiều chức vô địch nữa suốt một thập kỷ sau đó. \r\n\r\n', 2, '2019-01-18 08:35:08', 0),
(7, 'Lý thuyết và ví dụ', '<p>L&yacute; thuyết v&agrave; v&iacute; dụ</p>', 'user/img baitap/img baiviet/22c1086685d6813341f244c0e77ec18a(9)(4).jpg', '<p>L&yacute; thuyết v&agrave; v&iacute; dụ</p>', 2, '2019-01-18 08:38:03', 0);
INSERT INTO `noidungbaiviet` (`mabaiviet`, `tieude`, `mota`, `img`, `noidung`, `matheloai`, `thoigian`, `tinhtrang`) VALUES
(8, 'Thì Quá khứ hoàn thành', 'Thì Quá khứ hoàn thành là một trong những thì quan trọng trong cấu trúc ngữ pháp tiếng anh. Bởi chúng được sử dụng khá nhiều trong công việc và cuộc sống trong môi trường ngoại ngữ. Hiểu được điều đó, anh ngữ EFC đã tổng hợp các kiến thức cần thiết để giúp các bạn có thể hiểu rõ và nắm vững các kiến thức của cấu trúc này. Hy vọng bài viết này sẽ giúp ích được cho các bạn trong môi trường làm việc và học tập.', 'user/img baitap/img baiviet/22c1086685d6813341f244c0e77ec18a(9)(9)(6).jpg', '<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\"><strong style=\"box-sizing: border-box;\">Th&igrave; Qu&aacute; khứ ho&agrave;n th&agrave;nh</strong>&nbsp;l&agrave; một trong những th&igrave; quan trọng trong cấu tr&uacute;c ngữ ph&aacute;p tiếng anh. Bởi ch&uacute;ng được sử dụng kh&aacute; nhiều trong c&ocirc;ng việc v&agrave; cuộc sống trong m&ocirc;i trường ngoại ngữ. Hiểu được điều đ&oacute;, anh ngữ EFC đ&atilde; tổng hợp c&aacute;c kiến thức cần thiết để gi&uacute;p c&aacute;c bạn c&oacute; thể hiểu r&otilde; v&agrave; nắm vững c&aacute;c kiến thức của cấu tr&uacute;c n&agrave;y. Hy vọng b&agrave;i viết n&agrave;y sẽ gi&uacute;p &iacute;ch được cho c&aacute;c bạn trong m&ocirc;i trường l&agrave;m việc v&agrave; học tập.<br style=\"box-sizing: border-box;\" /><iframe style=\"box-sizing: border-box; height: 391.5px;\" src=\"https://www.youtube.com/embed/q168vEEXOUA\" width=\"100%\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">1. Định nghĩa th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh</h2>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\"><strong style=\"box-sizing: border-box;\">Th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh</strong>&nbsp;d&ugrave;ng để diễn tả một h&agrave;nh động xảy ra trước một h&agrave;nh động kh&aacute;c v&agrave; cả hai h&agrave;nh động n&agrave;y đều đ&atilde; xảy ra trong qu&aacute; khứ. H&agrave;nh động n&agrave;o xảy ra trước th&igrave; d&ugrave;ng th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh. H&agrave;nh động xảy ra sau th&igrave; d&ugrave;ng th&igrave; qu&aacute; khứ đơn.</p>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">2. C&aacute;ch d&ugrave;ng th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh</h2>\r\n<table style=\"box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; width: 696px; margin-bottom: 21px; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px;\" border=\"1\">\r\n<tbody style=\"box-sizing: border-box;\">\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed; text-align: center;\"><strong style=\"box-sizing: border-box;\">C&aacute;ch d&ugrave;ng</strong></td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed; text-align: center;\"><strong style=\"box-sizing: border-box;\">V&iacute; dụ</strong></td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">Khi hai h&agrave;nh động c&ugrave;ng xảy ra trong qu&aacute; khứ, ta d&ugrave;ng th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh cho h&agrave;nh động xảy ra trước v&agrave; qu&aacute; khứ đơn cho h&agrave;nh động xảy ra sau.</span></td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">I met them after they had divorced. (T&ocirc;i gặp họ sau khi họ ly dị.)</span>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">Lan said she had been chosen as a beauty queen two years before. (Lan n&oacute;i rằng trước đ&oacute; hai năm, c&ocirc; ta từng được chọn l&agrave;m hoa hậu.)<br style=\"box-sizing: border-box;\" /></span></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">An idea occurred to him that she herself had helped him very much in the everyday life. (Hắn chợt nghĩ ra rằng ch&iacute;nh c&ocirc; ta đ&atilde; gi&uacute;p hắn rất nhiều trong cuộc sống hằng ng&agrave;y.)</span></p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">Th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh diễn tả h&agrave;nh động đ&atilde; xảy ra v&agrave; đ&atilde; ho&agrave;n tất trước một thời điểm trong qu&aacute; khứ, hoặc trước một h&agrave;nh động kh&aacute;c cũng đ&atilde; kết th&uacute;c trong qu&aacute; khứ.</span></td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">We had had lunch when she arrived. (Khi c&ocirc; ấy đến ch&uacute;ng t&ocirc;i đ&atilde; ăn trưa xong.)</span></td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">Khi&nbsp;<em style=\"box-sizing: border-box;\">th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh</em>&nbsp;thường được d&ugrave;ng kết hợp với th&igrave; qu&aacute; khứ đơn, ta thường d&ugrave;ng k&egrave;m với c&aacute;c giới từ v&agrave; li&ecirc;n từ như: by (c&oacute; nghĩa như before), before, after, when, till, until, as soon as, no sooner&hellip;than</span></td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">No sooner had he returned from a long journey than he was ordered to pack his bags.(Anh ta mới đi xa về th&igrave; lại được lệnh cuốn g&oacute;i ra đi.)</span>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">When I arrived John had gone away.(Khi t&ocirc;i đến th&igrave; John đ&atilde; đi rồi.)</span></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">Yesterday, I went out after I had finished my homework.</span></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">(H&ocirc;m qua, t&ocirc;i đi chơi sau khi t&ocirc;i đ&atilde; l&agrave;m xong b&agrave;i tập.)</span></p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">H&agrave;nh động xảy ra như l&agrave; điều kiện ti&ecirc;n quyết cho h&agrave;nh động kh&aacute;c</span></td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">I had prepared for the exams and was ready to do well.</span>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">Tom had lost twenty pounds and could begin anew.</span></p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">Trong c&acirc;u điều kiện loại 3 để diễn tả điều kiện kh&ocirc;ng c&oacute; thực</span></td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">If I had known that, I would have acted differently.</span>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">She would have come to the party if she had been invited.</span></p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">H&agrave;nh động xảy ra trong 1 khoảng thời gian trong qu&aacute; khứ, trước 1 mốc thời gian kh&aacute;c</span></td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">I had lived abroad for twenty years when I received the transfer.</span>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\"><span class=\"font-arial\" style=\"box-sizing: border-box;\">Jane had studied in England before she did her master&rsquo;s at Harvard.</span></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">3. C&ocirc;ng thức th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh</h2>\r\n<table style=\"box-sizing: border-box; border-collapse: collapse; border-spacing: 0px; width: 696px; margin-bottom: 21px; color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px; height: 386px;\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">\r\n<tbody style=\"box-sizing: border-box;\">\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">C&acirc;u khẳng định</strong></p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">C&acirc;u phủ định</strong></p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\" align=\"center\"><strong style=\"box-sizing: border-box;\">C&acirc;u nghi vấn</strong></p>\r\n</td>\r\n</tr>\r\n<tr style=\"box-sizing: border-box;\">\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; text-align: center;\"><strong style=\"box-sizing: border-box;\">S + had + VpII</strong></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">V&iacute; dụ:</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">&ndash; He&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">had gone</u></strong>&nbsp;out when I came into the house. (<em style=\"box-sizing: border-box;\">Anh ấy đ&atilde; đi ra ngo&agrave;i khi t&ocirc;i v&agrave;o nh&agrave;.</em>)</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">&ndash; They&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">had finished</u></strong>&nbsp;their work right before the deadline last week .(<em style=\"box-sizing: border-box;\">Họ đ&atilde; ho&agrave;n th&agrave;nh c&ocirc;ng việc của họ ngay trước hạn ch&oacute;t v&agrave;o tuần trước.</em>)</p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; text-align: center;\"><strong style=\"box-sizing: border-box;\">S + hadn&rsquo;t + VpII</strong></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">CH&Uacute; &Yacute;:</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">&ndash; hadn&rsquo;t = had not</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">V&iacute; dụ:</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">&ndash; She&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">hadn&rsquo;t come</u></strong>home when I got there. (<em style=\"box-sizing: border-box;\">C&ocirc; ấy vẫn chưa về nh&agrave; khi t&ocirc;i về.</em>)</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">&ndash; They&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">hadn&rsquo;t finished</u></strong>their lunch when I saw them. (<em style=\"box-sizing: border-box;\">Họ vẫn chưa ăn xong bữa trưa khi tr&ocirc;ng thấy họ</em>).</p>\r\n</td>\r\n<td style=\"box-sizing: border-box; padding: 2px 8px; border: 1px solid #ededed;\">\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; text-align: center;\"><strong style=\"box-sizing: border-box;\">Had + S + VpII ?</strong></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Trả lời: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yes, S + had.</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">No, S + hadn&rsquo;t.</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">V&iacute; dụ:</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">&ndash;&nbsp;<strong style=\"box-sizing: border-box;\">Had</strong>&nbsp;the film&nbsp;<strong style=\"box-sizing: border-box;\">ended</strong>when you arrived at the cinema? (<em style=\"box-sizing: border-box;\">Bộ phim đ&atilde; kết th&uacute;c khi bạn tới rạp chiếu phim phải kh&ocirc;ng?)</em></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px;\">Yes, it had./ No, it hadn&rsquo;t</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2 style=\"box-sizing: border-box; font-family: Roboto, sans-serif; color: #111111; font-weight: 400; margin: 30px 0px 20px; font-size: 27px; line-height: 38px;\">4. Dấu hiệu nhận biết th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh</h2>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">Trong c&acirc;u c&oacute; c&aacute;c từ:</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">&ndash; when: Khi</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">V&iacute; dụ:&nbsp;<u style=\"box-sizing: border-box;\">When</u>&nbsp;they arrived at the airport, her flight&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">had taken</u></strong>&nbsp;off. (Khi họ tới s&acirc;n bay, chuyến bay của c&ocirc; ấy đ&atilde; cất c&aacute;nh.)</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">&ndash; before: trước khi (Trước &ldquo;before&rdquo; sử dụng th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh v&agrave; sau &ldquo;before&rdquo; sử dụng th&igrave; qu&aacute; khứ đơn.)</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">V&iacute; dụ: She&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">had done</u></strong>&nbsp;her homework&nbsp;<u style=\"box-sizing: border-box;\">before</u>&nbsp;her mother&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">asked</u></strong>&nbsp;her to do so. (<em style=\"box-sizing: border-box;\">C&ocirc; ấy đ&atilde; l&agrave;m b&agrave;i tập về nh&agrave; trước khi mẹ c&ocirc; ấy y&ecirc;u cầu c&ocirc; ấy l&agrave;m như vậy.)</em></p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">&ndash; After: sau khi (Trước &ldquo;after&rdquo; sử dụng th&igrave; qu&aacute; khứ đơn v&agrave; sau &ldquo;after&rdquo; sử dụng th&igrave; qu&aacute; khứ ho&agrave;n th&agrave;nh.)</p>\r\n<p style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; line-height: 26px; margin-top: 0px; margin-bottom: 26px; color: #222222;\">V&iacute; dụ: They&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">went</u></strong>&nbsp;home after they&nbsp;<strong style=\"box-sizing: border-box;\"><u style=\"box-sizing: border-box;\">had eaten</u></strong>&nbsp;a big roasted chicken. (<em style=\"box-sizing: border-box;\">Họ về nh&agrave; sau khi đ&atilde; ăn một con g&agrave; quay lớn.)</em></p>', 3, '2019-01-20 13:32:48', 0),
(9, 'dsadsadsad', 'test bientapvien', 'user/img baitap/img baiviet/49748a1c4089639e8404b722ce2ddde1.jpg', '<p>dsadadsadasdas</p>', 1, '2019-02-07 20:23:37', 0),
(10, 'David Beckham LA Galaxy to unveil statue of former England captain', 'A statue of former England captain David Beckham will be unveiled outside LA Galaxy\'s stadium next month.', 'user/img baitap/img baiviet/22c1086685d6813341f244c0e77ec18a(9)(9)(7).jpg', '<h1 class=\"story-headline gel-trafalgar-bold \" style=\"box-sizing: inherit; margin: 0.5rem 0px 1rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 2.25rem; font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-size: 2rem; vertical-align: baseline; outline-style: none; color: #252525;\">David Beckham: LA Galaxy to unveil statue of former England captain</h1>\r\n<div class=\"story__byline\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-size: 10px; vertical-align: baseline; outline-style: none; color: #252525;\">\r\n<div class=\"gel-flag byline\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: table; width: 645px; outline-style: none;\">\r\n<div class=\"gel-flag__body\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: middle; display: table-cell; width: 645px; outline-style: none;\">\r\n<p class=\"gel-long-primer\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.125rem; font-family: inherit; font-size: 0.875rem; vertical-align: baseline; outline-style: none;\">&nbsp;</p>\r\n<p class=\"gel-long-primer-bold\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: 1.125rem; font-family: inherit; font-size: 0.875rem; vertical-align: baseline; outline-style: none;\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"story__info story-info clearfix\" style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0.5rem 0px; border-width: 0px 0px 1px; border-image: initial; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-size: 10px; vertical-align: baseline; display: table; width: 645px; table-layout: fixed; outline-style: none; color: #252525; border-color: initial initial #dbdbdb initial; border-style: initial initial solid initial;\">\r\n<div class=\"story-info__list\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: middle; display: table-cell; width: 550px; outline-style: none;\">&nbsp;</div>\r\n</div>\r\n<div id=\"story-body\" class=\"story-body sp-story-body gel-body-copy\" style=\"box-sizing: inherit; margin: 0px 80.6563px 1.5rem 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.375rem; font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-size: 1rem; vertical-align: baseline; color: #252525; overflow-wrap: break-word; outline-style: none;\">\r\n<figure class=\"sp-media-asset sp-media-asset--lead\" style=\"box-sizing: inherit; margin: 0px -80.6563px 1.5rem 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none; clear: right;\">\r\n<div class=\"sp-media-asset__body media\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; position: relative; outline-style: none;\">\r\n<div class=\"sp-media-asset__image gel-responsive-image\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 361.375px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; position: relative; height: 0px; overflow: hidden; background-color: #f0f0f0; background-repeat: no-repeat; background-position: center center; background-size: 30%; outline-style: none;\"><img class=\"\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none; position: absolute; width: 645.328px; height: 361.375px;\" src=\"https://ichef.bbci.co.uk/onesport/cps/480/cpsprodpb/905D/production/_105575963_david_beckham_getty3.jpg\" sizes=\"(min-width: 900px) 50vw, (min-width: 600px) 70vw, 100vw\" srcset=\"https://ichef.bbci.co.uk/onesport/cps/240/cpsprodpb/905D/production/_105575963_david_beckham_getty3.jpg 240w, https://ichef.bbci.co.uk/onesport/cps/320/cpsprodpb/905D/production/_105575963_david_beckham_getty3.jpg 320w, https://ichef.bbci.co.uk/onesport/cps/480/cpsprodpb/905D/production/_105575963_david_beckham_getty3.jpg 480w, https://ichef.bbci.co.uk/onesport/cps/624/cpsprodpb/905D/production/_105575963_david_beckham_getty3.jpg 624w, https://ichef.bbci.co.uk/onesport/cps/800/cpsprodpb/905D/production/_105575963_david_beckham_getty3.jpg 800w\" alt=\"Former LA Galaxy midfielder David Beckham waves to fans after winning the 2012 MLS Cup in his final game for the club\" /></div>\r\n</div>\r\n<figcaption class=\"sp-media-asset__caption gel-brevier \" style=\"box-sizing: inherit; margin: 0px; padding: 0.75rem 16px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1rem; font-family: inherit; font-size: 0.8125rem; vertical-align: baseline; color: #5a5a5a; background-color: #ededed; outline-style: none;\">David Beckham left LA Galaxy after winning back-to-back titles in 2011 and 2012</figcaption>\r\n</figure>\r\n<p class=\"sp-story-body__introduction\" style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">A statue of former England captain David Beckham will be unveiled outside LA Galaxy\'s stadium next month.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">Beckham, 43, played for the Major League Soccer side for six years after joining in 2007, winning back-to-back MLS Cups in 2011 and 2012.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">He is the co-owner of MLS expansion club Inter Miami, which is set to join the league in 2020.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">The former Manchester United and Real Madrid midfielder is the first player to receive a statue in MLS history.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">It will be unveiled at Dignity Health Sports Park before LA Galaxy\'s first game of the season against Chicago Fire on 2 March.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">Beckham, who made 115 appearances for England, joined LA Galaxy after four years at Real Madrid, having left Old Trafford in 2003.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">He was&nbsp;<a style=\"box-sizing: inherit; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-image: initial; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; text-decoration-line: none; outline-style: none; color: #121212; border-color: initial initial #dbdbdb initial; border-style: initial initial solid initial;\" href=\"http://news.bbc.co.uk/sport1/hi/football/8158547.stm\">criticised by some Galaxy fans</a>&nbsp;after agreeing loan moves to AC Milan in 2009 and 2010, which meant missing part of the MLS season, but left the club to acclaim in 2012 after retaining the title.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1.5rem; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">He subsequently signed a short-term deal with Paris St-Germain before&nbsp;<a style=\"box-sizing: inherit; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-image: initial; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; text-decoration-line: none; outline-style: none; color: #121212; border-color: initial initial #dbdbdb initial; border-style: initial initial solid initial;\" href=\"https://www.bbc.co.uk/sport/football/22558393\">retiring at the end of the 2012-13 season</a>.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; outline-style: none;\">Beckham became a part-owner of non-league club&nbsp;<a style=\"box-sizing: inherit; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-image: initial; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; text-decoration-line: none; outline-style: none; color: #121212; border-color: initial initial #dbdbdb initial; border-style: initial initial solid initial;\" href=\"https://www.bbc.co.uk/sport/football/47077888\">Salford City</a>&nbsp;last month alongside former Manchester United team-mates Gary and Phil Neville, Ryan Giggs, Paul Scholes and Nicky Butt.</p>\r\n</div>', 6, '2019-02-09 14:08:02', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldanhmuc`
--

CREATE TABLE `tbldanhmuc` (
  `madanhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbldanhmuc`
--

INSERT INTO `tbldanhmuc` (`madanhmuc`, `tendanhmuc`) VALUES
(1, 'Trang chủ'),
(2, 'Ngữ pháp'),
(3, 'Từ vựng'),
(4, 'Các thì'),
(5, 'Bài viết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnguoidung`
--

CREATE TABLE `tblnguoidung` (
  `tentk` varchar(100) NOT NULL,
  `matkhau` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `capdo` int(11) DEFAULT NULL,
  `quatrinh` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblnguoidung`
--

INSERT INTO `tblnguoidung` (`tentk`, `matkhau`, `email`, `capdo`, `quatrinh`) VALUES
('admin', 'minh1102', 'dangcongminh10991@gmail.com', 1, NULL),
('bientapvien', 'minh1102', 'dangcongminh1099@gmail.com', 2, NULL),
('dangminh', 'minh1102', 'dangcongminh1099@gmail.com', 3, '||19||20||21||29||'),
('dangminh2', 'minh1103', 'dangcongminh@gmail.com', 3, '||19||'),
('dangminh3', 'minh1103', 'dangminh@gmail.com.vn', 3, '||'),
('dangminh6', 'minh1102', 'dsadsadsa@gmail.com', 3, NULL),
('phankhai', 'nadottp2', 'phankhai@gmail.com', 3, '||30||');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblphuongan`
--

CREATE TABLE `tblphuongan` (
  `maphuongan` int(11) NOT NULL,
  `noidung` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `audio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `dapan` tinyint(4) DEFAULT NULL,
  `macau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblphuongan`
--

INSERT INTO `tblphuongan` (`maphuongan`, `noidung`, `img`, `audio`, `dapan`, `macau`) VALUES
(30, 'dap2dsadasdasda', 'user/img baitap/imgphuongan/22c1086685d6813341f244c0e77ec18a(9)(9)(9)(0).jpg', 'user/audio/goalkeepergloves7(9)(6).mp3', 1, 13),
(43, 'dap 1adasdsa', 'user/img baitap/imgphuongan/database3.png', 'user/audio/perry(7).mp3', 0, 13),
(47, 'dap3dsa', 'user/img baitap/imgphuongan/World_Champion_Germany(0).jpg', 'user/audio/goalkeepergloves7(9)(7).mp3', 1, 13),
(55, 'Phương án 1', NULL, NULL, 0, 63),
(56, 'Phương án 1', NULL, NULL, 1, 63),
(57, 'Phương án 1', NULL, NULL, 1, 63),
(58, 'Phương án 1', NULL, NULL, 1, 63),
(59, 'Phương án 1', NULL, NULL, 1, 63),
(60, 'Phương án 1', NULL, NULL, 1, 63),
(61, 'Phương án 1', NULL, NULL, 1, 63),
(63, 'adsad', '', '', 1, 16),
(64, 'Đáp án a', '', '', 0, 64),
(65, 'Đáp án b', '', '', 1, 64),
(66, 'Đáp án c', '', '', 1, 64),
(67, 'dsadsa', '', '', 0, 16),
(68, 'dsadas', '', '', 1, 16),
(69, 'Đáp án 1', '', '', 0, 17),
(70, 'dsada', '', '', 0, 32),
(71, 'Doctor', 'user/img baitap/imgphuongan/Doctor_Johnny_Sins(0).png', 'user/audio/doctor.mp3', 0, 1),
(72, 'Astronaut', 'user/img baitap/imgphuongan/TRyl1jlM_400x400(0).jpg', 'user/audio/astronaut.mp3', 1, 1),
(73, 'Teacher', 'user/img baitap/imgphuongan/464224240becf29f282085d7bdcb3a1d(0).jpg', 'user/audio/teacher.mp3', 1, 1),
(74, 'dap 1', '', '', 0, 65),
(75, 'Police', '', '', 1, 65),
(76, 'minh123', '', '', 1, 65),
(77, 'Đáp án1', NULL, NULL, 1, 18),
(78, 'Đáp án2', NULL, NULL, 1, 18),
(79, 'Đáp án3', NULL, NULL, 0, 18),
(86, 'Đáp án A', NULL, NULL, 1, 19),
(87, 'Đáp án b', NULL, NULL, 1, 19),
(88, 'Đáp án c', NULL, NULL, 0, 19),
(89, 'PA1', NULL, NULL, 1, 20),
(90, 'PA2', NULL, NULL, 0, 20),
(91, 'PA3', NULL, NULL, 1, 20),
(92, 'Đáp án 2', '', '', 0, 66),
(93, 'Đáp án 2', '', '', 1, 66),
(94, 'Đáp án 2', '', '', 1, 66),
(95, 'dsad', '', '', 1, 67),
(96, 'dsadas', '', '', 1, 67),
(97, 'dsada', '', '', 0, 67),
(98, 'dsada', '', '', 1, 68),
(99, 'dsadas', '', '', 1, 68),
(100, 'dsadas', '', '', 0, 68),
(103, 'Phương án 1', '', '', 1, 69),
(104, 'Phương án 2', '', '', 0, 69),
(105, 'Phương án 3', '', '', 1, 69),
(106, '', '', '', 1, 24),
(107, '', '', '', 1, 24),
(108, 'đasadasda', 'user/img baitap/imgphuongan/545057114(3).jpg', 'user/audio/goalkeepergloves7(9)(9)(1).mp3', 0, 43),
(109, 'ádad', '', '', 1, 70),
(110, 'Phương án 1', '', '', 1, 70),
(111, 'Dap an 2', '', '', 0, 70),
(112, 'Phương án 1', '', '', 1, 71),
(113, 'Phương án 1', '', '', 1, 71),
(114, 'dap an1', '', '', 0, 71),
(115, 'Phương án 1', '', '', 1, 32),
(116, 'Phuông án 2', 'user/img baitap/imgphuongan/22c1086685d6813341f244c0e77ec18a(9)(9)(9)(1).jpg', 'user/audio/goalkeepergloves7(9)(3).mp3', 0, 72),
(117, 'dap an1', 'user/img baitap/imgphuongan/49748a1c4089639e8404b722ce2ddde1(7).jpg', 'user/audio/perry(8).mp3', 1, 72),
(118, 'dap an1', 'user/img baitap/imgphuongan/3bbc65893ff9d0ea27a58749f88cd9f8--soccer-boys-soccer-stuff.jpg', 'user/audio/goalkeepergloves7(9)(5).mp3', 1, 72),
(119, 'Đáp án 2', '', '', 1, 17),
(120, 'Đáp án 3', '', '', 1, 17),
(121, '', '', '', 0, 73),
(122, '', '', '', 1, 73),
(123, '', '', '', 1, 73),
(124, 'Phương án 1', '', '', 1, 74),
(125, 'Phương án 12', '', '', 1, 74),
(126, 'Police', '', '', 0, 74),
(127, 'Phương án 1', '', '', 1, 75),
(128, 'Phương án 2', '', '', 0, 75),
(129, 'Phương án 3', '', '', 1, 75),
(130, 'Phương án 3', 'user/img baitap/imgphuongan/22c1086685d6813341f244c0e77ec18a(9)(9)(9)(2).jpg', 'user/audio/perry(9).mp3', 0, 76),
(131, 'Phương án 2', 'user/img baitap/imgphuongan/49748a1c4089639e8404b722ce2ddde1(6).jpg', 'user/audio/goalkeepergloves7(9)(4).mp3', 1, 76),
(132, 'Phương án 1', 'user/img baitap/imgphuongan/22c1086685d6813341f244c0e77ec18a(9)(9)(9)(3).jpg', 'user/audio/perry(9)(0).mp3', 1, 76),
(133, '', '', '', 1, 46),
(135, 'Phương án 1', NULL, NULL, 0, 34),
(136, 'Chon phuong an dung1', NULL, NULL, 1, 34),
(142, 'Chon phuong an dung1', NULL, NULL, 1, 34),
(147, 'Phương án 1', 'user/img baitap/imgphuongan/22c1086685d6813341f244c0e77ec18a(9)(9)(9)(5).jpg', 'user/audio/perry(9)(2).mp3', 1, 77),
(148, 'Phương án 1', 'user/img baitap/imgphuongan/22c1086685d6813341f244c0e77ec18a(9)(9)(9)(6).jpg', 'user/audio/perry(9)(3).mp3', 1, 77),
(149, 'Phương án 1', 'user/img baitap/imgphuongan/49748a1c4089639e8404b722ce2ddde1(9).jpg', 'user/audio/perry(9)(4).mp3', 0, 77),
(150, 'Phương án 1', 'user/img baitap/imgphuongan/545057114(0).jpg', 'user/audio/perry(9)(5).mp3', 1, 77),
(151, 'Phương án 1', 'user/img baitap/imgphuongan/22c1086685d6813341f244c0e77ec18a(9)(9)(9)(7).jpg', 'user/audio/perry(9)(6).mp3', 1, 77),
(152, 'Phương án 1', '', '', 1, 78),
(153, 'Phương án 2', '', '', 1, 78),
(154, 'Phương án 3', '', '', 0, 78),
(155, 'Phương án 1', '', '', 0, 79),
(156, 'Phương án 1', '', '', 1, 79),
(157, 'Phương án 1', '', '', 1, 79),
(158, 'Phương án 1', '', '', 0, 80),
(159, 'Phương án 1', '', '', 1, 80),
(160, 'dap 1ds', '', '', 1, 80),
(161, 'Chon phuong an dung1', '', '', 0, 81),
(162, 'Chon phuong an dung1', '', '', 1, 81),
(163, 'Chon phuong an dung1', '', '', 1, 81),
(164, 'Chon phuong an dung1', '', '', 0, 82),
(165, 'dsadad', '', '', 1, 82),
(166, 'Police', '', '', 1, 82),
(167, 'Phương án 1', '', '', 1, 83),
(168, 'Phương án 1', '', '', 0, 83),
(169, 'Phương án 1', '', '', 1, 83),
(170, 'Phương án 1', '', '', 0, 84),
(171, 'Phương án 1', '', '', 1, 84),
(172, 'Phương án 1', '', '', 1, 84),
(173, 'Phương án 1', '', '', 1, 85),
(174, 'Phương án 1', '', '', 1, 85),
(175, 'Police', '', '', 1, 85),
(176, 'Police', '', '', 1, 85),
(177, 'Police', '', '', 1, 85),
(178, 'Police', '', '', 0, 85),
(179, 'Phương án 1', '', '', 1, 86),
(180, 'Phương án 1', '', '', 0, 86),
(181, 'Phương án 1', '', '', 1, 86),
(182, 'dap 1asd', '', '', 1, 87),
(183, 'dap 1dsadsa', '', '', 0, 87),
(184, 'dap 1dsadas', '', '', 1, 87),
(185, 'dap 1dsadsa', '', '', 1, 87),
(186, 'Phương án 1', '', '', 1, 88),
(187, 'Phương án 1', '', '', 0, 88),
(188, 'Phương án 1', '', '', 1, 88),
(189, 'Phương án 1', 'user/img baitap/imgphuongan/545057114(1).jpg', 'user/audio/goalkeepergloves7(9)(8).mp3', 0, 89),
(190, 'Phương án 1', 'user/img baitap/imgphuongan/22c1086685d6813341f244c0e77ec18a(9)(9)(9)(8).jpg', 'user/audio/goalkeepergloves7(9)(9).mp3', 1, 89),
(191, 'Phương án 1', 'user/img baitap/imgphuongan/545057114(2).jpg', 'user/audio/goalkeepergloves7(9)(9)(0).mp3', 1, 89),
(192, '', '', '', 1, 73),
(193, '', '', '', 1, 73),
(194, 'Phương án 1', '', '', 0, 90),
(195, 'Phương án 1', '', '', 1, 90),
(196, 'Phương án 1', '', '', 1, 90),
(197, 'Phương án 1', '', '', 1, 90),
(198, 'Phương án 1', '', '', 1, 90),
(199, 'Phương án 1', '', '', 0, 91),
(200, 'Phương án 1', '', '', 1, 91),
(201, 'Phương án 1', '', '', 1, 91),
(202, 'Phương án 1', '', '', 0, 92),
(203, 'Phương án 1', '', '', 1, 92),
(204, 'Phương án 1', '', '', 1, 92);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltheloai`
--

CREATE TABLE `tbltheloai` (
  `matheloai` int(11) NOT NULL,
  `tentheloai` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `madanhmuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbltheloai`
--

INSERT INTO `tbltheloai` (`matheloai`, `tentheloai`, `madanhmuc`) VALUES
(1, 'Từ vựng thông dụng', 3),
(2, 'Từ vựng IT', 3),
(3, 'Quá khứ', 4),
(4, 'Hiện tại', 4),
(5, 'Tương lai', 4),
(6, 'Newspaper', 5),
(7, 'Modals', 2),
(8, 'If and wish', 2),
(9, 'Passive', 2),
(10, 'Reported speech', 2),
(11, 'ing and to', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet_baitap`
--
ALTER TABLE `baiviet_baitap`
  ADD PRIMARY KEY (`mabaiviet_baitap`),
  ADD KEY `matheloai` (`matheloai`);

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`macau`),
  ADD KEY `mabaiviet_baitap` (`mabaiviet_baitap`);

--
-- Chỉ mục cho bảng `noidungbaiviet`
--
ALTER TABLE `noidungbaiviet`
  ADD PRIMARY KEY (`mabaiviet`),
  ADD KEY `matheloai` (`matheloai`);

--
-- Chỉ mục cho bảng `tbldanhmuc`
--
ALTER TABLE `tbldanhmuc`
  ADD PRIMARY KEY (`madanhmuc`);

--
-- Chỉ mục cho bảng `tblnguoidung`
--
ALTER TABLE `tblnguoidung`
  ADD PRIMARY KEY (`tentk`);

--
-- Chỉ mục cho bảng `tblphuongan`
--
ALTER TABLE `tblphuongan`
  ADD PRIMARY KEY (`maphuongan`),
  ADD KEY `macau` (`macau`);

--
-- Chỉ mục cho bảng `tbltheloai`
--
ALTER TABLE `tbltheloai`
  ADD PRIMARY KEY (`matheloai`),
  ADD KEY `madanhmuc` (`madanhmuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet_baitap`
--
ALTER TABLE `baiviet_baitap`
  MODIFY `mabaiviet_baitap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `macau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `noidungbaiviet`
--
ALTER TABLE `noidungbaiviet`
  MODIFY `mabaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbldanhmuc`
--
ALTER TABLE `tbldanhmuc`
  MODIFY `madanhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tblphuongan`
--
ALTER TABLE `tblphuongan`
  MODIFY `maphuongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT cho bảng `tbltheloai`
--
ALTER TABLE `tbltheloai`
  MODIFY `matheloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet_baitap`
--
ALTER TABLE `baiviet_baitap`
  ADD CONSTRAINT `baiviet_baitap_ibfk_1` FOREIGN KEY (`matheloai`) REFERENCES `tbltheloai` (`matheloai`);

--
-- Các ràng buộc cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`mabaiviet_baitap`) REFERENCES `baiviet_baitap` (`mabaiviet_baitap`);

--
-- Các ràng buộc cho bảng `noidungbaiviet`
--
ALTER TABLE `noidungbaiviet`
  ADD CONSTRAINT `noidungbaiviet_ibfk_1` FOREIGN KEY (`matheloai`) REFERENCES `tbltheloai` (`matheloai`);

--
-- Các ràng buộc cho bảng `tblphuongan`
--
ALTER TABLE `tblphuongan`
  ADD CONSTRAINT `tblphuongan_ibfk_1` FOREIGN KEY (`macau`) REFERENCES `cauhoi` (`macau`);

--
-- Các ràng buộc cho bảng `tbltheloai`
--
ALTER TABLE `tbltheloai`
  ADD CONSTRAINT `tbltheloai_ibfk_1` FOREIGN KEY (`madanhmuc`) REFERENCES `tbldanhmuc` (`madanhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
