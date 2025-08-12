-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Lug 05, 2022 alle 17:34
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Retrodatabase`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Cookie`
--

CREATE TABLE `Cookie` (
  `id` int(11) NOT NULL,
  `hash` int(11) DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `json_cookie` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_cookie`)),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `prezzo` float NOT NULL DEFAULT 99999,
  `descrizione` text DEFAULT NULL,
  `tipo` int(11) NOT NULL COMMENT '0=Console\r\n1=Gioco\r\n2=Accessorio',
  `quantita` int(11) NOT NULL DEFAULT 1,
  `imag_url` varchar(255) DEFAULT NULL COMMENT 'url all''immagine del gioco',
  `created_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Aggiunto in stock',
  `updated_at` date NOT NULL DEFAULT current_timestamp() COMMENT 'Update stock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Product`
--

INSERT INTO `Product` (`id`, `nome`, `prezzo`, `descrizione`, `tipo`, `quantita`, `imag_url`, `created_at`, `updated_at`) VALUES
(1, 'Pokemon', 15, 'acchiappalitutti', 1, 1, NULL, '2022-06-13', '2022-06-13'),
(2, 'Digimon!', 30, 'Un gioco da Lodare!', 1, 3, NULL, '2022-06-13', '2022-06-13'),
(3, 'Mariolone Fratello!', 10, 'Aiuta Mariolone a uccidere tutte le tartarughe!', 1, 5, NULL, '2022-06-13', '2022-06-13'),
(4, 'Atari 2600', 999, 'Stato Rifinito \r\nQualità 30 su 30!', 0, 5, NULL, '2022-06-13', '2022-06-13'),
(5, 'Sega Mega Drive\r\n', 150, 'Fino a 32 bit! \r\nMolto meglio di Nintendoz', 0, 15, NULL, '2022-06-13', '2022-06-13'),
(6, 'NES', 200, 'NeS Entertenimzn Sistemz', 0, 22, NULL, '2022-06-13', '2022-06-13'),
(8, 'Mariolone Fratello2!', 10, 'Aiuta Mariolone a uccidere altre tartarughe!!', 1, 2, NULL, '2022-06-13', '2022-06-13'),
(9, 'SUPER Mariolone Fratello3!', 10, 'Aiuta Mariolone a uccidere ANCORA ALTRE tartarughe!!', 1, 3, NULL, '2022-06-13', '2022-06-13'),
(10, 'Pokemon Verde Scaduto!', 15, 'Non acchiapparli necessariamente tutti...', 1, 2, NULL, '2022-06-13', '2022-06-13'),
(11, 'Digimon752!', 2.5, 'Un gioco che un tempo era da lodare ma oggi è solo lo spettro di se stesso.', 1, 2, NULL, '2022-06-13', '2022-06-13'),
(12, 'CSS 4.15!', 600, 'Perdi 3 ore della tua vita per 9 quadrati!', 1, 1, NULL, '2022-06-13', '2022-06-13');

-- --------------------------------------------------------

--
-- Struttura della tabella `Order`
--

CREATE TABLE `Order` (
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `totale_spesa` float NOT NULL DEFAULT 0,
  `stato` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending(non pagato)\r\n1=elaborazione(pagato)\r\n2=spedito\r\n3=consegnato'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `User`
--

INSERT INTO `User` (`id`, `username`, `nome`, `cognome`, `email`, `indirizzo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'fake', 'lorenz', 'siena', 'sienarlore@gmail.it', 'via vai 32 solarino', '$2y$10$hw.bH0bKKFcBW7xeXQvsxekcZ5e0BFZPxPSbwEYmtAbSU95RfQRCK', '2022-06-13', '2022-06-13'),
(2, 'bana', 'lore', 'cogn', 'amao@gmail.com', 'asdad', '$2y$10$bUhObWPl9WTJDku.XVHo3eiDEA2GWZIc9kKQqXpJnuZ86H2oLwfkK', '2022-06-13', '2022-06-13');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Cookie`
--
ALTER TABLE `Cookie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`id_user`,`id_prod`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indici per le tabelle `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Cookie`
--
ALTER TABLE `Cookie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Cookie`
--
ALTER TABLE `Cookie`
  ADD CONSTRAINT `proprietario` FOREIGN KEY (`id`) REFERENCES `User` (`id`);

--
-- Limiti per la tabella `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `Product_costrain` FOREIGN KEY (`id_prod`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `User_costrain` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
