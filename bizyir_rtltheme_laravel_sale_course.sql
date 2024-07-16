-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2024 at 02:08 AM
-- Server version: 5.7.42-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizyir_rtltheme_laravel_sale_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(6, '1692818048168461.jpg', 'https://amirbizy.ir/', '2023-05-22 01:39:06', '2023-08-23 15:44:08'),
(7, '1692818038653576.png', 'https://amirbizy.ir/', '2023-05-22 01:41:18', '2023-08-23 15:43:58'),
(9, '1692818029464868.jpg', 'https://amirbizy.ir/', '2023-05-22 01:41:56', '2023-08-23 15:43:49'),
(12, '1692821090506273.png', 'https://amirbizy.ir/', '2023-08-23 16:33:49', '2023-08-23 16:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `thumbnail`, `writer`, `category`, `status`, `description`, `created_at`, `updated_at`) VALUES
(10, 'ChatGPT چگونه به برنامه‌ نویس‌ کمک میکند؟', 'how-to-chatgpt-help-programmers', '1690029289.jpg', '1', '8', '1', '<h4 style=\"text-align:justify\">ChatGPT چگونه می&zwnj;تواند به برنامه&zwnj;نویس&zwnj;ها کمک بکند؟</h4>\r\n\r\n<p style=\"text-align:justify\">از زمانی که ChatGPT معرفی شده است تقریبا هر روز شاهد ده&zwnj;ها مطلب در ارتباط با آن در شبکه&zwnj;های اجتماعی هستم و این تصدیق اهمیت بالای این هوش مصنوعی است. ChatGPT یک هوش مصنوعی مبتنی بر سوال/جواب است که نسبت به موارد پیش از خود به صورت خارق العاده&zwnj;ای جدی رفتار می&zwnj;کند.</p>\r\n\r\n<p style=\"text-align:justify\">از افرادی که در اطرافم زندگی می&zwnj;کنند و با دنیای برنامه نویسی آشنایی ندارند درخواست کردم که برای یک بار هم که شده با این هوش مصنوعی کار بکنند و نتیجه این تجربه را با من در میان بگذارند. جالب است که تمام این افراد آن را خارق العاده نامیدند و می&zwnj;گفتند تا به حال با چنین تجربه&zwnj;ای دقیق روبرو نشده&zwnj;اند.</p>\r\n\r\n<p style=\"text-align:justify\">حال جدای از این مسائل چت&zwnj;جی&zwnj;پی&zwnj;تی چگونه می&zwnj;تواند به ما برنامه&zwnj;نویس&zwnj;ها کمک بکند؟ آیا اصلا پتانسیل کمک کردن را در آن می&zwnj;بینید؟ بسیاری از افراد هستند که معتقدند ChatGPT برنامه&zwnj;نویس&zwnj;ها را بی کار می&zwnj;کند. اما به نظر من این یک نظر ناممکن و محال است، چرا که ChatGPT می&zwnj;تواند یک همکار خوب برای برنامه نویس باشد و نه اینکه جای وی را بگیرد. در این مطلب از وبسایت راکت قصد داریم در ارتباط با چیستی ChatGPT صحبت کنیم و امکان&zwnj;های آن برای کمک به یک برنامه نویس را مورد بررسی قرار دهیم.</p>\r\n\r\n<h4 style=\"text-align:justify\">ChatGPT چیست؟</h4>\r\n\r\n<p style=\"text-align:justify\">OpenAI در نوامبر سال ۲۰۲۲ ChatGPT را معرفی کرد، یک چت بات حرفه&zwnj;ای با مدل&zwnj;های زبانی بزرگ! در این چت بات شما می&zwnj;توانید به طُرُق مختلف با یک هوش مصنوعی خلاق و هوشمند ارتباط برقرار کرده و از وی سوال&zwnj;های مختلفی بپرسید. از آنجایی که این هوش مصنوعی قابلیت یادگیری دارد، می&zwnj;توان از آن به عنوان یک موتور جستجو نیز استفاده کرد. از این هوش مصنوعی برای نوشتن نامه&zwnj;ها، مقالات، کدها و... استفاده می&zwnj;شود.</p>\r\n\r\n<p style=\"text-align:justify\">به صورت تکنیکی اگر بخواهیم صحبت کنیم، ChatGPT یک Generative AI است. در این مدل زمانی که یک هوش مصنوعی با موضوعی آشنا می&zwnj;شود، در زمان پاسخگویی به پرسش&zwnj;های مربوط به آن موضوع، جواب تکراری تولید نمی&zwnj;کند، بلکه با روش&zwnj;های مختلف به همان پرسش پاسخ می&zwnj;دهد.<br />\r\nChatGPT چگونه می&zwnj;تواند به برنامه&zwnj;نویس&zwnj;ها کمک بکند؟ بررسی 5 سناریو</p>\r\n\r\n<p style=\"text-align:justify\">ChatGPT می&zwnj;تواند به گستره بزرگی از افراد در کارهای مختلف کمک بکند که صحبت کردن از آن&zwnj;ها در این مقاله بی فایده است. به همین دلیل ما تنها سراغ برنامه&zwnj;نویس&zwnj;ها رفتیم و قصد داریم در ارتباط با سناریوهایی که ChatGPT می&zwnj;تواند به برنامه نویس&zwnj;ها کمک بکند صحبت بکنیم.<br />\r\nاولین سناریو: تولید کُد</p>\r\n\r\n<p style=\"text-align:justify\">در ارتباط با تولید کُد یا Code Generation هوش مصنوعی ChatGPT یک ابزار بسیار قدرتمند و کاربردی برای توسعه دهندگان است. ChatGPT توانایی این را دارد که براساس چیزی که توسعه دهنده از وی می&zwnj;خواهد، قطعه کدهای مهمی را ایجاد کند. زمانی که وارد کارهای تکراری و کدهای همگانی می&zwnj;شویم نیز این هوش مصنوعی به خوبی می&zwnj;تواند کارها را انجام دهد.</p>\r\n\r\n<p style=\"text-align:justify\">البته این موضوع تنها به کدهای همگانی و تکراری ختم نمی&zwnj;شود چرا که ChatGPT توانایی ایجاد کدهای پیچیده مانند ایجاد یک کلاس با تمام ویژگی&zwnj;ها را دارد. بسیاری از برنامه نویسان مبتدی نیز می&zwnj;توانند در کارهای آموزشی و یادگیری نیز از این هوش مصنوعی استفاده کنند چرا که می&zwnj;توانند نحوه ساخت این قطعه کدها را در خلال پرسش و پاسخ&zwnj;ها متوجه شوند.</p>\r\n\r\n<h4 style=\"text-align:justify\">دومین سناریو: ایجاد مستندات</h4>\r\n\r\n<p style=\"text-align:justify\">یکی از کارهایی که برای بیشتر برنامه نویس&zwnj;ها سخت و طاقت فرساست، ایجاد مستندات برای کدهای&zwnj;شان است. برای چنین حالتی هوش مصنوعی ChatGPT به خوبی می&zwnj;تواند به شما کمک بکند. برای مثال شما می&zwnj;توانید یک قطعه کد را در اختیار این هوش مصنوعی قرار داده و به وی بگویید که مستندات مربوط به این قطعه کد را برای شما آماده کند.</p>\r\n\r\n<p style=\"text-align:justify\">یک موضوع بسیار جذاب و عالی این است که مستندات توسعه داده شده توسط ChatGPT می تواند در سه فایل قالب&zwnj;بندی شده مانند md، HTML و JSDoc به شما ارائه شود.</p>\r\n\r\n<h4 style=\"text-align:justify\">سناریو سوم: نوشتن تست</h4>\r\n\r\n<p style=\"text-align:justify\">زمانی که با این سناریو برخورد کردم متوجه شدم که انجام چنین کاری بسیار ناممکن است اما در این مرحله نیز بسیار شگفت زده شدم چرا که ChatGPT به خوبی از عهده این قسمت&nbsp; نیز برمی&zwnj;آید.</p>\r\n\r\n<p style=\"text-align:justify\">یک روش برای تست نویسی در چت&zwnj;جی&zwnj;پی&zwnj;تی این است که هوش مصنوعی هدف از انجام چنین تستی را متوجه می&zwnj;شود و براساس این هدف، ورودی&zwnj;های تست را ایجاد کرده و یکسری خروجی تعریف شده را برای خود در نظر می&zwnj;گیرد. برای مثال ممکن است یک توسعه دهنده از چت جی&zwnj;پی&zwnj;تی بخواهد که برای یک فیلد ورودی، یک تست بنویسد، در این صورت ChatGPT با درک ساختار کدها می&zwnj;تواند تشخیص بدهد که چگونه روی ورودی&zwnj;های نامجاز تمرکز کرده و آن&zwnj;ها را روی فیلد امتحان بکند.</p>\r\n\r\n<p style=\"text-align:justify\">از آنجایی که ChatGPT قابلیت درک منطق کدها را دارد می&zwnj;توان به آسانی در فرایند نوشتن تست ها از آن استفاده کرد.</p>\r\n\r\n<h4 style=\"text-align:justify\">سناریو چهارم: ساده&zwnj;سازی کُدها</h4>\r\n\r\n<p style=\"text-align:justify\">با استفاده از ChatGPT شما می&zwnj;توانید کدهای پیچیده&zwnj;ای که درک درستی از آن&zwnj;ها را ندارید به هوش مصنوعی بدهید و او برای آن توضیحاتی را ارائه دهد. اینکار حتی از طریق اضافه کردن کامنت&zwnj;های مختلف نیز انجام می&zwnj;شود.</p>\r\n\r\n<p style=\"text-align:justify\">در کنار این توضیحات، می&zwnj;توانید از ChatGPT درخواست کنید که کدهای&zwnj;تان را بهینه کند. این موضوع در وهله اول بدین معناست که کدهای&zwnj;تان را به صورت ساده&zwnj;تری نوشته و از پیچیدگی&zwnj;های سینتکسی دوری بکند.</p>\r\n\r\n<p style=\"text-align:justify\">تولید کدهای جایگزین نیز یکی دیگر از روش&zwnj;های این هوش مصنوعی برای ساده&zwnj;سازی کدهاست. در این حالت یک قطعه کد که یک کار خاص را انجام می&zwnj;دهد از ابتدا نوشته شده ولی به یک صورت دیگر! که البته خروجی قطعه کد دومی نیز همان خروجی قبلی خواهد بود.<br />\r\nسناریو پنجم: انجام تحقیقات و جمع&zwnj;آوری اطلاعات</p>\r\n\r\n<p style=\"text-align:justify\">درست مانند اینکه از گوگل یک سوال یا کوئری را پرسیده باشید می&zwnj;توانید همین کار را با ChatGPT نیز انجام دهید. با این تفاوت که این هوش مصنوعی به شما دقیقا همان پرسش را جواب داده و میلیون&zwnj;ها لینک را در اختیارتان نمی&zwnj;گذارد. به همین دلیل می&zwnj;تواند ابزار بسیار سودمند و مفیدی برای انجام تحقیقات و جمع&zwnj;آوری اطلاعات مختلف باشد.</p>\r\n\r\n<p style=\"text-align:justify\">از آنجایی که این هوش مصنوعی یک هوش مصنوعی با قابلیت یادگیری است می&zwnj;تواند در ارائه مطالب مختلف به شما کمک بکند و هر بار با یک پرسش یکسان، شما قرار نیست یک جواب کاملا تکراری را دریافت کنید.<br />\r\nدر پایان</p>\r\n\r\n<p style=\"text-align:justify\">بررسی ابعاد کمکی هوش مصنوعی ChatGPT می&zwnj; تواند یک کار آکادمیک و دانشگاهی بزرگ باشد چرا که درک پتانسیل&zwnj;های این هوش مصنوعی بسیار زیاد بوده و کارهای بسیار زیادی را می&zwnj;توان با آن انجام داد. سوالی که اینجا مطرح می&zwnj;شود این است که در تجربه شخصی شما آیا موضوع جذاب یا تجربه جدیدی بوده که با این هوش مصنوعی به آن برخورد کرده باشید؟ مطمئنا صحبت کردن از آن بسیار لذت بخش خواهد بود. می&zwnj;توانید در قسمت نظرات آن را با ما به اشتراک بگذارید.</p>', '2023-05-19 11:47:39', '2023-11-08 00:28:22'),
(11, 'چگونه روی کدهای دیگران کار کنیم؟', 'how-to-work-on-other-peoples-code', '1690029191.jpg', '1', '11', '1', '<h4 style=\"text-align:justify\">چگونه روی کدهای دیگران کار کنیم؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">زمانی که در یک شرکت برنامه&zwnj;نویسی کار می&zwnj;کنید، گاهی اوقات پیش خواهد آمد که مجبور باشید تا کدهای دیگران را در دست گرفته و آن&zwnj;ها را ویرایش بکنید یا توسعه دهید. ممکن است این کدها را یک هم تیمی نوشته باشد، ممکن است آن&zwnj;ها را از سورس یک پروژه گرفته باشید و هزاران ممکن دیگر، اما در نهایت باید این واقعیت را پذیرفت که حال شما صاحب کدهایی هستید که خودتان آن&zwnj;ها را ننوشته&zwnj;اید اما مجبور هستید که آن&zwnj;ها را مطالعه کرده و ویرایش نمایید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">زمانیکه چنین اتفاقی می&zwnj;افتد، ذهنیتی منفی به شما وارد می&zwnj;شود. وقتی کدها را مطالعه می&zwnj;کنید قسمت&zwnj;هایی را مشاهده می&zwnj;کنید که با آن&zwnj;ها آشنایی ندارید، کدهایی را مشاهده می&zwnj;کنید که به شدت نامرتب هستند و تصحیح کردن آن&zwnj;ها سال ها زمان می&zwnj;خواهد؛ صدها سناریو دیگر نیز ممکن است برای&zwnj;تان اتفاق بیافتد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">با خودتان می&zwnj;گویید: &laquo;این که مشکل من نیست، این کدها همینجوری&zwnj;ش هم مشکل دارن&raquo; شاید شما درست بگویید اما داشتن چنین نگرشی و تکرار کردن آن با خود، ممکن است در نهایت یک هیولای بزرگ از یک برنامه بسازد. بعضی وقت&zwnj;ها استفاده کردن از یک رویکرد متفاوت در کدنویسی می&zwnj;تواند کار با آن را برای دیگران غیر قابل انجام بکند. حال تصور بکنید که چند فرد با چند رویکرد متفاوت مشغول کار روی یک پروژه هستند و حال آن پروژه در اختیار شماست! رویکردها می&zwnj;توانند به هرچیزی در برنامه&zwnj;نویسی گفته شوند، نام&zwnj;گذاری برای متغیرها، شیوه ساخت توابع، ایجاد کلاس&zwnj;ها و&hellip; .</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در زیر قصد داریم به شما چند نکته&zwnj;ای را بگوییم که کمک می&zwnj;کنند تا برای چنین سناریوهایی آمادگی داشته باشید و خودتان را به کشتن ندهید!</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">۱. مستندات پروژه را درخواست کنید</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">معمولا برای یک پروژه -مخصوصا وبسایت&zwnj;ها- همیشه یکسری مستندات در قالب&zwnj;های مختلفی وجود دارد، ممکن است مستندات قدیمی باشد اما بهتر از هیچ است. بنابراین زمانی که یک فایل از کدهای مختلف را دریافت کردید مطمئن شوید که همراه با آن مستندی وجود دارد یا خیر. اگر نبود حتما آن را درخواست کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">۲. وقت بگذارید</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای درک کدها وقت کافی بگذارید. تنها در یک چشم به هم زدن آن را قضاوت نکنید. با نگاه دقیق به هر قسمت سعی کنید تا ساختارها فایل&zwnj;ها، وظایفی که انجام می&zwnj;دهد و&hellip; را به خوبی درک کنید. ببینید که وبسایت ساخته شده دقیقا از چه سیستم مدیریت محتوایی استفاده می&zwnj;کند، آیا در آن از Template Engine استفاده شده یا خیر، کتابخانه&zwnj;های جاوااسکریپتی که در آن قرار گرفته&zwnj;اند را بررسی کنید، ببینید که از کتابخانه&zwnj;های معتبری استفاده شده یا خیر؛ قسمت&zwnj;های بسیار دیگری نیز وجود دارد که می&zwnj;توانید با نگاه کردن به کدها از وجود آن&zwnj;ها مطمئن شوید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در صورتی که کدها مستندسازی نشده باشند، این زمان خوبی برای ساخت مستندات خواهند بود. شما می&zwnj;توانید یادداشت&zwnj;های خودتان را روی این پروژه داشته باشید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر بخواهید در یک مجموعه کد تغییری ایجاد کنید، قبل از هر کاری باید هدف اصلی آن کدها را درک کنید و درست همه بخش&zwnj;های آن را متوجه شوید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">۳. توابع ناشناخته را بررسی کنید</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">منتظر بسته شدن برنامه توسط یک خطای ناشناخته نباشید، سعی کنید تمام توابع و مخصوصا توابعی که پیچیده هستند را پیدا و درک کنید. بعد از آن به دنبال راهی منطقی&zwnj;تر و بهینه&zwnj;تر برای پیاده&zwnj;سازی آن&zwnj;ها باشید.&nbsp;</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">سعی کنید در تغییر دادن کدها، حتما مستنداتی را لحاظ کنید. برای بخش&zwnj;هایی از کامنت&zwnj;های روشن و واضح استفاده کنید. حتی تغییر دادن کامنت&zwnj;ها به پیام&zwnj;هایی واضح&zwnj;تر می&zwnj;تواند بخشی از فرایند تغییر کدها باشد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">۴. سازگار باشید</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">سیستم و رویکرد اصلی که کدها با آن نوشته شده&zwnj;اند را یاد بگیرید و سعی کنید که عادت&zwnj;های کدنویسی خود را با آن&zwnj;ها منطبق کنید. اگر با کلاس&zwnj;ها و توابع موجود آشنایی داشته باشید دیگر نیازی به تکرار آن&zwnj;ها نخواهید داشت، می&zwnj;توانید بدون نوشتن دوباره آن&zwnj;ها، از توانایی&zwnj;ها و کارکردشان استفاده کنید. اینگونه می&zwnj;توانید بهره&zwnj;وری کدهای&zwnj;تان را بالا ببرید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر شما از رویکرد منحصر به فرد خودتان در این دست کدها استفاده کنید، خواندن و استفاده از آن&zwnj;ها بعدا برای دیگر توسعه&zwnj;دهندگان بسیار سخت خواهد بود. به همین دلیل باید با اکثریت قالب کدها، سازگار باشید و کلاس&zwnj;ها و متدهای خودتان را با کلاس&zwnj;های موجود سازگار کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">۵. خروجی را آنالیز کنید</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">خروجی کدهایی که به شما داده می&zwnj;شود را آنالیز کنید. برای مثال اگر یک وبسایت است، دستگاه&zwnj;هایی که پشتیبانی می&zwnj;کند را آنالیز کنید. از توانایی پشتیبانی از مرورگرها در آن اطلاع پیدا کنید. بدانید که آيا در کدها فرایندهای تستینگ و&hellip; در نظر گرفته شده یا خیر.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">با استفاده از یک ابزار تست سرعت، میزان زمان مورد نیاز برای بارگذاری وبسایت را بررسی کنید، ببینید که آیا مشکلی جدی در کارایی آن وجود دارد یا خیر.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">۶. از بهانه &laquo;یکی دیگر آن را نوشته&raquo; استفاده نکنید</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">سعی نکنید به دلیل آنکه کدهای موجود به خوبی نوشته نشده&zwnj;اند شما هم کدهای مناسبی ننویسید. مطمئنا زمانی که یک پروژه بد نوشته می&zwnj;شود بدین معنا نیست که غیر قابل اصلاح است. این موضوع را نیز در نظر بگیرید که همه ما در بخشی از سابقه کاری&zwnj;مان کدهایی نوشته&zwnj;ایم که واقعا افتضاح بوده&zwnj;اند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">دنبال مقصر نگردید و بجای آن تمام تمرکز خودتان را روی این موضوع بگذارید که کدها را بهتر کنید. به این فکر کنید که اگر وبسایت یا به صورت کلی&zwnj;تر پروژه&zwnj;ای به خوبی کدنویسی شود می&zwnj;تواند برای خودتان نیز در آینده فایده داشته باشد چرا که در آینده ممکن است دوباره روی آن&zwnj;ها کار بکنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">در پایان</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر یک بار دیگر با کدهایی روبرو شدید که خودتان آن&zwnj;ها را ننوشته بودید ولی مجبور بودید که با آن&zwnj;ها کار بکنید، سراغ این مطلب بیایید و موضوعات گفته شده را روی کدها اعمال کنید.</p>', '2023-05-31 02:36:05', '2023-09-01 14:31:34'),
(12, '۵ حقیقت تلخ در مورد TypeScript', 'raw-or-framework-programming', '1692265611.jpg', '1', '8', '1', '<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"color:#e74c3c\">تایپ اسکریپت</span> یکی از مهمترین زبان&zwnj;های برنامه نویسی برای توسعه اپلیکیشن&zwnj;های سمت کاربر و سمت سرور است. بدون شک بسیاری از توسعه دهندگان حرفه&zwnj;ای حوزه توسعه وب از این زبان&nbsp;Superset&nbsp;استفاده می&zwnj;کنند و از اهمیت آن با خبر هستند. بیشتر افرادی که در حوزه&nbsp;<strong><a href=\"https://roocket.ir/skills/javascript\">جاوا اسکریپت</a></strong>&nbsp;نیز کار می&zwnj;کنند در نهایت به استفاده از آن روی می&zwnj;آورند و بیشتر فیدبک&zwnj;هایی که در&nbsp;<strong>Stackoverflow</strong>&nbsp;و دیگر جاها وجود دارد نشان می&zwnj;دهد که برنامه نویس&zwnj;ها از&nbsp;<strong>Typescript</strong>&nbsp;خوششان می&zwnj;آید و در پروسه کاری و پروژه&zwnj;های خود از آن استفاده می&zwnj;کنند.</p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">اما در کنار تمام مزایا و ویژگی&zwnj;هایی که تایپ اسکریپت دارد یکسری حقایق تلخ نیز وجود دارد که باعث می&zwnj;شود تا دید واقعی&zwnj;تر و بهتری به نسبت این تکنولوژی پیدا بکنیم. مطمئنا ما به مزایای تایپ اسکریپت واقف هستیم و&nbsp;<strong><u><a href=\"https://roocket.ir/series/learning-typescript\">یک دوره آموزشی کامل</a></u></strong>&nbsp;در ارتباط با آن نیز تولید کرده&zwnj;ایم. اما مواردی که در این مقاله خواهید خواند از موضوعاتی صحبت می&zwnj;کند که معمولا در نظر گرفته نمی&zwnj;شوند و یا اینکه باورهای غلطی به نسبت آن وجود دارد.</p>\r\n\r\n<h4 dir=\"RTL\" style=\"text-align:justify\">ا- تایپ اسکریپت شما را از جاوا اسکریپت بی نیاز نخواهد کرد</h4>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">در بسیاری از شبکه&zwnj;های اجتماعی و فضاهای گفتگو مربوط به برنامه نویسی این موضوع را دیده&zwnj;ایم که کسانی می&zwnj;گویند: ارزش ندارد وقتت را روی جاوا اسکریپت تلف کنی، بهتره که سراغ تایپ اسکریپت بروی!</p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">صحبت&zwnj;هایی از این دست وجود دارد و افرادی نیز واقعا به این قضیه باور دارند که با روی کار آمدن تایپ اسکریپت، دیگر نیازی به جاوا اسکریپت نیست و نباید وارد فرایند یادگیری و استفاده از آن شویم. خب این یک باور غلط است. تایپ اسکریپت شما را از جاوا اسکریپت تماما بی نیاز نخواهد کرد، درست است که این حقیقت تلخ است اما واقعیت داشته و باید آن را پذیرفت.</p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">تایپ اسکریپت یک&nbsp;Superset&nbsp;برای جاوا اسکریپت است و کسی خلاف این را نمی&zwnj;گوید. در واقع تایپ اسکریپت ویژگی&zwnj;های بسیار عالی را به جاوا اسکریپت اضافه کرد و به یک استاندارد بسیار مهم در دنیای جاوا اسکریپت تبدیل شد.&nbsp;&nbsp;تایپ اسکریپت به عنوان یک زبان برنامه نویسی&nbsp;Superset&nbsp;ویژگی های یک زبان برنامه نویسی استاتیک را به دنیای توسعه وب وارد کرد. برای در این حالت شما مجبور خواهید بود که به هنگام تعریف یک متغیر، حتما نوع داده&zwnj;ای آن را مشخص کنید.</p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">اما جدای از مواردی که گفتیم، در نهایت تایپ اسکریپت هنوز نمی&zwnj;تواند جای جاوا اسکریپت را بگیرد. یک نمونه از این قضیه را می&zwnj;توان در استفاده کردن از کتابخانه&zwnj;ها و فریمورک&zwnj;های مختلفی مشاهده کنید که برای استفاده درست و استاندارد از آن&zwnj;ها نیاز دارید تا با جاوا اسکریپت کار بکنید.</p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">از طرفی دیگر بسیاری از افراد هستند که دوست ندارند وارد پیچیدگی&zwnj;های تایپ اسکریپت شوند و به صورت ساده&zwnj;تر با استفاده از جاوا اسکریپت وارد توسعه اپلیکیشن&zwnj;ها شوند.</p>\r\n\r\n<h4 dir=\"RTL\" style=\"text-align:justify\">۲- تایپ اسکریپت پیچیده است</h4>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">تایپ اسکریپت به نسبت جاوا اسکریپت از پیچیدگی&zwnj;های بسیار زیادی برخوردار است و به همین دلیل است که باعث می&zwnj;شود فرایند یادگیری و استفاده از آن کمی سخت&zwnj;تر از جاوا اسکریپت باشد. بخشی از این پیچیدگی در تایپ اسکریپت بحث&nbsp;Typeها در آن و آوردن ویژگی&zwnj;های یک زبان شبه&nbsp;.NETیی است. مایکروسافت قصد داشته تا از تایپ اسکریپت یک زبان تمام و عیار ایجاد کند و همین نیز دلیل پیچیدگی&zwnj;های بسیار زیاد آن است.</p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">از طرفی دیگر، کانفیگ&zwnj;های بسیار زیاد و ادغام&zwnj;هایی که تایپ اسکریپت تلاش دارد تا با تمام فریمورک&zwnj;ها و ابزارهای محبوب مبتنی بر جاوا اسکریپت ایجاد کند باعث شده تا تایپ اسکریپت حجم پیچیدگی بیشتری نیز پیدا کند. در نتیجه پیچیدگی زیاد مخصوصا در پروژه&zwnj;های بزرگ یکی از حقایق تلخی&zwnj;ست که بایستی با آن روبرو شوید.</p>\r\n\r\n<h4 dir=\"RTL\" style=\"text-align:justify\">۳-&nbsp;نیاز به کامپایل شدن</h4>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">تایپ اسکریپت یک زبان نیتیو یا محلی برای مرورگر به حساب نمی&zwnj;آید بلکه کدهایی که نوشته شده را یک بار باید کامپایل کرده و سپس به مرورگر برای اجرا بدهید. این موضوع به پیچیدگی فرایند اجرای برنامه&zwnj;ها اضافه می&zwnj;کند و همچنین باعث می&zwnj;شود تا کمی سرعت اجرای شما کندتر شود. از این جهت ممکن است برای برخی از افراد جاوا اسکریپت بهتر عمل کند مخصوصا در پروژه&zwnj;هایی که از پیچیدگی کمتری برخوردار هستند.</p>\r\n\r\n<h4 dir=\"RTL\" style=\"text-align:justify\">۴- امنیت صد در صدی وجود ندارد</h4>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">برخی از افراد به دلیل وجود سیستم بررسی تایپینگ فکر می&zwnj;کنند که تایپ اسکریپت یک زبان برنامه نویسی عالی و بدون مشکل است و به همین دلیل است که فکر می&zwnj;کنند امنیت کاملی به لحاظ اجرا را داراست. این موضوع را فراموش نکنید که تایپ اسکریپت در نهایت به جاوا اسکریپت تبدیل می&zwnj;شود و بررسی نوع داده&zwnj;ای نیز در خلال کامپایل اتفاق می&zwnj;افتد اما در نهایت باز هم همه چیز به جاوا اسکریپت تبدیل خواهد شد و در نتیجه نباید انتظار چیز دیگری را داشت.</p>\r\n\r\n<h4 dir=\"RTL\" style=\"text-align:justify\">۵- تایپ اسکریپت در نهایت جوابگوی همه چیز نیست</h4>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">بسیاری فکر می&zwnj;کنند که نیاز است جاوا اسکریپت را به صورت کلی در یک گوشه قرار داد و دیگر به آن فکر نکرد. اما این اشتباه است چرا که تایپ اسکریپت به واقع نمی&zwnj;تواند همه کارهای جاوا اسکریپت را انجام دهد چرا که تایپ اسکریپت بر اساس نیازهای خود ایجاد شده و نیاز است که در کاربرد خود مورد استفاده قرار بگیرد. با توجه به اینکه در دنیای توسعه وب یک مدل ساده سازی پیش گرفته شده است، اغلب فریمورک&zwnj;هایی که برای استفاده آسان تعریف شده&zwnj;اند به صورت کامل از جاوا اسکریپت پشتیبانی می&zwnj;کنند نه تایپ اسکریپت. برای مثال ویوجی&zwnj;اس یکی از این دست فریمورک&zwnj;هاست.</p>\r\n\r\n<h4 dir=\"RTL\" style=\"text-align:justify\">چگونه تایپ اسکریپت را یاد بگیریم؟</h4>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">برای یادگیری تایپ اسکریپت در ابتدا نیاز است که به خوبی با جاوا اسکریپت آشنایی داشته باشید و بعد از آن سراغ یادگیری تایپ اسکریپت بروید. در نتیجه اگر قصد دارید به صورت قدم به قدم پیش بروید، دوره&zwnj;های آموزشی زیر را مشاهده کنید.</p>\r\n\r\n<ul style=\"list-style-type:disc\">\r\n	<li dir=\"RTL\" style=\"text-align:justify\"><a href=\"https://roocket.ir/series/javascript-tutorial\">دوره آموزشی جاوا اسکریپت</a></li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\"><a href=\"https://roocket.ir/series/javascript-es6-tutorial\">دوره آموزشی اکما اسکریپت ۶</a></li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\"><a href=\"https://roocket.ir/series/learning-typescript\">دوره آموزشی تایپ اسکریپت</a></li>\r\n</ul>\r\n\r\n<h4 dir=\"RTL\" style=\"text-align:justify\">در پایان</h4>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">یادگیری تایپ اسکریپت می&zwnj;تواند ویژگی جدیدی را به رزومه کاری&zwnj;تان اضافه کرده و شما را به یک توسعه دهنده کارآمدتر تبدیل کند. اگر قصد دارید که در زمینه برنامه نویسی جاوا اسکریپت حرفه&zwnj;ای شده و با کارایی بالاتری کار کنید حتما به فکر یادگیری تایپ اسکریپت باشید.</p>', '2023-06-09 23:34:57', '2023-11-03 21:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `article_comments`
--

CREATE TABLE `article_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_text` text COLLATE utf8mb4_unicode_ci,
  `admin_profile` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_comments`
--

INSERT INTO `article_comments` (`id`, `article_id`, `user_id`, `status`, `text`, `admin_name`, `admin_text`, `admin_profile`, `created_at`, `updated_at`) VALUES
(4, 12, '10', '1', 'مقاله خوب و بسیار کاربردی بود تشکر', '1 - ( ادمین )', '<p><span style=\"font-size:14px\">خوشحالیم که این مقاله براتون مفیده بوده.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">موفق باشید</span></p>', '1693563278384973.jpg', '2023-08-26 06:47:54', '2024-01-23 22:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`, `status`, `created_at`, `updated_at`) VALUES
(7, 'php', 'php', NULL, '1', '2023-07-22 09:15:12', '2023-08-18 15:55:09'),
(8, 'laravel', 'laravel', '7', '1', '2023-07-22 09:15:24', '2023-07-22 09:15:24'),
(11, 'javascript', 'javascript', NULL, '1', '2023-07-22 09:16:05', '2023-07-22 09:16:05'),
(12, 'type script', 'type-script', '11', '1', '2023-07-22 09:16:16', '2023-07-25 06:57:47'),
(13, 'web design', 'web-design', NULL, '0', '2023-07-30 16:46:46', '2023-08-19 06:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_profile` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_text` text COLLATE utf8mb4_unicode_ci,
  `admin_profile` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `course_id`, `status`, `username`, `email`, `user_profile`, `text`, `admin_name`, `admin_text`, `admin_profile`, `created_at`, `updated_at`) VALUES
(14, 11, 1, '1', 'bizylearn@admin.com', '1693563278384973.jpg', '<p>ممنون از انتشار این دوره</p>', '1 - ( ادمین )', '<p><span style=\"font-size:14px\">خواهش میکنم دوست عزیز</span></p>', '1692390661648031.jpg', '2023-08-26 06:40:40', '2023-08-28 06:27:30'),
(15, 11, 1, '1', 'bizylearn@admin.com', '1693563278384973.jpg', '<p>دوره خوب و کاربردی هست برای شروع برنامه نویسی وب</p>', '1 - ( ادمین )', '<p><span style=\"font-size:14px\">حضور شما باعث دلگرمی ماست&nbsp;<img alt=\"heart\" src=\"https://amirbizy.ir/rtl-theme/laravel-sale-course/public/ckeditor/plugins/smiley/images/heart.png\" style=\"height:15px; width:15px\" title=\"heart\" /></span></p>', '1692390661648031.jpg', '2023-08-26 06:41:01', '2024-01-23 22:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_off` int(11) NOT NULL,
  `expires_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `percent_off`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'bizylearn', 50, '1402-12-29 13:20:59', '2023-06-09 03:03:37', '2023-11-04 00:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_for_users`
--

CREATE TABLE `coupon_for_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('نقدی','رایگان') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `author`, `price`, `sale_price`, `image`, `category`, `description`, `status`, `course_status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'دوره اموزش لایو وایر', 'learn-livewire', '1', '289000', NULL, '1691685080.png', '8', '<p style=\"text-align:justify\">توسعه وبسایت&zwnj;ها در دنیای مدرن آن هم تنها توسط یک نفر کار بسیار دشواری&zwnj;ست، چرایی این امر نیز برمی&zwnj;گردد به آنکه ابزارهای بسیار زیادی مانند ری&zwnj;اکت و ویوجی&zwnj;اس وجود که فرایند یادگیری زمان&zwnj;بری دارند و برای یک برنامه&zwnj;نویس سمت بک-اند ممکن است یادگیری آن&zwnj;ها دشوار و زمان&zwnj;بر باشد. خب راهکار ما چیست؟ ما Livewire را پیشنهاد می&zwnj;دهیم. Livewire یک فریمورک Full-Stack برای&nbsp;<a href=\"https://roocket.ir/skills/laravel\">لاراول</a>&nbsp;است که به شما کمک می&zwnj;کند اپلیکیشن&zwnj;های لاراولی خود را با امکانات دیوانه کننده Livewire به شکل یک اپلیکیشن مدرن ایجاد کنید. در دوره آموزش Livewire ما سعی &zwnj;می&zwnj;کنیم قدم به قدم و به شکل جامع شما را با آن آشنا کنیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">Livewire چیست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">همانطور که در ابتدا مطرح کردیم،&nbsp;<a href=\"https://laravel-livewire.com/\"><strong>Livewire</strong></a>&nbsp;یک فریمورک full-stack مربوط به لاراول است. معنی این حرف، این است که شما می&zwnj;توانید Front-End و Back-End خود را به شکل یکارچه و مدرن با Livewire پیاده&zwnj;سازی کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اجازه دهید با مثال نحوه کار Livewire را به شما توضیح دهم. فرض کنید فرمی برای ثبت&zwnj;نام دارید، Livewire به شما کمک می&zwnj;کند به شکل real-time فیلد&zwnj;های سمت Front-End خود را اعتبارسنجی کنید اما این عتبارسنجی توسط سمت Back-End یعنی لاراول انجام می&zwnj;شود ولی در عین حال، حالتی real-time دارد</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">مقداری روش کار این حالت گیج&zwnj;کننده&zwnj;است اما در قالب دوره&nbsp;<strong>آموزش Livewire</strong>&nbsp;کامل به این مسائل خواهیم پرداخت.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">چرا باید Livewire یاد بگیریم؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">زمان زیادی از معرفی نسخه یک Livewire نمی&zwnj;گذرد که با استقبال خیلی عالی توسعه&zwnj;دهندگان لاراول مواجه شده است و خیلی سریع ورژن دو خود را ارائه کرده است.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">Livewire به شما کمک &zwnj;می&zwnj;کند بدون آن که خودتان را درگیر API نویسی برای ارتباط برقرار کردن با کتابخانه&zwnj;های جاوا اسکریپتی مثل Vuejs یا Reactjs کنید خیلی راحت ظاهر اپلیکیشن&zwnj; خود در Front-End را همچون Vuejs و Reactjs در بیاورید و در عین حال نیازی به APIنویسی نداشته باشید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در طی دوره آموزش Livewire ما سعی می&zwnj;کنیم پتانسیل بالای Livewire را به شما نمایش دهیم. تا کامل متوجه عملکرد عالی آن شوید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">Livewire هم Front-End و هم Back-End</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">Livewire یک فریمورک Full-Stack مربوط به laravel است. Full-Stack به این معنی که هم بخش Front-End را پوشش می&zwnj;دهد و هم Back-End . این دو بخش به شکل یک پارچه&zwnj;ای در Livewire عمل می&zwnj;کنند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای مثال شما در بخش Front-End می&zwnj;خواهید مشخص کنید با کلیک کردن بر روی یک المنت در سمت سرور چیزی ذخیره سازی شود.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">با استفاده از Vuejs و Reactjs شما نیاز دارید که به API لاراول برای انجام اینکار درخواست ارسال کنید اما در Livewire این کار به سادگی اضافه کردن یک متد است .</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">حالا در این دوره به شکل کامل با این مسائل آشنا خواهید شد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">برای آموزش Livewire باید چه چیزهایی را بدانیم؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای اینکه بتوانید دوره آموزش Livewire را مشاهده کنید و به شکل کامل از محتوای آن بهره&zwnj;مند شوید نیاز است قبل از شروع شما با لاراول آشنا باشید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای آموزش لاراول می&zwnj;توانید از چارت&nbsp;<a href=\"https://roocket.ir/skills/laravel\"><strong>آموزش لاراول</strong></a>&nbsp;در سایت راکت استفاده کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">همچنین اگر مایل هستید در بخش Front-End هم به شکل حرفه&zwnj;ای&zwnj;تری کار کنید نیاز هست مقداری با جاو&zwnj;ا&zwnj; اسکریپت آشنا باشید البته آشنا نبودن با آن هم مشکل خاصی برای مشاهده این دوره برای شما به وجود نخواهد آورد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر مایل به یادگیری جاوا اسکریپت هستید می&zwnj;توانید از چارت&zwnj; مهارت&nbsp;<a href=\"https://roocket.ir/skills/javascript\"><strong>آموزش جاوااسکریپت</strong></a>&nbsp;آن را فرا بگیرید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><img alt=\"\" src=\"http://localhost:8000/course_image/1691685080.png\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<h3 dir=\"rtl\" style=\"text-align:justify\">سرفصل&zwnj;های دوره آموزش Livewire</h3>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">معرفی Livewire</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این بخش از دوره آموزش Livewire در مورد اینکه Livewire چیست؟ چرا باید Livewire را یاد بگیریم؟ در چه پروژه&zwnj;های می&zwnj;توان از Livewire استفاده کرد و پیش&zwnj;نیاز&zwnj;های Livewire چیست صحبت خواهم کرد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">آشنایی ابتدایی با Livewire</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این بخش از دوره آموزش Livewire روش نصب Livewire را در ابتدا یاد می&zwnj;گیرید و بعد اولین کامپونتت را ایجاد خواهید کرد و نهایت با دستورات مختلف artisan آن آشنا می&zwnj;شوید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">کامپوننت&zwnj;ها</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">کل اپلیکیشن Livewire از کامپوننت&zwnj;های مختلف تشکیل می&zwnj;شود، در این بخش در موارد مختلف ایجاد کامپوننت&zwnj;ها، ارسال پارامتر به کامپوننت&zwnj;ها&zwnj;، ایجاد کامپوننت&zwnj;های تمام صفحه، پیاده&zwnj;&zwnj;سازی route model binding و layoutبندی در Livewire صحبت خواهیم کرد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">ارتباطات در کامپوننتها</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این بخش از آموزش Livewire در مورد نحوه ارتباط برقرار کردن Front-End و Back-End توضیح خواهم داد و می&zwnj;بینید که چطور می&zwnj;توانم اطلاعاتی را از سمت سرور در Front-End با استفاده از Livewire به نمایش در بیاوریم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">موارد پیشرفته</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">مثال و مطالب پیشرفته&zwnj;ای در مورد Livewire وجود دارد که در این بخش قصد دارم مورد این موارد صحبت کنم و روش استفاده از آن&zwnj;ها را به شما قدم به قدم آموزش دهم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">اعتبارسنجی فرم&zwnj;ها</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این بخش روش اعتبارسنجی فرم&zwnj;ها در Livewire را به شما آموزش می&zwnj;دهم، شما می&zwnj;توانید در Livewire به شکل خیلی راحتر عتبارسنجی Real-Time را پیاده&zwnj;سازی کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">آپلود و دانلود فایل&zwnj;ها</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">روش آپلود و دانلود فایل&zwnj;ها مسائل بعدی هستند که می&zwnj;توانند در ایجاد اپلیکیشن پیشرفته&zwnj;تر در Livewire به ما کمک کنند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این بخش به شکل کامل شما را با این مسائل پیشرفته آشنا خواهم کرد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">و ...</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">البته سرفصل&zwnj;های دیگری هم در این دوره خواهد بود که در لیست قسمت&zwnj;ها می&zwnj;توانید آن&zwnj;ها را مشاهده کنید.</p>', '1', '1', 'نقدی', '2023-05-20 10:13:20', '2023-08-28 06:18:30'),
(2, 'دوره اموزش پروژه محور لاراول 10', 'laravel-projects', '1', '679000', '369000', '1690229029.png', '8', '<p dir=\"RTL\" style=\"text-align:justify\">هیچ آموزشی بهتر از آموزش&zwnj;های عملی و پروژه محور نیست. اما باید این نکته را به یاد بسپرید که لازمه برداشتن یک دوره آموزش محور داشتن دانش پایه&zwnj;ای از موضوعاتی&zwnj;ست که گفته خواهند شد. خب این دقیقا کاری&zwnj;ست که ما در وبسایت آموزشی راکت انجام داده&zwnj;ایم. یادگیری لاراول هیچگاه کار سختی نبوده اما این بدین معنا نیست که آن را دست کم بگیرید، بعد از یادگیری مباحث پایه&zwnj;ای لاراول از طریق وبسایت راکت، حال ما قصد داریم شما را با یک آموزش پروژه محور همراه کنیم که به شما کمک خواهد کرد تا درک درست&zwnj;تری از این فریمورک دوست&zwnj;داشتنی در دنیای واقعی پروژه&zwnj;ها پیدا کنید.</p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\">اما ابتدای کار شما نیاز دارید که به خوبی با فریمورک لاراول کار کرده و با مباحث پایه&zwnj;ای آن آشنایی داشته باشید چرا که در این دوره قرار نیست در رابطه با هر دستور و قطعه کدی که استفاده می&zwnj;شود توضیحات کاملی داده شود. بنابراین ابتدای کار&nbsp;<a href=\"https://roocket.ir/series/learn-laravel\">دوره آموزشی&nbsp;<strong>رایگان</strong>&nbsp;لاراول</a>&nbsp;را مشاهده کرده و سپس به این دوره بازگردید.</p>\r\n\r\n<h4 dir=\"RTL\" style=\"text-align:justify\">سرفصل&zwnj;های دوره آموزش پروژه محور لاراول</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در زیر سعی می&zwnj;کنیم بخشی از سرفصل&zwnj;های مختلف این دوره را برای&zwnj;تان توضیح دهیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">سیستم عضویت و ورود</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این بخش روش پیاده&zwnj;سازی سیستم عضویت و ورود را به شکلی برای&zwnj;تان توضیح می&zwnj;دهم که شما بتوانید در هر پروژه&zwnj;ای سیستم عضویت و ورود آن پروژه را به شکل صحیح و کاربردی پیاده&zwnj;سازی کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">احرازهویت دو مرحله&zwnj;ای</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">امینت&zwnj; وبسایت&zwnj;ها این روز&zwnj;ها به شدت مهم شده است به شکلی که ضعف امنیتی در یک وبسایت می&zwnj;تواند فاجعه به بار بیاورد. در دوره&nbsp;<strong>آموزش پروژه محور لاراول</strong>&nbsp;و این بخش ما با پیاده&zwnj;سازی احرازهویت دو مرحله&zwnj;ای به شما آموزش می&zwnj;دهیم که چطور سیستم&zwnj;های عضویت و ورود امن&zwnj;تری را ایجاد کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">ری&zwnj;کپچا گوگل</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">امنیت فرم&zwnj;ها از دست ربات&zwnj;ها و هرزنامه&zwnj;ها بسیار مهم&zwnj; است، گوگل ابزاری با عنوان reCaptcha در اختیار توسعه&zwnj;دهندگان قرار داده که با استفاده از آن می&zwnj;توانید از دست ربات&zwnj;ها خلاص شوید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">سیستم اطلاع رسانی - Notification</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">سیستم اطلاع رسانی در پروژه&zwnj;های مختلف می&zwnj;تواند میزان فعالیت کاربران را افزایش دهد این روز&zwnj;ها در ابزار&zwnj;های مختلف این سیستم را به شکل متداول مشاهده می&zwnj;کنیم. حالا در دوره&nbsp;<strong>آموزش پروژه محور لاراول</strong>&nbsp;سعی شده روش پیاده&zwnj;سازی این سیستم را به شکل کامل به شما آموزش دهیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">مفاهیم هسته لاراول</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">درک هسته لاراول می&zwnj;تواند به استفاده درست از لاراول به شدت کمک کند در این دوره آموزشی&nbsp;ما شما را به شکل عمیقی با هسته لاراول آشنا خواهیم کرد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">پنل مدیریت</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">بدونه شک هر پروژه&zwnj;ای در سطح دنیا برای مدیریت نیاز به پنلی دارد، در این دوره سعی شده روش پیاده&zwnj;سازی پنل مدیریت به شکل صحیحی به شما آموزش داده شود.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">تغییر ورژن لاراول</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در صورت آپدیت شدن ورژن لاراول باید چه کرد؟ چطور می&zwnj;توانیم ورژن لاراول پروژه خود را کامل کنیم؟ در این بخش به شکل مفصل در مورد این موارد صحبت خواهد شد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">سیستم اجازه دسترسی</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">داشتن یک سیستم که به افراد مختلف اجازه دسترسی به بخش&zwnj;های مختلف سایت را دهد بسیار مهم و کاربردی است که در این دوره به شکل مفصلی روش پیاده&zwnj;سازی آن را فرا خواهیم گرفت.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">سیستم احرازهویت با شماره موبایل</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">ورود با شماره موبایل این روزها به شدت کاربری و پر مخاطب شده ما هم از این مسئله آگاه هستیم و در این بخش روش پیاده&zwnj;سازی آن را به شما آموزش میدهیم.</p>\r\n\r\n<h3 dir=\"rtl\" style=\"text-align:justify\">محصولات، نظرات، دسته&zwnj;بندی&zwnj;ها و ویژگی&zwnj;ها</h3>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">این بخش یکی از متداول&zwnj;ترین بخش&zwnj;های هر پروژه است که بدون شک شما باید آن را به خوبی فرا بگیرید تا بتوانید در پروژه&zwnj;های مختلف چنین مواردی را به سادگی پیاده کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">بخش&zwnj;های بیشتر دیگری در این دوره وجود دارد که پیشنهاد می&zwnj;کنیم کمی به پایین اسکرول کنید تا بتوانید به شکل کامل با بخش&zwnj;های و قسمت&zwnj;های آن به شکل کامل آشنا شوید.</p>', '1', '0', 'نقدی', '2023-05-20 12:01:02', '2023-08-28 06:14:42'),
(3, 'دوره آموزش php mvc پروژه محور', 'learn-php-mvc', '1', '445000', NULL, '1690229099.jpg', '7', '<p dir=\"rtl\" style=\"text-align:justify\">MVC&nbsp;که به اختصار&nbsp;Model-View-Controll&nbsp;نام دارد یک الگوی طراحی نرم&zwnj;افزاری&zwnj;ست که به شما در توسعه هرچه بهتر اپلیکیشن&zwnj;ها کمک می&zwnj;کند. منظور از ایجاد این روش سه لایه، داشتن تمرکز بیشتر برای توسعه هر لایه بصورت جداگانه بوده است. برای مثال شما زمانی که قصد کار روی داده&zwnj;های وبسایت را داشته باشید تنها کافی&zwnj;ست که روی لایه مدل تمرکز کرده و تا مدت زمانی با نهایت تمرکز روی آن کار کنید. این جداسازی می&zwnj;تواند وب اپلیکیشن بسیار مدیریت&zwnj;پذیر&zwnj;تری را ایجاد کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">ابتدای کار بیایید کمی تخصصی&zwnj;تر با&nbsp;MVC&nbsp;آشنا شویم و سپس در رابطه با اهمیت یادگیری این تکنیک صحبت خواهیم کرد.&nbsp;</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">MVC&nbsp;چیست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">MVC&nbsp;در حقیقت یک معماری نرم&zwnj;افزاری بود که اولین بار برای توسعه اپلیکیشن&zwnj;های مبتنی بر دسکتاپ که به روش گرافیکی توسعه می&zwnj;یافت استفاده شد. بعد از مدت&zwnj;ها توسعه&zwnj;دهندگان متوجه شدند که استفاده از این معماری در وبسایت&zwnj;ها نیز می&zwnj;تواند کار مثبت و مثمر ثمری به شمار برود. به همین دلیل در سال ۲۰۰۲ اولین فریمورک جاوا که نام آن&nbsp;Spring&nbsp;بود با این معماری عرضه شد. از آن زمان به بعد مدل&nbsp;MVC&nbsp;هر روز در بین فریمورک&zwnj;های دیگر به شکل&zwnj;های البته تاحدی متفاوت رواج پیدا کرد. برای مثال در سال ۲۰۰۵ زمانی که فریمورک جنگو توسعه یافت از مدلی با نام&nbsp;MVT&nbsp;استفاده شد که ریشتا مفهومی تغییر یافته از&nbsp;MVC&nbsp;به شما می&zwnj;رود. با این حال در بین فریمورک&zwnj;های مبتنی بر&nbsp;PHP&nbsp;نیز&nbsp;MVC&nbsp;جایگاه والایی دارد. در حال حاضر اغلب فریمورک&zwnj;های&nbsp;PHP&nbsp;از جمله لاراول با استفاده از این معماری توسعه یافته و برنامه&zwnj;نویسان نیز در صورت استفاده از لاراول باید از این معماری استفاده کنند. اما این سه لایه کنترل-نمایش-مدل دقیقا چه کاری انجام می&zwnj;دهند؟ بیایید به صورت مجزا با هر کدام از این موارد آشنا شویم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">لایه&nbsp;Model</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">این لایه وظیفه مدیریت دیتابیس را بر عهده دارد، به این شکل که در برنامه&nbsp;MVC&nbsp;شما هر اقدامی که مربوط به کار با دیتابیس باشد را این لایه باید انجام دهد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">یکی از مزیت&zwnj;های استفاده از لایه&nbsp;Model&nbsp;این است که شما می&zwnj;توانید در آن واحد چند دیتابیس در پروژه خود داشته باشید و بدون آنکه نگران مدیریت ارتباطات با دیتابیس&zwnj;ها باشید این کار را به لایه مدل بسپارید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در طی دوره آموزش&nbsp;MVC&nbsp;ما به شکل کامل این لایه را به شکل عملی پیاده&zwnj;سازی می&zwnj;کنیم تا ببینید اینکار به چه شکلی انجام می&zwnj;شود.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">لایه&nbsp;View</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">لایه&nbsp;View&nbsp;وظیفه نمایش اطلاعات را بر عهده دارد، به این شکل که شما اطلاعاتی که قصد نمایش دارید را به&nbsp;Viewهای مورد نظر خود ارسال می&zwnj;کنید و در لایه&nbsp;View&nbsp;فقط اطلاعات را در قالب&nbsp;HTML&nbsp;به نمایش در می&zwnj;آورید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">به این شکل دیگر لازم نیست که نگران پیچیدگی کدهای&nbsp;<a href=\"https://roocket.ir/skills/php\"><strong>PHP</strong></a>&nbsp;و&nbsp;<a href=\"https://roocket.ir/skills/frontend\"><strong>HTML</strong></a>&nbsp;باشید و می&zwnj;توانید بر&nbsp;Viewهای مورد نظر وبسایت&zwnj;تان کنترل بهتری داشته باشید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در طی دوره آموزش&nbsp;MVC&nbsp;در کنار آشنایی با لایه&nbsp;Model&nbsp;یاد می گیرید چطور لایه&nbsp;View&nbsp;را ایجاد کنید و از موتور&zwnj;های قالب&zwnj;ساز در پروژه خود استفاده کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">لایه&nbsp;Controller</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">همانطور که از عنوان مشخص است لایه&nbsp;Controller&nbsp;وظیفه کنترل و پردازش را بر عهده دارد. برای مثال شما یک&nbsp;URL&nbsp;را به متدی از یک کلاس متصل می&zwnj;کنید که آن کلاس را به عنوان کنترلر در نظر می&zwnj;گیریم. هر زمان که&nbsp;URL&nbsp;شما صدا زده شود فریمورک ما وظیفه دارد متد مورد نظر از کنترلر را اجرا کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">حالا کار اصلی کنترلر مشخص می&zwnj;شود به این شکل در متد مورد نظر شما با استفاده از لایه&nbsp;Model&nbsp;از دیتابیس اطلاعات دریافت می&zwnj;کنید در آن متد اطلاعات را پردازش می&zwnj;کنید و در&nbsp;View&nbsp;مورد نظر خودتان اطلاعات را به نمایش در می آورید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">Controller&nbsp;بخش مهمی از&nbsp;MVC&nbsp;است که در طی دوره آموزش&nbsp;MVC&nbsp;شما مشاهده خواهید کرد که به چه صورتی این لایه را با یک لایه اضافه با عنوان&nbsp;router&nbsp;ادغام می&zwnj;کنیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">پیش&zwnj; نیاز آموزش&nbsp;MVC</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای آنکه بتوانید با معماری&nbsp;MVC&nbsp;آشنا شوید و از آن برای پیاده&zwnj;سازی پروژه&zwnj;های&nbsp;<a href=\"https://roocket.ir/skills/php\"><strong>PHP</strong></a>&nbsp;خود استفاده کنید. در قدم اول باید&nbsp;<a href=\"https://roocket.ir/skills/php\"><strong>PHP</strong></a>&nbsp;را به خوب یادگرفته باشید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای یادگیری کامل&nbsp;<a href=\"https://roocket.ir/skills/php\"><strong>PHP</strong></a>&nbsp;می&zwnj;توانید از&nbsp;<a href=\"https://roocket.ir/skills/php\"><strong>دوره&zwnj;های آموزشی&nbsp;</strong><strong>PHP</strong><strong>&nbsp;در وبسایت راکت</strong></a>&nbsp;استفاده کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در قدم بعدی برای آنکه بتوانید دوره آموزش&nbsp;MVC&nbsp;را ببینید باید شی گرایی در&nbsp;<a href=\"https://roocket.ir/skills/php\"><strong>PHP</strong></a>&nbsp;را آموزش دیده باشید که برای یادگیری آن می&zwnj;توانید از دوره&nbsp;<a href=\"https://roocket.ir/series/learn-oop\">آموزش شی گرایی&nbsp;PHP&nbsp;وبسایت راکت</a>&nbsp;استفاده کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">قبل از شروع این دوره قطعا سعی کنید تسلط خود بر مباحث&nbsp;<a href=\"https://roocket.ir/skills/php\"><strong>PHP</strong></a>&nbsp;و&nbsp;<a href=\"https://roocket.ir/series/learn-oop\"><strong>OOP</strong></a>&nbsp;را قوی کنید، بدلیل آنکه پیاده&zwnj;سازی معماری&nbsp;MVC&nbsp;ممکن است کمی چالش برانگیز باشد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">در دوره آموزش&nbsp;MVC&nbsp;چه مباحثی را یاد می&zwnj;گیرید؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">با شرکت در این دوره و دیدن فایل های آموزشی و تمرین کردن نکات گفته شده در ویدیوها شما یاد می&zwnj;گیرید که:</p>\r\n\r\n<ul>\r\n	<li dir=\"RTL\" style=\"text-align:justify\">چطور معماری&nbsp;MVC&nbsp;را پیاده&zwnj;سازی کنید</li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\">چطور با لایه&zwnj;های مختلف معماری&nbsp;MVC&nbsp;به شکل کامل کار کنید.</li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\">چطور می&zwnj;توانید از معماری&nbsp;MVC&nbsp;برای پیاده&zwnj;سازی فریمورک استفاده کنید.</li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\">چطور سطح کدنویسی خود را بالا ببرید.</li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\">چطور یک سیستم&nbsp;routing&nbsp;برای مدیریت معماری&nbsp;MVC&nbsp;بسازید</li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\">و موضوعات دیگری که در این دوره آموزشی تدریس خواهد شد.</li>\r\n</ul>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">اهمیت یادگیری معماری&nbsp;MVC</h4>\r\n\r\n<ul dir=\"rtl\">\r\n	<li dir=\"RTL\" style=\"text-align:justify\">اصلی&zwnj;ترین هدف از یادگیری این معماری درک درست پیدا کردن از سیستم&zwnj;های طراحی است که امکان مدیریت پروژه&zwnj;ها را به ما می&zwnj;دهند.</li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\">دومین هدف از یادگیری این موضوع استفاده از فریمورک&zwnj;هایی است که بعدها باید آن&zwnj;ها را یاد بگیریم. از آنجایی که امروزه بیشتر فریمورک&zwnj;ها از این معماری بهره می&zwnj;گیرند نیاز است که شما نسبت به این موضوعات آگاهی کافی داشته باشید.</li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\">داشتن دانش&nbsp;MVC&nbsp;در رزومه کاری&zwnj;تان بحثی مهم و حیاتی است به همین دلیل نیاز است که این دوره آموزشی را نیز بگذرانید.</li>\r\n</ul>', '1', '0', 'نقدی', '2023-06-06 23:57:05', '2024-01-23 23:45:16'),
(4, 'آموزش جاوااسکریپت', 'learn-javascript', '1', '325000', NULL, '1690229105.jpg', '11', '<p style=\"text-align:justify\">دوره آموزش جاوااسکریپت قدم ابتدایی یادگیری جاوااسکریپت در چارت مهارت <strong><a href=\"https://roocket.ir/skills/javascript\">یادگیری جاوااسکریپت</a></strong> محسوب می&zwnj;شود و ما قصد داریم در قدم ابتدایی شما را با موارد مختلفی از جاوااسکریپت آشنا کنیم و مسیر شما برای ورود به دنیای بزرگ جاوا&zwnj; اسکریپت را هموار کنیم. اما ابتدای کار بیایید با جاوااسکریپت آشنا شویم.</p>\r\n\r\n<div class=\"content-area sm:text-right text-center\">\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">جاوااسکریپت چیست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">ابتدایی&zwnj;ترین سوال این است که جاوااسکریپت چیست؟ و چه کاری انجام می&zwnj;دهد؟ اگر هیچ درکی از این موضوع ندارید باید گفت جاوااسکریپت را می&zwnj;توان به عنوان یک زبان برنامه&zwnj;نویسی همه فن حریف شناخت که با استفاده از آن شما می&zwnj;توانید هم بخش ظاهر وبسایت خود و هم بخش Back-End سایت خود را با آن توسعه دهید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این قدم از آموزش جاوااسکریپت شما برای آنکه بتوانید در بخش Front-End یا &zwnj;Back-End کار کنید ابتدا باید به درستی خود جاوااسکریپت را یاد بگیرید و دقیقا هدف ما در اینجا این است که مقدمات جاوااسکریپت را به شکل کامل و جامع به شما آموزش دهیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">پیش&zwnj;نیاز یادگیری جاوااسکریپت؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><a href=\"https://www.freecodecamp.org/news/content/images/2023/04/JavaScript-Blog-Cover.png\"><img alt=\"\" src=\"https://www.freecodecamp.org/news/content/images/2023/04/JavaScript-Blog-Cover.png\" style=\"height:100%; width:100%\" /></a></p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در ابتدا باید برای خودتان مشخص کنید که تصمیم شما از یادگیری جاوااسکریپت چیست؟ اگر تصمیم دارید با آموزش جاوااسکریپت تبدیل به یک Front-End کار شوید قطعا نیاز است برای یادگیری جاوااسکریپت <a href=\"https://roocket.ir/series/learn-html\" rel=\"noopener\" target=\"_blank\">ابتدا HTML را به شکل کامل یاد بگیرید</a> و <a href=\"https://roocket.ir/series/learn-css\" rel=\"noopener\" target=\"_blank\">مقداری هم CSS بلد باشید</a>.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اما اگر تنها تصمیم دارید که در سمت Back-End از جاوااسکریپت استفاده کنید می&zwnj;توانید این دو مورد را نادیده بگیرید، البته پیشنهاد ما برای شما این است که جدایی از تصمیم شما برای Frontend یا Backend در ابتدا HTML را یاد بگیرید و مقداری هم با CSS آشنایی داشته باشید تا بتوانید در آینده بدون مشکل از جاوااسکریپت در قسمتی که مورد نظرتان است استفاده کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر با HTML و CSS آشنا نیستید می&zwnj;تواند از طریق گام&zwnj;های <strong><a href=\"https://roocket.ir/skills/frontend\">یادگیری طراحی وب</a></strong> این دو را به شکل کاملا رایگان آموزش مشاهده کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">چرا باید جاوااسکریپت یاد گرفت؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در حال حاضر اگر شما تصمیم دارید یک طراح و برنامه&zwnj;نویس وب شوید بدون شک نیاز به آموزش جاوااسکریپت دارید. امروزه به واسطه کتابخانه&zwnj;ها و فریمورک&zwnj;های مختلف بسیار زیاد، جاوااسکریپت می&zwnj;تواند وبسایت&zwnj;هایی با ظاهر پیشرفته و بسیار کاربردی ایجاد کند که البته برای این موضوع در ابتدا شما باید جاوااسکریپت را فرا بگیرید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای اینکه این موضوع برای شما ملموس&zwnj;تر شود تنها کافی است که سری به وبسایت&zwnj;های فریلنسری و کاریابی در ایران و جهان بزنید، قطعا به سرعت متوجه خواهید شد که به چه میزانی جاوااسکریپت در دنیا خواهان دارد و اگر شما بتوانید در این حوزه به یک حرفه&zwnj;ای تبدیل شوید، بدون شک کارهای زیادی برای انجام خواهید داشت.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\"><strong>آموزش جاوااسکریپت از طریق بیزی لرن</strong></h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">یکی از ابتدایی&zwnj;ترین هدف&zwnj;های راکت در زمان راه&zwnj;اندازی شدن وبسایت آموزش کامل و کاربردی جاوااسکریپت بوده که ما در طی سالیان سعی کرده&zwnj;ایم با قرار دادن دوره&zwnj;های مختلف و همچنین با به روز کردن محتوای دوره&zwnj;های جاوااسکریپت شما را در این سطح به روز و حرفه&zwnj;ای نگه داریم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">ما در راکت به دوره&zwnj;های جاوااسکریپت خود اعتماد بسیار زیادی داریم. اگر شما جز افرادی هستید که علاقمند به یادگیری جاوااسکریپت هستید قطعا راکت در دوره&zwnj;های متفاوت می&zwnj;تواند به شما کمک کند تا به این سطح برسید و جاوااسکریپت را به شکل کامل یاد بگیرید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">در این دوره آموزشی با چه مفاهیمی آشنا خواهید شد؟</h4>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong>آشنایی با مفاهیم اولیه و معرفی جاوااسکریپت</strong></li>\r\n	<li style=\"text-align:justify\"><strong>راه&zwnj;اندازی ابزارهای مورد نیاز برای شروع برنامه&zwnj;نویسی</strong></li>\r\n	<li style=\"text-align:justify\"><strong>کار با دستورات اولیه و ضروری جاوااسکریپت</strong></li>\r\n	<li style=\"text-align:justify\"><strong>کار با قابلیت&zwnj;های شئ&zwnj;گرایی در جاوااسکریپت</strong></li>\r\n	<li style=\"text-align:justify\"><strong>یادگیری قدرت گرفتن از تکنولوژي DOM</strong></li>\r\n	<li style=\"text-align:justify\"><strong>آشنایی با اکوسیستم فریمورک&zwnj;ها</strong></li>\r\n	<li style=\"text-align:justify\"><strong>و...</strong></li>\r\n</ul>\r\n</div>', '1', '1', 'نقدی', '2023-07-23 03:01:33', '2023-08-18 15:53:20'),
(5, 'آموزش TypeScript', 'learn-typescript', '1', '239000', '200000', '1690229109.png', '12', '<p style=\"text-align:justify\">تایپ&zwnj; اسکریپت (TypeScript) به عنوان یک زبان برنامه&zwnj;نویسی بر پایه جاوااسکریپت شناخته می&zwnj; شود که کاملا Open-Source است. این متن&zwnj; باز بودن به این معناست که شما هم می&zwnj;توانید در توسعه آن نقش داشته باشید. در دوره <strong>آموزش تایپ&zwnj;اسکریپت (TypeScript)</strong> ما سعی می&zwnj;کنیم روش کار با این زبان را قدم به قدم به شما آموزش دهیم.</p>\r\n\r\n<div class=\"content-area sm:text-right text-center\">\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">تایپ&zwnj;اسکریپت (TypeScript) چیست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">همانطور که در پاراگرف بالا به آن اشاره کرده&zwnj;ایم تایپ&zwnj;اسکریپت (TypeScript) به عنوان یک زبان متن&zwnj;باز بر پایه جاوااسکریپت شناخته &zwnj;می&zwnj;شود که به ما این اجازه را می&zwnj;دهد تا با امکانات بیشتری کدهای جاوااسکریپتی خود را پیاده&zwnj;سازی کنیم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای مثال شما در تایپ&zwnj;اسکریپت می&zwnj;توانید Type متغیرها را دقیقا مشخص کنید. یا می&zwnj;توانید در بحث شئ&zwnj;گرای ساده&zwnj;تر دیزاین پترن&zwnj;های مختلف را ایجاد کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">چرا TypeScript؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">چرا زمانی که می&zwnj;توانید از خود جاوااسکریپت برای توسعه کدها استفاده کنید از TypeScript استفاده کنیم؟ مسئله در اینجا بر روی امکاناتی است که تایپ&zwnj;اسکریپت برای توسعه کدها در اختیارتان قرار میدهد. برای مثال مشخص کردن type اطلاعات در یک برنامه می&zwnj;تواند نقش مهمی داشته باشد. یا برای مثال بحث&zwnj;های پیشرفته&zwnj;تر در شی گرایی.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">حال ما در دوره<strong> آموزش تایپ&zwnj;اسکریپت</strong> به عنوان یک زبان سعی کرده&zwnj;ایم که این زبان را به شکل کامل و قدم به قدم به شما آموزش دهیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\"><strong>فواید استفاده از TypeScript</strong></h4>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://blog.theodo.com/static/ba2166b279b234c4824d1c2fb299ced2/ee604/ts_logo.png\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">قبل از اینکه دوره <strong>آموزش تایپ&zwnj;اسکریپت (TypeScript)</strong> را شروع کنیم. نیاز است ابتدا توضیحی در مورد فواید استفاده از TypeScript دهیم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">جاوااسکریپت به صورت تنها به اندازه&zwnj;ای خوب است که بتوانید کارهای جالبی را با آن انجام دهیم، اما سوال اینجاست که آیا به یادگیری تایپ&zwnj;اسکریپت نیازی هست؟ از لحاظ فنی برای تبدیل شدن به یک توسعه&zwnj;دهنده خوب نیازی نیست که حتما تایپ &zwnj;اسکریپت را یاد بگیرید، به این دلیل که افراد مختلفی وجود دارند که بدون کدنویسی تایپ&zwnj;اسکریپت توسعه&zwnj;دهندگان خوبی هستند. با اینحال کار کردن با تایپ&zwnj;اسکریپت فواید خود را دارد که در زیر آن&zwnj;ها را بررسی می&zwnj;کنیم:</p>\r\n\r\n<ul dir=\"rtl\">\r\n	<li style=\"text-align:justify\">براساس وجود نوع&zwnj;دهی ایستا در تایپ&zwnj;اسکریپت، کدها قابلیت پیش&zwnj;بینی بیشتر و راهکاری آسان&zwnj;تر برای رفع اشکال دارند.&nbsp;</li>\r\n	<li style=\"text-align:justify\">به لطف وجود ماژول&zwnj;های مختلف، namespaceها و پشتیبانی قدرتمند از شی&zwnj;گرایی سازمان&zwnj;دهی کدها برای نوشتن اپلیکیشن&zwnj;های پیچیده ساده است.&nbsp;</li>\r\n	<li style=\"text-align:justify\">تایپ&zwnj;اسکریپت قبل از تبدیل شدن به جاوااسکریپت از یک مرحله کامپایل شدن می&zwnj;گذرد که باعث می&zwnj;شود تمام خطاها قبل از رسیدن به مرحله اجرا و خراب کردن چیزهایی در کدهای اصلی شناسایی شوند.</li>\r\n	<li style=\"text-align:justify\">فریمورک محبوبی مانند Angular در نسخه&zwnj;های جدید خود از تایپ&zwnj;اسکریپت استفاده می&zwnj;کند و استفاده از Angular لازمه داشتن دانش خوبی از تایپ&zwnj;اسکریپت است.&nbsp;</li>\r\n</ul>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">دلیل آخری که گفته شد، یکی از دلایل اصلی افراد برای مراجعه کردن به تایپ&zwnj;اسکریپت است. انگولار از نسخه دوم خود به بعد از تایپ&zwnj;اسکریپت استفاده می&zwnj;کند و این موضوع توسعه&zwnj;دهندگان را ملزم می&zwnj;کند که بتوانند با تایپ&zwnj;اسکریپت کار کنند.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">چرا باید از تایپ&zwnj;اسکریپت استفاده کرد؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">درک مناسب از اینکه چرا باید از چیزی مثل تایپ&zwnj;اسکریپت استفاده کنید قطعا می&zwnj;تواند به شما در <strong>آموزش تایپ&zwnj;اسکریپت</strong> کمک بسیار زیادی کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>نوع&zwnj;بندی متغیرها :</strong> جاوااسکریپت یک زبان برنامه&zwnj;نویسی به شکل Dynamic Type است و این به این معناست که شما در جاوااسکریپت نیاز به مشخص کردن Type متغیرها ندارید. اما مشخص نبود این type در کنار مزیتی که دارد. میتواند برای پروژه&zwnj;های بزرگ مشکلاتی به وجود بیاورد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">حال تایپ&zwnj;اسکریپت پشتیبانی خوبی از typeها کرده و قابلیت static type را در اختیارتان قرار داده تا بتوانید در کدهای جاوااسکریپت خود نوع داده&zwnj;ای که یک متغییر می&zwnj;تواند دریافت کنند را دقیقا مشخص کنید. این موضوع می&zwnj;تواند باعث جلوگیری از باگ&zwnj;های شود که بخاطر عدم توجه به نوع داده متغییر به وجود می&zwnj;آیند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>دسترسی به قابلیت&zwnj;های جدید ECMAScript:&nbsp;</strong>تایپ&zwnj;اسکریپت امکان دسترسی به جدیدترین قابلیت&zwnj;های ECMAScript را می&zwnj;دهد و به شما اجازه می&zwnj;دهد از این ویژگی&zwnj;ها در پروژه خود استفاده کنید و نیاز نیست اصلا نگران اجرا شدن آن&zwnj;ها در مرورگرها باشید چون کدهای تایپ&zwnj;اسکریپت در نهایت به نسخه&zwnj;ای از جاوااسکریپت تبدیل می &zwnj;شود که قابلیت اجرا در مرورگرها را داشته باشند.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">چه هنگام باید از TypeScript استفاده کنیم؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">تا به اینجا متوجه شدم که چرا تایپ&zwnj;اسکریپت مفید است و چگونه می&zwnj;تواند تجربه توسعه ما را ارتقا ببخشد. اما تایپ&zwnj;اسکریپت راه&zwnj;حلی برای همه چیز محسوب نمی&zwnj;شود و قطعاً به خودی خود نمی&zwnj;تواند از کدنویسی بد جلوگیری کند. بنابراین در ادامه نگاهی به جاهایی می&zwnj;اندازیم که قطعاً بهتر است از تایپ&zwnj;اسکریپت استفاده کنیم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>زمانی که کدبیس بزرگی وجود دارد:&nbsp;</strong>تایپ&zwnj;اسکریپت یک ارتقای مهم برای کدبیس های بزرگ محسوب می&zwnj;شود، چون کمک می&zwnj;کند از بروز بسیاری از خطاهای رایج پیشگیری کنیم. این واقعیت به طور خاص در مواردی که توسعه&zwnj;دهندگان زیادی روی پروژه منفرد کار کنند صدق می&zwnj;کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>زمانی که شما و تیم&zwnj;تان از قبل با زبان&zwnj;های دارای نوع&zwnj;بندی استاتیک آشنا باشید:&nbsp;</strong>موقعیت بدیهی دیگری که استفاده از تایپ&zwnj;اسکریپت در آن توصیه می&zwnj;شود هنگامی است که شما و تیم&zwnj;تان با زبان&zwnj;های دارای نوع&zwnj;بندی استاتیک مانند جاوا و C# آشنا باشید و نخواهید از روش نگارش کدهای جاوااسکریپت استفاده کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">تایپ&zwnj;اسکریپت کامپایل می&zwnj;شود</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">زمانی که شما پروژه&zwnj;ای خود را با TypeScript توسعه می&zwnj;دهید. شاید تصور کنید که باید به همان شکل کدها را در مرورگر یا هر جای دیگر اجرا کرد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اما اینطور نیست مرورگرها قابلیت اجرای کدهای TypeScript را ندارند و کدهای شما در نهایت باید به نسخه&zwnj;ای جاوااسکریپت تبدیل شود تا شما بتوانید به سادگی کدهای خود را در مرورگرها و یا جاهای دیگر اجرا کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در دوره <strong>آموزش تایپ&zwnj;اسکریپت</strong> ما سعی می&zwnj;کنیم دقیقا این پروسه کامپایل شدن&zwnj; کدهای تایپ&zwnj;اسکریپت به جاوااسکریپت را به شکل دقیق به شما آموزش دهیم.</p>\r\n\r\n<h2 dir=\"rtl\" style=\"text-align:justify\"><img alt=\"\" src=\"https://blog.theodo.com/static/ba2166b279b234c4824d1c2fb299ced2/ee604/ts_logo.png\" style=\"height:100%; width:100%\" /></h2>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">برای یادگیری تایپ&zwnj; اسکریپت (TypeScript) باید چه چیز هایی را بدانیم؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای یادگیری TypeScript شما نیاز به این دارید که با خود جاوااسکریپت آشنا باشید. اگر هنوز جاوااسکریپت را یاد نگرفتید شروع یادگیری تایپ&zwnj;اسکریپت به نظر عاقلانه نمی&zwnj;رسد. اما شما می&zwnj;توانید از بخش <strong><a href=\"https://roocket.ir/skills/javascript\">یا</a><a href=\"https://roocket.ir/skills/javascript\">دگیری جاوااسکریپت</a></strong> قدم به قدم ابتدا جاوااسکریپت را فرا بگیرید و در نهایت به هدف اصلی خود یعنی تایپ&zwnj;اسکریپت برسید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">در این دوره آموزشی چه مفاهیمی را یاد خواهید گرفت؟</h4>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">معرفی تایپ&zwnj;اسکریپت و شیوه راه&zwnj;اندازی آن</li>\r\n	<li style=\"text-align:justify\">آشنایی با انواع داده&zwnj;ای در تایپ&zwnj;اسکریپت</li>\r\n	<li style=\"text-align:justify\">آشنایی با توابع و کلاس&zwnj;ها در تایپ&zwnj;اسکریپت</li>\r\n	<li style=\"text-align:justify\">آشنایی با متدهای مختلف در تایپ&zwnj;اسکریپت</li>\r\n	<li style=\"text-align:justify\">و...&nbsp;</li>\r\n</ul>\r\n</div>', '1', '0', 'نقدی', '2023-07-23 03:15:21', '2023-08-19 06:08:33'),
(6, 'آموزش لاراول', 'learn-laravel', '1', '0', NULL, '1690229116.png', '8', '<p dir=\"rtl\" style=\"text-align:justify\">در کنار زبان&zwnj;های برنامه&zwnj;نویسی مختلف، ابزارهای مختلفی برای ایجاد و طراحی وبسایت&zwnj;ها وجود دارد که بخش اعظمی از آن&zwnj;ها شامل فریمورک&zwnj;ها می&zwnj;شود. در این بین&nbsp;<strong>فریمورک </strong><strong>لاراول</strong> یکی از محبوب&zwnj;ترین و بهترین فریمورک&zwnj;های حال حاضر برای<strong> <a href=\"https://roocket.ir/series/learning-php\">زبان PHP</a></strong> است که هم در ایران و هم در خارج از ایران علاقه&zwnj;مندان بسیار زیادی دارد. در روزهای حال حاضر هر توسعه&zwnj; دهنده&zwnj;ای PHP بدون شک نیاز به<strong> آموزش لاراول</strong> و <strong>فراگیری لاراول</strong> دارد. ما در دوره <strong>آموزش لاراول</strong> سعی کرده&zwnj;ایم شما را با معماری لاراول به شکل کاملا صحیحی آشنا کنیم</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">لاراول به عنوان بهترین فریمورک PHP انتخاب شده است</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>لاراول </strong>به عنوان یکی از فریمورک&zwnj;های پیشرو PHP، همیشه برتری خود را در بین دیگر رقبای خود حفظ کرده است. محبوبیت این فریمورک به دلیل سادگی و مختصر بودن، در جامعه توسعه&zwnj;دهندگان بسیار زیاد است. همچنین کامیونیتی لاراول با ایجاد مستندات خوب دیگران را قادر به پیوستن به منابع آن می&zwnj;کند و با این کار به بهبود <strong>لاراول</strong> کمک می&zwnj;کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">می&zwnj;توان گفت ما در دوره <strong>آموزش لاراول</strong> سعی کردیم بهترین فریمورک PHP را به شکل کاربردی به شما آموزش دهیم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">فریمورک لاراول یکی از مواردی است که بسیار در دنیای برنامه&zwnj;نویسی مورد جستجو قرار می&zwnj;گیرد و بازار خود را به عنوان یک فریمورک برتر و پیشرو حفظ می&zwnj;کند. از طرفی لاراول برای خود شهرتی به وجود آورده که باعث می&zwnj;شود جامعه فناوری اطلاعات بیشترین توجه را به آن داشته باشند؛ در نتیجه اکثر شرکت&zwnj;های IT ترجیح می&zwnj;دهند پروژه&zwnj;های خود را در این بستر توسعه دهند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر شما یک شرکت توسعه وب هستید که از&nbsp;<strong><a href=\"http://laravel.com\">لاراول</a> </strong>استفاده می&zwnj;کند، به وضوح می&zwnj;توانید پیچیدگی کد را در نحوه عملکرد خود در بازار درک کنید. عملکرد یک کد بسیار پیچیده در زمان پردازش و درخواست&zwnj;ها موجب می&zwnj;شود تا کاربران زمان بیشتری را در انتظار بمانند و یا وبسایت شما را ترک کنند چراکه باعث ناامیدی کاربران می&zwnj;شود. اما با لاراول،&zwnj; به لطف معماری MVC از پیچیدگی کد، کاسته می&zwnj;شود.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">علاوه بر این پس از ایجاد وبسایت خود با لاراول، نه تنها زمان توسعه شما سریع&zwnj;تر می&zwnj;شود بلکه کد نیز تمیز و کارآمدتر خواهد شد. به طور کلی وبسایت توسعه یافته دارای کیفیت و تطبیق&zwnj;پذیری است.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">&nbsp;توسعه&zwnj;دهندگان لاراول را به عنوان بهترین فریمورک PHP در نظر می&zwnj;گیرند و روی آن حساب می&zwnj;کنند</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><img alt=\"\" src=\"https://mat0401.info/wp-content/uploads/2020/06/laravel_logo.png\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">بینش فنی در مورد&nbsp;لاراول</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">به عنوان بخشی از خدمات توسعه وب با لاراول، عملکرد وبسایت نسبتاً بالاتر از همتایان خودش خواهد بود. این به دلیل سیستم Cachingدر لاراول است. Cache Driver تعداد زیادی از مواردی که Cache شده را در فایل سیستم ذخیره می&zwnj;کند؛ و این به شما فرصتی برای توسعه سریع برنامه&zwnj;ها را می&zwnj;&zwnj;دهد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در بازار دقیق امروز، داشتن یک ایده خلاقانه فقط آغاز راه است؛ و این وبسایت شما است که می&zwnj;تواند در رقابت با سایرین شرکت کند و اگر از این مورد دور شوید، شکست خواهید خورد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">تصور کنید که یک پروسه احراز هویت با پیچیدگی کمتر و بازدهی بالاتر داشته باشید؛ خب این دقیقاً چیزی است که لاراول ارائه می&zwnj;دهد. حتی امکان دسترسی به منابع را نیز فراهم می&zwnj;آورد؛ که در نهایت از دسترسی مشتریان غیر مجاز به منابع شما جلوگیری می&zwnj;کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">امروزه نیز مفهوم وبسایت&zwnj;های چند زبانه بسیار رایج است که این مورد هم از طریق پلتفرم لاراول<strong> </strong>امکان&zwnj;پذیر است. یکی از مزایای چنین وبسایت&zwnj;هایی، دسترسی گسترده به چندین بازار به طور همزمان است. به طور کلی، وبسایت توسعه یافته&zwnj;ای که توسط لاراول پشتیبانی می&zwnj;شود، دارای مقیاس پذیری است و این امکان را فراهم می&zwnj;کند تا رفت و آمد بیشتری به وبسایت شرکت یا سازمان شما انجام شود.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">دوره <strong>آموزش لاراول</strong> این بینش را به شما می&zwnj;دهد که لاراول را به عنوان یک فریمورک سریع و کاربردی ببینید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">امنیت اولویت اول و اصلی لاراول است</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر شما یک توسعه دهنده لاراول هستید، احتمالاً می&zwnj;دانید که امنیت در اولویت اول مشتریان و مشاغل مختلف قرار دارد. تصور کنید که یک شرکت تجارت الکترونیکی دارید، در این صورت شما خطراتی که باعث دسترسی غیر مجاز به اطلاعات مشتریان خودتان می&zwnj;شود را کاملاً درک خواهید کرد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><img alt=\"\" src=\"https://mat0401.info/wp-content/uploads/2020/06/laravel_logo.png\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">بنابراین قبل از خداحافظی از رؤیاهای خود، بهتر است به سراغ سکویی بروید که امنیت گسترده را تضمین کند. مهم&zwnj;ترین مزیت لاراول این است که پایه کد شما را از تهدیدات به حداقل یا صفر می&zwnj;رساند و از آن بسیار محافظت می&zwnj;کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>&nbsp;امنیت اولویت اصلی لاراول است</strong>.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>فراگیری لاراول</strong> بدونه دغدغه امنیتی یکی از مزیت&zwnj;های فوق العاده آن است</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">آینده&zwnj;ی لاراول</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">لاراول همچنان به کار خود ادامه می&zwnj;دهد وجایگاه خود را به عنوان یکی از محبوب&zwnj;ترین فریمورک&zwnj;های PHP حفظ خواهد کرد. توسعه وب با لاراول به دلیل سادگی، وضوح و کارایی تقاضای زیادی از طرف جامعه توسعه&zwnj;دهندگان دارد. جامعه برنامه&zwnj;نویسان در سراسر جهان از لاراول حمایت می&zwnj;کنند چرا که به بالا بردن تجربه کدنویسی و زمان توسعه کم&zwnj;تر کمک می&zwnj;کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">استفاده از لاراول در پرو&zwnj;ژه&zwnj;ها چند برابر بیشتر از بقیه فریمورک&zwnj;ها است و بیشتر از سمت مشاغل مختلف پذیرفته می&zwnj;شود. همچنین لاراول هر روز در حال پیشرفت است و تقاضای زیادی از سمت توسعه&zwnj;دهندگان در سرتاسر جهان دارد و بنابراین جامعه خود را قادر می&zwnj;سازد تا در سال&zwnj;های متمادی به پیشرفت برسد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">توسعه وب با لاراول به شما در ساخت وبسایت&zwnj;های متنوع کمک می&zwnj;کند.</p>', '1', '0', 'رایگان', '2023-07-23 03:28:25', '2023-08-19 06:08:36');
INSERT INTO `courses` (`id`, `title`, `slug`, `author`, `price`, `sale_price`, `image`, `category`, `description`, `status`, `course_status`, `type`, `created_at`, `updated_at`) VALUES
(7, 'دوره جامع react js', 'دوره-جامع-react-js', '1', '569000', NULL, '1691741348.png', '11', '<h4 dir=\"rtl\" style=\"text-align:justify\">Reactjs چیست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>Reactjs</strong>&nbsp;به عنوان یک ابزار جاوااسکریپتی با هدف ایجاد وبسایت&zwnj;های SPA شناخته می&zwnj;شود که شما با استفاده از آن می&zwnj;توانید خیلی راحت چنین وبسایت&zwnj;های ایجاد کنید. در دوره<strong>&nbsp;آموزش Reactjs&nbsp;</strong>ما سعی داریم شما را قدم به قدم با این ابزار جذاب آشنا کنیم و به شما یاد دهیم که چطور می&zwnj;توان از&nbsp;<strong>React&nbsp;</strong>برای ایجاد وبسایت&zwnj;های SPA استفاده کرد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">React یک کتابخانه است یا فریمورک؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای درک اینکه React یک کتابخانه است یا فریمورک در قدم اول شما باید مقداری با تعریف هر کدام از این دو آشنا باشید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>کتابخانه</strong>: مجموعه&zwnj;ای از&nbsp;<strong>کدها</strong>&nbsp;که برای هدف خاصی مورد استفاده قرار می&zwnj;گیرند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>فریمورک</strong>:&zwnj; مجموعه&zwnj;ای از&nbsp;<strong>کتابخانه&zwnj;ها</strong>&nbsp;که با&nbsp;<strong>معماری</strong>&nbsp;خاصی در کنار هم قرار می&zwnj;گیرند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">احتمالا با خواندن تعریف هر کدام از این دو متوجه خواهید شد که تفاوت&zwnj; این دو چیست. اما حالا ما در دوره&nbsp;<strong>آموزش Reactjs</strong>&nbsp;کار با یک کتابخانه را یاد می&zwnj;گیریم یا فریمورک را؟</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در جواب این سوال باید گفت که React به تنهایی یک کتابخا&zwnj;نه است و با هدف ایجاد ظاهر یک وبسایت در قالب کدهای جاوااسکریپتی ایجاد شده اما زمانی که در کنار کتابخانه&zwnj;های دیگر قرار بگیرد شما می&zwnj;توانید از آن برای ایجاد وبسایت&zwnj;های SPA خود استفاده کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">برای یادگیری React.js باید چه چیزهایی را بدانیم؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای&nbsp;<strong>آموزش React&nbsp;</strong>شما قطعا باید با جاوااسکریپت آشنا باشید و با آن کار کرده باشید. بخاطر اینکه React یک کتابخانه جاوااسکریپتی محسوب می&zwnj;شود و عدم آشنایی با جاوااسکریپت مشکل اساسی در استفاده از&nbsp;<a href=\"https://reactjs.org/\">React.js</a>&nbsp;محسوب می&zwnj;شود. اگر تا الان جاوااسکریپت را هنوز یاد نگرفته&zwnj;اید پیشنهاد می&zwnj;کنیم در قدم اول دوره&nbsp;<a href=\"https://roocket.ir/skills/javascript\"><strong>آموزش</strong>&nbsp;<strong>جاوااسکریپت</strong></a>&nbsp;را مشاهده کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">چرا باید React.js&nbsp;را از مجموعه راکت یاد بگیرید؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">ما در راکت سعی کرد&zwnj;ه&zwnj;ایم به شکل کامل و کاربردی کتابخانه Reactjs را برای ایجاد راحت&zwnj;تر وبسایت&zwnj;های SPA به شما آموزش دهیم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در کنار آموزش اکثر سرفصل&zwnj;های این کتابخانه با مثال&zwnj;های مختلف ما سعی می&zwnj;کنیم در کل پروسه یادگیری در کنار شما باشیم و در صورت داشتن سوال یا مشکل به شما کمک کنیم تا سوالات و مشکلات خود را حل کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">این دوره ویژه چه کسانی هست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">این دوره ویژه افرادی است که با جاوااسکریپت کاملا آشنا هستند و تصمیم دارند به شکل راحت&zwnj;تری وبسایت&zwnj;های spa ایجاد کنند برای همین به دنبال یادگیری react هستند</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">قطعا دوره<strong>&nbsp;آموزش Reactjs</strong>&nbsp;می&zwnj;تواند به شما در یادگیری React.js و ایجاد وبسایت&zwnj;های SPA کمک کند.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">پس از اتمام دوره چه چیزهایی کسب می&zwnj;کنید؟</h4>\r\n\r\n<ul dir=\"rtl\">\r\n	<li style=\"text-align:justify\">\r\n	<p>پشتیبانی و پاسخ به پرسش های شما</p>\r\n	</li>\r\n	<li style=\"text-align:justify\">کسب امتیاز و اعتبار برای شرکت در دوره های دیگر</li>\r\n	<li style=\"text-align:justify\">دریافت آپدیت های دوره به صورت مادامالعمر (در صورت خریداری نقدی این دوره)</li>\r\n	<li style=\"text-align:justify\">توانایی کسب درآمد و گرفتن پروژه های واقعی</li>\r\n</ul>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">سرفصل&zwnj;های دوره آموزش Reactjs</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><img alt=\"\" src=\"https://s8.uupload.ir/files/reactjs-nedir-2019-06-24-091546-0_71i.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">نصب و راه&zwnj;اندازی</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در ابتدا دوره&nbsp;<strong>آموزش Reactjs</strong>&nbsp;ما سعی می کنیم روش نصب و راه&zwnj;اندازی کامل پروژه react را قدم به قدم و کامل به شما آموزش دهیم.</p>\r\n\r\n<h3 dir=\"rtl\" style=\"text-align:justify\">آشنایی با موارد پایه و syntax</h3>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">آشنایی با syntax و موارد پایه react مسئله&zwnj; مهمی است که در این بخش مواردی که برای شروع کار با react نیاز دارید را به شکل کامل به شما آموزش خواهیم داد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">لیست&zwnj;ها و شروط</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">لیست&zwnj;ها و شروط در هر پروژه&zwnj;ای frontend بسیار مهم است. در این بخش از&nbsp;<strong>آموزش Reactjs</strong>&nbsp;سعی میکنم روش پیاده&zwnj;سازی کردن لیست&zwnj;ها و شروط در template را قدم به قدم به شما آموزش دهم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">استایل&zwnj;ها در کامپوننت&zwnj;</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اینکه بتوانید به HTML خود در قالب کاموپننت استایل&zwnj;های CSS مورد نظر خود را اعمال کنیم مسئله مهمی است که در این بخش روش پیاده&zwnj;سازی استایل در کامپوننت&zwnj;ها را دقیقا به شما آموزش خواهم داد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">بوت&zwnj;استرپ در React</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">از دیدگاه من استفاده از بوت&zwnj;استرپ به شکل معمول در React اصلا عاقلانه نیست. اما اینکه چرا عاقلانه نیست و به جای آن باید چیکار کرد را در این بخش از دوره آموزش Reactjs قدم به قدم به شما آموزش خواهم داد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">چرخه&zwnj;زندگی کامپوننت&zwnj;ها</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">هر کامپوننت در React دارای یک چرخه زندگی دایره&zwnj;واری است که در این جلسه به شکل کامل این چرخه زندگی را مورد بررسی قرار می&zwnj;دهیم تا شما بتوانید با استفاده از این چرخه زندگی اپلیکیشن&zwnj;های پیشرفته&zwnj;تری را ایجاد کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">پروژه لیست Todo</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">یک پروژه، برای یادگیری بهتر هر ابزاری لازم است در این دوره هم این قاعد حاکم است و ما در این بخش از دوره&nbsp;<strong>آموزش Reactjs</strong>&nbsp;یک پروژه todo را پیاده&zwnj;سازی میکنیم تا شما بتوانید در قالب این پروژه مطالب جلسات قبل را بهتر فرا بگیرید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">آشنایی با Context و Reducer</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">با بزرگتر شدن پروژه react مدیریت بر روی state ها سخت&zwnj;تر می&zwnj;شود. در این بخش شما را با امکانی در react آشنا میکنم که بتوانید این state ها را مدیریت کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">درخواست HTTP و Firebase</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">زمانی که تصمیم بگیرید یک اپلیکیشن SPA بسازید برای ارتباط با &zwnj;Back-End پروژه باید از APIها استفاده کنید در این بخش روش استفاده از درخواست&zwnj;های HTTP برای ارتباط با API را به شما آموزش خواهم داد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">کار با React Router</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">تا این بخش از<strong>&nbsp;آموزش Reactjs</strong>&nbsp;ما تنها در یک صفحه کدهای خود را پیاده&zwnj;سازی کرده&zwnj;ایم اما اگر تصمیم بگیرید که یک اپلیکیشن بزرگ&zwnj;تر ایجاد کنید باید صفحات دیگری هم به پروژه اضافه کنیم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای اینکار نیاز به کتابخانه مکملی با عنوان React-router دارید که در این بخش روش کامل استفاده از آن را به شما آموزش خواهم داد.</p>', '1', '0', 'نقدی', '2023-08-11 04:39:08', '2023-08-28 06:11:19'),
(9, 'آموزش tailwindcss', 'آموزش-tailwindcss-13', '1', '200000', '100000', '1692437033.jpg', '13', '<p style=\"text-align:justify\">یکی از بزرگ&zwnj;ترین مشکلات استفاده از&nbsp;CSS&nbsp;خام زمان&zwnj;بر بودن بهره&zwnj;گیری از آن است. درست است که ما می&zwnj;توانیم همه چیز را به دقیق&zwnj;ترین روش ممکن پیاده&zwnj;سازی کنیم اما اگر عجله داشته باشیم و بخواهیم که در مدت زمان سریع&zwnj;تری ویژگی&zwnj;های مورد نظرمان را پیاده&zwnj;سازی کنیم چه؟&nbsp;در این صورت شما به یک فریمورک نیاز دارید. اما آیا هر فریمورکی می&zwnj;تواند کارایی لازم را برای شما داشته باشد؟ خیر! فریمورک&zwnj;هایی که به ما در استفاده کردن از&nbsp;CSS&nbsp;کمک می&zwnj;کنند بسیار زیاد بوده و هر کدام با مزایا و معایبی دست و پنجه نرم می&zwnj;کنند. یکی از بزرگ&zwnj;ترین عیب&zwnj;های بیشتر فریمورک&zwnj;ها سریع نبودن&zwnj;شان در امر پیاده&zwnj;سازی&zwnj;ست. برای حل این مشکل ما باید با تک تک این فریمورک&zwnj;ها کار کنیم و در نهایت پس از گذراندن چند ماه متوجه شویم که کدام مورد از کدام مورد دیگر بهتر است! خب این مسئله زمان&zwnj;بر و حوصله سربری است. اما از آنجا که خوشبختانه وبسایت آموزشی راکت حضور دارد ما می&zwnj;توانیم به شما این راهنمایی لازم را بدهیم. به صورت ساده اگر بخواهم بگویم: سریع&zwnj;ترین و دقیق&zwnj;ترین فریمورکی که با آن می&zwnj;توانید لایه&zwnj;بندی المان&zwnj;های وبسایت&zwnj;تان را با آن پیاده&zwnj;سازی کنید&nbsp;Tailwind CSS&nbsp;است. فریمورکی تازه کار اما با ویژگی&zwnj;های بسیار جذاب.</p>\r\n\r\n<p style=\"text-align:justify\">در این دوره آموزشی در وبسایت راکت قصد داریم شما را با این فریمورک عالی به خوبی آشنا کرده و در فرایند یک پروژه تک-صفحه&zwnj;ای از آن استفاده کنیم. مطمئنا دوره جذابی خواهد بود. اما پیش از آن بیایید کمی با این فریمورک و قابلیت&zwnj;های آن آشنایی پیدا کنیم.</p>\r\n\r\n<h4 style=\"text-align:justify\">Tailwind CSS&nbsp;چیست؟</h4>\r\n\r\n<p style=\"text-align:justify\">Tailwind CSS&nbsp;یک فریمورک مبتنی بر ایده&nbsp;utility-first&nbsp;است که در مدت کوتاهی توانسته طرفداران بسیار زیادی را پیدا کرده و محبوبیت بالایی را کسب کند. دادن قابلیت توسعه سریع به افراد برای طراحی و توسعه رابط کاربری یکی از دلایل بالا رفتن این میزان محبوبیت شده است.</p>\r\n\r\n<p style=\"text-align:justify\">Tailwind&nbsp;یک فریمورک&nbsp;CSS&nbsp;است که برای اولین بار در سال ۲۰۱۹ منتشر شد. در حال حاضر (سال ۲۰۲۱) نسخه ۲.۲ این فریمورک منتشر شده و بنابر آماری که خود&nbsp;Tailwind CSS&nbsp;ارائه می&zwnj;دهد بیش از ۲۶۰ هزار توسعه&zwnj;دهنده از این فریمورک استفاده می&zwnj;کنند. رسیدن به چنین نقطه&zwnj;ای در کمتر از دو سال بسیار امر مهم و قابل توجهی&zwnj;ست. یکی از دلایل اصلی این امر ویژگی&zwnj;های زیادی است که فریمورک ارائه کرده و آن را برای پروژه&zwnj;های مختلف ایده&zwnj;آل ساخته است.</p>\r\n\r\n<p style=\"text-align:justify\">یکی از تفاوت&zwnj;های اصلی&nbsp;Tailwind CSS&nbsp;با دیگر فریمورک&zwnj;ها دادن قابلیت کنترل کامل روی المان&zwnj;&zwnj;ها و جلوگیری از ایجاد استایل&zwnj;های تکراری است. حال که تا حدی با این فریمورک آشنایی پیدا کردیم بیایید با مزایا و معایب اصلی این فریمورک آشنا شویم.</p>\r\n\r\n<h4 style=\"text-align:justify\">۱- کنترل روی استایل&zwnj;دهی به المان&zwnj;ها</h4>\r\n\r\n<p style=\"text-align:justify\">&nbsp;وقتی بحث به این می&zwnj;رسد که چگونه المان&zwnj;ها را استایل&zwnj;دهی کنیم باید بگویم که&nbsp;Tailwind&nbsp;یک رویه منحصر به فرد را به ما ارائه می&zwnj;دهد.&nbsp;Tailwind&nbsp;یک استایل پیشفرض برای المان&zwnj;ها نداشته و شباهتی در این زمینه با بوت&zwnj;استرپ یا دیگر فریمورک&zwnj;ها ندارد. به همین دلیل شما می&zwnj;توانید کنترل کامل روی ظاهر المان&zwnj;ها داشته باشید.</p>\r\n\r\n<p style=\"text-align:justify\">برای مثال شما می&zwnj;توانید برای هر پروژه از ظاهر متفاوتی استفاده کنید بنابراین&nbsp;Tailwind&nbsp;استایل&zwnj;های مربوط به خود را تحمیل نمی&zwnj;کند.</p>\r\n\r\n<h4 style=\"text-align:justify\">۳. رسپانسیو بودن و امنیت بالا در زمان اجرا</h4>\r\n\r\n<p style=\"text-align:justify\">تمام المان&zwnj;ها و استایل&zwnj;های مربوط به&nbsp;Tailwind&nbsp;بصورت رسپانسیو شده به شما ارائه می&zwnj;شود به همین دلیل این فریمورک از میزان رسپانسیو و&nbsp;Mobile-First&nbsp;بودن بالایی برخوردار است.</p>\r\n\r\n<p style=\"text-align:justify\">از نظر امنیت نیز باید بگویم که&nbsp;Tailwind&nbsp;نسبت به رقبا در زمان اجرا، از مشکلات کمتری برخوردار بوده و استایل&zwnj;های عجیب و غریب اعمال نخواهد شد.</p>\r\n\r\n<h4 style=\"text-align:justify\">۴. ویژگی&zwnj;های اضافی</h4>\r\n\r\n<p style=\"text-align:justify\"><strong>Tailwind</strong><strong>&nbsp;</strong>بعنوان فریمورکی به حساب می&zwnj;آید که در بخش فرانت-اند وبسایت&zwnj;ها اجرا می&zwnj;شود. به همین دلیل توسعه&zwnj;دهندگان باید انتظارات حداکثری از این فریمورک داشته باشند.&nbsp;Tailwind&nbsp;نیز این انتظارات را به جای خواهد آورد چرا که توسعه&zwnj;دهندگان این فریمورک با دیگر فریمورک&zwnj;های قبل از خود کار کرده و می&zwnj;دانند که چه مشکلاتی را برای توسعه&zwnj;دهندگان ایجاد می&zwnj;کردند و حال آن&zwnj;ها را رفع نموده&zwnj;اند. شما در&nbsp;Tailwind&nbsp;می&zwnj;توانید با استفاده از&nbsp;PurgeCSS&nbsp;کلاس&zwnj;هایی که در پروژه خود مورد استفاده قرار نداده&zwnj;اید را به سادگی حذف کرده و بار وبسایت&zwnj;تان را کم دهید.</p>\r\n\r\n<h4 style=\"text-align:justify\">۱. فقدان کامپوننت&zwnj;های مهم</h4>\r\n\r\n<p style=\"text-align:justify\">اگر با فریمورک&zwnj;هایی مانند بوت&zwnj;استرپ و فاوندیشن کار کرده باشید می&zwnj;دانید که یکسری کامپوننت آماده در این فریمورک&zwnj;ها وجود دارد که استفاده کردن از آن&zwnj;ها به راحتی آب خوردن است. اما در&nbsp;Tailwind&nbsp;خبری از این موضوعات نیست. برای مثال شما کامپوننت منو یا&nbsp;Navbar&nbsp;آماده را نمی&zwnj;توانید در مستندات این فریمورک پیدا کنید. جدای از منوها کامپوننت&zwnj;های بسیار زیاد دیگری نیز وجود داشته که نیاز به پیاده&zwnj;سازی بصورت دستی دارند. اما خبر خوب آن است که ما در این دوره آموزشی قصد داریم روش&zwnj;هایی را برای ایجاد این کامپوننت&zwnj;ها در نظر داشته و آن&zwnj;ها را به شما آموزش دهیم. یکی از دلایلی که چنین کامپوننت&zwnj;هایی در&nbsp;Tailwind&nbsp;حاضر نیستند کم بودن حجم آن و در نتیجه سرعت داشتن در زمان اجراست.</p>\r\n\r\n<h4 style=\"text-align:justify\">۲. مستندسازی</h4>\r\n\r\n<p style=\"text-align:justify\">یکی از بزرگ&zwnj;ترین مشکلات کنونی&nbsp;Tailwind&nbsp;فقیر بودن بخش مستندات آن است. این موضوع در مقابله با دیگر فریمورک&zwnj;های&nbsp;CSS&nbsp;به&zwnj;قدری قابل مشاهده است که شما نمی&zwnj;توانید بخوبی از طریق مستندات با این فریمورک آشنا شوید و حتما نیاز به یک دوره آموزشی دارید که این دوره آموزشی دقیقا همان چیزی&zwnj;ست که شما به آن نیاز دارید.</p>\r\n\r\n<h4 style=\"text-align:justify\">پیش&zwnj;نیازهای یادگیری این دوره آموزشی چیست؟</h4>\r\n\r\n<p style=\"text-align:justify\">برای اینکه بتوانید بیشترین استفاده را از این دوره ببرید نیاز است که با&nbsp;HTML&nbsp;و&nbsp;CSS&nbsp;به خوبی آشنایی داشته باشید. خوشبختانه شما می&zwnj;توانید از طریق دو دوره آموزشی راکت &laquo;<a href=\"https://roocket.ir/series/learn-html\">دوره آموزشی&nbsp;HTML</a>&raquo; و &laquo;<a href=\"https://roocket.ir/series/learn-css\">دوره آموزشی&nbsp;CSS</a>&raquo; در این دو مورد استاد شوید.</p>\r\n\r\n<h4 style=\"text-align:justify\">در این دوره آموزشی چه چیزهایی را یاد خواهید گرفت؟</h4>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">آشنایی اولیه با فریمورک&nbsp;Tailwind CSS</li>\r\n	<li style=\"text-align:justify\">بررسی امکانات، مزایا، معایب و پیش&zwnj;نیازهای آن</li>\r\n	<li style=\"text-align:justify\">پیاده&zwnj;سازی و نصب در محیط سیستم&zwnj;عامل</li>\r\n	<li style=\"text-align:justify\">گرفتن خروجی از آن در قدم&zwnj;های اول</li>\r\n	<li style=\"text-align:justify\">آشنایی با فایل&zwnj;های مربوط به پیکربندی و بهینه&zwnj;سازی</li>\r\n	<li style=\"text-align:justify\">آشنایی با تایپوگرافی</li>\r\n	<li style=\"text-align:justify\">شخصی سازی کلاس ها</li>\r\n	<li style=\"text-align:justify\">استفاده از&nbsp;flexbox</li>\r\n	<li style=\"text-align:justify\">اضافه کردن&nbsp;autocomplete&nbsp;به&nbsp;vscode</li>\r\n	<li style=\"text-align:justify\">آشنایی با کلاس های&nbsp;responsive</li>\r\n	<li style=\"text-align:justify\">آشنایی با&nbsp;variant&nbsp;ها</li>\r\n	<li style=\"text-align:justify\">و ده&zwnj;ها مورد مربوطه دیگر</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">اگر در رابطه با این دوره آموزشی سوالاتی را در ذهن دارید پیش از مطرح کردن&zwnj;شان نگاهی به سوالات متدوال زیر بیاندازید. در صورتی که پاسخ واضحی پیدا نکردید در قسمت نظرات آن را با ما به اشتراک بگذارید تا بتوانیم بهتر به شما پاسخ دهیم.</p>', '1', '0', 'نقدی', '2023-08-19 05:53:53', '2023-09-01 14:24:16'),
(10, 'آموزش HTML', 'آموزش-HTML-رایگان', '1', '0', NULL, '1692437540.jpg', '13', '<p dir=\"rtl\" style=\"text-align:justify\">HTML&nbsp;به عنوان یک زبان نشانه&zwnj;گذاری شناخته می&zwnj;شود که به شما اجازه می&zwnj;دهد ساختار یک صفحه وب را به شکلی که مد نظر دارید ایجاد کنید. ما در دوره&nbsp;<strong>آموزش HTML&nbsp;</strong>سعی کرده&zwnj;ایم خیلی ساده و سریع و رایگان این زبان نشان&zwnj;گذاری را به شکل کامل به شما آموزش دهیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">HTML چیست&zwnj;؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اولین قدم در&nbsp;<strong>آموزش HTML&nbsp;</strong>این است که بدانیم تعریف این زبان چیست؟ HTML یک زبان برنامه&zwnj;نویسی نیست؛ بلکه یک زبان نشانه&zwnj;گذاری است که ساختار محتوای شما را تعریف می&zwnj;کند. HTML شامل مجموعه&zwnj;ای از عناصر ( elements ) می&zwnj;شود که با استفاده از آن شما می&zwnj;توانید ساختار یک صفحه وب را مشخص می&zwnj;کنید تا در قدم بعدی بتوانید به آن ظاهر مناسبی به آن دهید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای مثال شما میخواهید مشخص کنید در مکان x از صفحه وب یک لیست قرار بگیرد یا یک فرم یا یک لینک و یا هر چیز دیگر که اینکار با استفاده از HTML به سادگی قابل انجام است.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">نسخه&zwnj;های مختلف HTML</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">تا الان نسخه&zwnj;های متفاوتی از HTML منشر شد، که در زیر لیست این ورژن&zwnj;ها را می&zwnj;توانید مشاهده کنید.</p>\r\n\r\n<ul dir=\"rtl\">\r\n	<li style=\"text-align:justify\">HTML در ابتدا در سال ۱۹۹۱ منتشر شد.</li>\r\n	<li style=\"text-align:justify\">HTML 2.0 در ۱۹۹۵ منتشر شد.</li>\r\n	<li style=\"text-align:justify\">HTML 3.2 در ۱۹۹۷ منتشر شد.</li>\r\n	<li style=\"text-align:justify\">HTML 4.01 در ۱۹۹۹-۲۰۰۰ منتشر شد.</li>\r\n	<li style=\"text-align:justify\">و HTML5 که آخرین و پیشرفته&zwnj;ترین نسخه از HTML است را در سال ۲۰۱۴ منتشر کردند.</li>\r\n</ul>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">هدف دوره&nbsp;<strong>آموزش HTML</strong>&nbsp;در ابتدا این است که شما را با مبانی HTML (که تقریبا در تمام نسخه&zwnj;ها یکی است) و پس با مفاهیم پیشرفته و جدید HTML5 آشنا کند.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">HTML5&nbsp;چیست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">HTML5 را می&zwnj;توانیم به عنوان آخرین ورژن HTML که در سال 2014 ارائه شد دانست. در این ورژن از HTML شما دارای عناصر، ویژگی&zwnj;ها و رفتارهای جدیدی هستید که با استفاده از آن&zwnj;ها می&zwnj;توانید ساختار&zwnj;های بهتری را برای وبسایت خود ایجاد کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">مواردی که به HTML5 اضافه شده در راستای درک بهتر سند HTML است به شکلی که با نگاه به بخش&zwnj;های مختلف کد HTML بتوانید درک کنید آن بخش با چه هدفی ساخته شده است.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">ما در دوره آموزش HTML سعی کرده&zwnj;ایم به خوبی موارد مختلف HTML و HTML5 را به شما آموزش دهیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">برای آموزش HTML باید چه چیزهایی را بدانیم؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">شما برای یادگیری HTML از طریق این دوره به مقدار زیادی اشتیاق به یادگیری و پیشرفت، با چاشنی اراده و اندکی تصمیم به ورود به دنیای طراحی وب دارید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">به غیر این موارد پیش&zwnj;نیاز به خصوصی برای شروع کار با HTML وجود ندارد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">آموزش HTML ویژه چه کسانی هست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">دوره آموزش HTML مربوط به افرادی می&zwnj;شود که تصمیم دارند طراحی وب یاد بگیرند. در اصل باید گفت یادگیری HTML اولین قدم برای یادگیری طراحی وب است که باید با دقت این قدم را بردارید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">در این دوره آموزشی چه مفاهیمی را یاد خواهید گرفت؟</h4>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<p>معرفی و آشنایی با HTML</p>\r\n	</li>\r\n	<li style=\"text-align:justify\">آشنایی با ساختار تگ&zwnj;ها</li>\r\n	<li style=\"text-align:justify\">معرفی پر استفاده&zwnj;ترین تگ&zwnj;های اولیه</li>\r\n	<li style=\"text-align:justify\">آشنایی با وب معنایی</li>\r\n	<li style=\"text-align:justify\">یادگیری HTML5 و معرفی آن</li>\r\n	<li style=\"text-align:justify\">و...&nbsp;</li>\r\n</ul>', '1', '0', 'رایگان', '2023-08-19 05:57:41', '2023-08-28 06:08:17'),
(11, 'آموزش CSS', 'آموزش-CSS-رایگان', '1', '0', NULL, '1692437460.jpg', '13', '<p dir=\"rtl\" style=\"text-align:justify\">CSS یا Cascading Style Sheets یک زبان برنامه&zwnj;نویسی نیست!&zwnj; پس چیست؟ باید گفت CSS یک زبان نشانه&zwnj;گذاریست که با استفاده از آن &zwnj;می&zwnj;توانید وبسایت&zwnj;های با ظاهر فوق&zwnj; العاده ایجاد کنید. ما در دوره آموزش CSS سعی داریم که CSS را به شکل ساده و قدم به قدم و به شکل کامل به شما آموزش دهیم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\"><strong>یادگیری CSS&nbsp;</strong>بسیار ساده&zwnj; است و تنها نیاز به کمی حوصله و تمرین دارد. در ادامه این مطلب کمی در مورد این دوره و خود بحث CSS صحبت خواهیم کرد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">CSS چیست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر اسکلت بدن انسان را HTML در نظر بگیریم، CSS را می&zwnj;توان گوشت، پوست و مو در نظر گرفت که به ظاهر انسان شکل می&zwnj;دهد. این ساده&zwnj;ترین تعریفی است که می&zwnj;تواند از CSS ارائه کرد.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">بدونه شک&nbsp;<a href=\"https://roocket.ir/skills/frontend\"><strong>یادگیری طراحی وب</strong></a>&nbsp;بدونه یادگیری CSS یک عمل امکان ناپذیر است. بنابراین خواه، ناخواه اگر مایل هستید به یک برنامه&zwnj;نویس Front-End تبدیل شوید باید CSS را یاد بگیرید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">تاریخچه CSS</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">CSS در حوالی سال 1996 در HTML 4 معرفی شد تا مشکلات و محدودیت&zwnj;های مختلفی که در HTML 3.2 وجود داشت را تا حدی زیادی برطرف کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">CSS از شروع کار تا الان با ویژگی&zwnj;های جدیدی که در هر نسخه معرفی کرد با نسخه 3 به پختگی نسبتا مناسبی رسید که با استفاده از آن ما می&zwnj;توانیم وبسایت&zwnj;های جذاب و کاربر پسند ایجاد کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">برای یادگیری CSS باید چه چیز هایی را بدانیم؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای یادگیری CSS شما تنها نیاز دارید با HTML آشنا باشید و ویرایشگر کد VSCode را هم مقداری بشناسید. همین کافیست که دوره<strong>&nbsp;آموزش CSS</strong>&nbsp;را شروع کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">در دوره آموزش CSS چه مباحثی را یاد می&zwnj;گیرید؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در دوره آموزش CSS شما تقریبا با ۹۰ درصد از مواردی که در CSS وجود داره با مثال&zwnj;های مختلف آشنا می&zwnj;شوید و در نهایت می&zwnj;توانید با مواردی که یاد گرفتید وبسایت مورد نظر خود را شکل دهید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">ابزار های مورد نیاز برای شرکت در این دوره</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">شما برای شرکت در این دوره به مقدار زیادی اشتیاق به یادگیری و پیشرفت، با چاشنی اراده و اندکی تصمیم به ورود به دنیای برنامه نویسی پیشرفته دارید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">این دوره ویژه چه کسانی هست؟</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">این دوره ویژه افرادیست که قصد یادگیری طراحی وب &zwnj;را دارند، اگر شما مایل هستید وبسایت&zwnj;های با ظاهر جذاب و کاربردی ایجاد کنید، قطعا نیاز دارید در قدم اول CSS را یاد بگیرید. کاری که در این دوره انجام می&zwnj;د&zwnj;هیم این است که به شما کمک کنیم تا CSS را به خوبی یاد بگیرید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">انتخاب &zwnj;کنندها</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">انتخاب کننده&zwnj;ها نقش بسیار اساسی در CSS دارند، اینکه شما بتوانید المنت&zwnj;های خود را به درستی در CSS انتخاب کنید و بعد به آن&zwnj;ها استایل دهید بسیار مهم و ضروری است.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">ما در CSS عنوان مختلف انتخاب کننده داریم که با ترکیب&zwnj; آن&zwnj;ها می&zwnj;توانید المنت&zwnj;های مختلف از صفحه را انتخاب کنید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این بخش از دوره آموزش CSS به شکل کامل و دقیق شما را با انتخاب&zwnj;های CSS آشنا خواهم کرد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">باکس مدل</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">این عنوان ممکن است کمی عجیب باشد اما با دیدن جلسات این بخش خیلی زود متوجه اهمیت باکس مدل در فاصله&zwnj;گذاری و اندازه&zwnj;دهی المنت&zwnj;های یک صفحه از وبسایت خودتان می&zwnj;شوید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">برای مثال فاصله&zwnj;دهی از کنارهای داخلی المنت یا از کنارهای خارجی المنت، از پایین یا بالا ، اندازه کلی المنت و ... .</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">بکگراند و تصاویر</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">ممکن است در یک وبسایت شما قصد داشته باشید از تصاویر در جاهای مختلف به روش&zwnj;های مختلف استفاده کنید. در بخش بکگراند و تصاویر از دوره&nbsp;<strong>آموزش CSS</strong>&nbsp;شما را با خصوصیاتی آشنا می&zwnj;کنیم که بتوانید به شکل حرفه&zwnj;ای تصاویر صفحات وبسایت خودتان را مدیریت کنید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">فونت و متن</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">استایل دادن به فونت&zwnj;ها و متن&zwnj;ها در ظاهر یک وبسایت به شدت تاثیرگذار و کاربردی است. در این بخش به شکل کامل در مورد روش اعمال استایل&zwnj;های CSS بر روی متن&zwnj;ها، موارد مختلفی را به شما آموزش خواهیم داد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">واحد و سایز&zwnj;ها</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">هر فونت، تصویر و المنتی در یک صفحه وب می&zwnj;تواند دارای سایز باشد آن هم سایز&zwnj;های مختلفی در جهات مختلف در CSS . در این بخش قصد داریم شما را با انواع مختلف واحدهای CSS که برای اعمال اندازه استفاده می&zwnj;شود آشنا کنیم.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">از سایز برای margin و padding گرفته تا سایز width و height.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">موقعیت المنت&zwnj;</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">داشتن یک وبسایت با ظاهر مناسب قطعا رابطه مستقیم با مکان قرار گیری المنت&zwnj;های مختلف در یک صفحه دارد، شما با استفاده از CSS می&zwnj;توانید خیلی ساده مکان قرارگیری المنت&zwnj;ها در صفحه را کنترل کنید. در بخش موقعیت مکانی به شکل دقیق این موضوع را به شما آموزش خواهیم داد.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">فرم&zwnj;ها</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">فرم&zwnj;ها در وبسایت&zwnj;های نقش بسیار مهمی در ایجاد وبسایت دارند، بخاطر اینکه این فرم&zwnj;ها هستند که با کاربران تعامل دارند، پس داشتن فرم&zwnj;های با استایل&zwnj;های زیبا و کاربردی به همراه تجربه کاربری مناسب &zwnj;می&zwnj;تواند به وبسایت شما کمک کند که تعامل راحت و خوشایندی را به کاربران نهایی خود دهید.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">رسپانسیو کردن وبسایت</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">صفحه&zwnj;نمایش&zwnj;های با اندازه&zwnj;های مختلف امروزه جز جدایی ناپذیر زندگی ما شده&zwnj;اند از موبایل&zwnj;ها گرفته تا تبلت و لپ تاپ که هر کدام در هر مدل دارای سایز صفحه نمایش متفاوت هستند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اگر شما وبسایتی را طراحی کنید و با CSS به آن استایل دهید اما به رسپانسیو بودن صفحه&zwnj;هات خود نسبت به این صفحه نمایش&zwnj;ها بی توجه باشید عملا وبسایتی بسیار بد را بوجود آوردید.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">که تنها در یک ابزار با صفحه نمایش خاص ظاهر مناسبی دارد. در این بخش از دوره آموزش CSS ما سعی کردیم در مورد رسپانسیو کردن وبسایت در پروژه&zwnj;های واقعی صحبت کنیم و آن را به شما آموزش دهیم.</p>\r\n\r\n<h4 dir=\"rtl\" style=\"text-align:justify\">انیمیشن و انتقال</h4>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">اعمال انیمیشن&zwnj;های مختلف در یک صفحه وب می&zwnj;تواند به تجربه کاربری بهتر کاربران شما در مرور آن صفحات کمک بسیار زیادی کند.</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">در این بخش به شما یاد میدهیم که چطور تنها با استفاده از CSS انمیشن بسازید و در صفحه وب خود از آن استفاده کنید</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">و... .</p>\r\n\r\n<p dir=\"rtl\" style=\"text-align:justify\">بخش&zwnj;های بیشتر دیگری در این دوره وجود دارد که پیشنهاد میکنیم کمی به پایین اسکرول کنید تا بتوانید به شکل کامل با بخش&zwnj;های و قسمت&zwnj;های آن به شکل کامل آشنا شوید.</p>', '1', '0', 'رایگان', '2023-08-19 06:01:00', '2023-12-15 21:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `courses_video`
--

CREATE TABLE `courses_video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('رایگان','نقدی') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses_video`
--

INSERT INTO `courses_video` (`id`, `course_id`, `video_url`, `video_time`, `type`, `description`, `created_at`, `updated_at`) VALUES
(5, 1, '1684600093616d697262697a792e6972.mp4', '15:33', 'رایگان', '<p>ویدیوی معرفی دوره</p>', '2023-05-20 11:58:13', '2023-05-20 11:58:13'),
(7, 2, '1684696205363834383838.mp4', '16:34', 'رایگان', '<p>معرفی دوره 007</p>', '2023-05-20 12:01:51', '2023-05-22 04:25:10'),
(9, 2, '1684745691313534343237.mp4', '10:31', 'نقدی', '<p>تست</p>', '2023-05-22 04:24:51', '2023-05-22 04:24:51'),
(10, 3, '1686420715363236333533.mp4', '13:54', 'نقدی', '<p>شروع دوره و توضیحات</p>', '2023-06-10 13:08:48', '2023-06-10 13:41:55'),
(11, 3, '1686418767323632363334.mp4', '12:55', 'نقدی', '<p>زبان php چه کاربردی دارد؟</p>', '2023-06-10 13:09:27', '2023-06-10 13:09:27'),
(12, 3, '1686418798363335383133.mp4', '07:44', 'رایگان', '<p>چه شرکت هایی که از زبان php استفاده میکنند؟</p>', '2023-06-10 13:09:58', '2023-06-10 13:09:58'),
(13, 1, '1686420424313737323530.mp4', '17:33', 'نقدی', '<p>لایو وایر چه معماری داره؟</p>', '2023-06-10 13:37:04', '2023-06-10 13:37:04'),
(14, 6, '1690099212333231363934.mp4', '13:45', 'رایگان', '<p>معرفی دوره</p>', '2023-07-23 04:30:12', '2023-07-23 04:30:12'),
(15, 6, '1690099243363030343432.mp4', '16:31', 'رایگان', '<p>کاربرد لاراول در طراحی سایت</p>', '2023-07-23 04:30:43', '2023-07-23 04:31:22'),
(16, 6, '1690099265383431363138.mp4', '19:32', 'رایگان', '<p>پیش نیاز های دوره</p>', '2023-07-23 04:31:05', '2023-07-23 04:31:05'),
(17, 6, '1690099323323730373230.mp4', '20:34', 'رایگان', '<p>نصب لاراول و شروع کد نویسی</p>', '2023-07-23 04:32:03', '2023-07-23 04:32:03'),
(18, 5, '1690099383323930373430.mp4', '05:44', 'رایگان', '<p>معرفی دوره</p>', '2023-07-23 04:33:03', '2023-07-23 04:33:03'),
(19, 5, '1690099414313038353238.mp4', '10:19', 'رایگان', '<p>کاربرد تایپ اسکریپت در فرانت سایت</p>', '2023-07-23 04:33:34', '2023-07-23 04:33:34'),
(20, 5, '1690099462363432313639.mp4', '21:55', 'نقدی', '<p>شروع کد نویسی تایپ اسکریپت</p>', '2023-07-23 04:34:22', '2023-07-23 04:34:22'),
(21, 5, '1690099506373136303336.mp4', '21:33', 'نقدی', '<p>معرفی پروژه <strong>دیجی کالا</strong> این دوره</p>', '2023-07-23 04:35:06', '2023-07-23 04:35:06'),
(22, 4, '1690099717373836323931.mp4', '06:55', 'رایگان', '<p>معرفی دوره و توضیح زبان جاوااسکریپت</p>', '2023-07-23 04:38:37', '2023-07-23 04:38:37'),
(23, 4, '1690099789343638383231.mp4', '14:58', 'رایگان', '<p>نکته مهم ترین زبان برنامه نویسی هر سایتی</p>', '2023-07-23 04:39:49', '2023-07-23 04:39:49'),
(24, 4, '1690099826333234313233.mp4', '16:49', 'نقدی', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>', '2023-07-23 04:40:26', '2024-01-24 00:32:26'),
(25, 4, '1690099864363936353831.mp4', '19:37', 'نقدی', '<p>آرایه ها در جاوااسکریپت</p>', '2023-07-23 04:41:04', '2023-07-23 04:41:04'),
(26, 4, '1690099905343334303639.mp4', '09:56', 'نقدی', '<p>دستور شرطی if و else</p>', '2023-07-23 04:41:45', '2023-07-23 04:41:45'),
(27, 4, '1690099939373431343130.mp4', '11:13', 'نقدی', '<p>دستور شرطی switch و case</p>', '2023-07-23 04:42:19', '2023-07-23 04:42:19'),
(28, 3, '1691740931393733303937.mp4', '00:18', 'نقدی', '<p>vip video</p>', '2023-08-11 04:32:11', '2023-08-11 04:32:11'),
(29, 9, '1692437098363530343930.mp4', '05:00', 'رایگان', '<p>معرفی دوره و پروژه</p>', '2023-08-19 05:54:58', '2023-08-19 05:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(46, '2014_10_12_000000_create_users_table', 1),
(47, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(48, '2014_10_12_100000_create_password_resets_table', 1),
(49, '2019_08_19_000000_create_failed_jobs_table', 1),
(50, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(51, '2023_05_16_070605_add_phone_number_to_users_table', 1),
(52, '2023_05_17_034445_create_category_table', 2),
(53, '2023_05_17_064414_create_permissions_table', 3),
(55, '2023_05_17_142124_create_permission_tables', 4),
(61, '2023_05_17_150003_create_role_table', 5),
(62, '2023_05_18_071014_rename_category_table_to_categories', 6),
(66, '2023_05_19_150331_create_articles_table', 7),
(68, '2023_05_20_062535_create_courses_table', 8),
(70, '2023_05_20_155043_create_courses_video_table', 9),
(71, '2023_05_22_053618_create_ads_table', 10),
(76, '2023_05_24_071534_create_comments_table', 11),
(78, '2023_05_31_095803_create_tickets_table', 12),
(79, '2023_05_31_155646_add_ticket_status_to_tickets_table', 13),
(80, '2023_05_31_164144_add_for_ticket_to_tickets_table', 14),
(86, '2023_06_03_140708_create_carts_table', 15),
(88, '2023_06_06_130250_create_transactions_table', 16),
(90, '2023_06_08_170942_create_web_setting_table', 17),
(92, '2023_06_09_043740_create_coupons_table', 18),
(93, '2023_06_09_172151_create_coupon_for_users_table', 19),
(94, '2023_07_21_072738_add_social_media_to_web_setting_table', 20),
(95, '2023_07_26_103951_add_logo_to_web_setting_table', 21),
(98, '2023_07_31_214655_create_side_course_table', 22),
(99, '2023_07_31_214704_create_side_article_table', 22),
(101, '2023_08_18_023448_create_article_comments_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 10),
(2, 'App\\Models\\Role', 16),
(4, 'App\\Models\\Role', 19),
(4, 'App\\Models\\Role', 22);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(17, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 3),
(22, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('amirbizy@gmail.com', '$2y$10$UjKC7A.bSv0n3bJwtXSuJOdZPwdshubzWcuJTKr.4CsVqAQRWjozS', '2023-06-11 03:41:19'),
('amiri.jefri2@gmail.com', '$2y$10$VN0DlHXIktpE2der/Du2ZOLHJEVaDu0l82gVYYsqChY.ZZpHGwqPq', '2023-06-11 04:41:44'),
('bizylearn@admin.com', '$2y$10$9W6gR/oIhZdbbXkwyBrNKO4XqRYF5mT9tT.SCfGhy6wYRaDpwesKm', '2023-12-02 17:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'writer', 'نویسنده', 'web', '2023-05-17 12:40:18', '2023-05-17 12:40:18'),
(4, 'support', 'پشتیبانی', 'web', '2023-05-17 14:35:39', '2023-05-17 14:35:39'),
(5, 'admin', 'مدیر کل', 'web', '2023-05-17 15:00:28', '2023-05-17 15:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(16, 'writer', 'نویسنده', 'web', '2023-05-17 15:18:50', '2023-05-17 15:18:50'),
(17, 'admin', 'ادمین', 'web', '2023-05-17 15:20:34', '2023-05-19 00:36:35'),
(22, 'support', 'پشتیبانی', 'web', '2023-05-17 15:25:14', '2023-05-17 15:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `side_article`
--

CREATE TABLE `side_article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `side_course`
--

CREATE TABLE `side_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `side_course`
--

INSERT INTO `side_course` (`id`, `course_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 6, '<p style=\"text-align:center\">خرید دامنه از ایران سرور با بهترین قیمت</p>\r\n\r\n<p><img alt=\"خرید دامنه از ایران سرور با بهترین قیمت\" src=\"https://s8.uupload.ir/files/iranserver-banner-design-468dar60_0spb.gif\" style=\"height:100%; width:100%\" /></p>', '2023-08-03 14:04:30', '2023-08-04 06:59:06'),
(3, 6, '<p><a href=\"https://webprog.io/course/آموزش-Laravel\">لاراول</a> یکی از بهترین و محبوب ترین فریمورک های زبان <a href=\"https://webprog.io/course/آموزش-PHP-و-MySQL-پروژه-محور\">php</a> است که برای توسعه نرم افزارهای تحت وب و بر پایه ای معماری <a href=\"https://webprog.io/course/آموزش-PHP-OOP-MVC-پروژه-محور\">MVC</a> ساخته شده.راحتی کار با لاراول و سادگی در یادگرفتن آن در عین پر قدرت بودن و حرفه ای بودن این فریمورک موجب شده تا افراد بسیاری به سوی این فریمورک حرکت کنند و از قدرت آن در پروژه های خود استفاده کنند.</p>\r\n\r\n<p><img alt=\"\" src=\"https://s8.uupload.ir/files/laravel-projects_zpp0.png\" style=\"height:100%; width:100%\" /></p>', '2023-08-03 14:33:03', '2023-08-04 07:03:20'),
(5, 7, '<p><img alt=\"\" src=\"https://s8.uupload.ir/files/meisam-mohammadi_wonc.gif\" style=\"height:100%; width:100%\" /></p>', '2023-08-11 06:04:04', '2023-08-11 06:04:31'),
(6, 7, '<p>بوت کمپ تخصصی برنامه نویسی در اصفهان</p>\r\n\r\n<p><img alt=\"\" src=\"https://s8.uupload.ir/files/بوت_کمپ_اصفهان_7bzt.jpg\" style=\"height:100%; width:100%\" /></p>', '2023-08-11 06:06:56', '2023-08-11 06:06:56'),
(7, 6, '<p>برای درک بهتر از فریمورک لاراول و نگاه تخصصی تر میتوانید از سایت لاراول اقدام کنید</p>\r\n\r\n<p><a href=\"https://laravel.com\" target=\"_blank\">https://laravel.com</a></p>', '2023-08-12 01:46:01', '2023-08-12 01:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE `statement` (
  `id` int(11) NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci,
  `color` enum('green','yellow','red') CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `expire_date` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`id`, `text`, `color`, `expire_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '<p>کد تخفیف 50 درصدی بر روی تمامی دوره ها تا پایان&nbsp;سال 1402 =&nbsp;<strong>bizylearn</strong></p>', 'green', '1402-12-29 23:24:54', '1', '2023-11-03 22:57:38', '2023-12-17 00:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `for_ticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` enum('1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `for_ticket`, `title`, `slug`, `priority`, `description`, `status`, `reply`, `admin_name`, `ticket_status`, `created_at`, `updated_at`) VALUES
(62, 3, '16856822022352896316576185067', 'اضافه کردن اپشن به سایت', '16856822022352896316576185067', '2', 'با سلام خدمت شما. یک پیشنهادی داشتم اینه که ماژول تغییر ایمیل رو هم در سایت قرار بدید خیلی خوب میشه. ممنون از سایت خوبتون', '1', NULL, NULL, '0', '2023-06-02 00:33:22', '2023-06-05 11:17:25'),
(63, 1, '16856822022352896316576185067', NULL, NULL, NULL, 'سلام و عرض ادب خدمت شما دوست عزیز. تشکر از پیشنهادتون ما هم قصد همینکار رو داشتیم. در اپدیت های بعدی وبسایت این مورد اضافه میگردد', '1', '1', 'AmirBizyPro - ( ادمین )', '1', '2023-06-02 00:36:45', '2023-06-02 00:36:45'),
(64, 3, '16856822022352896316576185067', NULL, '16856822022352896316576185067', NULL, 'ممنون از پیگیری و پاسخگویی سریعتون. واقعا عالی میشه اگر این مورد اضافه بشه', '1', NULL, NULL, '1', '2023-06-02 00:40:37', '2023-06-02 00:40:37'),
(65, 1, '16856822022352896316576185067', NULL, NULL, NULL, 'خواهش میکنم. موفق و پیروز باشید', '1', '1', 'AmirBizyPro - ( ادمین )', '1', '2023-06-02 00:41:36', '2023-06-02 00:41:36'),
(66, 3, '16856822022352896316576185067', NULL, '16856822022352896316576185067', NULL, 'بعد ببخشید من یه سوال داشتم', '1', NULL, NULL, '1', '2023-06-02 00:47:46', '2023-06-02 00:47:46'),
(67, 3, '16856822022352896316576185067', NULL, '16856822022352896316576185067', NULL, 'میخواستم بدونم توسعه دهنده این وبسایت خفن کی هست؟', '1', NULL, NULL, '1', '2023-06-02 00:48:18', '2023-06-02 00:48:18'),
(68, 1, '16856822022352896316576185067', NULL, NULL, NULL, 'جناب امیررضا جعفری توسعه دهنده این وبسایت هستند', '1', '1', 'AmirBizyPro - ( ادمین )', '1', '2023-06-02 00:48:57', '2023-06-02 00:48:57'),
(69, 3, '16856822022352896316576185067', NULL, '16856822022352896316576185067', NULL, 'سلام مهندس این تیکت رو ببندید تشکر', '1', NULL, NULL, '1', '2023-06-05 11:16:47', '2023-06-05 11:16:47'),
(70, 1, '16856822022352896316576185067', NULL, NULL, NULL, 'اوکیه', '1', '1', 'AmirBizyPro - ( ادمین )', '1', '2023-06-05 11:17:10', '2023-06-05 11:17:10'),
(71, 1, '16994301468049528883294737631', 'خرید دوره', '16994301468049528883294737631', '2', 'سلام عرض ادب خدمت شما. ببخشید در دوره php mvc پروژه فروشگاهی ام پیاده سازی میشه یا خیر؟', '1', NULL, NULL, '0', '2023-11-08 11:25:46', '2023-11-08 11:29:43'),
(72, 1, '16994301468049528883294737631', NULL, NULL, NULL, 'سلام و درود دوست عزیز. بله \r\nموفق باشید', '1', '1', 'Amirreza Jafari - ( ادمین )', '1', '2023-11-08 11:27:20', '2023-11-08 11:27:20'),
(73, 1, '16994301468049528883294737631', NULL, '16994301468049528883294737631', NULL, 'تشکر از پاسخگویی سریع شما', '1', NULL, NULL, '1', '2023-11-08 11:28:23', '2023-11-08 11:28:23'),
(74, 1, '16994301468049528883294737631', NULL, NULL, NULL, 'خواهش میکنم دوست عزیز', '1', '1', 'Amirreza Jafari - ( ادمین )', '1', '2023-11-08 11:29:11', '2023-11-08 11:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(25, 1, 5, 1, '2023-07-24 05:59:09', '2023-08-05 05:38:31'),
(26, 1, 2, 1, '2023-07-24 15:24:39', '2023-08-05 03:03:09'),
(27, 3, 5, 1, '2023-08-04 16:23:25', '2023-08-05 03:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `profile`, `permission`, `status`, `ip`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amirreza Jafari', 'bizylearn@admin.com', NULL, '1693563278384973.jpg', '0', 1, NULL, '2023-08-12 02:10:37', '$2y$10$HfdhdiizOB.yYY6A2cNVAOx9pyHgeJVgfodo3uyAPQW5RRwVMYDJm', 'PgN4caS7l2QnSy5TcTVqcsyyvmunk80ycQh7MmGUKxkoiaDIhYtUMGWG77Oy', '2023-05-16 12:14:22', '2024-01-23 21:53:57'),
(3, 'Writer', 'bizylearn@writer.com', NULL, '1685082394723195.jpg', '3', 1, NULL, '2023-08-12 02:10:11', '$2y$10$lgzHlcgCrapf0Ej.IThptOQnczQUiYG0JWsQ/QnBsTViIidND06JW', 'O7Tf6hU7jwLxz2NQvJiZm0iM29ePmUZG31ieSuTOIocXFVzdsn90f0P2NqWX', '2023-05-16 12:43:43', '2023-08-12 02:10:11'),
(10, 'Support', 'bizylearn@support.com', NULL, '1692218731937998.jpg', '0', 1, '127.0.0.1', '2023-08-18 04:37:32', '$2y$10$.TFnUP9eR0pxpzaIsrEJ5.wRfpXuC/YDJFBqBpzM7yVvNLyTEzXqy', NULL, '2023-05-26 10:59:35', '2023-08-18 04:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_image` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`id`, `description`, `address`, `email`, `phone`, `instagram_link`, `github_link`, `telegram_link`, `home_image`, `logo`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>بیزی لرن</strong>، آکادمی آموزش آنلاین تخصصی برنامه نویسی</p>', 'تهران', 'test@gmail.com', '09120000000', '#', '#', '#', '1402-05-19-17-05-45-525046-home.jpg', '1402-06-04-09-06-50-359027-bl-logo__2_-removebg-preview.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_comments`
--
ALTER TABLE `article_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_comments_article_id_foreign` (`article_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_course_id_foreign` (`course_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_course_id_foreign` (`course_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_for_users`
--
ALTER TABLE `coupon_for_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_title_unique` (`title`);

--
-- Indexes for table `courses_video`
--
ALTER TABLE `courses_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_video_course_id_foreign` (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `side_article`
--
ALTER TABLE `side_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `side_article_article_id_foreign` (`article_id`);

--
-- Indexes for table `side_course`
--
ALTER TABLE `side_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `side_course_course_id_foreign` (`course_id`);

--
-- Indexes for table `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_course_id_foreign` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `article_comments`
--
ALTER TABLE `article_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon_for_users`
--
ALTER TABLE `coupon_for_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses_video`
--
ALTER TABLE `courses_video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `side_article`
--
ALTER TABLE `side_article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `side_course`
--
ALTER TABLE `side_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `statement`
--
ALTER TABLE `statement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_comments`
--
ALTER TABLE `article_comments`
  ADD CONSTRAINT `article_comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses_video`
--
ALTER TABLE `courses_video`
  ADD CONSTRAINT `courses_video_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `side_article`
--
ALTER TABLE `side_article`
  ADD CONSTRAINT `side_article_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `side_course`
--
ALTER TABLE `side_course`
  ADD CONSTRAINT `side_course_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
