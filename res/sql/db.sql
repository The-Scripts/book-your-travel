-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Paź 2023, 22:59
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bookedtravels`
--

CREATE TABLE `bookedtravels` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `OfferID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `bookedtravels`
--

INSERT INTO `bookedtravels` (`ID`, `UserID`, `OfferID`) VALUES
(4, 1, 1),
(5, 1, 3),
(6, 1, 2),
(7, 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `imgs`
--

CREATE TABLE `imgs` (
  `ID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `OfferID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `imgs`
--

INSERT INTO `imgs` (`ID`, `Image`, `OfferID`) VALUES
(1, 'https://imgs.search.brave.com/KCkwEQ2qhv3ZhJrvxx5tWnIvsHdOYRrLwDUoxtzExhE/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS1jZG4udHJpcGFk/dmlzb3IuY29tL21l/ZGlhL3Bob3RvLW8v/MDgvYTQvODcvODgv/dHJhZm8tYmFzZS1j/YW1wLmpwZw', 1),
(2, 'https://imgs.search.brave.com/UqSN6eVgQhpIh6lZSUn4vitTKTqTBbMzOwRreNcbp4s/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWcu/bm9jbGVnaS1vbmxp/bmUucGwvcG9rb2pl/LWdvc2Npbm5lLXct/cmF0dXN6dS1vZ3Jv/ZHppZW5pZWMtMzU4/NDNtLmpwZw', 2),
(3, 'https://imgs.search.brave.com/l_pr9rmqB70ug_0IQIbv8b4WxhxhF2Z7xF-kSzzax8U/rs:fit:860:0:0/g:ce/aHR0cDovL3d3dy5n/b3NjaW5pZWNvcmxp/a3dtaXJvd2llLnBs/L2ltZy9nYWxlcmlh/X2thdC9vcmxpa19i/dWR5bmVrLmpwZw', 3),
(4, 'https://imgs.search.brave.com/rBtD3EOPOHSnL-zWO7CC7cbBkYPRcjfOKnP3vNJIUPU/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tZXRl/b3ItdHVyeXN0eWth/LnBsL2ltYWdlcy9i/YXNlLzUvNDIxMi80/ODgzMTFfNDAuanBn', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offers`
--

CREATE TABLE `offers` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Latitude` decimal(21,16) NOT NULL,
  `Longitude` decimal(21,16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `offers`
--

INSERT INTO `offers` (`ID`, `Title`, `Description`, `Price`, `StartDate`, `EndDate`, `Latitude`, `Longitude`) VALUES
(1, 'Trafo Base Camp', '<p>\r\nNiesamowita przygoda z noclegiem w najlepszym możliwym miejscu w Podlesicach. Trafo Base Camp oferuje wyśmienitą kuchnię salę treningową i konferencyjną ognisko i ogródek. Jest też osobno sklep z sprzętem turystycznym i wspinaczkowym.\r\n</p>\r\n<p>\r\nW cenie wycieczki poza wspaniałym noclegiem i pożywieniem jest również przyszykowana wyprawa w skały z doświadczonymi instruktorami, którzy przeprowadzą pełęn kurs.\r\n</p>', '2450.00', '2023-07-01', '2023-07-15', '50.5665674351534660', '19.5356050517405680'),
(2, 'Ratusz Ogrodzieniec', '<p>\r\nNiesamowita przygoda czeka na Ciebie w Ratuszu w Ogrodzieńcu. Nasz urokliwy obiekt oferuje nie tylko komfortowe noclegi, ale także wiele innych atrakcji. Nasza restauracja serwuje wyśmienite dania, które zadowolą nawet najbardziej wybrednych smakoszy.\r\n</p>\r\n<p>\r\nJednak to nie wszystko! Nasz ogródek to idealne miejsce na relaks i odpoczynek na świeżym powietrzu, a wieczorem możesz cieszyć się atmosferą ogniska.\r\n</p>\r\n<p>\r\nW cenie pobytu oferujemy także przewodzoną wyprawę po okolicznych skałach z doświadczonymi przewodnikami. Zaplanowana jest równierz wizyta w pobliskim zamku. Czekamy na Ciebie, byś mógł przeżyć niezapomniane chwile w naszym Ratuszu.\r\n</p>', '4800.00', '2024-08-10', '2024-08-25', '50.4532462119902050', '19.5238280825227730'),
(3, 'Orlik Mirów', '<p>\r\nPrzyjedź do Orlika Mirów i doświadcz niesamowitej przygody! Nasze urokliwe miejsce oferuje nie tylko komfortowy nocleg, ale także wiele innych atrakcji, które sprawią, że Twój pobyt będzie niezapomniany.\r\n</p>\r\n<p>\r\nNasza stołówka serwuje wyśmienite śniadania i kolacje, które zadowolą nawet najbardziej wybrednych smakoszy.\r\n</p>\r\n<p>\r\nOrlik Mirów ma także ognisko, które możesz rozpalić na wieczór by poczuć klimat i ciepło. \r\n</p>\r\n<p>\r\nAle to nie koniec! W cenie pobytu oferujemy przewodzoną wyprawę po okolicznych atrakcjach wraz z doświadczonymi instruktorami i przewodnikami, którzy przekażą Ci niesamowite historie. To wyjątkowa okazja, by poznać uroki Mirowa i odwiedzić ruiny zamku. \r\n</p>\r\n<p>\r\nZapraszamy do Orlika Mirów, byś mógł przeżyć niezapomniane chwile w naszym pięknym miejscu.\r\n</p>', '3200.00', '2024-09-05', '2024-09-12', '50.6150298790832740', '19.4725325729212170'),
(4, 'Agroturystyka pod Strażnicą', '<p>\r\nZaplanuj swoją wyjątkową przygodę w Agroturystyce pod Strażnicą w Łutowcu! Nasza urokliwa agroturystyka oferuje nie tylko wygodne noclegi, ale również wiele innych atrakcji, które uczynią Twój pobyt niezapomnianym.\r\n</p>\r\n<p>\r\nNasza kuchnia to prawdziwa uczta dla podniebienia, serwując dania przygotowywane z produktów od miejscowych dostawców, które zadowolą najbardziej wymagających smakoszy.\r\n</p>\r\n<p>\r\nAgroturystyka pod Strażnicą to także oaza spokoju, gdzie w naszym uroczym ogrodzie możesz cieszyć się relaksem na świeżym powietrzu. Wieczorem zapraszamy do wspólnego ogniska, by podzielić się historiami i wrażeniami. Dysponujemy również wiatą pod, którą możemy znaleźć grila i stoły z łąwami dla wszystkich zmęczonych.\r\n</p>\r\n<p>\r\nJeśli jesteś miłośnikiem aktywności na świeżym powietrzu, to nasza agroturystyka jest idealnym miejscem. W okolicy znajdziesz liczne szlaki turystyczne i atrakcje.\r\n</p>\r\n<p>\r\nAle to nie koniec! W cenie pobytu oferujemy także przewodzoną wyprawę po okolicznych atrakcjach wraz z doświadczonymi przewodnikami, którzy podzielą się swoją wiedzą i pasją do regionu.\r\n</p>\r\n<p>\r\nTo wyjątkowa okazja, by poznać tę malowniczą okolicę. Serdecznie zapraszamy do Agroturystyki pod Strażnicą, byś mógł przeżyć niezapomniane chwile w naszym urokliwym miejscu.\r\n</p>', '2150.00', '2024-10-06', '2024-10-09', '50.6281700505497500', '19.4525109219685750');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `Email`, `Password`) VALUES
(1, 'user@example.com', '$2y$10$ozrv6dheFGJagY7WxztCQuZcY/29ZpZWDLkkAW8QUHm6zT1sD52ha');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bookedtravels`
--
ALTER TABLE `bookedtravels`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `OfferID` (`OfferID`);

--
-- Indeksy dla tabeli `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `imgs_offers_ID_fk` (`OfferID`);

--
-- Indeksy dla tabeli `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `bookedtravels`
--
ALTER TABLE `bookedtravels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `imgs`
--
ALTER TABLE `imgs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `offers`
--
ALTER TABLE `offers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `bookedtravels`
--
ALTER TABLE `bookedtravels`
  ADD CONSTRAINT `bookedtravels_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `bookedtravels_ibfk_2` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`ID`);

--
-- Ograniczenia dla tabeli `imgs`
--
ALTER TABLE `imgs`
  ADD CONSTRAINT `imgs_offers_ID_fk` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
