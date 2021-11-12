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
1. [Week_01](https://github.com/Svendolin/All-about-PHP/tree/master/Week_01_Error%2C%20Basics)
2. [Week_02](https://github.com/Svendolin/All-about-PHP/tree/master/Week_02_Arrays%2C%20Schreibweisen%20PHP%20(Blog)%2C%20Include)
3. [Week_03](https://github.com/Svendolin/All-about-PHP/tree/master/Week_03_CommentForm%2C%20GetPost%2C%20VarEmail)
4. [Week_04](https://github.com/Svendolin/All-about-PHP/tree/master/Week_04_Login%2C%20Cookies%2C%20Sessions)
5. [Week_05](https://github.com/Svendolin/All-about-PHP/tree/master/Week_05_Strukturaufbau)
6. [Week_06](https://github.com/Svendolin/All-about-PHP/tree/master/Week_06_MySQL_Database)


| Topic | Content  | 
|:--------------| :--------------|
| Week&nbsp;01 | direction , errortest , hello world , `include()` |
| Week&nbsp;02 | `Schreibweisen PHP - 3 Ways to integrate Arrays[]`  ,   `Associative and Mutlidimensional Arrays[]` ,  Blog Layout , include() folder |
| Week&nbsp;03 | formvalidation with style and basic design , `$_get()` vs `$_post()` Request , `filter_var()` + `isset() vs empty()` + `implode() vs explode()` |
| Week&nbsp;04 | login.php WITH protected area , login.php (hashed) WITH protected area , login.php WITHOUT protected area , login.php with timeout session , hashing encryption lab , session vs cookie |
| Week&nbsp;05 |  `Structure (Front Controller)` , `Structure (Basic)` , `Structure (Basic) + Dynamic Navigation + Admin Area` |
| Week&nbsp;06 | MySQL Database (blog) and (demo files) working with `MyPHPAdmin` MySQL Database |

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
➡ *CREATE DATABASES - PHPMyAdmin (SQL FILE):*

(side note: if you work on different computers, be sure to follow step 1. to 6. for the very first time! Then start with step 1. to 2. on your second computer while giving the database the identical name! At the end: Import your SQL-File, step 7., which you've created at the very beginning)

1. Open MyPhpAdmin within your URL window: `http://localhost/phpmyadmin/` . Now you can create and structurize databases!
2. "Databases" > "Create New Database" (give server a command where to fetch data) > "select default charset" > "utf8-unicode-ci" > "Create"
3. Additional infos about the path system:
     * The file path is shown above (...)>(...)>(...)
     * Path overview for selections is also displayed on the left in a tree diagram
     * TIP: Use "right klick" on the desired subpage in the navigation on the left and open in new tab to work faster and cleaner
4. "Create Table" > Select name column with appropriate labels for your project
5. A_I (AUTO INCREMENT) = "Incrementing itself" > Click on the first field of "IDcomment" = It becomes Primary (it receives a PRIMARY KEY)
6. Add the suitable DATATYPES, here is a very short overview:
   * VARCHAR is variable character limit. You should enter this, e.g. maximum 100 characters for the name
   * TEXT = Write a lot of text without restriction.
   * BOOLEAN = True or False as confirmation
   * INT = data capability (length) of the ID. Be on the safe side with INT: If the character capacity is exceeded, there is no room for any further saving data
   * TINYINT = (1 byte, 255 integer data) vs BIGINT (8 byte, Billions of integer data #)
   * TIMESTAMP = as well as the default with "current_time": Display the current time on every save.
The "default" is an additional possibility to influence the default value (e.g. as defined: 0 = false)
* IMPORTANT: there are exact number data types that use integer data:
To save space in the database, use the smallest data type that can reliably contain all possible values. 
For example, TINYINT would suffice for the age of a person, since no one can live more than 255 years. 
However, tinyint would not suffice for the age of a building, since a building can be more than 255 years old.

<br />

➡ *IMPORT DATABASES - PHPMyAdmin:*

7. "Import" > Select File (SQL format = perfect) - If you choose .sql file: select "SQL" > OK 
   
   * Successful Safe: all boxes must be green, otherwhise you'll receive an error 
   * Never forget to create a valid database beforehand!

<br />

➡ *EXPORT DATABASES - PHPMyAdmin (Usually used as a backup):*

8. "Export" > (Export selected pieces) as a Backup for safety > "OK"

<br />

➡ *MENU BAR IN PHPMyAdmin shortly explained:* 
* DISPLAY = Overview
* STRUCTURE = Column editing 
* SQL = Data management

<img align="center" alt="phpmyadmin main page" width="800" height="" src="https://s3-eu-central-1.amazonaws.com/wp-content-itl/wp-media-folder-it-learner-de/wp-content/uploads/2019/07/MySQL-Server-Neuer-Benutzer-Anmelden-an-phpmyadmin.jpg" />


<br />
<br />

***
## CRUD Operations in MySQL using SQL ✅
***
What is SQL ?
* As we know that we can use MySQL to use "structured query language" to store the data. SQL is the most popular language for adding, accessing and managing content in a database. MySQL provides a set of some basic but mostly **essential operations** that will help you to easily interact with the MySQL database at PHPMyAdmin. These operations are mostly known as *CRUD*, but I rather prefer to call them *CUDR*. Here is the reason why:


| Operation | Effect  | 
|:--------------| :--------------|
| CREATE | Create Table Command |
|  | `INSERT INTO `` ` |
| UPDATE | Altering and changing content or structure of your table |
| DELETE | Delete Operations |
| READ | Retrieve and (re)-read the content of your table (*) |


* (*) *CUDR* instead of **CRUD* because you always OPERATE / MANIPULATE with CRU first and then (at the end) you "re-read" your changes to your table of your database!

* The Demo Files are placed at [Week_06](https://github.com/Svendolin/All-about-PHP/tree/master/Week_06_MySQL_Database)

* "mysqli" is an improved object-oriented extension of PHP for accessing MySQL databases. 



<img align="center" alt="CRUD visually explained" width="800" height="" src="https://miro.medium.com/max/1400/1*2eBdh0vLZjUyCDF6x1EqvQ.png" />

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


