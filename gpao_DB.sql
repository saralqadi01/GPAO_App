-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 03 juil. 2019 à 16:53
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gpao`
--

-- --------------------------------------------------------

--
-- Structure de la table `activations`
--

CREATE TABLE `activations` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `id` int(10) UNSIGNED NOT NULL,
  `duree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ateliers`
--

CREATE TABLE `ateliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effectif` int(11) NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ateliers`
--

INSERT INTO `ateliers` (`id`, `libelle`, `effectif`, `commentaire`, `created_at`, `updated_at`) VALUES
(6, 'test', 5, 'test', '2019-03-18 11:41:44', '2019-03-18 11:41:44'),
(7, 'test02', 2, 'mmm', '2019-03-20 11:17:15', '2019-03-21 10:08:20'),
(8, 'atelier02', 25, 'test', '2019-03-22 08:34:04', '2019-04-18 11:24:51'),
(11, 'Atelier_test1', 20, 'ràs', '2019-04-18 11:21:56', '2019-04-24 09:55:19'),
(12, 'atelier010', 26, 'ras', '2019-06-17 15:34:45', '2019-06-17 15:34:45');

-- --------------------------------------------------------

--
-- Structure de la table `audit`
--

CREATE TABLE `audit` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `produit_id` int(10) UNSIGNED NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `changetype` enum('NEW','EDIT','DELETE') NOT NULL,
  `changetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `audit`
--

INSERT INTO `audit` (`id`, `produit_id`, `pourcentage`, `changetype`, `changetime`) VALUES
(16, 10, 30, 'EDIT', '2019-04-25 10:50:23'),
(17, 10, 50, 'EDIT', '2019-04-25 10:50:37'),
(18, 10, 45, 'EDIT', '2019-04-25 10:50:46'),
(19, 10, 60, 'EDIT', '2019-04-25 10:50:54'),
(20, 9, 60, 'EDIT', '2019-04-25 12:08:39'),
(21, 9, 70, 'EDIT', '2019-04-25 12:29:40'),
(23, 11, 30, 'EDIT', '2019-04-28 23:54:57'),
(24, 10, 60, 'EDIT', '2019-04-28 23:55:05'),
(25, 9, 70, 'EDIT', '2019-04-28 23:55:11'),
(26, 10, 60, 'EDIT', '2019-04-28 23:55:21'),
(27, 9, 70, 'EDIT', '2019-04-28 23:55:52'),
(28, 10, 60, 'EDIT', '2019-04-29 18:10:24'),
(29, 11, 40, 'EDIT', '2019-04-29 18:29:19'),
(30, 11, 60, 'EDIT', '2019-04-29 18:29:27'),
(31, 11, 75, 'EDIT', '2019-04-29 18:29:36'),
(32, 11, 100, 'EDIT', '2019-04-29 18:29:44'),
(33, 12, 30, 'EDIT', '2019-05-03 11:07:15'),
(34, 11, 100, 'EDIT', '2019-05-03 11:07:25'),
(35, 9, 75, 'EDIT', '2019-05-03 11:07:34'),
(36, 10, 70, 'EDIT', '2019-05-03 11:08:27'),
(37, 12, 30, 'EDIT', '2019-06-17 13:00:02');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adrs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tel` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `adrs`, `num_tel`, `email`, `created_at`, `updated_at`) VALUES
(6, 'morabit', 'ayman', 'jjjjjj', 236251, 'llllllll', '2019-03-10 20:58:04', '2019-03-15 11:08:15'),
(7, 'test01', 'test01', 'jjjjjjj', 2615245, 'test01', '2019-03-11 08:24:30', '2019-04-24 09:56:44'),
(8, 'Fahmi02', 'Adil', 'xxxxx', 623515487, 'fahmiadil@gmail.com', '2019-04-17 08:56:57', '2019-04-30 09:10:30'),
(9, 'Dubois', 'Alain', 'test', 625314587, 'alain.dubois@gmail.com', NULL, NULL),
(10, 'Salim', 'Rachid', 'test', 625153202, 'salim.rachid@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_11_123535_create_article_table', 2),
(4, '2019_02_11_124200_create_client_table', 3),
(5, '2019_02_11_124450_create_commande_table', 4),
(6, '2019_02_14_094256_create_article_table', 5),
(7, '2019_02_14_095103_create_client_table', 6),
(8, '2019_02_14_095449_create_commande_table', 7),
(9, '2019_02_14_095647_create_nomenclature_table', 8),
(10, '2019_02_14_095850_create_produit_table', 9),
(11, '2019_02_14_100159_create_ordre_fabrication_table', 10),
(12, '2019_02_14_100333_create_atelier_table', 11),
(13, '2019_02_14_100605_create_operation_table', 12),
(14, '2019_02_14_101637_create_poste_charge_table', 13),
(15, '2019_02_14_102055_create_affectation_table', 14),
(16, '2019_03_03_195604_create_article_table', 15),
(17, '2019_03_03_200041_create_article_table', 16),
(18, '2019_03_04_093403_create_produits_table', 17),
(19, '2019_03_04_101813_create_clients_table', 18),
(20, '2019_03_04_102325_create_operations_table', 19),
(21, '2019_03_04_102531_create_ordre_fabrications_table', 20),
(22, '2019_03_04_102655_create_poste_charges_table', 21),
(23, '2019_03_04_102842_create_ateliers_table', 22),
(24, '2019_03_04_103110_create_articles_table', 23),
(25, '2019_03_04_103832_add_column_client_id', 24),
(26, '2019_03_05_112158_add_column_prenom', 25),
(27, '2019_03_05_112550_add_column_prenom', 26),
(28, '2019_03_13_100118_create_produits_table', 27),
(29, '2019_03_13_120829_create_stocks_table', 28),
(30, '2019_03_13_121300_create_stocks_table', 29),
(31, '2019_03_14_104307_create_poste_charges_table', 30),
(32, '2019_03_21_093343_add_column_role', 31),
(33, '2019_03_22_095242_add_column_client_id', 32),
(34, '2019_03_27_110108_create_produits_table', 33),
(35, '2019_03_27_113833_add_column_client_id', 34),
(36, '2019_03_28_103556_add_column_client_id', 35),
(37, '2019_04_02_085954_create_produits_table', 36),
(38, '2019_04_02_201639_create_ordre_fabrications_table', 37),
(39, '2019_04_03_093235_create_operations_table', 38),
(40, '2019_04_05_082450_create_operation_poste_charge_table', 39),
(41, '2019_04_05_112040_add_column_atelier_id', 40),
(42, '2019_04_06_171247_add_column_atelier_id', 41),
(43, '2019_04_16_113528_add_column_poste_charge_id', 42),
(44, '2019_04_22_123919_add_column_pourcentage', 43),
(45, '2019_04_22_124253_add_column_pourcentage', 44),
(46, '2019_04_28_221156_add_column_status', 45);

