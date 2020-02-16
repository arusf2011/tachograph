<?php
    $f3 = Base::instance();
    session_start();
    require_once './app/functions.php';
    $f3->set('db',new DB\SQL(
        "mysql:host=".$host.";post=3306;dbname=".$dbname,
        $username,
        $password));
    $db = $f3->get('db');
    if($_SESSION['version'] == "1_0")
    {
        $f3->set('convoys_db',$db->exec('CREATE TABLE `convoys` ( 
                `id` INT NOT NULL AUTO_INCREMENT, 
                `c_start` VARCHAR(50) NOT NULL, 
                `comp_start` VARCHAR(50) NOT NULL, 
                `c_end` VARCHAR(50) NOT NULL, 
                `comp_end` VARCHAR(50) NOT NULL, 
                `name` VARCHAR(100) NOT NULL, 
                `game` BOOLEAN NOT NULL, 
                `date_beg_convoy` DATE NOT NULL, 
                `time_beg_convoy` TIME NOT NULL, 
                `time_groupup` TIME NOT NULL, 
                `server_game` VARCHAR(50) NOT NULL, 
                `server_voip` VARCHAR(100) NULL, 
                `route` VARCHAR(100) NULL, 
                `image_start` VARCHAR(100) NULL, 
                `image_end` VARCHAR(100) NULL, 
                `rules` VARCHAR(1000) NULL, 
                `private` BOOLEAN NOT NULL, 
                PRIMARY KEY (`id`)
            ) ENGINE = InnoDB DEFAULT CHARSET=utf8;'));
        $convoys = $f3->get('convoys_db');
        if(!$convoys)
        {
            $f3->set('alter',$db->exec('ALTER TABLE `trips` ADD `participate_convoy` INT NOT NULL AFTER `id_admin`;'));
            $alter = $f3->get('alter');
            $f3->set('insert',$db->exec('INSERT INTO trucks VALUES (NULL, "International Lonestar", "inter_lone", 1)'));
            $insert = $f3->get('insert');
            if(!($alter && $insert))
            {
                $lock = fopen('./LOCK','w') or die("Couln't create a file!");
                fwrite($lock,'');
                fclose($lock);
                header('Location: ./upgrader/success');
                exit();
            }
            else
            {
                $_SESSION['error'] = '2';
                header('Location: ./upgrader');
                exit();
            }
        }
        else
        {
            $_SESSION['error'] = '2';
            header('Location: ./upgrader');
            exit();
        }
    }