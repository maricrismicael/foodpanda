-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 06:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodpanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `FK_LOCATION_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(70) NOT NULL,
  `LAST_NAME` varchar(70) NOT NULL,
  `EMAIL_ID` varchar(50) NOT NULL,
  `PASS` varchar(200) NOT NULL,
  `USER_TYPE` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CUSTOMER_ID`, `FK_LOCATION_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ID`, `PASS`, `USER_TYPE`) VALUES
(10004, 2005, 'Alesia', 'Torres', 'alesiatorres@gmail.com', '$2y$10$ToJJ643gNCkeJLaQ/l5sm.5AOmlisutZhhO4Md8dbSZt.GhkLbvAm', 0),
(10005, 2006, 'Sharon', 'Stephenson', 'sharonstephenson@gmail.com', '$2y$10$JPQJ98D3M8yLji3hOtl76.wjx.xe9pUDtSEg/m7uI8jV2IURNvkby', 0),
(10006, 2007, 'Kristie', 'Sadler', 'kristiesadler@gmail.com', '$2y$10$Il6XD0st5XIIL1HdCiCDI.BqPT2q2jaNpmQ33k1OsrKMLX.ujgYUu', 0),
(10007, 2008, 'Merilyn', 'Samuel', 'merilynsamuel@gmail.com', '$2y$10$n5qZOgeWA7rN20Ed6YMuSuAvnnxmPH53IlmQUgYzO/oVvKDlHFIpq', 0),
(10008, 2009, 'Oscar', 'Cruz', 'oscarcruz@gmail.com', '$2y$10$ToJJ643gNCkeJLaQ/l5sm.5AOmlisutZhhO4Md8dbSZt.GhkLbvAm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_phonenums`
--

CREATE TABLE `customers_phonenums` (
  `FK_CUSTOMER_ID` int(11) NOT NULL,
  `PHONE_NO` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_phonenums`
--

INSERT INTO `customers_phonenums` (`FK_CUSTOMER_ID`, `PHONE_NO`) VALUES
(10004, '9282921068'),
(10004, '9473536417'),
(10005, '9122055586'),
(10005, '9465126262'),
(10006, '9569055586'),
(10006, '9639026262'),
(10007, '9473535412'),
(10007, '9658926262'),
(10008, '9282945212'),
(10008, '9569545625');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `ITEM_ID` int(11) NOT NULL,
  `FK_RESTAURANT_ID` int(11) NOT NULL,
  `ITEM_NAME` varchar(150) NOT NULL,
  `DESCRIPTION` varchar(500) DEFAULT 'NO DESCRIPTION.',
  `UNIT_PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`ITEM_ID`, `FK_RESTAURANT_ID`, `ITEM_NAME`, `DESCRIPTION`, `UNIT_PRICE`) VALUES
(4000, 5000, 'Classic Sansrival', 'Four layers of crunchy sans rival dough filled with sweet and creamy butter icing and cashew nuts. The whole cake is iced with the same butter icing and generously sprinkled with cashew nuts.', 902),
(4001, 5000, 'Classic Mocha Whole Roll', 'Mocha flavored sponge cake with mocha butter crème filling and icing. This cake is decorated with mocha praline chocolate toppers and twin chocolate chips.', 369),
(4002, 5000, 'Butter Macaroons', 'Small round cookie made from desiccated coconut, sugar and eggwhites.', 70),
(4003, 5000, 'Black Forest Cake', 'Layers of rich chocolate cake filled with cherry cream. The whole cake is iced with whipped cream and the side is completely covered with chocolate shavings. The top is laced with whole cherries on top of cream rosettes.', 715),
(4004, 5000, 'Pastel Blooms Choco 8x12 with Filling', 'NO DESCRIPTION.', 715),
(4005, 5001, '8pc Chickenjoy Solo', '8 Pieces of our signature crispy juicy bone-in fried chicken. Served with a side of gravy for dipping. Choose from regular and spicy.', 549),
(4006, 5001, 'Burger Bundle', 'Cheesy Yumburger (3) Regular Jolly Fries (3) Regular Drinks (3)', 317),
(4007, 5001, '6pc Chicken Joy w/ Jollibee Palabok Pan', '6-pcs. of the Philippines’ best-tasting crispylicious, juicylicious Chickenjoy paired with your classic favorite saucy-sarap Palabok Family Pan with tasty toppings!', 740),
(4008, 5001, '6pc Chicken Joy w/ Jollibee Spaghetti Pan', 'Jollibee Meal Time Bundle brings you your favorite crispylicious, juicylicious Chickenjoy with the meatiest, cheesiest, sweet-sarap Jolly Spaghetti!', 659),
(4009, 5001, '1pc Chickenjoy w/ Burger Steak & Half Jolly Spaghetti Super Meal', 'NO DESCRIPTION.', 185),
(4010, 5002, 'Spaghetti with Meat Sauce', 'A childhood favorite you always go back to, moms spaghetti with meat sauce, served with garlic loaf bread.', 287),
(4011, 5002, 'Classic Maple Butter Pancakes', 'A new experience to our well-loved fluffy pancakes, crispy on the edges and moist on the inside served with special maple butter syrup.', 227),
(4012, 5002, 'Chocolate Marble Maple Butter Pancakes', 'A new experience to our well-loved fluffy pancakes, crispy on the edges and moist on the inside served with special maple butter syrup.', 263),
(4013, 5002, 'House Specials Set A', 'A delicious mix of specialties of the house, taco, spaghetti with meat sauce & garlic bread 1 pc. Classic pan chicken & juice.', 419),
(4014, 5002, 'Golden Brown Waffle', 'Classic and crispy delicious golden brown waffle.', 239),
(4015, 5003, 'Pork Tonkatsu Bento Ala Carte', 'Vegetable misono may be replaced with corn & mushroom depending on availability,', 215),
(4016, 5003, 'Beef Misono Bento Ala Carte', 'Vegetable misono may be replaced with corn & mushroom depending on availability.', 215),
(4017, 5003, 'Best Chicken Teriyaki Bento Ala Carte', 'Vegetable misono may be replaced with corn & mushroom depending on availability.', 215),
(4018, 5003, 'Wagyu Cubes Bento', '3 Sticks of premium wagyu beef made into tender steak cubes, grilled to perfection & glazed with unagi sauce. Served with 16 oz red iced tea. Vegetable misono may be replaced with corn & mushroom depending on availability.', 300),
(4019, 5003, 'Menchi Katsudon', 'Chicken menchi katsu with egg & sweet savory sauce, all on top of steamed rice. Served with red iced tea.', 235),
(4020, 5004, 'Mix Lugaw', 'Plain Lugaw with Hard Boiled Egg, Chicken and Oxtripe', 80),
(4021, 5004, 'Goto Especial', 'Plain Lugaw with Oxtripe', 60),
(4022, 5004, 'Egg Caldo', 'Plain Lugaw with Hard Boiled Egg', 55),
(4023, 5004, 'Arrozcaldo', 'Plain Lugaw with Chicken', 60),
(4024, 5004, 'Plain Lugaw', 'Lugaw Republic’s Plain Lugaw', 35);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `LOCATION_ID` int(11) NOT NULL,
  `FK_REGION_ID` int(11) NOT NULL,
  `STREET_ADDRESS` varchar(200) NOT NULL,
  `POSTAL_CODE` int(11) NOT NULL,
  `CITY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`LOCATION_ID`, `FK_REGION_ID`, `STREET_ADDRESS`, `POSTAL_CODE`, `CITY`) VALUES
(2000, 1000, 'J&F Divino Building, 967 Aurora Boulevard 1st District', 1109, 'Quezon City'),
(2001, 1000, '2195 Epifanio Delos Santos Avenue Barangay Guadalupe Nuevo 2nd District', 1200, 'Makati City'),
(2002, 1001, 'Hotel Tolentino Tolentino Avenue Barangay Tolentino East 8th District', 4120, 'Tagaytay City'),
(2003, 1000, 'Divimart San Pablo Maharlika Highway Barangay San Rafael 1st District', 4000, 'San Pablo City'),
(2004, 1000, '2324 Oroquieta Rd. Corner Old Antipolo St Sta. Cruz Manila, 1000 Manila', 1000, 'Manila City'),
(2005, 1000, '7957 Coronado St., Guadalupe Viejo', 1210, 'Makati City'),
(2006, 1000, '39-17 Dungon, Project 3', 1102, 'Quezon City'),
(2007, 1000, '92 Tolentino E Rd', 4115, 'Tagaytay City'),
(2008, 1001, '115 Sierra Madre St', 4000, 'San Pablo City'),
(2009, 1000, '2214 Ipil St, Santa Cruz', 1008, 'Manila City');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(11) NOT NULL,
  `FK_CUSTOMER_ID` int(11) NOT NULL,
  `ORDER_DATE` date DEFAULT current_timestamp(),
  `ORDER_TIME` time DEFAULT current_timestamp(),
  `ORDER_PRICE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `FK_CUSTOMER_ID`, `ORDER_DATE`, `ORDER_TIME`, `ORDER_PRICE`) VALUES
