-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2019 at 09:15 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(256) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Technology'),
(2, 'Sport'),
(3, 'Music'),
(4, 'Culture'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_news_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_news_id_fk_idx` (`comment_news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_news_id`, `comment_author`, `comment_content`, `comment_date`) VALUES
(57, 13, 'Cristiano Ronaldo', 'Welcome back to Europe', '2019-11-09'),
(58, 2, 'Bryan  Shelton', 'Good post', '2019-11-10'),
(59, 22, 'Bryan  Shelton', 'Hip-hop 4ever', '2019-11-10'),
(60, 24, 'Kent Payne', 'Future is here !', '2019-11-10'),
(61, 25, 'Kent Payne', 'Well write !', '2019-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(3) NOT NULL AUTO_INCREMENT,
  `news_cat_id` int(3) DEFAULT '6',
  `news_title` varchar(100) NOT NULL,
  `news_author` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `news_content` text NOT NULL,
  `news_tag` varchar(255) NOT NULL,
  `news_comment_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_id`),
  KEY `news_cat_id_fk_idx` (`news_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_cat_id`, `news_title`, `news_author`, `news_date`, `news_content`, `news_tag`, `news_comment_count`) VALUES
(2, 1, 'Facebook agrees to pay Cambridge Analytica fine to UK', 'Roberta Dunn', '2019-09-18', '<h2>Facebook agrees to pay Cambridge Analytica fine to UK</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Facebook has agreed to pay a $500,000 fine imposed by the UK&#39;s data protection watchdog for its role in the Cambridge Analytica scandal. It had originally appealed the penalty, causing the Information Commissioner&#39;s Office to pursue its own counter-appeal. As part of the agreement, Facebook has made no admission of liability. The US firm said it &quot;wished it had done more to investigate Cambridge Analytica&quot; earlier.</p>\r\n\r\n<p>James Dipple-Johnstone, deputy commissioner of the ICO said: &quot;The ICO&#39;s main concern was that UK citizen data was exposed to a serious risk of harm. Protection of personal information and personal privacy is of fundamental importance, not only for the rights of individuals, but also as we now know, for the preservation of a strong democracy.&quot; Harry Kinmonth, a Facebook lawyer, noted that the social network had made changes to restrict the information app developers could access following the scandal. &quot;The ICO has stated that it has not discovered evidence that the data of Facebook users in the EU was transferred to Cambridge Analytica,&quot; he added. &quot;However, we look forward to continuing to cooperate with the ICO&#39;s wider and ongoing investigation into the use of data analytics for political purposes.&quot; Researcher Dr Aleksandr Kogan and his company GSR used a personality quiz to harvest the Facebook data of up to 87 million people. Some of this data was shared with London-based Cambridge Analytica.</p>\r\n\r\n<p>The ICO argued that Facebook did not do enough to protect users&#39; information.</p>\r\n', 'technology, tech, facebook, cambridge', 1),
(13, 2, 'LA Galaxy striker - MLS chief', 'Susan Ramirez', '2019-11-08', '<h1>Zlatan Ibrahimovic is set to return to Italian club AC Milan</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Zlatan Ibrahimovic is set to return to Italian club AC Milan at the end of his spell with LA Galaxy, says Major League Soccer commissioner Don Garber. The Swedish striker joined the Los Angeles side in March 2018 but his deal runs out at the end of the year. &quot;Zlatan is such an interesting guy,&quot; Garber told ESPN. &quot;He keeps my hands and inbox full.</p>\r\n\r\n<p>He&#39;s a thrill-a-minute. &quot;He is a 38-year-old guy who is being recruited by AC Milan, one of the top clubs in the world.&quot; Ibrahimovic played for Serie A giants Milan between 2010 and 2012, scoring 42 goals in 61 league appearances. The former Sweden international&#39;s most recent game for LA Galaxy was a 5-3 defeat by Los Angeles FC in the Major League Soccer Cup play-offs. Ibrahimovic has scored 53 goals during his time in the United States and was named in the MLS best XI teams of 2018 and 2019.</p>\r\n', 'sport, football, italia, seria a', 1),
(20, 2, 'ATP Finals: Rafael Nadal confident of being fit to battle Novak Djokovic for number one', 'Jennifer White', '2019-11-09', '<h1>Rafael Nadal is &quot;confident&quot; of being fit to play</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Rafael Nadal is &quot;confident&quot; of being fit to play - and battle Novak Djokovic for the number one ranking - when the ATP Finals start on Sunday. Nadal, 33, pulled out of the Paris Masters last week with a stomach injury but has travelled to London. The Spaniard overtook Djokovic at the top of the rankings this week but could lose his position as year-end number one to the Serb at the O2 Arena.</p>\r\n\r\n<p>Nadal is confident of playing a &quot;good level&quot; in his first match on Monday. Nadal, who has never won the season-ending championships, meets defending champion Alexander Zverev on Monday but said he only started serving &quot;very slowly&quot; on Thursday following the injury. &quot;I am confident that I can be very competitive - but of course it&#39;s a tournament in which you will face the top guys from the beginning, so you need to be 100% ready,&quot; the 19-time Grand Slam champion said. &quot;But I really hope I will be able to serve every single day a little better and my hope is to be serving normally on Sunday.&quot;</p>\r\n\r\n<p>Nadal did not play in last year&#39;s ATP Finals because of injury and pulled out of the 2017 event with a knee problem after one match.</p>\r\n\r\n<p>If he wins the title, he is guaranteed to finish the year as number one - but otherwise, the door could be open for Djokovic.</p>\r\n\r\n<p>The Serb will finish the year as number one if he wins the tournament and Nadal does not reach the semi-finals.</p>\r\n\r\n<p>Alternatively, if the Spaniard does not play, or fails to win a round-robin match, Djokovic will overtake him if he wins two group-stage matches and reaches the final.</p>\r\n', 'sport, tennis, nadal, djokovic, atp, finals', 0),
(21, 2, 'Liverpool v Man City: 3-5-2 could hold key for Pep Guardiola\'s side', 'Stephen Warnock', '2019-11-09', '<h1>Why does 3-5-2 work against Liverpool?</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>People are already asking: &#39;How do you beat this Liverpool team?&#39; But I am sure Manchester City boss Pep Guardiola will believe he has the answer on Sunday. The Reds remain undefeated after 11 Premier League games and are six points clear of City at the top of the table.</p>\r\n\r\n<p>However, while their results have been extremely impressive, their progress this season has not all been plain sailing. The biggest problems J&uuml;rgen Klopp&#39;s side have had have come against teams using a 3-5-2 formation, with Sheffield United, Manchester United and even Genk on Tuesday in the Champions League being recent examples.</p>\r\n\r\n<p>I am sure Guardiola has spotted it too, so it would not surprise me if he changes his side&#39;s shape from their usual 4-3-3 for this weekend&#39;s top-of-the table match at Anfield.</p>\r\n', 'sport, football, liverpool, manchester, city', 0),
(22, 3, 'The greatest hip hop songs of all time', 'Harold Crawford', '2019-11-09', '<h2>The global growth of hip-hop is best measured in decades</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>After Rapper&rsquo;s Delight took over the radio waves at the end of the 1970s, New York became the superheated centre of this brave new sound. Throughout the &rsquo;80s, hip-hop remained largely a localised scene.</p>\r\n\r\n<p>Turntablists like DJ Kool Herc were scratching and spinning records in the Bronx, Run DMC were making rock-influenced tracks in Queens, and Kurtis Blow was spitting narrative rhymes up in Harlem. The 1990s saw an explosion of the sound across the US.</p>\r\n\r\n<p>Every region developed their own sonic signature, from the kaleidoscopically funky tracks that Virginia-native Missy Elliott dropped to the chopped and screwed rhythms of Port Arthur, TX&rsquo;s UGK and the soul-and-gospel inflected rhymes of Chicago&rsquo;s Common. (The year 1990 was also the first time a hip-hop song took the number one spot on the Billboard Hot 100. Sadly, it was Vanilla Ice&rsquo;s Ice Ice Baby).</p>\r\n', 'hip-hop, music, greatest, song, songs', 1),
(23, 3, 'Ten must-listen albums in September', 'Harold Crawford', '2019-11-09', '<h1>Ten albums not to miss in September&nbsp;</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Natasha Khan returns with her first Bat For Lashes record since 2016&#39;s The Bride. In Lost Girls, Khan introduces us to Nikki Pink, who exists in a strange parallel universe &quot;in which gangs of marauding female bikers roam our streets, teenagers make out on car hoods, and a powerful female energy casts spells and leave clues for us to follow.&rdquo; Originally conceived as a film soundtrack, the album takes its influences from 80s pop and vampire movies.</p>\r\n\r\n<p>After what has seemed like a relatively quiet year, the rapper is releasing his follow up to 2018&rsquo;s chart-topping Beerbongs &amp; Bentleys. The tracklist hasn&rsquo;t been released at the time of publishing, but Posty has revealed the album&rsquo;s contributors on social media &ndash; including the likes of Ozzy Osbourne, Travis Scott, Meek Mill, Young Thug and SZA. The third single, Circles, reveals a new direction, a straight-up ballad with up-tempo guitars.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Longlisted on the BBC&rsquo;s Sound of 2019 poll, Mahalia has built a reputation as being honest and verbally sharp, deftly addressing issues from romantic failures to professional struggles through a R&amp;B and neo-soul filter. Expect to hear more of the type of tales covered in hits like Sober and I Wish I Missed My Ex, especially as the album&rsquo;s inspiration can be heard on the opening track, Hide Out &ndash; a 1982 interview with Eartha Kitt discussing love and compromise.</p>\r\n', 'music, september, must-listen, albums', 0),
(24, 1, 'Robo-dog creator learned by unbalancing toddler ', 'Harold Crawford', '2019-11-09', '<h1>Boston Dynamics boss learned by unbalancing toddler</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The boss of robotics company Boston Dynamics has confessed he once nudged his one-year-old daughter over to work out how people balance.</p>\r\n\r\n<p>A YouTube video of Marc Raibert&#39;s humanoid robot Atlas remaining upright while being poked with hockey sticks has 34 million views.</p>\r\n\r\n<p>He no longer knocked his robots over just to show people they could get themselves back up again, he said.</p>\r\n\r\n<p>But when he had done so, it was because he had felt like a &quot;proud parent&quot;.</p>\r\n\r\n<p>&quot;In fact, I have video of pushing on my daughter when she was one year old, knocking her over, getting some grief,&quot; he told BBC News, at Web Summit in Lisbon.</p>\r\n\r\n<p>&quot;She was teetering and tottering and learning to balance and I just wanted to see what would happen. But we&#39;re still good pals.&quot;</p>\r\n\r\n<p>Boston Dynamics began by designing robots suitable for military use but is now seeking to lease them to industries such as oil, gas and construction.</p>\r\n\r\n<p>And Mr Raibert told BBC News he had had more than 3,500 queries about leasing its quadruped robot, Spot - at the same cost as a luxury car.</p>\r\n\r\n<p>The company, which has yet to make a profit, was once owned by Google&#39;s parent, Alphabet, but has since been acquired by Japan&#39;s Softbank Group.</p>\r\n\r\n<p>&quot;If you look at our YouTube videos, it&#39;s always above a 95% thumbs-up from our followers,&quot; Mr Raibert told BBC News.</p>\r\n', 'tech, world', 1),
(25, 4, 'What are the best first lines in fiction?', 'Ryan Jackson', '2019-11-09', '<h1>Hephzibah Anderson explores the art of the perfect first sentence</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>How many times have I rewritten this opening sentence? The first line can be a beast to get right whether you&rsquo;re composing a dating profile or drafting a workplace pitch &ndash; but when it comes to longform fiction, the stakes are vertiginous.</p>\r\n\r\n<p>Think of all that goes into writing a novel, from conception to final edit and beyond; then picture a prospective reader, besieged by competing demands from rival books, never mind films and binge-worthy boxsets. Imagine next that reader miraculously reaching for our author&rsquo;s work, scanning its jacket blurb, opening the cover... Connections don&rsquo;t come much more intimate than that between an author and their reader, and the first sentence is the writer&rsquo;s chance to woo.</p>\r\n\r\n<p>Make it enticing enough &ndash; pack in sufficient intrigue, atmosphere and character, and do so in a voice that&rsquo;s compelling enough &ndash; and the reader will read on. It&rsquo;s no wonder Stephen King still spends months, sometimes years, getting his&nbsp;opening salvo&nbsp;exactly right.</p>\r\n\r\n<p>One writer who pulled off a hat-trick of near-ideal openers is Charles Dickens. There&rsquo;s David Copperfield, of course (&ldquo;Whether I shall turn out to be the hero of my own life, or whether that station will be held by anybody else, these pages must show&rdquo;), and A Christmas Carol is succinct perfection (&ldquo;Marley was dead, to begin with&rdquo;), but the show-stealer remains A Tale of Two Cities. Parodied, imitated, enduringly familiar even to those who&rsquo;ve never read the novel, the line beginning &ldquo;It was the best of times, it was the worst of times&rdquo; is a belter. A sustained rhetorical flourish, it primes us for the intensely contradictory world that characterises this story of love and revolution.</p>\r\n', 'culture, book, books, fiction', 1),
(26, 6, 'What will Japan do with all of its empty â€˜ghostâ€™ homes?', 'Ryan Jackson', '2019-11-09', '<h1>Japan has a property problem: there are more homes than people to live in them</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Population decline is a major issue for many countries. It&rsquo;s of particular concern for Japan, which after experiencing a major boom throughout the 20th Century is now seeing steep population contraction. In 2018 the&nbsp;lowest number of babies were born&nbsp;since the country began keeping records, while deaths steadily outpaced births.</p>\r\n\r\n<p>And, as populations decline in countries across the globe, the demand for housing will also drop as the number of households decreases. This is already happening in Japan, where the country&rsquo;s dramatically ageing population is fuelling a massive inventory of vacant homes. Known as &lsquo;akiya&rsquo;, these are homes left abandoned without heirs or new tenants.&nbsp;A record high of 13.6% properties&nbsp;across Japan were registered as akiya in 2018, and the problem is predicted to get worse; not only do relatives want to avoid inheriting homes due to Japan&rsquo;s second-home tax, but there are fewer citizens overall to occupy them.</p>\r\n\r\n<p>Akiya dot the landscape all over Japan, listed in &lsquo;akiya banks&rsquo; from Tokyo prefecture to rural Okayama prefecture to mountainous Kumamoto prefecture in Kyushu, at the southern end of the Japanese archipelago. Akiya are particularly concentrated in rural areas as younger generations&nbsp;abandon their roots&nbsp;in favour of settling in cities where there are more opportunities &ndash; a phenomenon that&rsquo;s causing dramatic global population shift around the world.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In these rural areas where demand for homes is already low, akiyaare worth so little that estate agents don&rsquo;t want to take them on; they can&rsquo;t make money from fees, which are calculated based on a percentage of the property value. In some cases, especially in the most remote areas, lack of interest means that there isn&rsquo;t an estate agent to handle these properties at all.</p>\r\n', 'japan, world, ghost', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'subscriber',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `role`) VALUES
(1, 'torres9', 'torres9', 'Fernando', 'Torres', 'f_torres@gmail.com', 'subscriber'),
(2, 'cr7', 'cristiano7', 'Cristiano', 'Ronaldo', 'cr7@gmail.com', 'subscriber'),
(4, 'leo10', 'mess12398940982', 'Leo', 'Mesi', 'leomess@gmail.com', 'subscriber'),
(5, 'admin', '123456789', 'Admin', 'Adminovic', 'admin@gmail.com', 'admin'),
(6, 'price_boateng', '0000', 'Kyle ', 'Price', 'price@gmai.com', 'subscriber'),
(8, 'will123', 'will123', 'Constance ', 'Williamson', 'williams@gmail.com', 'subscriber'),
(9, 'tommy', 'tommy', 'Tommy ', 'Larson', 'tommy@gmail.com', 'subscriber'),
(11, 'tomH', 'dsdasda', 'Tom', 'Hard', 'tomh@gmail.com', 'subscriber'),
(12, 'grace', 'grace', 'Bryan ', 'Shelton', 'bryan.shelton@example.com', 'subscriber'),
(30, 'marcia', 'marcia123', 'Marcia ', 'Little', 'marcia.little@gmail.com', 'subscriber'),
(31, 'payne', '123456', 'Kent', 'Payne', 'payne@gmail.com', 'subscriber');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_news_id_fk` FOREIGN KEY (`comment_news_id`) REFERENCES `news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_cat_id_fk` FOREIGN KEY (`news_cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
