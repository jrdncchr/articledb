-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2014 at 09:28 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `articledb`
--
CREATE DATABASE IF NOT EXISTS `articledb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `articledb`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `author`, `category`, `date`) VALUES
(1, 'Lee Kwang-soo! My Favorite Running Man Member', 'Lee Kwang-soo is a South Korean actor, entertainer and model well-known as a cast member of the show Running Man. He’s so funny that he became my favorite member of Running man. He’s one of the reasons why I got hooked and continued watching the show. He’ll make you want to watch him more and more every episode you watch. He’s so full of unique ideas to make the show very funny, using his own ways especially with his facial expression!\n\nLee Kwang-soo famous Nicknames\n\nFramer Lee Kwang-soo, he always makes fun about his Running Man members especially Song Ji Hyo, the only girl in the group by framing  them on something that they didn’t do! This is one of his way to make the show more funny, that he was nicknamed as a framer on the earlier episodes.\n\nBetrayer Kwang-soo, my favorite nickname for him. He is one of the Betrayer team composed of Suk Jin and HaHa, but he’s the worst if we’re talking about betrayal plays! He will do anything to win the race even if he’ll sacrifice his teammates for his own victory! His betraying concept makes the show more interesting and fun to watch.\n\nGiraffe Kwang-soo and Kwangvatar, this nickname was given to him because of his long legs that make him look like a Giraffe or an Avatar.\n\nThe Asian Prince, he was also recently called as the “The Asian Prince” because of his overwhelming popularity in other Asian Country. He has so many fans including me that I’m already at this point writing an article just for him!\n\nI love you!', 'jordan', 'Variety', '2014-01-10'),
(2, 'Running Man the Best!', 'My very first post will be dedicated to Running Man! Running man is my favorite and the best Variety show for me, I laugh very hard to the point that I’m already crying! I became so happy every time I watch this show, and all my stress goes away! So what exactly is this Running man?\r\n\r\nRunning Man\r\n\r\nBased on Wikipedia, Running Man is a South Korean variety show, It was first aired on July 11, 2010. This show was classified as an “urban action variety”; a never-before-seen new genre of variety shows focused in an urban environment like cities or towns. The MCs and guests complete missions in a landmark to win the race. The show has since shifted to a more familiar reality-variety show concept focused on games.\r\n\r\nDid you become interested? I know it’s a “No”, because I also did not get interested knowing that Running man is a Korean variety show. It got worse when I saw it on YouTube or on Facebook that the MCs are 6 middle aged men with 1 cute woman. I thought in my head, why will I watch this kind of show?\r\n\r\nSo what changed me to watch the show Running Man?\r\n\r\nThere was this friend of mine, who is always watching this show. He always invites me to watch this because it’s so funny, he said. I ignored him saying that it looks boring and no pretty girls to watch. But one evening in our friend’s home before starting a thesis work, He keeps on laughing so hard that got me and some of the group members to join him watch an episode of Running Man on his laptop.\r\n\r\nWe start watching and I got hooked when I saw my dream girl Im Yoona on the show! It got me and some of our group members interested and we continued to watch the show. We started laughing at the things they are doing and cursing how stupid the hosts are. Because it’s a variety show, they are trying to be funny. After watching that episode (ep. 63), It got me hooked and was unsatisfied with the ending, my friend said that it will continue with the next episode (ep. 64) which I watched it at home.\r\n\r\nHere is a link about the episode’s highlights that made me want to watch Running Man.', 'jordan', 'Entertainment', '2014-01-10'),
(3, 'Anti Slip Products', 'Well, my New Year''s Resolution begins with a commitment to super healthy foods for January and more morning walks in the snow. Now that the holiday season is over, I''ll also cut back to moderate wine consumption. Moderate wine consumption is still considered healthy and even medicinal by many doctors.\r\n\r\nIn order to enjoy the benefits of wine, such as its antioxidants and other health benefits, consider choosing reds over whites. But keep in mind that a moderate amount of alcohol (from white wines or beer), alcohol in general, is now believed to also be good for the body. Moderate alcohol is believed to raise high-density lipoprotein (HDL) cholesterol, the ''good'' cholesterol. Moderate alcohol is also believed to reduce the form of blood clots and help prevent artery damage caused by high levels of low-density lipoprotein (LDL) cholesterol, the bad stuff.\r\n\r\nModerate wine consumption is defined as an average of 2 drinks per day for men and 1 drink per day for women. One drink is measured as 12 ounces (355 mL) of beer, 5 ounces (148 mL) of wine or 1.5 ounces (44 mL) of 80-proof distilled spirits.\r\n\r\nCrisp, dry white wines include Pinot Gris, Sauvignon Blanc, bone-dry Riesling, Vinho Verde and Soave. They can be partnered to a variety of healthy hors d''oeuvres to enjoy before your entree.\r\n\r\nEdamame is a green soy bean and should be considered a super food. It is a natural source of antioxidants and isoflavones. This bean is 36 percent protein, which is 86 percent higher than mature soybeans. It is high in vitamin C and B and E and contains calcium, manganese, iron, magnesium, phosphorus and copper. Edamame is also low in saturated fat and has no cholesterol.\r\n\r\nTo make a taste Edamame Dip, cook 1 (10 ounce) packages of edamame beans in a large pot of boiling, salted water for 3 to 5 minutes until tender. Using a slotted spoon, transfer the beans to a bowl of iced water. Return water in pot to boil again and add 2 (10 ounce) packages of frozen green peas. Heat up the peas for about 2 minutes. Transfer the peas to the bowl with the edamame beans. Let them cool. Working in batches in a food processor or blender, puree the beans and peas, adding vegetable oil as needed but sparingly to give the mixture a smooth texture. Also add into the blender 1/4 cup of fresh cilantro, 1/4 cup of fresh mint, 2 cloves of garlic, 1/2 teaspoon of ground coriander and 1/2 teaspoon of ground cumin. The most important ingredient is the lemon juice as it acts as a bridging ingredient between the dip and the wine. Add the fresh juice from 1 lemon. Transfer the pureed mixture to a clean bowl, cover and refrigerate until dinner time.\r\n\r\nThe tangy flavour of this dip, due to the lemon, harmonizes with the crisp acidity in all the wines listed above.\r\n\r\nLearn how you can transform an average dinner into a culinary journey of the senses by using the 3 Wine Pairing Secrets. For more information click the link.', 'admin', 'Home and Family', '2014-01-15'),
(4, 'How To Save Money When Homeschooling', 'If you decided to home school your children you probably already made one financial sacrifice when one of the parents had to leave their employment to teach the children at home. When you are homeschool.ing, there will be a lot of supplies and textbooks that you will need to purchase, and if you are using a guided course, that will also cost money. There are ways that you can save money when homeschooling. Here are some of the best ways that you can save money.\r\n\r\nFirst you will want to check out with your state and see if the offer classes for homeschooling. Some states now offer distant classes that are free; they will give you everything that you need to be successful including the books, and lesson plans.\r\n\r\nFind free resources online, there are many websites that you can find which you print off lesson plans, puzzles, and worksheets. They are distributed free, and it will only cost you the cost of the ink and the paper. You can choose from thousands of sheets online, even sheets that are there to help them learn to write and print. There are a lot of possibilities with this. You can also look in the front of the text book; many of the books have an online website that will offer additional lessons and worksheets for the lessons in the book.\r\n\r\nBuy books online. They can be new books, but if you shop online you will be able to find the best selection and the best prices. Finding slightly used textbooks will also save you money. There are many book dealers online that will deal with home school text books.\r\n\r\nBuy season passes for places around your home. Some places will give discounts for parents who home school their children, you always want to ask about that. Buying a season pass will save you money in the long run so that you always have a place to take your child to on a field trip.\r\n\r\nUse the television, there are many great learning programs on PBS and the History channel for homeschooled children. Many of these programs will also have worksheets online for the program and additional lesson ideas to go along with the programs for the children to learn more.\r\n\r\nHome schooling doesn''t have to be expensive if you plan your lessons and shop year round for supplies that your child will need to be homeschooled.\r\n\r\nHomeschooling can be one of the most rewarding things you have done. You control what your children learn and most home school children go on to college and excel in the world. There are many ways that you can home school your children and there are also many ways that you can cut the cost of home schooling, online is one way that you can save money, there are so many resources available that is inexpensive or free.', 'admin', 'Home and Family', '2014-01-15'),
(5, 'What Are Some Different Types Of Home Security Cameras?', 'Having a home security system gives you the sense of security for you and your family, giving you piece of mind for the family home when you are home and away from home.\r\n\r\nThere are many types of home security that you can choose from each type giving you benefits and features that your family will need to protect them and keep them safe. Some of the systems you can hook up yourself easily, while there are some more advanced ones that you will want the company to come hook up for you.\r\n\r\nWireless home security Cameras can be hooked up you and configured easily. These can be placed around the home and you can choose locations that you normally wouldn''t because there are no wires to run for the cameras to send the signals back to the monitoring system. These are mounted on the walls, ceilings or other flat surfaces then plug into an electrical outlet and its set up.\r\n\r\nIP Security Cameras are known as being easy to set up; you don''t have to be a computer expert to set these up. They sometimes come with a mobile app that you can set the cameras up even when you''re away from home. These will also allow you to even check in on your home from anywhere. It can be night-vision, motion sensing and can even pan and tilt to get a better look at the surroundings\r\n\r\nWired cameras and motion detectors are another setup that you can choose from. Since this type has wires that will go back to the main monitoring system, this will be easily done by a company that specializes in home security systems. They will usually also offer monthly motoring for the home and will alert you if there is anything unusual going on there even if you are away from home.\r\n\r\nEach of these types have benefits that you will find useful, and they will all give you sense of peace knowing that you home is secured and safe for your family. Choosing which one that you want will be a personal preference for what you are comfortable installing yourself or if you want a company to come out and give you the expert advice about where to set up the cameras and overall safety inspection of the home to tell you the weakest spots of the home will be. No matter which type you choose, you will sleep better with a system hooked up securing your residence.\r\n\r\nHome security options gives you many options that you can choose from for making your home secure. You can choose from IP cameras, home security cameras and motion detectors that will security your home and ensure the safety of your home and your family.', 'admin', 'Home and Family', '2014-01-15'),
(6, 'Baby Shower Etiquette Ideas', 'Bed bugs have re-surged to become a very real problem in today''s world. Most people don''t know that bed bugs had a three decade vacation due to widespread treatments. However, the bugs have now found ample opportunity to increase in numbers and spread through multiple continents. The recent growth is primarily a result of increased travel. Bed bugs are traditionally found in high traffic areas such as hotels so the increase in travel has allowed the pests to take their own vacation once the frequent traveler heads back home. Learn how bed bugs can enter a home and learn how the infestation can be prevented using the following tips.\r\n\r\nWhat Are Bed Bugs? \r\nBed bugs are parasites that feed on the blood of people, using blood meals to grow and reproduce. They do not distinguish between dirty or clean homes and all people are vulnerable to infestations in their homes. They are also capable of feeding on animals, including all domestic pets. Bite responses can range from an absence of any physical signs of the bite to a serious allergic reaction. They are not considered to be dangerous; however, an allergic reaction to several bites may need medical attention.\r\n\r\nTips To Eliminate Bed Bug Infestations \r\nWash & Dry Clothing Immediately. Do not wait to wash travel clothes after a vacation or work trip. The pests can move quickly so perform laundry services immediately upon arriving back home. Clothes laundered in hot water or dried in temperatures hotter than 122° F for twenty minutes will kill all stages of the pests. This is typically the medium-high setting for a washing machine.\r\n\r\nWash All Food Containers. If traveling with plastic food containers, wash the containers before leaving the hotel. If washing the containers is impossible, make sure to wash them when arriving back home. The extreme temperatures inside a dishwasher will kill all bed bugs.\r\n\r\nAvoid The Hotel Floor.Try to avoid using the hotel floor for storage. Carpets in public places are breeding grounds for the pests so it may be a good idea to place plastic linings beneath luggage if forced to use the hotel floor. The hotel luggage stand can serve as great protection against any type of infestation.\r\n\r\nInspect The Mattress and Boxspring. There''s no better environment for a bed bug than a hotel mattress or boxspring. Many hotels have started using mattress encasements so do not tamper with the encasement if present. If no encasement is present, it''s a good idea to conduct a thorough inspection. Bed bugs can be difficult to spot but can be identified by the naked eye. They prefer to reside in tight spaces and they are extremely dark in color. Look for corners and tight spaces for the dark remnants of the bugs.\r\n\r\nCall A Professional Maid Service and Pest Control Company. It''s never a bad idea to receive a thorough cleaning of a home after returning from a trip. Most professional cleaning companies can disinfect a home and the deep cleaning will remove most of the remnants of the pests. If more action is required, call a pest control company to spray the home.\r\n\r\nBed bugs can be difficult to contain once they are allowed to roam freely. So, it''s best to utilize prevention techniques because more difficult techniques are required once they are allowed to build a presence inside a home.', 'admin', 'Home and Family', '2014-01-15'),
(27, 'Your Home Is Still a Powder Keg', 'The old saying "out of sight, out of mind" has real meaning today. Millions are satisfied that the threat of danger from the fumes emitted from these cleaning agents goes away when the smell goes away.\r\n\r\nWhen any of these chemicals enter the body, they immediately go to the blood stream and begin penetrating cells within the body, and the tragic mutation has begun. Because every body is so different, it is impossible to know exactly the speed at which the mutated cell becomes apparent, and the manifestation of the mutated cell is identified. Once the cell is compromised from that initial contact, the damage to the body and the mind is done and cannot be undone.\r\n\r\nThe metastasis of the mutated cell is going to vary greatly with every body, but it is inevitable that some form or type of disease is steadily developing, and more often than not, culminating in death.\r\n\r\nLet''s be perfectly clear, these diseases are not limited to just the physical body, these diseases are manifesting themselves in the mind as well. Remember, blood is pumped throughout our entire system carrying these mutated cells.\r\n\r\nWe are witnessing today what was once considered an aberration, that being the killing of children by children. Mental disorder at every level of society, from the youngest to the oldest, and mental level, from the mild to the severe. The medical community has yet, the advanced technology that answers all of the questions about the makeup of the entire brain. The rapidity rate of the infection, along with other variables associated with, and affected by the compromised cell, is yet a long way from being answered.\r\n\r\nBecause of the higher and higher numbers of these disorders both physical and mental, and from earlier and earlier stages of life, the focus of attention is more and more being centered on the home and the cleaning agents regularly used. According to the Consumer Product Safety Commission on chemicals commonly found in homes identified 150 that have been linked to allergies, birth defects, cancer, and psychological abnormalities. In a study conducted over a 15 year period, men and women who worked at home; stay at home moms and dads, had a 54% higher death rate from cancer than moms and dads who had jobs away from home. Also, an EPA report concluded that the toxic chemicals in household cleaners are three times more likely to cause cancer than air pollution. If this is occurring in adults, then what might possibly be happening to the children in these households. How much more vulnerable are these children.\r\n', 'admin', 'Home and Family', '2014-01-15'),
(28, 'The Fireplace and Home Fire Safety', 'Home heating fires account for 36% of residential home fires every year.\r\n\r\nIndoor fires can be dangerous any time of the year, but they can be particularly hazardous during the holidays, when around wrapping paper, decorations and holiday trees.\r\n\r\nBefore lighting your fireplace make sure that the flue is open and that there is no paper, gift wrappings or holiday decorations near the fireplace. Keep combustible materials such as paper, logs and kindling at least 3 feet away from the fireplace. Make sure that the Christmas tree is well away from the wood stove or fireplace. The excess heat will turn it into a dry torch.\r\n\r\n• Place the logs at the rear of the fireplace on a supporting grate and arrange the andirons to prevent any logs from rolling out. Always have the spark screen handy so that you can place it in front of the fireplace as soon as the fire has started. \r\n• Never use flammable liquids to start a fire. Use only seasoned hardwood as this will give off the least amount of creosote. \r\n• By building small fires they will burn more completely and will produce less smoke. \r\n• Never burn cardboard boxes, wrapping paper or other waste in your fireplace or wood stove. Never burn a Christmas tree in the fireplace. \r\n• Never leave a fire unattended. Extinguish the fire before going to bed or leaving the house. \r\n• Allow ashes to cool completely before disposing of them. Place the ashes in a tightly covered metal container and keep the ash container at least 10 feet away from your home. Ashes have a tendency to continue to burn, even after you think they are out. \r\n• Never empty the ash directly into a trash can; this is an open invitation for a fire to start.\r\n\r\nMaintenance of your fireplace is very important for fire safety. Fireplaces, just like anything else, wear out over a period of years and need to be maintained.\r\n\r\n• Have a professional chimney sweep inspect and clean the fireplace and chimney at least once a year. This maintenance is crucial to prevent creosote buildups and potential chimney fires. \r\n• Have a cap installed at the top of the chimney with a mesh screen spark arrester. \r\n• Keep the roof of your house clear of leaves, pine needles and other debris and remove any branches that may be hanging above the chimney. \r\n• Be sure to install both a smoke detector and carbon monoxide detector in your home and make sure the batteries are replaced. Keep a fire extinguisher on hand.\r\n\r\nRemember that a fireplace fire requires about 5 times as much air as most houses require for proper ventilation. With today''s tightly constructed homes, a fireplace can set up reverse draft that can suck poisonous carbon monoxide fumes from water heaters or other fuel burning devices in the house and discharge them into the living area.\r\n\r\nTo be safe, a positive source of outside air should be supplied to all fireplaces and wood burning stoves to bring in enough fresh air for efficient burning. This can be provided by installing an outside air vent or opening a nearby window when the fireplace or stove is being used.\r\n\r\nAllan Wright is a qualified writer with a keen interest in Family Health and Safety. Presently as the Project Manager for First Aid Kit Products, his articles reflect many of his thoughts and views concerning all avenues of Family Safety.', 'admin', 'Home and Family', '2014-01-15'),
(29, 'Video Game Accessories To Enhance Your Play Experience', 'Video game accessories are an essential part of the gaming experience and players tend to spend quite a bit of money on the right ones. It is not possible to play with the console alone because of the many accessories that are also required. In fact, when you buy the console it comes along with basic accessories such as a controller and a few cables. You''ll need to pick up a few more accessories as well.\r\n\r\n1. Extra controllers are a must in order to accommodate more players and have a lot more fun than usual.\r\n\r\n2. Motion driven accessories enable full-body tracking, enabling players to exercise a great deal of control over the game. Motion sensor accessories are used for dance or sports games.\r\n\r\n3. Headsets enable players to co-ordinate with each other in order to strategize better. They also help reduce any inconvenience or disturbance that other people might experience.\r\n\r\n4. A silicone case helps keep your video game controller in good condition, protecting it from scratches and breakage.\r\n\r\n5. Get a good charger for your video game console and other accessories so that you can reduce your dependence on batteries.\r\n\r\n6. A good speaker system ensures that you can experience high quality audio. There are many options including ones that plug into TVs or DVD players. A portable Bluetooth speaker is also a very good buy.\r\n\r\nWhile there are many third party video games accessories available in the market these days, it is always best to buy first party accessories even though they will certainly be more costly. First party accessories tend to be durable and reliable because they are made of high quality materials and also on account of the huge amount of research that has gone into their creation. Under no circumstance should you buy a fake product. Even so, there are quite a few third party video game accessories that are licensed and therefore a good buy. It is best to buy accessories that have multiple features. Wireless devices of various types are becoming very popular because they help reduce the clutter from having lots of wires.\r\n\r\nBe sure to study all available options before selecting the best possible video game accessories. While some accessories can be used for multiple games, some of them can only be used for specific games. As a result, it is quite common for video gamers to build up quite a collection of these devices.', 'admin', 'Gaming', '2014-01-15'),
(31, 'Benefits of Gaming: How "Plants vs. Zombies" Helps Improve Problem-Solving Skills', '"Plants vs. Zombies" is just one of the video games that achieved phenomenal success. But apart from killing time, does it provide any practical use in life?\r\n\r\nThe zombie craze is everywhere. Writers have been inspired to revive these brain-dead creatures that have hit it really big. Sorry, Rick Grimes, but they have virtually invaded the world and there is no stopping them. They have movies, TV shows, and games!\r\n\r\nThus, came the PopCap Games sensational hit: Plants vs. Zombies. Initially designed for the OS X and Windows, it is now compatible with Nintendo, Xbox, Android, Blackberry, and Apple devices. Several versions have been released, including one for Facebook.\r\n\r\nDesigned to be simple enough for casual players to learn, yet challenging enough for hardcore gamers, Plants vs. Zombies has gained a following. In fact, it remains to be the fastest selling PopCap Games video game since 2009. The world is obsessed with Plants vs. Zombies-and zombies per se-that just about everyone you come across plays or knows it.\r\n\r\nSo, what''s so special about the game? Does anyone actually benefit from shelling out a couple of dollars to purchase the latest version released every year or so?\r\n\r\nIf you are skeptical about the long-term effects of gaming, you are not alone. Ever since video games came to be, a number of people-mostly adults-have condemned video games as a waste of time and money. This inspired studies to determine the impact of gaming. The results were remarkably positive, leading to the creation of digital learning tools.\r\n\r\nIn a nutshell, people learn faster when they''re having fun. Think about it. Would you rather sit through a three-hour lecture delivered by a monotonous speaker than learn Mandarin through an interactive app equipped with all sorts of fancy features?\r\n\r\nPlants vs. Zombies won''t teach you Mandarin, but it can improve your problem-solving skills. It immerses you into a virtual environment that simulates a probable life threatening situation-although exaggerated. You know it is superficial, yet you physiologically respond to it as though it''s real.\r\n\r\nHere are three key game features that can enhance your decision-making and other survival skills:\r\n\r\nWeapon Selection. You start out with a basic arsenal composed of sunflowers and pea shooters. As you move to higher levels, you unlock additional artillery. Simultaneously, you will be faced with armed zombies. To spice things up, you reach the point when you can arm yourself only with a limited number of weapons. This pushes you to weigh the pro''s and con''s of your choices.\r\n\r\nSite Challenges. Arsenal constraints. Tougher enemies. You''re just warming-up. The real challenge comes when the game introduces new environments. The absence of sunlight and a pool in the backyard increase the threats and hazards. This calls for flexibility in your part, enabling you to adopt to different conditions and adjust your weapon preferences.\r\n\r\nTime Pressure. Frankly, the pop-up warnings kill the suspense. Nonetheless, the game manages to bring in a number of conflicts that increase stress levels, ultimately testing your mental preparedness and alertness.\r\n\r\nThese three characteristics of Plants vs. Zombies are just a few of the many ways in which games serve as mental crunches. Still not convinced that gaming has its benefits? Or are you a wee bit encouraged to gift your kids the latest Xbox or Nintendo versions? The best way to win yourself over is to take the game for a test drive and find out for yourself.\r\n\r\nIn spite of being criticized as a mere distraction from the tedium, games have proven to be effective instructional tools. Just like Plants vs. Zombies, most video games are not intended to educate, but they can enhance skills necessary in solving real life problems. Truly, there''s fun in learning.', 'admin', 'Gaming', '2014-01-15'),
(32, 'General Online Gaming Tips For Both Parents', 'Certainly, online games cannot only be fun for your kids but also have numerous advantages. For instance, experts have found online adventure games to increase the imagination and creativity of children. Car racing ones are useful for teaching your children to solve everyday problems. Furthermore, they give your children an opportunity to connect and share with others. However, it is import for you and your kids to understand the dangers of online gaming and learn to be safe. Here are some of the tips for both parents and teens.\r\n\r\nWhat parents should do\r\n\r\nClean your device: Before your children can begin to download or play online games, ensure that you have installed an anti-virus and firewall on the device they are going to use. Hackers use spyware, malware and viruses to hack into systems.\r\n\r\nExamine the rating: Before they can start playing it, check for the rating to see if it is age appropriate for your kids. Virtually all games have rating summaries that offer insight on the type of content and details of the game.\r\n\r\nUse strong and long passwords: Ensure that your children have long and strong passwords, which you know. A strong password should be at least eight characters long with a mix of letters, numbers, symbols, and upper letters.\r\n\r\nSafeguard personal information: Make certain that the user name your children are using does not give away their location, gender, age or real name. If the game requires a profile picture, ask your children to use an avatar instead of their real pictures.\r\n\r\nLimit playing time: Set a time limit for your kids to play. Some games and consoles have the ability to allow parents to set the time limit for their children to play and control whom they can play with or chat with on the game''s online chat. It is important to realize that prohibiting your children from playing online games will not work. Allow them to play with a time limit.\r\n\r\nKeep the PC in a central location: Minimize your child''s chances of getting into online game dangers b monitoring their online activities. Most kids today have tablets and smartphones, which are all mobile devices. It can be tough to monitor their online activities especially when it comes to games. A good suggestion is to set a rule that they can only play online games on the PC, which you will keep in a central location such as in the living room.', 'admin', 'Gaming', '2014-01-08'),
(33, 'Different Categories Of Games Available To Gamers Today', 'The world of technology has given as varied forms of digital entertainment, among them being the popular world of gaming. Video games are in no way new to the market. They have been around for many decades and they keep getting better. Since we are living in the information era, gamers can now even play online games, which are available in numerous platforms. The Entertainment Software Rating Board is responsible for assigning age and content rating for mobile apps and video games. The board breaks down these games into the following major categories:\r\n\r\nDigital downloads\r\n\r\nThese types of games are downloaded to a handheld device, console or PC directly from the internet. Many consoles have their own online marketplaces where you can download them. They can be free games or you can be required to purchase them depending on the site or the type. They can be of a causal nature such as word games and puzzles, or they can be full-length feature ones.\r\n\r\nSubscription\r\n\r\nThese simply are online arcades or games requiring a user to sign up and create an account to play. Some of them allow you to play one or more of them free for a certain period after which you are required to pay. The main advantage of subscriptions is that they eliminate the need to possess a game physically to be able to enjoy it, which means you spend less on your gaming.\r\n\r\nMobile storefronts\r\n\r\nTablets and smartphones allow users to download apps from various online marketplaces, linked to an e-wallet, credit card, or mobile phone account. The most popular category in mobile apps is games. The content here can vary greatly in terms of age appropriateness just like other kinds.\r\n\r\nSocial networking\r\n\r\nAs the name suggest, these forms are played from within a social networking site. They encourage the players to share updates and content with others in the social network. They can also include purchasing in-game items with real money.\r\n\r\nFree-to-play\r\n\r\nThese ones are free to play online. They are typically supported by ads instead of subscription or purchases. The catch is that, most of them allow you to play a limited version of the game and if you love it, you can purchase the full version.\r\n\r\nBoxed games\r\n\r\nThey come on cartridge or disc, and are purchased online or in a store. You play them on a gaming device such as a console, PC or handheld. They can be of any nature including racing, shooting, adventure or sports.', 'admin', 'Gaming', '2014-01-15'),
(34, 'Board Games for Families With Kids', 'Families with kids need to think carefully before buying board games that would be fun and educational for the little ones and teenagers. Here are some popular board games that find pride of place in many families with kids:\r\n\r\n• Scrabble: You can build your kids'' vocabulary, and help them play with words with a wide variety of scrabble games available in the market. Depending on the age group, you can pick versions of this board game that are available in varied difficulty levels to suit anyone from nursery kids to young adults. For years, this wordplay has been a favorite with households all around the world and you too can have fun with your family by buying one.\r\n\r\n• Pictionary: If you love playing dumb charades, you will surely have fun of a different kind playing Pictionary where instead of acting out the answers as in charades, you will have to do it with drawings on paper. These board games are available in varying difficulty levels, and you usually get a pack of game board, pencils and paper, a timer, card deck, challenge die, standard die, and rules when you buy a game. This game tests how well a player can imagine and communicate under restricted circumstances.\r\n\r\n• Taboo: In this game, the trick is to give clues that are carefully-worded and creative, to help your team guess words quickly. However, you should refrain from using the obvious clues, which are strictly taboos. If you end up mentioning them, you will lose points. A taboo usually comes with a number of taboo cards, a card tray and cardholder, game-changer die, buzzer, sand timer and score pad. Four or more players can play this game.\r\n\r\n• Carom: This is one of the popular board games that can be played by 2, 3 or 4 players. Suitable for players aged 6 years and above, this social game can let people have some fun while pocketing the wooden pieces with the striker. So, if you would like to hone your carom skills and bond over the play, bring home a carom board and the required accessories today.\r\n\r\nThese are some of the most common board games prevalent in families with kids, though there are many other varieties of games that families can enjoy. All you need to do is opt for some research online to find the ideal game that you can play with your family and have a great time.', 'admin', 'Gaming', '2014-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Gaming'),
(2, 'Home and Family');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(30) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `title`, `content`, `author`, `category`, `date`) VALUES
(2, 'Sample Project 1', '{The Fireplace and Home Fire Safety|How To Save Money When Homeschooling|What Are Some Different Typ', ' Choosing which one that you want will be a personal preference for what you are comfortable installing yourself or if you want a company to come out and give you the expert advice about where to set up the cameras and overall safety inspection of the home to tell you the weakest spots of the home will be.  Once the cell is compromised from that initial contact the damage to the body and the mind is done and cannot be undone.  Moderate alcohol is believed to raise high-density lipoprotein (HDL) cholesterol the good cholesterol.  Also add into the blender 14 cup of fresh cilantro 14 cup of fresh mint 2 cloves of garlic 12 teaspoon of ground coriander and 12 teaspoon of ground cumin. \n\n Use only seasoned hardwood as this will give off the least amount of creosote.  Ashes have a tendency to continue to burn even after you think they are out. Home security options gives you many options that you can choose from for making your home secure.  Moderate alcohol is believed to raise high-density lipoprotein (HDL) cholesterol the good cholesterol. \n\n There are many book dealers online that will deal with home school text books.  Choosing which one that you want will be a personal preference for what you are comfortable installing yourself or if you want a company to come out and give you the expert advice about where to set up the cameras and overall safety inspection of the home to tell you the weakest spots of the home will be. Remember that a fireplace fire requires about 5 times as much air as most houses require for proper ventilation.  Also an EPA report concluded that the toxic chemicals in household cleaners are three times more likely to cause cancer than air pollution.  How much more vulnerable are these children. \n\n Have a professional chimney sweep inspect and clean the fireplace and chimney at least once a year.   Be sure to install both a smoke detector and carbon monoxide detector in your home and make sure the batteries are replaced. Having a home security system gives you the sense of security for you and your family giving you piece of mind for the family home when you are home and away from home.  Keep a fire extinguisher on hand. \n\n', 'admin', '', '2014-01-18'),
(3, 'Sample Project 2', '{How To Save Money When Homeschooling|Your Home Is Still a Powder Keg|What Are Some Different Types ', ' Always have the spark screen handy so that you can place it in front of the fireplace as soon as the fire has started. When any of these chemicals enter the body they immediately go to the blood stream and begin penetrating cells within the body and the tragic mutation has begun.  Here are some of the best ways that you can save money. \n\n Keep combustible materials such as paper logs and kindling at least 3 feet away from the fireplace. Lets be perfectly clear these diseases are not limited to just the physical body these diseases are manifesting themselves in the mind as well. \n\n Remember blood is pumped throughout our entire system carrying these mutated cells.  This maintenance is crucial to prevent creosote buildups and potential chimney fires. \n\nIP Security Cameras are known as being easy to set up you dont have to be a computer expert to set these up.  Also an EPA report concluded that the toxic chemicals in household cleaners are three times more likely to cause cancer than air pollution.  They sometimes come with a mobile app that you can set the cameras up even when youre away from home. \n\n  Keep the roof of your house clear of leaves pine needles and other debris and remove any branches that may be hanging above the chimney.   By building small fires they will burn more completely and will produce less smoke. \n\n', 'admin', '', '2014-01-18'),
(4, 'Sample Project 3', '{Anti Slip Products|What Are Some Different Types Of Home Security Cameras?|How To Save Money When H', ' The extreme temperatures inside a dishwasher will kill all bed bugs. Having a home security system gives you the sense of security for you and your family giving you piece of mind for the family home when you are home and away from home. \n\n But keep in mind that a moderate amount of alcohol (from white wines or beer) alcohol in general is now believed to also be good for the body. \n\nBed bugs have re-surged to become a very real problem in todays world. \n\nBuy books online. \n\n', 'admin', '', '2014-01-18'),
(5, 'Sample Project 4', 'Generated Project about Gaming', ' This pushes you to weigh the pros and cons of your choices. In a nutshell people learn faster when theyre having fun.  The content here can vary greatly in terms of age appropriateness just like other kinds. \n\n Ever since video games came to be a number of people-mostly adults-have condemned video games as a waste of time and money.  The results were remarkably positive leading to the creation of digital learning tools.  Sorry Rick Grimes but they have virtually invaded the world and there is no stopping them. \n\n Several versions have been released including one for Facebook.  Even so there are quite a few third party video game accessories that are licensed and therefore a good buy. Social networkingAs the name suggest these forms are played from within a social networking site. \n\n', 'admin', '', '2014-01-18'),
(9, 'My Project Game', '{Benefits of Gaming: How "Plants vs. Zombies" Helps Improve Problem-Solving Skills|Video Game Access', ' Headsets enable players to co-ordinate with each other in order to strategize better.  The board breaks down these games into the following major categoriesDigital downloadsThese types of games are downloaded to a handheld device console or PC directly from the internet.  Zombies is just one of the video games that achieved phenomenal success. \n\n They can be of any nature including racing shooting adventure or sports. Here are three key game features that can enhance your decision-making and other survival skillsWeapon Selection. \n\n A silicone case helps keep your video game controller in good condition protecting it from scratches and breakage.  It is not possible to play with the console alone because of the many accessories that are also required.  Even so there are quite a few third party video game accessories that are licensed and therefore a good buy.  Would you rather sit through a three-hour lecture delivered by a monotonous speaker than learn Mandarin through an interactive app equipped with all sorts of fancy featuresPlants vs. \n\n', 'admin', 'Gaming', '2014-01-20'),
(10, 'Generated from Projects', '{What Are Some Different Types Of Home Security Cameras?|The Fireplace and Home Fire Safety}', '  Ashes have a tendency to continue to burn even after you think they are out.  Choosing which one that you want will be a personal preference for what you are comfortable installing yourself or if you want a company to come out and give you the expert advice about where to set up the cameras and overall safety inspection of the home to tell you the weakest spots of the home will be. Having a home security system gives you the sense of security for you and your family giving you piece of mind for the family home when you are home and away from home.  Also add into the blender 14 cup of fresh cilantro 14 cup of fresh mint 2 cloves of garlic 12 teaspoon of ground coriander and 12 teaspoon of ground cumin.\n\n  Remember blood is pumped throughout our entire system carrying these mutated cells.  Always have the spark screen handy so that you can place it in front of the fireplace as soon as the fire has started.  Also an EPA report concluded that the toxic chemicals in household cleaners are three times more likely to cause cancer than air pollution.   Be sure to install both a smoke detector and carbon monoxide detector in your home and make sure the batteries are replaced.\n\n  Use only seasoned hardwood as this will give off the least amount of creosote.   By building small fires they will burn more completely and will produce less smoke.  There are many book dealers online that will deal with home school text books.\n\n  But keep in mind that a moderate amount of alcohol (from white wines or beer) alcohol in general is now believed to also be good for the body. Bed bugs have re-surged to become a very real problem in todays world.\n\n The extreme temperatures inside a dishwasher will kill all bed bugs. When any of these chemicals enter the body they immediately go to the blood stream and begin penetrating cells within the body and the tragic mutation has begun.\n\n Lets be perfectly clear these diseases are not limited to just the physical body these diseases are manifesting themselves in the mind as well. IP Security Cameras are known as being easy to set up you dont have to be a computer expert to set these up.  Moderate alcohol is believed to raise high-density lipoprotein (HDL) cholesterol the good cholesterol.\n\n', 'admin', '', '2014-01-20'),
(11, 'Game Game', 'Game Title', 'Here are three key game features that can enhance your decision-making and other survival skillsWeapon Selection. Would you rather sit through a three-hour lecture delivered by a monotonous speaker than learn Mandarin through an interactive app equipped with all sorts of fancy featuresPlants vs.\n\n It is not possible to play with the console alone because of the many accessories that are also required. Headsets enable players to co-ordinate with each other in order to strategize better. The board breaks down these games into the following major categoriesDigital downloadsThese types of games are downloaded to a handheld device console or PC directly from the internet.\n\n They can be of any nature including racing shooting adventure or sports. Zombies is just one of the video games that achieved phenomenal success. A silicone case helps keep your video game controller in good condition protecting it from scratches and breakage.\n\n Even so there are quite a few third party video game accessories that are licensed and therefore a good buy.\n\n', 'admin', 'Gaming', '2014-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `title_templates`
--

CREATE TABLE IF NOT EXISTS `title_templates` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=505 ;

--
-- Dumping data for table `title_templates`
--

INSERT INTO `title_templates` (`id`, `title`) VALUES
(337, 'Apply These 8 Secret Techniques To Improve Keyword'),
(338, 'Don?t Waste Time! 8 Facts Until You Reach Your Keyword'),
(339, 'Keyword Awards: 8 Reasons Why They Don?t Work & What You Can Do About It'),
(340, 'Keyword Is Your Worst Enemy. 8 Ways To Defeat It'),
(341, 'Knowing These 8 Secrets Will Make Your Keyword Look Amazing'),
(342, 'My Life, My Job, My Career: How 8 Simple Keyword Helped Me Succeed'),
(343, 'The Next 8 Things You Should Do For Keyword Success'),
(344, 'The 8 Best Things About Keyword'),
(345, 'The 8 Most Successful Keyword Companies In Region'),
(346, 'Thinking About Keyword? 8 Reasons Why It?s Time To Stop!'),
(347, '8 Reasons People Laugh About Your Keyword'),
(348, '8 Awesome Tips About Keyword From Unlikely Sources'),
(349, '8 Easy Steps To More Keyword Sales'),
(350, '8 Enticing Ways To Improve Your Keyword Skills'),
(351, '8 Facts Everyone Should Know About Keyword'),
(352, '8 Incredible Keyword Examples'),
(353, '8 Key Tactics The Pros Use For Keyword'),
(354, '8 Keyword Mistakes That Will Cost You $1m Over The Next 10 Years'),
(355, '8 Life-saving Tips About Keyword'),
(356, '8 Mesmerizing Examples Of Keyword'),
(357, '8 Must-haves Before Embarking On Keyword'),
(358, '8 Questions You Need To Ask About Keyword'),
(359, '8 Reasons To Love The New Keyword'),
(360, '8 Reasons Why You Are Still An Amateur At Keyword'),
(361, '8 Ridiculously Simple Ways To Improve Your Keyword'),
(362, '8 Signs You Made A Great Impact On Keyword'),
(363, '8 Solid Reasons To Avoid Keyword'),
(364, '8 Stories You Didn?t Know About Keyword'),
(365, '8 Stunning Examples Of Beautiful Keyword'),
(366, '8 Super Useful Tips To Improve Keyword'),
(367, '8 Things To Demystify Keyword'),
(368, '8 Things You Didn''t Know About Keyword'),
(369, '8 Things You Must Know About Keyword'),
(370, '8 Tips About Keyword You Can''t Afford To Miss'),
(371, '8 Tips For Keyword'),
(372, '8 Tips To Reinvent Your Keyword And Win'),
(373, '8 Tips With Keyword'),
(374, '8 Unforgivable Sins Of Keyword'),
(375, '8 Very Simple Things You Can Do To Save Keyword'),
(376, '8 Ways Create Better Keyword With The Help Of Your Dog'),
(377, '8 Ways Keyword Can Make You Invincible'),
(378, '8 Ways To Get Through To Your Keyword'),
(379, '8 Ways To Keep Your Keyword Growing Without Burning The Midnight Oil'),
(380, '8 Ways To Reinvent Your Keyword'),
(381, '8 Ways You Can Get More Keyword While Spending Less'),
(382, '8 Ways You Can Reinvent Keyword Without Looking Like An Amateur'),
(383, 'Using 8 Keyword Strategies Like The Pros'),
(384, 'You Can Thank Us Later - 8 Reasons To Stop Thinking About Keyword'),
(385, 'Best Keyword Android Apps'),
(386, 'Best 80 Tips For Keyword'),
(387, 'The A - Z Of Keyword'),
(388, 'The Ultimate Guide To Keyword'),
(389, 'Top 80 Quotes On Keyword'),
(390, 'Top 8 Ways To Buy A Used Keyword'),
(391, '80 Ideas For Keyword'),
(392, '80 Methods Of Keyword Domination'),
(393, '80 Tips To Grow Your Keyword'),
(394, '80 Ways To Improve Keyword'),
(395, 'How To Make Keyword'),
(396, 'How To Sell Keyword'),
(397, 'How To Learn Keyword'),
(398, 'How To Restore Keyword'),
(399, 'How To Something Your Keyword'),
(400, 'How To Earn $1,000,000 Using Keyword'),
(401, 'How To Make Your Keyword Look Amazing In 8 Days'),
(402, 'How To Become Better With Keyword In 10 Minutes'),
(403, 'How To Handle Every Keyword Challenge With Ease Using These Tips'),
(404, 'How To Turn Your Keyword From Blah Into Fantastic'),
(405, 'Do You Make These Simple Mistakes In Keyword?'),
(406, 'Does Keyword Sometimes Make You Feel Stupid?'),
(407, 'If Keyword Is So Bad, Why Don''t Statistics Show It?'),
(408, 'Shhhh... Listen! Do You Hear The Sound Of Keyword?'),
(409, 'Some People Excel At Keyword And Some Don''t - Which One Are You?'),
(410, 'Want An Easy Fix For Your Keyword? Read This!'),
(411, 'Want To Step Up Your Keyword? You Need To Read This First'),
(412, 'What Can The Music Industry Teach You About Keyword'),
(413, 'What Everybody Ought To Know About Keyword'),
(414, 'What Shakespeare Can Teach You About Keyword'),
(415, 'What Your Customers Really Think About Your Keyword?'),
(416, 'Where Is The Best Keyword?'),
(417, 'Why Have A Keyword?'),
(418, 'Why You Need A Keyword'),
(419, 'You Make These Keyword Mistakes?'),
(420, 'Everyone Loves Keyword'),
(421, 'Keyword And Love - How They Are The Same'),
(422, 'Kids Love Keyword'),
(423, '8 Romantic Keyword Holidays'),
(424, '8 Romantic Keyword Vacations'),
(425, 'Use Keyword To Make Someone Fall In Love With You'),
(426, 'Albert Einstein On Keyword'),
(427, 'Charlie Sheen''s Guide To Keyword'),
(428, 'Everything I Learned About Keyword I Learned From Potus'),
(429, 'Houdini''s Guide To Keyword'),
(430, 'Keyword And The Mel Gibson Effect'),
(431, 'The Angelina Jolie Guide To Keyword'),
(432, 'What Donald Trump Can Teach You About Keyword'),
(433, 'What Oprah Can Teach You About Keyword'),
(434, 'What The Pope Can Teach You About Keyword'),
(435, 'What You Can Learn From Tiger Woods About Keyword'),
(436, 'Cracking The Keyword Secret'),
(437, 'Keyword Secrets Revealed'),
(438, 'Omg! The Best Keyword Ever!'),
(439, 'The Hidden Mystery Behind Keyword'),
(440, 'The Mayans? Lost Guide To Keyword'),
(441, 'The Secret Guide To Keyword'),
(442, 'The Secret Life Of Keyword'),
(443, 'The Truth About Keyword In 3 Little Words'),
(444, '8 Keyword Secrets You Never Knew'),
(445, 'Who Else Wants To Know The Mystery Behind Keyword?'),
(446, '8 Reasons Keyword Is A Waste Of Time'),
(447, 'Congratulations! Your Keyword Is About To Stop Being Relevant'),
(448, 'Don?t Be Fooled By Keyword'),
(449, 'How Keyword Made Me A Better Salesperson Than You'),
(450, 'How To Deal With A Very Bad Keyword'),
(451, 'How To Slap Down A Keyword'),
(452, 'It?s About The Keyword, Stupid!'),
(453, 'Lies And Damn Lies About Keyword'),
(454, 'Never Changing Keyword Will Eventually Destroy You'),
(455, 'Slacker?s Guide To Keyword'),
(456, 'The Mafia Guide To Keyword'),
(457, '8 Mistakes In Keyword That Make You Look Dumb'),
(458, '8 Ridiculous Rules About Keyword'),
(459, '8 Surefire Ways Keyword Will Drive Your Business Into The Ground'),
(460, '8 Ways A Keyword Lies To You Everyday'),
(461, 'What Ancient Greeks Knew About Keyword That You Still Don''t'),
(462, 'Why Everything You Know About Keyword Is A Lie'),
(463, 'Why Most Keyword Fail'),
(464, 'Why You Never See A Keyword That Actually Works'),
(465, 'How Green Is Your Keyword?'),
(466, 'How To Make Your Product The Ferrari Of Keyword'),
(467, 'Keyword Is Bound To Make An Impact In Your Business'),
(468, 'Keyword Strategies For The Entrepreneurially Challenged'),
(469, 'One Word: Keyword'),
(470, 'Pump Up Your Sales With These Remarkable Keyword Tactics'),
(471, 'The Simple Keyword That Wins Customers'),
(472, '8 Incredibly Useful Keyword For Small Businesses'),
(473, '8 Ways Keyword Will Help You Get More Business'),
(474, 'Want A Thriving Business? Avoid Keyword!'),
(475, 'Why Ignoring Keyword Will Cost You Sales'),
(476, 'You Don''t Have To Be A Big Corporation To Have A Great Keyword'),
(477, 'Believe In Your Keyword Skills But Never Stop Improving'),
(478, 'Create A Keyword You Can Be Proud Of'),
(479, 'Don''t Just Sit There! Start Getting More Keyword'),
(480, 'Famous Quotes On Keyword'),
(481, 'Get Better Keyword Results By Following 3 Simple Steps'),
(482, 'How To Make Your Keyword Look Like A Million Bucks'),
(483, 'Make Your Keyword A Reality'),
(484, 'Remarkable Website - Keyword Will Help You Get There'),
(485, 'This Article Will Make Your Keyword Amazing: Read Or Miss Out'),
(486, 'Want More Money? Get Keyword'),
(487, 'You Can Have Your Cake And Keyword, Too'),
(488, 'Death, Keyword And Taxes: Tips To Avoiding Keyword'),
(489, 'Get Rid Of Keyword Problems Once And For All'),
(490, 'Having A Provocative Keyword Works Only Under These Conditions'),
(491, 'If You Don''t Keyword Now, You''ll Hate Yourself Later'),
(492, 'Keyword: Do You Really Need It? This Will Help You Decide!'),
(493, 'Keyword? It''s Easy If You Do It Smart'),
(494, 'Never Lose Your Keyword Again'),
(495, 'Open The Gates For Keyword By Using These Simple Tips'),
(496, 'The Death Of Keyword And How To Avoid It'),
(497, 'Warning: What Can You Do About Keyword Right Now'),
(498, 'Boost Your Keyword With These Tips'),
(499, 'Interesting Factoids I Bet You Never Knew About Keyword'),
(500, 'Keyword Expert Interview'),
(501, 'Keyword Iphone Apps'),
(502, 'Keyword May Not Exist!'),
(503, 'The Philosophy Of Keyword'),
(504, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `tbsun` varchar(100) NOT NULL,
  `tbspw` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `type`, `tbsun`, `tbspw`) VALUES
(1, 'jordan', 'jordan', 'Jordan Cachero', 'jrdncchr@gmail.com', 'admin', 'jrdncchr@gmail.com', '4e95ae0d1c730'),
(2, 'admin', 'admin143', 'Administrator', 'admin@gmail.com', 'admin', 'george2006m@gmail.com', '4e95ae0d1c730');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
