-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 07 mars 2020 à 01:25
-- Version du serveur :  5.7.21
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `atlaslivre`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `prenom`, `mail`, `pass`) VALUES
(1, 'Amini', 'Maxime', 'maximeamini1@gmail.com', '7b2fdc7b09045f0f22f14d17409875ddadb5fe63');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_uti` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `nb_l` int(11) NOT NULL,
  `nb_j` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `etat` enum('Louer','Acheter') NOT NULL,
  `dateL` date DEFAULT NULL,
  `livraison` enum('livré','non livré') NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_uti`, `id_livre`, `nb_l`, `nb_j`, `prix`, `num`, `etat`, `dateL`, `livraison`, `date`) VALUES
(1, 1, 21, 12, 0, 4800, 663891947, 'Acheter', '2019-06-27', 'livré', '2019-06-27'),
(2, 1, 26, 0, 30, 600, 663891947, 'Louer', '2019-06-27', 'livré', '2019-06-27'),
(3, 1, 26, 1, 0, 1000, 663891947, 'Acheter', '2020-01-14', 'livré', '2019-08-17');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `p_ach` int(11) NOT NULL,
  `p_loc` int(11) NOT NULL,
  `dispo` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `nb_v` int(11) NOT NULL,
  `disc` text NOT NULL,
  `promo` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `p_ach`, `p_loc`, `dispo`, `stock`, `cat`, `nb_v`, `disc`, `promo`, `image`) VALUES
