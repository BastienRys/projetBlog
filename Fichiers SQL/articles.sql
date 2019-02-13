-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 13 Février 2019 à 12:38
-- Version du serveur :  5.5.62-0+deb8u1
-- Version de PHP :  5.6.39-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blogdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `texte` text NOT NULL,
  `date` date NOT NULL,
  `publie` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`, `publie`) VALUES
(14, 'Article ouais', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L''avantage du Lorem Ipsum sur un texte générique comme ''Du texte. Du texte. Du texte.'' est qu''il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.', '2018-12-07', 1),
(16, 'Allo Allo Allo', 'MODIF_TEST_On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L''avantage du Lorem Ipsum sur un texte générique comme ''Du texte. Du texte. Du texte.'' est qu''il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard.', '2018-12-07', 1),
(18, 'Un article non publié', '\r\n\r\nL''absence de clause WHERE indique que vous allez mettre à jour tous les enregistrements de la table.\r\n\r\nAttention à ne pas confondre le caractère d''échappement ` avec une guillemet simple, qui n''a pas du tout la même signification ! Essayez de remplacer ce caractère par une guillemet simple dans la fonction UPPER() et voyez le résultat ... UPDATE `membres` SET `pseudo`=UPPER(''pseudo'');\r\n\r\nHorreur ! tous vos membres s''appellent désormais PSEUDO !\r\n', '2018-12-14', 0),
(19, 'How to delete a certain row from mysql table', 'All tables should have a primary key (consisting of a single or multiple columns), duplicate rows doesn''t make sense in a relational database. You can limit the number of delete rows using LIMIT though', '2018-12-14', 1),
(21, 'Lorem Ipsum', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.', '2018-12-14', 1),
(22, ' D''où vient-il?', 'Contrairement à une opinion répandue, le Lorem Ipsum n''est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s''est intéressé à un des mots latins les plus obscurs, consectetur, extrait d''un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum.', '2018-12-14', 1),
(23, 'Article test notif', 'It basically destroys your feet and causes knee, hips, and back pain. Any shoe with elevation means your center of gravity has shifted so your weight shifts to the ball of your feet. The higher the heel, the more weight and pressure shifts forward. Your knees and hips then have to push forward and your back has to hyper extend backwards to counterbalance.It strains tendons surrounding the foot and can lead to tendinitis. "Because your foot is elevated and the weight goes forward, a lot of tension gets taken off the Achilles tendon and it shortens over time as well. the Higher the hill the worse it gets.', '2019-02-11', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
