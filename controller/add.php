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
        $this->db->exec("INSERT INTO contact (user_id, name, tel, note, append_info) VALUES (?,?,?,?,'')", $_SESSION['id'], $info['name'], $info['tel'], $info['note']);
        $this->redirect('/');
    }
}

?>