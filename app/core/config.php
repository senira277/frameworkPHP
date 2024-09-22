<?php


//define ROOT for easy usage
if($_SERVER['SERVER_NAME'] == 'localhost'){
    //databse config
    define('DBNAME','my_db');
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','');

    define("ROOT","http://localhost/mvc/public");
}else{
    //databse config
    define('DBNAME','my_db');
    define('DBHOST','localhost');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','');
    define("ROOT","https://www.website.com");
}



