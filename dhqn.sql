-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 07:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhqn`
--

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id_chucvu` int(12) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_group` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id_chucvu`, `name`, `id_group`) VALUES
(1, 'Hiệu trưởng', 1),
(2, 'Trưởng khoa', 3),
(3, 'Giáo viên chủ nhiệm', 4),
(4, 'Cán bộ quản lý tài sản', 2);

-- --------------------------------------------------------

--
-- Table structure for table `danhgialaitaisan`
--

CREATE TABLE `danhgialaitaisan` (
  `id_danhgialaitaisan` int(12) NOT NULL,
  `dongia` int(12) NOT NULL,
  `soluong` int(12) NOT NULL,
  `thoihansudung` int(12) NOT NULL,
  `nguyengia` int(12) NOT NULL,
  `ngaydanhgia` date NOT NULL,
  `id_sotaisan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgialaitaisan`
--

INSERT INTO `danhgialaitaisan` (`id_danhgialaitaisan`, `dongia`, `soluong`, `thoihansudung`, `nguyengia`, `ngaydanhgia`, `id_sotaisan`) VALUES
(1, 190, 8, 6, 0, '2016-11-13', 12),
(2, 150000, 12, 2, 150, '2016-11-13', 13),
(3, 4350000, 24, 3, 0, '2016-11-20', 38),
(4, 0, 0, 0, 0, '2016-11-22', 37);

-- --------------------------------------------------------

--
-- Table structure for table `danhgiasao`
--

CREATE TABLE `danhgiasao` (
  `id_star` int(12) NOT NULL,
  `id_sotaisan` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `star` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgiasao`
--

INSERT INTO `danhgiasao` (`id_star`, `id_sotaisan`, `id_user`, `star`) VALUES
(7, 36, 1, 2),
(8, 35, 1, 4),
(9, 33, 1, 4),
(10, 32, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dieuchuyen`
--

CREATE TABLE `dieuchuyen` (
  `id_dieuchuyen` int(12) NOT NULL,
  `ngaygiao` date NOT NULL,
  `khoagiao` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `lopgiao` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khoanhan` int(12) NOT NULL,
  `lopnhan` int(12) DEFAULT NULL,
  `id_canbogiao` int(12) NOT NULL,
  `id_canbonhan` int(12) NOT NULL,
  `id_sotaisan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dieuchuyen`
--

INSERT INTO `dieuchuyen` (`id_dieuchuyen`, `ngaygiao`, `khoagiao`, `lopgiao`, `khoanhan`, `lopnhan`, `id_canbogiao`, `id_canbonhan`, `id_sotaisan`) VALUES
(1, '2016-11-15', '1', '', 2, 2, 1, 2, 15),
(4, '2016-11-15', '0', '0', 1, 0, 1, 5, 14),
(5, '2016-11-24', '', NULL, 4, NULL, 1, 5, 38),
(6, '2016-11-21', '', NULL, 4, NULL, 1, 6, 37),
(7, '2016-11-25', '4', '9', 1, 0, 1, 5, 37);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `name`, `short_name`) VALUES
(1, 'Khoa Công Nghệ Thông Tin', 'CNTT'),
(2, 'Khoa Lý-Hóa-Sinh', 'L-H-S'),
(3, 'Khoa Giáo dục Thể chất và Quốc phòng', 'GD-TC'),
(4, 'Khoa Kinh tế', 'KT'),
(5, 'Khoa Lý luận Chính trị', 'LL-CT'),
(6, 'Khoa Nghệ thuật', 'NT'),
(7, 'Khoa Ngoại ngữ', 'NN'),
(8, 'Khoa Ngữ văn và Công tác xã hội', 'NV-CTXH'),
(9, 'Khoa Tâm lý - Giáo dục', 'TL-GD'),
(10, 'Khoa Tiểu học - Mầm non', 'TH-MN'),
(11, 'Khoa Toán', 'TA'),
(12, 'Khoa Văn hóa - Du lịch', 'VH-DL');

-- --------------------------------------------------------

--
-- Table structure for table `kiemke`
--

CREATE TABLE `kiemke` (
  `id_kiemke` int(12) NOT NULL,
  `soluongtheososach` int(12) NOT NULL,
  `soluongthucte` int(12) NOT NULL,
  `ngaykiemke` date NOT NULL,
  `thanhly` bit(1) NOT NULL,
  `soluongthanhly` int(12) NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_taisandonvi` int(12) NOT NULL,
  `id_sotaisan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `id_lop` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_khoa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`id_lop`, `name`, `id_khoa`) VALUES
(1, 'DT13CTT03', 1),
(2, 'DT13CTT01', 2),
(3, 'DT13LS01', 2),
(4, 'CT13GDTC01', 3),
(5, 'DT13LS02', 2),
(6, 'CT13GDTC02', 3),
(7, 'DT13KT01', 4),
(8, 'DT13KT02', 4),
(9, 'CT13KT01', 4),
(10, 'CT13LLCT01', 5),
(11, 'CT13LLCT02', 5),
(12, 'CT13NT01', 6),
(13, 'CT13NT02', 6),
(14, 'CT13TA01', 7),
(15, 'CT13TA02', 7),
(16, 'CT13CTXH01', 8),
(17, 'CT13CTXH02', 8),
(18, 'CT13TLGD01', 9),
(19, 'CT13TLGD02', 9),
(20, 'CT13MN01', 10),
(21, 'CT13MN02', 10),
(22, 'CT13TOAN01', 11),
(23, 'CT13TOAN02', 11),
(24, 'CT13VHDL01', 12),
(25, 'CT13VHDL02', 12),
(27, '', 1),
(29, '\\"<body style=\\"display:none\\">\\"', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id_mail` int(12) NOT NULL,
  `nguoigui` int(12) NOT NULL,
  `nguoinhan` int(12) NOT NULL,
  `title_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_den` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_di` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `content_mail` text COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` bit(1) NOT NULL,
  `loai_mail` int(1) NOT NULL,
  `important` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id_mail`, `nguoigui`, `nguoinhan`, `title_mail`, `mail_den`, `mail_di`, `date`, `content_mail`, `trangthai`, `loai_mail`, `important`) VALUES
(1, 1, 3, 'Sinh hoạt kỷ niệm ngày Nhà giáo Việt Nam 20-11', 'hoangdung@hotmail.com', 'tannguyen1995@hotmail.com', '2016-11-23 23:04:17', '<p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 2pt 0cm 0pt; line-height: 20px;"><font face="Arial"><span style="font-size: 10pt;">Trong không khí hân hoan của cả nước hướng về ngày Nhà giáo Việt Nam 20/11, sáng ngày 18/11/2016, Trường Đại học Quảng Nam tổ chức buổi Sinh hoạt kỷ niệm 34 năm ngày Nhà giáo Việt Nam 20/11/1982 - 20/11/2016. Đến dự buổi Sinh hoạt kỷ niệm có bà Trịnh Thị Minh Xuân-Phó Giám đốc Sở Nội vụ tỉnh cùng toàn thể cán bộ, giáo viên, nhân viên nhà trường và đặc biệt là sự có mặt của thầy cô giáo, cán bộ đã nghỉ hưu.</span></font></p><p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 6pt 0cm 0pt; line-height: 20px;"><span style="font-size: 10pt;"><font face="Arial">Sau phần văn nghệ chào mừng của các bạn HS-SV, TS. Huỳnh Trọng Dương - Bí thư Đảng ủy, Hiệu trưởng nhà trường đã có bài diễn văn chào mừng Ngày Nhà giáo Việt Nam và ôn lại truyền thống ngày 20-11. Thầy Hiệu trưởng nhấn mạnh, s</font></span><em><span style="font-size: 10pt; font-family: Arial, sans-serif; font-style: normal;">inh hoạt kỷ niệm Ngày Nhà giáo Việt Nam là dịp để chúng ta cùng tri ân và tôn vinh những người đã và đang tâm huyết, cống hiến hết mình cho sự nghiệp giáo dục nói chung và của trường Đại học Quảng Nam nói riêng. Là dịp để chúng ta cùng nhìn lại những chặng đường đã qua, cùng suy ngẫm về những gì chúng ta cần phải làm để nâng cao hơn nữa chất lượng đội ngũ, chất lượng dạy học, góp phần đưa nhà trường phát triển bền vững và lâu dài. Trong bài diễn văn, TS. Huỳnh Trọng Dương cũng đã chia sẻ một số suy nghĩ về nghề giáo và về vai trò sứ mệnh của trường Đại học Quảng Nam - một ngôi trường đại học địa phương đang dần thay đổi và phát triển trong bối cảnh xã hội đổi mới và hòa nhập. Theo đó, với sứ mạng và trọng trách mà Đảng, nhà nước và nhân dân giao phó, thầy giáo Hiệu trưởng yêu cầu mỗi thầy giáo, cô giáo phải làm tốt vai trò truyền đạt kiến thức, rèn luyện kĩ năng, góp phần định hướng, trang bị cho các em sinh viên những hành trang thiết thực để vào đời. Phải hết lòng tận tâm với công việc, nỗ lực từng ngày để các em có được môi trường học tập tốt nhất – môi trường có đầy đủ điều kiện về vật chất và tinh thần để các em được giáo dục, bồi dưỡng tốt về các mặt kiến thức văn hóa, đạo đức xã hội, khoa học công nghệ, rèn luyện thể chất, kĩ năng sống để phục vụ tốt nhiệm vụ bảo vệ và phát triển đất nước. TS. Huỳnh Trọng Dương tin tưởng rằng, với mỗi cán bộ, giảng viên nếu nhận thức rõ vai trò, trách nhiệm của bản thân, của nhà trường thì nhà trường sẽ hoàn thành xuất sắc các mục tiêu và nhiệm vụ đã đề ra.<o:p></o:p></span></em></p><p class="MsoNormal" align="center" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: center; margin: 6pt 0cm 0pt; line-height: 20px;"><em><span style="font-size: 10pt; font-family: Arial, sans-serif; font-style: normal;">&nbsp;<input alt="TS. Huỳnh Trọng Dương – Bí thư Đảng ủy, Hiệu trưởng nhà trường đọc diễn văn chào mừng Ngày Nhà giáo Việt Nam 20-11" src="http://files.qnamuni.edu.vn/UserFiles/Image/Tintuc/NgayNGVN_2016_TSHTD.jpg" type="image" style="font-size: 8pt; font-family: Verdana, Helvetica, Times;"></span></em></p><p class="MsoNormal" align="center" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: center; margin: 0cm 0cm 0pt; line-height: 20px;"><em><span style="font-size: 8pt; font-family: Verdana, sans-serif; color: rgb(0, 0, 204); font-style: normal; line-height: 16px;">TS. Huỳnh Trọng Dương – Bí thư Đảng ủy, Hiệu trưởng nhà trường đọc diễn văn chào mừng Ngày Nhà giáo Việt Nam 20-11</span></em><em><span style="font-size: 10pt; font-family: Verdana, sans-serif; color: rgb(0, 0, 204); font-style: normal;"><o:p></o:p></span></em></p><p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 6pt 0cm 0pt; line-height: 20px;"><span style="font-size: 10pt;"><font face="Arial">Trong buổi sinh hoạt&nbsp;đầy ý nghĩa này</font><em><span style="font-family: Arial, sans-serif; font-style: normal;">, thầy giáo Hiệu trưởng Huỳnh Trọng Dương đã gửi lời tri ân sâu sắc đối với những đóng góp to lớn của toàn thể thầy cô giáo, viên chức và người lao động trong việc đem lại những thành tựu trong thời gian qua; gửi lời cảm ơn chân thành và lời chúc sức khỏe nồng nhiệt nhất đến các thầy cô giáo, người lao động làm việc tại trường nay đã nghỉ hưu.<o:p></o:p></span></em></span></p><p class="MsoNormal" align="center" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: center; margin: 6pt 0cm 0pt; line-height: 20px;"><em><span style="font-size: 10pt; font-family: Arial, sans-serif; font-style: normal;"><input alt="Các thầy cô giáo, viên chức đã nghỉ hưu và toàn thể thầy cô, viên chức nhà trường đến tham dự buổi Sinh hoạt kỷ niệm" src="http://files.qnamuni.edu.vn/UserFiles/Image/Tintuc/NgayNGVN_2016_DaiBieu.jpg" type="image" style="font-size: 8pt; font-family: Verdana, Helvetica, Times;">&nbsp;</span></em></p><p class="MsoNormal" align="center" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: center; margin: 0cm 0cm 0pt; line-height: 20px;"><em><span style="font-size: 8pt; font-family: Verdana, sans-serif; color: rgb(0, 0, 204); font-style: normal; line-height: 16px;">Các thầy cô giáo, viên chức đã nghỉ hưu và toàn thể thầy cô, viên chức nhà trường đến tham dự buổi Sinh hoạt kỷ niệm<o:p></o:p></span></em></p><p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 6pt 0cm 0pt; line-height: 20px;"><em><span style="font-size: 10pt; font-family: Arial, sans-serif; font-style: normal;">Nhân dịp này, thầy Hiệu trưởng cũng&nbsp;</span></em><span style="font-size: 10pt;"><font face="Arial">kêu gọi toàn thể thầy giáo, cô giáo, CB-CNV của nhà trường hãy đoàn kết một lòng, phát huy truyền thống cao quý của ngành, không ngừng rèn luyện tu dưỡng nâng cao nhân cách Nhà giáo, cùng nhau vượt mọi khó khăn để xây dựng nhà trường ngày một vững mạnh về mọi mặt. Hãy xứng đáng và thực hiện tốt “càng yêu người bao nhiêu, ta càng yêu nghề bấy nhiêu”.<o:p></o:p></font></span></p><p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 6pt 0cm 0pt; line-height: 20px;"><span style="font-size: 10pt; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><font face="Arial">Tại buổi sinh hoạt, nhà trường đã tuyên dương và trao các quyết định khen thưởng của Bộ Giáo dục và Đào tạo, UBND tỉnh Quảng Nam cho các cá nhân đã có những thành tích xuất sắc trong năm học vừa qua. Đặc biệt, trong dịp này, Trường Đại học Quảng Nam vinh dự được Bộ Giáo dục và Đào tạo tặng bằng khen vì đã hoàn thành xuất sắc nhiệm vụ trong năm học 2015-2016. Trong dịp này, BCH Công đoàn trường cũng đã phát động quyên góp ủng hộ đồng bào các tỉnh miền Trung bị bão lụt trong thời gian vừa qua.</font></span></p>', b'1', 0, b'0'),
(2, 1, 4, 'Khai mạc tuần sinh hoạt công dân HS-SV năm học 2016-2017', 'dongphuongbatbai@gmail.com', 'tannguyen1995@hotmail.com', '2016-11-23 23:43:26', '<p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 2pt 0cm 0pt; line-height: 20px;"><span lang="EN-US" arial",sans-serif;="" line-height:="" 150%"="" style="font-size: 10pt;">Thực hiện kế hoạch và nhiệm vụ công tác HS-SV về triển khai tuần sinh hoạt công dân HS-SV, sáng ngày 05/9/2016 trường Đại học Quảng Nam đã tổ chức tuần Sinh hoạt công dân HS-SV cho khóa tuyển sinh 2016 với hơn 1000 HS-SV.<o:p></o:p></span></p><p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 6pt 0cm 0pt; line-height: 20px;"><span lang="EN-US" arial",sans-serif;="" line-height:="" 150%"="" style="font-size: 10pt;">Với không khí hân hoan và hào hứng sau khi làm thủ tục nhập học chính thức trở thành các Tân sinh viên Đại học Quảng Nam, các Tân sinh viên đã được trang bị những kiến thức liên quan về chủ trương chính sách của Đảng, pháp luật nhà nước, các nội quy, quy chế, chế độ chính sách, cơ cấu tổ chức nhà trường… Các nội dung khác phù hợp từng cấp học, trình độ. Những kiến thức quan trọng mà mỗi sinh vân cần nắm rõ để thực hiện trong quá trình học tập, rèn luyện tại trường.<o:p></o:p></span></p><p class="MsoNormal" align="center" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: center; margin: 6pt 0cm 0pt; line-height: 20px;"><span lang="EN-US" arial",sans-serif;="" line-height:="" 150%"="" style="font-size: 10pt;">&nbsp;<input height="299" alt="TS. Huỳnh Trọng Dương - Hiệu trưởng nhà trường phát biểu khai mạc" src="http://files.qnamuni.edu.vn/UserFiles/Image/Tintuc/TuanSHCD_1617_TSHTD.jpg" type="image" width="550" style="font-size: 8pt; font-family: Verdana, Helvetica, Times;"></span></p><p class="MsoNormal" align="center" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: center; margin: 0cm 0cm 0pt; line-height: 20px;"><span lang="EN-US" verdana",sans-serif;="" color:="" blue;="" line-height:="" 150%;="" mso-bidi-font-family:="" arial;="" mso-bidi-font-size:="" 10.0pt"="" style="font-size: 8pt;">TS. Huỳnh Trọng Dương - Hiệu trưởng nhà trường phát biểu khai mạc</span><span lang="EN-US" verdana",sans-serif;="" color:="" blue;="" line-height:="" 150%;="" mso-bidi-font-family:="" arial"="" style="font-size: 10pt;"><o:p></o:p></span></p><p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 6pt 0cm 0pt; line-height: 20px;"><span lang="EN-US" arial",sans-serif;="" line-height:="" 150%"="" style="font-size: 10pt;">Qua tuần sinh hoạt công dân đầu năm các Tân sinh viên cũng được nhà trường tổ chức gặp gỡ Cố vấn học tập, bầu BSC lớp lâm thời, Tổ chức Đoàn TN và Hội Sinh viên cũng theo các Tân sinh viên từ lúc làm thủ tục nhập học để giúp đỡ và hỗ trợ đầy đủ.<o:p></o:p></span></p><p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: Arial, Verdana, Helvetica; font-size: 13.3333px; text-align: justify; margin: 6pt 0cm 0pt; line-height: 20px;"><span lang="EN-US" arial",sans-serif;="" line-height:="" 150%"="" style="font-size: 10pt;">Sự vào cuộc mạnh mẽ của các đơn vị chức năng, công tác đón tiếp nhập học, tổ chức tuần sinh hoạt công dân chu đáo, phù hợp đã tạo niềm tin và khí thế cho các tân sinh viên sẵn sàng bước vào chặng đường học tập, rèn luyện, bức phá vươn lên trên con đường lập thân, lập nghiệp.</span></p>', b'0', 0, b'0'),
(3, 1, 3, 'Chào Hoàng Dung', 'hoangdung@hotmail.com', 'tannguyen1995@hotmail.com', '2016-11-25 07:48:22', 'Chào Hoàng Dung, ta là Trương Vô Kỵ đây<br>', b'0', 0, b'0'),
(4, 1, 3, 'Chào khoa', 'hoangdung@hotmail.com', 'tannguyen1995@hotmail.com', '2016-11-25 08:29:17', 'Chào Hoàng DUng<br>', b'0', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_msg` int(12) NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_from` text COLLATE utf8_unicode_ci NOT NULL,
  `user_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_user_to` int(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_msg`, `body`, `user_from`, `user_to`, `id_user_to`, `id_user`, `date_sent`) VALUES
(7, 'admin', 'admin', '', 0, 2, '2016-08-25 10:23:23'),
(8, 'tannguyen', 'tannguyen', 'admin', 2, 1, '2016-08-25 10:24:25'),
(9, 'duythanh', 'duythanh', '', 0, 3, '2016-08-25 10:27:30'),
(10, 'tannguyen', 'tannguyen', '', 0, 0, '2016-08-25 10:30:48'),
(11, 'con ch&oacute;', 'admin', '', 0, 2, '2016-10-17 00:06:35'),
(12, 'cc', 'tannguyen', '', 0, 1, '2016-10-17 00:07:36'),
(13, 'haha', 'admin', '', 0, 2, '2016-10-17 00:07:43'),
(14, '&aacute;dhakshdkasj', 'tannguyen', '', 0, 1, '2016-10-17 00:07:48'),
(15, '&aacute;d', 'admin', '', 0, 2, '2016-10-17 00:09:56'),
(16, 'uh', 'tannguyen', '', 0, 1, '2016-10-17 00:11:52'),
(17, 'huhu', 'admin', '', 0, 2, '2016-10-17 00:14:12'),
(18, 'huhu', 'tannguyen', '', 0, 1, '2016-10-17 00:14:23'),
(19, 'mi n&oacute;i c&aacute;i chi', 'tannguyen', '', 0, 1, '2016-10-17 00:14:32'),
(20, 'ch&oacute; đẻ', 'tannguyen', '', 0, 1, '2016-10-17 00:15:16'),
(21, '', 'tannguyen', 'admin', 0, 0, '0000-00-00 00:00:00'),
(22, 'cc', 'admin', 'admin', 1, 2, '2016-10-17 00:25:57'),
(23, 'mi n&oacute;i chi đ&oacute;', 'admin', 'admin', 1, 2, '2016-10-17 00:26:04'),
(24, 't n&oacute;i chi m&ocirc; mi', 'tannguyen', 'admin', 1, 1, '2016-10-17 00:26:15'),
(25, 'uh', 'tannguyen', 'admin', 1, 1, '2016-10-17 00:26:23'),
(26, 'duythanhf', 'duythanh', 'admin', 1, 3, '2016-10-17 00:26:44'),
(27, 'thằng ch&oacute; đẻ', 'duythanh', 'admin', 1, 3, '2016-10-17 00:30:13'),
(28, 'ch&oacute; con', 'admin', 'admin', 1, 2, '2016-10-17 00:30:23'),
(29, '&yacute; mi sao', 'admin', 'admin', 1, 2, '2016-10-17 00:31:47'),
(30, 'haha', 'duythanh', 'admin', 1, 3, '2016-10-17 00:31:56'),
(31, 'ok chơi', 'admin', 'admin', 1, 2, '2016-10-17 00:32:26'),
(32, 'h&uacute;', 'admin', 'admin', 1, 2, '2016-10-17 14:36:16'),
(33, 'l&otilde;i', 'khanh', 'admin', 1, 0, '2016-10-17 14:36:44'),
(34, 'admin', 'tannguyen', 'admin', 1, 1, '2016-10-17 14:36:58'),
(35, 'chi', 'admin', 'admin', 1, 2, '2016-10-17 14:37:10'),
(36, 'mẹ', 'duythanh', 'admin', 1, 3, '2016-10-17 14:37:38'),
(37, 'ok', 'duythanh', 'admin', 1, 3, '2016-10-17 14:38:00'),
(38, 'm&aacute;', 'admin', 'admin', 1, 2, '2016-10-17 14:38:18'),
(39, 'n&oacute;', 'admin', 'admin', 1, 2, '2016-10-17 14:38:23'),
(40, 'ra', 'admin', 'admin', 1, 2, '2016-10-17 14:38:25'),
(41, 'sgask', 'admin', 'admin', 1, 2, '2016-10-17 14:38:30'),
(42, 'agjsdajsd', 'tannguyen', 'admin', 1, 1, '2016-10-17 14:39:08'),
(43, '&aacute;dasd', 'admin', 'admin', 1, 2, '2016-10-17 14:39:14'),
(44, '&aacute;dasd&aacute;d', 'admin', 'admin', 1, 2, '2016-10-17 14:39:23'),
(45, '&aacute;d', 'admin', 'admin', 1, 2, '2016-11-01 14:57:40'),
(46, '&aacute;dasda', 'admin', 'admin', 1, 2, '2016-11-01 14:57:44'),
(47, 'mi nghe kh&ocirc;ng', 'admin', 'admin', 1, 2, '2016-11-22 14:18:52'),
(48, 'ạdagdkjasd', 'admin', 'admin', 1, 2, '2016-11-22 14:19:57'),
(49, 'cờ h&oacute;', 'admin', 'admin', 1, 2, '2016-11-22 14:20:05'),
(50, '&aacute;dasdasd', 'tannguyen', 'admin', 1, 1, '2016-11-22 14:20:09'),
(51, 'm&aacute;', 'duythanh', 'admin', 1, 3, '2016-11-22 14:21:33'),
(52, 'n&oacute;', 'admin', 'admin', 1, 2, '2016-11-22 14:21:38'),
(53, 'haha', 'duythanh', 'admin', 1, 3, '2016-11-22 14:23:15'),
(54, 'ok', 'admin', 'admin', 1, 2, '2016-11-22 14:23:19'),
(55, '&aacute;dgkjahsjkdhasdjkahsdkasd', 'duythanh', 'admin', 1, 3, '2016-11-22 14:23:35'),
(56, 'ok', 'admin', 'admin', 1, 2, '2016-11-22 14:23:49'),
(57, 'ạax', 'admin', 'admin', 1, 2, '2016-11-22 14:24:01'),
(58, 'ajax', 'duythanh', 'admin', 1, 3, '2016-11-22 14:24:05'),
(59, 'uhuhhuhuh', 'admin', 'admin', 1, 2, '2016-11-22 14:24:46'),
(60, 'huhu', 'admin', 'admin', 1, 3, '2016-11-22 14:25:13'),
(61, 'ok', 'duythanh', 'admin', 1, 3, '2016-11-22 14:25:22'),
(62, 'cờ hps', 'admin', 'admin', 1, 3, '2016-11-22 14:25:28'),
(63, 'huhu', 'admin', 'admin', 1, 3, '2016-11-22 14:25:49'),
(64, 'ahsdhagsdad', 'admin', 'admin', 1, 3, '2016-11-22 14:25:53'),
(65, 'sdasdasd', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:02'),
(66, '&aacute;d', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:03'),
(67, '&aacute;d', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:04'),
(68, '&aacute;', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:04'),
(69, '&aacute;d', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:04'),
(70, '&aacute;d', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:04'),
(71, '&aacute;', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:05'),
(72, '&aacute;', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:05'),
(73, '&aacute;d&aacute;d&aacute;d&aacute;da', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:06'),
(74, 'a', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:06'),
(75, 'das', 'duythanh', 'admin', 1, 3, '2016-11-22 14:26:06'),
(76, '&acirc;sd', 'admin', 'admin', 1, 3, '2016-11-22 14:26:15'),
(77, '&acirc;sd', 'duythanh', 'admin', 1, 3, '2016-11-22 14:27:27'),
(78, 'traan', 'duythanh', 'admin', 1, 3, '2016-11-22 14:30:51'),
(79, 'trần dương ngọc tuấn', 'duythanh', 'admin', 1, 3, '2016-11-22 14:31:49'),
(80, 'h&eacute;n học như tr&acirc;u', 'admin', 'admin', 1, 3, '2016-11-22 14:32:03'),
(81, 'uh', 'admin', 'admin', 1, 3, '2016-11-23 11:02:48'),
(82, 'huhu', 'duythanh', 'admin', 1, 3, '2016-11-23 11:03:03'),
(83, '&aacute;d', 'admin', 'admin', 1, 3, '2016-11-24 01:45:08'),
(84, 'a', 'admin', 'admin', 1, 3, '2016-11-24 01:46:03'),
(85, '&aacute;dasd', 'admin', 'admin', 1, 3, '2016-11-24 01:46:05'),
(86, 'a', 'admin', 'admin', 1, 3, '2016-11-24 01:46:55'),
(87, 'a', 'admin', 'admin', 1, 3, '2016-11-24 01:46:58'),
(88, 'a', 'admin', 'admin', 1, 3, '2016-11-24 01:47:33'),
(89, '&aacute;dasd', 'admin', 'admin', 1, 3, '2016-11-24 01:47:37'),
(90, 'mai', 'admin', 'admin', 1, 3, '2016-11-24 01:47:41'),
(91, 'm', 'admin', 'admin', 1, 3, '2016-11-24 01:47:47'),
(92, 'a', 'admin', 'admin', 1, 3, '2016-11-24 01:47:50'),
(93, 'd', 'admin', 'admin', 1, 3, '2016-11-24 01:48:22'),
(94, 'kaka', 'duythanh', 'admin', 1, 3, '2016-11-24 01:49:22'),
(95, 'haha', 'duythanh', 'admin', 1, 3, '2016-11-24 01:50:11'),
(96, 'mi', 'duythanh', 'admin', 1, 3, '2016-11-24 01:50:16'),
(97, 'ok', 'duythanh', 'admin', 1, 3, '2016-11-24 01:50:23'),
(98, 'ok', 'duythanh', 'admin', 1, 3, '2016-11-24 01:50:25'),
(99, 'ok', 'duythanh', 'admin', 1, 3, '2016-11-24 01:50:26'),
(100, 'ok', 'duythanh', 'admin', 1, 3, '2016-11-24 01:50:27'),
(101, '&aacute;d', 'admin', 'admin', 1, 3, '2016-11-24 01:51:29'),
(102, '&aacute;dasd', 'admin', 'admin', 1, 3, '2016-11-24 01:51:33'),
(103, 'shdgjad', 'duythanh', 'admin', 1, 3, '2016-11-24 01:52:38'),
(104, 'ok', 'admin', 'admin', 1, 3, '2016-11-24 01:52:43'),
(105, 'h&aacute; h&aacute;', 'admin', 'admin', 1, 3, '2016-11-24 01:52:57'),
(106, 'pk rồi', 'duythanh', 'admin', 1, 3, '2016-11-24 01:53:10'),
(107, 'k', 'duythanh', 'admin', 1, 3, '2016-11-24 01:53:40'),
(108, '&aacute;d', 'admin', 'admin', 1, 3, '2016-11-24 01:59:12'),
(109, '&aacute;dasd', 'admin', 'admin', 1, 3, '2016-11-24 01:59:16'),
(110, 'o mem', 'admin', 'admin', 1, 3, '2016-11-24 02:01:17'),
(111, 'haha', 'duythanh', 'admin', 1, 3, '2016-11-24 09:11:42'),
(112, 'ok', 'duythanh', 'admin', 1, 3, '2016-11-24 09:11:48'),
(113, 'uh', 'duythanh', 'admin', 1, 3, '2016-11-24 09:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `muctaisan`
--

CREATE TABLE `muctaisan` (
  `id_muctaisan` int(12) NOT NULL,
  `mamuctaisan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenmuctaisan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_muctaisancha` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `muctaisan`
--

INSERT INTO `muctaisan` (`id_muctaisan`, `mamuctaisan`, `tenmuctaisan`, `id_muctaisancha`) VALUES
(4, '', 'Máy vi tính', 1),
(5, '', 'Thiết bị âm nhạc', 1),
(9, '', 'Tivi', 1),
(10, '', 'Thiết bị âm thanh', 1),
(11, '', 'Máy catset', 1),
(20, '', 'Máy in', 1);

-- --------------------------------------------------------

--
-- Table structure for table `muctaisancha`
--

CREATE TABLE `muctaisancha` (
  `id_muctaisancha` int(12) NOT NULL,
  `mamuctaisancha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tenmuctaisancha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `muctaisancha`
--

INSERT INTO `muctaisancha` (`id_muctaisancha`, `mamuctaisancha`, `tenmuctaisancha`, `ghichu`) VALUES
(1, '', 'Công cụ, dụng cụ', '');

-- --------------------------------------------------------

--
-- Table structure for table `nguonkinhphi`
--

CREATE TABLE `nguonkinhphi` (
  `id_nguonkinhphi` int(12) NOT NULL,
  `manguonkinhphi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tennguonkinhphi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tong_tien` float NOT NULL,
  `tong_chi` float NOT NULL,
  `tong_thanhly` float NOT NULL,
  `tien_themmoi` int(12) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguonkinhphi`
--

INSERT INTO `nguonkinhphi` (`id_nguonkinhphi`, `manguonkinhphi`, `tennguonkinhphi`, `tong_tien`, `tong_chi`, `tong_thanhly`, `tien_themmoi`, `trangthai`) VALUES
(1, '', 'Nhà trường', 500000000, 386409000, 237100000, 0, 1),
(2, 'DA', 'Dự án ', 400000000, 269885000, 150000000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id_nhacungcap` int(12) NOT NULL,
  `macongty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tencongty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(12) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`id_nhacungcap`, `macongty`, `tencongty`, `diachi`, `sdt`, `email`) VALUES
(1, '', 'Công ty MTV Quang Minh tại Quảng Nam', 'Tam kỳ quảng Nam', 120202345, 'quangminh@gmail.com'),
(2, '', 'Công ty TNHH Trần Tâm', 'Hải Châu Đà Nẵng', 126784774, 'trantam@gmail.com'),
(3, '', 'Công ty cung cấp máy tính Tam Kỳ', '117 Lê Lợi TP Tam Kỳ Quảng Nam', 126784774, 'maytinhtamky@gmail.com'),
(4, '', 'Công ty TNHH Âm nhạc Tam kỳ', 'Tam An Phú Ninh Quảng Nam', 1230012574, 'amnhactamky@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nuoc`
--

CREATE TABLE `nuoc` (
  `id_nuoc` int(12) NOT NULL,
  `manuoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tennuoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nuoc`
--

INSERT INTO `nuoc` (`id_nuoc`, `manuoc`, `tennuoc`) VALUES
(1, '', 'Việt Nam'),
(2, '', 'Nga'),
(3, '', 'Hàn Quốc'),
(4, 'HL', 'Hà Lan'),
(5, 'BL', 'Ba Lan');

-- --------------------------------------------------------

--
-- Table structure for table `sotaisan`
--

CREATE TABLE `sotaisan` (
  `id_sotaisan` int(11) NOT NULL,
  `so_the` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `don_gia` int(18) NOT NULL,
  `so_luong` int(20) NOT NULL,
  `nguyen_gia` int(20) NOT NULL,
  `thoigian_sd` int(10) NOT NULL,
  `nam_sd` int(10) NOT NULL,
  `ngay_mua` date NOT NULL,
  `thang` int(2) NOT NULL,
  `nam_sx` int(4) NOT NULL,
  `trangthai` int(1) NOT NULL,
  `tinhtrang` int(2) NOT NULL,
  `ghichu` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `star` float NOT NULL,
  `id_user_mua` int(5) NOT NULL,
  `id_muctaisancha` int(12) NOT NULL,
  `id_muctaisan` int(12) NOT NULL,
  `id_kinhphi` int(12) NOT NULL,
  `id_khoa` int(12) NOT NULL,
  `id_lop` int(12) NOT NULL,
  `id_ncc` int(12) NOT NULL,
  `id_nuoc` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sotaisan`
--

INSERT INTO `sotaisan` (`id_sotaisan`, `so_the`, `name`, `don_gia`, `so_luong`, `nguyen_gia`, `thoigian_sd`, `nam_sd`, `ngay_mua`, `thang`, `nam_sx`, `trangthai`, `tinhtrang`, `ghichu`, `star`, `id_user_mua`, `id_muctaisancha`, `id_muctaisan`, `id_kinhphi`, `id_khoa`, `id_lop`, `id_ncc`, `id_nuoc`) VALUES
(32, '018', 'Máy vi tính Acer', 4000000, 20, 0, 2, 2016, '2016-11-20', 11, 2016, 0, 1, '', 3, 1, 1, 4, 1, 8, 16, 3, 1),
(33, '019', 'Máy vi tính CMS', 9250000, 6, 0, 3, 2016, '2016-11-20', 11, 2016, 0, 0, '', 4, 1, 1, 4, 2, 8, 16, 3, 1),
(34, '020', 'Cồng chiêng ( bộ )', 1650000, 3, 0, 5, 2016, '2016-11-20', 11, 2016, 0, 1, '', 3.5, 1, 1, 5, 1, 8, 16, 4, 1),
(35, '021', 'Ghitar classice', 3550000, 2, 0, 4, 2016, '2016-11-20', 11, 2016, 0, 1, '', 4, 1, 1, 5, 1, 9, 18, 4, 1),
(36, '022', 'Đàn Organ Yamaha E443', 7100000, 11, 0, 4, 2016, '2016-11-20', 11, 2016, 0, 1, '', 2, 1, 1, 5, 1, 9, 18, 4, 3),
(37, '023', 'Tivi LCD Sony 46 in', 15000000, 23, 0, 3, 2016, '2016-11-20', 11, 2016, 1, 1, '', 3, 1, 1, 9, 2, 4, 9, 1, 1),
(38, '024', '', 1, 2, 0, 6, 2016, '2016-11-26', 11, 2016, 0, 0, '', 0, 1, 1, 5, 1, 1, 1, 1, 1),
(39, '025', '\\"Rõ ràng mà\\"', 1, 1, 1, 2, 2016, '2016-11-09', 11, 2016, 0, 0, '', 0, 1, 1, 5, 2, 1, 1, 1, 1),
(40, '026', '\\"<body style=\\"display:none\\">\\"', 123, 123, 123123123, 2, 2016, '2016-11-26', 11, 2016, 0, 0, '', 0, 1, 1, 4, 2, 3, 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taisanthanhly`
--

CREATE TABLE `taisanthanhly` (
  `id_taisanthanhly` int(12) NOT NULL,
  `id_sotaisan` int(12) NOT NULL,
  `id_canbothanhly` int(12) NOT NULL,
  `ngaythanhly` date NOT NULL,
  `soluong` int(12) NOT NULL,
  `lydo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhminhhoa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tienthanhly` float NOT NULL,
  `id_kinhphi` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taisanthanhly`
--

INSERT INTO `taisanthanhly` (`id_taisanthanhly`, `id_sotaisan`, `id_canbothanhly`, `ngaythanhly`, `soluong`, `lydo`, `anhminhhoa`, `tienthanhly`, `id_kinhphi`) VALUES
(1, 38, 1, '2016-11-21', 5, 'Lý do thanh lý', 'bdb0ba2cfe11a50aec0ef70edde9ca1b.jpg', 21900000, 1),
(3, 37, 1, '2016-11-21', 8, 'lý do nè', '', 120000000, 2),
(5, 27, 1, '2016-11-21', 1, 'Tủ bị hư hỏng', '', 2200000, 1),
(6, 34, 1, '2016-11-21', 3, 'Sản phẩm bị lỗi', '', 4950000, 1),
(7, 33, 1, '2016-11-21', 6, 'Sản phẩm bị lỗi', '', 55500000, 2),
(8, 37, 1, '2016-11-25', 2, 'DO máy hỏng', '3612d818923bbb85dfff72c24d489978.jpg', 30000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `thang`
--

CREATE TABLE `thang` (
  `id_thang` int(2) NOT NULL,
  `thang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thang`
--

INSERT INTO `thang` (`id_thang`, `thang`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `active` bit(1) NOT NULL,
  `chuc_vu` int(1) NOT NULL,
  `id_khoa` int(5) NOT NULL,
  `id_lop` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `fullname`, `picture`, `address`, `phone`, `email`, `gioithieu`, `active`, `chuc_vu`, `id_khoa`, `id_lop`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '03.jpg', 'Tam Thành Phú Ninh Quảng Nam', 1263751380, 'tannguyen1995@hotmail.com', 'Tôi là admin', b'1', 4, 0, 0),
(2, 'gvcn', '21232f297a57a5a743894a0e4a801fc3', 'Tiểu Long Nữ', '02.jpg', 'Tam Thành Phú Ninh Quảng Nam', 1263751380, 'tieulongnu@hotmail.com', 'Giới thiệu sơ nét về bản thân', b'1', 3, 1, 2),
(3, 'tk', '21232f297a57a5a743894a0e4a801fc3', 'Hoàng Dung', '1.jpg', 'Tam Thành Phú Ninh Quảng Nam', 1263751380, 'hoangdung@hotmail.com', 'Giới thiệu sơ nét về bản thân', b'1', 2, 2, 0),
(4, 'ht', '21232f297a57a5a743894a0e4a801fc3', 'Đông Phương Bất Bại', '510fd2f20476f00970c955b841600136.jpg', '', 123445015, 'dongphuongbatbai@gmail.com', 'Giới thiệu sơ nét về bản thân', b'1', 1, 0, 0),
(5, 'canbo', '21232f297a57a5a743894a0e4a801fc3', 'Triệu Mẫn', '03.jpg', 'Tam Thành Phú Ninh Quảng Nam', 1263751380, 'trieuman@hotmail.com', 'Giới thiệu sơ nét về bản thân', b'1', 4, 0, 0),
(6, 'canbonhanvien', '21232f297a57a5a743894a0e4a801fc3', 'Trương Vô Kỵ', '03.jpg', 'Tam Thành Phú Ninh Quảng Nam', 1263751380, 'truongvoky@hotmail.com', 'Giới thiệu sơ nét về bản thân', b'1', 4, 0, 0),
(7, 'canbonhanvien1', '57ba172a6be125cca2f449826f9980ca', 'Nguyễn Văn Tân', 'c8f8919e944f21b36593443de98b8ac3.jpg', '', 0, '', '', b'0', 0, 0, 0),
(8, 'text', '033e209b7043d8efa0be0841c59ab490', '', '', '', 0, 'canbo@gmail.com', '', b'1', 4, 0, 0),
(9, 'canbonhan', '57ba172a6be125cca2f449826f9980ca', 'Mai Nguyễn', '', '', 0, 'mai@gmail.com', '', b'1', 4, 0, 0),
(10, 'maiahahh', 'c89519ed5a5e351d36d2519e244cfbd7', '', '', '', 0, '', '', b'0', 0, 0, 0),
(11, '123123123', 'f5bb0c8de146c67b44babbf4e6584cc0', '', '', '', 0, '', '', b'0', 0, 0, 0),
(12, 'aaaaaaaaaaaaaaaa', '3dbe00a167653a1aaee01d93e77e730e', '\\"<body style=\\\\\\"display:none\\\\\\">\\"', '', '', 0, '', '', b'0', 4, 0, 0),
(13, 'qeqqeqeqeqe', '19097abae58b295894a6f8d36680fff4', 'eqeqeqeqeqe', '', 'qeqeqe', 2147483647, '', '', b'0', 3, 2, 0),
(14, 'tannguyen', '5fbd188f664648e3f6b1c98b0e4a3cb1', 'Nguyễn Văn Tân', '', '', 0, 'tannguyen1995@hotmail.com', '', b'0', 4, 0, 0),
(15, 'doquangkhoi', '25f9e794323b453885f5181f1b624d0b', 'Đỗ quang khôi', '', '', 0, 't@gmail.com', '', b'0', 4, 0, 0),
(16, 'userdemo', 'e6e061838856bf47e1de730719fb2609', 'Nguyễn Thị Demo', '30f5184a9e2fef943990e9fbce2d14e3.png', 'Địa chỉ chưa nhập', 1111111111, '', '', b'1', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vitri`
--

CREATE TABLE `vitri` (
  `id_vitri` int(12) NOT NULL,
  `mavitri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenvitri` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id_chucvu`);

--
-- Indexes for table `danhgialaitaisan`
--
ALTER TABLE `danhgialaitaisan`
  ADD PRIMARY KEY (`id_danhgialaitaisan`),
  ADD UNIQUE KEY `id_sotaisan` (`id_sotaisan`);

--
-- Indexes for table `danhgiasao`
--
ALTER TABLE `danhgiasao`
  ADD PRIMARY KEY (`id_star`),
  ADD UNIQUE KEY `id_sotaisan` (`id_sotaisan`);

--
-- Indexes for table `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  ADD PRIMARY KEY (`id_dieuchuyen`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Indexes for table `kiemke`
--
ALTER TABLE `kiemke`
  ADD PRIMARY KEY (`id_kiemke`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_lop`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id_mail`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `muctaisan`
--
ALTER TABLE `muctaisan`
  ADD PRIMARY KEY (`id_muctaisan`);

--
-- Indexes for table `muctaisancha`
--
ALTER TABLE `muctaisancha`
  ADD PRIMARY KEY (`id_muctaisancha`);

--
-- Indexes for table `nguonkinhphi`
--
ALTER TABLE `nguonkinhphi`
  ADD PRIMARY KEY (`id_nguonkinhphi`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id_nhacungcap`);

--
-- Indexes for table `nuoc`
--
ALTER TABLE `nuoc`
  ADD PRIMARY KEY (`id_nuoc`);

--
-- Indexes for table `sotaisan`
--
ALTER TABLE `sotaisan`
  ADD PRIMARY KEY (`id_sotaisan`);

--
-- Indexes for table `taisanthanhly`
--
ALTER TABLE `taisanthanhly`
  ADD PRIMARY KEY (`id_taisanthanhly`);

--
-- Indexes for table `thang`
--
ALTER TABLE `thang`
  ADD PRIMARY KEY (`id_thang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vitri`
--
ALTER TABLE `vitri`
  ADD PRIMARY KEY (`id_vitri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id_chucvu` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `danhgialaitaisan`
--
ALTER TABLE `danhgialaitaisan`
  MODIFY `id_danhgialaitaisan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `danhgiasao`
--
ALTER TABLE `danhgiasao`
  MODIFY `id_star` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  MODIFY `id_dieuchuyen` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kiemke`
--
ALTER TABLE `kiemke`
  MODIFY `id_kiemke` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `id_lop` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id_mail` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_msg` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `muctaisan`
--
ALTER TABLE `muctaisan`
  MODIFY `id_muctaisan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `muctaisancha`
--
ALTER TABLE `muctaisancha`
  MODIFY `id_muctaisancha` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nguonkinhphi`
--
ALTER TABLE `nguonkinhphi`
  MODIFY `id_nguonkinhphi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id_nhacungcap` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nuoc`
--
ALTER TABLE `nuoc`
  MODIFY `id_nuoc` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sotaisan`
--
ALTER TABLE `sotaisan`
  MODIFY `id_sotaisan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `taisanthanhly`
--
ALTER TABLE `taisanthanhly`
  MODIFY `id_taisanthanhly` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `thang`
--
ALTER TABLE `thang`
  MODIFY `id_thang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `vitri`
--
ALTER TABLE `vitri`
  MODIFY `id_vitri` int(12) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
