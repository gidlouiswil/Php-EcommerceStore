-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 14 juil. 2018 à 22:03
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php_e_commerce_store_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(3, 'category 1'),
(5, 'category 2'),
(9, 'category 3');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(41, 345, 'USA', '34535434', 'Completed'),
(42, 345, 'USA', '34535434', 'Completed'),
(43, 345, 'USA', '34535434', 'Completed'),
(44, 345, 'USA', '34535434', 'Completed'),
(45, 345, 'USA', '34535434', 'Completed');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `product_short_desc`, `product_image`) VALUES
(1, 'product 1', 3, 24.99, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pellentesque sit amet arcu non aliquam. Cras posuere porttitor justo a scelerisque. Aliquam lacus mi, elementum nec euismod vel, ornare quis lacus. In in nibh justo. Aenean eget sapien nisl. Cras a nisi ac est blandit dignissim at vel nibh. Nunc varius odio ut sagittis auctor. Sed aliquet diam sit amet purus maximus tincidunt. Sed et neque velit. Ut ornare magna vitae augue porttitor, eu rhoncus lorem tristique. Sed elementum eu felis sed ullamcorper. Curabitur ultrices lorem ut orci tristique fringilla. In varius nisi a mattis sagittis. Nullam ac eros vestibulum, dictum erat et, sagittis ante. Nullam non nibh et ipsum luctus volutpat. Integer tempor justo sapien, quis aliquet ligula volutpat id. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', 'http://placehold.it/320x90'),
(2, 'product 2', 5, 299.99, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pellentesque sit amet arcu non aliquam. Cras posuere porttitor justo a scelerisque. Aliquam lacus mi, elementum nec euismod vel, ornare quis lacus. In in nibh justo. Aenean eget sapien nisl. Cras a nisi ac est blandit dignissim at vel nibh. Nunc varius odio ut sagittis auctor. Sed aliquet diam sit amet purus maximus tincidunt. Sed et neque velit. Ut ornare magna vitae augue porttitor, eu rhoncus lorem tristique. Sed elementum eu felis sed ullamcorper. Curabitur ultrices lorem ut orci tristique fringilla. In varius nisi a mattis sagittis. Nullam ac eros vestibulum, dictum erat et, sagittis ante. Nullam non nibh et ipsum luctus volutpat. Integer tempor justo sapien, quis aliquet ligula volutpat id. ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', 'http://placehold.it/320x90'),
(4, 'product 3', 0, 4, 1, 'Random description', '', 'http://placehold.it/320x90'),
(5, 'product 4', 3, 8, 1, 'Random description', '', 'http://placehold.it/320x90'),
(6, 'product 5', 3, 30, 3, 'random description', '', 'http://placehold.it/320x90'),
(7, 'product 6', 2, 10, 1, 'random', '', 'http://placehold.it/320x90'),
(8, 'product 7', 1, 120, 1, 'random desc', '', 'http://placehold.it/320x90'),
(9, 'product 8', 2, 10, 1, 'random desc', '', 'http://placehold.it/320x90'),
(10, 'product 9', 1, 24.99, 1, 'Random description', '', 'http://placehold.it/320x90'),
(11, 'product 10', 2, 24.99, 1, 'Random description', '', '\r\nhttp://placehold.it/320x90'),
(12, 'product 12', 1, 120, 2, 'desc', '', 'http://placehold.it/320x90'),
(13, 'product 12', 1, 10, 1, 'desc', '', 'http://placehold.it/320x90'),
(14, 'product 13', 1, 1, 1, 'desc', '', 'http://placehold.it/320x90'),
(15, 'product 14', 3, 22, 0, 'desc', '', 'http://placehold.it/320x90'),
(16, 'product 15', 2, 44, 2, 'desc', '', 'http://placehold.it/320x90'),
(17, 'product 16', 2, 74, 2, 'desc', '', 'http://placehold.it/320x90'),
(18, 'product 17', 2, 85, 1, 'desc', '', 'http://placehold.it/320x90'),
(19, 'product 18', 2, 55, 5, 'desc', '', 'http://placehold.it/320x90'),
(20, 'product 19', 2, 456, 24, 'desc', '', 'http://placehold.it/320x90'),
(21, 'product 20', 3, 654, 4, 'desc', '', 'http://placehold.it/320x90'),
(22, 'product 21', 2, 120, 2, 'desc', '', 'http://placehold.it/320x90'),
(23, 'product 22', 1, 24.99, 4, 'desc', '', 'http://placehold.it/320x90'),
(24, 'product 23', 2, 111, 1, 'desc', '', 'http://placehold.it/320x90'),
(25, 'product 24', 2, 14, 1, 'desc', '', 'http://placehold.it/320x90'),
(26, 'product 25', 2, 142, 1, 'desc', '', 'http://placehold.it/320x90'),
(27, 'product 26', 2, 145, 1, 'desc', '', 'http://placehold.it/320x90'),
(28, 'product 27', 1, 111, 1, 'desc', '', 'http://placehold.it/320x90'),
(29, 'product 26', 1, 1, 1, 'desc', '', 'http://placehold.it/320x90'),
(30, 'product 27', 2, 457, 2, 'desc', '', 'http://placehold.it/320x90'),
(31, 'product 28', 2, 424, 2, 'desc', '', 'http://placehold.it/320x90'),
(32, 'product 29', 3, 333, 1, 'desc', '', 'http://placehold.it/320x90'),
(33, 'product 30', 2, 144, 1, 'desc', '', 'http://placehold.it/320x90'),
(34, 'product 31', 1, 111, 2, 'desc', '', 'http://placehold.it/320x90'),
(35, 'product 32', 2, 222, 2, 'desc', '', 'http://placehold.it/320x90'),
(36, 'product 33', 2, 54, 4, 'desc', '', 'http://placehold.it/320x90'),
(37, 'product 34', 2, 12, 4, 'desc', '', 'http://placehold.it/320x90'),
(38, 'ptoduct 35', 2, 121, 2, 'desc', '', 'http://placehold.it/320x90'),
(39, 'product 36', 1, 47, 1, 'desc', '', 'http://placehold.it/320x90'),
(40, 'product 37', 3, 56, 7, 'desc', '', 'http://placehold.it/320x90'),
(41, 'product 38', 1, 6, 4, 'desc', '', 'http://placehold.it/320x90'),
(42, 'product 39', 2, 68, 7, 'desc', '', 'http://placehold.it/320x90'),
(43, 'product 40', 2, 1, 1, 'desc', '', 'http://placehold.it/320x90'),
(44, 'product 41', 1, 333, 3, 'desc', '', 'http://placehold.it/320x90'),
(45, 'product 42', 3, 30, 3, 'desc', '', 'http://placehold.it/320x90');

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_price`, `product_title`, `product_quantity`) VALUES
(4, 1, 18, 24.99, '', 1),
(5, 1, 19, 24.99, '', 1),
(6, 1, 20, 24.99, '', 1),
(7, 1, 21, 24.99, 'product 1', 1),
(8, 1, 22, 24.99, 'product 1', 1),
(9, 2, 22, 299.99, 'product 2', 1),
(10, 1, 23, 24.99, 'product 1', 1),
(11, 2, 24, 299.99, 'product 2', 1),
(12, 1, 25, 24.99, 'product 1', 1),
(13, 2, 26, 299.99, 'product 2', 1),
(14, 1, 27, 24.99, 'product 1', 1),
(15, 2, 28, 299.99, 'product 2', 1),
(16, 1, 29, 24.99, 'product 1', 1),
(17, 2, 30, 299.99, 'product 2', 1),
(18, 1, 31, 24.99, 'product 1', 1),
(19, 2, 32, 299.99, 'product 2', 1),
(20, 1, 33, 24.99, 'product 1', 1),
(21, 2, 34, 299.99, 'product 2', 1),
(22, 1, 35, 24.99, 'product 1', 1),
(23, 2, 36, 299.99, 'product 2', 1),
(24, 1, 37, 24.99, 'product 1', 1),
(25, 2, 38, 299.99, 'product 2', 1),
(26, 1, 39, 24.99, 'product 1', 1),
(27, 2, 40, 299.99, 'product 2', 1),
(28, 1, 41, 24.99, 'product 1', 1),
(29, 2, 42, 299.99, 'product 2', 1),
(30, 1, 43, 24.99, 'product 1', 1),
(31, 2, 44, 299.99, 'product 2', 1),
(32, 1, 45, 24.99, 'product 1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_image`) VALUES
(14, 'Slide 4', 'image_4.jpg'),
(17, 'fdfffdfdf', 'image_4.jpg'),
(19, 'aaaa', 'image_4.jpg'),
(21, 'kkkkkkkkkkk', 'image_3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_photo`) VALUES
(1, 'Louis', 'louis@gmail.com', '123', ''),
(3, 'sdsdsdsd', 'Louis', '123', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Index pour la table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
