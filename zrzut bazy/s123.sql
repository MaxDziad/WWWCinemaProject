-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 
-- Czas generowania: 08 Lip 2021, 10:19
-- Wersja serwera: 8.0.21
-- Wersja PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `s123`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `title` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `detailed_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` smallint NOT NULL,
  `production` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_path` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `trailer_URL` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `available_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `movie_hours` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `short_description`, `detailed_description`, `genre`, `duration`, `production`, `direction`, `poster_path`, `trailer_URL`, `available_date`, `expiration_date`, `movie_hours`) VALUES
(1, 'Godzilla vs Kong', 'Godzilla vs. Kong ukazuje pojedynek dwóch legendarnych przeciwników w spektakularnej batalii, której stawką są następne stulecia zagrożonego świata.', 'Godzilla vs. Kong ukazuje pojedynek dwóch legendarnych przeciwników w spektakularnej batalii, której stawką są następne stulecia zagrożonego świata. Kong i jego obrońcy podejmują niebezpieczną wyprawę w celu odnalezienia prawdziwego domu kolosa. Towarzyszy im Jia, młoda sierota, którą z Kongiem łączy wyjątkowa i silna zażyłość. Niespodziewanie na drodze ekspedycji staje wściekła Godzilla, siejąc zniszczenie po całym globie. Monumentalne starcie tych dwóch tytanów, zaaranżowane przez pozostające w ukryciu siły, jest zaledwie początkiem tajemnicy, której rozwiązanie leży głęboko w jądrze Ziemi.', 'Science-Fiction', 113, 'USA, 2020', 'Adam Wingard', '/resources/godzilla_vs_kong.jpg', 'https://www.youtube.com/embed/LyJi9cVT5XM', '2021-06-04', '2021-09-30', '13,16,20'),
(2, 'Szybcy i Wściekli 9', 'Dom Toretto Vin Diesel prowadzi spokojne życie z Letty i jego synem, małym Brianem, ale wiedzą, że niebezpieczeństwo zawsze czai się tuż za ich spokojnym horyzontem.', 'Dom Toretto Vin Diesel prowadzi spokojne życie z Letty i jego synem, małym Brianem, ale wiedzą, że niebezpieczeństwo zawsze czai się tuż za ich spokojnym horyzontem. Tym razem to zagrożenie zmusi Doma do stawienia czoła grzechom z przeszłości. Jeśli zamierza ocalić tych, których kocha najbardziej musi stawić temu czoła. Jego ekipa dołącza do zespołu, aby powstrzymać wstrząsającą światem akcję prowadzoną przez najbardziej wykwalifikowanego zabójcę i kierowcę o wysokich osiągach, jakiego kiedykolwiek spotkali: mężczyznę, który jest również porzuconym bratem Doma, Jakobem.', 'Akcja', 143, 'USA, 2020', 'Justin Lin', '/resources/szybcy_i_wsciekli_9.jpg', 'https://www.youtube.com/embed/UBQDay4fROo', '2021-06-25', '2021-10-22', '11,15'),
(3, 'Czarna Wdowa', 'Scarlett Johansson po raz ostatni wciela się w superagentkę T.A.R.C.Z.Y. Film umiejscowiono między wydarzeniami z \"Kapitan Ameryka: Wojna bohaterów\" i \"Avengers: Wojna bez granic\".', 'Scarlett Johansson po raz ostatni wciela się w superagentkę T.A.R.C.Z.Y. Film umiejscowiono między wydarzeniami z \"Kapitan Ameryka: Wojna bohaterów\" i \"Avengers: Wojna bez granic\". Czarna Wdowa, czyli Natasha Romanoff postanawia zbadać własną przeszłość i wyrównać stare rachunki. Na jej drodze staje tajemniczy Taskmaster...', 'Science-Fiction', 134, 'USA, 2020', 'Cate Shortland', '/resources/czarna_wdowa.jpg', 'https://www.youtube.com/embed/z5GpXhQ58BM', '2021-07-05', '2021-10-10', '16,19'),
(4, 'Ciche Miejsce 2', 'W następstwie dramatycznych wydarzeń, które miały miejsce w domu Abbottów, rodzina (Emily Blunt, Millicent Simmonds, Noah Jupe) musi stawić czoła temu, co dzieje się poza domem, temu, jak wygląda teraz świat.', 'W następstwie dramatycznych wydarzeń, które miały miejsce w domu Abbottów, rodzina (Emily Blunt, Millicent Simmonds, Noah Jupe) musi stawić czoła temu, co dzieje się poza domem, temu, jak wygląda teraz świat. Wie, że kluczem do przetrwania jest cisza. Idąc w nieznane, Abbottowie szybko przekonają się, że tajemnicze stworzenia, które do ataku prowokuje dźwięk, to nie jedyne zagrożenie…', 'Horror', 97, 'USA, 2020', 'John Krasinski', '/resources/ciche_miejsce_2.jpg', 'https://www.youtube.com/embed/MLFRU63wOHk', '2021-06-04', '2021-08-22', '20,23'),
(5, 'Cruella', 'Cruella powraca ze znakomitą Emmą Stone w roli głównej!', 'Cruella powraca ze znakomitą Emmą Stone w roli głównej! Nowa produkcja Disneya przedstawia historię o buntowniczych początkach jednej z najbardziej znanych i genialnych filmowych postaci, legendarnej Cruelli de Mon.', 'Komedia kryminalna', 134, 'USA, 2020', 'Alex Timbers', '/resources/cruella.jpg', 'https://www.youtube.com/embed/gmRKv7n2If8', '2021-05-28', '2021-09-25', '15,18'),
(6, 'Jeden Gniewny Człowiek', 'nowe dzieło Guya Ritchiego z Jasonem Stathamem w roli głównej!', 'H. pracuje dla firmy, która organizuje konwoje i odpowiada za transport setek milionów dolarów w Los Angeles.', 'Film Akcji', 119, 'USA, 2021', 'Guy Ritchie', '/resources/jeden.jpg', 'https://www.youtube.com/embed/_Mlqg8QVxj8', '2021-06-04', '2021-09-05', '11,14,17'),
(7, 'Co w Duszy Gra', 'Joe Gardner prowadzi zespół muzyczny w gimnazjum. Jego prawdziwą pasją jest jednak jazz.', 'Joe Gardner prowadzi zespół muzyczny w gimnazjum. Jego prawdziwą pasją jest jednak jazz. Joe przeżywa kryzys, jaki jest udziałem wszystkich artystów. Coraz wyraźniej dostrzega, że marzenie o zostaniu muzykiem jazzowym, nie spełni się. Pewnego dnia przez jedno nieoczekiwane zdarzenie trafia do fantastycznego miejsca, gdzie zostaje zmuszony, by ponownie zastanowić się nad tym, co to znaczy mieć duszę. Tam spotyka, a ostatecznie również zaprzyjaźnia się z 22 – duszą, która uważa, że życie na Ziemi nie toczy się tak, jak powinno.', 'Familijny', 107, 'USA, 2020', 'Peter Docter', '/resources/co_w_duszy_gra.jpg', 'https://www.youtube.com/embed/MnwWxx1J5cM', '2021-03-05', '2021-07-25', '8,12'),
(8, 'Krudowie 2: Nowa Era', 'Krudowie potrzebują nowego miejsca do życia. Tak więc pierwsza prehistoryczna rodzina wyrusza w świat w poszukiwaniu bezpieczniejszego miejsca, które można by nazwać domem.', 'Krudowie potrzebują nowego miejsca do życia. Tak więc pierwsza prehistoryczna rodzina wyrusza w świat w poszukiwaniu bezpieczniejszego miejsca, które można by nazwać domem. Kiedy odkrywają idylliczny raj otoczony murem, raj który spełnia wszystkie ich potrzeby, myślą, że ich problemy zostały rozwiązane… z wyjątkiem jednej rzeczy. Mieszka tam już inna rodzina: Bettermanowie. Bettermanowie (z naciskiem na better) - ze swoim wyszukanym domkiem na drzewie, niesamowitymi wynalazkami i nawadnianymi hektarami upraw smacznych owoców - znajdują się kilka stopni powyżej Krudów na drabinie ewolucyjnej. Kiedy przyjmują Krudów jako pierwszych gości na świecie, wkrótce narastają napięcia między rodziną jaskiniową a rodziną współczesną.', 'Familijny', 95, 'USA, 2020', 'Chris Sanders', '/resources/krudowie_2.jpg', 'https://www.youtube.com/embed/oq2kbqEdpUo', '2021-05-28', '2021-08-25', '7,11'),
(9, 'Tom & Jerry', 'Jeden z najbardziej uwielbianych pojedynków w historii powraca w filmie Tima Story’ego Tom & Jerry.', 'Jeden z najbardziej uwielbianych pojedynków w historii powraca w filmie Tima Story’ego Tom & Jerry. Jerry obiera sobie za mieszkanie najlepszy hotel w Nowym Jorku w przeddzień mającego się tam odbyć „ślubu stulecia”. Tym samym zmusza zdesperowaną organizatorkę wesela do zatrudnienia Toma w celu pozbycia się gryzonia. Istna bitwa między kotem a myszą, do której dochodzi, może jednak zrujnować jej karierę, ceremonię, a być może nawet sam hotel. Wkrótce jednak pojawia się jeszcze większy problem: otóż przeciw całej trójce spiskuje diabolicznie ambitny pracownik. Nowa wielkoekranowa przygoda Toma i Jerry’ego to robiąca wrażenie mieszanka klasycznej animacji i gry aktorskiej. Film wyznacza nowy etap w życiu tych słynnych bohaterów, zmuszając ich do niewyobrażalnego – podjęcia współpracy.', 'Komedia', 101, 'USA, 2021', 'Tim Story', '/resources/tom_jerry.jpg', 'https://www.youtube.com/embed/0NbEtPILJk8', '2021-06-11', '2021-09-23', '11,14,17,20'),
(10, 'Miasto', 'Samotny Detektyw przybywa do miasta, by rozwikłać zagadkę tajemniczego morderstwa. Szybko staje się pionkiem w grze, toczonej między lokalnym gangsterem – Wielkim, a Profesorem – twórcą epokowych wynalazków.', 'Samotny Detektyw przybywa do miasta, by rozwikłać zagadkę tajemniczego morderstwa. Szybko staje się pionkiem w grze, toczonej między lokalnym gangsterem – Wielkim, a Profesorem – twórcą epokowych wynalazków. Sprawy komplikują się jeszcze bardziej, kiedy stróż prawa poznaje Piosenkarkę – obiekt pożądania zarówno Profesora, jak i Wielkiego. Wkrótce miasto i jego ulice staną się świadkami nieprawdopodobnych wydarzeń, a sam Detektyw odkryje zaskakującą prawdę o samym sobie.', 'Kryminał', 91, 'Polska, 2021', 'Marcin Sauter', '/resources/miasto.jpg', 'https://www.youtube.com/embed/qPQ34l4meYg', '2021-06-25', '2021-10-11', '15,19'),
(11, 'Minari', 'W pogoni za amerykańskim snem Jakob Yi (Steven Yeun) przeprowadza swoją rodzinę z Kalifornii do sielskiego Arkansas.', 'W pogoni za amerykańskim snem Jakob Yi (Steven Yeun) przeprowadza swoją rodzinę z Kalifornii do sielskiego Arkansas. Jego marzeniem jest stworzyć własną farmę, której plony mogłyby zaopatrywać okolicznych koreańskich sklepikarzy. Pozostali członkowie rodziny nie są zadowoleni z przenosin, zwłaszcza, gdy okazuje się, że ich nowy dom ma… kółka i jest tak wątły, że może sobie nie poradzić z nawiedzającymi okolicę tornadami. Jakby tego było mało, do rodziny dołącza nieco szelmowska babcia z Korei. Choć nie pachnie tak jak powinna, a jej metody wychowawcze są dość dziwaczne, na przekór wszystkiemu, nawiązuje nić porozumienia z 6-letnim niesfornym Davidem, a pozostałych członków rodziny uczy, jak tworzyć nową więź z Ameryką, pielęgnując równocześnie własną tradycję.', 'Dramat', 115, 'USA, 2020', 'Lee Isaac Chung', '/resources/minari.jpg', 'https://www.youtube.com/embed/KQ0gFidlro8', '2021-06-18', '2021-10-04', '12,18'),
(12, 'Na Rauszu', 'Ten eksperyment to jazda bez trzymanki! „Na rauszu” opowiada historię grupy przyjaciół, nauczycieli szkoły średniej, zainspirowanych teorią, że skromna dawka czegoś mocniejszego pozwala otworzyć się na świat i lepiej w nim funkcjonować.', 'Na rauszu opowiada historię grupy przyjaciół, nauczycieli szkoły średniej, zainspirowanych teorią, że skromna dawka alkoholu pozwala otworzyć się na świat i lepiej w nim funkcjonować. Nie przewidują jednak skutków, jakie pociągnie za sobą długotrwałe utrzymywanie stałego poziomu promili we krwi – przez cały dzień, również w pracy...', 'Dramat', 117, 'Dania, 2020', 'Thomas Vinterberg', '/resources/narauszu.jpg', 'https://www.youtube.com/embed/1Gq8rlU9bRE', '2021-06-11', '2021-09-24', '14,17,21'),
(13, 'Luca', 'Pełen niezwykłych przygód film opowiada o dorastaniu dwójki przyjaciół mieszkającymi w pięknym nadmorskim miasteczku na Riwierze Włoskiej.', 'Pełen niezwykłych przygód film opowiada o dorastaniu dwójki przyjaciół mieszkającymi w pięknym nadmorskim miasteczku na Riwierze Włoskiej. Chłopcy wspólnie przeżywają niezapomniany letni czas, który upływa im na niekończących się przejażdżkach na skuterze i delektowaniu się lodami. Jednak ich beztroską zabawę może w każdej chwili zepsuć ujawnienie głęboko skrywanego sekretu. Obaj są potworami morskimi z innego świata znajdującego się tuż pod powierzchnią wody.', 'Przygodowy', 95, 'USA, 2021', 'Enrico Casarosa', '/resources/luca.jpg', 'https://www.youtube.com/embed/En_rHH66BJc', '2021-06-18', '2021-09-30', '9,13,16,21'),
(14, 'Ci, którzy życzą mi śmierci', 'Nastolatek jest świadkiem morderstwa, za co ściga go dwóch zabójców.', 'Nastolatek jest świadkiem morderstwa, za co ściga go dwóch zabójców. Chłopiec trafia pod opiekę strażaczki, która stara się go ochronić zarówno przed prześladowcami, jak i pożarem otaczającego ich lasu.', 'Thriller', 100, 'USA, 2021', 'Taylor Sheridan', '/resources/twwmd.jpg', 'https://www.youtube.com/embed/1cHo1WFofM4', '2021-06-18', '2021-09-30', '14,19,22'),
(15, 'Nomadland', 'Fern (Frances McDormand) pakuje swojego vana i wyrusza w drogę jako współczesna nomadka, po tym jak w wyniku recesji straciła właściwie cały swój dotychczasowy dobytek.', 'Fern (Frances McDormand) pakuje swojego vana i wyrusza w drogę jako współczesna nomadka, po tym jak w wyniku recesji straciła właściwie cały swój dotychczasowy dobytek. Nomadland, trzeci film fabularny reżyserki Chloé Zhao, przedstawia historię Lindy May, Swankie i Boba Wellsa, prawdziwych nomadów, którzy stają się mentorami i towarzyszami Fern podczas jej podróży po rozległym amerykańskim Zachodzie.', 'Dramat', 118, 'USA, 2020', 'Chloe Zhao', '/resources/nomadland.jpg', 'https://www.youtube.com/embed/uQXHbC_HYog', '2021-05-28', '2021-09-20', '12,19'),
(16, 'Mortal Kombat', 'Zawodnik mieszanych sztuk walki Cole Young przywykł do tego, że obrywa za pieniądze. Nie ma jednak pojęcia o swoim pochodzeniu.', 'Zawodnik mieszanych sztuk walki Cole Young przywykł do tego, że obrywa za pieniądze. Nie ma jednak pojęcia o swoim pochodzeniu i nie wie, dlaczego władca Zaświatów Shang Tsung nasłał na niego swojego najlepszego wojownika, Sub-Zero, kriomancera z innego wymiaru. W obawie o bezpieczeństwo rodziny Cole udaje się na poszukiwanie Sonyi Blade, poleconą mu przez Jaxa. Ten major sił specjalnych ma takie samo dziwne znamię w kształcie smoka, z jakim urodził się Cole. Wkrótce Cole trafia do świątyni Lorda Raidena, jednego ze Starszych Bóstw i obrońcy Ziemi, zapewniającego schronienie tym, którzy mają smocze znamię.', 'Akcja', 110, 'USA, 2021', 'Simon McQuoid', '/resources/mortalkombat.jpg', 'https://www.youtube.com/embed/CQufSiC-Hck', '2021-05-28', '2021-09-20', '15,18,21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `title` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_client` int NOT NULL,
  `name` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_cd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `date`, `time`, `price`, `id_client`, `name`, `surname`, `address`, `address_cd`, `postcode`, `city`, `email`, `phone_number`, `delivery`, `payment`, `created`) VALUES
