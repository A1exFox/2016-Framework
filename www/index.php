<?php
//phpinfo();
//xdebug_info();

//Test Xdebug
//$a = 10;
//$b = 15;
//$c = $a + $b;

//Test filesystem
//mkdir('./testDir');
//file_put_contents('./testDir/test.txt', 'test', FILE_APPEND);
//exec('rm -rf ./testDir');

//Test PDO mysql
//$conn = new PDO("mysql:host=mysql;dbname=userdb", "user", "password");
//var_dump($conn->query("CREATE TABLE `userdb`.`test` (`field` INT NOT NULL ) ENGINE = InnoDB;"));

//Test mysqli
//$mysqli = new mysqli("mysql","user","password","userdb");
//var_dump($mysqli->query("CREATE TABLE `userdb`.`test` (`field` INT NOT NULL ) ENGINE = InnoDB;"));

//Test dumpdb it command line
// ./mk dump, then restart docker compose

//Test composer in command line
// ./mk composer init
// ./mk composer install