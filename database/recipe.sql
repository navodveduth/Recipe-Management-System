-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 06:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `UserID` int(11) NOT NULL,
  `RecipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`UserID`, `RecipeID`) VALUES
(1000, 100),
(1000, 101),
(1000, 105),
(1001, 101),
(1002, 103),
(1002, 104),
(1003, 102),
(1003, 104),
(1004, 105);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `UserID` int(11) NOT NULL,
  `RecipeID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `Comment_desc` varchar(255) NOT NULL,
  `Comment_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`UserID`, `RecipeID`, `CommentID`, `Comment_desc`, `Comment_timestamp`) VALUES
(1000, 100, 1, 'This was a good recipe', '2021-09-20 15:10:01'),
(1000, 101, 2, 'I made these today,It is good', '2021-09-21 15:10:01'),
(1001, 101, 3, 'This is very difficult to prepare', '2021-09-22 22:18:41'),
(1002, 102, 4, 'I had never heard of this recipe', '2021-09-23 17:19:21'),
(1003, 103, 5, 'Thanks for sharing this recipe, will definitely be making them for Dinner ', '2021-09-24 10:17:09'),
(1004, 104, 6, 'Thank you for this nice recipe', '2021-09-25 11:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Feedback_title` varchar(200) NOT NULL,
  `Feedback_desc` text DEFAULT NULL,
  `Feedback_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `UserID`, `Feedback_title`, `Feedback_desc`, `Feedback_timestamp`) VALUES
(1, 1000, 'Good website', 'This was a good website', '2021-09-20 15:05:01'),
(2, 1001, 'Moderate', 'Have good content', '2021-09-21 08:06:11'),
(3, 1001, 'Bad', 'Categories are not sufficient', '2021-09-22 12:20:40'),
(4, 1002, 'Good', 'It has lot of recipes', '2021-09-23 18:32:28'),
(5, 1003, 'Moderate', 'Easy to navigate to relavant recipes ', '2021-09-24 21:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `profile_details`
--

CREATE TABLE `profile_details` (
  `UserID` int(11) NOT NULL,
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `Bio` varchar(255) DEFAULT NULL,
  `Gender` varchar(15) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Profile_image` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `profile_details`
--