(1, 'Harry Potter 1', 'JK. Roling', 200, 50, 'non', 143, 'Fantastiques', 0, 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué. Mais un mystère entoure sa naissance et l\'effroyable V., le mage dont personne n\'ose prononcer le nom.', 3, 'harry_potter_1.jpg'),
(2, 'Harry Potter 2', 'JK. Roling', 200, 50, 'oui', 161, 'Fantastiques', 0, 'Une rentrée fracassante en voiture volante, une étrange malédiction quis\'abat sur les élèves, cette deuxième année à l\'école des sorciers ne s\'annonce pas de tout repos ! Entre les cours de potions magiques, les matchs de Quidditch et les combats de mauvais sorts, Harry et ses amis Ron et Hermione trouveront-ils le temps de percer le mystère de la Chambre des Secrets ?', 3, 'harry_potter_2.jpg'),
(27, 'Harry Potter 7', 'JK. Rolling', 2500, 20, 'oui', 12, 'Fantastiques', 0, 'Cette année, Harry a 17 ans et ne retourne pas à l\'école de Poudlard après la mort de Dumbledore. Avec Ron et Hermione il se consacre à la dernière mission confiée par Dumbledore, la chasse aux horcruxes. Le Seigneur des Ténèbres règne en maître et traque les fidèles amis qui sont réduits à la clandestinité. D\'épreuves en révélations, le courage, les choix et les sacrifices de Harry seront déterminants dans la lutte contre les forces du Mal.', 3, 'Harry_Potter_7.jpg'),
(4, 'La Maison biscornue', 'Agatha Christie', 300, 50, 'oui', 151, 'Policier', 0, 'Trois générations de la famille Léonides vivent sous le même toit. Celui d’une vaste maison un rien biscornue… Quand le grand-père, un patriarche tyrannique, meurt assassiné, tout le monde est soupçonné, même ses petits enfants ! Et justement, Joséphine, douze ans, semble s’intéresser de près au crime et aux différentes façons d’éliminer son prochain. Un véritable petit monstre… Or on devrait toujours se méfier des petits monstres, aussi adorables soient-ils.', 1, 'La_Maison_biscornue.jpeg'),
(5, 'Un appartement à paris', 'Guillaume Musso', 1000, 50, 'oui', 157, 'Thriller', 0, 'Paris, un atelier d\'artiste au fond d\'une allée verdoyante. \r\nMadeline, une ex-flic londonienne, y est venue pour panser ses blessures. \r\nGaspard, un auteur misanthrope, l\'a loué pour écrire dans la solitude. \r\nÀ la suite d\'une méprise, ces deux écorchés vifs sont contraints de cohabiter quelque temps. \r\nDans l\'atelier, où plane encore le fantôme de l\'ancien propriétaire, Madeline et Gaspard vont mettre au jour un secret terrifiant. \r\nEt cette découverte glaçante va les forcer à affronter leurs propres démons dans une enquête vertigineuse qui les changera à jamais.', 2, 'appartement_a_paris.jpg'),
(6, 'Fairy Tail', 'Hiro Mashima', 1500, 50, 'oui', 161, 'Manga', 0, 'Les guildes magiques sont des associations. \r\nElles proposent différentes tâches aux magiciens, \r\nallant de la recherche d\'un objet à l\'attaque en règle. \r\nLucy, Une jeune fille, rêve de devenir magicienne.\r\nUn jour, elle rencontre Natsu, un magicien maîtrisant le feu. \r\nCe dernier l\'invite alors à rejoindre sa guilde. \r\nIl s\'agit de la célèbre Fairy Tail, le sujet de tous les rêves de Lucy.\r\nMais celle-ci est bien mystérieuse semble être à l\'origine de nombreux scandales...', 2, 'fairy_tail.jpg'),
(7, 'Your Lie In April', 'Naoshi Arakawa', 1500, 50, 'oui', 161, 'Manga', 0, 'À 11 ans, Kôsei Arima est déjà un virtuose du piano. Formé avec la plus grande sévérité par une mère qui lui inflige d’interminables séances de répétition, il écume inlassablement tous les concours nationaux, où son talent éblouit les juges. Mais le jour où sa mère meurt d’une longue maladie, il perd complètement la faculté de jouer de son instrument : victime d’un blocage psychologique, le jeune garçon n’entend plus le son du piano quand il essaie d’en jouer…', 2, 'your_lie_in_april.png'),
(8, 'Violet Evergarden', 'Kana Akatsuki', 1500, 50, 'oui', 157, 'Light novel', 0, 'L\'histoire se déroule autour d\'une jeune fille qui effectue le métier de « poupées de souvenirs automatiques » : des poupées initialement créées par le professeur Orland pour aider sa femme aveugle Mollie à écrire ses romans, et plus tard louées à d\'autres personnes qui avaient besoin de leurs services. Le terme se réfère aux personnes qui remplissent la fonction d\'écrivain public, dont le but est de retranscrire la parole et les sentiments des gens. Suite à 4 ans de guerre acharnée, cette jeune fille au lourd passé tente non sans mal de reconstruire son avenir, à commencer par l\'exercice de ce métier. Cependant, parmi toutes les blessures qui lui auront été infligées au cours de la guerre, il y en a une qui semble ne pas vouloir se refermer. Les mots d\'un être cher résonnent encore dans son cœur, sans que la jeune fille en sache la véritable raison. Elle veut savoir, comprendre leur signification. Ainsi commence la quête de Violet Evergarden, apprentissage mêlé de lettres, de rencontres et d\'émotions variées…', 1, 'Violet_Evergarden.jpg'),
(9, 'La Tresse', 'Laetitia Colombani', 3000, 50, 'oui', 157, 'Fiction', 0, 'Inde. Smita est une Intouchable. Elle rêve de voir sa fille échapper à sa condition misérable et entrer à l’école.\r\nSicile. Giulia travaille dans l’atelier de son père. Lorsqu’il est victime d’un accident, elle découvre que l’entreprise familiale est ruinée.\r\nCanada. Sarah, avocate réputée, va être promue à la tête de son cabinet quand elle apprend qu’elle est gravement malade.\r\nLiées sans le savoir par ce qu’elles ont de plus intime et de plus singulier, Smita, Giulia et Sarah refusent le sort qui leur est réservé et décident de se battre. Vibrantes d’humanité, leurs histoires tissent une tresse d’espoir et de solidarité.\r\nTrois femmes, trois vies, trois continents. Une même soif de liberté.\r\n', 2, 'la_tresse.jpg'),
(10, 'Harry Potter 3', 'JK Roling', 800, 50, 'oui', 158, 'Fantastiques', 0, 'Sirius Black, le dangereux criminel qui s\'est échappé de la forteresse d\'Azkaban, recherche Harry Potter. C\'est donc sous bonne garde que l\'apprenti sorcier fait sa troisième rentrée. Au programme : des cours de divination, la fabrication d\'une potion de Ratatinage, le dressage des hippogriffes... Mais Harry est-il vraiment à l\'abri du danger qui le menace ?', 3, 'harry_potter_3.jpg'),
(11, 'Les animaux fantastiques 1', 'JK. Roling', 2000, 50, 'oui', 157, 'Fantastiques', 0, 'Toute nouvelle édition de cet incontournable ouvrage inscrit dans l\'univers de la saga Harry Potter, avec de splendides illustrations, une préface inédite de J. K. Rowling (signée Norbert Dragonneau) et six nouvelles créatures ! Manuel étudié à l’école de sorcellerie de Poudlard depuis sa publication, le chef-d’œuvre de Norbert Dragonneau a fait le bonheur de générations de familles de sorciers. Les Animaux fantastiques, vie et habitat est une indispensable introduction aux créatures magiques du monde des sorciers. Les années de voyage et de recherches de Dragonneau ont abouti à ce volume d’une importance inégalée. Certains animaux seront familiers aux lecteurs de la saga Harry Potter – L’hippogriphe, le basilic, le Magyar à pointes…', 0, 'Les_animeaux_fantastiques_1.jpg'),
(12, 'Les animaux fantastiques 2', 'JK. Roling', 2000, 50, 'oui', 159, 'Fantastiques', 0, 'Le précédent film Les Animaux fantastiques se terminait sur la capture du puissant mage noir Gellert Grindelwald à New York grâce à Norbert Dragonneau. Mais, mettant sa menace à exécution, Grindelwald s’échappe de prison et s’attèle à recruter des partisans, dont la plupart ignorent sa réelle intention : faire régner les sorciers de sang pur sur les êtres non-magiques.', 0, 'Les_animeaux_fantastiques_2.jpg'),
(13, 'Harry Potter 4', 'JK. Roling', 2000, 50, 'oui', 142, 'Fantastiques', 0, 'Harry Potter a quatorze ans et entre en quatrième année à Poudlard. Une grande nouvelle attend Harry, Ron et Hermione à leur arrivée : la tenue d\'un tournoi de magie exceptionnel entre les plus célèbres écoles de sorcellerie. Déjà les délégations étrangères font leur entrée. Harry se réjouit... Trop vite. Il va se trouver plongé au cœur des événements les plus dramatiques qu\'il ait jamais eu à affronter.', 3, 'harry_potter_4.jpg'),
(14, 'Harry Potter 5', 'JK. Roling', 2000, 50, 'oui', 100, 'Fantastiques', 0, 'À quinze ans, Harry s\'apprête à entrer en cinquième année à Poudlard. Et s\'il est heureux de retrouver le monde des sorciers, il n\'a jamais été aussi anxieux. L\'adolescence, la perspective des examens importants en fin d\'année et ces étranges cauchemars... Car Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom est de retour et, plus que jamais, Harry sent peser sur lui une terrible menace. Une menace que le ministère de la Magie ne semble pas prendre au sérieux, contrairement à Dumbledore. Poudlard devient alors le terrain d\'une véritable lutte de pouvoir. La résistance s\'organise autour de Harry qui va devoir compter sur le courage et la fidélité de ses amis de toujours...', 3, 'harry_potter_5.jpg'),
(15, 'La légende de SPELLMAN', 'Daryl Delight', 2000, 50, 'oui', 155, 'Thriller', 0, 'Trois jeunes garçons se racontent chacun leur tour une histoire sur la légende de Spellman. Une légende qui hante les esprits, depuis que quatre adolescents ont été retrouvés massacrés.\r\nLe premier évoque un tueur en série sanguinaire.\r\nLe second imagine un sorcier avec un pouvoir de résurrection sur les animaux.\r\nLe troisième explique que l’esprit de Spellman se nourrit d’âmes humaines.', 0, 'la_legende_de_spellman.jpg'),
(16, 'A Silent Voice 1', 'Yoshitoki Oima', 2000, 50, 'oui', 161, 'Light Novel', 0, 'Shoko Nishimiya est sourde depuis la naissance. Même équipée d\'un appareil auditif, elle peine à saisir les conversations, à comprendre ce qui se passe autour d\'elle. Effrayé par ce handicap, son père a fini par l\'abandonner, laissant sa mère l\'élever seule. \r\nQuand Shoko est transférée dans une nouvelle école, elle fait de son mieux pour dépasser ce handicap, mais malgré ses efforts pour s\'intégrer dans ce nouvel environnement, rien n\'y fait : les persécutions se multiplient, menées par Shoya Ishida, le leader de la classe. Tour à tour intrigué, fasciné, puis finalement exaspéré par cette jeune fille qui ne sait pas communiquer avec sa voix, Shoya décide de consacrer toute son énergie à lui rendre la vie impossible.', 1, 'A_silent_voice_1.jpg'),
(17, 'A Silent Voice 2', 'Yoshitoki Oima', 2000, 50, 'oui', 150, 'Light Novel', 0, 'Pour Shoya, devenu le nouveau souffre-douleur de sa classe, rien ne change après le départ de Shoko. Pire, le jeune garçon se rend compte qu’elle faisait preuve de gentillesse à son égard et se sent d’autant plus coupable ! Mis à l’écart pendant toute sa scolarité, il ne parvient plus à se lier aux autres. Il se coupe du monde et finit par perdre toute envie de vivre.\r\nMais l’adolescent n’a jamais oublié la jeune sourde. Il prend donc la résolution de la retrouver pour lui présenter ses excuses avant de mettre fin à ses jours…', 0, 'A_silent_voice_2.jpg'),
(19, 'Cinquante nuances de Grey', 'E.L. James', 1200, 50, 'oui', 145, 'Romance', 0, 'Lorsqu’Anastasia Steele, étudiante en littérature, interviewe le richissime jeune chef d’entreprise Christian Grey, elle le trouve très séduisant mais profondément intimidant. Convaincue que leur rencontre a été désastreuse, elle tente de l’oublier – jusqu’à ce qu’il débarque dans le magasin où elle travaille et l’invite à un rendez-vous en tête-à-tête. Naïve et innocente, Ana ne se reconnait pas dans son désir pour cet homme. Quand il la prévient de garder ses distances, cela ne fait que raviver son trouble. Mais Grey est tourmenté par des démons intérieurs, et consumé par le besoin de tout contrôler. Lorsqu’ils entament une liaison passionnée, Ana découvre ses propres désirs, ainsi que les secrets obscurs que Grey tient à dissimuler aux regards indiscrets …', 0, 'Cinquante_nuances_de_Grey.jpg'),
(20, 'Avant toi', 'Jojo Moyes', 1200, 50, 'oui', 126, 'Romance', 0, 'Lou est une fille ordinaire qui mène une vie monotone dans un trou paumé de l\'Angleterre dont elle n\'est jamais sortie. Quand elle se retrouve au chômage, elle accepte un contrat de six mois pour tenir compagnie à un handicapé. Malgré l\'accueil glacial qu\'il lui réserve, Lou va découvrir en lui un jeune homme exceptionnel, brillant dans les affaires, accro aux sensations fortes et voyageur invétéré. Mais depuis l\'accident qui l\'a rendu tétraplégique, Will veut mettre fin à ses jours. Lou n\'a que quelques mois pour le faire changer d\'avis.', 0, 'Avant_toi.jpg'),
(21, 'Merfer ', 'China Miéville', 1000, 50, 'oui', 174, 'Fiction', 1, 'Shamus Yes ap Soorap est un orphelin de la cité d\'Haldepic, élevé par ses cousins à la suite du décès de ses deux parents. Lorsqu\'il est en âge de travailler, ces derniers lui trouvent une place d\'apprenti médecin sur Le Mèdes, un train taupier commandé par le capitaine Natacha Picbaie, qui chasse les taupes géantes comme peuvent le faire des bateaux pour la chasse à la baleine. Ce train parcourt la merfer, une étendue de terre meuble parsemée de rails et peuplée de voraces et géants rats-taupes nus, perce-oreilles et autres fourmilions. Durant sa première expédition, Sham découvre en fouillant les restes d\'un train abandonné une carte mémoire contenant de vieilles photos. Une fois l\'expédition terminée, le capitaine Picbaie permet à Sham de visionner les photos et ils découvrent ensemble l\'impensable, l\'impossible : une photo d\'une voie de chemin de fer unique, ce qui n\'a jamais été vu dans l\'ensemble de la merfer, les voies étant toujours multiples et interconnectées à l\'infini.\r\n\r\nLors d\'une halte dans la cité de Manihiki, Sham fait connaissance avec Robalson, un jeune mousse travaillant comme lui sur un train, ainsi que Caldera et Caldero Sroake, deux jeunes orphelins tout comme lui. Ils partagent ses trouvailles avec eux, ce qui va complètement changer leurs vies à tous. La fratrie Shroake découvrent enfin les indices nécessaires à une tentative pour trouver le lieu où leurs parents ont disparu. Ils proposent à Sham de les accompagner mais celui-ci ne peut se résoudre à quitter sa vie à bord du Mèdes. Robalson se révèle quant à lui faire partie de l\'équipage du Tarralesh, un train pirate dont le capitaine Le Guell décide de kidnapper Sham afin d\'essayer de rattraper le train des Shroake.', 2, 'Merfer.jpg'),
(26, 'Harry Potter 6', 'JK. Rolling', 2000, 20, 'non', 0, 'Fantastiques', 2, 'Après la bataille au Départements des Mystères survenue quelques semaines auparavant, le ministère de la magie a rendu public le retour de Voldemort. Le mage noir et ses disciples exercent désormais leur pouvoir sur le monde entier. Sorciers comme Moldus sont maintenant en danger. Des mangemorts apparaissent à Londres et provoquent l\'effondrement du Millennium Bridge, tout en kidnappant au passage le fabricant de baguettes, Ollivander...', 3, 'Harry_Potter_6.jpg'),
(28, 'Harry Potter et l\'Enfant maudit', 'JK. Rolling', 2500, 20, 'oui', 200, 'Fantastiques', 0, 'Un retourneur de temps a été repris par le ministère de la magie. En entendant la nouvelle, Amos Diggory se précipite chez Harry Potter pour lui demander de changer le cours des choses et ramener son fils Cedric à la vie. Harry refuse et nie l\'existence d\'un retourneur de temps. La nièce d\'Amos, Delphi Diggory, fait en sorte qu\'Albus Potter s\'empare du retourneur de temps pour sauver son cousin Cedric Diggory de sa mort au Tournoi des Trois Sorciers. Albus, qui est en froid avec son père et avec sa réputation, accepte cette mission. Il vole donc le retourneur de temps au ministère de la magie avec l\'aide de Scorpius Malefoy et de Delphi. Albus et Scorpius retournent ensuite à l\'époque du Tournoi des Trois Sorciers pour éviter à Cedric d\'être en tête de la compétition et d\'attraper le trophée en même temps que Harry (ce qui le conduirait auprès de Voldemort). Ils font en sorte que Cedric échoue dès l\'épreuve du dragon, mais en revenant au moment présent, les deux enfants se rendent compte que changer le cours des choses a provoqué d\'autres événements imprévus, tels que la mort de Harry Potter lors de la bataille de Poudlard.', 3, 'harry_potter_8.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `mail`, `pass`, `adress`) VALUES
(1, 'amini', 'maxime', 'maximeamini1@gmail.com', '7b2fdc7b09045f0f22f14d17409875ddadb5fe63', 'Tizi-ouzou commune bouzgeune village sahel'),
(2, 'Ben meziane', 'Koukou', 'koukou1@gmail.com', '25aba44f3a661fbf7b12caead6a44ea93c5baa10', 'Tizi-ouzou Oud Aissi'),
(3, 'Ben meziane', 'Tina', 'tina1@gmail.com', 'a8c35222bf4a1eb2da2eef0ef6f28b7e91bdaead', 'micheli');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_u` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `vue` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_u`, `message`, `vue`, `date`) VALUES
(1, 1, 'hello', 0, '2019-07-01 07:16:48'),
(2, 1, 'salut', 0, '2019-07-12 00:26:23'),
(3, 1, 'hey connard\r\n', 0, '2020-01-14 18:10:01');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_l` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_l`, `id_u`) VALUES
(1, 9, 1),
(2, 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `pr` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id`, `titre`, `slogan`, `pr`, `image`) VALUES
(1, 'Promotions pour le ramadan', 'Rassasiez-vous avec notre sélections de livres pour ce ramadan, et oublié votre faim !', 30, 'ramadan.jpg'),
(2, 'Promotions d\'été', 'Que ce soit a la plage ou la nuit dans votre hôtel n\'oubliez pas votre passe-temps préféré !', 40, 'ete.jpg'),
(3, 'Promotion 20 ans Harry Potter', 'découvrez ou redécouvrez le monde magique d\'Harry Potter avec notre promotion 20ans.', 50, '2019-Planificateur-Livre-Magique-Harry-Potter-Cahier-Journal-Avec-2019-2020-2021-Calendrier-Rétro-Couverture-Rigide.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

DROP TABLE IF EXISTS `visites`;
CREATE TABLE IF NOT EXISTS `visites` (
  `IP` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nb_page` int(11) NOT NULL,
  PRIMARY KEY (`IP`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visites`
--

INSERT INTO `visites` (`IP`, `date`, `nb_page`) VALUES
('::1', '2019-06-14', 16),
('::1', '2019-06-16', 18),
('::1', '2019-06-17', 50),
('::1', '2019-06-18', 103),
('::1', '2019-06-19', 65),
('::1', '2019-06-22', 19),
('::1', '2019-06-23', 128),
('::1', '2019-06-24', 120),
('::1', '2019-06-25', 156),
('::1', '2019-06-26', 202),
('::1', '2019-06-27', 293),
('::1', '2019-06-28', 114),
('::1', '2019-06-29', 64),
('::1', '2019-06-30', 16),
('::1', '2019-07-01', 116),
('::1', '2019-07-02', 6),
('::1', '2019-07-03', 7),
('::1', '2019-07-11', 56),
('::1', '2019-07-12', 1),
('::1', '2019-07-13', 16),
('::1', '2019-07-19', 12),
('::1', '2019-07-28', 3),
('::1', '2019-08-16', 14),
('154.121.28.124', '2019-08-16', 18),
('2a03:2880:30ff:3::face:b00c', '2019-08-16', 1),
('2a03:2880:30ff:10::face:b00c', '2019-08-16', 1),
('2a03:2880:30ff:9::face:b00c', '2019-08-16', 1),
('154.121.24.22', '2019-08-16', 6),
('2a02:aa13:8301:9c80:3999:b953:9fcb:e1b2', '2019-08-16', 1),
('154.0.180.90', '2019-08-16', 1),
('18.206.156.23', '2019-08-17', 2),
('66.249.93.48', '2019-08-17', 1),
('154.121.25.162', '2019-08-17', 14),
('154.121.24.58', '2019-08-17', 6),
('41.104.141.221', '2019-08-17', 1),
('154.121.27.192', '2019-08-17', 1),
('185.20.99.218', '2019-08-17', 1),
('34.239.113.150', '2019-08-17', 1),
('41.104.228.22', '2019-08-17', 2),
('92.184.117.197', '2019-08-17', 15),
('34.207.158.78', '2019-08-18', 2),
('3.95.170.1', '2019-08-19', 1),
('107.21.77.62', '2019-08-19', 1),
('41.104.166.16', '2019-08-26', 2),
('41.109.98.153', '2019-08-26', 1),
('41.104.146.11', '2019-08-26', 2),
('2a03:2880:30ff:3::face:b00c', '2019-09-25', 2),
('2a03:2880:30ff:4::face:b00c', '2019-09-25', 1),
('2a03:2880:30ff:2::face:b00c', '2019-09-25', 1),
('154.121.26.2', '2019-09-25', 2),
('66.249.93.47', '2019-10-17', 1),
('154.121.27.85', '2019-12-22', 2),
('154.121.24.26', '2019-12-22', 1),
('::1', '2019-12-28', 1),
('::1', '2020-01-10', 46),
('::1', '2020-01-11', 24),
('::1', '2020-01-14', 22),
('::1', '2020-01-23', 2),
('::1', '2020-02-07', 4),
('::1', '2020-03-07', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
