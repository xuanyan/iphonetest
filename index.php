<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */

require './Library/__init__.php';

$db = Database::connect('sqlite3', './db.sqlite');

if (!$info = $db->getRow("SELECT * FROM user WHERE name = ?", 'xuanyan')) {
    $db->exec("INSERT INTO user (name, password) VALUES (?, ?)", 'xuanyan', sha1('123456789'));
}

print_r($info);

//$v = new Templite('./template');

//$v->display('index.html');


?>