INSERT INTO `profile_details` (`UserID`, `First_name`, `Last_name`, `Bio`, `Gender`, `Location`, `Profile_image`) VALUES
(1000, 'Jane', 'White', 'I am a food lover', 'Female', 'California', 'image00001.jpg'),
(1001, 'Tommy', 'Davis', 'I love to cook', 'Male', 'Londom', 'image00002.jpg'),
(1002, 'Janet', 'Williams', 'I love authentic dishes', 'Female', 'New York', 'image00003.jpg'),
(1003, 'Jimmy', 'Smith', 'I love food', 'Male', 'Canberra', 'image00004.jpg'),
(1004, 'Ken', 'Jones', 'I love to cook delicious food', 'Male', 'London', 'image00005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `UserID` int(11) NOT NULL,
  `RecipeID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`UserID`, `RecipeID`, `Rating`) VALUES
(1000, 101, 4),
(1000, 102, 1),
(1000, 104, 3),
(1001, 100, 4),
(1001, 101, 5),
(1001, 105, 1),
(1002, 100, 5),
(1002, 104, 4),
(1002, 105, 4),
(1003, 100, 1),
(1004, 100, 4),
(1004, 101, 4),
(1004, 104, 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `RecipeID` int(11) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Title` varchar(50) NOT NULL,
  `Permalink` varchar(250) NOT NULL,
  `R_description` text NOT NULL,
  `Ingredients` text NOT NULL,
  `Instructions` text NOT NULL,
  `Prep_time` varchar(11) NOT NULL,
  `Cook_time` varchar(11) NOT NULL,
  `No_of_servings` int(11) NOT NULL,
  `Difficulty` varchar(50) NOT NULL,
  `Recipe_image` varchar(255) NOT NULL,
  `Video_link` varchar(255) NOT NULL,
  `R_status` varchar(50) NOT NULL,
  `Created_timestamp` datetime NOT NULL,
  `Updated_timestamp` datetime DEFAULT NULL
) ;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`RecipeID`, `Category`, `UserID`, `Title`, `Permalink`, `R_description`, `Ingredients`, `Instructions`, `Prep_time`, `Cook_time`, `No_of_servings`, `Difficulty`, `Recipe_image`, `Video_link`, `R_status`, `Created_timestamp`, `Updated_timestamp`) VALUES
(100, 'Cake', 1000, 'Custard Sponge Cake', 'custard-sponge-cake', 'This sponge is so easy to make and has a subtle flavour of custard! I usually cut the cakes in half and join with lots of whipped cream, strawberries and grated flake. This recipe makes 2 cakes, so you can freeze one for later use.', '4 egg separated\r\n1 tsp vanilla essence\r\n3/4 cup caster sugar\r\n1/2 tsp bicarbonate of soda\r\n1 tsp cream of tartar\r\n3/4 cup cornflour\r\n1 tbs custard powder\r\n2 tbs hot water\r\n1 pinch salt\r\n1 tsp icing sugar\r\n1 tsp cornflour', 'Prepare 2 x 20 cm deep round cake tins. Grease with butter and dust with combined icing sugar and cornflour.\r\nPreheat oven to 180C.\r\nAdd vanilla to egg yolks.\r\nSift all dry ingredients, except salt and sugar, twice.\r\nBeat egg whites and salt until stiff. Gradually add sugar. Beat in yolks.\r\nFold in sifted dry ingredients, then the hot water.\r\nPour into prepared tins and bake for approximately 20 minutes, or until cakes shrink from the sides of the tin. When the cakes are ready they will also spring back when touched in the middle with a finger.', '20 min', '40 min', 10, 'Easy', 'Custard Sponge Cake.jpg', 'https://www.youtube.com/watch?v=WkafYQOEuSo', 'Public', '2021-09-20 10:20:24', '2021-10-10 20:30:00'),
(101, 'Pasta', 1001, 'Chicken pasta bake', 'chicken-pasta-bake', 'Cheesy Pasta Bake With Chicken And Bacon is one of those dinners that the kids can polish off in no time - regardless of how many veggies I sneak in there. Peppers, onions, tomatoes, spinach - it all gets thrown in.', '1 roast whole chicken cooked shredded\r\n500 g bowtie pasta shapes\r\n300 ml thickened cream\r\n2 chicken stock cube\r\n1 brown onion diced large\r\n1 tsp garlic minced\r\n350 g bacon rashers sliced\r\n1 cup cheese grated', 'Preheat oven to 190C.\r\nCook pasta according to packet directions.\r\nWhile pasta is cooking, in a medium sized bowl mix together cream, garlic, onion and bacon. Crumble both chicken stock cubes over the cream mixture and combine.\r\nDrain pasta, add cream mixture and stir to combine.\r\nAdd chicken, mix well.\r\nSpread into a baking tray, cover with cheese and bake for 20-30 minutes or until cheese has browned.', '15 min', '50 min', 4, 'Easy', 'Chicken pasta bake.jpg', 'https://www.youtube.com/watch?v=RkYz9L3LVfc\'', 'Private', '2021-10-06 13:37:21', '2021-09-20 21:20:15'),
(102, 'Cake', 1002, 'Lumberjack cake', 'lumberjack-cake', 'An old-fashioned, moist fruity cake to serve at your afternoon tea.', '2 apples large peeled cored finely chopped\r\n1 cup dates chopped\r\n1 tsp bicarbonate of soda\r\n1 cup boiling water\r\n125g soft butter\r\n1 tsp vanilla essence\r\n1 cup caster sugar\r\n1 egg\r\n1 1/2 cups plain flour\r\n60g butter\r\n1/2 cup brown sugar\r\n1/2 cup milk\r\n2/3 cup shredded coconut', 'Grease and line a deep 23cm square cake pan.\r\nCombine apples, dates and bicarbonate of soda in a bowl.\r\nAdd the water and leave for 10 minutes.\r\nBeat butter, sugar, vanilla and egg until light and fluffy.\r\nAdd butter to apple mixture and fold in flour.\r\nPour into a prepared pan and bake in a moderate oven for 50 minutes.\r\nTopping: Combine ingredients in a saucepan and stir until butter melts and sugar dissolves.\r\nRemove the cake from the oven and carefully spoon topping mixture over the cake. Return to oven and bake for further 20 minutes.\r\nStand cake for 5 minutes before turning onto a wire rack to cool.', '20 min', '1h 10min', 12, 'Medium', 'Lumberjack cake.jpg', 'https://www.youtube.com/watch?v=bedzX98fwRc', 'Public', '2021-10-06 13:39:19', '2021-10-06 13:39:19'),
(103, 'Salad', 1003, 'Caesar Potato Salad', 'caesar-potato-salad', 'Delicious potato salad made with creamy Caesar salad dressing.', '6 potatoes diced\r\n2 bacon rashers diced\r\n2 eggs hard-boiled roughly chopped\r\n1/4 cup carrot grated\r\n2 spring onions finely sliced\r\n1/3 cup Paul Newman\'s Own Caesar salad dressing\r\n1/3 cup mayonnaise\r\n1 sprig parsley chopped *optional\r\n1 pinch salt and pepper *to taste', 'Boil potatoes until just tender. Allow to cool.\r\nFry bacon until slightly crispy, or microwave between 2 sheets of paper towel for 2-3 minutes. Allow to cool.\r\nCombine potatoes, bacon, eggs, carrot, spring onions and parsley in a bowl, then season with salt and pepper.\r\nAdd Caesar dressing and mayonnaise, and mix well. Sprinkle with chopped parsley.', '10 min', '30 min', 6, 'Easy', 'Caesar Potato Salad.jpg', 'https://www.youtube.com/watch?v=7r8dQRh55yg', 'Public', '2021-10-06 13:47:22', '2021-10-06 13:47:22'),
(104, 'Rice', 1004, 'Fried rice', 'fried-rice', 'An easy recipe that nice on its own or as a side dish.', '1 1/2 cups basmati rice\r\n1 tbs peanut oil\r\n2 eggs lightly beaten\r\n5 spring onions sliced\r\n6 bacon rashers chopped\r\n1 carrot diced\r\n2 cups frozen peas and corn\r\n2 tbs soy sauce', 'Heat 1 teaspoon of the oil in a wok.\r\nCook the egg until just cooked, turning half way.\r\nRemove omelet from the wok and set aside. Slice into small pieces.\r\nBoil the rice in salted water for about 10 minutes, until just tender.\r\nWhile the rice is cooking, heat the rest of the oil in the wok and cook the spring onions for about two minutes.\r\nAdd the bacon and cook for several minutes until crisp.\r\nAdd the vegetables and cook for a further few minutes.\r\nAdd the soy sauce.\r\nAdd the cooked rice and sliced omelette and stir until hot.', '20 min', '40 min', 6, 'Easy', 'Fried rice.jpg', 'https://www.youtube.com/watch?v=GmWb7W7m2vs', 'Private', '2021-09-23 03:10:08', '2021-09-23 04:10:09'),
(105, 'Dessert', 1000, 'Dessert Lasagne', 'dessert-lasagne', 'This simple layered dessert comes together quickly and will disappear even faster. A  cookie crust is followed by a layer of cream cheese icing and chocolate pudding and then topped with whipped cream and chocolate chips for a dessert that looks impressive without all the hassle.', '4 fresh lasagne sheets\r\n500 g cream cheese\r\n250 g dried apricots diced\r\n150 g dried cranberries\r\n1/4 cup honey\r\n1/3 cup Italian marsala wine\r\n1 tbs vanilla essence\r\n150 g Oreo biscuits crumbled\r\n1 L vanilla custard', 'Soften cream cheese at room temperature.\r\nCombine softened cream cheese with apricots, cranberries, honey and marsala wine.\r\nRefrigerate for approximately 1 hour.\r\nUsing a 23cm x 16cm shallow baking dish, pour some of the custard into the bottom to cover the base, then layer the \"lasagne\" alternating between custard, crumbled cookies, cream cheese mixture and lasagne sheets.\r\nFinish off with cream cheese mix and crumbled cookies on the top.\r\nBake in a preheated oven at 180C (160C fan-forced) for approximately 1/2 hour, or until cooked through and lasagne sheets are al dente.\r\nServe as desired.', '15 min', '30 min', 8, 'Medium', 'Dessert Lasagne.jpg', 'https://www.youtube.com/watch?v=DSmtbl6ukr8', 'Public', '2021-09-24 10:02:01', '2021-09-20 10:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `User_email` varchar(150) NOT NULL,
  `User_Password` varchar(30) NOT NULL,
  `User_role` varchar(15) NOT NULL DEFAULT 'Normal'
) ;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`UserID`, `Username`, `User_email`, `User_Password`, `User_role`) VALUES
(1000, 'SystemUser1', 'user1@system.com', 'User1Password@12345*', 'Normal'),
(1001, 'SystemUser2', 'user2@system.com', 'User2Password@12345*', 'Normal'),
(1002, 'SystemUser3', 'user3@system.com', 'User3Password@12345*', 'Admin'),
(1003, 'SystemUser4', 'user4@system.com', 'User4Password@12345*', 'Normal'),
(1004, 'SystemUser5', 'user5@system.com', 'User5Password@12345*', 'Admin'),
(1005, 'SystemUser6', 'user6@system.com', 'User6Password@12345*', 'Normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`UserID`,`RecipeID`),
  ADD KEY `Bookmark_fk2` (`RecipeID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `Comment_fk1` (`UserID`),
  ADD KEY `Comment_fk2` (`RecipeID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`,`UserID`),
  ADD KEY `Feedback_fk1` (`UserID`);

--
-- Indexes for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD PRIMARY KEY (`UserID`,`First_name`,`Last_name`),
  ADD UNIQUE KEY `Profile_image` (`Profile_image`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`UserID`,`RecipeID`),
  ADD KEY `Rate_fk2` (`RecipeID`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`RecipeID`),
  ADD UNIQUE KEY `Permalink` (`Permalink`),
  ADD UNIQUE KEY `Recipe_image` (`Recipe_image`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `User_email` (`User_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `RecipeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `Bookmark_fk1` FOREIGN KEY (`UserID`) REFERENCES `system_users` (`UserID`),
  ADD CONSTRAINT `Bookmark_fk2` FOREIGN KEY (`RecipeID`) REFERENCES `recipe` (`RecipeID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `Comment_fk1` FOREIGN KEY (`UserID`) REFERENCES `system_users` (`UserID`),
  ADD CONSTRAINT `Comment_fk2` FOREIGN KEY (`RecipeID`) REFERENCES `recipe` (`RecipeID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `Feedback_fk1` FOREIGN KEY (`UserID`) REFERENCES `system_users` (`UserID`);

--
-- Constraints for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD CONSTRAINT `Profile_fk1` FOREIGN KEY (`UserID`) REFERENCES `system_users` (`UserID`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `Rate_fk1` FOREIGN KEY (`UserID`) REFERENCES `system_users` (`UserID`),
  ADD CONSTRAINT `Rate_fk2` FOREIGN KEY (`RecipeID`) REFERENCES `recipe` (`RecipeID`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_fk1` FOREIGN KEY (`UserID`) REFERENCES `system_users` (`UserID`),
  ADD CONSTRAINT `recipe_fk2` FOREIGN KEY (`UserID`) REFERENCES `profile_details` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