(6006, 10004, '2022-07-24', '23:50:02', 1911),
(6007, 10005, '2022-07-24', '23:53:26', 557),
(6008, 10006, '2022-07-24', '23:56:36', 897),
(6009, 10007, '2022-07-24', '23:58:49', 597),
(6010, 10008, '2022-07-25', '00:02:26', 403);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `FK_ORDER_ID` int(11) NOT NULL,
  `FK_ITEM_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `SUBTOTAL` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`FK_ORDER_ID`, `FK_ITEM_ID`, `QUANTITY`, `SUBTOTAL`) VALUES
(6006, 4006, 1, 317),
(6006, 4007, 2, 1480),
(6007, 4001, 1, 369),
(6007, 4002, 1, 70),
(6008, 4012, 3, 789),
(6009, 4019, 2, 470),
(6010, 4021, 1, 60),
(6010, 4022, 4, 220);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `FK_ORDER_ID` int(11) NOT NULL,
  `FK_CUSTOMER_ID` int(11) NOT NULL,
  `ORDER_AMOUNT` float NOT NULL,
  `DELIVERY_CHARGE` float NOT NULL,
  `TAX` float NOT NULL,
  `METHOD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`FK_ORDER_ID`, `FK_CUSTOMER_ID`, `ORDER_AMOUNT`, `DELIVERY_CHARGE`, `TAX`, `METHOD`) VALUES
