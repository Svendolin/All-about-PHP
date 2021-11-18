-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Nov 2021 um 01:20
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wdd920_blog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `IDadmin` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`IDadmin`, `admin_name`, `admin_email`, `admin_passwort`) VALUES
(1, 'Terry Harker', 'terry@bytekultur.net', '$2y$10$OrlOGdFZPEbS/kJRM7GoJe3XM8Cy9mzDTSOw8UR2DWKDnReTw9xda');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blogpost`
--

CREATE TABLE `blogpost` (
  `IDblogpost` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_author` varchar(64) NOT NULL,
  `post_category` varchar(64) NOT NULL,
  `post_shorttext` text NOT NULL,
  `post_longtext` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_state` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `blogpost`
--

INSERT INTO `blogpost` (`IDblogpost`, `post_title`, `post_created`, `post_author`, `post_category`, `post_shorttext`, `post_longtext`, `post_image`, `post_state`) VALUES
(1, 'Willkommen', '2016-03-15 22:01:24', 'Terry Harker', 'PHP Blog', 'Willkommen in meinem PHP Blog! ', '<p>Ich hoffe, ich kann dir regelmässig interessante Updates, Tipps und Tricks zu PHP geben. Wenn du etwas vermisst oder Ideen hast, melde dich bei mir unter <joomla-hidden-mail is-link=\"1\" is-email=\"1\" first=\"dGVycnk=\" last=\"Ynl0ZWt1bHR1ci5uZXQ=\" text=\"dGVycnlAYnl0ZWt1bHR1ci5uZXQ=\" base=\"/joomla4\"><a href=\"mailto:terry@bytekultur.net\" base=\"/joomla4\">terry@bytekultur.net</a></joomla-hidden-mail></p>', '', 1),
(2, '7 Dinge, die du nicht tun solltest in PHP', '2017-08-24 20:01:52', 'Terry Harker', 'PHP Blog', 'Was ist der Nachteil daran, keine Funktionen zu erstellen in PHP? \r\n\r\n', '<p><span class=\"author_name\">Joseph Benharosh hat vor einiger Zeit diesen <a href=\"https://phpenthusiast.com/blog/7-problems-that-may-prevent-your-PHP-code-from-being-awesome\" target=\"_blank\" rel=\"noopener\">Artikel auf phpenthusiast.com</a> veröffentlicht, in dem er auf ein paar Verhaltensweisen hinweist, die für das saubere Coden in PHP nicht förderlich sind.</span></p><p><span class=\"author_name\">Im Grossen Ganzen gelten sie immer noch, auch wenn die Liste bestimmt nicht vollständig ist. PHP Code kann auf verschiedene weisen geschrieben werden, die Sprache zeichet sich dadurch aus, dass sie auch \"quick and dirty\" genutzt werden kann. Man muss die Frage danach, was \"guter\" (oder sinnvoller) PHP Code ist, auch im Kontext des Projekts betrachten. Wenn eine einmalige Anwendung von kleinem Umfang,&nbsp; wie beispielsweise ein One-Pager mit Kontaktformular, mit wenig Initial-Aufwand realisiert werden kann, ist die Lösung aus ökonomischer Sicht durchaus sinnvoll, auch wenn sie nicht allen Konventionen entspricht. Für grössere Projekte ist eine gute Organisation und Einhaltung von Konventionen jedoch unabdingbar.</span></p>', '', 1),
(3, 'Die beliebtesten PHP Tutorials', '2021-05-09 20:01:52', 'Terry Harker', 'PHP Blog', 'Heute habe ich euch ein paar PHP Tutorial-Seiten zusammengestellt. Ich hoffe, ihr könnt das eine oder andere davon nutzen.\r\n\r\n', '<p>Heute habe ich euch ein paar PHP Tutorial-Seiten zusammengestellt. Ich hoffe, ihr könnt das eine oder andere davon nutzen.</p>\r\n \r\n<h4>PHP in 10 Minuten</h4>\r\n<p>Zugegeben, dies ist kein wirkliches Tutorial. Aber wenn du jemandem zeigen möchtest, wie PHP funktioniert, oder selbst das erste mal damit zu tun hast, ist das ein ziemlich knackiger Einblick. PHP gibt immer HTML zurück - stimmt denn das?</p>\r\n<p><a href=\"https://www.youtube.com/watch?v=iungnszzyNE\">https://www.youtube.com/watch?v=iungnszzyNE</a></p>\r\n<p>&nbsp;</p>\r\n<h4>PHP Einfach</h4>\r\n<p>Wie der Name sagt, findet man hier viele Code Snippets und kleine Beispiele mit Erklärungen in deutscher Sprache. Eine gute Begleitung für die Basics, zum Wiederholen und trainieren geeignet. Besprochen wird im Moment PHP 7, welches sich für den Anfang nicht wesentlich von PHP 8 unterscheidet.</p>\r\n<p><a href=\"https://www.php-einfach.de/\">https://www.php-einfach.de</a></p>\r\n<p>&nbsp;</p>\r\n<h4>W3Schools</h4>\r\n<p>Die beliebte Tutorialbase W3Schools bietet ein einfaches Einsteigerprogramm für prozeduralen und objektorientierten Code in Englisch. Hier kannst du Themen aus dem Unterricht wiederholen, einfache Beispiele nachschlagen. Die Seite bietet ausserdem eine Funktionsreferenz, du kannst also auch einfach nachsehen, in welcher Reihenfolge du die Parameter für str_replace() eingeben musst, zum Beispiel...&nbsp;</p>\r\n<p><a href=\"https://www.w3schools.com/php/default.asp\">https://www.w3schools.com/php/default.asp</a></p>\r\n<p>&nbsp;</p>\r\n<h4>PHP.net</h4>\r\n<p>Dies ist die offizielle Referenz von PHP. Nicht unbedingt die übersichtlichste, aber sicher die aktuellste Referenz und auch sehr umfangreich, da sie direkt von den PHP-Entwicklern betrieben wird. Typische Anwendungsbeispiele und Diskussionen dazu von diversen Benutzern findet man jeweils unterhalb jeder Funktion. Die Referenz ist grösstenteils in deutscher Sprache verfügbar.</p>\r\n<p><a href=\"https://www.php.net/manual/de\">https://www.php.net/manual/de</a>&nbsp;</p>            \r\n       ', '', 1),
(4, 'PHP 8 Release', '2021-07-28 20:05:26', 'Terry Harker', 'PHP Blog', 'PHP 8.0 ist eine umfassende Aktualisierung der PHP-Sprache. Heute ist sie im Stable Release erschienen!\r\n\r\n', '<p>Es enthält viele neue Funktionen und Optimierungen, darunter benannte Argumente, Union-Typen, Attribute, Beförderung von Konstruktoreigenschaften, Match-Ausdruck, Nullsafe-Operator, JIT sowie Verbesserungen des Typsystems, der Fehlerbehandlung und der Konsistenz.</p><p>Weitere Details findest du auf <a href=\"https://www.php.net/releases/8.0/en.php\">https://www.php.net/releases/8.0/en.php</a></p>', '', 1),
(10, 'Der erste Tag im PHP Kurs', '2021-09-23 16:17:12', 'Terry', 'PHP Blog', 'Wir haben vor allem die PHP.INI gesucht ;-)', '<p>Die PHP.INI ist <strong>MEGA </strong>schwierig zu finden.</p>', 'postimage_1636675939.jpg', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comment`
--

CREATE TABLE `comment` (
  `IDcomment` int(11) NOT NULL,
  `blogpost_id` int(11) NOT NULL,
  `author_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment_text` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_status` tinyint(1) NOT NULL DEFAULT 0,
  `comment_datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `comment`
--

INSERT INTO `comment` (`IDcomment`, `blogpost_id`, `author_name`, `author_email`, `comment_text`, `comment_status`, `comment_datum`) VALUES
(1, 1, 'Terry', 'terry@bytekultur.net', 'Super!', 1, '2021-10-28 18:00:14'),
(2, 2, 'Fritzli', 'fmueller@sae.ch', 'Es gibt noch viel mehr das man nciht tun sollte', 0, '2021-10-28 18:00:14');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IDadmin`);

--
-- Indizes für die Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`IDblogpost`);

--
-- Indizes für die Tabelle `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`IDcomment`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin`
--
ALTER TABLE `admin`
  MODIFY `IDadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `IDblogpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `comment`
--
ALTER TABLE `comment`
  MODIFY `IDcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
