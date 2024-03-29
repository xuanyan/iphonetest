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
        $data = $this->db->getAll("SELECT * FROM contact WHERE user_id = ?", $_SESSION['id']);
        $this->view->assign('data', $data);
        
        $this->view->display('index.html');
    }
}



?>