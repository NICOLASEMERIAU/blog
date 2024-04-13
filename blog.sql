-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : sam. 13 avr. 2024 à 14:11
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.15

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

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int NOT NULL,
  `post_id` int NOT NULL,
  `validation_comment` varchar(100) NOT NULL DEFAULT 'false',
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `post_id`, `validation_comment`, `comment`, `comment_date`, `user_id`) VALUES
(3, 2, 'true', 'article très intéressant', '2024-03-31 13:46:49', 2),
(4, 3, 'true', 'je n\'aurai jamais imaginé ça\r\n', '2024-04-04 13:59:28', 2),
(8, 7, 'true', 'Ce film Disney est à recommander à chaque enfant et adulte!!', '2024-04-13 10:29:39', 4),
(9, 5, 'false', 'j\'adore les chateaux forts', '2024-04-13 10:38:43', 4),
(10, 2, 'false', 'je ne suis pas d\'accord, tout ceci est trop abstrait', '2024-04-13 10:39:11', 4),
(11, 6, 'true', 'Histoire de l\'histoire ... quelle histoire!', '2024-04-13 10:47:05', 4);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id_post` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `creation_date` datetime NOT NULL,
  `chapo` text,
  `content` text NOT NULL,
  `user_id` int NOT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_post`, `title`, `creation_date`, `chapo`, `content`, `user_id`, `img`) VALUES
