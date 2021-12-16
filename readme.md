![GitHub commit activity](https://img.shields.io/github/commit-activity/m/Svendolin/All-about-PHP?style=for-the-badge) ![GitHub contributors](https://img.shields.io/github/contributors/svendolin/All-about-PHP?style=for-the-badge) ![GitHub forks](https://img.shields.io/github/forks/Svendolin/All-about-PHP?color=pink&style=for-the-badge) ![GitHub last commit](https://img.shields.io/github/last-commit/Svendolin/All-about-PHP?style=for-the-badge) ![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/Svendolin/All-about-PHP?color=yellow&style=for-the-badge)


***
<img align="left" alt="JavaScript" width="35px" src="https://raw.githubusercontent.com/github/explore/ccc16358ac4530c6a69b1b80c7223cd2744dea83/topics/php/php.png" /> 

# &nbsp; - ALL ABOUT PHP AND MYSQL - ✔

This "All about PHP"-repository catches up its focus on all the PHP I've learned, commented and written through the years as a **SAE-Web Development** student with exercise lessons every week as well as tutorial videos on _Youtube_.         
Direct Link to the place where I'm studying are you going to find [HERE](https://www.sae.edu/che/de?utm_source=PS01&gclid=Cj0KCQjw-4SLBhCVARIsACrhWLVIaD_aUt7y4brT7tqMW9o7tskgb1vjQqJFkzQwkwdN_40_Ls7MgAEaAtXxEALw_wcB)


What is PHP ?
* PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely used and general-purpose open source scripting language that is specifically suited for web programming and can be embedded in HTML.  [GET MORE DETAILS HERE](https://www.php.net/manual/de/intro-whatis.php)

* Are you new to PHP? Check out the  [PHP DOCUMENTATION HERE](https://www.php.net/docs.php)

⚫🔴🟡 IMPORTANT: Comments in each file are commented in german⚫🔴🟡
<br />
<br />


***
## Folder Directory
***


| Topic | Content  | 
|:--------------| :--------------|
| Week&nbsp;01 | direction , errortest , hello world , `include() vs require() vs require_once()` |
| Week&nbsp;02 | `Schreibweisen PHP - 3 Ways to integrate Arrays[]`  ,   `Associative and Mutlidimensional Arrays[]` ,  Blog Layout , include() folder |
| Week&nbsp;03 | Reg-Formvalidation with style and basic design , `$_get()` vs `$_post()` Request , `filter_var()` + `isset() vs empty()` + `implode() vs explode()` |
| Week&nbsp;04 | login.php WITH protected area , login.php (hashed) WITH protected area , login.php WITHOUT protected area , login.php with timeout session , hashing encryption lab , session vs cookie |
| Week&nbsp;05 |  `Structure (Front Controller)` , `Structure (Basic)` , `Structure (Basic) + Dynamic Navigation + Admin Area` |
| Week&nbsp;06 | MySQL Database (Blog "Musteraufbau") , (demo files) working with `MyPHPAdmin` MySQL Database (CRUD Operations) |
| Week&nbsp;07 | TableReferences 1:1 / 1:N / N:M |
| Week&nbsp;08 | MySQLi `prepare()`-statement to make user inputs more secure against SQL-Injections
| Week&nbsp;09 | "All in One"-File with: `Registration and Login with MySQL Database management`
| Week&nbsp;10 | `Image Upload` Basic Variant
| Week&nbsp;11 | `Image Upload` Advanced Variant
| Week&nbsp;12 | `CKEditor` for < textareas >

1. [Week_01 - Click this link to enter the corresponding folder of the week 01 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_01_Error%2C%20Basics)
2. [Week_02 - Click this link to enter the corresponding folder of the week 02 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_02_Arrays%2C%20Schreibweisen%20PHP%20(Blog)%2C%20Include)
3. [Week_03 - Click this link to enter the corresponding folder of the week 03 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_03_CommentForm%2C%20GetPost%2C%20VarEmail)
4. [Week_04 - Click this link to enter the corresponding folder of the week 04 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_04_Login%2C%20Cookies%2C%20Sessions)
5. [Week_05 - Click this link to enter the corresponding folder of the week 05 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_05_Strukturaufbau)
6. [Week_06 - Click this link to enter the corresponding folder of the week 06 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_06_MySQL_Database)
7. [Week_07 - Click this link to enter the corresponding folder of the week 07 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_07_TableRef/TableReferences%20%2B%20Beziehungen)
8. [Week_08 - Click this link to enter the corresponding folder of the week 08 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_08_Sicherheit)
8. [Week_09 - Click this link to enter the corresponding folder of the week 09 - Provided with German comments]()
8. [Week_10 - Click this link to enter the corresponding folder of the week 10 - Provided with German comments](https://github.com/Svendolin/All-about-PHP/tree/master/Week_10_Dateiupload%20(Basic))
8. [Week_11 - Click this link to enter the corresponding folder of the week 11 - Provided with German comments]()
8. [Week_12 - Click this link to enter the corresponding folder of the week 12 - Provided with German comments]()

<br />
<br />



***
## Technologies and Installization ✅
***

 XAMPP - INSTALLIZATION:
* Use XAMPP Windows Systems. Its a local web-server (stack) for your local ideas and projects. [DOWNLOAD XAMPP HERE](https://www.apachefriends.org/de/index.html)
* Use MAMP if you're working on a MAC: [DOWNLOAD MAMP HERE](https://www.mamp.info/en/mac/)
* Use WAMP if you want to work with another stack: [DOWNLOAD WAMP HERE](https://www.wampserver.com/en/)
<br />
<br />

XAMPP - USEFUL STEPS:

1. Download and open xampp-control.exe
2. Start Apache and MySQL
3. Empty htdocs for the very first use. This will be your index
4. Adjust XAMPP control panel for the very first use as well:
   * Apache > Config > php.ini > Change to: 
   * I) display_error: on 
   * II) error_reporting: E_ALL
6. Navigate through the files via htdocs and open it via Visual Studio Code to work with
7. Visit your work in your browser. Lifeserver doesnt work, so write "localhost" in your URL of your browser instead


<br />
<br />

***
## MySQL and PHPMyAdmin - Useful Assistance ✅
***
🔵 **CREATE DATABASE** in PHPMyAdmin:


PHPMyAdmin = Web Based Tool // MySQL Workbench = Desktop Tool



1. Open MyPhpAdmin within your URL window: `http://localhost/phpmyadmin/` . Now you can create and structurize databases!
2. "Databases" > "Create New Database" (give server a command where to fetch data) > "select default charset" > "utf8-unicode-ci" > "Create"
3. Additional infos about the path system:
     * The file path is shown above (...)>(...)>(...)
     * Path overview for selections is also displayed on the left in a tree diagram
     * TIP: Use "right klick" on the desired subpage in the navigation on the left and open in new tab to work faster and cleaner
<br />
<br />



🔵 **CREATE TABLE** (contains all the data):

1.1 (Option 1): Create a table (make sure that you are in the database folder) by clicking the SQL field and use your SQL skills such as this example here:
```
CREATE TABLE users (
    usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usersName varchar(128) NOT NULL,
    usersEmail varchar(128) NOT NULL,
    usersUid varchar(128) NOT NULL,
    usersPwd varchar(128) NOT NULL 
); 
```

1.2 (Option 2): "Create Table" (erzeuge Tabelle) > Select name column with appropriate labels for your project:

2. A_I (AUTO INCREMENT) = "Incrementing itself" > Click on the first field of "IDcomment" = It becomes Primary (it receives a PRIMARY KEY)
3. Add the suitable DATATYPES, here is a very short overview:
   * VARCHAR is variable character limit. You should enter this, e.g. maximum 100 characters for the name (*String based*)
   * TEXT = Write a lot of text without restriction. (*String based*)
   * BOOLEAN = True or False as confirmation 
   * INT = data capability (length) of the ID. Be on the safe side with INT: If the character capacity is exceeded, there is no room for any further saving data (*Numeric*)
   * TINYINT = (1 byte, 255 integer data) vs BIGINT (8 byte, Billions of integer data #) (*Numeric*)
   * TIMESTAMP = as well as the default with "current_time": Display the current time on every save. (*Dates*)
The "default" is an additional possibility to influence the default value (e.g. as defined: 0 = false)
* IMPORTANT: there are exact number data types that use integer data:
To save space in the database, use the smallest data type that can reliably contain all possible values. 
For example, TINYINT would suffice for the age of a person, since no one can live more than 255 years. 
However, tinyint would not suffice for the age of a building, since a building can be more than 255 years old.

<br />

🟡 **RENAME DATABASE** in PHPMyAdmin:


PHPMyAdmin = Web Based Tool // MySQL Workbench = Desktop Tool



1. click on your database which you want to rename > "Operationen"
2. Scroll down to: "Datenbank umbenennen in"
3. Rename it and confirm with "OK"
4. IMPORTANT: Don't forget to rename your $dbname in your PHP-File as well if you have worked with VSC. This guarantees a perfect connection from VSC to your database at PHPMyADmin
<br />
<br />

🔵 **CREATE ADDITIONAL TABLES** in PHPMyAdmin:




1.1 (Variant 1): Open the database on the navigator on the left > Click ``"Neu"`` to ADD ANOTHER TABLE + FIELDS to your chosen database

1.2.(Variant 2): Open the database on the navigator on the left > Select ``"Struktur"`` from above > ``"Erzeuge Tablle"`` > Chose the amout of columns you want at ``Anzahl der Spalten`` and fill in the fields.

<br />

🔵 **CREATE ADDITIONAL FIELDS** in PHPMyAdmin:


Did you forgot an additional row of your table inside your database? Or did you get the request from your boss to add a further field subsequently? 

1. Open the database on the navigator on the left > Click on your table inside the database > Select ``"Struktur"`` from above > Right above the "Indizes"-section: choose the amout of columns and the place where it should be added in your table (above which field of your table) > "OK"
<br />
<br />

🟢 **IMPORT SQL-CONTENT - PHPMyAdmin:**

* Check if you are on right folder for import! The centered folder structure at the top shows you where you are and additonally where you will import the SQL file!


1. "Import" > Select File (SQL format = perfect) - If you choose .sql file: select "SQL" > OK 
   
   * Successful Safe: all boxes must be green, otherwhise you'll receive an error 
   * Never forget to create a valid database before you import a SQL file
   * SQL files cannot be overwritten. They can only be adjusted or completely deleted to integrate a new SQL file into the database

<br />

🟡 **EXPORT SQL-CONTENT - PHPMyAdmin (Usually used as a backup):**

1. "Export" > (Export selected pieces) as a Backup for safety:
 * Exportmethod "angepasst" for more options:
 * "Objekterstellungsoptionen" = "Create Table" should be checked
 * "Datenerstellungsoptionen" = "TRUNCATE" = doesnt have to be checked (proves files of existance)
 * "Ausgabe" = "Safe data as file" should be checked as well
 2. "OK" to export as an SQL

<br />

🔴 **DELETE DATABASE / TABLE (warning: this will delete everything, table and all the content!)**

* To delete the DATABASE at "SQL", write in the SQL field => DROP DATABASE `` ; (Be sure to add the database name in the '  ' signs!)
* To delete the TABLE at "SQL", write in the SQL field => DROP TABLE `` ; (Be sure to add the table name in the '  ' signs!)


<br />

🟣 **JOIN TABLES**

* A JOIN clause is used to combine rows from two or more tables, based on a related column between them.



<br />
<br />
<br />

**MENU BAR IN PHPMyAdmin shortly explained:**
* BROWSE = Overview
* STRUCTURE = Column editing 
* SQL = Data management

<img align="center" alt="phpmyadmin main page" width="800" height="" src="https://www.sir-apfelot.de/wp-content/uploads/2020/05/phpmyadmin-screenshot.png" />

<br />

**MySQL Tables (Which can be integrated in relations to other tables in many ways, such as 1:N or N:M)**

| | Column 1  | Column 2  | Column 3 | Column 4   
|:--------------| :--------------| :--------------| :--------------| :--------------|
| Row 1 | Field  | Field | Field  | Field
| Row 2 | Field  | Field | Field  | Field

* If a primary key column is marked with "AUTO_INCREMENT", then no value has to be set for this column when creating a row. The database system then "automatically sets a value" = *"Auto_Increment"* 

* We can thus create several tables, for example *USERS*, and assign the **primary key** of this ID there. 
The second table *POSTS* also receives an ID, a **foreign key**. We can relate these to each other and query (ger: "auslesen") them from multiple tables:

<img align="center" alt="phpmyadmin main page" width="800" height="" src="https://i.ytimg.com/vi/Wtl-hQ2Dp1I/maxresdefault.jpg" />





<br />
<br />

***
## CRUD Operations in MySQL using SQL ✅
***
What is SQL ?
* As we know that we can use MySQL to use "structured query language" to store the data. SQL is the most popular language for adding, accessing and managing content in a database. MySQL provides a set of some basic but mostly **essential operations** that will help you to easily interact with the MySQL database at PHPMyAdmin. These operations are mostly known as *CRUD*, but I rather prefer to call them *CUDR*. Here is the reason why:


| Operation | Effect  | Demo File  | 
|:--------------| :--------------| :--------------|
| CREATE | Create Table Command | insert.php 
|  | ```INSERT INTO `a` (`b`,`b`) VALUES ('{c}', '{c}') ``` 
| UPDATE | Altering and changing content or structure of your table | edit.php 
|  | ```UPDATE `a` SET `c`= WHERE `b`= `1` ``` |
| DELETE | Delete Operations | delete.php
|  | ```DELETE FROM `a` WHERE `b`= `5` ``` |
| READ | Retrieve and (re)-read the content of your table (*) | edit.php |
|  | ```SELECT `b`,`b` FROM `a` WHERE `c` ``` |
|----| ------------------------------------------------------ | ---- |
|| Connection to server database | connect.php |
|| Overview of the added data content | liste.php |
|| Delete a specific post (#) | delete.php?id= |
|| Edit a specific post (#) | edit.php?id= |
|| Delete a specific post (multiple functions in the script) | liste.php?delete= |
|| Edit a specific post (multiple functions in the script) | form.php?edit= |

<br />
<br />

**a: Table Names** => e.g. *comment , admin , blogpost*

**b: Field Names** => e.g. *admin_name , admin_email , admin_pw*

**c: Data** => e.g. *Svendolin , sven12@gmail. com , $post_category , comment_status=1*
<br />
<br />

* The Demo Files are placed at [Week_06](https://github.com/Svendolin/All-about-PHP/tree/master/Week_06_MySQL_Database)

* (*) *CUDR* instead of *CRUD* because you always OPERATE / MANIPULATE with "CDU" first and then (at the end) you "re-read" your changes to your table of your database with "R"!

* (#) Each post will get its own ID: *"delete.php?id=4"* will delete the post with its ID=4 by pressing a delete button for example. Same thing for the edit button, you update and read this specific post for editing!


* "mysqli" is an improved object-oriented extension of PHP for accessing MySQL databases. 



<img align="center" alt="CRUD visually explained" width="800" height="" src="https://miro.medium.com/max/1400/1*2eBdh0vLZjUyCDF6x1EqvQ.png" />

<br />
<br />

***
## Errors ❌
***
Here is a short list of errors I had while I was writing PHP. If some of these errors may appear...well...now you know what the problem is and how you can fix it (hopefully)

**▸"signup=empty"**
* Make sure you wrote "mysqli_connect" and NOT "mysql_connect" in the .php file!

**▸"unexpected }"**
* If you get this error message:
Parse error: syntax error, unexpected '}'
Then it is because you forgot to close a ) or ; somewhere.

**▸"unexpected ;"**
* If you get this error message:
Parse error: syntax error, unexpected ';'
Then it is because you forgot to close a } or ) somewhere. Probably because you made a mistake with your parenthesis near the "empty()" functions in your signup script.

**▸"hashed pwd error"**
* If you get an error in the script when you hash the password, then it is because you decided not to follow my steps exactly in the video when I created the database table. Make sure you DON'T set the varchar() to a lower value! When you hash the password it will take up a lot of space in this column, and if you set a lower number then it won't fit!

**▸"signup=success but database is empty?"**
* Here there might be a few reasons for your error. 1st is that you made a syntax/spelling mistake in your code.
2nd reason is that MAMP seems to cause a lot of issues for people. Therefore try using XAMPP and make sure you write the same as me in the .php file.

**▸"HTTP ERROR 500"**
* HTTP ERROR 500 is a server error, meaning that you are most likely using an outdated version of apache or mysql (or in case you've forgot to start your apache and mysql server). Try updating your servers and make sure that you are using the latest version of PHP.


<br />
<br />

***
## Collaboration ✅
***
> Feel free to contact me if you've seen something wrong, found some errors or struggled on some mistakes! Always happy to have a clean sheet here! :)


<br />
<br />

***
## FAQs ✅
***
0 Questions have been asked, 0 answers have been given, 0 changes have been made.

| Questions | Anwers | Changes |
|:--------------|:-------------:|--------------:|
| 0 | 0 | 0 |


