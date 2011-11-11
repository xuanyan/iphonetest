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
        if (empty($_SESSION['id'])) {
            $this->redirect('?r=login');
        }
        $this->view->display('add.html');
    }

    function doSave()
    {
        if (empty($_SESSION['id'])) {
            $this->redirect('?r=login');
        }
        $info = _POST('info', array());
        $this->db->exec("INSERT INTO contact (uid, name, tel, node) VALUES (?,?,?,?)", $_SESSION['id'], $info['name'], $info['tel'], $info['node']);
        $this->redirect('/');
    }
}

?>