(1, 'Szybcy i Wściekli 9', '2021-07-05', '11:00', '19.99', 0, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'by-collection', '2021-07-05 17:17:34'),
(2, 'Ci, którzy życzą mi śmierci', '2021-07-05', '14:00', '19.99', 0, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'by-collection', '2021-07-05 17:17:34'),
(3, 'Szybcy i Wściekli 9', '2021-07-05', '15:00', '19.99', 0, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'transfer', '2021-07-05 17:22:06'),
(4, 'Czarna Wdowa', '2021-07-05', '16:00', '19.99', 0, 'Twoja', 'Stara', 'Adama Mickiewicza', '15a', '12-345', 'Kraków', 'kwant@agh.pl', '997998999', 'e-ticket', 'transfer', '2021-07-05 19:04:08'),
(6, 'Miasto', '2021-07-05', '19:00', '19.99', 0, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456789', 'collection', 'by-collection', '2021-07-05 21:55:30'),
(7, 'Szybcy i Wściekli 9', '2021-07-05', '15:00', '19.99', 0, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456789', 'e-ticket', 'transfer', '2021-07-05 22:25:07'),
(8, 'Luca', '2021-07-05', '16:00', '19.99', 0, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456789', 'e-ticket', 'transfer', '2021-07-05 22:25:07'),
(9, 'Minari', '2021-07-05', '12:00', '19.99', 0, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456789', 'collection', 'by-collection', '2021-07-05 22:36:27'),
(10, 'Tom & Jerry', '2021-07-05', '11:00', '19.99', 0, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456789', 'collection', 'by-collection', '2021-07-05 22:36:27'),
(11, 'Czarna Wdowa', '2021-07-21', '19:00', '19.99', 0, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456789', 'e-ticket', 'transfer', '2021-07-05 22:54:18'),
(12, 'Czarna Wdowa', '2021-07-06', '19:00', '19.99', 0, 'Maks', 'Dziadoń', 'Kuźnicy Kołłątajowskiej', '15', '31-234', 'Kraków', 'test@test.pl', '666666666', 'collection', 'by-collection', '2021-07-06 07:30:05'),
(13, 'Szybcy i Wściekli 9', '2021-07-06', '15:00', '19.99', 0, 'Maks', 'Dziadoń', 'Kuźnicy Kołłątajowskiej', '15', '31-234', 'Kraków', 'test@test.pl', '666666666', 'collection', 'by-collection', '2021-07-06 07:30:05'),
(14, 'Godzilla vs Kong', '2021-07-17', '13:00', '19.99', 0, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-06 10:23:16'),
(16, 'Szybcy i Wściekli 9', '2021-07-06', '15:00', '19.99', 0, 'konto', 'restowe', 'kasd', '12/12', '12-231', 'Wadowice', 'ka@ppa.wp', '098765432', 'collection', 'transfer', '2021-07-06 11:13:05'),
(17, 'Czarna Wdowa', '2021-07-30', '16:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'by-collection', '2021-07-07 10:51:35'),
(18, 'Jeden Gniewny Człowiek', '2021-07-07', '14:00', '19.99', 6, 'Filip', 'Gunia', 'os. Sikorskiego ', '2/19', '28-180', 'Busko-Zdrój', 'agunia@agh.pl', '515082693', 'e-ticket', 'transfer', '2021-07-07 11:01:06'),
(19, 'Tom & Jerry', '2021-07-07', '11:00', '19.99', 0, 'Amadeusz Gunia', 'Gunia', 'os. Sikorskiego', '15a', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 11:12:37'),
(22, 'Luca', '2021-07-07', '9:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 18:12:33'),
(23, 'Czarna Wdowa', '2021-07-07', '16:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 18:12:33'),
(24, 'Szybcy i Wściekli 9', '2021-07-07', '11:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 18:12:33'),
(25, 'Szybcy i Wściekli 9', '2021-07-07', '11:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 18:12:33'),
(27, 'Na Rauszu', '2021-07-07', '14:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 18:12:33'),
(28, 'Szybcy i Wściekli 9', '2021-07-07', '11:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 18:15:08'),
(31, 'Czarna Wdowa', '2021-07-07', '16:00', '19.99', 2, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456788', 'collection', 'by-collection', '2021-07-07 18:25:33'),
(32, 'Czarna Wdowa', '2021-07-07', '16:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'by-collection', '2021-07-07 18:30:40'),
(33, 'Na Rauszu', '2021-07-08', '21:00', '19.99', 2, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.co', '123456788', 'e-ticket', 'transfer', '2021-07-07 18:31:42'),
(34, 'Miasto', '2021-07-07', '15:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'transfer', '2021-07-07 18:56:19'),
(35, 'Miasto', '2021-07-07', '15:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'transfer', '2021-07-07 18:56:28'),
(36, 'Miasto', '2021-07-07', '15:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'transfer', '2021-07-07 18:56:28'),
(37, 'Minari', '2021-07-07', '12:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 18:57:44'),
(38, 'Minari', '2021-07-07', '12:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 18:58:23'),
(39, 'Ci, którzy życzą mi śmierci', '2021-07-07', '14:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'e-ticket', 'transfer', '2021-07-07 19:40:11'),
(40, 'Ci, którzy życzą mi śmierci', '2021-07-07', '14:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'by-collection', '2021-07-07 19:40:21'),
(41, 'Minari', '2021-07-23', '18:00', '19.99', 9, 'Zofia', 'Kukła', 'Buraczana', '45', '33-098', 'Łódź', 'kukla.zoska@op.pl', '787989090', 'e-ticket', 'transfer', '2021-07-07 20:01:48'),
(42, 'Minari', '2021-07-23', '18:00', '19.99', 9, 'Zofia', 'Kukła', 'Buraczana', '45', '33-098', 'Łódź', 'kukla.zoska@op.pl', '787989090', 'e-ticket', 'transfer', '2021-07-07 20:01:48'),
(43, 'Szybcy i Wściekli 9', '2021-07-22', '15:00', '19.99', 10, 'Elżbieta', 'Gunia', 'Oś.Orła Białego', '14/30', '28-100', 'Busko-Zdrój', 'henrykgunia@onet.com', '515082693', 'e-ticket', 'transfer', '2021-07-07 20:59:38'),
(44, 'Tom & Jerry', '2021-07-07', '11:00', '19.99', 10, 'Elżbieta', 'Gunia', 'Oś.Orła Białego', '14/30', '28-100', 'Busko-Zdrój', 'henrykgunia@onet.com', '515082693', 'collection', 'transfer', '2021-07-07 21:00:12'),
(45, 'Czarna Wdowa', '2021-07-08', '16:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'transfer', '2021-07-08 00:02:52'),
(46, 'Czarna Wdowa', '2021-07-08', '16:00', '19.99', 5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', 'collection', 'transfer', '2021-07-08 00:02:52'),
(47, 'Szybcy i Wściekli 9', '2021-07-08', '11:00', '19.99', 0, 'Kacper', 'JAbłoński', 'kkkj', '12/32', '34-245', 'Kęty', 'kacjab@live.com', '998765432', 'collection', 'by-collection', '2021-07-08 10:11:37'),
(48, 'Ci, którzy życzą mi śmierci', '2021-07-08', '14:00', '19.99', 2, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456788', 'e-ticket', 'transfer', '2021-07-08 10:12:56');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_cd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `address`, `address_cd`, `postcode`, `city`, `email`, `phone_number`, `password`, `created`) VALUES
(2, 'Kacper', 'Jabłoński', 'żwirki', '14', '69-420', 'Kęty', 'kacjab@live.com', '123456788', '$2y$10$4jzU6y7jl.LLE/W5kdxA0e2993yHibzR6mcgMNGMRRURR1waRbhdC', '2021-06-29 16:59:24'),
(3, 'Maks', 'Dziadoń', 'Kuźnicy Kołłątajowskiej', '15', '31-234', 'Kraków', 'test@test.pl', '666666666', '$2y$10$cqBa3qhdxigx6vYWtPxONOYehw6axjeQGozZAa7VB.W8xMiEtuKJ6', '2021-07-05 13:26:31'),
(4, 'Zmienione', 'dANE', 'Ulica', '77/88', '90-345', 'kiszyniuf', 'italy@win.jpg', '124578369', '$2y$10$jp2YG5dhjV9Dv4N6m8py0OHjTKcjvGMcoEUvgDgRaQ7dnuhr9i1fO', '2021-07-06 10:28:42'),
(5, 'Amadeusz', 'Gunia', 'os. Sikorskiego ', '2/2', '28-100', 'Busko-Zdrój', 'gunia.amadeusz@gmail.com', '798923768', '$2y$10$d2eUnwbyVD80kfk1CnSUmOlIjdOmfqvFQlFXka3uPuVIFueBpnCne', '2021-07-07 10:31:08'),
(9, 'Zofia', 'Kukła', 'Buraczana', '45', '33-098', 'Łódź', 'kukla.zoska@op.pl', '787989090', '$2y$10$m8ke0YsBg5AXWoZKwRLvh.080yELQnENz1rrie2Gx5anA8uM9d9Mi', '2021-07-07 20:00:15'),
(10, 'Elżbieta', 'Gunia', 'Oś.Orła Białego', '14/30', '28-100', 'Busko-Zdrój', 'henrykgunia@onet.com', '515082693', '$2y$10$Pgzs.sjKgN9PQYF9t7olAuiLwsHlGVyk0P5GahdJnVk2D5DddBfTO', '2021-07-07 20:58:17');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
