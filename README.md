# PHP Login and Registration Script with PDO and OOP

In my previous tutorial i have explained that how to use OOP in PDO, and now in this tutorial I'm going to explain a login and registration script using PDO and OOP, 
we already have a tutorial on this topic but that was for beginners with MySQL, and this one is with PDO and OOP, as PDO is improved extension it's must be used, 
I have used here new PHP 5.5 Password Hashing API function that creates strong password, for hashing password you have to use PHP 5.5 latest version of PHP and 
we will also see how to hash passsword using this functions and maintaining a user sessions using OOP so let's see the tutorial.

# Database & Table 

Wujudkan _database_ dan _table_ seperti dibawah

```php
--
-- Database: `db_php_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;


```

# Directory

Direktori fail projek seperti dibawah 

```php

bootstrap/
   --css/
      --bootstrap.min.css
   --js/
       --bootstrap.min.js
   --fonts/
       --glyphicons-halflings-regular.eot
       --glyphicons-halflings-regular.svg
       --glyphicons-halflings-regular.ttf
       --glyphicons-halflings-regular.woff
js/
   --jquery.min.js
css/
   --style.css
inc/
   --inc.dbconfig.php
   --inc.class.crud.php  
   --inc.class.user.php  
   --inc.footer.php
   --inc.header.php
user_index.php
user_add.php
user_edit.php
user_view.php
index.php
register.php
login.php
logout.php

```

# Config

Fail inc.config.php menyimpan parameter yang kekal atau perlu diubah mengikut konfigurasi komputer anda

```php

/**
 * Set Setting 
 * Please change this parameter follow yourselft setting
 */
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "password";
$dbName = "db_php_sample";

```
