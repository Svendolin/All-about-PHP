

# .htaccess
***

pw: root

## Ressourcen:
***



## TIPPS
***
***ERROR LOG*** - die meisten Fehler entstehen durch Syntax oder Pfade

Da .htacces direkt auf dem Server agiert, gibt es keine Fehlermeldungen im Client. Es wird ein Server Error angezeigt, zu unterst im log file findet man die akutellsten Fehlermeldungen und kann bspw. Pfade genau überprüfen und so Fehler in der Schreibweise besser ausfindig machen.

MAMP/logs/apache_error.log


***.htpasswd generator***

Mit diesem Generator kannst du ein Login generieren für das .htpasswd-file

https://hostingcanada.org/htpasswd-generator/





## Probleme und Fehlermeldungen
***
### SYNTAX
Achte auf eine exakte Schweibweise!


### MAC USER - Löschen der .DS_Store-Dateien

* Fehlermeludung: client denied by server configuration: /Applications/MAMP/htdocs/folder/.DS_Store, referer: http://localhost/
* Terminal: find /Applications/MAMP/htdocs/ -type f -name .DS_Store -delete
***

### Falscher Pfad .htpasswd

* Fehlermeludung: no such file or directory
* Absoluten Pfad verwenden!!

Beispiel bei Mac: AuthUserFile  /Applications/MAMP/htdocs/01_php-classes/flipped_classroom/ht_access_class/admin/.htpasswd

Beispiel bei Windows: C:/xampp/htdocs/Week_08_Sicherheit/ht_access_class/admin/.htpasswd
***

## .htaccess ist ein Apache file!

.htaccess kann nicht auf jedem Webserver verwendet werden.










