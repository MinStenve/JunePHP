<?php
/**
 * JunePHP
 * It's just a lightweight PHP framework.
 *
 * @author Wen Peng
 * @link http://www.pengblog.com
 * @link wen@pengblog.com
 */

if (!defined('ACCESS')) exit('No direct script access allowed');

class Home extends Base
{
	public function index($url_parameter = null)
	{

		$dbinfo = $this->loadModel('home')->info();
        $this->tpl->set('driver',$dbinfo['driver']);
        $this->tpl->set('version',$dbinfo['version']);
        $this->loadHelper('utility');
		$this->tpl->set('usage',theUsage());

		$this->tpl->set('title','首页');
		$this->tpl->show('home');
	}

}
