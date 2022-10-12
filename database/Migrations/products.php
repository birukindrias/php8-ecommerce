<?php
// namespace App\database\Migrations;

use App\config\App;

class  products
{
    public function up()
    {
        $sql =  "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            pname VARCHAR(50),
            pprice VARCHAR(50),
            pimage VARCHAR(50),
            pdisk VARCHAR(50),
            user_id INT NOT NULL,
            Foreign Key(`user_id`) references users(`id`)  
       )
       ENGINE = INNODB;";
        App::$app->database->pdo->exec($sql);
    }
}