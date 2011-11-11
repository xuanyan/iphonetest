<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */


abstract class base_abstract
{
    function __construct()
    {
        $this->view = new Templite(ROOT_PATH.'/template');
        $this->db = Database::connect('pdo', 'sqlite:'.ROOT_PATH.'./db.sqlite');
    }

    function isPost()
    {
        return 'POST' == @$_SERVER['REQUEST_METHOD'];
    }

    function redirect($url = '')
    {
        $site = SITE_URL;
        if (!$url) {
            $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $site;
        }

        if (substr($url, 0, 4) != 'http') {
            if ($url{0} != '/') {
                $url = '/'.$url;
            }
            $url = $site.$url;
        }
        header('Location: ' . $url);
        exit;
    }
}


?>