(6006, 10004, 1797, 70, 44, 'Cash On Delivery'),
(6007, 10005, 439, 71, 47, 'Cash On Delivery'),
(6008, 10006, 789, 52, 56, 'Cash On Delivery'),
(6009, 10007, 470, 79, 48, 'Cash On Delivery'),
(6010, 10008, 280, 65, 58, 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `REGION_ID` int(11) NOT NULL,
  `REGION_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`REGION_ID`, `REGION_NAME`) VALUES
(1000, 'National Capital Region'),
(1001, 'CALABARZON'),
(1002, 'Central Luzon'),
(1003, 'Ilocos Region'),
(1004, 'Bicol Region'),
(1005, 'Central Visayas');

-- --------------------------------------------------------

--
-- Table structure for table `sitedetail`
--

CREATE TABLE `sitedetail` (
  `tempId` int(11) NOT NULL,
  `systemName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` bigint(21) NOT NULL,
  `contact2` bigint(21) DEFAULT NULL COMMENT 'Optional',
  `address` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitedetail`
--

INSERT INTO `sitedetail` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) VALUES
(1, 'Food Panda Delivery', 'foodpandadelivery@gmail.com', 9566595176, 9566595176, 'Manila, Philippines', '2021-03-23 19:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `RESTAURANT_ID` int(11) NOT NULL,
  `FK_LOCATION_ID` int(11) NOT NULL,
  `RESTAURANT_NAME` varchar(70) NOT NULL,
  `USER_RATING` int(11) NOT NULL,
  `RESTAURANT_DESC` varchar(500) DEFAULT 'NO DESCRIPTION.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`RESTAURANT_ID`, `FK_LOCATION_ID`, `RESTAURANT_NAME`, `USER_RATING`, `RESTAURANT_DESC`) VALUES
(5000, 2000, 'GOLDILOCKS', 4, 'Asian • Desserts • Southeast Asian • Filipino Cakes'),
(5001, 2001, 'JOLLIBEE', 5, 'Asian • Burgers • Fast Food • Meat • Chicken'),
(5002, 2002, 'PANCAKE HOUSE', 3, 'Sandwiches • Desserts • American • Western • Bread'),
(5003, 2003, 'TOKYO TOKYO', 4, 'Japanese • Asian • Seafood • Sushi • Rice Dishes'),
(5004, 2004, 'LUGAW REPUBLIC', 4, 'Asian • Rice Dishes • Southeast Asian • Filipino • Congee');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `CARTITEMID` int(11) NOT NULL,
  `FK_ITEM_ID` int(11) NOT NULL,
  `FK_CUSTOMER_ID` int(11) NOT NULL,
  `ITEM_QUANTITY` int(11) NOT NULL,
  `ADDED_DATE` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`CARTITEMID`, `FK_ITEM_ID`, `FK_CUSTOMER_ID`, `ITEM_QUANTITY`, `ADDED_DATE`) VALUES
