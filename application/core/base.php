<?php
/**
 * JunePHP
 * It's just a lightweight PHP framework.
 *
 * @author Wen Peng
 * @link http://www.pengblog.com
 * @link wen@pengblog.com
 */

if (!defined('ACCESS')) die('No direct script access allowed');

class Base
{
	protected static $tpl_container = null;
	protected static $db_container = null;
	protected static $session_container = null;

	/**
	 * 构造函数
	 */
	public function __construct()
	{
		$this->tpl = self::tplInit();
		$this->db = self::dbInit();
		$this->session = self::sessionInit();
	}

	/**
	 * 获取系统配置
	 */
	public static function getConfig( $key = null ) {
		global $config;
		if ($key && $config[$key]) {
			return $config[$key];
		}
		return $config;
	}

	/**
	 * Database初始化
	 */
	public static function dbInit(){
		if( self::$db_container == null ){
			self::$db_container = new Medoo( self::getConfig('database') );
		}
		return self::$db_container;
	}

	/**
	 * Template初始化
	 */
	public static function tplInit(){
		if( self::$tpl_container == null ){
			self::$tpl_container = new Template( self::getConfig('template') );
		}
		return self::$tpl_container;
	}

	/**
	 * SESSION初始化
	 */
	public static function sessionInit(){
		if( self::$session_container == null ){
			self::$session_container = new Session();
		}
		return self::$session_container;
	}

	/**
	 * 载入模型
	 */
	function loadModel($model_name){
		$path = MODEL_PATH . strtolower($model_name) . '.php';
		if (file_exists($path)) {
			require $path;
			$model = $model_name . '_Model';
			return new $model();
		}
	}

	/**
	 * 载入辅助函数
	 */
	function loadHelper($helper_name){
		$path = HELPER_PATH . strtolower($helper_name) . '.php';
		if (file_exists($path)) {
			require $path;
		}else{
			exit('Helper not found!');
		}
	}

}
