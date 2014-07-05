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

class Session {

    public function __construct()
    {
        if (!session_id()) $this->start();
    }

    private function start() {
        session_start();
    }

    public function set($key, $value='') {
        if (!is_array($key)) {
            $_SESSION[$key] = $value;
        } else {
            foreach ($key as $k => $v) $_SESSION[$k] = $v;
        }
        return true;
    }

    public function get($key) {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : NULL;
    }

    public function del($key) {
        if (is_array($key)) {
            foreach ($key as $k){
                if (isset($_SESSION[$k])) unset($_SESSION[$k]);
            }
        } else {
            if (isset($_SESSION[$key])) unset($_SESSION[$key]);
        }
        return true;
    }

    public function check($key) {
        return isset($_SESSION[$key]);
    }

    public function clear() {
        session_destroy();
        $_SESSION = array();
    }

}
