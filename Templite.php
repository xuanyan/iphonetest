<?php

/*
 * This file is part of the Geek-Zoo Projects.
 *
 * @copyright (c) 2010 Geek-Zoo Projects More info http://www.geek-zoo.com
 * @license http://opensource.org/licenses/gpl-2.0.php The GNU General Public License
 * @author xuanyan <xuanyan@geek-zoo.com>
 *
 */

class Templite
{
    private $val = array();
    private $template_dir = '';

    function __construct($template_dir)
    {
        $this->template_dir = $template_dir;
    }

    function assign($key, $val)
    {
        $this->val[$key] = $val;
    }

    function display($file)
    {
        extract($this->val);
        require $this->template_dir.'/'.$file;
    }

    private function include($file)
    {
        include $this->template_dir.'/'.$file;
    }
}


?>