-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 08:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tinytots`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `category_id`) VALUES
(1, 'Sleeping baby', 3),
(2, 'Baby eat', 1),
(3, 'Baby diapers', 1),
(4, 'Newborn clothes', 2),
(5, 'Girl fashion', 2),
(6, 'Boy fashion', 2),
(7, 'Baby shoes', 2),
(8, 'accessory', 2),
(9, 'Stuffed animals - dolls', 3),
(10, 'Newborn toys', 3),
(11, 'Play mat', 3),
(12, 'Active toys - outdoor', 3),
(13, 'Wooden toys - education', 3),
(14, 'Lego toys', 3),
(15, 'Baby health care', 4),
(16, 'Hygiene care for babies', 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cate_name`) VALUES
(1, 'Baby Care'),
(2, 'Fashinon '),
(3, 'Toys'),
(4, 'Wellness And Hygience');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `address`, `phone`, `note`, `created_at`, `update_at`) VALUES
(1, 'hải', 'hai12@gmail.com', 'hà nam_ninh bình', '1234567890', 'hàng đểu', 2147483647, 2147483647),
(6, 'khong', 'hao@gmal.com', 'Thượng Lạp-Tân Tiến- Vĩnh Tường', '0387478952', 'ádasdasd', 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `note`, `phone`, `address`, `total`, `created_at`, `updated_at`) VALUES
(7, 'dovanhao', 'hg', '0387478952', 'Thượng Lạp-Tân Tiến- Vĩnh Tường', 80.00, 1684214700, 1684214700),
(8, 'hai', 'sdfds', '1234567890', 'Vĩnh Long', 330.00, 1684214723, 1684214723);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `created_date` int(11) DEFAULT NULL,
  `last_updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`, `created_date`, `last_updated`) VALUES