(9026, 4006, 10008, 1, '2022-07-25 00:02:55'),
(9027, 4007, 10008, 1, '2022-07-25 00:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUSTOMER_ID`),
  ADD KEY `FK_LOCATION_ID` (`FK_LOCATION_ID`);

--
-- Indexes for table `customers_phonenums`
--
ALTER TABLE `customers_phonenums`
  ADD PRIMARY KEY (`FK_CUSTOMER_ID`,`PHONE_NO`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`ITEM_ID`),
  ADD KEY `FK_RESTAURANT_ID` (`FK_RESTAURANT_ID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`LOCATION_ID`),
  ADD KEY `FK_REGION_ID` (`FK_REGION_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `FK_CUSTOMER_ID` (`FK_CUSTOMER_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`FK_ORDER_ID`,`FK_ITEM_ID`),
  ADD KEY `FK_ITEM_ID` (`FK_ITEM_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`FK_ORDER_ID`,`FK_CUSTOMER_ID`),
  ADD KEY `FK_CUSTOMER_ID` (`FK_CUSTOMER_ID`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`REGION_ID`);

--
-- Indexes for table `sitedetail`
--
ALTER TABLE `sitedetail`
  ADD PRIMARY KEY (`tempId`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`RESTAURANT_ID`),
  ADD KEY `FK_LOCATION_ID` (`FK_LOCATION_ID`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`CARTITEMID`),
  ADD KEY `FK_ITEM_ID` (`FK_ITEM_ID`),
  ADD KEY `FK_CUSTOMER_ID` (`FK_CUSTOMER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10009;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4025;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2014;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6011;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `REGION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `sitedetail`
--
ALTER TABLE `sitedetail`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `RESTAURANT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5005;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `CARTITEMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9028;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`FK_LOCATION_ID`) REFERENCES `locations` (`LOCATION_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers_phonenums`
--
ALTER TABLE `customers_phonenums`
  ADD CONSTRAINT `customers_phonenums_ibfk_1` FOREIGN KEY (`FK_CUSTOMER_ID`) REFERENCES `customers` (`CUSTOMER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`FK_RESTAURANT_ID`) REFERENCES `vendors` (`RESTAURANT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`FK_REGION_ID`) REFERENCES `regions` (`REGION_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`FK_CUSTOMER_ID`) REFERENCES `customers` (`CUSTOMER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`FK_ITEM_ID`) REFERENCES `goods` (`ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`FK_ORDER_ID`) REFERENCES `orders` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`FK_ORDER_ID`) REFERENCES `orders` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`FK_CUSTOMER_ID`) REFERENCES `customers` (`CUSTOMER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`FK_LOCATION_ID`) REFERENCES `locations` (`LOCATION_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD CONSTRAINT `viewcart_ibfk_1` FOREIGN KEY (`FK_ITEM_ID`) REFERENCES `goods` (`ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viewcart_ibfk_2` FOREIGN KEY (`FK_CUSTOMER_ID`) REFERENCES `customers` (`CUSTOMER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
