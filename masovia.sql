-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Mar 2019, 01:36
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `masovia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `details`
--

CREATE TABLE `details` (
  `id` int(10) NOT NULL,
  `image` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `placeId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `details`
--

INSERT INTO `details` (`id`, `image`, `placeId`) VALUES
(1, 'Brzuze2.jpg', 1),
(2, 'Brzuze3.jpg', 1),
(3, 'Czersk2.jpg', 2),
(4, 'Czersk3.jpg', 2),
(5, 'Popowo2.jpg', 3),
(6, 'Popowo3.jpg', 3),
(7, 'Wyszkow2.jpg', 4),
(8, 'Wyszkow3.jpg', 4),
(9, 'Kleszewo2.jpg', 5),
(10, 'Kleszewo3.jpg', 5),
(11, 'Beniaminow2.jpg', 6),
(12, 'Beniaminow3.jpg', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `places`
--

CREATE TABLE `places` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `localization` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `access` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci PACK_KEYS=0;

--
-- Zrzut danych tabeli `places`
--

INSERT INTO `places` (`id`, `name`, `localization`, `type`, `date`, `access`, `description`, `image`) VALUES
(1, 'Żwirownia Brzuze', 'powiat makowski, gmina Rzewnie', 'przyroda', '', 'swobodny', 'W obrębie wsi Brzuze Duże znajduje się wyrobisko pożwirowe wypełnione wodą, mające połączenie z Narwią Powierzchnia utworzonego w ten sposób jeziora wynosi około 100 ha.', 'Brzuze1.jpg'),
(2, 'Zamek Książąt Mazowieckich w Czersku', 'powiat piaseczyński, gmina Góra Kalwaria', 'zamek', '1410', 'płatny', 'Ruiny średniowiecznego zamku z trzema okazałymi gotyckimi wieżami, ceglanymi murami i widokiem na Wisłę.', 'Czersk1.jpg'),
(3, 'Kościół w Popowie Kościelnym', 'powiat wyszkowski, gmina Somianka', 'kościół', '1906', 'ograniczony', 'Zespół kościoła obejmuje kościół murowany neogotycki z 1900-1906 roku, według projektu Józefa Piusa Dziekońskiego, kryptę grobową fundatorów świątyni z 1909 roku oraz cudowny obraz Matki Bożej Popowskiej.', 'Popowo1.jpg'),
(4, 'Most kolejowy', 'Wyszków', 'most', '1940', 'zabroniony', 'Stalowy most nad rzeką Bug. Na moście kolejowym w Wyszkowie kręcono sceny do filmu "Katyń"; (2007) Andrzeja Wajdy. Środkowy filar między dwoma przęsłami jest najbardziej zachowanym filarem po pierwszej konstrukcji mostu z roku 1897.', 'Wyszkow1.jpg'),
(5, 'Mauzoleum żołnierzy radzieckich', 'Kleszewo, gmina Pułtusk', 'cmentarz', '1949', 'swobodny', 'Cmentarz Żołnierzy Radzieckich w Kleszewie składa się z 369 mogił zbiorowych i 85 indywidualnych. Łączna liczba pochowanych żołnierzy to 16 643.', 'Kleszewo1.jpg'),
(6, 'Fort Beniaminów', 'powiat legionowski, gmina Nieporęt', 'wojskowy', '1909', 'zabroniony', 'Fort zbudowany przez Rosjan w okresie poprzedzającym I wojnę światową.', 'Beniaminow1.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `details`
--
ALTER TABLE `details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
