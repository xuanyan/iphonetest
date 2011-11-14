<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */

class Action extends base_abstract
{
    
    function index()
    {
        if (!empty($_SESSION['id'])) {
            $this->redirect('/?r=index');
        }
        $this->view->display('login.html');
    }

    function doLogin()
    {
        $info = $this->db->getRow("SELECT * FROM user WHERE name = ?", $_POST['username']);
        if ($info['password'] == sha1($_POST['password'])) {
            $_SESSION = $info;
        }
        $this->redirect('/?r=index');
    }
}


?>