-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 10 mars 2022 à 10:05
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
-- Base de données : `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_parution` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `image`, `titre`, `contenu`, `auteur`, `date_parution`) VALUES
(1, 'https://cdn.pixabay.com/photo/2019/01/26/21/00/sunset-3956958__480.jpg', 'Combat de cheveaux', 'Lorem ipsum dolor sit amet. Est quaerat quisquam qui consequatur iste et quibusdam aliquid est placeat vero ut suscipit modi qui accusantium fugiat? Est nihil voluptatum non accusantium odio vel galisum molestias. Hic reprehenderit placeat et reprehenderit perspiciatis qui iusto eius non consequuntur voluptatem aut cupiditate commodi est facere ipsum. Quo sapiente quos et autem voluptatem vel blanditiis fuga non dolor doloremque qui consequatur nostrum est quibusdam commodi.', 'Maram.O', '2022-03-08'),
(2, 'https://cdn.pixabay.com/photo/2017/03/14/14/49/cat-2143332__340.jpg', 'Beau chat', 'Lorem ipsum dolor sit amet. Est quaerat quisquam qui consequatur iste et quibusdam aliquid est placeat vero ut suscipit modi qui accusantium fugiat? Est nihil voluptatum non accusantium odio vel galisum molestias. Hic reprehenderit placeat et reprehenderit perspiciatis qui iusto eius non consequuntur voluptatem aut cupiditate commodi est facere ipsum. Quo sapiente quos et autem voluptatem vel blanditiis fuga non dolor doloremque qui consequatur nostrum est quibusdam commodi.', 'Justine.P', '2022-03-08'),
(3, 'https://cdn.pixabay.com/photo/2019/04/16/16/19/tokyo-4132144__340.jpg', 'Car', 'Lorem ipsum dolor sit amet. Est quaerat quisquam qui consequatur iste et quibusdam aliquid est placeat vero ut suscipit modi qui accusantium fugiat? Est nihil voluptatum non accusantium odio vel galisum molestias. Hic reprehenderit placeat et reprehenderit perspiciatis qui iusto eius non consequuntur voluptatem aut cupiditate commodi est facere ipsum. Quo sapiente quos et autem voluptatem vel blanditiis fuga non dolor doloremque qui consequatur nostrum est quibusdam commodi.', 'Alou.C', '2022-03-08'),
(4, 'https://cdn.pixabay.com/photo/2017/12/15/13/51/polynesia-3021072__340.jpg', 'Plage', 'Lorem ipsum dolor sit amet. Est quaerat quisquam qui consequatur iste et quibusdam aliquid est placeat vero ut suscipit modi qui accusantium fugiat? Est nihil voluptatum non accusantium odio vel galisum molestias. Hic reprehenderit placeat et reprehenderit perspiciatis qui iusto eius non consequuntur voluptatem aut cupiditate commodi est facere ipsum. Quo sapiente quos et autem voluptatem vel blanditiis fuga non dolor doloremque qui consequatur nostrum est quibusdam commodi.', 'Awa.M', '2022-03-08'),
(5, 'https://cdn.pixabay.com/photo/2018/03/07/07/36/water-3205394_960_720.jpg', 'Nature', 'Lorem ipsum dolor sit amet. Ex fugit aliquam et aliquid ipsa qui maxime doloremque At pariatur galisum in atque placeat non architecto error! Et ipsum quasi et sunt praesentium qui velit porro non libero culpa aut sint voluptas!Ea cupiditate quas nam nisi sint a maxime omnis! Qui adipisci eveniet et error amet sit repellat harum.Eum quas voluptatum eos asperiores libero qui labore esse et nihil quia ut voluptatem quisquam et laborum veritatis. Nam distinctio molestiae id quidem praesentium et distinctio dignissimos vel molestias delectus et quasi soluta.', 'Papou.T', '2022-03-08'),
(6, 'https://media.istockphoto.com/photos/eiffel-tower-in-paris-skyline-at-dawn-picture-id1280246120?b=1&amp;k=20&amp;m=1280246120&amp;s=170667a&amp;w=0&amp;h=9g8hb-FTp7TfrN6gItpxDFKG0wPjwvnZQlNHZaxyeeI=', 'Paris', 'Lorem ipsum dolor sit amet. Ex fugit aliquam et aliquid ipsa qui maxime doloremque At pariatur galisum in atque placeat non architecto error! Et ipsum quasi et sunt praesentium qui velit porro non libero culpa aut sint voluptas!Ea cupiditate quas nam nisi sint a maxime omnis! Qui adipisci eveniet et error amet sit repellat harum.Eum quas voluptatum eos asperiores libero qui labore esse et nihil quia ut voluptatem quisquam et laborum veritatis. Nam distinctio molestiae id quidem praesentium et distinctio dignissimos vel molestias delectus et quasi soluta.', 'Moussa.D', '2022-03-08');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