-- --------------------------------------------------------

--
-- Structure de la table `nomenclature`
--

CREATE TABLE `nomenclature` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id` int(10) UNSIGNED NOT NULL,
  `produit_id` int(10) UNSIGNED NOT NULL,
  `atelier_id` int(10) UNSIGNED NOT NULL,
  `poste_charge_id` int(10) UNSIGNED NOT NULL,
  `num_operation` int(11) NOT NULL,
  `temps_preparation` time NOT NULL,
  `temps_execution` time NOT NULL,
  `temps_transfert` time NOT NULL,
  `libelle_operation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_debut` time NOT NULL,
  `h_fin` time NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id`, `produit_id`, `atelier_id`, `poste_charge_id`, `num_operation`, `temps_preparation`, `temps_execution`, `temps_transfert`, `libelle_operation`, `h_debut`, `h_fin`, `commentaire`, `created_at`, `updated_at`) VALUES
(2, 9, 8, 5, 1, '12:07:07', '20:00:00', '04:00:00', 'OP01', '08:00:00', '12:00:00', 'RAS', NULL, NULL),
(3, 10, 11, 6, 1, '12:07:07', '20:00:00', '04:00:00', 'OP02', '08:00:00', '12:00:00', 'RAS', NULL, NULL),
(4, 11, 11, 5, 253614, '12:07:07', '20:00:00', '04:00:00', 'Operation 01', '08:00:00', '12:00:00', 'RAS', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ordre_fabrications`
--

CREATE TABLE `ordre_fabrications` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` int(10) UNSIGNED NOT NULL,
  `commentaie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ordre_fabrications`
--

INSERT INTO `ordre_fabrications` (`id`, `libelle`, `produit_id`, `commentaie`, `created_at`, `updated_at`) VALUES
(2, 'OF01', 9, 'RAS', NULL, NULL),
(3, 'OF02', 10, 'RAS', NULL, NULL),
(4, 'OF03', 11, 'RAS', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('saralqadi01@gmail.com', '$2y$10$pOjSw4ytuBGnpQ271Lg2UOuV0kmP8HmmItTTvU6OHLMTE4F4LgGJ.', '2019-05-16 11:30:32');

-- --------------------------------------------------------

--
-- Structure de la table `poste_charges`
--

CREATE TABLE `poste_charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_operation` int(11) NOT NULL,
  `num_section` int(11) NOT NULL,
  `num_soussection` int(11) NOT NULL,
  `machine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_oeuvre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taux_horaire_forfait` double(8,2) NOT NULL,
  `nbre_poste` int(11) NOT NULL,
  `capacité_nominale` double(8,2) NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `poste_charges`
--

INSERT INTO `poste_charges` (`id`, `id_operation`, `num_section`, `num_soussection`, `machine`, `main_oeuvre`, `designation`, `taux_horaire_forfait`, `nbre_poste`, `capacité_nominale`, `commentaire`, `created_at`, `updated_at`) VALUES
(2, 2056, 2, 2, 'test', 'test', 'test', 23.00, 30, 36.00, 'test', '2019-03-15 08:49:26', '2019-04-24 09:53:33'),
(5, 5263, 635, 26351, 'machine1', 'MO1', 'test01', 30.00, 35, 50.00, 'test', '2019-03-22 11:28:17', '2019-03-22 11:28:17'),
(6, 225366, 3, 12, 'Machine2', 'MO01', 'test', 20.00, 6, 30.00, 'RAS', '2019-04-15 22:37:26', '2019-04-18 11:37:07'),
(7, 3662, 263, 1025, 'M036', 'test', 'test', 23.00, 52, 60.00, 'RAS', '2019-04-24 09:54:51', '2019-04-24 09:54:51');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `libelle`, `client_id`, `pourcentage`, `status`, `date_debut`, `date_fin`, `created_at`, `updated_at`) VALUES
(9, 'Projet04', 6, 75, 'En cours', '2019-04-10', '2019-04-26', '2019-04-18 20:57:06', '2019-05-03 10:07:34'),
(10, 'Projet07', 7, 70, 'En cours', '2019-04-11', '2019-04-27', '2019-04-19 11:36:31', '2019-05-03 10:08:27'),
(11, 'Projet03', 8, 100, 'Terminé', '2019-04-02', '2019-04-24', NULL, '2019-05-03 10:07:25'),
(12, 'Projet09', 9, 30, 'En cours', '2019-04-10', '2019-04-18', '2019-04-30 09:21:56', '2019-06-17 13:00:02');

--
-- Déclencheurs `produits`
--
DELIMITER $$
CREATE TRIGGER `produit_after_update` AFTER UPDATE ON `produits` FOR EACH ROW BEGIN
	
			SET @changetype = 'EDIT';
    
		INSERT INTO audit (produit_id, pourcentage, changetype) VALUES (NEW.id, NEW.pourcentage, @changetype);
		
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomenclature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delai_semaine` double(8,2) NOT NULL,
  `prix_standard` double(8,2) NOT NULL,
  `lot_reaprvs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_min` double(8,2) NOT NULL,
  `stock_max` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `reference`, `designation`, `nomenclature`, `type`, `unite`, `delai_semaine`, `prix_standard`, `lot_reaprvs`, `stock_min`, `stock_max`, `created_at`, `updated_at`) VALUES
(1, '02020202', 'test02', 'test', 'test', 'test', 8.00, 20000.00, 'test', 50.00, 70.00, '2019-03-15 09:24:12', '2019-03-22 11:29:05'),
(4, '00001', 'test01', 'Nom01', 'test01', 'unite01', 6.00, 20000.00, 'loR', 30.00, 50.00, '2019-03-22 11:30:06', '2019-04-24 09:55:04');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'user user', 'saralqadi01@gmail.com', NULL, '$2y$10$RM7CSMrZTwu1JFoQYeR9gOFgPSUcXIqnbgFFcnVWr3SGvzq8FIhC.', 'utilisateur', 'WypII62w7ebVpJ8Y99uFh2jd2OOrVunexVD17RhaI4EBGUAfkLK0VAK8aUCu', '2019-04-22 11:35:42', '2019-05-16 11:07:20'),
(8, 'Sara LQADI', 'test@gmail.com', NULL, '$2y$10$ta3qUs3axEk0VmF80tX7GuS8Bq/AgA2iW21PTtR0SD6csnVrtiUkq', 'administrateur', 'mqG9unZssBMnoLqrKKntKzxEr7Xtzodt90NIeOtLhfn71pYutSafCKw8WadO', '2019-04-22 11:36:31', '2019-05-16 11:07:50'),
(10, 'user2', 'user2@gmail.com', NULL, '$2y$10$UYCyPM7MBhqvZ5ZfqdvbMO.sRT.HM2lpIOakBMHG//Ychq9TzsnVe', 'chef d\'atelier', 'QFNHMCXhHXuMgkrG9aRLLTmBcteW3Olr3EtG9XUY2K5WBz2oVIqfiPpCMogz', '2019-04-25 09:43:33', '2019-04-25 09:43:33'),
(11, 'admin', 'saralqadi@gmail.com', NULL, '$2y$10$YSt/Pa8s9Bmgn0SWg7qrqeph05i2KVpbDrcrkHqAkFOc29lHADo/2', 'administrateur', NULL, '2019-04-28 22:17:57', '2019-05-16 11:07:40'),
(12, 'soufiane lqadi', 'soufianelqadi@gmail.com', NULL, '$2y$10$XnvaxSPHEKZ9sSn5Ob6FR.QGYF2Ci4fHyz0DVJbWr6L4ydi4sd8f6', 'chef de projet', '3AAZaUWzwrP5AM4GQGKO0d3TEw4cj1hPSqxWqKVyhOBxY3ICXzGukpZLLlpf', '2019-04-29 16:06:57', '2019-06-17 16:49:20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ateliers`
--
ALTER TABLE `ateliers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_produit_id` (`produit_id`),
  ADD KEY `ix_changetype` (`changetype`),
  ADD KEY `ix_changetime` (`changetime`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nomenclature`
--
ALTER TABLE `nomenclature`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operations_produit_id_foreign` (`produit_id`),
  ADD KEY `operations_atelier_id_foreign` (`atelier_id`),
  ADD KEY `operations_poste_charge_id_foreign` (`poste_charge_id`);

--
-- Index pour la table `ordre_fabrications`
--
ALTER TABLE `ordre_fabrications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordre_fabrications_produit_id_foreign` (`produit_id`);

--
-- Index pour la table `poste_charges`
--
ALTER TABLE `poste_charges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_client_id_foreign` (`client_id`);

--
-- Index pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ateliers`
--
ALTER TABLE `ateliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `nomenclature`
--
ALTER TABLE `nomenclature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `ordre_fabrications`
--
ALTER TABLE `ordre_fabrications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `poste_charges`
--
ALTER TABLE `poste_charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `FK_audit_produit_id` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `operations_atelier_id_foreign` FOREIGN KEY (`atelier_id`) REFERENCES `ateliers` (`id`),
  ADD CONSTRAINT `operations_poste_charge_id_foreign` FOREIGN KEY (`poste_charge_id`) REFERENCES `poste_charges` (`id`),
  ADD CONSTRAINT `operations_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `ordre_fabrications`
--
ALTER TABLE `ordre_fabrications`
  ADD CONSTRAINT `ordre_fabrications_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
