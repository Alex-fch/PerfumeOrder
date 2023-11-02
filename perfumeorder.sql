SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `perfumeorder`
--

-- --------------------------------------------------------

--
-- Structure de la table `general_order`
--

DROP TABLE IF EXISTS `general_order`;
CREATE TABLE IF NOT EXISTS `general_order` (
  `id_gene_order` int(11) NOT NULL AUTO_INCREMENT,
  `name_gene_order` char(50) NOT NULL,
  `price_gene_order` varchar(500) NOT NULL,
  `date_gene_order` char(25) NOT NULL,
  `quantity_gene_order` varchar(25) NOT NULL,
  PRIMARY KEY (`id_gene_order`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `individual_order`
--

DROP TABLE IF EXISTS `individual_order`;
CREATE TABLE IF NOT EXISTS `individual_order` (
  `id_indi_order` int(11) NOT NULL AUTO_INCREMENT,
  `name_indi_order` char(50) NOT NULL,
  `price_indi_order` varchar(500) NOT NULL,
  `quantity_indi_order` char(200) NOT NULL,
  `date_indi_order` char(25) NOT NULL,
  `id_gene_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_indi_order`),
  KEY `INDIVIDUAL_ORDER_GENERAL_ORDER_FK` (`id_gene_order`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `perfume_brand`
--

DROP TABLE IF EXISTS `perfume_brand`;
CREATE TABLE IF NOT EXISTS `perfume_brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name_brand` char(50) NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `perfume_brand`
--

INSERT INTO `perfume_brand` (`id_brand`, `name_brand`) VALUES
(1, 'ARMANI'),
(2, 'AUTRE'),
(3, 'AZZARO'),
(4, 'BURBERRY'),
(5, 'CACHAREL'),
(6, 'CALVIN KLEIN'),
(7, 'CAROLINA HARRERA'),
(8, 'CAROLINA HERRERA'),
(9, 'CARTIER'),
(10, 'CHANEL'),
(11, 'CHLOE'),
(12, 'DIESEL'),
(13, 'DIOR'),
(14, 'DOLCE & GABANNA'),
(15, 'DOLCE GABANNA'),
(16, 'ELISABETH'),
(17, 'GIORGIO ARMANI'),
(18, 'GIVENCHY'),
(19, 'GUCCI'),
(20, 'GUERLAIN'),
(21, 'HERMES'),
(22, 'HUGO BOSS'),
(23, 'JEAN PAUL GAULTIER'),
(24, 'KENZO'),
(25, 'LACOSTE'),
(26, 'LANCME'),
(27, 'LANCOME'),
(28, 'LOLITA LEMPICKA'),
(29, 'LOUIS VUITTON'),
(30, 'MANCERA'),
(31, 'MARC JACOB'),
(32, 'NARCISO RODRIGUEZ'),
(33, 'NINA RICCI'),
(34, 'PACO RABANNE'),
(35, 'PARFUM POUR FEMME'),
(36, 'PARFUM POUR HOMME'),
(37, 'PRADA'),
(38, 'RALPH LAUREN'),
(39, 'THIERRY MEUGLER'),
(40, 'THIERRY MUGLER'),
(41, 'TOM FORD'),
(42, 'VALENTINA VALENTINO'),
(43, 'VERSACE'),
(44, 'VICTOR & ROLF'),
(45, 'YVES SAINT LAURENT'),
(46, 'ZADIG & VOLTAIRE');

-- --------------------------------------------------------

--
-- Structure de la table `perfume_name`
--

DROP TABLE IF EXISTS `perfume_name`;
CREATE TABLE IF NOT EXISTS `perfume_name` (
  `id_perfume` int(11) NOT NULL AUTO_INCREMENT,
  `name_perfume` char(50) NOT NULL,
  `gender_perfume` char(15) NOT NULL,
  `price_perfume` varchar(15) NOT NULL,
  `id_brand` int(11) NOT NULL,
  PRIMARY KEY (`id_perfume`),
  KEY `PERFUME_NAME_PERFUME_BRAND_FK` (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=446 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `perfume_name`
--

INSERT INTO `perfume_name` (`id_perfume`, `name_perfume`, `gender_perfume`, `price_perfume`, `id_brand`) VALUES
(1, 'poison', 'femme', '5', 13),
(2, 'Ambre Nuit', 'femme', '5', 13),
(3, 'Balade Sauvage', 'femme', '5', 13),
(4, 'Fve Dlicieuse', 'femme', '5', 13),
(5, 'Oud Isphan', 'femme', '5', 13),
(6, 'Gris Montaigne', 'femme', '5', 13),
(7, 'Dior Addict', 'femme', '5', 13),
(8, 'Dior Addict 2', 'femme', '5', 13),
(9, 'Dior Addict Aau Dlice', 'femme', '5', 13),
(10, 'Belle De Jour', 'femme', '5', 13),
(11, 'Jadore', 'femme', '5', 13),
(12, 'Jdore LAbsolu', 'femme', '5', 13),
(13, 'Jadore LOr', 'femme', '5', 13),
(14, 'Joy', 'femme', '5', 13),
(15, 'Dune', 'femme', '5', 13),
(16, 'Dolce Vita', 'femme', '5', 13),
(17, 'Hypnotique Poison', 'femme', '5', 13),
(18, 'Miss Dior', 'femme', '5', 13),
(19, 'Miss Dior Chrie', 'femme', '5', 13),
(20, 'Rouge Trafalgar', 'femme', '5', 13),
(21, 'Tendre Poison', 'femme', '5', 13),
(22, 'Poison Girl', 'femme', '5', 13),
(23, 'Pure Poison', 'femme', '5', 13),
(24, 'Jadore Infinissime', 'femme', '5', 13),
(25, 'Miss Dior 2021', 'femme', '5', 13),
(26, 'Linstant De Guerlain', 'femme', '5', 20),
(27, 'Samsara', 'femme', '5', 20),
(28, 'Idylle Guerlain', 'femme', '5', 20),
(29, 'La Petit Robe Noire', 'femme', '5', 20),
(30, 'La Petit Robe Noire Intense', 'femme', '5', 20),
(31, 'La Petit Robe Noire Nectar', 'femme', '5', 20),
(32, 'La Petit Robe Noire Couture', 'femme', '5', 20),
(33, 'La Petit Robe Noire Rose', 'femme', '5', 20),
(34, 'La Petit Robe Noire Black Perfecto', 'femme', '5', 20),
(35, 'Mon Guerlain', 'femme', '5', 20),
(36, 'Mon Guerlain Intense', 'femme', '5', 20),
(37, 'Insolence', 'femme', '5', 20),
(38, 'Aqua Allegoria Mandarine Basilic', 'femme', '5', 20),
(39, 'Aqua Allegoria Granita', 'femme', '5', 20),
(40, 'Aqua Allegoria Pamplelune', 'femme', '5', 20),
(41, 'Aqua Allegoria Nettare Di Sole', 'femme', '5', 20),
(42, 'Shalimar', 'femme', '5', 20),
(43, 'Santal Royal', 'femme', '5', 20),
(44, 'Habit Rouge', 'femme', '5', 20),
(45, 'Pure Xs', 'femme', '5', 34),
(46, 'Fame', 'femme', '5', 34),
(47, 'Black Xs', 'femme', '5', 34),
(48, 'Olympea', 'femme', '5', 34),
(49, 'Olympea Legend', 'femme', '5', 34),
(50, 'Olympea Blosoom', 'femme', '5', 34),
(51, 'Lady Million', 'femme', '5', 34),
(52, 'Lady Million Empire', 'femme', '5', 34),
(53, 'Lady Million Luky', 'femme', '5', 34),
(54, 'Lady Million Priv', 'femme', '5', 34),
(55, 'Ultraviolet Femme', 'femme', '5', 34),
(56, 'JPG  Le Parfum', 'femme', '5', 23),
(57, 'JPG La Belle', 'femme', '5', 23),
(58, 'JPG Classique', 'femme', '5', 23),
(59, 'JPG Pin-Up', 'femme', '5', 23),
(60, 'JPG  Scandal', 'femme', '5', 23),
(61, 'JPG Scandal Le Parfum', 'femme', '5', 23),
(62, 'JPG Scandal by Night', 'femme', '5', 23),
(63, 'JPG SO Scandal', 'femme', '5', 23),
(64, 'JPG Pirate', 'femme', '5', 23),
(65, 'JPG Classique Summer 2014 Mermaid', 'femme', '5', 23),
(66, 'JPG Scandal Gold', 'femme', '5', 23),
(67, 'JPG Madame', 'femme', '5', 23),
(68, 'JPG La Belle Fleur Terrible', 'femme', '5', 23),
(69, 'Idole Le Nouveau Parfum', 'femme', '5', 26),
(70, 'La Vie Est Belle', 'femme', '5', 26),
(71, 'Oui La Vie Est Belle', 'femme', '5', 26),
(72, 'La Vie Est Belle Intense', 'femme', '5', 26),
(73, 'La Vie Est Belle LAbsolu De Parfum', 'femme', '5', 26),
(74, 'La Vie Est Belle LEclat', 'femme', '5', 26),
(75, 'La Vie Est Belle Florale', 'femme', '5', 26),
(76, 'La Vie Est Belle En Rose', 'femme', '5', 26),
(77, 'La Vie Est Belle Intensment', 'femme', '5', 26),
(78, 'La Vie Est Belle Soleil Crystal', 'femme', '5', 26),
(79, 'La Nuit Trsor A La Folie', 'femme', '5', 26),
(80, 'La Nuit Trsor Nude', 'femme', '5', 26),
(81, 'La Nuit Trsor', 'femme', '5', 26),
(82, 'La nuit Trsor Intense', 'femme', '5', 26),
(83, 'Trsor', 'femme', '5', 26),
(84, 'Le Trsor Musc Diamont', 'femme', '5', 26),
(85, 'La Nuit Trsor Midnight', 'femme', '5', 26),
(86, 'Trsor In Love', 'femme', '5', 26),
(87, 'Hypnose Femme', 'femme', '5', 26),
(88, 'Magnifique', 'femme', '5', 26),
(89, 'Miracle', 'femme', '5', 26),
(90, 'Miracle Secret', 'femme', '5', 26),
(91, 'Poeme', 'femme', '5', 26),
(92, 'Coco Chanel', 'femme', '5', 10),
(93, 'Allure', 'femme', '5', 10),
(94, 'Allure Sensuelle', 'femme', '5', 10),
(95, 'Coco Mademoiselle', 'femme', '5', 10),
(96, 'Coco Mademoiselle Intense', 'femme', '5', 10),
(97, 'Coco Mademoiselle LEau Prive', 'femme', '5', 10),
(98, 'Chanel Gabrielle', 'femme', '5', 10),
(99, 'Chanel Chance', 'femme', '5', 10),
(100, 'Chanel Chance Eau Tendre', 'femme', '5', 10),
(101, 'Chance Eau Frache', 'femme', '5', 10),
(102, 'Chanel N5', 'femme', '5', 10),
(103, 'Chanel N5 Red Limited Edition', 'femme', '5', 10),
(104, 'Chanel N1 Leau Rouge', 'femme', '5', 10),
(105, 'Chanel N5 LEau', 'femme', '5', 10),
(106, 'Chanel 19', 'femme', '5', 10),
(107, 'Coco Noir', 'femme', '5', 10),
(108, 'Angel', 'femme', '5', 40),
(109, 'Angel Eau De Croisire', 'femme', '5', 40),
(110, 'Nova', 'femme', '5', 40),
(111, 'Wowanity', 'femme', '5', 40),
(112, 'Alien', 'femme', '5', 40),
(113, 'Alien Goddess', 'femme', '5', 40),
(114, 'Aura', 'femme', '5', 40),
(115, 'Alien Fusion', 'femme', '5', 40),
(116, 'Innocent', 'femme', '5', 40),
(117, 'Black Opuim', 'femme', '5', 45),
(118, 'Black Opuim Illusion', 'femme', '5', 45),
(119, 'Black Opium Eau De Parfum Illicit Green', 'femme', '5', 45),
(120, 'Black Opium Extrme', 'femme', '5', 45),
(121, 'Elle YSL', 'femme', '5', 45),
(122, 'La Parisienne', 'femme', '5', 45),
(123, 'Mon Paris', 'femme', '5', 45),
(124, 'Manifesto', 'femme', '5', 45),
(125, 'Libre', 'femme', '5', 45),
(126, 'Libre Intense', 'femme', '5', 45),
(127, 'Suprme Bouquet', 'femme', '5', 45),
(128, 'Cinma', 'femme', '5', 45),
(129, 'Gucci Bamboo', 'femme', '5', 19),
(130, 'Gucci Flora', 'femme', '5', 19),
(131, 'Gucci Bloom', 'femme', '5', 19),
(132, 'Gucci Gulty', 'femme', '5', 19),
(133, 'G Mmoire DUne Odeur', 'femme', '5', 19),
(134, 'Gucci Rush', 'femme', '5', 19),
(135, 'Gucci Rush 2', 'femme', '5', 19),
(136, 'Gucci Envy Me', 'femme', '5', 19),
(137, 'Gucci Envy Me 2', 'femme', '5', 19),
(138, 'LInterdit', 'femme', '5', 18),
(139, 'LInterdit Rouge', 'femme', '5', 18),
(140, 'Interdit Eau De Parfum Intense', 'femme', '5', 18),
(141, 'Organza', 'femme', '5', 18),
(142, 'Very Irrsistible', 'femme', '5', 18),
(143, 'Irrsistible', 'femme', '5', 18),
(144, 'Live Irrsistible Blossem Crush', 'femme', '5', 18),
(145, 'Ange Ou Dmon', 'femme', '5', 18),
(146, 'Ange Ou Dmon Le Secret', 'femme', '5', 18),
(147, 'Kenzo Jungle', 'femme', '5', 24),
(148, 'Kenzo Amour', 'femme', '5', 24),
(149, 'Kenzo Jeu DAmour', 'femme', '5', 24),
(150, 'Kenzo World', 'femme', '5', 24),
(151, 'Kenzo Flower', 'femme', '5', 24),
(152, 'Kenzo Flower LAbsolue', 'femme', '5', 24),
(153, 'Kenzo Flower LElixir', 'femme', '5', 24),
(154, 'Kenzo Flower Tag', 'femme', '5', 24),
(155, 'LExtase', 'femme', '5', 33),
(156, 'La Petite Pomme Rouge', 'femme', '5', 33),
(157, 'Premire Jour', 'femme', '5', 33),
(158, 'Nina Ricci Luna', 'femme', '5', 33),
(159, 'Nina Les Dlices', 'femme', '5', 33),
(160, 'Ricci Ricci', 'femme', '5', 33),
(161, 'Mademoiselle Ricci', 'femme', '5', 33),
(162, 'Nina Soleil', 'femme', '5', 33),
(163, 'Nina Extra Rouge', 'femme', '5', 33),
(164, 'Nina Rose', 'femme', '5', 33),
(165, 'Nina Bella', 'femme', '5', 33),
(166, 'Amor Amor', 'femme', '5', 5),
(167, 'Amor Amor Forbidden Kiss', 'femme', '5', 5),
(168, 'Yes I Am', 'femme', '5', 5),
(169, 'Yes I Am Fabulous', 'femme', '5', 5),
(170, 'Yes I Am Glorious', 'femme', '5', 5),
(171, 'Yes I Am Delicious', 'femme', '5', 5),
(172, 'Eden Cacharel', 'femme', '5', 5),
(173, 'Noa', 'femme', '5', 5),
(174, 'Loulou', 'femme', '5', 5),
(175, 'Anais Anais', 'femme', '5', 5),
(176, 'Scarlette', 'femme', '5', 5),
(177, 'Promesse', 'femme', '5', 5),
(178, 'My Way Intense', 'femme', '5', 1),
(179, 'My Way', 'femme', '5', 1),
(180, 'DIAMONDS', 'femme', '5', 1),
(181, 'Si', 'femme', '5', 1),
(182, 'Si Intense', 'femme', '5', 1),
(183, 'Si Passion', 'femme', '5', 1),
(184, 'Si Passion Intense', 'femme', '5', 1),
(185, 'Si Fiori', 'femme', '5', 1),
(186, 'Armani Code Femme', 'femme', '5', 1),
(187, 'Armani Light Di Gio', 'femme', '5', 1),
(188, 'Armani Acqua Di Gio', 'femme', '5', 1),
(189, 'Armani Bleu Turquoise', 'femme', '5', 1),
(190, 'Armani Bleu Nazilu', 'femme', '5', 1),
(191, 'Chlo', 'femme', '5', 11),
(192, 'Chlo Nomade', 'femme', '5', 11),
(193, 'Chlo Nomade Absolue', 'femme', '5', 11),
(194, 'Chlo LEau', 'femme', '5', 11),
(195, 'See By Chlo', 'femme', '5', 11),
(196, 'Roses De Chlo', 'femme', '5', 11),
(197, 'Chlo Love Story', 'femme', '5', 11),
(198, 'Chloe Tangerine', 'femme', '5', 11),
(199, 'Narciso Rodriguez Eau De Parfum Poudre', 'femme', '5', 32),
(200, 'Narciso Rodriguez Rouge', 'femme', '5', 32),
(201, 'Narciso Rodriguez For Her', 'femme', '5', 32),
(202, 'Narsico Rodriguez For Her Rose', 'femme', '5', 32),
(203, 'Narciso Rodriguez Fleur', 'femme', '5', 32),
(204, 'Musc', 'femme', '5', 32),
(205, 'Narciso Rodriguez Musc Noir', 'femme', '5', 32),
(206, 'Lacoste Touch Of Pink', 'femme', '5', 25),
(207, 'Lacoste Touch Of Sun', 'femme', '5', 25),
(208, 'Lacoste Love Pink', 'femme', '5', 25),
(209, 'Lacoste Joy Of Pink', 'femme', '5', 25),
(210, 'Lacoste Sensuelle', 'femme', '5', 25),
(211, 'Eaux De Lacoste', 'femme', '5', 25),
(212, 'Lacoste Femme', 'femme', '5', 25),
(213, 'Lacoste 1212 Rose', 'femme', '5', 25),
(214, 'Marc Jacob Dcadence', 'femme', '5', 31),
(215, 'Marc Jacob Daisy', 'femme', '5', 31),
(216, 'Lolita Lempicka', 'femme', '5', 28),
(217, 'Lolita So Sweet', 'femme', '5', 28),
(218, 'Lolita Sweet', 'femme', '5', 28),
(219, 'Lolita Si', 'femme', '5', 28),
(220, 'Good Girl', 'femme', '5', 7),
(221, '212 VIP', 'femme', '5', 7),
(222, 'Good Girl Fantastic Pink', 'femme', '5', 7),
(223, 'Good Girl Very', 'femme', '5', 7),
(224, 'Good Girl Velvet Fatale', 'femme', '5', 7),
(225, 'Tom Ford Noir', 'femme', '5', 41),
(226, 'Tom Ford Black Orchide', 'femme', '5', 41),
(227, '24 Faubourg', 'femme', '5', 21),
(228, 'Twilly Hermes', 'femme', '5', 21),
(229, 'Hermes Musc Plaida', 'femme', '5', 21),
(230, 'Jour Herms Absolu', 'femme', '5', 21),
(231, 'Louis Vuitton Coeur Battant', 'femme', '5', 29),
(232, 'Louis Vuitton Matire Noir', 'femme', '5', 29),
(233, 'Louis Vuitton Les Sables Roses', 'femme', '5', 29),
(234, 'Louis Vuitton On The Beach', 'femme', '5', 29),
(235, 'Louis Vuitton Etoile Filante', 'femme', '5', 29),
(236, 'Bonbon Victor & Rolf', 'femme', '5', 44),
(237, 'Bonbon Intense', 'femme', '5', 44),
(238, 'Flowerbomb Victor & Rolf', 'femme', '5', 44),
(239, 'Spicebomb Victor & Rolf', 'femme', '5', 44),
(240, 'Flowerbomb Nectar', 'femme', '5', 44),
(241, 'Boss Intense', 'femme', '5', 22),
(242, 'Boss Jour', 'femme', '5', 22),
(243, 'Boss Nuit Pour Femme', 'femme', '5', 22),
(244, 'Boss Femme Eau De Parfum', 'femme', '5', 22),
(245, 'Boss Ma Vie', 'femme', '5', 22),
(246, 'Boss Alive', 'femme', '5', 22),
(247, 'Boss Orange', 'femme', '5', 22),
(248, 'Boss The Scent Femme', 'femme', '5', 22),
(249, 'CK One Shock For Her', 'femme', '5', 6),
(250, 'Clalvin Klein Euphoria', 'femme', '5', 6),
(251, 'Clalvin Klein Eternity', 'femme', '5', 6),
(252, 'Calvin Klein Beaut', 'femme', '5', 6),
(253, 'Dg Light Blue', 'femme', '5', 15),
(254, 'Dg The One Femme', 'femme', '5', 15),
(255, 'Dg The One Rose', 'femme', '5', 15),
(256, 'Dg Dolce', 'femme', '5', 15),
(257, 'Burberry London', 'femme', '5', 4),
(258, 'Burberry Brit', 'femme', '5', 4),
(259, 'My Burberry', 'femme', '5', 4),
(260, 'Burberry Weekend', 'femme', '5', 4),
(261, 'Burberry Touch', 'femme', '5', 4),
(262, 'Voce Viva Valentina', 'femme', '5', 42),
(263, 'Valentina Valentino', 'femme', '5', 42),
(264, 'Valentino Donna Born In Roma', 'femme', '5', 42),
(265, 'Versace Brigth Cristal', 'femme', '5', 43),
(266, 'Versace Cristal Noir', 'femme', '5', 43),
(267, 'Versace Versense', 'femme', '5', 43),
(268, 'Versace Vanitas', 'femme', '5', 43),
(269, 'Prada Paradoxe', 'femme', '5', 37),
(270, 'Prada Candy', 'femme', '5', 37),
(271, 'Cartier Carat', 'femme', '5', 9),
(272, 'Cartier Panthre', 'femme', '5', 9),
(273, 'Cartier Pasha', 'femme', '5', 9),
(274, 'Cartier Baiser Vol', 'femme', '5', 9),
(275, 'Mancera Rose Vanille', 'femme', '5', 30),
(276, 'Mancera Wild Rose', 'femme', '5', 30),
(277, 'Elizabeth Arden Green Tea', 'femme', '5', 16),
(278, 'This Is Her', 'femme', '5', 46),
(279, 'This Is Us', 'femme', '5', 46),
(280, 'Diesel Loverdose', 'femme', '5', 12),
(281, 'Diesel Fuel For Life', 'femme', '5', 12),
(282, 'Azzaro Wanted Girl', 'femme', '5', 3),
(283, 'Mademoiselle Azzaro Intense', 'femme', '5', 3),
(284, 'Bombshell Victoria Secret', 'femme', '5', 2),
(285, 'Eau Du Soir Sisley', 'femme', '5', 2),
(286, 'DKNY BE DELICIOUS', 'femme', '5', 2),
(287, 'Montale Paris Oud Pashmina', 'femme', '5', 2),
(288, 'Bulgari Rose Spendida', 'femme', '5', 2),
(289, 'Bulgari Omnia', 'femme', '5', 2),
(290, 'Narcisse Taiji Atelier Matriel', 'femme', '5', 2),
(291, 'Fleur Narcotique', 'femme', '5', 2),
(292, 'Summer Festival Escada', 'femme', '5', 2),
(293, 'Escada Dsire Me', 'femme', '5', 2),
(294, 'Moschino I Love Love', 'femme', '5', 2),
(295, 'Trussardi Donna', 'femme', '5', 2),
(296, 'Lady Gaga', 'femme', '5', 2),
(297, 'Eclat Lanvin', 'femme', '5', 2),
(298, 'Jimmy Choo', 'femme', '5', 2),
(299, 'La Nuit De LHomme', 'homme', '5', 45),
(300, 'LHomme', 'homme', '5', 45),
(301, 'La Nuit De LHomme Bleu Electrique', 'homme', '5', 45),
(302, 'LHomme LIntense', 'homme', '5', 45),
(303, 'LHomme Libre', 'homme', '5', 45),
(304, 'Y Ysl', 'homme', '5', 45),
(305, 'Y Le Parfum', 'homme', '5', 45),
(306, 'Kouros', 'homme', '5', 45),
(307, 'Dior Gris Montaigne', 'homme', '5', 13),
(308, 'Dior Homme', 'homme', '5', 13),
(309, 'Dior Homme Cologne', 'homme', '5', 13),
(310, 'Dior Homme Sport', 'homme', '5', 13),
(311, 'Dior Homme Intense', 'homme', '5', 13),
(312, 'Dior Sauvage', 'homme', '5', 13),
(313, 'Dior Tobacolor', 'homme', '5', 13),
(314, 'Dior Sauvage Elixir', 'homme', '5', 13),
(315, 'Dior Eau De Sauvage', 'homme', '5', 13),
(316, 'Dior Farenheit', 'homme', '5', 13),
(317, 'Dior Farenheit 32', 'homme', '5', 13),
(318, 'Dior Bois DArgent', 'homme', '5', 13),
(319, 'Dior Amour', 'homme', '5', 13),
(320, 'Boss Slection', 'homme', '5', 22),
(321, 'Boss Orange', 'homme', '5', 22),
(322, 'Boss Deep Red', 'homme', '5', 22),
(323, 'Boss Bottled', 'homme', '5', 22),
(324, 'Boss Bottled Intense', 'homme', '5', 22),
(325, 'Boss Bottled Oud', 'homme', '5', 22),
(326, 'Boss Unlimited', 'homme', '5', 22),
(327, 'Boss Orange Man', 'homme', '5', 22),
(328, 'Boss In Motion', 'homme', '5', 22),
(329, 'Boss Night', 'homme', '5', 22),
(330, 'Boss Sport', 'homme', '5', 22),
(331, 'Boss The Scent', 'homme', '5', 22),
(332, 'Boss Edition', 'homme', '5', 22),
(333, 'Lacoste 12 12 Blanc', 'homme', '5', 25),
(334, 'Lacoste 12 12 Noir', 'homme', '5', 25),
(335, 'Lacoste 12 12 Rouge', 'homme', '5', 25),
(336, 'Lhomme Lacoste', 'homme', '5', 25),
(337, 'Lacoste Challenge', 'homme', '5', 25),
(338, 'Lacoste Essentiel', 'homme', '5', 25),
(339, 'Lacoste Essentiel Sport', 'homme', '5', 25),
(340, 'Lacoste Booster', 'homme', '5', 25),
(341, 'Lacoste Rouge', 'homme', '5', 25),
(342, 'Lacoste Gris', 'homme', '5', 25),
(343, 'Invictus', 'homme', '5', 34),
(344, 'Invictus Victory', 'homme', '5', 34),
(345, 'Phantom', 'homme', '5', 34),
(346, 'Phontom Legion', 'homme', '5', 34),
(347, 'Invictus Onyx', 'homme', '5', 34),
(348, 'Invictus Legend', 'homme', '5', 34),
(349, 'One Million', 'homme', '5', 34),
(350, 'One Million Dollar', 'homme', '5', 34),
(351, 'One Million Casino', 'homme', '5', 34),
(352, 'One Million Elixir', 'homme', '5', 34),
(353, 'One million Luky', 'homme', '5', 34),
(354, 'Pure Xs', 'homme', '5', 34),
(355, 'Black Xs', 'homme', '5', 34),
(356, 'Ultraviolet', 'homme', '5', 34),
(357, 'Armani Priv Rose DArabie', 'homme', '5', 17),
(358, 'Orangerie Venise', 'homme', '5', 17),
(359, 'Acqua Di Gio', 'homme', '5', 17),
(360, 'Armani Code', 'homme', '5', 17),
(361, 'Armani Code Profumo', 'homme', '5', 17),
(362, 'Armani You', 'homme', '5', 17),
(363, 'Armani Diamonts', 'homme', '5', 17),
(364, 'Armani Code Sport', 'homme', '5', 17),
(365, 'Armani Code Absolu Gold', 'homme', '5', 17),
(366, 'Armani Attitude', 'homme', '5', 17),
(367, 'Bleu De Chanel', 'homme', '5', 10),
(368, 'Allure Chanel Maron', 'homme', '5', 10),
(369, 'Allure Homme Sport', 'homme', '5', 10),
(370, 'Platinium Egoste', 'homme', '5', 10),
(371, 'Le Mal Aviator', 'homme', '5', 23),
(372, 'Le Mal', 'homme', '5', 23),
(373, 'Kokorico', 'homme', '5', 23),
(374, 'Fleur Du Mle', 'homme', '5', 23),
(375, 'Le Beau', 'homme', '5', 23),
(376, 'Scandal', 'homme', '5', 23),
(377, 'Scandal Le Parfum', 'homme', '5', 23),
(378, 'Le Mal In Boeard', 'homme', '5', 23),
(379, 'Le Mal Eau Fraiche', 'homme', '5', 23),
(380, 'JPG 2', 'homme', '5', 23),
(381, 'Ultra Mal', 'homme', '5', 23),
(382, 'Azzaro Chrome', 'homme', '5', 3),
(383, 'Azzaro Wanted', 'homme', '5', 3),
(384, 'Azzaro Wanted By Night', 'homme', '5', 3),
(385, 'A Men', 'homme', '5', 39),
(386, 'Alien Homme', 'homme', '5', 39),
(387, 'Tom Ford Oud Wood', 'homme', '5', 41),
(388, 'Tom Ford Noir Extrme', 'homme', '5', 41),
(389, 'Tom Ford Tuscan Leather', 'homme', '5', 41),
(390, 'Tom Ford Extrme Noir', 'homme', '5', 41),
(391, 'Tom Ford Tobacco Vanille', 'homme', '5', 41),
(392, 'Tom Ford Noir', 'homme', '5', 41),
(393, 'Terre  DHerms', 'homme', '5', 21),
(394, 'Herms H24', 'homme', '5', 21),
(395, 'Herms Eau Givre', 'homme', '5', 21),
(396, 'Voyage DHerms', 'homme', '5', 21),
(397, 'Herms LOmbre Des Merveilles', 'homme', '5', 21),
(398, 'Dolce & Gabanna The One', 'homme', '5', 14),
(399, 'DG The One Gentleman', 'homme', '5', 14),
(400, 'DG The One Sport', 'homme', '5', 14),
(401, 'DG K King', 'homme', '5', 14),
(402, 'Diesel Homme Fuel For Life', 'homme', '5', 12),
(403, 'Diesel Only The Brave', 'homme', '5', 12),
(404, 'Diesel Only The Brave Tatoo', 'homme', '5', 12),
(405, 'Diesel Sound Of The Brave', 'homme', '5', 12),
(406, 'Diesel BAD', 'homme', '5', 12),
(407, 'CK Man', 'homme', '5', 6),
(408, 'CK Euphoria Man', 'homme', '5', 6),
(409, 'CK Klein Obsession', 'homme', '5', 6),
(410, 'CK One Shok', 'homme', '5', 6),
(411, 'this is him', 'homme', '5', 46),
(412, 'Gentelman', 'homme', '5', 18),
(413, 'Dclaration', 'homme', '5', 9),
(414, 'Kenzo Eau De Vie', 'homme', '5', 24),
(415, 'Kenzo Jungle Homme', 'homme', '5', 24),
(416, 'Polo Sport Ralph Lauren', 'homme', '5', 38),
(417, 'Polo Blue Ralph Lauren', 'homme', '5', 38),
(418, 'Lhomme Idal', 'homme', '5', 20),
(419, 'Linstant Guerlain pour homme', 'homme', '5', 20),
(420, 'Bad Boy Carolina Herrera', 'homme', '5', 8),
(421, '212 VIP Carolina Herrera Noir', 'homme', '5', 8),
(422, '212 VIP Carolina Herrera Gris', 'homme', '5', 8),
(423, '212 VIP Carolina Herrera Heroes', 'homme', '5', 8),
(424, 'Cartier Dclaration', 'homme', '5', 9),
(425, 'Eros', 'homme', '5', 43),
(426, 'Hypnose Lancme', 'homme', '5', 27),
(427, 'Davidoff Champion', 'homme', '5', 2),
(428, 'Baccarat Rouge 540', 'homme', '5', 2),
(429, 'Maison Francis Kurkdjian Oud Silk Mood', 'homme', '5', 2),
(430, 'Bulgari Men In Black', 'homme', '5', 2),
(431, 'Shaik Desiner 70', 'homme', '5', 2),
(432, 'Escentric molecules', 'homme', '5', 2),
(433, 'Cerrutti 1881', 'homme', '5', 2),
(434, 'Leau dissy homme', 'homme', '5', 2),
(435, 'Creed Aventus', 'homme', '5', 2),
(436, 'Creed Vikng Cologne', 'homme', '5', 2),
(437, 'DKNY Donna Karen New York', 'homme', '5', 2),
(438, 'Mont Blanc Legend', 'homme', '5', 2),
(439, 'Mont Blanc Explorer', 'homme', '5', 2),
(440, 'Gucci Guilty', 'homme', '5', 2),
(441, 'Prada Lunarossa Extrme', 'homme', '5', 2),
(442, 'Amor Pour Homme Cacharel', 'homme', '5', 2),
(443, 'Valentino Uomo Born In Romma', 'homme', '5', 2),
(444, 'Moncler Pour Homme', 'homme', '5', 2),
(445, 'Mercedes Benz', 'homme', '5', 2);

-- --------------------------------------------------------

--
-- Structure de la table `possesses`
--

DROP TABLE IF EXISTS `possesses`;
CREATE TABLE IF NOT EXISTS `possesses` (
  `id_indi_order` int(11) NOT NULL,
  `id_perfume` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  PRIMARY KEY (`id_indi_order`,`id_perfume`),
  KEY `POSSESSES_PERFUME_NAME0_FK` (`id_perfume`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `individual_order`
--
ALTER TABLE `individual_order`
  ADD CONSTRAINT `INDIVIDUAL_ORDER_GENERAL_ORDER_FK` FOREIGN KEY (`id_gene_order`) REFERENCES `general_order` (`id_gene_order`);

--
-- Contraintes pour la table `perfume_name`
--
ALTER TABLE `perfume_name`
  ADD CONSTRAINT `PERFUME_NAME_PERFUME_BRAND_FK` FOREIGN KEY (`id_brand`) REFERENCES `perfume_brand` (`id_brand`);

--
-- Contraintes pour la table `possesses`
--
ALTER TABLE `possesses`
  ADD CONSTRAINT `POSSESSES_INDIVIDUAL_ORDER_FK` FOREIGN KEY (`id_indi_order`) REFERENCES `individual_order` (`id_indi_order`),
  ADD CONSTRAINT `POSSESSES_PERFUME_NAME0_FK` FOREIGN KEY (`id_perfume`) REFERENCES `perfume_name` (`id_perfume`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
