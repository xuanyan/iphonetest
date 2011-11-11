<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */

define('ROOT_PATH', dirname(__FILE__));
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST']);

require ROOT_PATH.'/Library/__init__.php';
require ROOT_PATH.'/base.php';

try {
    if (($result = Controller::dispatch(@$_GET['r'], ROOT_PATH.'/controller')) && Controller::$format == 'json') {
        echo json_encode($result);
    }
} catch (Exception $e) {
    // out put 404 page
    if ($e->getCode() == 404) {
        header("HTTP/1.0 404 Not Found");
        echo 'page not found';
        exit;
    }
    die($e);
}

?>