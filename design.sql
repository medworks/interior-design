-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2015 at 06:26 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `design`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `subject`, `body`, `regdate`) VALUES
(1, '    تست مطلب', '<p>تست مطالب&nbsp;برای افتتاحیه&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2015-03-08 14:59:48'),
(2, ' انواع چوب', '<p><span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چوب سخت</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">عموماً چوبهاي سخت به خوبي و به آرامي ميسوزند و ذغالهاي بادوامي را به جا ميگذارند. درختهاي آنها پهن برگ هستند. برگ اکثر آنها در پاييز مي ريزد. چوبهاي سخت لزوماً هميشه محکمتر و مقاومتر از چوبهاي نرم نيستند.</span><br />\r\n<br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چوب نرم</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">آتش توليد شده آنها داراي حرارت زيادي است ولي عمر کوتاه دارد. اين درختها برگهاي سوزني دارند. اکثراً هميشه سبز هستند (در پاييز برگهايشان نمي ريزد)، البته غير از انواع کاج اروپايي، سرو و سياه کاج با ميوه هاي مخروطي شکل.</span><br />\r\n<br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چوب مناسب آتش</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">بايد از موارد زير اطلاع حاصل کنيد:</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">حرارت توليدي انواع مختلفي از چوبها هر چوب سبز و تازه چگونه ميسوزد؟</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">ذغال کداميک بادوام بوده و چه چوبي سريعاً به خاکستر تبديل ميشود؟</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">آتش گرفتن چه چوبي با جرقه همراه است؟</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">اين امر ميتواند باعث سوراخ شدن کيسه خواب، لباسها و چادر شده و يا منجر به آتش سوزي در جنگل شود.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">درجه سختي انواع چوب در ايجاد برش درجه سهولت و سرعت در آتش گرفتن.</span><br />\r\n<br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">خشکاندن چوب</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">از قطعه قطعه کردن يک درخت سبز و زنده چوب سبز بدست مي آيد. يعني هنوز شيره گياهي در سلولهاي آنها وجود دارد. و وقتي که اين چوبها خشک ميشوند به آنها کنده گفته ميشود که اين نوع چوب معمولاً آتش بهتري ايجاد ميکند. زمان خشک شدن چوب هر درخت به سن درخت هنگام قطع شدن (درختان پيرتر شيره کمتري دارند)، فصل بريده شدن و آب و هواي منطقه رشد درخت بستگي دارد. مدت زمان متوسط براي خشکاندن چوب درختان سيب، بلوط و گردوي آمريکايي تقريباً يک سال و (زير تابش نور خورشيد تنها چند ماه) ميباشد.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چوب سبز: اين چوبها هنوز خشک نشده اند. همه چوبها خاصيت خشک شدن را ندارند پس نميتوان از آنها به عنوان سوخت استفاده کرد. از چوبهاي سبز ميتوان به عنوان بازتابنده و يا محافظ ظروف استفاده کرد.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چوب خشک: انقباض سبب ميشود اين چوبها از مرکز دچار ترک خوردگي شوند ولي اين مسئله به اين معني نيست که الزاماً راحت تر تکه تکه ميشوند. خاصيت تکه تکه شدن هر چوب به مشخصات آن برمي گردد.</span><br />\r\n<br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چرا چوب مي&zwnj;سوزد؟ ... تغييرات شيميايي</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">براي اينکه مقادير مختلف چوب بسوزد به ميزان کافي اکسيژن و حرارت کافي نياز هست. درصورت فقدان يکي از اين عوامل چوب آتش نخواهد گرفت. ميزان اکسيژن مورد نياز و دماي مورد نياز بنا به نوع چوب متغير است. تغيير و تحولات شيميايي در داخل چوب، در غياب اکسيژن و با درجه حرارت بالا اتفاق مي افتد که درنتيجه چوب شکسته شده، گازهايي آزاد ميشوند که باعث آتش گرفتن بيشتر چوب ميشود. هرچه درجه حرارت بيشتر باشد ميزان گازهاي توليدي بيشتر است.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چوبهايي که به آتش اضافه ميشوند، قبل از آتش گرفتن به دماي 282 سانتي&zwnj;گراد مي&zwnj;رسند. درعين حال تحولات دروني شيميايي گازهاي ذکر شده را آزاد کرده و درنتيجه چوبها آتش ميگيرند. گازها براي سوختن اکسيژن کافي و درجه حرارت 537 درجه سانتي&zwnj;گراد. يک جرقه براي شعله ور شدن اين گازها کافيست.</span><br />\r\n<br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">ذغال سنگ</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">ذغال سنگ انباشته اي از باقيمانده گياهان است که هزاران سال در باتلاقها و لجنزارها روي هم جمع شده اند. کمبود اکسيژن مانع تجزيه کامل باقيمانده گياهان ميشود. ذغال سنگ را ميتوان با تراشيدن، مانند قالبهاي برفي، از زمين جدا نمود. در طول زمان استخراج (برداشت ذغال سنگ) به سرعت خشک شده و قابل استفاده ميشود. در مناطق مختلف دردسترس است. از آن براي ساختن آتش، به خصوص در زمانهاي گذشته، استفاده ميکردند.</span><br />\r\n<br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">انتخاب صحيح چوب</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">مشخصات درختان مختلف جهت درست کردن آتش</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">نوع مثال مشخصات ويژه</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چوبهاي نرم وقتي که خوب خشک شوند به عنوان سوخت براي پخت و پز استفاده ميشوند. به راحتي مي شکنند و خراش برميدارند و زود آتش ميگيرند. چوبهايي که کنار نهرها و رودها ميرويند از اين دسته هستند. پس از چوبهاي شناوري که از آب ميگيريم ميتوان به عنوان سوخت استفاده کرد.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">چوبهاي نرم کاج سفيد، به سرعت آتش گرفته و سريع خاموش ميشوند.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">صنوبر، لاله درختي</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">کاجها به خاطر چوب سختي که دارند به عنوان سوخت مورد استفاده قرار ميگيرند درصورت خشک بودن مناسب اند.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">سياه کاج</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">انواع کاج ميلاد يک سوخت ضعيف است و از آن به عنوان آتش گير استفاده ميشود، شعله اوليه آن براي درست کردن آتش مناسب است.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">انواع کاج سياه وقتي که خشک هستند بسيار زود آتش ميگيرند، ولي موقعي که خيس هستند به سختي آتش ميگيرند.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">انواع کاج زرد خوب ميسوزند چون شيره داخلي آنها به جاي اينکه مايع باشد حالت صمغي دارد.</span><br />\r\n<span style="background-color:rgb(245, 245, 245); color:rgb(40, 48, 51); font-family:tahoma; font-size:10.6666669845581px">بلوط قرمز براي سوخت بايد از تکه هاي کوچک آن استفاده کرد.</span><br />\r\n&nbsp;</p>\r\n', '2015-03-08 19:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'کابینت'),
(4, 'میز تلوزیون'),
(5, 'کمد');

-- --------------------------------------------------------

--
-- Table structure for table `headlines`
--

CREATE TABLE IF NOT EXISTS `headlines` (
`id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `num` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `headlines`
--

INSERT INTO `headlines` (`id`, `subject`, `body`, `num`) VALUES
(1, 'اهداف', ' هدف ما جلب رضایت شماست               \r\n                                            \r\n                                            ', 1),
(2, 'چشم انداز', '                     افقی روشن                    ', 2),
(3, 'تاریخچه', '                                           \r\n                                           تاریخی قدیمی', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pics`
--

CREATE TABLE IF NOT EXISTS `pics` (
`id` int(11) NOT NULL,
  `idd` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `kind` tinyint(4) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pics`
--

INSERT INTO `pics` (`id`, `idd`, `img`, `kind`, `checked`) VALUES
(1, 1, 'articlepics/thumb2.jpg', 1, 0),
(2, 2, 'articlepics/8.jpg', 1, 0),
(9, 14, 'workpics/5.jpg', 2, 1),
(11, 14, 'workpics/7.jpg', 2, 1),
(12, 14, 'workpics/8.jpg', 2, 1),
(18, 14, 'workpics/7.jpg', 2, 1),
(19, 14, 'workpics/8.jpg', 2, 1),
(20, 14, 'workpics/8.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `key` varchar(30) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'Site_Theme_Name', 'default'),
(2, 'About_System', '<p>صنایع ام دی اف پارسا مفتخر است تا ایده آل شما را با کمترین هزینه و بیشترین کیفیت و رضایتمندی خلق نماید <br/>صنایع ام دی اف پارسا مفتخر است تا ایده آل شما را با کمترین هزینه و بیشترین کیفیت و رضایتمندی خلق نماید<br/>صنایع ام دی اف پارسا مفتخر است تا ایده آل شما را با کمترین هزینه و بیشترین کیفیت و رضایتمندی خلق نماید</p>\n'),
(3, 'Site_Title', 'صنایع ام دی اف پارسا'),
(4, 'Site_KeyWords', 'چوب ، کابینت ، ام دی اف ، کمد ، های گلاس ، ملامینه ، میز تلوزیون'),
(5, 'Site_Describtion', 'صنایع ام دی اف پارسا مفتخراست  تا ایده آل شما را خلق کند'),
(6, 'Admin_Email', 'admin@parsami.com'),
(7, 'News_Email', 'news@parsami.com'),
(8, 'Contact_Email', 'info@parsami.com'),
(9, 'Max_Page_Number', '5'),
(10, 'Max_Post_Number', '3'),
(11, 'FaceBook_Add', 'facebook.com'),
(12, 'Twitter_Add', 'twitter.com'),
(13, 'Rss_Add', '127.0.01/media/rssfeed.php'),
(14, 'YouTube_Add', 'youtube.com'),
(15, 'Tell_Number', ''),
(16, 'Fax_Number', ''),
(17, 'Address', 'مشهد- '),
(18, 'Is_Smtp_Active', 'yes'),
(19, 'Smtp_Host', 'smtp.gmail.com'),
(20, 'Smtp_User_Name', 'hatami4510@gmail.com'),
(21, 'Smtp_Pass_Word', '12345'),
(22, 'Smtp_Port', '465'),
(23, 'Email_Sender_Name', 'صنایع ام دی اف پارسا'),
(24, 'WellCome_Title', ''),
(25, 'WellCome_Body', ''),
(26, 'Gplus_Add', 'www.googleplus.com'),
(27, 'About_Pic_Name', 'about_pic.jpg'),
(28, 'Percent_Off', '5'),
(29, 'Extra_Tax', '0'),
(30, 'SmsUserName', 'ir2020'),
(31, 'SmsPassWord', '123456'),
(32, 'SmsText', 'آقا/خانم {user} به شماره خط {tel} سفارش شما با مشخصات {order_info} ثبت و اعمال شد.\r\nبا تشکر\r\nگروه بازرگانی ایرانا\r\n051-38555560\r\n\r\n'),
(33, 'SmsLineNumber', '+98100009'),
(34, 'Bank_Terminal_ID', '1144896'),
(35, 'Bank_User_Name', 'irana'),
(36, 'Bank_Pass_Word', '41833070'),
(37, 'Email_Text', '<p style="direction:rtl;">\r\nبا سلام\r\n<br/>\r\nآقا/خانم {user} ، به شماره خط {tel}  و همراه {mobile} \r\n<br/>\r\nدرخواست شما با مشخصات {order_info} \r\n<br/>\r\nدر مورخه {date} با موفقیت ثبت شد.\r\n<br/>\r\n************************************\r\n<br/>\r\nمشخصات پرداخت به شرح ذیل می باشند :\r\n<br/>\r\nبانک : درگاه پرداخت الکترونیک بانک ملت\r\n<br/>\r\nکد پیگیری : {payment_code}\r\n<br/>\r\nتاریخ پرداخت : {date}\r\n<br/>\r\n************************************\r\n<br/>\r\n با تشکر از اعتماد شما - گروه بازرگانی ایرانا\r\n051-38555560\r\n<br/>\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
`id` int(11) NOT NULL,
  `image` varchar(60) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `body` varchar(250) NOT NULL,
  `pos` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `subject`, `body`, `pos`) VALUES
(9, 'slides/image1.jpg', 'اسلاید 1', '<p>اسلاید 1</p>', 0),
(10, 'slides/image2.jpg', ' قاب موبایل', '<p>اسلاید 2</p>', 0),
(11, 'slides/image3.jpg', 'طراحی داخلی', '<p>طراحی داخلی</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `family` varchar(50) NOT NULL,
  `image` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `family`, `image`, `email`, `username`, `password`, `type`) VALUES
(1, 'Media', 'Teq', '', 'admin@mediateq.ir', 'php', '5f93f983524def3dca464469d2cf9f3e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE IF NOT EXISTS `works` (
`id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `catid`, `subject`, `body`, `regdate`) VALUES
(12, 4, '   تست خبر', '<p>خحجخحج-</p>\r\n', '2015-03-11 18:31:25'),
(13, 5, '   تست خبر', '<p>خحجخحج-</p>\r\n', '2015-03-11 18:44:58'),
(14, 3, ' کابینت های گلاس', '<p>این کار توسط چوب نوع های گلاس انجام شده است</p>\r\n', '2015-03-12 14:18:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headlines`
--
ALTER TABLE `headlines`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pics`
--
ALTER TABLE `pics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `headlines`
--
ALTER TABLE `headlines`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pics`
--
ALTER TABLE `pics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
