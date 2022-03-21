-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 21 mars 2022 à 10:32
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location`
--
CREATE DATABASE IF NOT EXISTS `location` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `location`;

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(3) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `postal_code` int(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `type` enum('vente','location') NOT NULL,
  `price` int(11) NOT NULL,
  `reservation_message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `title`, `description`, `image`, `postal_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(81, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL),
(82, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75002, 'Paris', 'location', 1200, 'Je le veux'),
(83, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75003, 'Paris', 'location', 1200, NULL),
(84, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75004, 'Paris', 'location', 1200, NULL),
(85, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75005, 'Paris', 'location', 1200, NULL),
(86, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75006, 'Paris', 'location', 1200, NULL),
(87, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75007, 'Paris', 'location', 1200, 'OK'),
(88, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, 'Je prends directement'),
(89, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL),
(90, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL),
(91, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL),
(92, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL),
(93, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL),
(94, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL),
(95, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL),
(96, 'Appartement T2 Paris', '<p>Lorem ipsum dolor sit amet. Est quibusdam veritatis est maiores soluta hic inventore eius quo accusantium accusamus. Qui dolorum aliquid eum aperiam praesentium cum commodi fugit et fugiat unde rem autem repellat et sequi cupiditate ab obcaecati voluptatem. </p><p>Ut amet rerum non animi quas ut laboriosam minus eum aspernatur necessitatibus et sint debitis sit aperiam ipsam. Et quam assumenda et facilis officia qui dolores totam. Quo Quis autem est aliquid cumque aut quisquam numquam qui adipisci quod. </p><p>Est odit facere  fuga Quis eos omnis provident eos ipsa architecto ut corporis facere. Id sint sint sed excepturi sunt est tempora corrupti aut recusandae doloremque est porro doloremque? </p>\r\n', 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9tZSUyMGRlY29yfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 75001, 'Paris', 'location', 1200, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