(2, 'Histoire du parchemin', '2024-03-31 13:41:58', 'Le parchemin est apparu en Europe au cours du viie siècle et l\'emploi s\'en est généralisé au viiie, en partie en raison des qualités propres du nouveau support (robustesse supérieure à celle du papyrus), en partie pour pallier les difficultés d\'approvisionnement en papyrus liées à la conquête arabe.', ' Peau de mouton, de veau ou de chèvre spécialement préparée pour recevoir l\'écriture. La peau de très jeune veau, d\'une grande finesse, est dite « vélin ». L\'invention du parchemin, attribuée par la légende aux habitants de Pergame (d\'où le nom de pergamenum), date sans doute du début de l\'ère chrétienne. C\'est vers le ive siècle qu\'il a commencé à concurrencer le papyrus, dont la fabrication s\'est poursuivie jusqu\'au milieu du xe siècle en Égypte et jusqu\'au xie siècle en Sicile. Le parchemin est apparu en Europe au cours du viie siècle et l\'emploi s\'en est généralisé au viiie, en partie en raison des qualités propres du nouveau support (robustesse supérieure à celle du papyrus), en partie pour pallier les difficultés d\'approvisionnement en papyrus liées à la conquête arabe.\r\n\r\nDu ixe au xive siècle, le parchemin a été le support normal de l\'écriture en Occident. Les actes ont été rédigés sur les peaux ou sur des fragments de formes et de tailles très diverses, car on utilisait la moindre partie des peaux naturelles (certains mandements ou certaines quittances sont de simples languettes). Calibrées, les peaux ont été pliées et reliées en forme de codex (manuscrits, cartulaires, registres). Elles ont souvent été cousues bout à bout en des rouleaux (rôles) qui atteignent parfois plusieurs dizaines de mètres de long.\r\n\r\nLe prix des peaux a conduit au réemploi fréquent de pièces dont l\'intérêt juridique avait disparu, qu\'on lavait et grattait d\'autant plus aisément que la peau était grossière. On appelle palimpsestes les manuscrits (surtout du haut Moyen Âge) dont les pages ont ainsi porté successivement deux textes, dont le plus ancien peut parfois être révélé par un traitement chimique ou optique.\r\n\r\nImporté d\'Asie, puis d\'Espagne, le papier a été considéré en Occident, du xie au xive siècle, comme une curiosité fort onéreuse. La multiplication des moulins à papier au xive siècle et l\'abaissement des prix de revient, en même temps qu\'une meilleure résistance à la déchirure, ont provoqué à la fin du Moyen Âge le rapide déclin du parchemin dans l\'usage courant. Dès le xve siècle, ce n\'était plus que la matière de manuscrits de luxe ou d\'actes solennels. L\'invention de l\'imprimerie entraîna l\'effacement définitif du parchemin, qui subsista cependant jusqu\'au xixe siècle pour divers types de diplômes et d\'actes officiels.', 1, 'game.png'),
(3, 'Histoire des pâtes', '2024-03-31 14:32:42', 'L\'origine des pâtes remonterait selon certaines recherches à la période du néolithique. A cette période, qui se situe de 9 000 avant Jésus-Christ jusqu\'à l\'invention de l\'écriture en 3 300 avant notre ère, les chasseurs-cueilleurs ont commencé à mettre en place des techniques de fabrication et de récolte du blé.', '\r\nL’Origine Des Pâtes - Galbani\r\nRavioli à la Ricotta et aux épinardsJe découvre\r\n\r\nLes pâtes sont des aliments très appréciés par les petits comme par les plus grands. Mais peu de personnes se posent la question de savoir d’où viennent les pâtes ? Viennent-elles d’Italie ou d’Asie ? Qui les a rendus populaires ?\r\n\r\nVous allez découvrir que ces pâtes possèdent une histoire extrêmement longue et sont consommées depuis de très nombreux millénaires.\r\nLes pâtes de la préhistoire\r\n\r\nL’histoire des pâtes remonterait à tellement loin qu’il ne s’agirait pas d’une histoire mais d’une préhistoire.\r\n\r\nL’origine des pâtes remonterait selon certaines recherches à la période du néolithique. A cette période, qui se situe de 9 000 avant Jésus-Christ jusqu’à l’invention de l’écriture en 3 300 avant notre ère, les chasseurs-cueilleurs ont commencé à mettre en place des techniques de fabrication et de récolte du blé. Ce blé était ensuite mélangé à de l’eau et consommé. Ce mélange de blé et d’eau ressemble à la recette des pâtes que nous connaissons aujourd’hui (évidemment cette recette a été améliorée au fil des années).\r\n', 1, 'cake.png'),
(4, 'Histoire du blog', '2024-04-04 14:10:53', 'Dans ce petit article \"Consommation\" hors-série nous allons essayer de vous expliquer ce qu\'est un blog, leur origine, leur évolution jusqu\'à nos jours, etc...\r\n\r\nEn effet Tests et Bons Plans étant un blog nous voulions en savoir plus sur cette forme de site internet et profitons de nos recherches sur le sujet pour partager ces nouvelles connaissances avec vous.', 'Tout d\'abord essayons de définir ce qu\'est un blog : un blog est un type de site internet ou une partie d\'un site internet utilisé pour la diffusion périodique d\'articles (également appelés billets) autour d\'un sujet donné ou rendant compte d\'une activité et classés par ordre anté-chronologique (du plus récent au plus ancien).\r\n\r\nLes blogs ont donc une trame commune qui est le classement des articles par date de diffusion avec généralement une date de publication apparente au niveau du titre, ils ont pour particularité d\'être le plus souvent personnels mais aussi collaboratifs avec un espace en fin d\'article dédié aux commentaires des visiteurs.\r\n\r\nSi les blogs sont tous différents ils ont en commun d\'être formatés par différents organismes spécialisés (Jimdo, Overblog, Wordpress, Wix, etc...) qui proposent aux blogueurs une solution « clé en main » qu\'il suffit de personnaliser et remplir avec des articles, en effet un blog ne nécessite pas de connaissances poussées en informatique.\r\n\r\nOn retrouve donc généralement toujours le même format avec un entête, un corps de site dans lequel apparaissent les nouveaux articles au fur et à mesure de leur mise en ligne et une ou deux colonnes sur les côtés pour mettre à disposition des internautes des informations.', 1, 'safe.png'),
(5, 'Histoire du chateau fort', '2024-04-04 14:11:49', 'Un château fort est une structure fortifiée de la fin du Moyen Âge, remplaçant la motte castrale à partir de la Renaissance du XIIe siècle et habitée par la noblesse. Les châteaux forts, emblématiques de la société féodale tardive, sont construits essentiellement en Europe, au Moyen-Orient et en Asie. Faits de pierre et non plus de terre et de bois, ils se caractérisent en effet par leur double fonction : défensive et administrative. Le mot château procède du latin castellum, par l\'intermédiaire de l\'ancien français chastel (d\'où le terme de castellologie, l\'étude des châteaux). ', 'Les chercheurs actuels débattent sur ce que recouvre le terme de château fort, mais le considèrent généralement comme « le lieu de résidence fortifié d\'un détenteur du droit de ban, à l\'origine d\'une circonscription territoriale, mandement, châtellenie ou bourg », c\'est-à-dire la résidence fortifiée privée d\'un noble ou d\'un seigneur. Cette définition le distingue ainsi d\'un palais qui n\'était pas fortifié, d\'une fortification qui n\'était pas la résidence d\'un noble ou d\'une ville fortifiée ou d\'une citadelle qui étaient une défense publique. Néanmoins, il y a beaucoup de similitudes entre ces différents types de constructions. L\'usage du terme a varié au cours du temps et a été appliqué à tort à des structures aussi diverses que des maisons fortes ou des castros. ', 1, 'cake.png'),
(6, 'Histoire de l\'histoire', '2024-04-04 14:12:44', 'L’histoire est à la fois l\'étude et l\'écriture des faits et des événements passés quelles que soient leur variété et leurs complexités!', 'Ce mot est souvent écrit avec la première lettre en majuscule. L\'histoire est également une science humaine et sociale. On désigne aussi couramment sous le terme d\'histoire (par synecdoque) le passé lui-même, comme dans les leçons de l\'histoire. L\'histoire est un récit écrit par lequel les êtres humains, et plus particulièrement les historiens, s\'efforcent de faire connaître les temps révolus. Ces tentatives ne sont jamais entièrement indépendantes de conditionnements étrangers au domaine telle que la vision du monde de leur auteur ou sa culture, mais elles sont censées être élaborées à partir de sources plutôt que guidées par la spéculation ou l\'idéologie.\r\n\r\nAu cours des siècles, les historiens ont façonné leurs méthodes ainsi que les champs d\'intervention, tout en réévaluant leurs sources, leur origine et leur exploitation. La discipline universitaire d\'étude et écriture de l\'histoire, y compris la critique des méthodes, est l\'historiographie. Elle s\'appuie sur diverses sciences auxiliaires complétant selon les travaux menés la compétence générale de l\'historien. Elle reste malgré tout une construction humaine, inévitablement inscrite dans son époque, susceptible d\'être utilisée en dehors de son domaine, notamment à des fins d\'ordre politique. ', 1, 'cabin.png'),
(7, 'Histoire de Fantasia', '2024-04-13 10:29:00', 'Chef-d’oeuvre de Walt Disney, « Fantasia » n’est pas qu’un dessin animé. C\'est aussi une création audiovisuelle sans précédent, réunissant l’art de la musique et celui de l’animation. Plongez dans l’histoire d’un film qui a marqué le cinéma et a ouvert la musique classique à tous.', 'Le 13 novembre 1940, le public du Broadway Theatre de New York découvre un long-métrage cinématographique inédit : Fantasia de Walt Disney, une animation visuelle pleine de couleurs accompagnée d’extraits des plus grandes œuvres du répertoire classique. \r\n\r\nProduit et diffusé aux Etats-Unis par le géant du dessin animé pendant l’une des périodes les plus sombres de l’histoire de l’humanité, Fantasia est le fruit d’un rêve ambitieux et généreux de la part de Disney : concilier jeune public et musique classique.', 1, 'cake.png'),
(8, 'Histoire de l\'eau douce', '2024-04-13 13:17:07', 'L\'eau douce est une eau dont la salinité est très faible ou nulle, par opposition à l\'eau de mer et à l\'eau saumâtre. C\'est l\'eau de pluie, l\'eau des rivières, des lacs, des nappes phréatiques, des glaciers, des tourbières, etc. ', 'Sa très faible salinité permet sa consommation. C\'est un critère de potabilité essentiel. Une eau douce contient généralement moins d\'un gramme de matières solides dissoutes (comme les sels, métaux et éléments nutritifs) par litre. À titre de comparaison, l\'eau de mer en contient plus de trente et le sérum physiologique en contient 9 g/litre (0,9 %). ', 1, 'submarine.png');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Visiteur'),
(2, 'Auditeur'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `mail` varchar(200) NOT NULL,
  `password_user` varchar(200) NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `mail`, `password_user`, `role_id`) VALUES
(1, 'Nicolas', 'Emeriau', 'exemple3@toolsvet.com', '$2y$10$O7zioWQi9ZN9YtVbCtws1.nkBNYkExSFRjc9BMraR2oMpLsd2vJiW', 3),
(2, 'Charlotte', 'Simon', 'exemple2@toolsvet.com', '$2y$10$10K92biEKTjc858jqKNAV.5g2/4jmnhjndWjXoDLK5Wum6yEWnCI2', 2),
(4, 'Vincent', 'Delors', 'exemple1@toolsvet.com', '$2y$10$pDrVnps4F3IhlYR96xk3hunfGKV3.RLnwvTYx9rXux.sAU56rA/Re', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `post_id_idx` (`post_id`),
  ADD KEY `id_user_idx` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id_idx` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id_post`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