(1, 7, 1, 1, 80.00, 0, 1684214700, 1684214700),
(2, 8, 6, 6, 55.00, 0, 1684214723, 1684214723);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_product`, `price`, `description`, `thumbnail`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Baby Bibs', 80.00, 'Baby Bibs are an essential product for babies and children as they begin to learn to feed themselves. These napkins are specially designed to keep your baby&#39;s clothes clean and dry while eating. They&#39;re made of baby-safe materials like cotton or polyester, soft and breathable to help keep your baby comfortable and free of skin irritation. Baby Bibs come in a variety of designs and colors to suit your baby&#39;s taste and style and make eating more enjoyable.\r\n', './uploads/6(1).jpg', 2, 1683175342, 1683175342),
(2, 'Set Baby Infant Food', 20.00, 'If you&#39;re looking for a set of baby food products to introduce to your baby, there are many options available on the market. Here are some common types of baby food sets: Starter sets: These sets typically include single-grain cereals, pureed fruits and vegetables, and other basic foods that are appropriate for babies who are just starting to eat solid foods. Organic sets: These sets are made up of organic baby foods that are free from pesticides and other harmful chemicals. Variety sets: These sets contain a variety of different baby foods, including pureed fruits, vegetables, and meats, as well as cereals and snacks. Homemade baby food sets: These sets include tools and recipes for making your own baby food at home. They may include a food processor, storage containers, and recipe books. Subscription services: Some companies offer subscription services that deliver a variety of baby food products to your door on a regular basis. When choosing a baby food set, it&#39;s important to consider your baby&#39;s age and nutritional needs, as well as any allergies or sensitivities they may have. You should also check the ingredients list and nutritional information for each product to ensure that it meets your baby&#39;s needs. Finally, it&#39;s always a good idea to consult with your pediatrician before introducing new foods to your baby&#39;s diet.\r\n', './uploads/3(1).jpg', 2, 1683175386, 1683175386),
(3, 'Infant Drink Cup Child', 30.00, 'An infant drink cup is a specially designed cup for babies who are transitioning from breast milk or formula to drinking from a cup. Infant drink cups are typically made from BPA-free plastic or silicone and are designed to be easy for babies to hold and drink from.\r\n', './uploads/4.jpg', 2, 1683175427, 1683175427),
(4, 'Baby Food Set', 30.00, 'A baby food set is a collection of products designed to help parents introduce solid foods to their babies. There are many different types of baby food sets available, ranging from basic starter sets to more comprehensive sets that include a variety of foods and accessories.\r\n', './uploads/5.jpg', 2, 1683175502, 1683175502),
(5, 'Baby Drink Dropper', 30.00, 'A baby drink dropper is a small tool designed to help parents and caregivers give liquids to babies who are too young to drink from a cup or bottle. It is typically a small plastic or silicone dropper with a soft, flexible tip that can be used to drip liquid into the baby&#39;s mouth.\r\n\r\nHere are some common features of a baby drink dropper:\r\n\r\n\r\n	\r\n	Soft, flexible tip: The tip of the dropper is usually made from soft, flexible material that is gentle on the baby&#39;s mouth and gums.\r\n	\r\n	\r\n	Graduated markings: Some baby drink droppers have graduated markings on the side to help you measure the amount of liquid you are giving your baby.\r\n	\r\n	\r\n	Easy to clean: Baby drink droppers are usually easy to clean and can be sterilized to ensure that they are free from bacteria.\r\n	\r\n	\r\n	Compact and portable: Baby drink droppers are small and lightweight, making them easy to take with you when you are on-the-go.\r\n	\r\n\r\n\r\nBaby drink droppers can be used to give water, breast milk, formula, or other liquids to babies who are too young to drink from a cup or bottle. However, it&#39;s important to use the dropper as directed and to always follow your pediatrician&#39;s recommendations for feeding your baby.\r\n', './uploads/2.jpg', 2, 1683175588, 1683175588),
(6, 'Bear Bed', 55.00, 'A bear bed is a type of bed designed to resemble a bear or have a bear theme. It is usually made for young children and is often designed to be cozy and inviting, with soft, plush materials and a fun design.\r\n\r\nBear beds may come in a variety of shapes and sizes, from a bed with a bear headboard or footboard to a bed that is shaped like a bear itself. Some bear beds may also come with additional features, such as built-in storage or a play area underneath the bed.\r\n\r\nWhen choosing a bear bed for your child, it&#39;s important to consider factors such as safety, durability, and comfort. Look for beds that are made from high-quality materials and are designed with safety features such as sturdy rails and non-toxic finishes. You should also consider the size of the bed and make sure it is appropriate for your child&#39;s age and size.\r\n\r\nIn addition to being a functional piece of furniture, a bear bed can also be a fun and exciting addition to a child&#39;s bedroom. It can provide a cozy and inviting space for your child to sleep and play, and can help foster their imagination and creativity.\r\n', './uploads/1(1)(2).jpg', 1, 1683175663, 1683175663),
(7, 'Bee Bed', 50.00, 'A bee bed is a type of bed designed to resemble a bee or have a bee theme. It is usually made for young children and is often designed to be fun and inviting, with bright colors, playful designs, and soft materials. Bee beds may come in a variety of shapes and sizes, from a bed with a bee headboard or footboard to a bed that is shaped like a bee itself. Some bee beds may also come with additional features, such as built-in storage or a play area underneath the bed. When choosing a bee bed for your child, it&#39;s important to consider factors such as safety, durability, and comfort. Look for beds that are made from high-quality materials and are designed with safety features such as sturdy rails and non-toxic finishes. You should also consider the size of the bed and make sure it is appropriate for your child&#39;s age and size. In addition to being a functional piece of furniture, a bee bed can also be a fun and exciting addition to a child&#39;s bedroom. It can provide a cozy and inviting space for your child to sleep and play, and can help foster their imagination and creativity.\r\n', './uploads/2(1).jpg', 1, 1683175733, 1683175733),
(8, 'Cat Bed', 30.00, 'A cat bed is a piece of furniture designed specifically for cats to sleep on. It is usually a small, enclosed space that provides a cozy and secure place for cats to rest. Cat beds may come in a variety of shapes, sizes, and materials, depending on the needs and preferences of your cat.\r\n', './uploads/3(1)(2).jpg', 1, 1683175789, 1683175789),
(9, 'Cow Bed', 30.00, 'A cow bed is a type of bed designed to resemble a cow or have a cow theme. It is usually made for young children and is often designed to be fun and inviting, with soft materials and playful designs.\r\n', './uploads/6(1)(2).jpg', 1, 1683175959, 1683175959),
(10, 'Unidry', 55.00, 'I apologize, but I am still not sure what specific product you are referring to as &quot;Unidry for baby&quot; as there may be multiple products with that name. Can you please provide more information or context about the product, such as the brand or manufacturer, so I can better assist you in describing the product?\r\n', './uploads/1(1)(2)(3).jpg', 3, 1683176087, 1683176087),
(11, 'Merries', 50.00, 'Merries is a brand that produces disposable diapers for infants and toddlers, owned by the multinational corporation Unicharm Corporation based in Japan. Merries products are developed based on scientific research on child development and meet the requirements for quality, safety, and comfort. Merries is popular in many countries around the world due to its high quality, intelligent design, and effective anti-leak features.\r\n', './uploads/4(1)(2)(3).jpg', 3, 1683192212, 1683192212),
(12, 'Goon', 35.00, 'Goon is a popular Japanese brand that produces a range of baby products, including diapers, wet wipes, and baby toiletries. Their diapers are highly regarded for their quality and functionality.\r\n\r\nGoon diapers are made with a soft and breathable material that helps keep babies comfortable and dry. They also feature a unique 3D shape that provides a snug fit and helps prevent leaks. Additionally, they have a wetness indicator that changes color to let you know when it&#39;s time for a diaper change.\r\n', './uploads/7(1)(2).jpg', 3, 1683192267, 1683192267),
(13, 'Huggies Dry', 30.00, 'Huggies Dry is a brand of disposable diapers produced by the global consumer goods company Kimberly-Clark. The diapers are designed with a Leak Lock System that provides up to 12 hours of protection and are made with a soft and breathable outer cover to keep babies comfortable. Huggies Dry also offers various sizes to fit the needs of growing babies, from newborns to toddlers. The brand is widely recognized and trusted by parents around the world for its high quality and reliable performance.\r\n', './uploads/8.jpg', 3, 1683192316, 1683192316),
(14, 'Newborn Baby Set', 30.00, 'A newborn baby set typically includes a variety of items that new parents may need for their newborn baby. These sets may include things such as onesies, bibs, blankets, diapers, wipes, and other essential items that can help make caring for a newborn a little easier. The contents of a newborn baby set can vary depending on the brand and retailer, and may also come in different sizes to accommodate the age and size of the baby. Some sets may also include items such as pacifiers, bottles, and other feeding accessories. Newborn baby sets can make a great gift for expectant parents or as a way to prepare for the arrival of a new baby.\r\n', './uploads/9.jpg', 4, 1683194347, 1683194347),
(15, 'Baby Biby For Newborns', 30.00, 'Baby bibs for newborns are small, absorbent cloths or pieces of fabric that are worn around a baby&#39;s neck during feeding to protect their clothes from spills and dribbles. They are typically made of soft and comfortable materials, such as cotton or muslin, and come in a variety of colors and designs. Baby bibs for newborns can help prevent staining and reduce the need for frequent clothing changes, making them a practical and convenient accessory for parents. Some bibs may also have adjustable snaps or ties for a secure fit, and may feature additional features such as waterproof backing or food-catching pockets.\r\n', './uploads/20.jpg', 4, 1683194689, 1683194689),
(16, 'Baby bibs for newborns', 30.00, 'Baby bibs for newborns are small cloths or pieces of fabric that are placed around the neck of a baby to catch any spills or dribbles while they are feeding. They are typically made of soft and absorbent materials, such as cotton or terry cloth, and may have a waterproof or water-resistant backing to prevent the baby&#39;s clothes from getting wet. Some baby bibs for newborns also come with adjustable snap or Velcro closures to ensure a secure and comfortable fit around the baby&#39;s neck. They come in a variety of colors, patterns, and designs to suit different preferences and styles.\r\n', './uploads/13.jpg', 4, 1683194736, 1683194736),
(17, 'Moony', 20.00, 'Moony is a brand of disposable diapers for babies produced by the Japanese company Unicharm Corporation. Moony diapers are designed to provide maximum comfort and protection for babies while also being gentle on their delicate skin. They use advanced Japanese technology to ensure that the diapers are ultra-soft and absorbent, and they also feature a unique 3D shape that fits snugly to the baby&#39;s body. Moony diapers come in a range of sizes to fit babies of all ages, and they are available in both tape and pants styles. The brand is known for its high quality and has a strong following in Japan and other countries around the world.\r\n', './uploads/5.png', 3, 1683246368, 1683246368),
(18, 'Triangle towel', 55.00, 'A triangle towel is a type of towel that is designed in the shape of a triangle. It is typically used for a variety of purposes such as drying hands, wiping surfaces, or cleaning spills. Triangle towels are commonly made from soft and absorbent materials such as cotton, microfiber, or bamboo. They are also available in a variety of sizes and colors to suit different preferences and needs. The triangular shape of the towel allows for easy folding and storage, making it a convenient accessory to have in the kitchen, bathroom, or for outdoor activities.\r\n', './uploads/yem1.jpg', 4, 1683246670, 1683246670),
(19, 'Red Baby Dress', 55.00, 'A red baby dress is a type of clothing item typically worn by infant girls. It is a dress that is designed to fit the small size of babies and is made with soft, comfortable materials suitable for their delicate skin. The color red is a popular choice for baby dresses, as it is often associated with energy, passion, and vibrancy. Red baby dresses can come in different styles and designs, ranging from simple and classic to more elaborate and festive, depending on the occasion. They are a popular choice for events such as holidays, birthdays, and special occasions.\r\n', './uploads/1(1)(2)(3)(4).jpg', 5, 1683247048, 1683247048),
(20, 'Black Baby Dress', 50.00, 'A black baby dress could refer to any type of dress that is designed for infants or young children and is predominantly black in color. It could be a simple cotton or knit dress for everyday wear, or a more formal dress for special occasions such as weddings, baptisms, or holiday celebrations. The dress could be sleeveless, short-sleeved, or long-sleeved, and may feature embellishments such as bows, lace, or embroidery. Black is a classic color that is often chosen for formal or elegant events, but can also be worn for everyday occasions as a chic and stylish option.\r\n', './uploads/2(1)(2).jpg', 5, 1683247078, 1683247078),
(21, 'Baby Play Set', 20.00, 'A baby play set typically refers to a collection of toys and playthings that are designed for infants and young children to play with. These play sets can include items such as soft toys, rattles, teething rings, play mats, and activity centers. They may also include items that stimulate a child&#39;s senses, such as colorful mobiles, music boxes, and textured toys. The goal of a baby play set is to provide a safe and stimulating environment for a child to play in and to encourage their development and growth.\r\n', './uploads/3(1)(2)(3).jpg', 5, 1683249056, 1683249056),
(22, 'Floral Print Baby Dress', 70.00, 'Floral Print Baby Dress is a type of dress made for baby girls that features a floral pattern on the fabric. The dress is usually made of lightweight and breathable materials such as cotton or polyester to keep the baby comfortable. The floral design can come in various colors and sizes, and may be accompanied by ruffles, lace, or other embellishments to add a cute and feminine touch. Floral Print Baby Dresses are often worn for special occasions such as weddings, parties, or photo shoots, but can also be worn as everyday attire.\r\n', './uploads/4(1)(2)(3)(4).jpg', 5, 1683249328, 1683249328),
(23, 'Dark Dress For Baby', 30.00, 'The Dark Dress For Baby is a stylish and elegant dress designed for baby girls. It features a dark-colored fabric with a soft and comfortable texture, making it perfect for everyday wear or special occasions. The dress has short sleeves and a round neckline, with a fitted bodice that flares out into a full, twirl-worthy skirt. The back of the dress is fastened with a zipper, making it easy to put on and take off. The simple yet sophisticated design of this dress is sure to make your little one stand out and feel confident and comfortable all day long.\r\n', './uploads/8(1).jpg', 5, 1683249666, 1683249666),
(24, 'Red Jumpsuit For Baby', 30.00, 'Red jumpsuit for baby is a one-piece garment that covers the whole body of the baby. It usually has long sleeves and legs, and can be made from different materials such as cotton or polyester. Red jumpsuits for babies can be a cute and stylish option for special occasions or everyday wear. They often feature convenient snaps or zippers for easy dressing and changing. Red color can also make a bold fashion statement and add a pop of color to a baby&#39;s wardrobe.\r\n', './uploads/9(1).jpg', 5, 1683249690, 1683249690),
(25, 'Little Monkey Clothes', 50.00, '&quot;Little Monkey Clothes&quot; is a general term that can refer to any clothing item designed for babies or young children featuring a monkey theme. These clothes may include onesies, shirts, pants, dresses, and more, all with monkey designs or patterns. The clothes are often made from soft and comfortable materials, such as cotton, to ensure that they are gentle on a baby&#39;s delicate skin. The monkey theme is a popular choice for baby clothes due to its playful and cute nature, and it can be suitable for both boys and girls.\r\n', './uploads/2(1)(2)(3).jpg', 6, 1683249852, 1683249852),
(26, 'Baby Winter Set', 30.00, '&nbsp;\r\n\r\nA baby winter set typically includes warm clothing items to keep a baby cozy during the colder months. The set may include a winter coat, snowsuit, hat, mittens, and boots. These items are designed with warm and soft materials, such as fleece or down, to provide insulation and protection from the cold weather. Baby winter sets come in a variety of colors and designs, making it easy to find a style that suits the baby&#39;s personality and preferences. They are essential items for parents living in areas with cold winters, as they help to ensure the baby&#39;s comfort and health during the colder months.\r\n', './uploads/3(1)(2)(3)(4).jpg', 6, 1683249880, 1683249880),
(27, 'Baby Bib Set', 40.00, 'A baby bib set typically includes multiple bibs that are designed to protect a baby&#39;s clothing during feedings. The bibs are typically made from soft and absorbent materials such as cotton or terry cloth, and feature adjustable snaps or Velcro closures for a secure fit. Some bib sets may come in different sizes to accommodate babies of different ages, and they often come in a variety of colors and patterns to suit different tastes and styles. Baby bib sets are a practical and essential item for any new parent or caregiver, as they make feeding time easier and help to minimize messes and spills.\r\n', './uploads/5(1)(2)(3).jpg', 6, 1683249948, 1683249948),
(28, 'Children&#039;s Clothes With National Flag Motifs', 50.00, 'Children&#39;s clothes with national flag motifs are garments designed with the flag or emblem of a particular country as part of their design. These clothes are often created for special occasions, such as national holidays or sporting events, to show patriotism and support for a particular country. They can come in various forms, including t-shirts, dresses, jackets, and accessories such as hats or scarves. Some children&#39;s clothes with national flag motifs are also designed to be more casual and worn in everyday situations. They can be a fun and creative way to showcase national pride while also providing a unique and fashionable style for children.\r\n', './uploads/6(1)(2)(3)(4).jpg', 6, 1683249981, 1683249981),
(29, 'Black And White Baby Shoes', 55.00, 'Black and white baby shoes are a popular choice for parents who want a classic and versatile look for their little one&#39;s footwear.\r\n', './uploads/1.1.jpg', 7, 1683250221, 1683250221),
(30, 'Colorful Baby Shoes', 30.00, 'Colorful baby shoes are a fun and vibrant option for parents who want to add some personality to their little one&#39;s wardrobe.\r\n', './uploads/3(1)(2)(3)(4)(5).jpg', 7, 1683250248, 1683250248),
(31, 'Baby Red Shoes', 40.00, 'Baby red shoes can be a cute and vibrant addition to your little one&#39;s wardrobe\r\n', './uploads/2(1)(2)(3)(4).jpg', 7, 1683250276, 1683250276),
(32, 'Pink Baby Girl Accessories', 40.00, 'Pink baby girl accessories are a popular choice for parents who want to add a touch of femininity and sweetness to their baby girl&#39;s outfits.\r\n', './uploads/2(1)(2)(3)(4)(5).jpg', 8, 1683250446, 1683250446),
(33, 'Shawl For Newborn Baby', 70.00, 'A shawl for a newborn baby can be a cozy and comfortable accessory that can help keep your baby warm and snug.\r\n', './uploads/4(1)(2)(3)(4)(5)(6).jpg', 8, 1683250473, 1683250473),
(34, 'Baby Tie', 30.00, 'A baby tie can be a cute and stylish accessory for special occasions like weddings, parties, or family gatherings.\r\n', './uploads/5(1)(2)(3)(4).jpg', 8, 1683250503, 1683250503),
(35, 'Baby Boy Hat', 40.00, '', './uploads/6(1)(2)(3)(4)(5).jpg', 8, 1683250525, 1683250525),
(36, 'Cotton Dolls', 55.00, 'Cotton dolls are stuffed toys made of cotton materials.\r\n', './uploads/1.png', 9, 1683250752, 1683250752),
(37, 'Pikachu', 50.00, 'Pikachu is a popular character from the Pok&eacute;mon franchise, which originated in Japan. Pikachu is a yellow, mouse-like creature with red cheeks and a lightning bolt-shaped tail.\r\n', './uploads/7(1)(2)(3)(4).jpg', 9, 1683250777, 1683250777),
(38, 'Cotton Dinosaur', 40.00, 'A cotton dinosaur is a stuffed toy made of cotton materials in the shape of a dinosaur.\r\n', './uploads/8(1)(2).jpg', 9, 1683250815, 1683250815),
(39, 'Teddy Bear', 40.00, 'A teddy bear is a stuffed toy in the shape of a bear, typically made of soft materials such as plush or cotton. Teddy bears are popular toys for children of all ages and are often associated with comfort, security, and childhood memories.\r\n', './uploads/5(1)(2)(3)(4)(5).jpg', 9, 1683251284, 1683251284),
(40, 'Cotton Giraffe', 30.00, 'A cotton giraffe is a stuffed toy made of cotton materials in the shape of a giraffe.\r\n', './uploads/6(1)(2)(3)(4)(5)(6).jpg', 9, 1683251357, 1683251357),
(41, 'Plastic Toy', 55.00, '&nbsp;\r\n\r\nA plastic toy is a toy made of plastic materials. Plastic toys come in a wide variety of shapes and sizes, and can be suitable for children of all ages.\r\n', './uploads/1(1)(2)(3)(4)(5)(6)(7).jpg', 10, 1683251528, 1683251528),
(42, 'Plastic Toy', 50.00, 'This colorful and fun plastic toy is perfect for entertaining your little one! Made with safe and durable materials, it features bright colors and different textures to engage your baby&#39;s senses and stimulate their development.\r\n\r\nThe toy has a lightweight and easy-to-hold design, making it perfect for tiny hands to grasp and manipulate. The various shapes and textures will help your baby develop their motor skills, hand-eye coordination, and cognitive abilities as they explore and play.\r\n', './uploads/3(1)(2)(3)(4)(5)(6)(7)(8).jpg', 10, 1683251552, 1683251552),
(43, 'Soft Foam Baby Mat', 55.00, 'A soft foam baby mat is a cushioned play surface designed for babies to lie on and play. It provides a comfortable and safe place for babies to explore their surroundings, learn new skills, and practice tummy time.\r\n', './uploads/1(1)(2)(3)(4)(5)(6)(7)(8).jpg', 11, 1683251739, 1683251739),
(44, 'Soft Foam Baby Mat 1', 70.00, 'A soft foam baby mat is a cushioned play surface designed for babies to lie on and play. It provides a comfortable and safe place for babies to explore their surroundings, learn new skills, and practice tummy time.\r\n', './uploads/3(1)(2)(3)(4)(5)(6)(7)(8)(9).jpg', 11, 1683251797, 1683251797),
(45, 'Soft Foam Baby Mat', 50.00, 'A soft foam baby mat is a cushioned play surface designed for babies to lie on and play. It provides a comfortable and safe place for babies to explore their surroundings, learn new skills, and practice tummy time.\r\n', './uploads/8(1)(2)(3).jpg', 11, 1683251825, 1683251825),
(46, 'Soft Foam Baby Mat', 70.50, 'A soft foam baby mat is a cushioned play surface designed for babies to lie on and play. It provides a comfortable and safe place for babies to explore their surroundings, learn new skills, and practice tummy time.\r\n', './uploads/9(1)(2)(3).jpg', 11, 1683251883, 1683251883),
(47, 'Swing', 50.00, 'Climbing toys for kids are designed to help children develop their motor skills, coordination, and balance while also providing them with fun and active playtime.\r\n', './uploads/8(1)(2)(3)(4).jpg', 12, 1683252014, 1683252014),
(48, 'Climbing Toys For Kids', 55.00, 'Climbing toys for kids are designed to help children develop their motor skills, coordination, and balance while also providing them with fun and active playtime.\r\n', './uploads/1(1)(2)(3)(4)(5)(6)(7)(8)(9).jpg', 12, 1683252061, 1683252061),
(49, 'Extreme Timber Extreme', 70.00, 'Climbing toys should have safety features such as non-slip surfaces, handrails, and sturdy bases to prevent accidents and injuries.\r\n', './uploads/3(1)(2)(3)(4)(5)(6)(7)(8)(9)(10)(11).jpg', 12, 1683252262, 1683252262),
(50, 'Logic Training For Kids', 55.00, 'Logic training for kids involves activities and exercises that help children develop their critical thinking and problem-solving skills.\r\n', './uploads/1(1)(2)(3)(4)(5)(6)(7)(8)(9)(10).jpg', 13, 1683252601, 1683252601),
(51, 'Counting Numbers For Kids', 50.25, '&nbsp;\r\n\r\nCounting numbers is an important skill for kids to learn as it is the foundation for math and other analytical skills.\r\n', './uploads/11(1).jpg', 13, 1683252624, 1683252624),
(52, 'Logic Training For Kids', 40.00, 'Logic training for kids is an essential tool for enhancing their cognitive abilities, critical thinking, problem-solving, and decision-making skills. Our logic training program is specially designed for children between the ages of 5 and 12 years old.\r\n\r\nThe program consists of a series of fun and engaging activities that help children develop their logic and reasoning skills in a creative and interactive way. Our trained instructors use a variety of teaching methods to keep children motivated and engaged throughout the program.\r\n', './uploads/12.jpg', 13, 1683252708, 1683252708),
(53, 'Toy Excavator', 60.00, '&nbsp;\r\n\r\nA toy excavator is a miniature version of a real excavator that kids can play with. It&#39;s a popular toy among young children who are fascinated by construction vehicles and building activities.\r\n', './uploads/1(1)(2)(3)(4)(5)(6)(7)(8)(9)(10)(11).jpg', 14, 1683252740, 1683252740),
(54, 'City Lego', 80.00, 'City Lego for babies is the perfect way to introduce your little one to the world of building and creativity. Made with soft and safe materials, our City Lego sets are designed to encourage imagination and exploration in young children.\r\n\r\nOur sets come in a variety of sizes and themes, each with colorful and easy-to-grip pieces that are perfect for small hands. From building a bustling cityscape to constructing a charming farm, the possibilities are endless with our City Lego sets.\r\n\r\nNot only do our sets provide endless hours of fun, but they also help to develop important skills such as hand-eye coordination, spatial awareness, and problem-solving. And with our commitment to safety and quality, you can rest assured that your child is playing with a toy that is both educational and enjoyable.\r\n', './uploads/2(1)(2)(3)(4)(5)(6).jpg', 14, 1683252762, 1683252762),
(55, 'Minecraft Lego Pink', 70.00, '\r\nMinecraft Lego Pink is a construction toy product designed specifically for young children. This is a combination toy between Minecraft - a famous video game and Lego - the world famous construction toy brand.\r\n\r\nThe Minecraft Lego Pink set consists of pink Lego blocks assembled into a colorful and vivid Minecraft landscape. Children can create their own unique constructions, helping to develop children&#39;s creative thinking and construction skills.\r\n', './uploads/3.png', 14, 1683252786, 1683252786),
(56, 'Lego Spiderman', 70.00, 'Lego Spiderman is a popular Lego series based on the Marvel Comics superhero Spiderman. With its vibrant colors and intricate details, Lego Spiderman offers fans of all ages the chance to create their own adventures with Spiderman and his friends. The Lego Spiderman series includes a variety of sets, each featuring different characters and scenes from the Spiderman universe. From Spiderman&#39;s famous red and blue costume to the Green Goblin&#39;s menacing glider, each set offers its own unique challenges and rewards.\r\n', './uploads/3(1)(2)(3)(4)(5)(6)(7)(8)(9)(10)(11)(12).jpg', 14, 1683253199, 1683253199),
(57, 'Chicco Mosquito Repellent Multi-Purpose Cream', 55.00, 'Chicco Mosquito Repellent Multi-Purpose Cream is a safe and effective solution for protecting your baby from pesky mosquitoes and other biting insects. The cream is made with natural ingredients and is free of harsh chemicals, making it gentle on your baby&#39;s delicate skin.\r\n\r\nThe cream contains natural active ingredients such as citronella, geraniol, and lavender oil, which are known for their mosquito-repelling properties. It also has a moisturizing effect, keeping your baby&#39;s skin soft and smooth.\r\n', './uploads/1(1)(2)(3)(4)(5)(6)(7)(8)(9)(10)(11)(12).jpg', 15, 1683253470, 1683253470),
(58, 'Mustela Dry Skin Face Cream', 60.00, 'Mustela Dry Skin Face Cream is a specially formulated cream that provides gentle and effective hydration to your baby&#39;s delicate facial skin. It is specifically designed for babies and children with dry skin, and it helps to restore and maintain the natural moisture balance of the skin.\r\n\r\nThe cream contains a unique combination of natural ingredients, including avocado perseose, which is a patented ingredient that helps to protect and reinforce the skin barrier. It also contains shea butter and jojoba oil, which are known for their moisturizing properties and help to soothe and soften the skin.\r\n', './uploads/2(1)(2)(3)(4)(5)(6)(7).jpg', 15, 1683253492, 1683253492),
(59, 'Chicco Cotton Seed Extract Massage Oil', 70.00, 'Chicco Cotton Seed Extract Massage Oil is a gentle and nourishing oil that is specially formulated for babies. The oil is made with natural cottonseed oil that helps to protect and moisturize the baby&#39;s delicate skin.\r\n\r\nThe oil is lightweight and absorbs easily into the skin, leaving it feeling soft and smooth. It is ideal for use during massage as it helps to soothe and relax the baby. The oil is also great for daily use, as it helps to keep the baby&#39;s skin hydrated and healthy.\r\n', './uploads/3(1)(2)(3)(4)(5)(6)(7)(8)(9)(10)(11)(12)(13).jpg', 15, 1683253513, 1683253513),
(60, 'Set Of 4 Buttons To Cover The Corner Of The Table', 70.00, 'These Set of 4 Buttons are the perfect solution to cover the sharp corners of your table and protect your child from any potential harm. Made with high-quality and durable materials, these buttons are designed to fit snugly on the corners of your table and stay securely in place.\r\n\r\nThe buttons are easy to install and remove, and they don&#39;t damage the surface of your furniture. They also have a sleek and stylish design that blends seamlessly with any home decor.\r\n', './uploads/9(1)(2)(3)(4).jpg', 15, 1683253768, 1683253768),
(61, 'Mustela Baby Face And Body Cleansing Water', 60.00, 'Mustela Baby Face and Body Cleansing Water is a gentle and effective daily cleansing solution that is specially formulated for the delicate skin of babies and children. This no-rinse cleanser is designed to effectively remove impurities and provide long-lasting hydration to the skin without causing any discomfort or irritation.\r\n', './uploads/1(1)(2)(3)(4)(5)(6)(7)(8)(9)(10)(11)(12)(13).jpg', 16, 1683253933, 1683253933),
(62, 'Saforelle Miss', 75.00, 'Saforelle Miss is a gentle cleansing solution specifically designed for young girls&#39; intimate hygiene needs. It is formulated with natural ingredients such as burdock extract and is free from harsh chemicals like soap, parabens, and phenoxyethanol.\r\n\r\nSaforelle Miss is enriched with emollient agents that help soothe and moisturize the skin, leaving it feeling clean and comfortable. Its pH-balanced formula helps maintain the natural balance of the intimate area and prevent discomfort or irritation.\r\n', './uploads/10(1).jpg', 16, 1683253967, 1683253967),
(63, 'Children&#039;s Oral Hygiene Kit', 70.50, 'The Children&#39;s Oral Hygiene Kit is a complete set of dental care products designed specifically for children. The kit includes a toothbrush, toothpaste, and dental floss, all of which are specially formulated for children&#39;s delicate teeth and gums.\r\n\r\nThe toothbrush is soft and gentle, with a small head that is perfect for reaching all areas of the mouth. The toothpaste is fluoride-free and has a mild flavor that kids will love, while still effectively cleaning teeth and preventing cavities. The dental floss is also gentle, with a soft texture that won&#39;t hurt children&#39;s gums.\r\n', './uploads/11(1)(2).jpg', 16, 1683253993, 1683253993),
(64, 'Alphanova Baby Organic Multi-Purpose Toilet Milk', 70.00, '&nbsp;\r\n\r\nAlphanova Baby Organic Multi-Purpose Toilet Milk is a gentle and natural solution for cleaning and moisturizing your baby&#39;s delicate skin during diaper changes. Made with organic and natural ingredients such as aloe vera, chamomile, and calendula, this toilet milk is free from harsh chemicals such as parabens, phenoxyethanol, and SLS. It helps to prevent skin irritation and soothes redness, leaving your baby&#39;s skin feeling soft, smooth, and nourished. This versatile product can also be used to clean your baby&#39;s face, hands, and body. The convenient pump bottle makes it easy to use, and the gentle formula is suitable for newborns and babies with sensitive skin. Give your baby the gentle care they deserve with Alphanova Baby Organic Multi-Purpose Toilet Milk.\r\n', './uploads/13(1).jpg', 16, 1683254057, 1683254057),
(65, 'Muslin Blanket', 40.00, 'A muslin blanket is a lightweight and breathable type of blanket made from muslin fabric, which is a plain weave cotton fabric that is loosely woven, allowing air to flow through easily. Muslin blankets are known for their softness and durability, making them a popular choice for swaddling infants, as well as for use as a general-purpose baby blanket. They are also commonly used as a burp cloth, nursing cover, stroller cover, or as a lightweight throw blanket for adults. Muslin blankets are available in a variety of sizes, colors, and patterns, and they can be machine washed and dried for easy care.\r\n', './uploads/3(1)(2)(3)(4)(5)(6)(7)(8)(9)(10)(11)(12)(13)(14).jpg', 16, 1683254107, 1683254107);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `role` enum('admin','customer') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `address`, `phone`, `created_at`, `role`) VALUES
(1, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, NULL, NULL, 'admin'),
(3, '', 'haodv2410', 'e10adc3949ba59abbe56e057f20f883e', 'haodv2410@gmail.com', NULL, '0387478952', NULL, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
