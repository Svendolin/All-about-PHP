Datum und Zeit in MySQL-Tabellen

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

1. Spalten vorbereiten

TIME		erwartet Eingaben wie 'hh:mm:ss'
DATE		erwartet Eingaben wie 'YYYY-MM-DD'
DATETIME	erwartet Eingaben wie 'YYYY-MM-DD hh:mm:ss'
YEAR		erwartet Eingaben wie 'YYYY'
TIMESTAMP	erwartet Eingaben wie 'YYYY-MM-DD hh:mm:ss' wobei dies der UTC-Zeitzone zugeordnet wird

In PHPMyAdmin musst du keine Länge angeben für die Felder angeben
wie bei VARCHAR oder INT wenn du die Tabelle erstellst!

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

2. Datum und Zeit in Tabelle eingeben ohne PHP

Praktische MySQL-Funktionen (1. Datenbank anlegen / 2. folgende Zeile ins SQL):

INSERT INTO test_time SET zeit = CURTIME(), datum = CURDATE(), datum_zeit = NOW()

ACHTUNG: Damit das funktioniert, muss das Datenbank-System richtig konfiguriert sein!!!
TESTEN!

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

3. mit PHP Datumstrings erzeugen

Grundsätzliches Problem:
MySQL hat für Datum/Zeit spezielle Datentypen, PHP jedoch nicht.
Deshalb muss man mit PHP Strings formatieren, die richtig aufgebaut worden sind.

Beispiel:

Ich möchte das Datum und die Zeit vom Zeitpunkt des Ablaufs des Scripts wissen
und das in die Tabelle aufnehmen

<?php
$myDateTimeStr = date('Y-m-d H:i:s')
?>

Die "Zauberzeichen" für PHP-date()
Y > Jahr, vierstellig
m > Nummer des Monats, zweistellig
d > Tag des Monats, zweistellig

H > Stunden im 24-Stunden-Format, zweistellig
i > Minuten, zweistellig
s > Sekunden, zweistellig

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

4. Datum wie bei uns üblich ausgeben, ohne PHP, mit MySQL DATE_FORMAT()

<?php
// ohne deutsches Datum
$mysql = "SELECT datum FROM test_time;";
// Ausgabe wie 'YYYY-MM-DD'

// mit deutschem Datum
$mysql = "SELECT DATE_FORMAT(datum, '%e.%m.%y') AS datum_de FROM test_time WHERE ID = 1";
?>

Die "Zauberzeichen" für MySQL DATE_FORMAT()
ACHTUNG: Hier hat es Prozentzeichen!!!
%d > Tag mit führender Null
%e > Tag ohne führende Null
%m > Monat in Zahlen
%M > Monat ausgeschrieben
%y > Jahr 2-stellig
%Y > Jahr 4-stellig