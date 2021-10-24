<?php

define('CUSTOM_SESSIONNAME', md5('meineEigeneSessionBezeichnung')); // Am besten unscheinbarar Name mit Zeichen statt meineEigeneSessionBezeichnung
// md5() erzeugt immer den gleichen HASH für den gleichen String. Hier notwendig. Anonsten kann der Sessionname normal in den '' geschrieben werden
define('SESSION_DURATION', 1*60); // = 60 Sekunden, wie lange die Session inaktiv sein darf: z.B. 15*60 = 15 Minuten
// Somit: Wenn nach 1 min. Inaktivität der Refresh Button gedrückt wurde, so muss man sich erneut anmelden!
?>